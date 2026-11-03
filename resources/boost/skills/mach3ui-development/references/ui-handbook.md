# Mach3 UI-handboek

Versie 1.3 · bijgewerkt op 3 november 2026. Dit handboek geldt voor het bouwen en aanpassen van de beheerinterfaces in het Mach3-ecosysteem met Laravel Blade, Livewire, Flux en Mach3UI.

De afspraken hieronder zijn voorschriften. Kies de variant op basis van de beschreven situatie. Gelijke taken krijgen dezelfde opbouw. Gebruik Flux voor beschikbare componenten en Mach3UI voor de bijbehorende pagina-, sectie-, paneel- en gegevensstructuren.

Lees vóór UI-werk de basisafspraken en de hoofdstukken voor de betrokken taak, inclusief teksten, maatvoering en toestanden. Gebruik de vaste codes om een afspraak terug te vinden. Ontbreekt een patroon, werk de toepassingsregel en het voorbeeld in dit bestand bij. Maak geen losse productvariant voor dezelfde taak.

## Basisafspraken

- Flux is zoveel mogelijk leidend: gebruik de bestaande componenten, hun officiële API, standaardopbouw, gedrag, toegankelijkheid en interne vormgeving. Mach3UI vult dit aan met gedeelde structuren. Bouw geen eigen alternatief en voeg geen CSS-correcties toe voor iets wat de component al ondersteunt. Een bewuste afwijking moet concreet in dit handboek zijn vastgelegd.
- Gebruik nergens CSS-transitions, ook niet uit gedeelde componenten of third-party styles. Hover-, focus-, kleur-, rand-, schaduw- en open/dicht-toestanden veranderen direct. Geen transition-utilities, duration-/ease-utilities voor transitions, x-transition of smooth scrolling. Deze expliciete afspraak gaat vóór de standaardovergangen van Flux en Mach3UI.
- Alle UI-iconen zijn altijd Lucide, in alle zes producten en alle componenten. Dit geldt ook voor ingebouwde Flux-/Mach3UI-iconen, status- en laadiconen, sluitknoppen en publieke interfaces. Geen andere iconenset of getekende vervanging. Deze expliciete afspraak gaat vóór generieke Flux-instructies die Heroicons als standaard noemen; zie M3-213.
- Behoud één herkenbare app-shell, paginavolgorde, actiehiërarchie en tekststijl.
- Gebruik bestaande gedeelde componenten en hun standaard interne afstanden. Leg ruimte tussen componenten concreet vast; introduceer geen eigen maatrollen of extra spacingtokens. Callouts krijgen nooit eigen CSS voor hun interne afstanden.
- Ontwerp iedere taak met inhoud, zonder inhoud, zonder treffers, met laden/fouten, beperkte rechten en smalle schermen.
- Actieknoppen gebruiken een infinitief. Buiten modals noemt de toevoegactie het onderwerp: Product toevoegen. In modals bevatten actieknoppen alleen het werkwoord, ook bij toevoegen: Toevoegen. Het onderwerp staat in de modaltitel. Opslaan buiten tabelrijen is primary, zonder icoon. In tabelrijen zijn alle actieknoppen icoonknoppen met tooltip en toegankelijke naam volgens M3-014. Preview is de vaste uitzondering; Vorige/Volgende zijn navigatie.
- Verander met een UI-aanpassing geen domeinlogica, gegevensscope, autorisatie, verwijdergevolgen of opgeslagen inhoud.
- Publieke formulieren, embeds, checkout, e-mail en PDF volgen hun eigen expliciete contract. De beheerhuisstijl geldt daar niet automatisch.
- Een visueel voorbeeld toont alleen de inhoud en bediening die nodig zijn om de betreffende afspraak te beoordelen. Geen opvulvelden, dubbele uitleg, willekeurige gegevenspanelen of acties zonder functie. Behoud voldoende echte context voor plaatsing, uitlijning en gedrag; complete schermen horen bij de layoutvoorbeelden.

## Inhoud

- [Componentkeuze en Flux-documentatie](#componentkeuze-en-flux-documentatie)
- [Layouts](#layouts)
- [Structuur](#structuur)
- [Navigatie](#navigatie)
- [Overzichten](#overzichten)
- [Lijsttoestanden](#lijsttoestanden)
- [Compositieafspraken](#compositieafspraken)
- [Invoer](#invoer)
- [Callouts](#callouts)
- [Modals](#modals)
- [Handelingen](#handelingen)
- [Interactie](#interactie)
- [Toestanden](#toestanden)
- [Workflows](#workflows)
- [Informatie](#informatie)
- [Schrijfwijzer](#schrijfwijzer)
- [Maatvoering](#maatvoering)
- [Ruimteregels](#ruimteregels)
- [Fundament](#fundament)
- [Aparte scope](#aparte-scope)
- [Wijzigingen doorgeven en verwerken](#wijzigingen-doorgeven-en-verwerken)
- [Wijzigingslog](#wijzigingslog)

## Layouts

### M3-001: App-shell

Gebruik de gedeelde sidebar, header en main. Een canvas mag breder zijn, maar behoudt dezelfde account-/resourcecontext en terugweg. Header en content delen dezelfde containerlijn. Onder de app-header met breadcrumbs staat geen border. De sticky header gebruikt de gedeelde zachte verlooprand van 12px naar de hoofdinhoud. Het app-logo in de main app-layout is altijd 12px hoog, zowel op desktop als mobiel. Gebruik de bestaande ui:logo size="base" (native h-3), met automatische breedte en behoud van de beeldverhouding. Houd de bestaande sidebar-headerhoogte en uitlijning aan; vergroot het logo niet om de beschikbare ruimte te vullen.

**Voorbeeld:** Sidebar 256px │ Header │ Main maximaal 80rem

### M3-002: Navigatieniveaus

Globale navigatie beheert account en resources. Binnen een resource staat diens naam en lokale navigatie. Pakket en Facturen staan onder Administratie; superadminfuncties onder Beheer. Bouw iedere navigatiegroep met flux:sidebar.nav en gap-1 (4px tussen items). Een volgende groep krijgt mt-4 (16px extra bovenruimte); groeptitels gebruiken de bestaande Flux-heading met px-2 pt-2. Binnen een resource staat de teruglink bovenaan dezelfde flux:sidebar.nav, gevolgd door een flux:separator met class="my-2", daarna de resourcenaam en de lokale navigatie-items. De resourcenaam gebruikt aanvullend mb-2. Voeg tussen teruglink en resourcegroep geen extra mt-4 toe boven op de separator; mt-4 blijft voor volgende zelfstandige groepen zoals Administratie. Behoud de native containerafstand van flux:sidebar; voeg daarbovenop geen eigen ouder-gap voor dezelfde groepen toe. Ook de kijkversie gebruikt de echte sidebarcontainer, zodat de uiteindelijke groepsafstand overeenkomt met de apps.

**Voorbeeld:** Alle projecten → Flux-separator → Zomercollectie → Dashboard · Inhoud · Instellingen / Administratie → Pakket · Facturen

### M3-003: Wisselen van context

Bij een overgenomen account toont de app de bestaande livewire:account-switcher: een vaste accentbalk bovenaan over de volledige appbreedte, ook boven de sidebar. De balk gebruikt bg-accent en text-accent-foreground, is 40px hoog en toont ‘Je bent ingelogd als [accountnaam]’. De ghost-icoonknop met log-out brengt je terug naar je eigen account en heet toegankelijk ‘Terug naar eigen account’. De app reserveert 40px bovenruimte (pt-10); de sticky app-header verschuift naar top-10. Toon deze toestand niet als callout of los formulier in de pagina-inhoud. Een gewone project-/resourcewisselaar staat in de header/breadcrumb, zoals in het betreffende product; accountcontext en resourcecontext blijven herkenbaar gescheiden. Behoud de afspraken voor niet-opgeslagen wijzigingen, filters en selectie bij contextwisseling.

**Voorbeeld:** Boven de app: Je bent ingelogd als Voorbeeld BV · log-out. Daaronder de app-header met de resourcewisselaar Zomercollectie.

### M3-004: Terugkeren

Breadcrumb toont hiërarchie en is de normale terugweg. Bewaar zoektekst, filters, sortering en pagina bij terugkeren naar hetzelfde overzicht. Geen tweede Ga terug-knop naast dezelfde breadcrumb.

**Voorbeeld:** Projecten › Zomercollectie › Documenten → terug naar pagina 3 met dezelfde filters

### M3-005: Kolommen en zijpanelen

Eén hoofdkolom is standaard. Alleen een nuttig hulp- of tagpaneel rechtvaardigt een tweede kolom. Hoofdtaak eerst in DOM en op mobiel; geen leeg zijpaneel bij lege inhoud. Benoemde veldgroepen en bijbehorende hulpgroepen gebruiken een gestapelde ui:section: titel buiten de card, inhoud erin.

**Voorbeeld:** Hoofdinhoud 2 delen │ ondersteunende Tags 1 deel → op mobiel onder elkaar

### M3-006: Detail lezen

Leesgegevens in ui:list variant definition, gegroepeerd per onderwerp. Eén Bewerken voor de bewerkbare groep. Geen disabled inputs voor alleen-lezen informatie; ontbrekende waarde heet Niet ingevuld.

**Voorbeeld:** Naam: Zomercollectie / E-mailadres: Niet ingevuld → Bewerken

### M3-007: Authenticatie

Gebruik de bestaande gedeelde auth-layout zonder beheersidebar: een gecentreerde kolom van maximaal 28rem, het echte product- of private-labellogo erboven en 24px tussen de hoofdonderdelen. De login staat in ui:box met titel Welkom en uitleg Je kunt hier inloggen om toegang te krijgen. Daarbinnen staat een flux:card met het formulier (space-y-6): E-mailadres, Wachtwoord, daarna Gegevens onthouden links en Wachtwoord vergeten rechts op dezelfde regel, gevolgd door de volle-breedte primary-knop Inloggen. In de producten volgen accentkleur en logo de bestaande product- of private-labelinstellingen. De gedeelde kijkversie toont deze opbouw monochroom, met het Mach3Builders-logo; gebruik daar geen productnaam of productaccent. Voeg geen extra groepstitel, standaard placeholder of wachtwoord-oogknop toe aan deze loginvariant. Labels blijven zichtbaar, wachtwoordmanager en plakken werken. Onder de buitenste box staat Nog geen account? met de toegestane registratie-/Partner worden-link(s), alleen als routes en branding dat toelaten. Herstel en MFA gebruiken dezelfde auth-layout en een duidelijke terugweg. Eventuele statusmelding staat vóór de loginbox; toon deze alleen als er werkelijk een status is. Dit auth-patroon met een benoemde buitenste box en binnenste veldcard is een expliciete uitzondering op gewone veldgroeptitels buiten de card.

**Voorbeeld:** Productlogo → Welkom + uitleg → binnenste card met E-mailadres · Wachtwoord · Gegevens onthouden / Wachtwoord vergeten · Inloggen → Nog geen account? Partner worden

### M3-008: Scroll en lagen

De pagina heeft één hoofdscroll. Een drawer/modal heeft één eigen body-scroll en blokkeert de achtergrond. Volg gedeelde componentlagen voor sticky header, popover, modal en toast; geen willekeurige z-index per pagina. De accountaccentbalk staat boven de app-shell en reserveert 40px; gebruik hiervoor de bestaande account-switcher.

**Voorbeeld:** Banner → Header → Tabs / Modal → popover binnen modal → feedback


## Structuur

### M3-009: Paginaopbouw

Context, titel/uitleg, resourceacties, tabs, melding, toolbar, selectie, inhoud en paginatie hebben deze vaste volgorde. Ontbrekende onderdelen laten geen lege ruimte achter.

**Voorbeeld:** Projecten › Zomercollectie → Producten → tabs → toolbar → tabel → paginatie


## Navigatie

### M3-010: Tabs met iconen

Iedere tabbalk met maximaal vijf zichtbare tabs toont bij elke tab een passend Lucide-icoon vóór de tekst. Dit geldt voor account-, resource- en modaltabs. Tel alleen tabs die de gebruiker in de huidige toestand daadwerkelijk ziet. Tekst blijft altijd zichtbaar. Gebruik binnen dezelfde balk overal dezelfde icoonpresentatie.

**Voorbeeld:** Profiel · Inloggegevens · Beveiliging · Sessies: vier tabs, dus vier iconen. Ook Overzicht · Instellingen toont twee iconen.

### M3-011: Veel tabs: iconen verbergen

Bij zes of meer zichtbare tabs vervallen alle iconen in die tabbalk. De grens is vijf tabs met iconen; vanaf zes alleen tekst. Verberg geen tabtekst om iconen te behouden en maak geen mix van tabs met en zonder icoon. Instellingen en Danger zone staan achteraan. Bij ruimtegebrek blijven de tabs horizontaal bereikbaar via de bestaande Flux-tabbediening.

**Voorbeeld:** Formulier · Triggers · Respondenten · Resultaat · Instellingen · Danger zone: zes tabs, dus geen iconen.

### M3-012: Actieve tab tijdens updates

Route-tabs gebruiken navigationRouteIs, blijven actief tijdens Livewire-updates en houden de actieve tab zichtbaar bij horizontale scroll. Instellingen en Danger zone blijven achteraan.

**Voorbeeld:** Formulier · Triggers · Respondenten · Resultaat · Instellingen · Danger zone


## Overzichten

### M3-013: Toolbar met inhoud

Collectieacties links. Rechts staan filters, dan eventuele kolomkeuze, dan zoeken. Zoeken is maximaal 16rem breed op desktop; op mobiel mag het een volle regel gebruiken.

**Voorbeeld:** Product toevoegen  │  Filters → Kolommen → Zoeken

### M3-014: Tabel en rijacties

Naam is de link. Tekst links, bedragen en overige meetwaarden rechts. Prijswaarden krijgen altijd de Tailwind-class tabular-nums (font-variant-numeric: tabular-nums). In tabellen staan zowel de prijs-td als de bijbehorende th rechts uitgelijnd: align="end" op flux:table.column en flux:table.cell, met class="tabular-nums" op de prijs-cel. Gebruik geen eigen tabular-num-class. Iedere badge in een tabel staat horizontaal gecentreerd. Geef zowel de bijbehorende th als iedere td class="w-0"; gebruik in Flux align="center" class="w-0" op flux:table.column en flux:table.cell. Toon aantallen in tabelcellen altijd als flux:badge size="sm", inclusief 0. Aantalbadges zijn standaard neutraal (color="zinc"); statusbadges volgen hun betekenis. Ook koppen boven badgekolommen staan gecentreerd. De naamkolom krijgt de beschikbare ruimte. Actieknoppen binnen tabelrijen zijn altijd icoonknoppen zonder zichtbaar tekstlabel, ook bij één beschikbare actie. Gebruik native flux:button met icon, square en size="sm". Iedere tabelactie heeft verplicht een eigen native Flux-tooltip via tooltip="Actie" én aria-label met dezelfde actienaam, ook Verwijderen, Meer en een losse actie zonder buurknoppen. De tooltip verschijnt bij hover en toetsenbordfocus en benoemt kort de handeling; behoud de standaard Flux-positie en het standaardgedrag. Een aria-label of HTML-title alleen is niet voldoende voor de zichtbare tooltip. De knoppen gebruiken allemaal variant="subtle", ook Verwijderen: geen rode danger-knop in de tabelrij. Ze staan compact rechts, met 4px ertussen, en blijven zichtbaar zonder hover. Bij 1 tot en met 4 beschikbare acties staan alle acties direct naast elkaar; voeg dan geen Meer-menu toe. Bij 5 of meer acties staan de 3 meest gebruikte direct, gevolgd door de neutrale Meer-icoonknop. Zo zijn er maximaal 4 zichtbare knoppen. Alle overige acties staan in de native Flux-dropdown. Bepaal de meest gebruikte acties vanuit de taak, met een vaste herkenbare volgorde per schermtype; tel alleen acties waarvoor de gebruiker bevoegd is. Bewerken gebruikt square-pen, Kopiëren clipboard, Meer ellipsis en Verwijderen trash-2. Verwijderen volgt dezelfde aantalsregel als andere rijacties en krijgt direct een neutraal trash-2-icoon wanneer de actie direct wordt getoond. De destructieve bevestiging behoudt de danger-variant volgens het verwijderpatroon. Een uitklapmenu behoudt leesbare tekstlabels bij zijn items. Kolomkoppen, sorteerlabels en paginatie behouden hun eigen native tekstweergave.

**Voorbeeld:** 3 acties: Bewerken · Kopiëren · Verwijderen als neutrale iconen. 4 acties: alle 4 direct. 5 acties: Bekijken · Bewerken · Kopiëren · Meer; Delen en Verwijderen staan in Meer.

### M3-015: Bulkselectie

Selecteer per pagina; benoem selectie over meerdere pagina’s expliciet. Een aparte balk boven de tabel noemt aantal en bereik. Filterwijziging vraagt om selectie wissen; account-/resourceswitch wist altijd.

**Voorbeeld:** 2 geselecteerd op deze pagina → Bewerken · Meer → Selectie wissen

### M3-016: Kaartoverzicht of tabel

Kaarten voor herkenbare resources met hoogstens enkele kernwaarden. Tabellen voor vergelijken, sorteren, bulk en veel velden. Dezelfde collectie wisselt niet per app van type zonder taakverschil. Iedere klikbare card toont bij hover direct een duidelijkere rand, zonder transition, vertraging, verplaatsing of schaalverandering. Gebruik de bestaande 1px border en verander alleen de kleur: group-hover:border-zinc-400 en dark:group-hover:border-white/30. Dezelfde randreactie geldt bij focus-visible; behoud daarnaast een zichtbare toetsenbordfocus. Alleen klikbare cards krijgen deze hoverreactie; informatiewidgets zonder actie niet. De kaarttitel en direct bijbehorende tekst, statusregel of kernwaarde vormen één compacte inhoudsgroep met 8px ruimte volgens M3-168.

**Voorbeeld:** Projectkaart Zomercollectie · Actief → hover: direct zichtbare rand → openen; geen transition of bewegende pijl

### M3-017: Sorteren en pagineren

Standaard 25 per pagina, met 25/50/100 als keuzewaarden waar een paginagroottekeuze nodig is. De keuze Aantal per pagina staat links in de footer onder de lijst. Gebruik als standaard flux:pagination met een LengthAwarePaginator uit paginate(): de eigen resultaatinformatie van Flux en de compacte groep met vorige-chevron, paginanummers en volgende-chevron. De paginabediening staat rechts. Bouw geen eigen reeks paginaknoppen of losse tekstknoppen Vorige/Volgende. De footerwrapper bepaalt uitsluitend de plaats van de paginagroottekeuze en de gedeelde bovenrand; de Flux-paginabediening behoudt haar standaardopbouw en responsieve gedrag. Bij weinig ruimte volgt de compacte Flux-weergave. Laat de paginagroottekeuze dan op een eigen regel links staan en geef de native paginatie de volledige volgende regel; verklein of verberg de interne Flux-resultaattekst niet. Gebruik sortable, sorted en direction op flux:table.column voor sorteerbediening, geen eigen sorteerknop met een losse pijl. Gebruik simplePaginate/cursorpaginatie alleen wanneer de taak of query dat bewust vereist. Eén zichtbare stabiele standaardvolgorde met id als tie-break. Nieuwe zoek-/filter-/sortering en een gewijzigde paginagrootte starten op pagina 1; terugkeren bewaart lijstcontext.

**Voorbeeld:** Links: 25 per pagina → Flux-resultaatinformatie → rechts: ‹ 1 2 3 4 5 6 ›

### M3-018: Zoekgedrag

Zoeken start altijd pas vanaf 3 tekens na het verwijderen van spaties aan begin en einde. Bij 0, 1 of 2 tekens wordt geen zoekopdracht uitgevoerd en geldt geen zoekfilter; de lijst blijft binnen de overige actieve filters zichtbaar. Ook Enter omzeilt deze grens niet. Vanaf 3 tekens reageert zoeken na 300ms typen; Enter voert dan direct uit. Terugwissen naar minder dan 3 tekens of het veld wissen verwijdert het zoekfilter en herstelt de lijst binnen de overige filters. Een oudere zoekopdracht mag deze toestand niet overschrijven. Pas de grens ook server-side toe. Dit geldt voor alle zoekvelden, inclusief zoekbare keuzelijsten en koppeltaken. Zoekscope, label en gerichte laadstatus zijn duidelijk.

**Voorbeeld:** z / zo → geen zoekfilter; zom → 300ms → Zomertrui en Zomersjaal; Enter bij zo → geen zoekopdracht; wissen → alle producten binnen de overige filters.

### M3-019: Filters toepassen

Losse eenvoudige selects passen direct toe. Een popover met meerdere criteria heeft onderaan één rechts uitgelijnde actierij: eerst Wissen als ghost-knop, daarna Toepassen als primaire knop aan de rechterrand. Conceptkeuzes veranderen de lijst pas na Toepassen. Actieve keuzes blijven in de filterbediening zichtbaar. Toon geen extra criteriabalk met badges of een losse knop Wissen onder de toolbar.

**Voorbeeld:** Filters → Status: Actief · Land: Nederland → onderaan rechts: Wissen · Toepassen → lijst met actieve producten; keuzes blijven in het filterpaneel.

### M3-020: Selectie bij contextwijziging

Pagineren behoudt expliciete geselecteerde IDs en toont totaalbereik. Zoeken/filteren met selectie vraagt eerst om wissen. Account/resource wisselen wist selectie. Alle resultaten selecteren is altijd een aparte expliciete stap.

**Voorbeeld:** 12 geselecteerd over 2 pagina’s → Filter wijzigen? → Annuleren · Wissen


## Lijsttoestanden

### M3-021: Inhoud · toevoegen beschikbaar

Toevoegactie links; filters en zoeken rechts. De inhoud bepaalt niet de relatieve volgorde van de bediening.

**Voorbeeld:** Product toevoegen links; rechts Filters, Kolommen, Zoeken; daaronder de tabel.

### M3-022: Inhoud · geen toevoegactie, wel bewerken

De linker toevoegactie vervalt. De rechter groep blijft rechts; rijacties blijven op basis van hun eigen rechten beschikbaar.

**Voorbeeld:** Geen toevoegknop; Filters en Zoeken blijven rechts; Bewerken blijft beschikbaar.

### M3-023: Inhoud · alleen-lezen

Geen mutatieacties, selectiecheckboxen of lege actiekolom. Zoeken en filters blijven bruikbaar om gegevens te bekijken.

**Voorbeeld:** Filters en Zoeken rechts; tabel zonder selectie of actiekolom.

### M3-024: Geen toevoegactie · wel export

Export blijft een collectieactie links. Filters en zoeken blijven rechts en worden niet naar een vrijgekomen plek verplaatst.

**Voorbeeld:** Exporteren links; Filters en Zoeken rechts.

### M3-025: Alleen zoeken · geen filters

Het zoekveld blijft rechts. Er komt geen leeg filtervak en het veld wordt niet over de hele desktopbreedte uitgerekt.

**Voorbeeld:** Product toevoegen links; alleen Zoeken rechts.

### M3-026: Alleen filters · geen zoekveld

De filtergroep blijft rechts. Ontbrekende bediening verwijdert ook haar eigen gap en wrapper.

**Voorbeeld:** Product toevoegen links; alleen Filters rechts.

### M3-027: Geen lijstbediening beschikbaar

De complete toolbar vervalt; er blijft geen lege strook of gereserveerde knopruimte boven de inhoud.

**Voorbeeld:** De inhoud volgt direct op de voorgaande paginazone.

### M3-028: Echt leeg · toevoegen toegestaan

Geen toolbar, zoekveld, filters of paginatie. Eén contextuele toevoegactie bij de lege melding; geen kopie in de header.

**Voorbeeld:** Nog geen producten. Voeg je eerste product toe. Product toevoegen.

### M3-029: Echt leeg · geen toevoegrecht

Een neutrale lege melding zonder toevoegactie of instructie om iets toe te voegen. De pagina en terugnavigatie blijven beschikbaar.

**Voorbeeld:** Nog geen producten. Er zijn hier nog geen producten beschikbaar.

### M3-030: Echt leeg · alleen import mogelijk

Een toegestane en werkende importactie kan de eerste stap zijn. Verzin geen toevoegactie als het product die niet heeft.

**Voorbeeld:** Nog geen producten. Importeer producten om te beginnen. Importeren.

### M3-031: Zoeken actief · nul treffers

Zoeken blijft zichtbaar en ingevuld, net als eventuele filters. Nul treffers is geen onboarding. Wissen gebeurt met het kruisje in het zoekveld; geen extra zoekbadge of losse knop Wissen onder de toolbar.

**Voorbeeld:** Zoekveld met onbekend en een wiskruisje; Geen resultaten; geen extra badge of wisknop.

### M3-032: Filters actief · nul treffers

De filterbediening blijft beschikbaar bij nul treffers. Actieve keuzes zijn terug te vinden en aan te passen in de filterbediening zelf. Herstellen gebeurt daar met Alle statussen of Wissen en zo nodig Toepassen. Geen extra statusbadge of losse knop Wissen onder de toolbar.

**Voorbeeld:** Filters → Status: Inactief; Geen resultaten; herstel via Alle statussen in de filterbediening.

### M3-033: Extra bediening · kolomkeuze

Standaard: filtergroep → kolomkeuze → zoeken. Niet-beschikbare onderdelen vervallen; de andere wisselen niet van volgorde.

**Voorbeeld:** Filters → Kolommen → Zoeken.

### M3-034: Bulkselectie actief

Een aparte selectiebalk direct boven de tabel noemt aantal en bereik. Die vervangt de toolbar niet en verplaatst zoeken of toevoegen niet.

**Voorbeeld:** 2 geselecteerd op deze pagina; bewerk-/bulkacties in een eigen balk boven de tabel.

### M3-035: Eerste keer laden · nog onbekend

Onbekende inhoud is geen lege lijst. Gebruik de echte Flux-skeleton met animate="shimmer", bij meerdere elementen via flux:skeleton.group. Gebruik voor tabellen flux:table met flux:skeleton.line of flux:skeleton in de cellen, volgens de verwachte kolomstructuur. Geen zelfgetekende grijze vlakken of eigen laadanimatie. Toon een toegankelijke laadstatus en verberg decoratieve placeholders voor hulptechnologie. Respecteer prefers-reduced-motion door de shimmer dan stil te zetten. Stel een definitieve empty state en resultaataantal uit.

**Voorbeeld:** Productentabel met native Flux-shimmer in de cellen; Gegevens worden geladen voor hulptechnologie; nog geen resultaataantal of lege melding.

### M3-036: Zoeken / verversen · inhoud behouden

Bestaande inhoud blijft op haar plaats met een gerichte laadstatus. Geen tijdelijke lege melding en geen verspringende toolbar.

**Voorbeeld:** Bestaande rijen blijven staan; Resultaten worden bijgewerkt.

### M3-037: Ophalen mislukt

Toon een fout met opnieuw proberen. Een mislukte aanvraag bewijst niet dat er geen inhoud is; behoud bekende invoer en context.

**Voorbeeld:** Ophalen mislukt. Probeer opnieuw. Zoektekst en filters blijven bewaard.

### M3-038: Laatste record weg · zoekopdracht actief

De actieve zoekopdracht bepaalt de herstelbare toestand. Verberg zoeken niet omdat het laatste record net is verwijderd.

**Voorbeeld:** Laatste product verwijderd; zoekveld met actieve zoektekst en wiskruisje blijft zichtbaar.

### M3-039: Laatste record weg · geen filters

Toon een neutrale lege toestand en de beschikbare volgende stap. Vermijd de suggestie dat de gebruiker hier nog nooit inhoud had.

**Voorbeeld:** Geen producten meer. Product toevoegen als dat is toegestaan.

### M3-040: Laatste rij op vervolgpagina weg

Er zijn nog resultaten. Herstel eerst naar een geldige pagina; toon dit niet als een lege collectie of nul treffers.

**Voorbeeld:** trash-2-icoonknop met tooltip Verwijderen → laatste rij van pagina 3 verwijderd → pagina 2 wordt opgehaald.

### M3-041: Lege resource · vaste contextscope

De lege toestand geldt binnen de huidige toegankelijke resource. Een account- of projectscope is geen wisbaar gebruikersfilter.

**Voorbeeld:** Project: Zomercollectie blijft zichtbaar boven Geen producten.

### M3-042: Geopend tabblad · lege inhoud

Behoud de geopende tab en zijn omliggende navigatie. Alleen de inhoud verandert van lijst naar lege toestand.

**Voorbeeld:** Respondenten blijft de actieve tab; de tabinhoud toont Nog geen respondenten.

### M3-043: Rapport · nul gegevens in periode

De periodekeuze blijft staan: deze bepaalt welke gegevens iemand bekijkt. Een leeg rapport volgt niet de onboarding van een nieuwe lijst. Aanvullende tekst zoals de tijdzone staat verticaal gecentreerd naast de dropdown zelf. Het veldlabel Periode staat erboven en telt niet mee voor die verticale centrering.

**Voorbeeld:** Deze maand en Europe/Amsterdam blijven staan boven Geen gegevens in deze periode.

### M3-044: Builder · nog geen onderdelen

De lege werkruimte en invoegactie blijven onderdeel van de taak. Verberg editorbediening niet met een algemene lijstregel.

**Voorbeeld:** Nog geen onderdelen; Onderdeel toevoegen blijft beschikbaar in de werkruimte.

### M3-045: Toevoegen geblokkeerd · limiet bereikt

Bestaande inhoud, zoeken en rijrechten blijven beschikbaar. Geef een concrete limietuitleg; presenteer dit niet als geen gegevens of alleen-lezen.

**Voorbeeld:** 100 van 100 documenten; limietuitleg; bestaande documenten blijven doorzoekbaar.

### M3-046: Lange labels · dezelfde taak op mobiel

Laat teksten en groepen beheerst omlopen. Behoud de betekenis en volgorde; verberg geen actie om een desktoprij passend te maken.

**Voorbeeld:** Actiecluster eerst; filtercluster daarna; Zoeken kan een eigen volledige regel krijgen.


## Compositieafspraken

### M3-047: Vaste paginazones

Breadcrumb/context → titel met badges en resourceacties → tabs → relevante melding → lijsttoolbar → selectiebalk → inhoud → resultaatinformatie/paginatie. Ontbrekende zones vervallen inclusief hun ruimte.

**Voorbeeld:** Breadcrumb/context → titel met badges en resourceacties → tabs → relevante melding → lijsttoolbar → selectiebalk → inhoud → resultaatinformatie/paginatie

### M3-048: Zonder toevoegactie

Collectieacties links en verfijning rechts hebben onafhankelijke posities. Ontbreekt toevoegen, dan blijft de rechter groep rechts. Geen lege placeholder; geen automatische promotie van de eerste filter naar links.

**Voorbeeld:** Collectieacties links en verfijning rechts hebben onafhankelijke posities

### M3-049: Echt leeg of geen treffers

Echt leeg én geen actieve verfijning: geen lijsttoolbar, zoeken, filters of paginatie; passende lege melding met hoogstens de toegestane volgende stap. Actief zoeken/filteren met nul treffers: bediening en herstel blijven zichtbaar.

**Voorbeeld:** Echt leeg én geen actieve verfijning: geen lijsttoolbar, zoeken, filters of paginatie; passende lege melding met hoogstens de toegestane volgende stap

### M3-050: Filters, zoeken en reset

Vaste rechter volgorde: filters → eventuele kolomkeuze → zoeken. Tekst naast dropdowns, filters of andere toolbarbediening staat verticaal gecentreerd ten opzichte van de control zelf, via een gedeelde flexrij met items-center. Labels erboven blijven buiten die rij; centreer niet ten opzichte van de gecombineerde hoogte van label en control. Gebruik geen losse top-margins, transforms of positioneringscorrecties voor deze uitlijning. Toon geen extra criteriabalk met zoek-/filterbadges en een losse knop Wissen onder de toolbar. Zoektekst blijft in het zoekveld, wissen gebeurt met het ingebouwde kruisje. Filterkeuzes worden in de filterbediening aangepast of gewist. Wissen verwijdert gebruikersverfijning, niet de verplichte resourcecontext.

**Voorbeeld:** Vaste rechter volgorde: filters → eventuele kolomkeuze → zoeken

### M3-051: Selectie en bereik

Selectie krijgt een eigen balk direct boven de tabel. Toon aantal én bereik. Selectie over pagina’s blijft expliciet zichtbaar. Filteren/zoeken met selectie vraagt eerst om wissen; account-/resourcewissel wist altijd. Alle gefilterde records selecteren is een aparte actie.

**Voorbeeld:** Selectie krijgt een eigen balk direct boven de tabel

### M3-052: Omlopen zonder herschikken

Desktop: actiecluster links, verfijningscluster rechts. Bij ruimtegebrek: actiecluster eerst, daarna verfijning in dezelfde DOM-volgorde. Zoekinput mag een eigen volledige regel krijgen; tabeloverflow blijft lokaal.

**Voorbeeld:** Desktop: actiecluster links, verfijningscluster rechts

### M3-053: Laden en fout zijn eigen toestanden

Bij eerste lading: echte Flux-skeleton met animate="shimmer" volgens M3-035, geen onbewezen nulwaarden. Bij verversen: behoud bekende inhoud en bediening. Bij een fout: gerichte fout en herstel. Behoud context en invoer.

**Voorbeeld:** Bij eerste lading: laadstructuur, geen onbewezen nulwaarden

### M3-054: Na toevoegen of verwijderen

Na een mutatie wordt binnen dezelfde context opnieuw bepaald welke toestand geldt. Herstel een ongeldige vervolgpagina vóór de lege-toestandbeslissing. Zoektekst en filterkeuzes blijven in hun eigen bediening bewaard en bereikbaar, ook als de basiscollectie net leeg is geworden.

**Voorbeeld:** Na een mutatie wordt binnen dezelfde context opnieuw bepaald welke toestand geldt

### M3-055: Lijsten, rapporten en werkruimtes

Empty-state-regels zijn gebonden aan een type werkgebied. Een rapport behoudt zinvolle periodekeuze, een builder zijn invoegmogelijkheid, een geneste lijst de breadcrumb en een geopende tab de actieve context.

**Voorbeeld:** Empty-state-regels zijn gebonden aan een type werkgebied

### M3-056: Focus, scroll en toegankelijkheid

DOM-volgorde volgt de lees- en visuele volgorde. Iedere filter, zoekinput en icoonactie heeft een naam. Updates behouden focus en scroll waar zinvol; belangrijke toestandwijzigingen krijgen een gerichte aankondiging.

**Voorbeeld:** DOM-volgorde volgt de lees- en visuele volgorde

### M3-057: Titel, subtitle en kopacties

Titel en eventuele badges vormen één groep; de subtitle staat daaronder. Resourceacties blijven aan de andere kant van de kop. Ontbreekt subtitle, badge, kopactie of tabs, dan vervalt dat onderdeel inclusief zijn extra ruimte.

**Voorbeeld:** Titel en eventuele badges vormen één groep; de subtitle staat daaronder

### M3-058: Secties en formulieracties

In een formulier met een uitlegrail en veldrail staat de opslagactie onder de velden, op dezelfde lijn. Geen lege uitlegkolom bedenken voor een los formulier; gebruik de benoemde layoutvariant. Op mobiel volgen uitleg, velden en acties elkaar.

**Voorbeeld:** In een formulier met een uitlegrail en veldrail staat de opslagactie onder de velden, op dezelfde lijn

### M3-059: Modal- en drawerfooter

De actiecluster staat aan het einde van de footer. Binnen de groep: annuleren vóór bevestigen. Als annuleren terecht ontbreekt, blijft bevestigen op dezelfde rechterrand. Laden behoudt knoppositie en relevante invoer.

**Voorbeeld:** De actiecluster staat aan het einde van de footer

### M3-060: Tabelkolommen en zijpanelen

Optionele tabelkolommen vervallen compleet: kop, cellen en breedtereservering. Bij iedere badgekolom staan kop en cellen gecentreerd en hebben zowel th als td class="w-0" volgens M3-014. Status- en rijactieposities zijn vast waar ze aanwezig zijn. Een ondersteunend zijpaneel verschijnt alleen als het in deze toestand betekenis heeft en start bij het bijbehorende inhoudsblok.

**Voorbeeld:** Optionele tabelkolommen vervallen compleet: kop, cellen en breedtereservering


## Invoer

### M3-061: Formulieropbouw

Eén hoofdformulier met ui:section. De titel en eventuele uitleg van een veldgroep staan buiten de card die ui:section zelf om de velden rendert; gebruik hiervoor niet ui:box title. Bij de responsive variant staan titel en uitleg links vanaf 80rem en boven de card bij minder ruimte. In een smalle kolom, modal of drawer blijven benoemde groepen verticaal via de gestapelde ui:section-variant. Nest geen extra ui:box in een gewone ui:section. Eén Opslaan in ui:section bare, links op dezelfde lijn als de velden. Een zelfstandige informatie-, authenticatie- of objectkaart kan wel een eigen titel in de card hebben; dat is geen veldgroeptitel.

**Voorbeeld:** Algemeen → Naam · E-mailadres → Opslaan

### M3-062: Uploaden

Toon toegestane bestandstypen en werkelijke limiet vóór kiezen. Per bestand naam, voortgang, fout en herstel. Gebruik voor meetbare voortgang altijd de native flux:progress met value en max, bijvoorbeeld value="65" max="100"; geen losse HTML-progress of zelfgebouwde balk. Behoud de standaard Flux-hoogte, kleur en vorm. Geef de component een toegankelijke naam via een gekoppeld flux:label of aria-label. De getoonde waarde volgt echte voortgang. Upload gereed en verwerken gereed zijn aparte toestanden. Ook meetbare verwerking gebruikt flux:progress met de werkelijke stappen of eenheden als value/max; na voltooiing staat de balk op 100%. Gebruik hiervoor geen brede statusbadge als vervanging van de voortgangsbalk. Bij onbekende verwerkingsvoortgang toon je de processtatus zonder verzonnen percentage. Kiesknop blijft alternatief voor slepen. De globale afspraak zonder CSS-transitions blijft ook voor flux:progress gelden. Gebruik bij afbeeldingsvelden altijd ui:image-preview voor de huidige of geselecteerde afbeelding, naast de passende Flux-bestandsinput. Plaats binnen flux:field het label, de previewtegel, de bestandsinput en de zichtbare bestandshulp in die volgorde. Houd tussen previewtegel en bestandsinput 8px (space-y-2) ruimte op de omvattende veldgroep, zonder de component zelf te wijzigen. Geef src de werkelijke afbeelding-URL; zonder src toont Mach3UI de native placeholder. Een gekozen tijdelijke afbeelding gebruikt na geldige selectie de tijdelijke upload-URL. Gebruik de gekoppelde ui:image-preview.modal voor vergroten, één keer per scherm, met previewSrc in de omvattende Alpine-context. Behoud de native tegelmaat, object-contain, placeholder, hoverborder en modal; geen eigen thumbnail, vergrotingshandler of styling. Geef de afbeelding en de vergrotingsknop een beschrijvende toegankelijke naam; vul dit centraal aan als de geïnstalleerde component die niet doorgeeft. Geef delete alleen mee wanneer verwijderen is toegestaan en aan een bestaande geautoriseerde actie is gekoppeld. Een gewone document- of CSV-upload krijgt geen afbeeldingstegel.

**Voorbeeld:** header.jpg → Uploaden 65% met flux:progress value="65" max="100" → Verwerken: 2 van 4 stappen met flux:progress value="2" max="4" → Gereed met flux:progress value="100" max="100"

### M3-063: Veldkeuze

Checkbox voor toestemming/selectie, switch voor direct toepasbare aan/uit-instelling, radio voor 2–5 overzichtelijke opties, select voor meer opties. Zoekbare combobox bij lange lijsten. Uitgestelde wijzigingen blijven in het formulier. Prijs-, percentage- en URL-tekstvelden krijgen altijd de native Flux-inputgroep met de passende prefix/suffix volgens M3-128.

**Voorbeeld:** Type: Openbaar ○ Privé / Meldingen versturen ☑ / Opslaan

### M3-064: Editor voor opmaak

Gebruik Flux-editor voor ondersteunde opmaak met een beperkte toolbar. Bewaar niet-ondersteunde bronopmaak; geen ongevraagde omzetting.

**Voorbeeld:** Beschrijving → Vet · Cursief · Link → tekst → Opslaan

### M3-065: Editor voor code

Codevelden noemen de taal en gebruiken monospace. Geen rijketekstcontrole voor CSS/HTML. Behoud bron, whitespace waar betekenisvol, en geef herstelbare validatie.

**Voorbeeld:** Custom CSS → .title { color: inherit; } → Opslaan

### M3-066: Verplicht en optioneel

Veldlabels blijven zichtbaar. Verplichte velden krijgen consequent een ster met formulieruitleg; optionele velden Optioneel waar twijfel bestaat. Markeer vereist ook semantisch en in validatie, niet alleen met kleur. Gebruik begrijpelijke Livewire-validatie; semantische verplichtheid mag niet leiden tot een afwijkende browserfout in plaats van de afgesproken foutpresentatie.

**Voorbeeld:** * Verplicht / Naam * / Telefoonnummer (optioneel)

### M3-067: Defaults en heropenen

Kies veilige, waarschijnlijke defaults. Een toevoegmodal start opnieuw schoon na succesvolle sluiting of annuleren; een validatiefout behoudt invoer. Vraag geen bestemming als de huidige context die al bepaalt.

**Voorbeeld:** Vragenlijst toevoegen → Openbaar geselecteerd → Opslaanfout? Invoer blijft

### M3-068: Editor en bestaande inhoud

Rijketekst voor ondersteunde opmaak, code-editor voor code. Detecteer niet-ondersteunde bestaande HTML en behoud die in bronmodus. Plakken, media en links hebben voorspelbaar gedrag; geen stil opmaakverlies.

**Voorbeeld:** Bestaande complexe HTML → bronmodus → Opslaan zonder opmaakverlies

### M3-069: Geheimen en gevoelige waarden

Tokens en wachtwoorden standaard afgeschermd. Tonen en Kopiëren zijn bewuste acties met namen. Een kopieerbare waarde staat in flux:input readonly copyable; bij een geheim combineer je dit met type="password" viewable. De kopieeractie staat binnen de input, niet in een losse knop eronder. Gebruik het centrale clipboard-/clipboard-check-patroon uit M3-104, met tooltip Kopiëren. Kopiëren neemt de echte waarde over, ook wanneer die afgeschermd is; het maakt de waarde niet zichtbaar. Meld vervanging of intrekken expliciet; geen volledig geheim in toast, URL of log.

**Voorbeeld:** API-sleutel •••••••• → Tonen · Kopiëren → Intrekken


## Callouts

Gebruik de standaard Flux-calloutcomponenten zonder eigen CSS voor afstanden, padding, margins of icoongrootte. Zet het betekenisicoon op flux:callout (icon="…"), zodat titel en toelichting samen in de inhoudskolom rechts van het icoon staan. Gebruik geen icoon op flux:callout.heading. Kies de variant, het betekenisicoon en de plaatsing volgens de onderstaande situaties.

### M3-070: Context en toelichting

Neutrale maar taakbrede context die meer aandacht verdient dan gewone veldhulp. Standaard: variant="secondary", Lucide info links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon.

**Voorbeeld:** Belangrijk voor deze instelling → Deze instelling geldt voor alle gebruikers van dit account.

### M3-071: Informatieve melding

Een relevante verandering of instructie zonder fout of risico. Gebruik color="blue"; Flux kent hier geen variant="info". Standaard: color="blue" (geen info-variant), Lucide info links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon.

**Voorbeeld:** Nieuwe gegevens beschikbaar → Ververs het overzicht om de nieuwste gegevens te bekijken.

### M3-072: In wachtrij

Een geaccepteerde maar nog niet begonnen achtergrondtaak; color="blue". Standaard: color="blue" (geen info-variant), Lucide clock links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon. Dit beschrijft de blijvende taakstatus; de notificatie na het starten of inplannen gaat via Flux Toast volgens M3-118.

**Voorbeeld:** Import staat in de wachtrij → Je kunt deze pagina verlaten. De verwerking gaat op de achtergrond verder.

### M3-073: Taak wordt uitgevoerd

Een werkelijk actieve taak, niet een algemene decoratieve laadanimatie; color="blue". Standaard: color="blue" (geen info-variant), Lucide loader-circle links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon. Dit is blijvende voortgang in de taakcontext; losse jobactienotificaties gebruiken Flux Toast volgens M3-118.

**Voorbeeld:** Bestanden worden verwerkt → 128 van 200 bestanden zijn verwerkt.

### M3-074: Blijvende positieve context

Een blijvende positieve toestand kan een success-callout gebruiken, bijvoorbeeld een actieve verbinding. Dit is geen notificatie na een formulierverzending of jobactie: daarvoor is altijd Flux Toast verplicht volgens M3-118. Toon een afgeronde import niet als success-callout; resultaatdetails horen bij de taakgegevens. Voor blijvende context: variant="success", Lucide circle-check op flux:callout; titel en toelichting samen rechts van het icoon, zonder eigen CSS.

**Voorbeeld:** Verbinding actief → Deze koppeling is beschikbaar voor alle projecten.

### M3-075: Aandacht of risico

Er is aandacht nodig of een risico vóór doorgaan; geen reeds mislukte aanvraag. Standaard: variant="warning", Lucide triangle-alert links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon.

**Voorbeeld:** Afzender nog niet gecontroleerd → Controleer de DNS-instellingen voordat je e-mails verstuurt.

### M3-076: Fout of harde blokkade

Een mislukte actie of harde fout. Noem het probleem én herstel; veldvalidatie blijft bij de velden. Standaard: variant="danger", Lucide triangle-alert links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon. Deze callout beschrijft een blijvende blokkade. De notificatie dat een formulier- of jobactie is mislukt gaat via een danger-toast volgens M3-118.

**Voorbeeld:** Import mislukt → Het bestand kon niet worden verwerkt. Controleer het formaat en probeer opnieuw.

### M3-077: Alleen-lezen context

De gebruiker kan deze taak bewust alleen bekijken. Geen rode systeemfout en geen onbevoegde actie. Standaard: variant="secondary", Lucide lock-keyhole links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon.

**Voorbeeld:** Alleen-lezen toegang → Je kunt de gegevens bekijken. Wijzigingen worden door een beheerder gedaan.

### M3-078: Gebruiksgrens bereikt

Een productlimiet met concrete grens en passende vervolgstap. Verwar dit niet met ontbrekende bevoegdheid. Standaard: variant="warning", Lucide triangle-alert links naast de inhoud, via icon op flux:callout. Titel en toelichting lijnen samen uit; flux:callout.heading krijgt geen icoon.

**Voorbeeld:** Documentlimiet bereikt → Je gebruikt 100 van 100 documenten. Bestaande documenten blijven beschikbaar.

### M3-079: Callouttitel en icoon

Iedere taakcallout heeft een korte concrete titel zonder punt en een toelichting met punt. Het betekenisicoon staat op de root flux:callout via icon="…". Titel, toelichting en eventuele acties staan samen in de inhoudskolom rechts van het icoon; vervolgregels lijnen uit met de titel. Zet geen icon op flux:callout.heading en voeg geen uitlijnings-CSS toe. Iconen zijn Lucide; normale modal-/paginatitels krijgen geen decoratief icoon.

**Voorbeeld:** flux:callout variant="danger" icon="triangle-alert" → titel Import mislukt en hersteladvies eronder, beide rechts van het icoon

### M3-080: Plaatsing en acties

Een paginabrede melding staat na tabs en vóór de taakbediening. In een modal staat een taakbrede melding na de introductie en vóór de groepen; een veldgroepspecifieke melding staat binnen die groep, vóór de velden. Acties onder de tekst, links uitgelijnd; nooit gewone helptekst tot callout promoveren.

**Voorbeeld:** Titel + uitleg → callout → veldgroepen → footer

### M3-081: Sluiten en aankondigen

Blokkades, fouten en noodzakelijke waarschuwingen verdwijnen niet vanzelf en zijn niet weg te klikken zolang ze gelden. Alleen vrijblijvende berichten mogen een Sluiten-actie krijgen. Nieuwe fouten worden aangekondigd, voortgang beleefd en niet bij iedere poll. Dit geldt voor blijvende contextmeldingen; notificaties na een formulier- of jobactie volgen M3-118.

**Voorbeeld:** Import mislukt blijft staan → Herstellen → melding verdwijnt na werkelijk herstel


## Modals

Gebruik altijd de echte flux:modal voor een geopende modal, met de bestaande gedeelde Mach3UI-themalaag. De native Flux-basis gebruikt dark:bg-zinc-800; de Mach3UI-stylesheet die alle zes producten laden stelt [data-flux-modal] dialog centraal in op dark:bg-zinc-850 (oklch(0.235 0 0)) en dark:ring-zinc-700/70. De backdrop gebruikt zwart op 25% met 4px blur. Dit zijn bestaande ecosysteeminstellingen, geen nieuwe kleurkeuzes per scherm. Ook het vaste modalvoorbeeld in de kijkversie rendert de echte flux:modal en dezelfde inhoudspartial als de geopende variant. Alleen de plaatsing en zichtbaarheid worden aan het voorbeeldkader aangepast. Bouw de modal niet na met een Flux-card, eigen sluitknop of gekopieerde kleuren. De knop Openen is uitsluitend nodig om het gedrag als overlay te testen.

Modals en drawers hebben geen border-bottom of scheidingslijn onder de header en geen border-top of scheidingslijn boven de footer. Scheid introductie, inhoud en acties met de afgesproken ruimte. Voeg ook geen flux:separator of pseudo-element toe om deze lijnen terug te brengen. De native buitenrand van het overlay en de randen van inhoudelijke veldcards blijven behouden. Dit geldt voor vaste previews en geopende overlays.

In modals bevatten actieknoppen alleen het werkwoord in de infinitief: Toevoegen, Opslaan, Verwijderen, Versturen, Sluiten en Annuleren. Herhaal geen objectnaam in de knop, ook niet bij toevoegacties. Het onderwerp staat in de modaltitel, bijvoorbeeld Project toevoegen met de knop Toevoegen. Dit geldt voor alle modals, zowel de vaste preview als de geopende overlay.

### M3-082: Modal met alleen tekst

Titel, korte uitleg en footer vormen de hele modal. Geen lege ui:box, geen formulier en geen definition list zonder gegevens. Eén Sluiten bij alleen informatie; bij een keuze Annuleren plus het concrete werkwoord.

**Voorbeeld:** Synchroniseren → Bestaande gegevens worden bijgewerkt. → Annuleren · Synchroniseren

### M3-083: Modal met definition list

Titel en uitleg boven één ui:box met ui:list variant definition. Labels links, waarden daarnaast, lange waarden omlopend. Recordgegevens zijn tekst, geen readonly inputs. Daarna footer rechts met Annuleren en bevestigen.

**Voorbeeld:** Product verwijderen → Naam: Zomercollectie / Artikelnummer: ZC-01 → Annuleren · Verwijderen

### M3-084: Modal met één veldgroep

De modaltitel en introductie staan buiten de veldcard. Alle samenhangende velden staan in één ui:box, met het Flux-veldritme. Voeg geen overbodige groepstitel Algemeen toe als de modaltitel de taak al duidelijk maakt. Heeft de veldgroep een eigen noodzakelijke titel, gebruik dan een gestapelde ui:section die deze buiten de card toont. Eén form omvat velden en footer. Geen zijwaartse titelkolom in een modal. Actieknoppen bevatten alleen het werkwoord; de toevoegknop heet Toevoegen, terwijl de modaltitel het onderwerp noemt (M3-134).

**Voorbeeld:** Project toevoegen → Naam · E-mailadres → Annuleren · Toevoegen

### M3-085: Modal met meerdere veldgroepen

Eén form, meerdere verticale veldgroepen via de gestapelde ui:section-variant. Iedere groep heeft een korte titel en waar nodig uitleg buiten de card; alleen de velden staan binnen de automatisch gerenderde ui:box. Gebruik de bestaande componentafstanden en 24px binnenpadding van de box. Geen ui:box title voor veldgroepen, geen extra geneste box en geen apart Opslaan per groep. Taak blijft samenhangend; een grote workflow krijgt een eigen pagina.

**Voorbeeld:** Trigger bewerken → groep Algemeen → groep Bericht → Annuleren · Opslaan

### M3-086: Gegevens en formulier combineren

Leescontext staat eerst in een eigen definition-box, daarna de bewerkbare veldgroep(en), met eventuele groepstitels buiten hun cards. Toon een waarde niet nogmaals als readonly input. De hele modal heeft één opslagactie en één duidelijk doel.

**Voorbeeld:** Uitnodiging versturen → Geadresseerde: Sam → groep Bericht → Annuleren · Versturen

### M3-087: Callout in een modal

Een relevante waarschuwing staat na de introductie vóór de betrokken gegevens/velden; alleen groepsspecifieke uitleg staat in die box. De modal zelf heeft geen extra waarschuwingsicoon in de titel. Herhaal gevolgen niet in drie waarschuwingen.

**Voorbeeld:** Importeren → waarschuwing over overschrijven → groep Importinstellingen → Annuleren · Importeren

### M3-088: Modal met validatiefouten

De modal blijft open en behoudt invoer. Fouten onder het veld; bij fouten in meerdere groepen een compacte samenvatting na de introductie met koppelingen. Focus op de eerste fout. Footer blijft bereikbaar; Opslaan wordt alleen tijdelijk geblokkeerd tijdens uitvoering.

**Voorbeeld:** Trigger bewerken → 2 velden controleren → fout bij E-mailadres → Opslaan

### M3-089: Modalbreedte en lange inhoud

Tekst, gegevens of één eenvoudige veldgroep: maximaal 32rem. Meerdere groepen: maximaal 42rem. Buitenrand minimaal 16px; binnenpadding 24px. Op korte schermen één scrollende body met bereikbare kop/voet, geen scrollgebied per groep.

**Voorbeeld:** 32rem eenvoudig / 42rem gegroepeerd / 16px buiten / 24px binnen

### M3-090: Modalheader en footer

Titel links zonder decoratief icoon, benoemde sluitknop rechts. Titel en subtitle vormen één groep met 8px ertussen. 24px tussen introductie, inhoudsgroepen en footer. Footer rechts: Annuleren ghost, daarna primaire of danger bevestiging; één Sluiten als annuleren niets betekent.

**Voorbeeld:** Titel + Sluiten → 8px → uitleg → 24px → inhoud → 24px → Annuleren · Opslaan

### M3-091: Afbeelding of document bekijken

Een media-preview is een benoemde ruime variant, maximaal 80rem en passend binnen de viewport. Behoud verhouding met contain; geen ui:box om alleen een afbeelding. Titel met bestandsnaam, benoemde sluitactie en alternatief bij een kapot bestand. Essentiële details en downloaden blijven bereikbaar.

**Voorbeeld:** header.jpg → afbeelding op passende schaal → Downloaden · Sluiten

### M3-092: Langere inhoud lezen

Voor chatgeschiedenis, documenttekst of een resultaat mag de leesmodal maximaal 48rem breed zijn. Eén scrollende body, geen disabled formulier. Datum, afzender en context blijven leesbaar. Alleen Sluiten, plus werkende domeinacties indien nodig.

**Voorbeeld:** Gesprek met Sam → tijdstempel · berichtgeschiedenis → Sluiten

### M3-093: Grote editor

Een omvangrijke revisie- of code-editor krijgt een expliciete canvasvariant of eigen route. Behoud context, dirty-beleid, één scrollend werkgebied en vaste hoofdacties. Gebruik niet ongemerkt de gewone 32rem-formuliermodal voor een volledige werkruimte.

**Voorbeeld:** Revisie bewerken → werkruimte → Niet-opgeslagen wijzigingen → Annuleren · Opslaan

### M3-094: QR, geheime sleutel en verificatie

MFA-inrichting groepeert QR/instructie en verificatiecode als aparte stappen binnen één taak. QR heeft tekstalternatief; sleutel bewust kopieerbaar en afgeschermd waar mogelijk. De sleutel gebruikt flux:input readonly copyable met het centrale icoon- en tooltippatroon uit M3-104. Bevestig pas na geldige code. Annuleren activeert niets en een herstelcode is geen gewone toast.

**Voorbeeld:** Beveiliging instellen → QR + sleutel → Verificatiecode → Annuleren · Bevestigen

### M3-095: Delen met link en embedcode

Deelmodal heeft teksttabs Link en Insluiten waar beide zinvol zijn. Ieder veld heeft een zichtbaar label en eigen Kopiëren-actie met succesfeedback. Kopieerbare inputwaarden, zoals de publieke link, gebruiken flux:input readonly copyable volgens M3-104; geen losse knop onder de input. QR en preview zijn aanvullend. Leesgegevens krijgen geen Opslaan; de footer bevat Sluiten. Een URL in een input gebruikt de native prefixgroep volgens M3-128; Kopiëren bevat ook het protocol.

**Voorbeeld:** Delen → Link · Insluiten → Publieke link → Kopiëren → Sluiten

### M3-096: Keuzelijst in een modal

Een zoekbare keuze- of koppeltaak behoudt zoekveld, selectieaantal en expliciet bereik. Gegevens staan in één lijst/tabel, geen kaart om iedere rij. Bevestigen gebruikt Koppelen of Selecteren; nul treffers houdt het zoekveld met zijn wiskruisje en de filterbediening beschikbaar; geen aparte criteriabalk.

**Voorbeeld:** Product koppelen → Zoeken → 2 geselecteerd → Annuleren · Koppelen


## Handelingen

### M3-097: Korte taak in modal

Gebruik een modal voor een korte toevoeg- of bevestigingstaak met één onderwerp. Titel en uitleg boven de gegroepeerde velden; Annuleren links van de primaire actie in de voet rechts. De knop gebruikt alleen het werkwoord, ook Toevoegen; het onderwerp staat in de modaltitel (M3-134).

**Voorbeeld:** Project toevoegen → Naam → Annuleren · Toevoegen

### M3-098: Bewerken met context

Een drawer is voor een beperkte bewerking naast de huidige detailcontext. Kop en voet blijven staan; alleen de body scrollt. Opslaan sluit en actualiseert; Annuleren gooit het concept weg. Modals en drawers hebben geen border-bottom of scheidingslijn onder de header en geen border-top of scheidingslijn boven de footer. Scheid introductie, inhoud en acties met de afgesproken ruimte. Voeg ook geen flux:separator of pseudo-element toe om deze lijnen terug te brengen. De native buitenrand van het overlay en de randen van inhoudelijke veldcards blijven behouden. Dit geldt voor vaste previews en geopende overlays.

**Voorbeeld:** Actie bewerken → Onderwerp · Afzender → Annuleren · Opslaan

### M3-099: Delen en preview

Delen en Preview staan als secundaire resourceacties rechts in de titelbalk, alleen als ze volledig werken. Preview is een vastgelegde uitzondering op werkwoordlabels. Benoem concept of gepubliceerd; publiceer nooit door preview.

**Voorbeeld:** Klanttevredenheid · Concept → Delen · Preview

### M3-100: Destructieve acties

Danger zone is laatste tab of sectie. Beschrijf gevolgen vóór de knop, knop op natuurlijke breedte links. Bevestigingsmodal toont objectgegevens. Getypte naam alleen bij aanzienlijk onomkeerbaar verlies.

**Voorbeeld:** Project verwijderen → gevolgen → Annuleren · Verwijderen

### M3-101: Gewone verwijderbevestiging

Titel noemt object + verwijderen. Vraag en gevolg staan samen, daarna recordgegevens. Annuleren links van Verwijderen. Geen getypte bevestiging zonder zwaar verlies.

**Voorbeeld:** Product verwijderen → Wil je dit product verwijderen? → Naam: Zomercollectie → Annuleren · Verwijderen

### M3-102: Bevestiging bij zwaar verlies

Vraag exacte objectnaam alleen bij onomkeerbare verwijdering van veel gekoppelde inhoud. Toon omvang en gevolgen en controleer de inhoud opnieuw op de server. Geen wachtwoord als decoratieve drempel. In het label “Typ [objectnaam] om te bevestigen” staat de objectnaam muted, met 4px ruimte ervoor en erna. Gebruik gap-x-1 op het inline-flex Flux-label, zodat de tekstfragmenten niet tegen elkaar staan.

**Voorbeeld:** Project verwijderen → 46 vragenlijsten gaan verloren → Typ Zomercollectie → Verwijderen

### M3-103: Archiveren, herstellen en ongedaan maken

Gebruik Archiveren alleen bij werkelijk herstelbare verplaatsing en Verwijderen bij echte verwijdering. Bied Herstellen waar ondersteund. Ongedaan maken verschijnt alleen als het resultaat technisch terug te draaien is.

**Voorbeeld:** Gearchiveerd → Herstellen / Definitief verwijderen → bevestiging

### M3-104: Externe links en kopiëren

Interne routes openen normaal. Externe preview mag in nieuw tabblad met benoemde context; geen nieuwe tab bij iedere link. Kopiëren van een inputwaarde gebeurt in alle zes producten altijd via de native flux:input copyable-optie. Bestaande waarden krijgen readonly. Geen losse kopieerknop naast of onder de input en geen eigen kopieerhandler per scherm. De ingebouwde icoonknop toont clipboard, met native Flux-tooltip "Kopiëren" en dezelfde toegankelijke naam. Pas nadat schrijven naar het klembord is gelukt, wisselt het icoon gedurende 2 seconden naar clipboard-check in groen (text-green-600, dark:text-green-400); daarna keert het clipboard terug. De knop blijft op dezelfde positie en behoudt focus; geen CSS-transition en geen extra succes-toast. Bij meerdere acties binnen één input staat er 4px (gap-1) vrije ruimte tussen de volledige klikvlakken. Ze zijn verticaal gecentreerd en overlappen ook bij hover of focus niet. Neutraliseer de negatieve inline-marges van de interne actieknoppen in de gedeelde inputcomponent en reserveer voldoende eindpadding voor alle acties, passend bij de inputmaat. Een input met één actie behoudt de standaard Flux-indeling; geen losse correcties per scherm. Bij een fout blijft het normale clipboard staan en verschijnt een korte foutmelding zonder de gekopieerde waarde. Dit geldt ook voor links, API-sleutels en handmatige MFA-sleutels; dupliceren van een record is een andere handeling. Configureer deze presentatie en succesafhandeling één keer in de gedeelde Flux-input/copyable-partial, zonder vendorbestanden te wijzigen, zodat elke copyable-input dezelfde werking krijgt. Bij een inputgroep kopieert de centrale integratie de betekenisvolle volledige waarde. Een URL met protocolprefix wordt inclusief dat protocol, pad, query en fragment gekopieerd volgens M3-128.

**Voorbeeld:** flux:input readonly copyable → clipboard met tooltip Kopiëren → na geslaagd kopiëren groen clipboard-check → na 2 seconden clipboard / Preview → nieuw tabblad


## Interactie

### M3-105: Volgorde wijzigen

Eén grip-vertical links. Slepen én toetsenbord via dezelfde greep; pijlen verplaatsen en kondigen positie aan. Geen dubbele omhoog/omlaagknoppen. Bewaar direct met herstel bij fout.

**Voorbeeld:** ⋮⋮ Contactgegevens → positie 2 van 3 → Omhoog met pijltoets

### M3-106: Opslagcontract

Formulieren slaan expliciet op. Autosave alleen in benoemde builders met zichtbare status. Voorkom dubbele submits, behoud invoer bij fouten en waarschuw bij weggaan met wijzigingen. Een fout sluit de editor nooit.

**Voorbeeld:** Niet-opgeslagen wijzigingen → Opslaan → De wijzigingen zijn opgeslagen.

### M3-107: Menu’s en tooltips

Bij maximaal 4 beschikbare rijacties staan alle acties als neutrale subtle-icoonknoppen direct naast elkaar. Vanaf 5 staan de 3 meest gebruikte acties direct, met Meer als vierde knop. De overige acties staan in de native Flux-dropdown rechts op de actielijn; daarin staan destructieve items als laatste, na een separator wanneer er ook gewone items zijn. Menu-items behouden een leesbaar tekstlabel en de destructieve menu-itemvariant. De directe Verwijderen-icoonknop blijft neutraal. Menu blijft binnen viewport en is bedienbaar met toetsenbord/touch. Iedere directe tabelactie, inclusief Meer en Verwijderen, toont verplicht een native Flux-tooltip bij hover en toetsenbordfocus; de tooltiptekst is gelijk aan de toegankelijke actienaam. Gebruik de tooltip-prop van flux:button en controleer de werkelijke zichtbaarheid in de browser. Een tooltip vervangt nooit een toegankelijke naam of essentiële uitleg.

**Voorbeeld:** Zomertrui: 4 neutrale icoonacties direct. Winterjas: 3 directe iconen + Meer → Delen ─ Verwijderen.

### M3-108: Modal openen en sluiten

Focus gaat naar passende inhoud, blijft in de modal en keert na sluiten terug naar de opener. Escape en zichtbare sluitactie werken. Bij onopgeslagen inhoud vraagt sluiten om bewaren of verwerpen; geen stille backdrop-annulering.

**Voorbeeld:** Openen → focus binnen modal → Escape → terug naar opener

### M3-109: Weggaan met wijzigingen

Waarschuw alleen als niet-opgeslagen data bestaat. Toon Blijven en Verlaten met duidelijke gevolgen. Tijdens echte opslag voorkom je dubbele acties; een mislukte opslag bewaart het concept.

**Voorbeeld:** Niet-opgeslagen wijzigingen → Blijven · Verlaten


## Toestanden

### M3-110: Foutpagina

Maak onderscheid tussen 403 geen toegang, 404 niet gevonden en systeemfout. Geef één veilige herstelactie. Geen stacktraces of verzonnen inhoud. Gebruik de bestaande foutpagina-opbouw uit de apps: layouts.message met ui:layout.error en de echte foutcode. Behoud de standaard h-screen-hoogte, verticaal en horizontaal gecentreerde inhoud, grote foutcode (6rem), bestaande foutuitleg en de knop Ga terug met arrow-left. Voeg geen hoogte-, lettergrootte- of andere vormgevingscorrecties aan het component toe, ook niet in de kijkversie. Dezelfde layout geldt voor 401, 403, 404, 419, 429, 500 en 503; de code bepaalt titel en tekst uit de bestaande vertalingen.

**Voorbeeld:** ui:layout.error code="404" → 404 → We hebben de pagina niet kunnen vinden. → ← Ga terug

### M3-111: Rechten

Verberg acties waarvoor bevoegdheid ontbreekt. Toon beschikbare leesgegevens als tekst. Alleen tijdelijke blokkades of pakketlimieten mogen zichtbaar disabled zijn met uitleg. Controleer opnieuw op de server.

**Voorbeeld:** Je kunt dit project bekijken. Wijzigingen worden door een beheerder gedaan.

### M3-112: Laden en herstel

Eerste lading krijgt een passende native Flux-skeleton met animate="shimmer" volgens M3-035; verversen behoudt bekende inhoud en context. Spinner bij de betrokken actie. Fout toont opnieuw proberen. Oude zoekreacties mogen nieuwe resultaten niet overschrijven.

**Voorbeeld:** Zoektekst blijft staan → Resultaten worden bijgewerkt… → Opnieuw proberen bij fout

### M3-113: Echt lege lijst

Geen inhoud binnen de huidige scope én geen actieve verfijning: contextuele lege melding met één toegestane eerste actie. Geen toolbar, zoekveld, filters, paginatie of leeg hulpzijpaneel.

**Voorbeeld:** Nog geen producten → Voeg je eerste product toe. → Product toevoegen

### M3-114: Geen treffers

Actieve zoektekst of filters met nul treffers: behoud de ingevulde zoek- en filterbediening. Wissen gebeurt in het zoekveld of de filterbediening zelf; geen extra criteriabalk, badges of losse wisknop. Gebruik geen eerste-gebruik-onboarding.

**Voorbeeld:** Zoekveld: onbekend → Geen resultaten → wissen met het kruisje in het zoekveld

### M3-115: Validatie en focus

Fout direct onder het veld, gekoppeld aan de input en in begrijpelijke taal. Na mislukte submit focus op de eerste fout; bij meerdere secties ook een compacte foutensamenvatting. Behoud alle invoer.

**Voorbeeld:** E-mailadres → Vul een geldig e-mailadres in. → focus in dit veld

### M3-116: Gelijktijdig bewerken

Overschrijf nieuwere wijzigingen niet stilzwijgend. Meld het conflict, behoud lokale invoer en bied de actuele versie of vergelijking. Een retry mag niet ongemerkt oude data doorzetten.

**Voorbeeld:** Dit item is intussen gewijzigd. → Huidige versie bekijken

### M3-117: Offline en sessie verlopen

Behoud invoer als de verbinding wegvalt of sessie verloopt. Meld wat nog niet is opgeslagen; herstelverbinding of herauthenticatie heeft een expliciet vervolg. Geen succesmelding bij een mislukte aanvraag.

**Voorbeeld:** Verbinding verbroken. Je wijzigingen zijn nog niet opgeslagen. → Opnieuw proberen

### M3-118: Waar feedback verschijnt

Notificaties na formulierverzendingen en jobacties gaan in alle zes producten altijd via de native Flux Toast-component. Gebruik één flux:toast-host in de gedeelde layout en Flux::toast(text: …) vanuit Livewire; gebruik $flux.toast({text: …}) alleen voor acties die daadwerkelijk in de browser plaatsvinden. Geen eigen toast, flash-alert of success-callout als vervanging. Kies de inhoud volgens M3-139: alleen een bericht voor een eenvoudige bevestiging, alleen een titel voor een korte zelfstandige status, of een titel met bericht als uitleg nodig is. Geef altijd een betekenisvolle statusvariant mee en toon het bijbehorende Lucide-icoon volgens M3-139. Toon succes pas na werkelijk geslaagd opslaan of uitvoeren. Een geaccepteerde job meldt dat deze is gestart of ingepland; pas de werkelijke voltooiing meldt het eindresultaat, ook na navigeren, via de bestaande job-/notificatie-integratie. Een queued job kan niet rechtstreeks een Livewire-toast naar de browser sturen: lever de uitkomst aan de betreffende gebruiker via de bestaande integratie en laat die Flux Toast aanroepen. Meld iedere uitkomst één keer; geen herhaling bij iedere poll. Gebruik variant="warning" voor gedeeltelijk slagen en variant="danger" voor mislukken; fouten die een herstelactie vereisen blijven zichtbaar met duration: 0 totdat ze worden gesloten. Veldvalidatie blijft bij het veld met focus op de eerste fout. Blijvende blokkades, voortgang en resultaatdetails blijven beschikbaar in de taakcontext; ze vervangen de actienotificatie niet. Een toast neemt geen focus over en volgt de native Flux-positie en toegankelijkheid.

**Voorbeeld:** Formulier opgeslagen → toast De wijzigingen zijn opgeslagen. · Job afgerond → toast Alle 200 producten zijn toegevoegd. · Job mislukt → danger-toast De import is mislukt. Probeer opnieuw.

## Workflows

### M3-119: Importeren

Bestand kiezen → kolommen koppelen → controle/voorbeeld → starten → resultaat. Benoem bijwerken, overslaan en fouten; bied een foutenbestand. Probeer alleen mislukte regels opnieuw als dat veilig kan. Toon Bestand, Koppelen, Controleren en Resultaat via flux:timeline volgens M3-120. Importeren is de definitieve actie bij Controleren, geen extra stapbadge.

**Voorbeeld:** Bestand → Koppelen → Controleren → Importeren → 128 toegevoegd · 3 mislukt

### M3-120: Stappen

Gebruik voor de weergave van opeenvolgende stappen altijd de native flux:timeline met flux:timeline.item, flux:timeline.indicator en flux:timeline.content. Geen badge-/chevronrij, tabs of zelfgebouwde stepper. Gebruik standaard de normale Flux-maat zonder size="lg": indicatoren van 32px, met stapnummers en korte stapnamen; status="complete" voor afgeronde stappen, status="current" voor de huidige stap en status="incomplete" voor volgende stappen. Markeer de huidige stap ook met aria-current="step". Gebruik de officiële spacing-variabelen: --flux-timeline-item-gap: 3rem (48px) en --flux-timeline-content-gap: 1rem (16px). Behoud de native lijnbreedte van 1px en de native 4px vrije ruimte tussen lijn en indicator. Verbindingslijnen zijn altijd muted, ook bij afgeronde stappen: bg-zinc-200 in light mode en dark:bg-zinc-700 in dark mode. Pas uitsluitend deze lijnkleur centraal aan in de gedeelde timeline-compositie; de statuskleuren van de indicatoren en de native componentopbouw blijven behouden. Geen losse maten of getekende lijnen per scherm en geen CSS-transitions. Toon de timeline horizontaal vanaf sm (640px) en verticaal daaronder, met dezelfde stappen en toestand. De timeline geeft voortgang weer; Vorige, Volgende en de definitieve actie bedienen de taak. Gebruik een stappenproces alleen bij afhankelijke taken. Vorige bewaart invoer; valideer de huidige stap vóór doorgaan en laat de laatste stap de gevolgen controleren vóór definitief uitvoeren.

**Voorbeeld:** flux:timeline → 1 Bedrijf (complete) → 2 Inhoud (current) → 3 Controleren (incomplete) → Vorige / Volgende

### M3-121: Achtergrondtaken

Toon In wachtrij, Bezig, Afgerond, Deels mislukt of Mislukt. Alleen echte aantallen geven procentuele voortgang. Gebruik hiervoor de native flux:progress met value voor het verwerkte aantal en max voor het totaal; behoud de Flux-standaardweergave en geef de component een toegankelijke naam. Zonder bekend totaal toon je de processtatus in plaats van een verzonnen voortgangsbalk. Details en herstel blijven na navigeren beschikbaar; stopactie alleen als stoppen werkelijk kan. Meld het starten, afronden, gedeeltelijk slagen en mislukken via Flux Toast volgens M3-118. Bewaar voortgang en resultaatdetails bij de taak; een resultaat-callout vervangt de toast niet.

**Voorbeeld:** Import gestart → 128/200 verwerkt → 197 gereed · 3 mislukt → Opnieuw proberen

### M3-122: Pakket en limiet

Pakketlimiet is geen ontbrekend recht. Toon huidig gebruik en concrete grens naast de geblokkeerde taak, met Pakket als ingang. Downgrade verbergt of verwijdert bestaande inhoud niet.

**Voorbeeld:** 100 van 100 documenten → Limiet bereikt → Pakket bekijken

### M3-123: Exportbereik

Export vermeldt huidige filters, periode, kolommen en selectie. Laat bij grote taken een exporttaak ontstaan met download na afronding. Geen stille export van het volledige account als een selectie zichtbaar is.

**Voorbeeld:** Exporteren → 12 geselecteerde producten · CSV → Exporteren

### M3-124: Gedeeltelijk mislukt

Rapporteer geslaagd, overgeslagen en mislukt apart. Bied foutenbestand of foutregels, plus veilig opnieuw proberen. Herhaal geslaagde mutaties nooit blind. Meld de gedeeltelijke uitkomst met een warning-toast volgens M3-118; de mislukte regels blijven als taakgegevens beschikbaar.

**Voorbeeld:** 197 geïmporteerd · 3 mislukt → Fouten downloaden · Opnieuw proberen


## Informatie

### M3-125: Uitklapbare details

Begin met de samenvatting. Laad details pas bij openen; spinner in de eigen kop. Behoud geopende items bij filteren en pagineren zolang ze nog bestaan.

**Voorbeeld:** Hoe tevreden ben je? → 128 antwoorden → Details openen

### M3-126: Planning

Kalender alleen bij een echte tijdstaak. Periode en tijdzone staan zichtbaar. Bied Vandaag en vorige/volgende periode; een lijstweergave bevat dezelfde acties en informatie op mobiel.

**Voorbeeld:** 2–6 november 2026 · Europe/Amsterdam → Vandaag · Vorige · Volgende

### M3-127: Toelichting

Veldhulp onder het veld, sectieuitleg bij de sectie, algemene hulp in gedeelde hulpdrawer. Tooltip is aanvullend en werkt ook op focus/touch. Essentiële beperkingen staan altijd zichtbaar. Bij afbeeldingsvelden staat de native Mach3UI ui:image-preview bij de Flux-bestandsinput volgens M3-062. De preview en vergroting vervangen de zichtbare bestandshulp niet.

**Voorbeeld:** Afbeelding → ui:image-preview → bestand kiezen → PNG of JPG · maximaal 500 kB. → tegel klikken opent ui:image-preview.modal

### M3-128: Getallen, geld en eenheden

Nederlandse weergave met decimale komma en duizendtalscheiding; valuta met symbool en vaste precisie waar nodig. Prijswaarden en prijsinvoer gebruiken altijd de bestaande Tailwind-class tabular-nums; de CSS-eigenschap is font-variant-numeric: tabular-nums. Prijzen staan rechts uitgelijnd, in tabellen inclusief de bijbehorende kolomkop: align="end" op zowel flux:table.column als flux:table.cell, met class="tabular-nums" op de cel. Prijsinvoer gebruikt text-end tabular-nums; andere prijsweergaven behouden eveneens tabular-nums. Overige meetwaarden staan rechts met tabulaire cijfers. Aantallen in tabelcellen, zoals voorraad, reacties of onderdelen, staan altijd in een neutrale Flux-badge size="sm", inclusief 0. De badge en de kolomkop staan horizontaal gecentreerd; zowel th als td hebben class="w-0" volgens M3-014. Toon eenheid bij waarde of kolom. Wanneer een prijs, percentage of URL via een tekstinput wordt ingevoerd of alleen-lezen getoond, gebruik je altijd de native flux:input.group met de passende flux:input.group.prefix en/of flux:input.group.suffix. Prijzen: het valutasymbool (zoals €) als prefix, alleen de numerieke waarde in de input; behoud input:class="tabular-nums text-end". Percentages: alleen het getal in de input en % als suffix, met inputmode="decimal" en tabular-nums text-end. URL’s: het werkelijke protocol als prefix (standaard https://); de input bevat host, pad, query en fragment zonder dat protocol nogmaals te tonen. Behoud een bestaande http://-URL als http:// en herken een volledig geplakte URL zonder dubbel protocol. Gebruik voor dit gesplitste tekstveld inputmode="url", autocomplete="url", autocapitalize="none" en spellcheck="false"; valideer en bewaar de volledige samengestelde URL via de gedeelde URL-afhandeling. Kopiëren blijft via flux:input copyable volgens M3-104 en neemt altijd de volledige URL inclusief protocol, query en fragment mee. Gebruik hiervoor één centrale affix-bewuste copyable-integratie; geen losse kopieerhandler per veld. Geld- en procenttekens zijn presentatie en worden niet als deel van de numerieke waarde opgeslagen. Labels en validatie horen bij de volledige groep; prefix en suffix zijn geen vervanging voor een label. Behoud de native Flux-groepsranden, kleuren, maatvoering en afstanden. Een prefix of suffix verschijnt alleen wanneer betekenisvol; voeg geen lege affixen toe. Dit voorschrift geldt voor tekstinputs, ook readonly; bestaande tabel-/tekstweergave en een percentagekeuze in een select behouden hun eigen component.

**Voorbeeld:** Prijs: [€] [24,95] · Percentage: [8,4] [%] · URL: [https://] [voorbeeld.nl/pad] · Kopiëren: https://voorbeeld.nl/pad

### M3-129: Datum en tijdzone

Absolute datums zijn ondubbelzinnig, bijvoorbeeld 2 nov 2026, 14:30. Planningen en rapportperioden noemen tijdzone. Relatieve tijd krijgt de absolute waarde op verzoek. Datum zonder tijd is geen UTC-moment.

**Voorbeeld:** 2 nov 2026, 14:30 · Europe/Amsterdam

### M3-130: Status, nul en onbekend

Status heeft vaste betekenis, tekst plus kleur. Concept neutraal, bezig informatief, geslaagd groen, aandacht amber, mislukt rood. Onderscheid 0, Niet ingevuld, Onbekend en Niet van toepassing.

**Voorbeeld:** 0 antwoorden ≠ Onbekend / Concept · Bezig · Afgerond · Mislukt

### M3-131: Lange namen en ontbrekende media

Laat namen en labels omlopen waar mogelijk. Alleen begrensde navigatie mag afkappen met volledig leesbare tekst op focus/touch. Toon mediafallback en foutstatus; belangrijke informatie verdwijnt niet achter ellipsen.

**Voorbeeld:** Een heel lange projectnaam blijft leesbaar → afbeelding niet beschikbaar

### M3-132: Grafieken en rapporten

Benoem maat, eenheid, periode en tijdzone. Gebruik stabiele serieskleuren plus labels, geen decoratieve regenboog. Nul is geen ontbrekende data. Bied een tekst/tabelalternatief en bruikbare touchdetails.

**Voorbeeld:** Antwoorden per dag · 2–8 nov 2026 → Geen gegevens is geen lijn op nul


## Schrijfwijzer

### M3-133: Actieknoppen

Actieknoppen gebruiken de infinitief: Opslaan, Bewerken, Verwijderen, Kopiëren, Versturen en Annuleren. In tabelrijen staat dit actielabel alleen in de tooltip en toegankelijke naam; de zichtbare knop bevat uitsluitend het icoon volgens M3-014. Geen objectnaam, punt of gebiedende wijs. Toevoegacties buiten modals zijn de expliciete uitzondering. In modals bevatten actieknoppen altijd alleen het werkwoord, ook Toevoegen; de objectnaam staat in de modaltitel. Preview is een vaste productterm. Keuze- en navigatiebediening, zoals Filters, Kolommen, Vorige en Volgende, behoudt haar herkenbare label. De titel of veldcontext maakt de handeling ondubbelzinnig.

**Voorbeeld:** Versturen

### M3-134: Toevoegacties

Een toevoegactie buiten een modal benoemt het object in enkelvoud, gevolgd door toevoegen: Product toevoegen, Gebruiker toevoegen, Revisie toevoegen. Binnen een modal heet de actieknop alleen Toevoegen; de modaltitel noemt het onderwerp, bijvoorbeeld Project toevoegen. Deze modalregel gaat vóór de algemene toevoegactie. Gebruik Toevoegen in plaats van Aanmaken.

**Voorbeeld:** Overzicht: Revisie toevoegen → modal: titel Revisie toevoegen → knop Toevoegen

### M3-135: Pagina- en modaltitels

Overzicht: meervoud, zoals Producten. Detail: recordnaam of duidelijke onderwerpnaam. Taak/modal: object + infinitief, zoals Product bewerken. Geen afsluitende punt.

**Voorbeeld:** Website toevoegen

### M3-136: Subtitles van pagina’s

Eén korte, concrete zin over de taak en reikwijdte. Begin waar passend met Beheer, Bekijk of Stel … in. Spreek de gebruiker aan met je. Eindig een volledige zin met een punt.

**Voorbeeld:** Beheer gebruikers en hun toegang tot dit account.

### M3-137: Sectietitels en uitleg

Een sectietitel is een korte naam voor de gegevensgroep. Bij een formuliergroep staat deze buiten de card via ui:section, met eventuele uitleg bij de titel. De toelichting beschrijft betekenis, gevolg of samenhang van de velden. Gebruik een concrete zin en behoud functioneel belangrijke uitleg. Prijsvelden in deze sectie gebruiken de native Flux-inputgroep met valutaprefix volgens M3-128. In een informatie- of statistiekkaart vormen titel en direct bijbehorende tekst of waarde één inhoudsgroep met 8px tussenruimte volgens M3-168.

**Voorbeeld:** De prijs inclusief btw wordt berekend uit de prijs exclusief btw en de btw-groep.

### M3-138: Bevestigingen en gevolgen

De titel noemt object en handeling. De tekst stelt een korte vraag en benoemt daarna concrete gevolgen. Recordgegevens staan apart. De bevestigingsknop bevat alleen het werkwoord.

**Voorbeeld:** Wil je dit product verwijderen? Bestaande bestellinks naar dit product werken daarna niet meer.

### M3-139: Meldingen en processtatus

Iedere toast toont altijd één Lucide-statusicoon: success → circle-check (native groene/lime statuskleur), info → info (native informatieve kleur), warning → triangle-alert (amber), danger → circle-x (rood). Geef de variant expliciet mee aan Flux::toast() of $flux.toast(); de gedeelde template gebruikt info als veilige standaard voor een ontbrekende variant. Gebruik de native Flux Toast-controller, slots, kleuren, positie, sluitbediening en afstanden. Vervang de ingebouwde status-SVG’s één keer in de gepubliceerde gedeelde flux/toast/index-partial door de Lucide-componenten, zonder vendorbestanden te wijzigen. Alle zes producten gebruiken dezelfde partial. De inhoud heeft precies één van drie vormen: alleen heading (titel), alleen text (bericht), of heading plus text. Bij alleen een titel vereist de geïnstalleerde PHP-API een lege text-parameter: Flux::toast(text: '', heading: 'Import gestart', variant: 'info'); in Alpine volstaan heading en variant. Een titel is een korte concrete status zonder punt; een bericht is een volledige concrete zin met punt. Gebruik beide alleen als het bericht extra uitleg geeft en de titel niet herhaalt. Laat een ontbrekende titel of bericht werkelijk leeg: geen lege regel, placeholder of extra tussenruimte. Behoud de native startuitlijning: het icoon staat links naast de inhoud en op de eerste tekstregel van heading, of van text wanneer heading ontbreekt; vervolgteksten beginnen op dezelfde inhoudslijn rechts van het icoon. Centreer het icoon nooit over de totale hoogte van meerdere tekstregels. Bij alleen een titel vervalt de ruimte tussen heading en een ontbrekend bericht. Regel dit centraal in de gedeelde template; geen correcties per toast of scherm en geen CSS-transitions. Notificaties van formulier- en jobacties volgen M3-118. Gebruik de echte uitkomst; een gestart proces is nog niet afgerond. Resultaatdetails blijven bij de taakgegevens en er verschijnt geen extra success-callout voor dezelfde uitkomst. Toon geen gevoelige waarden of technische stacktraces.

**Voorbeeld:** Alleen bericht: circle-check + De wijzigingen zijn opgeslagen. · Alleen titel: info + Import gestart · Titel en bericht: triangle-alert + Import gedeeltelijk afgerond / 197 producten zijn toegevoegd. Bij 3 producten ontbreekt het artikelnummer.

### M3-140: Lege lijsten en geen treffers

Eerste leegte: Nog geen [objecten], gevolgd door een passende eerste stap. Geen treffers: Geen resultaten, gevolgd door een korte herstelhint. Houd de tekst neutraal en feitelijk.

**Voorbeeld:** Nog geen projecten · Voeg je eerste project toe.

### M3-141: Veldlabels, hints en zoeken

Veldlabels zijn korte namen, zoals Naam en E-mailadres. Helptekst legt formaat, gevolg of beperking uit. Zoekplaceholder benoemt waar nuttig de doorzoekbare velden; een placeholder vervangt geen label.

**Voorbeeld:** Zoek op naam of artikelnummer…

### M3-142: Validatie en foutteksten

Vertel concreet wat er niet lukt en wat de gebruiker kan herstellen. Gebruik het zichtbare veldlabel, behoud invoer en maak onderscheid tussen invoerfout, ontbrekende rechten en systeemfout.

**Voorbeeld:** Vul het artikelnummer of de productnaam exact in.

### M3-143: Woordenlijst en uitzonderingen

Gebruik één term per betekenis. Toevoegen voegt een nieuw object toe; Opslaan bewaart wijzigingen; Bewerken opent invoer; Verwijderen verwijdert een record; Wissen verwijdert invoer of filters. Preview en Danger zone zijn vaste producttermen. Vorige en Volgende zijn navigatie.

**Voorbeeld:** Preview, Danger zone, Opslaan, Bewerken, Verwijderen, Versturen en Wissen hebben elk één vaste betekenis.

### M3-144: Aanspreekvorm en interpunctie

Gebruik je/jij, gewone zinskapitalisatie en geen punt na korte titels, labels en knoppen. Volledige uitleg- en resultaatzinnen krijgen een punt. Schrijf Nederlandse samenstellingen consequent.

**Voorbeeld:** Verwijder deze agent en de bijbehorende inhoud.

### M3-145: Vertalen en toegankelijkheid

Bewaar gedeelde actielabels centraal en domeinteksten per onderwerp. Houd betekenis, placeholders en meervoud gelijkwaardig tussen talen. Iedere icoonactie krijgt een passende toegankelijke naam.

**Voorbeeld:** Opslaan / Save; Verwijderen / Delete. Icoonacties hebben dezelfde toegankelijke naam als hun tekstvariant.


## Maatvoering

Maten zijn in rem vastgelegd; de px-referentie rekent met een rootgrootte van 16px. Breakpoints: sm 40rem, lg 64rem, xl 80rem. Een ontbrekend onderdeel laat ook geen eigen ruimte achter.

### M3-146: Sidebarbreedte

Normale desktopsidebar; op mobiel als apart navigatiepaneel, niet als permanente kolom.

**Voorbeeld:** 16rem / 256px

### M3-147: Sidebar binnenrand

Horizontale binnenruimte voor de navigatie; de component beheert dit.

**Voorbeeld:** 1rem / 16px

### M3-148: Onderkant sidebar

Minimale ruimte na de onderste navigatiegroep; veilige schermruimte telt apart mee.

**Voorbeeld:** 2rem / 32px

### M3-149: Logo-/switcher-inzet

Binnen de sidebar; 16 + 12 geeft een effectieve linkerlijn van 28px, gelijk aan de naviconen.

**Voorbeeld:** 0.75rem / 12px

### M3-150: Icoon–tekst in sidebar

Flux-specifieke interne afstand; niet vervangen door de gewone knopafstand.

**Voorbeeld:** 0.75rem / 12px

### M3-151: Gutter tussen sidebar en main

Geen extra witruimte tussen de twee panelen. De scheidingsborder is geen gutter.

**Voorbeeld:** 0rem / 0px

### M3-152: Binnenrand hoofdinhoud

Links en rechts gelijk; header, breadcrumbs, tabs en content gebruiken dezelfde containerlijn.

**Voorbeeld:** 1.5rem / 24px smal → 2rem / 32px vanaf 64rem

### M3-153: Bovenrand hoofdinhoud

Ruimte tussen de app-header en de paginakop.

**Voorbeeld:** 1.5rem / 24px smal → 2rem / 32px vanaf 64rem

### M3-154: Maximale main-container

Maximale buitenbreedte inclusief containerpadding. Geen tweede onafhankelijke max-width in losse pagina’s.

**Voorbeeld:** 80rem / 1280px

### M3-155: Hoogte app-header

Standaard: gedeelde minimummaat met de sidebarheader. De werkelijke hoogte mag groeien bij grotere tekst.

**Voorbeeld:** 4rem / 64px

### M3-156: Titel naar subtitle

Alleen tussen aanwezige tekstonderdelen; geen lege subtitle-wrapper.

**Voorbeeld:** 0.25rem / 4px

### M3-157: Koptekst naar kopacties

Minimale gap; ruimte door uitlijning is aanvullend, geen vaste lege kolom.

**Voorbeeld:** 1rem / 16px smal → 1.5rem / 24px vanaf 64rem

### M3-158: Tussen resourceacties

Resourceacties in de kop zijn een andere context dan compacte rijacties.

**Voorbeeld:** 1rem / 16px

### M3-159: Kop naar tabs

De nav-wrapper beheert de afstand; de eerste inhoudssectie voegt hier niets bovenop toe.

**Voorbeeld:** 1.5rem / 24px

### M3-160: Kop naar divider zonder tabs

Onderpadding van de kop als de navigatie ontbreekt.

**Voorbeeld:** 1.5rem / 24px

### M3-161: Divider/tabs naar inhoud

Eén startafstand na de gedeelde kop of navigatie.

**Voorbeeld:** 3rem / 48px

### M3-162: Tussen zelfstandige paginablokken

Een formulier telt als één paginablok en regelt zijn interne secties zelf.

**Voorbeeld:** 3rem / 48px

### M3-163: Ruimte na laatste inhoud

Effectieve eindruimte, één keer aangebracht. Main voegt onder deze pagina geen extra eindpadding toe.

**Voorbeeld:** 6rem / 96px

### M3-164: Tussen formuliersecties

De sectieverzameling beheert de tussenruimte; geen extra sibling-marge op de losse sectie.

**Voorbeeld:** 2rem / 32px

### M3-165: Uitlegrail naar veldrail

Smal: uitleg boven de velden met 12px ertussen. Breed: 32px tussen de kolommen.

**Voorbeeld:** 0.75rem / 12px smal → 2rem / 32px vanaf 80rem

### M3-166: Sectietitel naar uitleg

Alleen tussen bestaande titel en beschrijving.

**Voorbeeld:** 0.25rem / 4px

### M3-167: Padding standaardpaneel

De paneelrand naar de inhoud; geen extra algemene padding op het eerste kind.

**Voorbeeld:** 1.5rem / 24px

### M3-168: Blokken binnen een paneel

Afzonderlijke inhoudsblokken en formuliervelden binnen een paneel houden 24px tussenruimte. Een kaarttitel met direct bijbehorende uitleg, metadata, statusregel of statistiekwaarde is één samenhangende inhoudsgroep: gebruik daar 8px tussen titel en tekst/waarde. Dit geldt voor informatiekaarten, statistiekkaarten en resourcekaarten. Plaats die groep als één kind in de bestaande ui:box, met een gewone wrapper space-y-2 en daarbinnen flux:heading en flux:text of de betreffende waarde. Een titelrij met een actie of navigatiepijl blijft onderdeel van diezelfde groep. Gebruik ui:box title niet met een losse tekstsibling als die tekst direct bij de titel hoort: de native box zou daar het blokritme van 24px tussen zetten. Naar een werkelijk apart inhoudsblok, grafiek, voortgangsbalk, veldgroep of actierij blijft de normale 24px gelden. De ui:box behoudt zijn native 24px padding, rand, achtergrond en afronding. Voeg geen globale compact-CSS, nieuwe boxvariant of overrides op alle cards toe; de groepering bepaalt het ritme. Formuliersectietitels blijven buiten hun card en callouts houden hun native afstanden.

**Voorbeeld:** Kaart Statistieken: titel → 8px → 128 antwoorden · 84% respons. Met grafiek: dezelfde titelgroep → 24px → grafiek.

### M3-169: Paneel met binnenkaarten

De has-card-variant: buiteninzet 8px; interne kaartpadding blijft van de kaart. Semantisch verschillende insets mogen optellen.

**Voorbeeld:** 0.5rem / 8px

### M3-170: Tussen invoervelden

Van onderkant van een compleet veld inclusief hulp/fout naar het volgende veld.

**Voorbeeld:** 1.5rem / 24px

### M3-171: Tussen veldkolommen

Bij naast elkaar liggende velden; stapelen volgt een vast veldgroepritme.

**Voorbeeld:** 1rem / 16px

### M3-172: Label naar control

Flux block-variant beheert deze afstand. Geen extra paginamarge onder het label.

**Voorbeeld:** 0.75rem / 12px

### M3-173: Label naar uitleg vóór control

Als uitleg tussen label en control staat; de beschrijving naar de control blijft 12px.

**Voorbeeld:** 0.5rem / 8px

### M3-174: Control naar hulptekst

Onderliggende uitleg is onderdeel van het veld, niet van de afstand tussen velden.

**Voorbeeld:** 0.75rem / 12px

### M3-175: Tussen gewone actieknoppen

Onder meer annuleren en opslaan; geen marge op iedere knop.

**Voorbeeld:** 0.5rem / 8px

### M3-176: Tussen filters/zoekbediening

Vaste afspraak voor de interne rechter groep; de linker en rechter groep blijven onafhankelijk uitgelijnd.

**Voorbeeld:** 0.5rem / 8px

### M3-177: Minimale afstand actieclusters

Een minimumafstand, geen vaste spacer. Vrije ruimte naar de rechterrand ontstaat door de layout.

**Voorbeeld:** 1rem / 16px

### M3-178: Toolbar naar inhoud

Met selectie beheert dezelfde ouder de opeenvolgende zones; geen opgetelde losse marges. Er is geen aparte criteriabalk tussen toolbar en inhoud.

**Voorbeeld:** 1.5rem / 24px

### M3-179: Horizontale celpadding

Eerste begin- en laatste eindpadding zijn 0 zodat inhoud op de buitenlijn aansluit.

**Voorbeeld:** 0.75rem / 12px

### M3-180: Verticale celpadding

Celinhoud bepaalt mede de rijhoogte. Geen vaste rijhoogte voor inhoud die moet omlopen.

**Voorbeeld:** 0.75rem / 12px

### M3-181: Tussen compacte rijacties

Neutrale subtle-icoonknoppen in tabelrijen volgens M3-014: maximaal 4 zichtbaar, vanaf 5 acties de 3 meest gebruikte plus Meer; niet mengen met de 8px gewone actiecluster.

**Voorbeeld:** 0.25rem / 4px

### M3-182: Tussen definition-listregels

Geen extra padding op elke definition-listregel.

**Voorbeeld:** 0.75rem / 12px

### M3-183: Binnenruimte modal

De modal beheert zijn inset; ui:box kan daarbinnen een eigen 24px inset hebben. Geen scheidingsrand onder de header of boven de footer; gebruik de afgesproken blokafstand.

**Voorbeeld:** 1.5rem / 24px

### M3-184: Vrije viewport-rand modal

Standaard: dialogbreedte maximaal viewport min tweemaal deze ruimte; lange inhoud scrollt gecontroleerd.

**Voorbeeld:** 1rem / 16px smal → 1.5rem / 24px vanaf 40rem

### M3-185: Tussen modalblokken

Kop, uitleg, recordgegevens, invoer en footer vormen benoemde blokken. Ook in dit voorbeeld bevatten modalactieknoppen alleen het werkwoord: Annuleren en Toevoegen (M3-134). De blokken worden met ruimte gescheiden, zonder border onder de header of boven de footer.

**Voorbeeld:** 1.5rem / 24px

### M3-186: Padding buitenste drawer

Header, body en footer beheren hun eigen insets; geen tweede p-8 op de buitenste flyout. Geen border-bottom onder de drawerheader of border-top boven de footer.

**Voorbeeld:** 0rem / 0px

### M3-187: Header/body/footer zijrand

De drie delen delen dezelfde verticale lijn; sluitbediening reserveert eigen ruimte. Header en footer hebben geen interne scheidingslijnen.

**Voorbeeld:** 1.25rem / 20px smal → 2rem / 32px vanaf 40rem

### M3-188: Drawer body boven/onder

Eén scrollend inhoudsgebied; geen extra algemene binnencontainerpadding.

**Voorbeeld:** 1.5rem / 24px

### M3-189: Bovenruimte drawerfooter

Onderkant: max(16px, safe-area-inset-bottom); niet automatisch beide optellen. Deze ruimte staat boven de actieknoppen, zonder border-top.

**Voorbeeld:** 1rem / 16px

### M3-190: Boven/onder lege lijst

Gecentreerde rustige lege toestand; geen lege toolbar erboven.

**Voorbeeld:** 4rem / 64px

### M3-191: Uitleg naar eerste actie

Alleen aanwezig als er een toegestane vervolgstap is.

**Voorbeeld:** 1.5rem / 24px

### M3-192: Drawerheader boven/onder

Afzonderlijke header-inset uit py-5 / sm:py-6. Header, body en footer blijven horizontaal op dezelfde lijn.

**Voorbeeld:** 1.25rem / 20px smal → 1.5rem / 24px vanaf 40rem

### M3-193: Callout binnenruimte

Gebruik de ongewijzigde binnenruimte van flux:callout. Voeg geen eigen CSS, utilityclasses, inline styles of overrides voor padding, gap of margins toe. De geïnstalleerde Flux-versie bepaalt de interne afstanden.

**Voorbeeld:** Een gewone flux:callout met heading, tekst en eventueel een actions-slot, zonder afstandscorrecties.

### M3-194: Callout icoon naar titel

Gebruik het icon-attribuut op flux:callout. Flux plaatst het icoon links van de inhoudskolom en beheert de afstand tot titel en tekst; voeg geen eigen gap of marge toe.

**Voorbeeld:** flux:callout met icon="triangle-alert", met daarbinnen een heading Bestaande waarden overschrijven en de toelichting op dezelfde verticale lijn.

### M3-195: Callout betekenisicoon

Gebruik één Lucide-icoon via icon op flux:callout. Laat de standaard icoongrootte van Flux intact; geen eigen CSS of size-class en geen extra icoon in flux:callout.heading.

**Voorbeeld:** Het standaard callouticoon van flux:callout, links naast de titel en toelichting.

### M3-196: Callout titel naar tekst

Laat flux:callout de afstand tussen heading en tekst bepalen. Voeg geen losse margins, gaps of CSS-correcties toe.

**Voorbeeld:** flux:callout.heading gevolgd door flux:callout.text met de standaard componentafstand.

### M3-197: Callout tekst naar actie

Plaats acties in het actions-slot van flux:callout. Behoud de standaard plaatsing en interne afstanden van Flux, zonder eigen padding, margins of overrides.

**Voorbeeld:** Een callout met titel, uitleg en Controleren in het actions-slot.

### M3-198: Modal titel naar subtitle

8px tussen modalhoofdtitel en uitleg; de hele introductie is één groep.

**Voorbeeld:** 0.5rem / 8px


## Ruimteregels

### M3-199: Bestaande componentafstanden

Gebruik de bestaande afstanden van Flux en Mach3UI. De concrete afspraken in dit handboek bepalen de ruimte tussen componenten en secties. Introduceer geen eigen systeem van maatrollen of extra CSS-variabelen.

**Voorbeeld:** ui:box behoudt zijn eigen binnenruimte; gewone actieknoppen staan met 8px tussenruimte naast elkaar.

### M3-200: Eén eigenaar per tussenruimte

De ouder beheert ruimte tussen zijn kinderen; het component beheert zijn eigen padding. Voor dezelfde relatie gebruik je niet tegelijk parent-gap, child-margin en lege spacer.

**Voorbeeld:** De ouder beheert ruimte tussen zijn kinderen; het component beheert zijn eigen padding

### M3-201: Sidebar en main

Sidebar 256px met 16px interne inzet; main 24px smal / 32px breed. Tussen de panelen geen extra gutter. Header en main delen de containerlijn.

**Voorbeeld:** Sidebar 256px met 16px interne inzet; main 24px smal / 32px breed

### M3-202: Pagina versus formuliersectie

Zelfstandige paginablokken: 48px. Secties binnen één formulier: 32px. Blokken/velden binnen een paneel: 24px. Deze niveaus zijn expliciet verschillend. Binnen een informatie- of statistiekkaart geldt de compacte uitzondering van M3-168: 8px tussen de titel en direct bijbehorende tekst of waarde.

**Voorbeeld:** Zelfstandige paginablokken: 48px

### M3-203: Verticale uitlijnlijnen

Titel, beschrijving, paneel, veldgroep en opslagactie delen benoemde rails. Een bare opslagsectie blijft onder de veldrail. Op smal scherm volgt dezelfde leesvolgorde.

**Voorbeeld:** Titel, beschrijving, paneel, veldgroep en opslagactie delen benoemde rails

### M3-204: Geneste panelen

Padding op verschillende oppervlakken kan bewust optellen: modal 24px + paneel 24px geeft 48px tot de paneelinhoud. De Mach3UI kaartvariant gebruikt bewust een 8px buiteninzet.

**Voorbeeld:** Padding op verschillende oppervlakken kan bewust optellen: modal 24px + paneel 24px geeft 48px tot de paneelinhoud

### M3-205: Velden, hulp en fouten

Een veld omvat label, control, hulp en fout. Interne afstand komt uit de Flux-variant; de veldgroep beheert de 24px naar het volgende veld. Fouttekst mag het volgende veld naar beneden duwen.

**Voorbeeld:** Een veld omvat label, control, hulp en fout

### M3-206: Dichtheid per componentrol

Benoemde compacte rijacties 4px; gewone acties 8px; kopacties 16px. Dezelfde rol gebruikt in ieder product dezelfde maat, met voldoende klikgebied voor touch.

**Voorbeeld:** Benoemde compacte rijacties 4px; gewone acties 8px; kopacties 16px

### M3-207: Modals en drawers

Modal inset 24px; drawer-shell 0, waarna header/body/footer één zijrand van 20/32px delen. Footer respecteert de veilige schermrand. Eén beheerd scrollgebied.

**Voorbeeld:** Modal inset 24px; drawer-shell 0, waarna header/body/footer één zijrand van 20/32px delen

### M3-208: Responsive en grotere tekst

Gebruik expliciete smalle/brede waarden, rem en minimumhoogtes waar inhoud moet kunnen groeien. Test langere vertalingen, grotere tekst, RTL en een smalle contentkolom naast een zijpaneel.

**Voorbeeld:** Gebruik expliciete smalle/brede waarden, rem en minimumhoogtes waar inhoud moet kunnen groeien

### M3-209: Sticky lagen en veilige randen

Sticky posities worden afgeleid van de aanwezige accountaccentbalk, veilige bovenrand en werkelijke headerhoogte. De account-switcher staat fixed bovenaan met 40px hoogte, de app krijgt pt-10 en de sticky app-header top-10. Sidebar, app-header, tabs en drawerfooter behouden hun gedeelde lagen- en offsetcontract.

**Voorbeeld:** Sticky posities worden afgeleid van aanwezige banner, veilige bovenrand en werkelijke headerhoogte

### M3-210: Eindruimte van de pagina

Standaard: één effectieve eindruimte van 96px. Leg vast welke layout die aanbrengt; een buitenste main telt voor dit schermtype niet nogmaals 24/32px onderpadding op.

**Voorbeeld:** Standaard: één effectieve eindruimte van 96px

### M3-211: Verdwijnende onderdelen

Een ontbrekende subtitle, actie, toolbar, tabregel of paneel laat geen eigen gap, border of lege wrapper achter. De resterende zones behouden hun normale onderlinge maat.

**Voorbeeld:** Een ontbrekende subtitle, actie, toolbar, tabregel of paneel laat geen eigen gap, border of lege wrapper achter

### M3-212: Ruimteafspraken onderhouden

Leg concrete afstanden, toepassingssituatie en responsive varianten in dit handboek vast. Hergebruik de bestaande componenten en controleer hun weergave bij updates. Voeg hiervoor geen apart systeem van maatrollen of tokens toe.

**Voorbeeld:** Tussen formuliersecties 32px; tussen zelfstandige paginablokken 48px. Calloutafstanden blijven de Flux-standaard.

## Fundament

### M3-213: Iconen en semantiek

Alle UI-iconen zijn altijd afkomstig uit Lucide, in alle zes producten en iedere UI-context. Dit geldt voor expliciet gekozen iconen én interne componenticonen: navigatie, tabs, breadcrumbs, knoppen, tabelacties, sortering, paginatie, filters, inputs, select-/dropdownpijlen, validatie, callouts, toasts, modal-/drawersluitknoppen, mediafallbacks en laad-/voortgangsindicatoren. Ook publieke formulieren, embeds, checkout en overige eigen gerenderde interfaces volgen deze iconensetafspraak. Logo’s, QR-codes, gebruikersafbeeldingen en inhoudelijke illustraties zijn beeldmateriaal en worden niet als UI-icoon gebruikt. Gebruik geen Heroicons, Font Awesome, gemengde iconensets, emoji, Unicode-symbolen of zelfgetekende SVG-/CSS-vormen als UI-icoon. Lucide-SVG’s die via de gedeelde Flux-iconcomponent zijn gepubliceerd zijn wel de bedoelde implementatie. Controleer de werkelijke SVG-bron; een icon-prop of bestandsnaam alleen bewijst niet dat het Lucide is. Gebruik bestaande gedeelde Lucide-componenten en echte Lucide-namen; hergebruik dezelfde betekenis en hetzelfde icoon in ieder product. Ontbreekt een icoon, voeg de officiële Lucide-component centraal toe. Verwijs bestaande interne Flux-icoonnamen via gedeelde aliases naar Lucide. Heeft een vendorcomponent een ingebouwde SVG zonder icon-slot, vervang die één keer in de gepubliceerde gedeelde componentpartial, met behoud van native bediening, toegankelijkheid, maten, afstanden en statuskleuren. Wijzig geen vendorbestanden en maak geen losse vervanging per scherm. Controleer ook de laad-, fout-, lege, geselecteerde en geopende toestanden; daar kunnen verborgen standaardiconen verschijnen. De keuze voor Lucide gaat vóór de generieke Flux-documentatie of skills die Heroicons als standaard noemen. Plus hoort alleen bij een compacte invoegactie; gewone toevoeg- en opslagknoppen buiten tabelrijen blijven tekst zonder icoon. Binnen tabelrijen gelden de icoonknoppen van M3-014. Kleuren houden een vaste betekenis met tekst of een icoon erbij.

**Voorbeeld:** square-pen Bewerken · trash-2 Verwijderen · clipboard Kopiëren · x Sluiten · chevron-down Openen · loader-circle Laden · circle-check Geslaagd

### M3-214: Mobiel en reflow

Behoud dezelfde taken bij 320px en grotere tekst. Stapel taakclusters in leesvolgorde. Alleen de tabel mag lokaal horizontaal scrollen. Touchdoelen bij voorkeur minimaal 44×44px; nooit een essentiële actie alleen bij hover.

**Voorbeeld:** Acties → Filters → Zoeken → lokaal scrollbare tabel

### M3-215: Merk en thema

De zes producten delen structuur, componenten en semantische kleuren. Alleen het centrale merkaccent en logo variëren. Light/dark en private label krijgen eigen contrastcontrole; geen losse paginakleuren. In de main app-layout is de logohoogte voor ieder product en private label 12px via ui:logo size="base"; alleen de afbeelding en passende light-/darkvariant wisselen. Dit is de maat van het app-shelllogo; het auth-logo behoudt zijn eigen auth-layoutmaat.

**Voorbeeld:** Centraal merkaccent, dezelfde componenten en dezelfde kleuren voor succes, aandacht en fouten.

### M3-216: Teksthiërarchie

Volg de gedeelde Flux-typografieschaal: één h1, sectietitels daaronder, normale body en terughoudende muted uitleg. Geen extra pagina-eigen groottes, vetten of hoofdletters om nadruk te forceren. Een muted tekstfragment midden in een zin houdt zichtbare woordruimte aan beide kanten. In een Flux-label met losse flexfragmenten gebruik je gap-x-1 (4px); in gewone lopende tekst behoud je normale spaties.

**Voorbeeld:** Producten / Beheer producten, prijzen en voorraad. / Algemeen / Naam

### M3-217: Knophiërarchie

Eén primaire actie per taakgroep. Opslaan én toevoegen buiten tabelrijen gebruiken primary zonder icoon; binnen tabelrijen gebruiken alle directe acties subtle, ook Verwijderen, met maximaal 4 knoppen volgens M3-014; secundair neutraal, Annuleren ghost, definitief destructief danger. Succesgroen is feedback, geen vaste opslagkleur. In modals gebruiken actieknoppen alleen het werkwoord; een toevoegactie heet daar Toevoegen (M3-134).

**Voorbeeld:** Annuleren · Opslaan / Product toevoegen / Verwijderen

### M3-218: Toetsenbord en zichtbare focus

Iedere taak werkt zonder muis. Focus is zichtbaar en niet bedekt door sticky lagen. DOM-volgorde volgt de leesvolgorde; geen positieve tabindex. Gebruik native controls en lever een alternatief voor slepen.

**Voorbeeld:** Tab → Naam → Opslaan / drag-alternatief via pijltjestoetsen

### M3-219: Contrast en beweging

Richt op WCAG 2.2 AA: gewone tekst minimaal 4,5:1, grote tekst 3:1, relevante controlgrenzen 3:1. Betekenis niet alleen in kleur. Gebruik nergens CSS-transitions, ook niet alleen bij reduced motion: alle toestandswisselingen zijn direct. Geen x-transition, hover-transforms of smooth scrolling. Functionele laadindicatoren, waaronder de native Flux-skeleton met shimmer, mogen animeren en respecteren prefers-reduced-motion; voeg geen decoratieve herhaalanimatie toe.

**Voorbeeld:** Fout = rood én fouttekst / hoverrand en open/dicht direct zichtbaar, zonder transition

### M3-220: Nieuwe situatie en uitzondering

Zoek eerst het patroon-ID in dit register. Gebruik gedeelde componenten. Een uitzondering noemt taak, reden, toepassingsgrens en eigenaar; wijzig de standaard centraal, versieer en controleer betrokken schermtoestanden.

**Voorbeeld:** Nieuwe functie → patroon kiezen → component hergebruiken → lege/fout/mobiele toestand toetsen


## Aparte scope

### M3-221: Publieke interfaces

Adminregels gelden niet automatisch voor publieke formulieren, embeds, checkout, e-mail of PDF. Registreer een apart contract en houd bestaande afgesproken klantbranding en gedragscompatibiliteit intact. De algemene verplichting om alle UI-iconen uit Lucide te gebruiken (M3-213) geldt wel voor deze eigen interfaces; afwijkende branding betekent geen afwijkende iconenset.

**Voorbeeld:** Beheer → gedeelde Mach3-UI / Publiek formulier → eigen bestaand contract

## Componentkeuze en Flux-documentatie

Dit handboek bepaalt welk patroon bij een situatie hoort. De officiële Flux-documentatie bepaalt hoe de betreffende Flux-component wordt gebruikt; de geïnstalleerde versie bepaalt welke API beschikbaar is. Bewaar hier de keuzes en verwijzingen, geen volledige kopie van de Flux-documentatie. De tijdelijke preview is een hulpmiddel om de afspraken te beoordelen, geen zelfstandige bron voor de component-API.

### Verplichte werkwijze vóór het bouwen

1. Bepaal het schermtype, de taak en de relevante toestanden. Zoek de bijbehorende M3-afspraken in dit bestand.
2. Controleer de geïnstalleerde versies van Flux en Mach3UI en zoek een bestaand gedeeld component of patroon voor die taak.
3. Kies met onderstaande tabel de componentfamilie. Raadpleeg de bijbehorende officiële documentatie vóór je de markup schrijft of wijzigt. Gebruik `search-docs` als die tool beschikbaar is; raadpleeg anders de officiële componentpagina. Controleer bij een versieverschil ook de geïnstalleerde componentbron. Gebruik geen props uit een andere versie en verzin geen componentnamen.
4. Pas de afgesproken variant, iconen, tekst en positie toe met de officiële API. Controleer volgens M3-213 dat alle zichtbare én interne componenticonen uit Lucide komen; een standaard Flux-SVG is geen uitzondering. Behoud de interne Flux-opbouw en afstanden. Ontbreekt een passende component, controleer eerst het aanbod van Flux en Mach3UI voordat je een eigen oplossing bouwt.
5. Controleer de gerenderde uitkomst en relevante interacties. Vermeld bij oplevering welke afspraken en componenten zijn toegepast en welke controle is uitgevoerd. Een afwijking van de standaard vraagt een expliciete, vastgelegde keuze.

### Globaal uitschakelen van CSS-transitions

Leg dit één keer vast in de gedeelde stylesheet, na de componentimports, zodat ook vendorcomponenten dezelfde afspraak volgen. Voeg hiervoor geen losse overrides aan individuele schermen of componentinstanties toe en wijzig geen vendorbestanden.

```css
*, *::before, *::after, *::backdrop {
    transition: none !important;
    scroll-behavior: auto !important;
}
```

Verwijder eigen transition-, duration- en easing-instructies voor overgangen uit nieuwe of aangepaste code; de globale regel vangt de standaardovergangen van componenten af. De kaart-hover verandert alleen de bestaande borderkleur en blijft dus zonder verspringing direct zichtbaar.

### Situatie naar component

De tabel geeft de eerste keuze; de genoemde afspraken bepalen de verdere samenstelling en toestanden.

| Situatie | Component en toepassing | Afspraken | Componentdocumentatie |
| --- | --- | --- | --- |
| App-shell en globale navigatie | Bestaande gedeelde layout met `flux:sidebar`, `flux:header`, `flux:main`; geen nieuwe shell per scherm | M3-001–M3-008 | [Sidebar](https://fluxui.dev/components/sidebar), [Header](https://fluxui.dev/components/header), geïnstalleerde Mach3UI-layouts |
| Paginakop, secties en panelen | `ui:layout.main.content`; veldgroepen via `ui:section` met titel buiten de card; `ui:box` voor zelfstandige panelen; titels en tekst met Flux | M3-009, M3-057, M3-216 | Geïnstalleerde Mach3UI-componenten, [Heading](https://fluxui.dev/components/heading), [Text](https://fluxui.dev/components/text) |
| Terugnavigatie en onderdeelnavigatie | `flux:breadcrumbs` en `flux:tabs`; de taak bepaalt de hiërarchie | M3-004, M3-010–M3-012 | [Breadcrumbs](https://fluxui.dev/components/breadcrumbs), [Tabs](https://fluxui.dev/components/tabs) |
| Toevoegen, opslaan, annuleren en verwijderen | `flux:button` met de afgesproken rolvariant; één primaire actie per taakgroep | M3-217 en Schrijfwijzer | [Button](https://fluxui.dev/components/button) |
| Zoekveld, filters en actiemenu | `flux:input`, `flux:dropdown` met passende `flux:menu` of `flux:popover`; geen zelfgebouwde popup | Overzichten, M3-107 | [Input](https://fluxui.dev/components/input), [Dropdown](https://fluxui.dev/components/dropdown), [Popover](https://fluxui.dev/components/popover) |
| Overzicht met kolommen en rijen | `flux:table` met gecentreerde badgekolommen (th en td: `w-0`), aantallen als badges en uitsluitend icoonknoppen voor rijacties volgens M3-014 en standaard `flux:pagination :paginator`; paginagrootte links, native Flux-paginabediening rechts | Overzichten, Lijsttoestanden, Compositieafspraken | [Table](https://fluxui.dev/components/table), [Pagination](https://fluxui.dev/components/pagination) |
| Echte leegte en nul zoektreffers | Bestaande Mach3UI-empty-state voor echte leegte; behoud zoekbediening bij nul treffers volgens de betreffende afspraak | Lijsttoestanden | Geïnstalleerde Mach3UI-empty-state, [Input](https://fluxui.dev/components/input) |
| Formulierveld, hulp en validatie | `flux:field`, `flux:label`, passende input, `flux:description`, `flux:error`; geen eigen veldconstructie | Invoer | [Field](https://fluxui.dev/components/field), [Input](https://fluxui.dev/components/input) |
| Afbeeldingsveld met huidige afbeelding of uploadpreview | `ui:image-preview :src` met passende Flux-bestandsinput, zichtbare bestandshulp en één `ui:image-preview.modal`; native placeholder zonder src | M3-062, M3-127, M3-131 | Geïnstalleerde Mach3UI image-preview en image-preview.modal |
| Prijs, percentage of URL in een tekstinput | `flux:input.group` met valuta-/protocolprefix of procent-suffix; numerieke input rechts met tabular-nums; URL-copyable kopieert de volledige samengestelde URL | M3-063, M3-104, M3-128, M3-137 | [Input groups](https://fluxui.dev/components/input#text-prefixes-and-suffixes), geïnstalleerde prefix-/suffixcomponenten |
| Inputwaarde kopiëren | `flux:input readonly copyable`; geheimen ook `type="password" viewable`; centrale input/copyable-partial met clipboard, tooltip Kopiëren en groen clipboard-check na succes | M3-069, M3-094, M3-104 | [Input: copyable](https://fluxui.dev/components/input#clearable-copyable-and-viewable-inputs), [Tooltip](https://fluxui.dev/components/tooltip) |
| Keuze uit waarden | `flux:select`, `flux:radio` of `flux:checkbox` volgens aantal keuzes, enkel-/meervoudigheid en taak | Invoer | [Select](https://fluxui.dev/components/select), [Radio](https://fluxui.dev/components/radio), [Checkbox](https://fluxui.dev/components/checkbox) |
| Taakbrede toelichting, voortgang of blokkade | `flux:callout` met betekenisicoon op de root; heading en tekst samen rechts daarvan; variant volgens de situatie | M3-070–M3-081, M3-193–M3-197 | [Callout](https://fluxui.dev/components/callout) |
| Notificaties van formulierverzendingen en jobacties, inclusief gedeeltelijk slagen en mislukken | Native `flux:toast` met expliciete statusvariant en Lucide-statusicoon; heading, text of beide volgens M3-139; jobuitkomsten via bestaande notificatie-integratie, zonder dubbele meldingen | M3-118, M3-121, M3-139 | [Toast](https://fluxui.dev/components/toast) |
| Modal of bevestiging | Echte `flux:modal` met de bestaande Mach3UI-themalaag (`dark:bg-zinc-850`), afgesproken tekst-, gegevens- of formulieropbouw en eigen bevestigingspatroon voor definitieve acties | Modals en Verwijderen | [Modal](https://fluxui.dev/components/modal) |
| Drawer met bewerking | Bestaande gedeelde draweroplossing op basis van de geïnstalleerde Flux-modalvariant | Drawer- en overlayafspraken | [Modal](https://fluxui.dev/components/modal), geïnstalleerde gedeelde drawer |
| Recordgegevens zonder bewerking | `ui:list variant="definition"` in de afgesproken context; geen readonly formulier als gegevenslijst | Detail- en modalafspraken | Geïnstalleerde Mach3UI-list |
| Stappenproces en importstappen | Native `flux:timeline` in standaardmaat (32px), met genummerde indicators, spacingvariabelen 3rem/1rem en muted verbindingslijnen; status complete/current/incomplete; horizontaal vanaf sm, verticaal daaronder | M3-119–M3-120 | [Timeline en spacing](https://fluxui.dev/components/timeline#spacing) |
| Meetbare upload- en procesvoortgang | `flux:progress` met `value`, `max` en toegankelijke naam; standaardvorm, -hoogte en -kleur; geen eigen balk | M3-062, M3-121 | [Progress](https://fluxui.dev/components/progress) |
| Status, aanvullende hulp en laden | `flux:badge`, `flux:tooltip`, `flux:skeleton.group animate="shimmer"` met native skeletons; essentiële uitleg blijft zichtbaar | Toestanden, M3-127 | [Badge](https://fluxui.dev/components/badge), [Tooltip](https://fluxui.dev/components/tooltip), [Skeleton](https://fluxui.dev/components/skeleton) |
| Datum, bestanden en rijke tekst | Gebruik de passende geïnstalleerde Flux/Mach3UI-component; behoud het bestaande gegevens- en opslagcontract | Invoer en specialistische schermen | [Date picker](https://fluxui.dev/components/date-picker), [File upload](https://fluxui.dev/components/file-upload), [Editor](https://fluxui.dev/components/editor) |

### Getrouwheid van de kijkversie

De gecontroleerde componentbasis op 3 november 2026 is Flux en Flux Pro 2.20.0 met Mach3UI 5.1.0, geladen via dezelfde stylesheet als de beheerapps. Het handboek en expliciet goedgekeurde aanvullingen bepalen het doel; de componentbron van deze versie bepaalt de native opbouw. De bestaande producten draaien nog niet allemaal dezelfde pakketversies. Voor een identiek resultaat hoort de uitrol daarom ook één geteste set componentversies te gebruiken. Een pakketupgrade vraagt opnieuw controle van de betrokken previews en schermen.

- Ieder van de 221 voorbeelden toont de bedoelde situatie direct. Geen lege fallback, verkeerd gekoppelde verwijdermodal of vervangende schets van een beschikbare component.
- Vaste modals en drawers renderen flux:modal, inclusief de native sluitbediening waar die van toepassing is. De vaste en geopende variant gebruiken dezelfde inhoud. Achtergrond, rand/ring, schaduw, padding, typografie en veldopbouw worden niet in een previewcard nagebouwd.
- Alleen de positie, zichtbaarheid en begrenzing aan het voorbeeldkader mogen worden aangepast: een modal staat daar in de documentstroom, een drawer binnen de beschikbare voorbeeldhoogte en een sidebar binnen het shellkader. De gesloten-modal-focusplaceholder blijft uit de vaste weergave. Een vaste preview opent geen focusval of backdrop; Openen test het echte overlaygedrag.
- Overige onderdelen gebruiken hun eigen renderer: ui:layout.error, ui:layout.empty-state, ui:section, ui:box, Flux-tabellen, sorteerbediening, paginatie, callouts, skeletons, progress, editors en kalender-/invoercomponenten. Een vaste toast gebruikt hetzelfde native Flux-toasttemplate met de centrale Lucide-statusiconen als een echte toast; geen afzonderlijke HTML-versie. De gedeelde template laat bij ontbrekend bericht de heading-onderruimte weg en behoudt verder de native eerste-regeluitlijning.
- Meetvoorbeelden behouden de echte componentafstanden. Geen ingeschoven gekleurde spacers, aangepaste padding, box-shadows of binnen de component geplaatste meetlabels. De maat en situatie worden naast het voorbeeld uitgelegd. De paginalayout behoudt ook haar echte eindruimte.
- Smalle schermen worden met de echte viewport en dezelfde schermroute gecontroleerd. Een naast elkaar getoond mobiel voorbeeld gebruikt die route in een smal iframe; het bouwt de mobiele UI niet opnieuw op. Het voorbeeldkader mag een intrinsiek breed onderdeel horizontaal bereikbaar houden, zonder het hele scherm breder te maken.
- Voorbeeldgegevens zijn fictief. De MFA-preview gebruikt dezelfde QR-renderer als de bestaande authenticatiecode met een openbare demosleutel. Er wordt geen echte MFA-configuratie aangemaakt.

Controleer na een wijziging alle betrokken vaste voorbeelden én de geopende variant. Vergelijk berekende stijlen en relevante afstanden, controleer consolefouten, ontbrekende inhoud, tabeluitlijning, tooltips, laadcomponenten en overflow bij brede en smalle weergave. De 221 afspraakcodes blijven stabiel; een correctie in de kijkversie is pas afgerond wanneer het handboek en het wijzigingslog zijn bijgewerkt.

### Opname in de gedeelde skill en projecten

De gedeelde UI-skill moet op UI-werk van toepassing zijn en bovenstaande stappen uitvoeren. De projectinstructies van ieder product moeten naar dezelfde beheerde versie van dit handboek en die skill verwijzen en het raadplegen vóór UI-wijzigingen verplicht stellen. Kopieer niet per project een eigen set regels die uiteen kan lopen. Een review moet de gekozen componenten en gerenderde uitkomst toetsen aan de toepasselijke M3-afspraken en de Flux-API. Instructies ondersteunen dit proces; ze garanderen op zichzelf niet dat iedere implementatie correct is.

Dit beschrijft de vereiste invoering. De aanwezigheid van dit hoofdstuk betekent niet dat de skill en verwijzingen al in alle zes projecten zijn geïnstalleerd.

## Controle bij oplevering

Controleer de toepasselijke afspraken in dit bestand voor de zichtbare componenten en hun toestanden. Loop de normale taak, echte leegte, nul treffers, ontbreken van acties, validatie, laden, herstel, beperkte rechten, lange teksten, dark/light mode en smalle schermen na. Controleer ook toetsenbordbediening, focus, terugnavigatie en behoud van invoer. Controleer bij iedere tabelactie dat de native Flux-tooltip daadwerkelijk verschijnt bij hover en toetsenbordfocus, inclusief Meer en Verwijderen. Controleer bij klikbare cards de hoverrand en toetsenbordfocus, en controleer dat de berekende transition-duration overal 0s is, inclusief componentinterne en pseudo-elementstijlen. Gebruik bij wijzigingen aan gedeelde componenten dezelfde controle voor de betrokken schermtypen.

## Wijzigingen doorgeven en verwerken

Geef wijzigingen door in de chat. Noem waar mogelijk de afspraakcode, bijvoorbeeld M3-002, en de gewenste uitkomst. Een screenshot kan de bedoelde situatie verduidelijken. Een algemene wijziging mag meerdere afspraken tegelijk raken; verwerk die consequent in alle betrokken regels en voorbeelden.

De tijdelijke kijkversie dient om voorbeelden te bekijken en interacties uit te proberen. Ze bevat geen opmerkingenvelden, akkoordkeuzes of feedbackdownloads. Een klik of voorbeeldbewerking in de kijkversie wijzigt het handboek niet.

Verwerk een concrete wijzigingsinstructie in dit bestand en pas de betrokken visuele voorbeelden aan. Houd daarbij de codes stabiel. Controleer op strijdigheid met andere afspraken en controleer de gewijzigde weergave. Noteer de datum, betrokken afspraken, uiteindelijke keuze en aanleiding in het wijzigingslog. De nieuwste expliciete gebruikersinstructie heeft voorrang op een eerdere ontwerpkeuze.

Dit bestand in de Mach3UI-package blijft de vaste bron voor de UI-afspraken. Boost verspreidt deze bron samen met de skill naar agentmappen; die gegenereerde kopieën worden niet los onderhouden. Een besproken mogelijkheid of losse vraag is nog geen gewijzigde afspraak. Presenteer een eigen ontwerpkeuze niet als een aangetoond bestaand patroon in alle producten. Vastlegging hier betekent ook niet dat de wijziging al in alle zes producten is doorgevoerd; een productimplementatie is een afzonderlijke codewijziging.

## Wijzigingslog

| Datum | Versie | Afspraken | Vastgelegde keuze en aanleiding |
| --- | --- | --- | --- |
| 2 november 2026 | 1.0 | M3-001 | App-header zonder border, met de bestaande zachte verlooprand. Voorbeeld gecorrigeerd na gebruikersfeedback en controle van de zes app-layouts. |
| 2 november 2026 | 1.0 | M3-010, M3-011 | Tabs krijgen iconen; bij veel tabs vervallen alle iconen. Grens uitgewerkt op maximaal vijf met iconen en vanaf zes zonder iconen. |
| 2 november 2026 | 1.0 | M3-193–M3-197 | Callouts behouden hun standaard Flux-afstanden. Eigen CSS voor interne afstanden verwijderd op gebruikersinstructie. |
| 2 november 2026 | 1.0 | M3-199, M3-212 en maatvoering | Zelfbedachte maatrollen en --m3-variabelen weggelaten; concrete ruimteafspraken behouden op gebruikersinstructie. |
| 2 november 2026 | 1.0 | M3-002 | Groepsruimte in de sidebar hersteld: mt-4 vóór volgende groepen en gap-1 tussen items. Aanleiding: ontbrekende tussenruimte in het visuele voorbeeld. |
| 2 november 2026 | 1.0 | Overige ontwerpkeuzes | Onder meer toolbarvolgorde, paginatie, modalbreedtes, effectieve eindruimte en bulkselectie behouden na de gebruikersinstructie ‘De rest is prima’. Dit zijn gekozen standaarden; ze zijn niet allemaal al uniform aanwezig in de apps. |
| 3 november 2026 | 1.1 | Reviewwerkwijze en kijkversie | Wijzigingen worden via de chat doorgegeven en in dit handboek met wijzigingslog vastgelegd. Feedbackfuncties uit de kijkversie verwijderd op gebruikersinstructie; voorbeelden staan centraal en de volledige afspraak is uitklapbaar. |
| 3 november 2026 | 1.1 | M3-003, M3-008, M3-209 | Accountcontext weergegeven met de bestaande accentbalk boven de volledige app, inclusief accountnaam en terugkeericoon. De foutieve callout en losse account-/projectselectvelden uit het voorbeeld verwijderd na gebruikersfeedback en controle van de zes producten. |
| 3 november 2026 | 1.1 | M3-070–M3-080, M3-194–M3-195; alle calloutvoorbeelden | De standaard Flux-indeling vastgelegd: icon op flux:callout, titel en toelichting samen rechts daarvan. De compacte variant met icon op flux:callout.heading verwijderd uit alle voorbeelden, ook in modals, lijsten en processen. Geen extra CSS toegevoegd. |
| 3 november 2026 | 1.1 | Basisafspraken | Flux is zoveel mogelijk leidend voor componentopbouw, gedrag en vormgeving; Mach3UI vult aan met gedeelde structuren. Volg de standaardcomponent voordat een eigen oplossing wordt overwogen. |
| 3 november 2026 | 1.1 | Kijkversie en basisafspraken | Voorbeelden beperken tot noodzakelijke inhoud en bediening. Overbodige gegevenspanelen, dubbele uitleg en niet-relevante onderdelen verwijderd, onder meer bij accountcontext, breadcrumbs, tabs, menu's en knoppen. |
| 3 november 2026 | 1.1 | Componentkeuze en Flux-documentatie | Situaties gekoppeld aan componentfamilies en officiële documentatie. Versiecontrole, documentatie raadplegen en visuele verificatie opgenomen als verplichte werkwijze en als vereisten voor de gedeelde skill en projectinstructies. |
| 3 november 2026 | 1.1 | M3-002 | De bestaande Flux-separator (my-2) onder de teruglink hersteld in het sidebarvoorbeeld. Teruglink, separator, resourcenaam en lokale items vormen één navigatiegroep; geen extra mt-4 boven op de separator. Volgende zelfstandige groepen behouden hun eigen groepsruimte. |
| 3 november 2026 | 1.1 | M3-005, M3-061, M3-084–M3-086, sectieteksten en componentkeuze | Veldgroeptitels buiten de card vastgelegd volgens de gedeelde ui:section in alle zes apps. Voorbeelden met ui:box title als formuliergroep vervangen door gestapelde secties, ook in modals, drawers en editors. Zelfstandige informatie- en authenticatiekaarten behouden hun eigen titelpatroon. |
| 3 november 2026 | 1.1 | M3-007 | Loginvoorbeeld vervangen door de bestaande auth-opbouw uit alle zes apps: productlogo, Welkom met vaste uitleg, ui:box met binnenste flux:card, onthouden/herstellen op één regel, primaire loginactie en toegestane registratielinks eronder. Mach3Cart-logo en productthema als herkenbaar voorbeeld; geen algemene oranje huisstijl voorgeschreven. |
| 3 november 2026 | 1.1 | Basisafspraken, M3-016, M3-219 en oplevercontrole | Klikbare cards tonen direct een duidelijkere hoverrand en een herkenbare focusrand. Alle CSS-transitions vervallen, ook componentinterne overgangen; geen hoverbeweging of smooth scrolling. Preview aangepast en de standaardovergangen daarin globaal uitgeschakeld. |
| 3 november 2026 | 1.1 | M3-007 en kijkversie | Loginvoorbeeld monochroom gemaakt, gelijk aan de overige voorbeelden. Mach3Builders-logo vervangt het Cart-logo; productnaam en oranje voorbeeldthema verwijderd. De bestaande loginstructuur blijft behouden en de producten houden hun eigen brandingcontract. |
| 3 november 2026 | 1.1 | M3-017 en paginatievoorbeelden | Aantal per pagina links geplaatst; standaardpaginatie is de echte Flux-component met resultaatinformatie en genummerde navigatie rechts. Handgemaakte Vorige/Volgende-knoppen vervangen, inclusief het voorbeeld na verwijderen en de paginazones. Paginagrootte wijzigen en sorteren zetten de pagina terug naar 1. |
| 3 november 2026 | 1.1 | M3-018 en zoekvoorbeelden | Zoeken start altijd vanaf minimaal 3 tekens, ook bij Enter. Kortere invoer en wissen herstellen de lijst binnen de overige filters. Grens geldt ook server-side en voor zoekbare keuzes. Voorbeelden aangepast op gebruikersinstructie. |
| 3 november 2026 | 1.1 | M3-019 | Actierij in het filterpaneel rechts uitgelijnd: Wissen vóór de primaire knop Toepassen, die aan de rechterrand staat. Voorbeeld aangepast op gebruikersinstructie. |
| 3 november 2026 | 1.1 | M3-009, M3-019, M3-031–M3-032, M3-038, M3-047, M3-050, M3-054, M3-096, M3-114, M3-178 en lijstvoorbeelden | Extra criteriabalk onder de toolbar verwijderd: geen zoek-/statusbadges met een losse knop Wissen. Zoektekst blijft in het zoekveld met wiskruisje; filterkeuzes worden in de filterbediening aangepast of gewist. Bulkselectie en de actierij in het filterpaneel behouden hun eigen bediening. |
| 3 november 2026 | 1.1 | M3-035, M3-053, M3-112, M3-219 en componentkeuze | Echte Flux-skeleton met animate="shimmer" als laadstandaard vastgelegd. Ontbrekende animate-prop toegevoegd; tabelvoorbeeld gebruikt native skeletons in de cellen. Functionele laadanimatie blijft toegestaan zonder CSS-transitions en staat stil bij prefers-reduced-motion. |
| 3 november 2026 | 1.1 | M3-014, M3-040, M3-133, M3-181, M3-213, M3-217 en componentkeuze | Alle actieknoppen in tabelrijen zijn uitsluitend icoonknoppen met tooltip en toegankelijke actienaam, compact rechts en altijd zichtbaar. Tekstknop Verwijderen in het paginaherstelvoorbeeld vervangen door trash-2; overige rijacties gecontroleerd. |
| 3 november 2026 | 1.1 | M3-043 en M3-050 | Tekst naast dropdowns en filters verticaal gecentreerd op de control zelf; het veldlabel erboven telt niet mee. Tijdzone in het periodevoorbeeld in dezelfde items-center-rij als de dropdown geplaatst, zonder positioneringscorrecties. |
| 3 november 2026 | 1.1 | M3-014, M3-060, M3-128 en tabelvoorbeelden | Alle tabelbadges horizontaal gecentreerd; zowel th als td van badgekolommen krijgen w-0. Aantallen in tabelcellen altijd als compacte badge, inclusief 0. Statuskolommen gecorrigeerd en voorraadbadges toegevoegd aan het tabelvoorbeeld. |
| 3 november 2026 | 1.1 | M3-014, M3-128 en prijsvoorbeelden | Prijzen gebruiken altijd de bestaande Tailwind-class tabular-nums. Prijswaarden en bijbehorende tabelkoppen rechts uitgelijnd; ontbrekende classes in paginatie-, workflow-, maatvoering- en mobiele voorbeelden aangevuld. Prijsinvoer en overige prijsweergaven ook van tabular-nums voorzien. |
| 3 november 2026 | 1.1 | M3-014, M3-040, M3-107, M3-181 en M3-217 | Alle directe tabelrijacties neutrale subtle-icoonknoppen, ook Verwijderen. Tot en met 4 acties alles direct; vanaf 5 acties de 3 meest gebruikte plus Meer, de rest in de dropdown. Voorbeelden voor 3, 4 en 5 acties bijgewerkt; destructieve bevestigingen behouden danger. |
| 3 november 2026 | 1.1 | M3-014, M3-107 en oplevercontrole | Native Flux-tooltip verplicht per tabelactie, ook Verwijderen, Meer en een enkele actie. Tooltip en aria-label gebruiken dezelfde actienaam; zichtbaarheid bij hover en toetsenbordfocus is een verplichte browsercontrole. |
| 3 november 2026 | 1.1 | M3-062, M3-121 en componentkeuze | Meetbare voortgang gebruikt altijd de native Flux-progresscomponent met value/max en toegankelijke naam. Losse HTML-progress in het uploadvoorbeeld vervangen; importvoorbeeld gebruikt dezelfde component met 128 van 200. Native vormgeving behouden, zonder CSS-transitions. |
| 3 november 2026 | 1.1 | M3-062 en uploadvoorbeeld | Flux-progress toegepast op alle drie de fasen: uploaden, meetbare verwerking en gereed op 100%. Brede blauwe en groene statusbadges verwijderd; verwerkingsvoorbeeld toont 2 van 4 stappen, zodat 50% onderbouwd is. |
| 3 november 2026 | 1.1 | M3-069, M3-104 en kopieervoorbeelden | Inputwaarden altijd via Flux copyable in alle zes producten: clipboard met tooltip Kopiëren, na geslaagd kopiëren 2 seconden groen clipboard-check. Losse kopieerknoppen vervangen bij API-sleutel, link, delen en MFA; centrale partial vult de native optie aan met deze presentatie en gecontroleerde succesafhandeling. |
| 3 november 2026 | 1.1 | M3-104 en inputacties | Meerdere inputacties krijgen 4px tussen hun klikvlakken, zonder overlappende negatieve marges. Eindpadding groeit mee zodat de tekst vrij blijft. Centraal toegepast in de kijkversie; enkele acties behouden de native indeling. |
| 3 november 2026 | 1.1 | M3-102, M3-216 en bevestigingslabel | 4px ruimte vóór en na de muted objectnaam in het bevestigingslabel. Gap op het Flux-label voorkomt dat flexfragmenten tegen elkaar staan; normale lopende tekst behoudt gewone woordspaties. |
| 3 november 2026 | 1.1 | Modals en kijkversie | Gecontroleerd dat geopende voorbeelden echte flux:modal-componenten zijn. Alle zes apps gebruiken de centrale Mach3UI-modalachtergrond zinc-850. Lichtere statische cardvoorbeelden gelijkgetrokken aan die bestaande modalachtergrond en rand, ook bij drawers en ruimtematen. |
| 3 november 2026 | 1.2 | Alle 221 previews; componentbasis | Volledige controle van bron en gerenderde voorbeelden. Kijkversie volgt Flux/Flux Pro 2.20.0 en Mach3UI 5.1.0 met de bestaande themalaag en goedgekeurde aanvullingen. Versiegelijkheid en hercontrole bij upgrades vastgelegd. |
| 3 november 2026 | 1.2 | Modal-, drawer- en bevestigingsvoorbeelden | Nagebouwde cards vervangen door native flux:modal in de documentstroom. Dezelfde inhoud voor vaste/geopende variant; native sluitknop, kleuren, ring, schaduw en padding. Ook export, weggaan met wijzigingen, calloutplaatsing, tekstvoorbeelden en ruimtematen meegenomen. |
| 3 november 2026 | 1.2 | M3-067, M3-103, M3-166 | Verkeerde routing hersteld: Defaults toont eigen voorgeselecteerde velden, Archiveren/herstellen toont status en herstelactie. Ontbrekend sectieafstandvoorbeeld gevuld met ui:section; actieve herstelde status gebruikt de groene badge. |
| 3 november 2026 | 1.2 | M3-001, M3-003, M3-017, M3-110, M3-146–M3-198 | Shellvoorbeelden gebruiken native Flux-sidebar/header/main. Native sortable-kolom en ui:layout.error toegepast. Meetvoorbeelden met nagebouwde velden, lege toestanden, panelen en modals vervangen door werkelijke componentopbouw; verstorende meetspacers en groene overrides verwijderd. |
| 3 november 2026 | 1.2 | M3-093–M3-095, M3-118, M3-129, M3-135, M3-137, M3-139–M3-140 | Native editor in de canvasmodal; echte QR-renderer met openbare fixture; embedcode via copyable-input. Toast vooraf zichtbaar via het originele template. Datum/tijd gebruikt passende invoer met tijdzone. Prijsinvoer gebruikt input:class. Verouderde losse Wissen-knop verwijderd uit het tekstvoorbeeld. |
| 3 november 2026 | 1.2 | Smalle previews, M3-017, M3-214 | Native mobiele schermroute vervangt nagebouwde mobiele variant. Voorbeeldkader snijdt modals niet meer af. Paginagrootte en native paginatie lopen bij weinig ruimte naar aparte regels; interne componentstijl blijft intact. |
| 3 november 2026 | 1.2 | M3-002, M3-008, M3-139–M3-142, M3-209 | Ook navigatieniveaus en scroll-/lagenvoorbeelden op echte Flux-containers gezet. Tekstvoorbeelden hergebruiken de bestaande lijsttoestanden en primaire Opslaan-knop. Validatievoorbeeld toont gewone veldfouten zonder onterechte getypte bevestiging bij een normaal product. |
| 3 november 2026 | 1.2 | Controle alle previews | 221 situaties gerenderd op 1280px en 375px, zonder lege fallback of pagina-overflow. 21 modalparen en 2 drawerparen vergeleken; geen verschil in gecontroleerde oppervlaktestijlen. Tabeluitlijning, tooltips, native sortering, kopiëren en statusherstel gecontroleerd. Blade-compilatie, PHP-lint en Vite-build slagen. |
| 3 november 2026 | 1.2 | M3-110 | Bestaande error-layout uit alle zes apps bevestigd. Preview toont 404 zoals het aangeleverde appscherm; de ingekorte h-80-hoogte vervalt. Native h-screen, grote foutcode, bestaande uitleg en Ga terug met pijl blijven ongewijzigd. |
| 3 november 2026 | 1.2 | M3-072–M3-076, M3-081, M3-118, M3-121, M3-124, M3-139 | Alle notificaties na formulierverzendingen en jobacties verplicht via native Flux Toast. Importuitkomsten niet langer als success-callout. Blijvende status, validatie en resultaatdetails onderscheiden van actienotificaties; joblevering en ontdubbeling vastgelegd. Preview en schrijfwijzer gebruiken dezelfde toastvoorbeelden. |
| 3 november 2026 | 1.2 | M3-119–M3-120 | Stappen verplicht via native Flux Timeline. Import en interactieve wizard vervangen badge-/chevronrijen; native complete/current/incomplete, stapnummers en aria-current toegepast. Breed horizontaal, smal verticaal; geen eigen componentstijlen of transitions. Officiële documentatie en geïnstalleerde API gecontroleerd. |
| 3 november 2026 | 1.2 | M3-062, M3-127, M3-168 | Afbeeldingsvelden gebruiken native Mach3UI image-preview plus de gekoppelde vergrotingsmodal. Dezelfde gedeelde veldpartial toegepast bij upload, hulp en formulierpaneel. Label/preview/input/hulp, placeholder, tijdelijke upload-URL, toegankelijke naam en geautoriseerde verwijderactie vastgelegd; gewone documentuploads blijven zonder afbeeldingstegel. |
| 3 november 2026 | 1.2 | M3-063, M3-095, M3-099, M3-104, M3-128, M3-137, M3-202 | Prijs-, percentage- en URL-tekstinputs verplicht via native Flux-inputgroepen met betekenisvolle prefix/suffix. Valuta links, procent rechts, protocol links. Bestaande prijsuitlijning behouden. Gedeelde URL-presentatie en copyable nemen het protocol correct mee; tabeltekst en selects behouden hun bestaande weergave. |
| 3 november 2026 | 1.2 | M3-118, M3-139 en toastvoorbeelden | Toasts altijd met expliciete status en Lucide-statusicoon. Alleen titel, alleen bericht en titel plus bericht toegestaan; de eerdere beperking op heading vervalt. Icoon naast de eerste tekstregel, zonder centrering over de totale hoogte. Centrale gepubliceerde Flux-toastpartial voor alle voorbeelden; lege berichtvariant heeft geen extra titelonderruimte. |
| 3 november 2026 | 1.2 | Basisafspraken, M3-213, M3-221 en componentcontrole | Lucide is verplicht voor alle UI-iconen, inclusief interne Flux-/Mach3UI-iconen, laden, status, sluiten en publieke interfaces. Generieke Heroicons-instructies zijn ondergeschikt. Broncontrole, centrale Lucide-aliases en gepubliceerde partials vastgelegd; geen vendorwijzigingen of vervangingen per scherm. |
| 3 november 2026 | 1.2 | M3-001, M3-215 en app-shellvoorbeelden | Main app-logo vast op 12px via native ui:logo size="base" (h-3), met behoud van verhouding. Losse 16px-logoafbeeldingen in shell- en contextpreview vervangen door deze component; auth-logo behoudt zijn eigen maat. De starter-layout gebruikte deze native standaard al. |
| 3 november 2026 | 1.2 | M3-016, M3-137, M3-168, M3-202 en samenvattingskaarten | Titel en direct bijbehorende tekst/waarde in informatie-, statistiek- en resourcekaarten vormen één groep met 8px ruimte. Losse 24px titel-/tekstsiblings in de voorbeelden gegroepeerd; native paneelpadding en 24px naar aparte inhoud blijven behouden. Geen globale componentstijl aangepast. |
| 3 november 2026 | 1.2 | Basisafspraken, modals, M3-084, M3-097, M3-133–M3-134, M3-185, M3-217 | Modalactieknoppen bevatten uitsluitend het werkwoord, ook bij toevoegen. Objectnaam blijft in de modaltitel. Gedeelde vaste/geopende toevoegmodal en alle titel-/ruimtevoorbeelden aangepast naar Toevoegen. Algemene toevoegknoppen buiten modals blijven object + toevoegen. |
| 3 november 2026 | 1.2 | Modals, M3-098, M3-183, M3-185–M3-187, M3-189 | Geen scheidingslijn onder modal-/drawerheader of boven de footer. Bestaande padding en blokafstanden behouden. Borderclasses verwijderd uit de gedeelde drawer-body voor vaste en geopende voorbeelden. |
| 3 november 2026 | 1.2 | M3-119–M3-120 en gedeelde timeline | Standaard 32px-indicatoren in plaats van lg (48px). Officiële spacingvariabelen op 3rem tussen items en 1rem naar inhoud; native lijnbreedte 1px en lijnruimte 4px. Lijnen altijd muted, ook bij complete; indicatorstatus en responsive richting blijven behouden. |
| 3 november 2026 | 1.3 | Distributie en AI-werkwijze | Het volledige handboek met alle 221 M3-afspraken ondergebracht in de bestaande mach3ui-development-skill van Mach3UI. Korte Boost-guideline verplicht vooraf lezen bij UI-werk; gedetailleerde afspraken blijven op aanvraag in deze referentie. Verouderde conflicterende skillinstructies vervangen. Installatie en updates verlopen via Boost voor Claude en Codex. Dit distribueert instructies, geen componentimplementaties. |
