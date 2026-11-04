---
name: mach3ui-development
description: Bouw en wijzig Mach3-schermen met Laravel Blade, Livewire, Flux en Mach3UI volgens het gedeelde UI-handboek. Gebruik ook bij UI-reviews en keuzes voor layout, componenten, teksten, spacing en schermtoestanden.
license: MIT
metadata:
    author: Mach3Builders
---

# Mach3UI Development

Gebruik deze skill voor UI-werk in het Mach3-ecosysteem, ook wanneer het scherm alleen Flux-componenten gebruikt. Pure backendtaken zonder UI-gevolgen hebben het handboek niet nodig.

## Bron en voorrang

Het [UI-handboek](references/ui-handbook.md) is de norm voor de vormgeving en samenstelling van schermen. De 221 stabiele M3-codes maken afspraken herleidbaar. Lees vóór het coderen de basisafspraken, Componentkeuze en Flux-documentatie en de hoofdstukken voor de betrokken situatie. Lees de relevante ruimte-, tekst- en toestandregels mee; laad niet automatisch het hele wijzigingslog.

Deze afspraken gaan voor oudere Mach3UI-skills, gekopieerde appvoorbeelden en generieke Flux-/Tailwind-ontwerpkeuzes. Een recente expliciete gebruikerskeuze gaat voor een eerdere handboekkeuze; leg een gewijzigde ecosysteemafspraak vast met behoud van de M3-code. Projectregels voor domeinlogica, autorisatie en data blijven gelden. Een UI-taak geeft geen toestemming om andere producten, releases of opgeslagen inhoud te wijzigen.

De bron staat in de Mach3UI-package onder `resources/boost/skills/mach3ui-development/`. De agentmappen in projecten zijn door Boost gegenereerde distributies; onderhoud ontwerpafspraken in de package, niet afzonderlijk in iedere gegenereerde kopie. Is alleen een applicatiecheckout beschikbaar, beschrijf een noodzakelijke centrale wijziging concreet in plaats van vendorbestanden te wijzigen.

## Werkwijze

1. Bepaal de schermtaak en lees de bijbehorende afspraken via de onderstaande route. Neem ontbrekende acties, lege inhoud, nul treffers, laden/fouten, rechten en mobiel mee voor zover relevant voor de wijziging.
2. Zoek de bestaande gedeelde layout, componenten en gepubliceerde overrides in het project. Controleer de geïnstalleerde versies in `composer.lock` en de echte props, slots en componentbron voordat je schrijft. De componententabel in het handboek wijst naar de officiële Flux-documentatie; raadpleeg die bij onbekende API of gedrag. Controleer of die API in de geïnstalleerde versie bestaat.
3. Gebruik Flux waar beschikbaar en Mach3UI voor de aanvullende structuren. Implementeer de gekozen compositie met de bestaande componenten; pas hun interne styling alleen aan voor een expliciete handboekafspraak en dan centraal. Een bestaand afwijkend scherm is geen nieuwe standaard.
4. Verifieer de gewijzigde weergave en relevante interactie in de browser, ook in de vaste preview als er een voorbeeld bestaat. Controleer desktop en mobiel bij layoutwijzigingen. Gebruik passende projectchecks; een geslaagde build alleen bewijst geen visuele gelijkheid.
5. Benoem bij oplevering kort de gebruikte M3-afspraken en wat daadwerkelijk gecontroleerd is. Maak onderscheid tussen een vastgelegde afspraak, een voorbeeld en een reeds uitgerolde productie-implementatie.

## Leesroute

Alle routes verwijzen naar hoofdstukken in [hetzelfde handboek](references/ui-handbook.md). Zoek op de hoofdstuktitel of `### M3-…`; gebruik ook de inhoudsopgave en de tabel Situatie naar component.

| Werk | Lees vóór de wijziging |
| --- | --- |
| Shell, sidebar, breadcrumbs, tabs, layouts | Layouts, Structuur, Navigatie; M3-001–M3-012; betrokken Maatvoering en Ruimteregels |
| Tabellen, cards, toolbars, zoeken, filters, paginatie | Overzichten, Lijsttoestanden, Compositieafspraken; M3-013–M3-056; M3-014, M3-017–M3-018, M3-168 |
| Formulieren, upload, kopiëren en bijzondere inputwaarden | Invoer; M3-057–M3-069; M3-104, M3-127–M3-129 |
| Callouts, notificaties, laden en processtatus | Callouts, Toestanden, Workflows; M3-070–M3-081, M3-118–M3-124, M3-139 |
| Modals, drawers, verwijderen, focus en sluiten | Modals, Handelingen, Interactie; M3-082–M3-112; M3-133–M3-135, M3-183–M3-189 |
| Wizard en import | Workflows; M3-119–M3-120, inclusief de compacte Flux Timeline en muted lijnen |
| Labels, actieknoppen, titels, subtitles en hulptekst | Informatie en Schrijfwijzer; M3-125–M3-145 |
| Afstanden, panelen, uitlijning en compacte titelgroepen | Maatvoering en Ruimteregels; M3-146–M3-212; M3-168 |
| Iconen, kleur, typografie, toegankelijkheid en responsive | Fundament; M3-213–M3-220; alle UI-iconen zijn Lucide, ook interne componenticonen |
| Publiek formulier, embed, checkout, e-mail of PDF | Aparte scope, M3-221; neem de beheerlayout niet automatisch over |

## Technische componentafspraken

Zie [Mach3UI Reference](references/mach3ui-guide.md) voor de packagecomponenten en het `Flux::classes()`-patroon. Controleer daarnaast de geïnstalleerde bron in `vendor/mach3builders/mach3ui/resources/views/components/` en gepubliceerde app-overrides. Tijdens werk in de package zelf staat de bron onder `resources/views/components/`.

- Gebruik `ui:` voor Mach3UI en `flux:` voor Flux. Maak geen zelfstandig alternatief voor een bestaande component.
- `ui:section` rendert de veldcard zelf. Een veldgroeptitel staat erbuiten; in smalle overlays gebruik je de gestapelde variant. `ui:box title` is geen vervanging voor een formulierveldgroep.
- Gebruik Blade-bindingen alleen op componenttags, niet op gewone HTML-attributen. Gebruik de bestaande vertaalstructuur; modalacties gebruiken een algemeen werkwoord, de modaltitel noemt het onderwerp.
- Geen vendorwijzigingen. Ontbrekende centrale ondersteuning (bijvoorbeeld Lucide binnen native componenten of het afgesproken copyable-gedrag) is gedeeld componentwerk, geen reden om een component per scherm na te bouwen. Handboekregels beschrijven het doel; controleer de daadwerkelijke implementatiestatus.
