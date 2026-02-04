import { k as vf, b as Zf, s as Rf } from "./index-CjiZ2FIa.js";
let eO = [], rl = [];
(() => {
  let n = "lc,34,7n,7,7b,19,,,,2,,2,,,20,b,1c,l,g,,2t,7,2,6,2,2,,4,z,,u,r,2j,b,1m,9,9,,o,4,,9,,3,,5,17,3,3b,f,,w,1j,,,,4,8,4,,3,7,a,2,t,,1m,,,,2,4,8,,9,,a,2,q,,2,2,1l,,4,2,4,2,2,3,3,,u,2,3,,b,2,1l,,4,5,,2,4,,k,2,m,6,,,1m,,,2,,4,8,,7,3,a,2,u,,1n,,,,c,,9,,14,,3,,1l,3,5,3,,4,7,2,b,2,t,,1m,,2,,2,,3,,5,2,7,2,b,2,s,2,1l,2,,,2,4,8,,9,,a,2,t,,20,,4,,2,3,,,8,,29,,2,7,c,8,2q,,2,9,b,6,22,2,r,,,,,,1j,e,,5,,2,5,b,,10,9,,2u,4,,6,,2,2,2,p,2,4,3,g,4,d,,2,2,6,,f,,jj,3,qa,3,t,3,t,2,u,2,1s,2,,7,8,,2,b,9,,19,3,3b,2,y,,3a,3,4,2,9,,6,3,63,2,2,,1m,,,7,,,,,2,8,6,a,2,,1c,h,1r,4,1c,7,,,5,,14,9,c,2,w,4,2,2,,3,1k,,,2,3,,,3,1m,8,2,2,48,3,,d,,7,4,,6,,3,2,5i,1m,,5,ek,,5f,x,2da,3,3x,,2o,w,fe,6,2x,2,n9w,4,,a,w,2,28,2,7k,,3,,4,,p,2,5,,47,2,q,i,d,,12,8,p,b,1a,3,1c,,2,4,2,2,13,,1v,6,2,2,2,2,c,,8,,1b,,1f,,,3,2,2,5,2,,,16,2,8,,6m,,2,,4,,fn4,,kh,g,g,g,a6,2,gt,,6a,,45,5,1ae,3,,2,5,4,14,3,4,,4l,2,fx,4,ar,2,49,b,4w,,1i,f,1k,3,1d,4,2,2,1x,3,10,5,,8,1q,,c,2,1g,9,a,4,2,,2n,3,2,,,2,6,,4g,,3,8,l,2,1l,2,,,,,m,,e,7,3,5,5f,8,2,3,,,n,,29,,2,6,,,2,,,2,,2,6j,,2,4,6,2,,2,r,2,2d,8,2,,,2,2y,,,,2,6,,,2t,3,2,4,,5,77,9,,2,6t,,a,2,,,4,,40,4,2,2,4,,w,a,14,6,2,4,8,,9,6,2,3,1a,d,,2,ba,7,,6,,,2a,m,2,7,,2,,2,3e,6,3,,,2,,7,,,20,2,3,,,,9n,2,f0b,5,1n,7,t4,,1r,4,29,,f5k,2,43q,,,3,4,5,8,8,2,7,u,4,44,3,1iz,1j,4,1e,8,,e,,m,5,,f,11s,7,,h,2,7,,2,,5,79,7,c5,4,15s,7,31,7,240,5,gx7k,2o,3k,6o".split(",").map((e) => e ? parseInt(e, 36) : 1);
  for (let e = 0, t = 0; e < n.length; e++)
    (e % 2 ? rl : eO).push(t = t + n[e]);
})();
function zf(n) {
  if (n < 768) return !1;
  for (let e = 0, t = eO.length; ; ) {
    let i = e + t >> 1;
    if (n < eO[i]) t = i;
    else if (n >= rl[i]) e = i + 1;
    else return !0;
    if (e == t) return !1;
  }
}
function Gs(n) {
  return n >= 127462 && n <= 127487;
}
const js = 8205;
function _f(n, e, t = !0, i = !0) {
  return (t ? Ol : Yf)(n, e, i);
}
function Ol(n, e, t) {
  if (e == n.length) return e;
  e && sl(n.charCodeAt(e)) && al(n.charCodeAt(e - 1)) && e--;
  let i = Qr(n, e);
  for (e += Ms(i); e < n.length; ) {
    let r = Qr(n, e);
    if (i == js || r == js || t && zf(r))
      e += Ms(r), i = r;
    else if (Gs(r)) {
      let O = 0, s = e - 2;
      for (; s >= 0 && Gs(Qr(n, s)); )
        O++, s -= 2;
      if (O % 2 == 0) break;
      e += 2;
    } else
      break;
  }
  return e;
}
function Yf(n, e, t) {
  for (; e > 0; ) {
    let i = Ol(n, e - 2, t);
    if (i < e) return i;
    e--;
  }
  return 0;
}
function Qr(n, e) {
  let t = n.charCodeAt(e);
  if (!al(t) || e + 1 == n.length) return t;
  let i = n.charCodeAt(e + 1);
  return sl(i) ? (t - 55296 << 10) + (i - 56320) + 65536 : t;
}
function sl(n) {
  return n >= 56320 && n < 57344;
}
function al(n) {
  return n >= 55296 && n < 56320;
}
function Ms(n) {
  return n < 65536 ? 1 : 2;
}
class W {
  /**
  Get the line description around the given position.
  */
  lineAt(e) {
    if (e < 0 || e > this.length)
      throw new RangeError(`Invalid position ${e} in document of length ${this.length}`);
    return this.lineInner(e, !1, 1, 0);
  }
  /**
  Get the description for the given (1-based) line number.
  */
  line(e) {
    if (e < 1 || e > this.lines)
      throw new RangeError(`Invalid line number ${e} in ${this.lines}-line document`);
    return this.lineInner(e, !0, 1, 0);
  }
  /**
  Replace a range of the text with the given content.
  */
  replace(e, t, i) {
    [e, t] = ei(this, e, t);
    let r = [];
    return this.decompose(
      0,
      e,
      r,
      2
      /* Open.To */
    ), i.length && i.decompose(
      0,
      i.length,
      r,
      3
      /* Open.To */
    ), this.decompose(
      t,
      this.length,
      r,
      1
      /* Open.From */
    ), Ee.from(r, this.length - (t - e) + i.length);
  }
  /**
  Append another document to this one.
  */
  append(e) {
    return this.replace(this.length, this.length, e);
  }
  /**
  Retrieve the text between the given points.
  */
  slice(e, t = this.length) {
    [e, t] = ei(this, e, t);
    let i = [];
    return this.decompose(e, t, i, 0), Ee.from(i, t - e);
  }
  /**
  Test whether this text is equal to another instance.
  */
  eq(e) {
    if (e == this)
      return !0;
    if (e.length != this.length || e.lines != this.lines)
      return !1;
    let t = this.scanIdentical(e, 1), i = this.length - this.scanIdentical(e, -1), r = new xi(this), O = new xi(e);
    for (let s = t, a = t; ; ) {
      if (r.next(s), O.next(s), s = 0, r.lineBreak != O.lineBreak || r.done != O.done || r.value != O.value)
        return !1;
      if (a += r.value.length, r.done || a >= i)
        return !0;
    }
  }
  /**
  Iterate over the text. When `dir` is `-1`, iteration happens
  from end to start. This will return lines and the breaks between
  them as separate strings.
  */
  iter(e = 1) {
    return new xi(this, e);
  }
  /**
  Iterate over a range of the text. When `from` > `to`, the
  iterator will run in reverse.
  */
  iterRange(e, t = this.length) {
    return new ol(this, e, t);
  }
  /**
  Return a cursor that iterates over the given range of lines,
  _without_ returning the line breaks between, and yielding empty
  strings for empty lines.
  
  When `from` and `to` are given, they should be 1-based line numbers.
  */
  iterLines(e, t) {
    let i;
    if (e == null)
      i = this.iter();
    else {
      t == null && (t = this.lines + 1);
      let r = this.line(e).from;
      i = this.iterRange(r, Math.max(r, t == this.lines + 1 ? this.length : t <= 1 ? 0 : this.line(t - 1).to));
    }
    return new ll(i);
  }
  /**
  Return the document as a string, using newline characters to
  separate lines.
  */
  toString() {
    return this.sliceString(0);
  }
  /**
  Convert the document to an array of lines (which can be
  deserialized again via [`Text.of`](https://codemirror.net/6/docs/ref/#state.Text^of)).
  */
  toJSON() {
    let e = [];
    return this.flatten(e), e;
  }
  /**
  @internal
  */
  constructor() {
  }
  /**
  Create a `Text` instance for the given array of lines.
  */
  static of(e) {
    if (e.length == 0)
      throw new RangeError("A document must have at least one line");
    return e.length == 1 && !e[0] ? W.empty : e.length <= 32 ? new F(e) : Ee.from(F.split(e, []));
  }
}
class F extends W {
  constructor(e, t = Vf(e)) {
    super(), this.text = e, this.length = t;
  }
  get lines() {
    return this.text.length;
  }
  get children() {
    return null;
  }
  lineInner(e, t, i, r) {
    for (let O = 0; ; O++) {
      let s = this.text[O], a = r + s.length;
      if ((t ? i : a) >= e)
        return new Wf(r, a, i, s);
      r = a + 1, i++;
    }
  }
  decompose(e, t, i, r) {
    let O = e <= 0 && t >= this.length ? this : new F(Es(this.text, e, t), Math.min(t, this.length) - Math.max(0, e));
    if (r & 1) {
      let s = i.pop(), a = Pn(O.text, s.text.slice(), 0, O.length);
      if (a.length <= 32)
        i.push(new F(a, s.length + O.length));
      else {
        let o = a.length >> 1;
        i.push(new F(a.slice(0, o)), new F(a.slice(o)));
      }
    } else
      i.push(O);
  }
  replace(e, t, i) {
    if (!(i instanceof F))
      return super.replace(e, t, i);
    [e, t] = ei(this, e, t);
    let r = Pn(this.text, Pn(i.text, Es(this.text, 0, e)), t), O = this.length + i.length - (t - e);
    return r.length <= 32 ? new F(r, O) : Ee.from(F.split(r, []), O);
  }
  sliceString(e, t = this.length, i = `
`) {
    [e, t] = ei(this, e, t);
    let r = "";
    for (let O = 0, s = 0; O <= t && s < this.text.length; s++) {
      let a = this.text[s], o = O + a.length;
      O > e && s && (r += i), e < o && t > O && (r += a.slice(Math.max(0, e - O), t - O)), O = o + 1;
    }
    return r;
  }
  flatten(e) {
    for (let t of this.text)
      e.push(t);
  }
  scanIdentical() {
    return 0;
  }
  static split(e, t) {
    let i = [], r = -1;
    for (let O of e)
      i.push(O), r += O.length + 1, i.length == 32 && (t.push(new F(i, r)), i = [], r = -1);
    return r > -1 && t.push(new F(i, r)), t;
  }
}
class Ee extends W {
  constructor(e, t) {
    super(), this.children = e, this.length = t, this.lines = 0;
    for (let i of e)
      this.lines += i.lines;
  }
  lineInner(e, t, i, r) {
    for (let O = 0; ; O++) {
      let s = this.children[O], a = r + s.length, o = i + s.lines - 1;
      if ((t ? o : a) >= e)
        return s.lineInner(e, t, i, r);
      r = a + 1, i = o + 1;
    }
  }
  decompose(e, t, i, r) {
    for (let O = 0, s = 0; s <= t && O < this.children.length; O++) {
      let a = this.children[O], o = s + a.length;
      if (e <= o && t >= s) {
        let l = r & ((s <= e ? 1 : 0) | (o >= t ? 2 : 0));
        s >= e && o <= t && !l ? i.push(a) : a.decompose(e - s, t - s, i, l);
      }
      s = o + 1;
    }
  }
  replace(e, t, i) {
    if ([e, t] = ei(this, e, t), i.lines < this.lines)
      for (let r = 0, O = 0; r < this.children.length; r++) {
        let s = this.children[r], a = O + s.length;
        if (e >= O && t <= a) {
          let o = s.replace(e - O, t - O, i), l = this.lines - s.lines + o.lines;
          if (o.lines < l >> 4 && o.lines > l >> 6) {
            let c = this.children.slice();
            return c[r] = o, new Ee(c, this.length - (t - e) + i.length);
          }
          return super.replace(O, a, o);
        }
        O = a + 1;
      }
    return super.replace(e, t, i);
  }
  sliceString(e, t = this.length, i = `
`) {
    [e, t] = ei(this, e, t);
    let r = "";
    for (let O = 0, s = 0; O < this.children.length && s <= t; O++) {
      let a = this.children[O], o = s + a.length;
      s > e && O && (r += i), e < o && t > s && (r += a.sliceString(e - s, t - s, i)), s = o + 1;
    }
    return r;
  }
  flatten(e) {
    for (let t of this.children)
      t.flatten(e);
  }
  scanIdentical(e, t) {
    if (!(e instanceof Ee))
      return 0;
    let i = 0, [r, O, s, a] = t > 0 ? [0, 0, this.children.length, e.children.length] : [this.children.length - 1, e.children.length - 1, -1, -1];
    for (; ; r += t, O += t) {
      if (r == s || O == a)
        return i;
      let o = this.children[r], l = e.children[O];
      if (o != l)
        return i + o.scanIdentical(l, t);
      i += o.length + 1;
    }
  }
  static from(e, t = e.reduce((i, r) => i + r.length + 1, -1)) {
    let i = 0;
    for (let u of e)
      i += u.lines;
    if (i < 32) {
      let u = [];
      for (let d of e)
        d.flatten(u);
      return new F(u, t);
    }
    let r = Math.max(
      32,
      i >> 5
      /* Tree.BranchShift */
    ), O = r << 1, s = r >> 1, a = [], o = 0, l = -1, c = [];
    function h(u) {
      let d;
      if (u.lines > O && u instanceof Ee)
        for (let p of u.children)
          h(p);
      else u.lines > s && (o > s || !o) ? (f(), a.push(u)) : u instanceof F && o && (d = c[c.length - 1]) instanceof F && u.lines + d.lines <= 32 ? (o += u.lines, l += u.length + 1, c[c.length - 1] = new F(d.text.concat(u.text), d.length + 1 + u.length)) : (o + u.lines > r && f(), o += u.lines, l += u.length + 1, c.push(u));
    }
    function f() {
      o != 0 && (a.push(c.length == 1 ? c[0] : Ee.from(c, l)), l = -1, o = c.length = 0);
    }
    for (let u of e)
      h(u);
    return f(), a.length == 1 ? a[0] : new Ee(a, t);
  }
}
W.empty = /* @__PURE__ */ new F([""], 0);
function Vf(n) {
  let e = -1;
  for (let t of n)
    e += t.length + 1;
  return e;
}
function Pn(n, e, t = 0, i = 1e9) {
  for (let r = 0, O = 0, s = !0; O < n.length && r <= i; O++) {
    let a = n[O], o = r + a.length;
    o >= t && (o > i && (a = a.slice(0, i - r)), r < t && (a = a.slice(t - r)), s ? (e[e.length - 1] += a, s = !1) : e.push(a)), r = o + 1;
  }
  return e;
}
function Es(n, e, t) {
  return Pn(n, [""], e, t);
}
class xi {
  constructor(e, t = 1) {
    this.dir = t, this.done = !1, this.lineBreak = !1, this.value = "", this.nodes = [e], this.offsets = [t > 0 ? 1 : (e instanceof F ? e.text.length : e.children.length) << 1];
  }
  nextInner(e, t) {
    for (this.done = this.lineBreak = !1; ; ) {
      let i = this.nodes.length - 1, r = this.nodes[i], O = this.offsets[i], s = O >> 1, a = r instanceof F ? r.text.length : r.children.length;
      if (s == (t > 0 ? a : 0)) {
        if (i == 0)
          return this.done = !0, this.value = "", this;
        t > 0 && this.offsets[i - 1]++, this.nodes.pop(), this.offsets.pop();
      } else if ((O & 1) == (t > 0 ? 0 : 1)) {
        if (this.offsets[i] += t, e == 0)
          return this.lineBreak = !0, this.value = `
`, this;
        e--;
      } else if (r instanceof F) {
        let o = r.text[s + (t < 0 ? -1 : 0)];
        if (this.offsets[i] += t, o.length > Math.max(0, e))
          return this.value = e == 0 ? o : t > 0 ? o.slice(e) : o.slice(0, o.length - e), this;
        e -= o.length;
      } else {
        let o = r.children[s + (t < 0 ? -1 : 0)];
        e > o.length ? (e -= o.length, this.offsets[i] += t) : (t < 0 && this.offsets[i]--, this.nodes.push(o), this.offsets.push(t > 0 ? 1 : (o instanceof F ? o.text.length : o.children.length) << 1));
      }
    }
  }
  next(e = 0) {
    return e < 0 && (this.nextInner(-e, -this.dir), e = this.value.length), this.nextInner(e, this.dir);
  }
}
class ol {
  constructor(e, t, i) {
    this.value = "", this.done = !1, this.cursor = new xi(e, t > i ? -1 : 1), this.pos = t > i ? e.length : 0, this.from = Math.min(t, i), this.to = Math.max(t, i);
  }
  nextInner(e, t) {
    if (t < 0 ? this.pos <= this.from : this.pos >= this.to)
      return this.value = "", this.done = !0, this;
    e += Math.max(0, t < 0 ? this.pos - this.to : this.from - this.pos);
    let i = t < 0 ? this.pos - this.from : this.to - this.pos;
    e > i && (e = i), i -= e;
    let { value: r } = this.cursor.next(e);
    return this.pos += (r.length + e) * t, this.value = r.length <= i ? r : t < 0 ? r.slice(r.length - i) : r.slice(0, i), this.done = !this.value, this;
  }
  next(e = 0) {
    return e < 0 ? e = Math.max(e, this.from - this.pos) : e > 0 && (e = Math.min(e, this.to - this.pos)), this.nextInner(e, this.cursor.dir);
  }
  get lineBreak() {
    return this.cursor.lineBreak && this.value != "";
  }
}
class ll {
  constructor(e) {
    this.inner = e, this.afterBreak = !0, this.value = "", this.done = !1;
  }
  next(e = 0) {
    let { done: t, lineBreak: i, value: r } = this.inner.next(e);
    return t && this.afterBreak ? (this.value = "", this.afterBreak = !1) : t ? (this.done = !0, this.value = "") : i ? this.afterBreak ? this.value = "" : (this.afterBreak = !0, this.next()) : (this.value = r, this.afterBreak = !1), this;
  }
  get lineBreak() {
    return !1;
  }
}
typeof Symbol < "u" && (W.prototype[Symbol.iterator] = function() {
  return this.iter();
}, xi.prototype[Symbol.iterator] = ol.prototype[Symbol.iterator] = ll.prototype[Symbol.iterator] = function() {
  return this;
});
class Wf {
  /**
  @internal
  */
  constructor(e, t, i, r) {
    this.from = e, this.to = t, this.number = i, this.text = r;
  }
  /**
  The length of the line (not including any line break after it).
  */
  get length() {
    return this.to - this.from;
  }
}
function ei(n, e, t) {
  return e = Math.max(0, Math.min(n.length, e)), [e, Math.max(e, Math.min(n.length, t))];
}
function re(n, e, t = !0, i = !0) {
  return _f(n, e, t, i);
}
function qf(n) {
  return n >= 56320 && n < 57344;
}
function Cf(n) {
  return n >= 55296 && n < 56320;
}
function be(n, e) {
  let t = n.charCodeAt(e);
  if (!Cf(t) || e + 1 == n.length)
    return t;
  let i = n.charCodeAt(e + 1);
  return qf(i) ? (t - 55296 << 10) + (i - 56320) + 65536 : t;
}
function cl(n) {
  return n <= 65535 ? String.fromCharCode(n) : (n -= 65536, String.fromCharCode((n >> 10) + 55296, (n & 1023) + 56320));
}
function tt(n) {
  return n < 65536 ? 1 : 2;
}
const tO = /\r\n?|\n/;
var se = /* @__PURE__ */ (function(n) {
  return n[n.Simple = 0] = "Simple", n[n.TrackDel = 1] = "TrackDel", n[n.TrackBefore = 2] = "TrackBefore", n[n.TrackAfter = 3] = "TrackAfter", n;
})(se || (se = {}));
class Ne {
  // Sections are encoded as pairs of integers. The first is the
  // length in the current document, and the second is -1 for
  // unaffected sections, and the length of the replacement content
  // otherwise. So an insertion would be (0, n>0), a deletion (n>0,
  // 0), and a replacement two positive numbers.
  /**
  @internal
  */
  constructor(e) {
    this.sections = e;
  }
  /**
  The length of the document before the change.
  */
  get length() {
    let e = 0;
    for (let t = 0; t < this.sections.length; t += 2)
      e += this.sections[t];
    return e;
  }
  /**
  The length of the document after the change.
  */
  get newLength() {
    let e = 0;
    for (let t = 0; t < this.sections.length; t += 2) {
      let i = this.sections[t + 1];
      e += i < 0 ? this.sections[t] : i;
    }
    return e;
  }
  /**
  False when there are actual changes in this set.
  */
  get empty() {
    return this.sections.length == 0 || this.sections.length == 2 && this.sections[1] < 0;
  }
  /**
  Iterate over the unchanged parts left by these changes. `posA`
  provides the position of the range in the old document, `posB`
  the new position in the changed document.
  */
  iterGaps(e) {
    for (let t = 0, i = 0, r = 0; t < this.sections.length; ) {
      let O = this.sections[t++], s = this.sections[t++];
      s < 0 ? (e(i, r, O), r += O) : r += s, i += O;
    }
  }
  /**
  Iterate over the ranges changed by these changes. (See
  [`ChangeSet.iterChanges`](https://codemirror.net/6/docs/ref/#state.ChangeSet.iterChanges) for a
  variant that also provides you with the inserted text.)
  `fromA`/`toA` provides the extent of the change in the starting
  document, `fromB`/`toB` the extent of the replacement in the
  changed document.
  
  When `individual` is true, adjacent changes (which are kept
  separate for [position mapping](https://codemirror.net/6/docs/ref/#state.ChangeDesc.mapPos)) are
  reported separately.
  */
  iterChangedRanges(e, t = !1) {
    iO(this, e, t);
  }
  /**
  Get a description of the inverted form of these changes.
  */
  get invertedDesc() {
    let e = [];
    for (let t = 0; t < this.sections.length; ) {
      let i = this.sections[t++], r = this.sections[t++];
      r < 0 ? e.push(i, r) : e.push(r, i);
    }
    return new Ne(e);
  }
  /**
  Compute the combined effect of applying another set of changes
  after this one. The length of the document after this set should
  match the length before `other`.
  */
  composeDesc(e) {
    return this.empty ? e : e.empty ? this : hl(this, e);
  }
  /**
  Map this description, which should start with the same document
  as `other`, over another set of changes, so that it can be
  applied after it. When `before` is true, map as if the changes
  in `this` happened before the ones in `other`.
  */
  mapDesc(e, t = !1) {
    return e.empty ? this : nO(this, e, t);
  }
  mapPos(e, t = -1, i = se.Simple) {
    let r = 0, O = 0;
    for (let s = 0; s < this.sections.length; ) {
      let a = this.sections[s++], o = this.sections[s++], l = r + a;
      if (o < 0) {
        if (l > e)
          return O + (e - r);
        O += a;
      } else {
        if (i != se.Simple && l >= e && (i == se.TrackDel && r < e && l > e || i == se.TrackBefore && r < e || i == se.TrackAfter && l > e))
          return null;
        if (l > e || l == e && t < 0 && !a)
          return e == r || t < 0 ? O : O + o;
        O += o;
      }
      r = l;
    }
    if (e > r)
      throw new RangeError(`Position ${e} is out of range for changeset of length ${r}`);
    return O;
  }
  /**
  Check whether these changes touch a given range. When one of the
  changes entirely covers the range, the string `"cover"` is
  returned.
  */
  touchesRange(e, t = e) {
    for (let i = 0, r = 0; i < this.sections.length && r <= t; ) {
      let O = this.sections[i++], s = this.sections[i++], a = r + O;
      if (s >= 0 && r <= t && a >= e)
        return r < e && a > t ? "cover" : !0;
      r = a;
    }
    return !1;
  }
  /**
  @internal
  */
  toString() {
    let e = "";
    for (let t = 0; t < this.sections.length; ) {
      let i = this.sections[t++], r = this.sections[t++];
      e += (e ? " " : "") + i + (r >= 0 ? ":" + r : "");
    }
    return e;
  }
  /**
  Serialize this change desc to a JSON-representable value.
  */
  toJSON() {
    return this.sections;
  }
  /**
  Create a change desc from its JSON representation (as produced
  by [`toJSON`](https://codemirror.net/6/docs/ref/#state.ChangeDesc.toJSON).
  */
  static fromJSON(e) {
    if (!Array.isArray(e) || e.length % 2 || e.some((t) => typeof t != "number"))
      throw new RangeError("Invalid JSON representation of ChangeDesc");
    return new Ne(e);
  }
  /**
  @internal
  */
  static create(e) {
    return new Ne(e);
  }
}
class J extends Ne {
  constructor(e, t) {
    super(e), this.inserted = t;
  }
  /**
  Apply the changes to a document, returning the modified
  document.
  */
  apply(e) {
    if (this.length != e.length)
      throw new RangeError("Applying change set to a document with the wrong length");
    return iO(this, (t, i, r, O, s) => e = e.replace(r, r + (i - t), s), !1), e;
  }
  mapDesc(e, t = !1) {
    return nO(this, e, t, !0);
  }
  /**
  Given the document as it existed _before_ the changes, return a
  change set that represents the inverse of this set, which could
  be used to go from the document created by the changes back to
  the document as it existed before the changes.
  */
  invert(e) {
    let t = this.sections.slice(), i = [];
    for (let r = 0, O = 0; r < t.length; r += 2) {
      let s = t[r], a = t[r + 1];
      if (a >= 0) {
        t[r] = a, t[r + 1] = s;
        let o = r >> 1;
        for (; i.length < o; )
          i.push(W.empty);
        i.push(s ? e.slice(O, O + s) : W.empty);
      }
      O += s;
    }
    return new J(t, i);
  }
  /**
  Combine two subsequent change sets into a single set. `other`
  must start in the document produced by `this`. If `this` goes
  `docA` → `docB` and `other` represents `docB` → `docC`, the
  returned value will represent the change `docA` → `docC`.
  */
  compose(e) {
    return this.empty ? e : e.empty ? this : hl(this, e, !0);
  }
  /**
  Given another change set starting in the same document, maps this
  change set over the other, producing a new change set that can be
  applied to the document produced by applying `other`. When
  `before` is `true`, order changes as if `this` comes before
  `other`, otherwise (the default) treat `other` as coming first.
  
  Given two changes `A` and `B`, `A.compose(B.map(A))` and
  `B.compose(A.map(B, true))` will produce the same document. This
  provides a basic form of [operational
  transformation](https://en.wikipedia.org/wiki/Operational_transformation),
  and can be used for collaborative editing.
  */
  map(e, t = !1) {
    return e.empty ? this : nO(this, e, t, !0);
  }
  /**
  Iterate over the changed ranges in the document, calling `f` for
  each, with the range in the original document (`fromA`-`toA`)
  and the range that replaces it in the new document
  (`fromB`-`toB`).
  
  When `individual` is true, adjacent changes are reported
  separately.
  */
  iterChanges(e, t = !1) {
    iO(this, e, t);
  }
  /**
  Get a [change description](https://codemirror.net/6/docs/ref/#state.ChangeDesc) for this change
  set.
  */
  get desc() {
    return Ne.create(this.sections);
  }
  /**
  @internal
  */
  filter(e) {
    let t = [], i = [], r = [], O = new Yi(this);
    e: for (let s = 0, a = 0; ; ) {
      let o = s == e.length ? 1e9 : e[s++];
      for (; a < o || a == o && O.len == 0; ) {
        if (O.done)
          break e;
        let c = Math.min(O.len, o - a);
        Oe(r, c, -1);
        let h = O.ins == -1 ? -1 : O.off == 0 ? O.ins : 0;
        Oe(t, c, h), h > 0 && $t(i, t, O.text), O.forward(c), a += c;
      }
      let l = e[s++];
      for (; a < l; ) {
        if (O.done)
          break e;
        let c = Math.min(O.len, l - a);
        Oe(t, c, -1), Oe(r, c, O.ins == -1 ? -1 : O.off == 0 ? O.ins : 0), O.forward(c), a += c;
      }
    }
    return {
      changes: new J(t, i),
      filtered: Ne.create(r)
    };
  }
  /**
  Serialize this change set to a JSON-representable value.
  */
  toJSON() {
    let e = [];
    for (let t = 0; t < this.sections.length; t += 2) {
      let i = this.sections[t], r = this.sections[t + 1];
      r < 0 ? e.push(i) : r == 0 ? e.push([i]) : e.push([i].concat(this.inserted[t >> 1].toJSON()));
    }
    return e;
  }
  /**
  Create a change set for the given changes, for a document of the
  given length, using `lineSep` as line separator.
  */
  static of(e, t, i) {
    let r = [], O = [], s = 0, a = null;
    function o(c = !1) {
      if (!c && !r.length)
        return;
      s < t && Oe(r, t - s, -1);
      let h = new J(r, O);
      a = a ? a.compose(h.map(a)) : h, r = [], O = [], s = 0;
    }
    function l(c) {
      if (Array.isArray(c))
        for (let h of c)
          l(h);
      else if (c instanceof J) {
        if (c.length != t)
          throw new RangeError(`Mismatched change set length (got ${c.length}, expected ${t})`);
        o(), a = a ? a.compose(c.map(a)) : c;
      } else {
        let { from: h, to: f = h, insert: u } = c;
        if (h > f || h < 0 || f > t)
          throw new RangeError(`Invalid change range ${h} to ${f} (in doc of length ${t})`);
        let d = u ? typeof u == "string" ? W.of(u.split(i || tO)) : u : W.empty, p = d.length;
        if (h == f && p == 0)
          return;
        h < s && o(), h > s && Oe(r, h - s, -1), Oe(r, f - h, p), $t(O, r, d), s = f;
      }
    }
    return l(e), o(!a), a;
  }
  /**
  Create an empty changeset of the given length.
  */
  static empty(e) {
    return new J(e ? [e, -1] : [], []);
  }
  /**
  Create a changeset from its JSON representation (as produced by
  [`toJSON`](https://codemirror.net/6/docs/ref/#state.ChangeSet.toJSON).
  */
  static fromJSON(e) {
    if (!Array.isArray(e))
      throw new RangeError("Invalid JSON representation of ChangeSet");
    let t = [], i = [];
    for (let r = 0; r < e.length; r++) {
      let O = e[r];
      if (typeof O == "number")
        t.push(O, -1);
      else {
        if (!Array.isArray(O) || typeof O[0] != "number" || O.some((s, a) => a && typeof s != "string"))
          throw new RangeError("Invalid JSON representation of ChangeSet");
        if (O.length == 1)
          t.push(O[0], 0);
        else {
          for (; i.length < r; )
            i.push(W.empty);
          i[r] = W.of(O.slice(1)), t.push(O[0], i[r].length);
        }
      }
    }
    return new J(t, i);
  }
  /**
  @internal
  */
  static createSet(e, t) {
    return new J(e, t);
  }
}
function Oe(n, e, t, i = !1) {
  if (e == 0 && t <= 0)
    return;
  let r = n.length - 2;
  r >= 0 && t <= 0 && t == n[r + 1] ? n[r] += e : r >= 0 && e == 0 && n[r] == 0 ? n[r + 1] += t : i ? (n[r] += e, n[r + 1] += t) : n.push(e, t);
}
function $t(n, e, t) {
  if (t.length == 0)
    return;
  let i = e.length - 2 >> 1;
  if (i < n.length)
    n[n.length - 1] = n[n.length - 1].append(t);
  else {
    for (; n.length < i; )
      n.push(W.empty);
    n.push(t);
  }
}
function iO(n, e, t) {
  let i = n.inserted;
  for (let r = 0, O = 0, s = 0; s < n.sections.length; ) {
    let a = n.sections[s++], o = n.sections[s++];
    if (o < 0)
      r += a, O += a;
    else {
      let l = r, c = O, h = W.empty;
      for (; l += a, c += o, o && i && (h = h.append(i[s - 2 >> 1])), !(t || s == n.sections.length || n.sections[s + 1] < 0); )
        a = n.sections[s++], o = n.sections[s++];
      e(r, l, O, c, h), r = l, O = c;
    }
  }
}
function nO(n, e, t, i = !1) {
  let r = [], O = i ? [] : null, s = new Yi(n), a = new Yi(e);
  for (let o = -1; ; ) {
    if (s.done && a.len || a.done && s.len)
      throw new Error("Mismatched change set lengths");
    if (s.ins == -1 && a.ins == -1) {
      let l = Math.min(s.len, a.len);
      Oe(r, l, -1), s.forward(l), a.forward(l);
    } else if (a.ins >= 0 && (s.ins < 0 || o == s.i || s.off == 0 && (a.len < s.len || a.len == s.len && !t))) {
      let l = a.len;
      for (Oe(r, a.ins, -1); l; ) {
        let c = Math.min(s.len, l);
        s.ins >= 0 && o < s.i && s.len <= c && (Oe(r, 0, s.ins), O && $t(O, r, s.text), o = s.i), s.forward(c), l -= c;
      }
      a.next();
    } else if (s.ins >= 0) {
      let l = 0, c = s.len;
      for (; c; )
        if (a.ins == -1) {
          let h = Math.min(c, a.len);
          l += h, c -= h, a.forward(h);
        } else if (a.ins == 0 && a.len < c)
          c -= a.len, a.next();
        else
          break;
      Oe(r, l, o < s.i ? s.ins : 0), O && o < s.i && $t(O, r, s.text), o = s.i, s.forward(s.len - c);
    } else {
      if (s.done && a.done)
        return O ? J.createSet(r, O) : Ne.create(r);
      throw new Error("Mismatched change set lengths");
    }
  }
}
function hl(n, e, t = !1) {
  let i = [], r = t ? [] : null, O = new Yi(n), s = new Yi(e);
  for (let a = !1; ; ) {
    if (O.done && s.done)
      return r ? J.createSet(i, r) : Ne.create(i);
    if (O.ins == 0)
      Oe(i, O.len, 0, a), O.next();
    else if (s.len == 0 && !s.done)
      Oe(i, 0, s.ins, a), r && $t(r, i, s.text), s.next();
    else {
      if (O.done || s.done)
        throw new Error("Mismatched change set lengths");
      {
        let o = Math.min(O.len2, s.len), l = i.length;
        if (O.ins == -1) {
          let c = s.ins == -1 ? -1 : s.off ? 0 : s.ins;
          Oe(i, o, c, a), r && c && $t(r, i, s.text);
        } else s.ins == -1 ? (Oe(i, O.off ? 0 : O.len, o, a), r && $t(r, i, O.textBit(o))) : (Oe(i, O.off ? 0 : O.len, s.off ? 0 : s.ins, a), r && !s.off && $t(r, i, s.text));
        a = (O.ins > o || s.ins >= 0 && s.len > o) && (a || i.length > l), O.forward2(o), s.forward(o);
      }
    }
  }
}
class Yi {
  constructor(e) {
    this.set = e, this.i = 0, this.next();
  }
  next() {
    let { sections: e } = this.set;
    this.i < e.length ? (this.len = e[this.i++], this.ins = e[this.i++]) : (this.len = 0, this.ins = -2), this.off = 0;
  }
  get done() {
    return this.ins == -2;
  }
  get len2() {
    return this.ins < 0 ? this.len : this.ins;
  }
  get text() {
    let { inserted: e } = this.set, t = this.i - 2 >> 1;
    return t >= e.length ? W.empty : e[t];
  }
  textBit(e) {
    let { inserted: t } = this.set, i = this.i - 2 >> 1;
    return i >= t.length && !e ? W.empty : t[i].slice(this.off, e == null ? void 0 : this.off + e);
  }
  forward(e) {
    e == this.len ? this.next() : (this.len -= e, this.off += e);
  }
  forward2(e) {
    this.ins == -1 ? this.forward(e) : e == this.ins ? this.next() : (this.ins -= e, this.off += e);
  }
}
class Rt {
  constructor(e, t, i) {
    this.from = e, this.to = t, this.flags = i;
  }
  /**
  The anchor of the range—the side that doesn't move when you
  extend it.
  */
  get anchor() {
    return this.flags & 32 ? this.to : this.from;
  }
  /**
  The head of the range, which is moved when the range is
  [extended](https://codemirror.net/6/docs/ref/#state.SelectionRange.extend).
  */
  get head() {
    return this.flags & 32 ? this.from : this.to;
  }
  /**
  True when `anchor` and `head` are at the same position.
  */
  get empty() {
    return this.from == this.to;
  }
  /**
  If this is a cursor that is explicitly associated with the
  character on one of its sides, this returns the side. -1 means
  the character before its position, 1 the character after, and 0
  means no association.
  */
  get assoc() {
    return this.flags & 8 ? -1 : this.flags & 16 ? 1 : 0;
  }
  /**
  The bidirectional text level associated with this cursor, if
  any.
  */
  get bidiLevel() {
    let e = this.flags & 7;
    return e == 7 ? null : e;
  }
  /**
  The goal column (stored vertical offset) associated with a
  cursor. This is used to preserve the vertical position when
  [moving](https://codemirror.net/6/docs/ref/#view.EditorView.moveVertically) across
  lines of different length.
  */
  get goalColumn() {
    let e = this.flags >> 6;
    return e == 16777215 ? void 0 : e;
  }
  /**
  Map this range through a change, producing a valid range in the
  updated document.
  */
  map(e, t = -1) {
    let i, r;
    return this.empty ? i = r = e.mapPos(this.from, t) : (i = e.mapPos(this.from, 1), r = e.mapPos(this.to, -1)), i == this.from && r == this.to ? this : new Rt(i, r, this.flags);
  }
  /**
  Extend this range to cover at least `from` to `to`.
  */
  extend(e, t = e) {
    if (e <= this.anchor && t >= this.anchor)
      return S.range(e, t);
    let i = Math.abs(e - this.anchor) > Math.abs(t - this.anchor) ? e : t;
    return S.range(this.anchor, i);
  }
  /**
  Compare this range to another range.
  */
  eq(e, t = !1) {
    return this.anchor == e.anchor && this.head == e.head && this.goalColumn == e.goalColumn && (!t || !this.empty || this.assoc == e.assoc);
  }
  /**
  Return a JSON-serializable object representing the range.
  */
  toJSON() {
    return { anchor: this.anchor, head: this.head };
  }
  /**
  Convert a JSON representation of a range to a `SelectionRange`
  instance.
  */
  static fromJSON(e) {
    if (!e || typeof e.anchor != "number" || typeof e.head != "number")
      throw new RangeError("Invalid JSON representation for SelectionRange");
    return S.range(e.anchor, e.head);
  }
  /**
  @internal
  */
  static create(e, t, i) {
    return new Rt(e, t, i);
  }
}
class S {
  constructor(e, t) {
    this.ranges = e, this.mainIndex = t;
  }
  /**
  Map a selection through a change. Used to adjust the selection
  position for changes.
  */
  map(e, t = -1) {
    return e.empty ? this : S.create(this.ranges.map((i) => i.map(e, t)), this.mainIndex);
  }
  /**
  Compare this selection to another selection. By default, ranges
  are compared only by position. When `includeAssoc` is true,
  cursor ranges must also have the same
  [`assoc`](https://codemirror.net/6/docs/ref/#state.SelectionRange.assoc) value.
  */
  eq(e, t = !1) {
    if (this.ranges.length != e.ranges.length || this.mainIndex != e.mainIndex)
      return !1;
    for (let i = 0; i < this.ranges.length; i++)
      if (!this.ranges[i].eq(e.ranges[i], t))
        return !1;
    return !0;
  }
  /**
  Get the primary selection range. Usually, you should make sure
  your code applies to _all_ ranges, by using methods like
  [`changeByRange`](https://codemirror.net/6/docs/ref/#state.EditorState.changeByRange).
  */
  get main() {
    return this.ranges[this.mainIndex];
  }
  /**
  Make sure the selection only has one range. Returns a selection
  holding only the main range from this selection.
  */
  asSingle() {
    return this.ranges.length == 1 ? this : new S([this.main], 0);
  }
  /**
  Extend this selection with an extra range.
  */
  addRange(e, t = !0) {
    return S.create([e].concat(this.ranges), t ? 0 : this.mainIndex + 1);
  }
  /**
  Replace a given range with another range, and then normalize the
  selection to merge and sort ranges if necessary.
  */
  replaceRange(e, t = this.mainIndex) {
    let i = this.ranges.slice();
    return i[t] = e, S.create(i, this.mainIndex);
  }
  /**
  Convert this selection to an object that can be serialized to
  JSON.
  */
  toJSON() {
    return { ranges: this.ranges.map((e) => e.toJSON()), main: this.mainIndex };
  }
  /**
  Create a selection from a JSON representation.
  */
  static fromJSON(e) {
    if (!e || !Array.isArray(e.ranges) || typeof e.main != "number" || e.main >= e.ranges.length)
      throw new RangeError("Invalid JSON representation for EditorSelection");
    return new S(e.ranges.map((t) => Rt.fromJSON(t)), e.main);
  }
  /**
  Create a selection holding a single range.
  */
  static single(e, t = e) {
    return new S([S.range(e, t)], 0);
  }
  /**
  Sort and merge the given set of ranges, creating a valid
  selection.
  */
  static create(e, t = 0) {
    if (e.length == 0)
      throw new RangeError("A selection needs at least one range");
    for (let i = 0, r = 0; r < e.length; r++) {
      let O = e[r];
      if (O.empty ? O.from <= i : O.from < i)
        return S.normalized(e.slice(), t);
      i = O.to;
    }
    return new S(e, t);
  }
  /**
  Create a cursor selection range at the given position. You can
  safely ignore the optional arguments in most situations.
  */
  static cursor(e, t = 0, i, r) {
    return Rt.create(e, e, (t == 0 ? 0 : t < 0 ? 8 : 16) | (i == null ? 7 : Math.min(6, i)) | (r ?? 16777215) << 6);
  }
  /**
  Create a selection range.
  */
  static range(e, t, i, r) {
    let O = (i ?? 16777215) << 6 | (r == null ? 7 : Math.min(6, r));
    return t < e ? Rt.create(t, e, 48 | O) : Rt.create(e, t, (t > e ? 8 : 0) | O);
  }
  /**
  @internal
  */
  static normalized(e, t = 0) {
    let i = e[t];
    e.sort((r, O) => r.from - O.from), t = e.indexOf(i);
    for (let r = 1; r < e.length; r++) {
      let O = e[r], s = e[r - 1];
      if (O.empty ? O.from <= s.to : O.from < s.to) {
        let a = s.from, o = Math.max(O.to, s.to);
        r <= t && t--, e.splice(--r, 2, O.anchor > O.head ? S.range(o, a) : S.range(a, o));
      }
    }
    return new S(e, t);
  }
}
function fl(n, e) {
  for (let t of n.ranges)
    if (t.to > e)
      throw new RangeError("Selection points outside of document");
}
let KO = 0;
class w {
  constructor(e, t, i, r, O) {
    this.combine = e, this.compareInput = t, this.compare = i, this.isStatic = r, this.id = KO++, this.default = e([]), this.extensions = typeof O == "function" ? O(this) : O;
  }
  /**
  Returns a facet reader for this facet, which can be used to
  [read](https://codemirror.net/6/docs/ref/#state.EditorState.facet) it but not to define values for it.
  */
  get reader() {
    return this;
  }
  /**
  Define a new facet.
  */
  static define(e = {}) {
    return new w(e.combine || ((t) => t), e.compareInput || ((t, i) => t === i), e.compare || (e.combine ? (t, i) => t === i : JO), !!e.static, e.enables);
  }
  /**
  Returns an extension that adds the given value to this facet.
  */
  of(e) {
    return new Tn([], this, 0, e);
  }
  /**
  Create an extension that computes a value for the facet from a
  state. You must take care to declare the parts of the state that
  this value depends on, since your function is only called again
  for a new state when one of those parts changed.
  
  In cases where your value depends only on a single field, you'll
  want to use the [`from`](https://codemirror.net/6/docs/ref/#state.Facet.from) method instead.
  */
  compute(e, t) {
    if (this.isStatic)
      throw new Error("Can't compute a static facet");
    return new Tn(e, this, 1, t);
  }
  /**
  Create an extension that computes zero or more values for this
  facet from a state.
  */
  computeN(e, t) {
    if (this.isStatic)
      throw new Error("Can't compute a static facet");
    return new Tn(e, this, 2, t);
  }
  from(e, t) {
    return t || (t = (i) => i), this.compute([e], (i) => t(i.field(e)));
  }
}
function JO(n, e) {
  return n == e || n.length == e.length && n.every((t, i) => t === e[i]);
}
class Tn {
  constructor(e, t, i, r) {
    this.dependencies = e, this.facet = t, this.type = i, this.value = r, this.id = KO++;
  }
  dynamicSlot(e) {
    var t;
    let i = this.value, r = this.facet.compareInput, O = this.id, s = e[O] >> 1, a = this.type == 2, o = !1, l = !1, c = [];
    for (let h of this.dependencies)
      h == "doc" ? o = !0 : h == "selection" ? l = !0 : (((t = e[h.id]) !== null && t !== void 0 ? t : 1) & 1) == 0 && c.push(e[h.id]);
    return {
      create(h) {
        return h.values[s] = i(h), 1;
      },
      update(h, f) {
        if (o && f.docChanged || l && (f.docChanged || f.selection) || rO(h, c)) {
          let u = i(h);
          if (a ? !Ls(u, h.values[s], r) : !r(u, h.values[s]))
            return h.values[s] = u, 1;
        }
        return 0;
      },
      reconfigure: (h, f) => {
        let u, d = f.config.address[O];
        if (d != null) {
          let p = Rn(f, d);
          if (this.dependencies.every((Q) => Q instanceof w ? f.facet(Q) === h.facet(Q) : Q instanceof Te ? f.field(Q, !1) == h.field(Q, !1) : !0) || (a ? Ls(u = i(h), p, r) : r(u = i(h), p)))
            return h.values[s] = p, 0;
        } else
          u = i(h);
        return h.values[s] = u, 1;
      }
    };
  }
}
function Ls(n, e, t) {
  if (n.length != e.length)
    return !1;
  for (let i = 0; i < n.length; i++)
    if (!t(n[i], e[i]))
      return !1;
  return !0;
}
function rO(n, e) {
  let t = !1;
  for (let i of e)
    ki(n, i) & 1 && (t = !0);
  return t;
}
function Uf(n, e, t) {
  let i = t.map((o) => n[o.id]), r = t.map((o) => o.type), O = i.filter((o) => !(o & 1)), s = n[e.id] >> 1;
  function a(o) {
    let l = [];
    for (let c = 0; c < i.length; c++) {
      let h = Rn(o, i[c]);
      if (r[c] == 2)
        for (let f of h)
          l.push(f);
      else
        l.push(h);
    }
    return e.combine(l);
  }
  return {
    create(o) {
      for (let l of i)
        ki(o, l);
      return o.values[s] = a(o), 1;
    },
    update(o, l) {
      if (!rO(o, O))
        return 0;
      let c = a(o);
      return e.compare(c, o.values[s]) ? 0 : (o.values[s] = c, 1);
    },
    reconfigure(o, l) {
      let c = rO(o, i), h = l.config.facets[e.id], f = l.facet(e);
      if (h && !c && JO(t, h))
        return o.values[s] = f, 0;
      let u = a(o);
      return e.compare(u, f) ? (o.values[s] = f, 0) : (o.values[s] = u, 1);
    }
  };
}
const nn = /* @__PURE__ */ w.define({ static: !0 });
class Te {
  constructor(e, t, i, r, O) {
    this.id = e, this.createF = t, this.updateF = i, this.compareF = r, this.spec = O, this.provides = void 0;
  }
  /**
  Define a state field.
  */
  static define(e) {
    let t = new Te(KO++, e.create, e.update, e.compare || ((i, r) => i === r), e);
    return e.provide && (t.provides = e.provide(t)), t;
  }
  create(e) {
    let t = e.facet(nn).find((i) => i.field == this);
    return ((t == null ? void 0 : t.create) || this.createF)(e);
  }
  /**
  @internal
  */
  slot(e) {
    let t = e[this.id] >> 1;
    return {
      create: (i) => (i.values[t] = this.create(i), 1),
      update: (i, r) => {
        let O = i.values[t], s = this.updateF(O, r);
        return this.compareF(O, s) ? 0 : (i.values[t] = s, 1);
      },
      reconfigure: (i, r) => {
        let O = i.facet(nn), s = r.facet(nn), a;
        return (a = O.find((o) => o.field == this)) && a != s.find((o) => o.field == this) ? (i.values[t] = a.create(i), 1) : r.config.address[this.id] != null ? (i.values[t] = r.field(this), 0) : (i.values[t] = this.create(i), 1);
      }
    };
  }
  /**
  Returns an extension that enables this field and overrides the
  way it is initialized. Can be useful when you need to provide a
  non-default starting value for the field.
  */
  init(e) {
    return [this, nn.of({ field: this, create: e })];
  }
  /**
  State field instances can be used as
  [`Extension`](https://codemirror.net/6/docs/ref/#state.Extension) values to enable the field in a
  given state.
  */
  get extension() {
    return this;
  }
}
const Zt = { lowest: 4, low: 3, default: 2, high: 1, highest: 0 };
function di(n) {
  return (e) => new ul(e, n);
}
const li = {
  /**
  The highest precedence level, for extensions that should end up
  near the start of the precedence ordering.
  */
  highest: /* @__PURE__ */ di(Zt.highest),
  /**
  A higher-than-default precedence, for extensions that should
  come before those with default precedence.
  */
  high: /* @__PURE__ */ di(Zt.high),
  /**
  The default precedence, which is also used for extensions
  without an explicit precedence.
  */
  default: /* @__PURE__ */ di(Zt.default),
  /**
  A lower-than-default precedence.
  */
  low: /* @__PURE__ */ di(Zt.low),
  /**
  The lowest precedence level. Meant for things that should end up
  near the end of the extension order.
  */
  lowest: /* @__PURE__ */ di(Zt.lowest)
};
class ul {
  constructor(e, t) {
    this.inner = e, this.prec = t;
  }
}
class ci {
  /**
  Create an instance of this compartment to add to your [state
  configuration](https://codemirror.net/6/docs/ref/#state.EditorStateConfig.extensions).
  */
  of(e) {
    return new OO(this, e);
  }
  /**
  Create an [effect](https://codemirror.net/6/docs/ref/#state.TransactionSpec.effects) that
  reconfigures this compartment.
  */
  reconfigure(e) {
    return ci.reconfigure.of({ compartment: this, extension: e });
  }
  /**
  Get the current content of the compartment in the state, or
  `undefined` if it isn't present.
  */
  get(e) {
    return e.config.compartments.get(this);
  }
}
class OO {
  constructor(e, t) {
    this.compartment = e, this.inner = t;
  }
}
class Zn {
  constructor(e, t, i, r, O, s) {
    for (this.base = e, this.compartments = t, this.dynamicSlots = i, this.address = r, this.staticValues = O, this.facets = s, this.statusTemplate = []; this.statusTemplate.length < i.length; )
      this.statusTemplate.push(
        0
        /* SlotStatus.Unresolved */
      );
  }
  staticFacet(e) {
    let t = this.address[e.id];
    return t == null ? e.default : this.staticValues[t >> 1];
  }
  static resolve(e, t, i) {
    let r = [], O = /* @__PURE__ */ Object.create(null), s = /* @__PURE__ */ new Map();
    for (let f of Af(e, t, s))
      f instanceof Te ? r.push(f) : (O[f.facet.id] || (O[f.facet.id] = [])).push(f);
    let a = /* @__PURE__ */ Object.create(null), o = [], l = [];
    for (let f of r)
      a[f.id] = l.length << 1, l.push((u) => f.slot(u));
    let c = i == null ? void 0 : i.config.facets;
    for (let f in O) {
      let u = O[f], d = u[0].facet, p = c && c[f] || [];
      if (u.every(
        (Q) => Q.type == 0
        /* Provider.Static */
      ))
        if (a[d.id] = o.length << 1 | 1, JO(p, u))
          o.push(i.facet(d));
        else {
          let Q = d.combine(u.map((m) => m.value));
          o.push(i && d.compare(Q, i.facet(d)) ? i.facet(d) : Q);
        }
      else {
        for (let Q of u)
          Q.type == 0 ? (a[Q.id] = o.length << 1 | 1, o.push(Q.value)) : (a[Q.id] = l.length << 1, l.push((m) => Q.dynamicSlot(m)));
        a[d.id] = l.length << 1, l.push((Q) => Uf(Q, d, u));
      }
    }
    let h = l.map((f) => f(a));
    return new Zn(e, s, h, a, o, O);
  }
}
function Af(n, e, t) {
  let i = [[], [], [], [], []], r = /* @__PURE__ */ new Map();
  function O(s, a) {
    let o = r.get(s);
    if (o != null) {
      if (o <= a)
        return;
      let l = i[o].indexOf(s);
      l > -1 && i[o].splice(l, 1), s instanceof OO && t.delete(s.compartment);
    }
    if (r.set(s, a), Array.isArray(s))
      for (let l of s)
        O(l, a);
    else if (s instanceof OO) {
      if (t.has(s.compartment))
        throw new RangeError("Duplicate use of compartment in extensions");
      let l = e.get(s.compartment) || s.inner;
      t.set(s.compartment, l), O(l, a);
    } else if (s instanceof ul)
      O(s.inner, s.prec);
    else if (s instanceof Te)
      i[a].push(s), s.provides && O(s.provides, a);
    else if (s instanceof Tn)
      i[a].push(s), s.facet.extensions && O(s.facet.extensions, Zt.default);
    else {
      let l = s.extension;
      if (!l)
        throw new Error(`Unrecognized extension value in extension set (${s}). This sometimes happens because multiple instances of @codemirror/state are loaded, breaking instanceof checks.`);
      O(l, a);
    }
  }
  return O(n, Zt.default), i.reduce((s, a) => s.concat(a));
}
function ki(n, e) {
  if (e & 1)
    return 2;
  let t = e >> 1, i = n.status[t];
  if (i == 4)
    throw new Error("Cyclic dependency between fields and/or facets");
  if (i & 2)
    return i;
  n.status[t] = 4;
  let r = n.computeSlot(n, n.config.dynamicSlots[t]);
  return n.status[t] = 2 | r;
}
function Rn(n, e) {
  return e & 1 ? n.config.staticValues[e >> 1] : n.values[e >> 1];
}
const $l = /* @__PURE__ */ w.define(), sO = /* @__PURE__ */ w.define({
  combine: (n) => n.some((e) => e),
  static: !0
}), dl = /* @__PURE__ */ w.define({
  combine: (n) => n.length ? n[0] : void 0,
  static: !0
}), pl = /* @__PURE__ */ w.define(), Ql = /* @__PURE__ */ w.define(), ml = /* @__PURE__ */ w.define(), gl = /* @__PURE__ */ w.define({
  combine: (n) => n.length ? n[0] : !1
});
class lt {
  /**
  @internal
  */
  constructor(e, t) {
    this.type = e, this.value = t;
  }
  /**
  Define a new type of annotation.
  */
  static define() {
    return new Gf();
  }
}
class Gf {
  /**
  Create an instance of this annotation.
  */
  of(e) {
    return new lt(this, e);
  }
}
class jf {
  /**
  @internal
  */
  constructor(e) {
    this.map = e;
  }
  /**
  Create a [state effect](https://codemirror.net/6/docs/ref/#state.StateEffect) instance of this
  type.
  */
  of(e) {
    return new U(this, e);
  }
}
class U {
  /**
  @internal
  */
  constructor(e, t) {
    this.type = e, this.value = t;
  }
  /**
  Map this effect through a position mapping. Will return
  `undefined` when that ends up deleting the effect.
  */
  map(e) {
    let t = this.type.map(this.value, e);
    return t === void 0 ? void 0 : t == this.value ? this : new U(this.type, t);
  }
  /**
  Tells you whether this effect object is of a given
  [type](https://codemirror.net/6/docs/ref/#state.StateEffectType).
  */
  is(e) {
    return this.type == e;
  }
  /**
  Define a new effect type. The type parameter indicates the type
  of values that his effect holds. It should be a type that
  doesn't include `undefined`, since that is used in
  [mapping](https://codemirror.net/6/docs/ref/#state.StateEffect.map) to indicate that an effect is
  removed.
  */
  static define(e = {}) {
    return new jf(e.map || ((t) => t));
  }
  /**
  Map an array of effects through a change set.
  */
  static mapEffects(e, t) {
    if (!e.length)
      return e;
    let i = [];
    for (let r of e) {
      let O = r.map(t);
      O && i.push(O);
    }
    return i;
  }
}
U.reconfigure = /* @__PURE__ */ U.define();
U.appendConfig = /* @__PURE__ */ U.define();
class H {
  constructor(e, t, i, r, O, s) {
    this.startState = e, this.changes = t, this.selection = i, this.effects = r, this.annotations = O, this.scrollIntoView = s, this._doc = null, this._state = null, i && fl(i, t.newLength), O.some((a) => a.type == H.time) || (this.annotations = O.concat(H.time.of(Date.now())));
  }
  /**
  @internal
  */
  static create(e, t, i, r, O, s) {
    return new H(e, t, i, r, O, s);
  }
  /**
  The new document produced by the transaction. Contrary to
  [`.state`](https://codemirror.net/6/docs/ref/#state.Transaction.state)`.doc`, accessing this won't
  force the entire new state to be computed right away, so it is
  recommended that [transaction
  filters](https://codemirror.net/6/docs/ref/#state.EditorState^transactionFilter) use this getter
  when they need to look at the new document.
  */
  get newDoc() {
    return this._doc || (this._doc = this.changes.apply(this.startState.doc));
  }
  /**
  The new selection produced by the transaction. If
  [`this.selection`](https://codemirror.net/6/docs/ref/#state.Transaction.selection) is undefined,
  this will [map](https://codemirror.net/6/docs/ref/#state.EditorSelection.map) the start state's
  current selection through the changes made by the transaction.
  */
  get newSelection() {
    return this.selection || this.startState.selection.map(this.changes);
  }
  /**
  The new state created by the transaction. Computed on demand
  (but retained for subsequent access), so it is recommended not to
  access it in [transaction
  filters](https://codemirror.net/6/docs/ref/#state.EditorState^transactionFilter) when possible.
  */
  get state() {
    return this._state || this.startState.applyTransaction(this), this._state;
  }
  /**
  Get the value of the given annotation type, if any.
  */
  annotation(e) {
    for (let t of this.annotations)
      if (t.type == e)
        return t.value;
  }
  /**
  Indicates whether the transaction changed the document.
  */
  get docChanged() {
    return !this.changes.empty;
  }
  /**
  Indicates whether this transaction reconfigures the state
  (through a [configuration compartment](https://codemirror.net/6/docs/ref/#state.Compartment) or
  with a top-level configuration
  [effect](https://codemirror.net/6/docs/ref/#state.StateEffect^reconfigure).
  */
  get reconfigured() {
    return this.startState.config != this.state.config;
  }
  /**
  Returns true if the transaction has a [user
  event](https://codemirror.net/6/docs/ref/#state.Transaction^userEvent) annotation that is equal to
  or more specific than `event`. For example, if the transaction
  has `"select.pointer"` as user event, `"select"` and
  `"select.pointer"` will match it.
  */
  isUserEvent(e) {
    let t = this.annotation(H.userEvent);
    return !!(t && (t == e || t.length > e.length && t.slice(0, e.length) == e && t[e.length] == "."));
  }
}
H.time = /* @__PURE__ */ lt.define();
H.userEvent = /* @__PURE__ */ lt.define();
H.addToHistory = /* @__PURE__ */ lt.define();
H.remote = /* @__PURE__ */ lt.define();
function Mf(n, e) {
  let t = [];
  for (let i = 0, r = 0; ; ) {
    let O, s;
    if (i < n.length && (r == e.length || e[r] >= n[i]))
      O = n[i++], s = n[i++];
    else if (r < e.length)
      O = e[r++], s = e[r++];
    else
      return t;
    !t.length || t[t.length - 1] < O ? t.push(O, s) : t[t.length - 1] < s && (t[t.length - 1] = s);
  }
}
function Sl(n, e, t) {
  var i;
  let r, O, s;
  return t ? (r = e.changes, O = J.empty(e.changes.length), s = n.changes.compose(e.changes)) : (r = e.changes.map(n.changes), O = n.changes.mapDesc(e.changes, !0), s = n.changes.compose(r)), {
    changes: s,
    selection: e.selection ? e.selection.map(O) : (i = n.selection) === null || i === void 0 ? void 0 : i.map(r),
    effects: U.mapEffects(n.effects, r).concat(U.mapEffects(e.effects, O)),
    annotations: n.annotations.length ? n.annotations.concat(e.annotations) : e.annotations,
    scrollIntoView: n.scrollIntoView || e.scrollIntoView
  };
}
function aO(n, e, t) {
  let i = e.selection, r = Bt(e.annotations);
  return e.userEvent && (r = r.concat(H.userEvent.of(e.userEvent))), {
    changes: e.changes instanceof J ? e.changes : J.of(e.changes || [], t, n.facet(dl)),
    selection: i && (i instanceof S ? i : S.single(i.anchor, i.head)),
    effects: Bt(e.effects),
    annotations: r,
    scrollIntoView: !!e.scrollIntoView
  };
}
function Pl(n, e, t) {
  let i = aO(n, e.length ? e[0] : {}, n.doc.length);
  e.length && e[0].filter === !1 && (t = !1);
  for (let O = 1; O < e.length; O++) {
    e[O].filter === !1 && (t = !1);
    let s = !!e[O].sequential;
    i = Sl(i, aO(n, e[O], s ? i.changes.newLength : n.doc.length), s);
  }
  let r = H.create(n, i.changes, i.selection, i.effects, i.annotations, i.scrollIntoView);
  return Lf(t ? Ef(r) : r);
}
function Ef(n) {
  let e = n.startState, t = !0;
  for (let r of e.facet(pl)) {
    let O = r(n);
    if (O === !1) {
      t = !1;
      break;
    }
    Array.isArray(O) && (t = t === !0 ? O : Mf(t, O));
  }
  if (t !== !0) {
    let r, O;
    if (t === !1)
      O = n.changes.invertedDesc, r = J.empty(e.doc.length);
    else {
      let s = n.changes.filter(t);
      r = s.changes, O = s.filtered.mapDesc(s.changes).invertedDesc;
    }
    n = H.create(e, r, n.selection && n.selection.map(O), U.mapEffects(n.effects, O), n.annotations, n.scrollIntoView);
  }
  let i = e.facet(Ql);
  for (let r = i.length - 1; r >= 0; r--) {
    let O = i[r](n);
    O instanceof H ? n = O : Array.isArray(O) && O.length == 1 && O[0] instanceof H ? n = O[0] : n = Pl(e, Bt(O), !1);
  }
  return n;
}
function Lf(n) {
  let e = n.startState, t = e.facet(ml), i = n;
  for (let r = t.length - 1; r >= 0; r--) {
    let O = t[r](n);
    O && Object.keys(O).length && (i = Sl(i, aO(e, O, n.changes.newLength), !0));
  }
  return i == n ? n : H.create(e, n.changes, n.selection, i.effects, i.annotations, i.scrollIntoView);
}
const Df = [];
function Bt(n) {
  return n == null ? Df : Array.isArray(n) ? n : [n];
}
var xe = /* @__PURE__ */ (function(n) {
  return n[n.Word = 0] = "Word", n[n.Space = 1] = "Space", n[n.Other = 2] = "Other", n;
})(xe || (xe = {}));
const Bf = /[\u00df\u0587\u0590-\u05f4\u0600-\u06ff\u3040-\u309f\u30a0-\u30ff\u3400-\u4db5\u4e00-\u9fcc\uac00-\ud7af]/;
let oO;
try {
  oO = /* @__PURE__ */ new RegExp("[\\p{Alphabetic}\\p{Number}_]", "u");
} catch {
}
function If(n) {
  if (oO)
    return oO.test(n);
  for (let e = 0; e < n.length; e++) {
    let t = n[e];
    if (/\w/.test(t) || t > "" && (t.toUpperCase() != t.toLowerCase() || Bf.test(t)))
      return !0;
  }
  return !1;
}
function Nf(n) {
  return (e) => {
    if (!/\S/.test(e))
      return xe.Space;
    if (If(e))
      return xe.Word;
    for (let t = 0; t < n.length; t++)
      if (e.indexOf(n[t]) > -1)
        return xe.Word;
    return xe.Other;
  };
}
class q {
  constructor(e, t, i, r, O, s) {
    this.config = e, this.doc = t, this.selection = i, this.values = r, this.status = e.statusTemplate.slice(), this.computeSlot = O, s && (s._state = this);
    for (let a = 0; a < this.config.dynamicSlots.length; a++)
      ki(this, a << 1);
    this.computeSlot = null;
  }
  field(e, t = !0) {
    let i = this.config.address[e.id];
    if (i == null) {
      if (t)
        throw new RangeError("Field is not present in this state");
      return;
    }
    return ki(this, i), Rn(this, i);
  }
  /**
  Create a [transaction](https://codemirror.net/6/docs/ref/#state.Transaction) that updates this
  state. Any number of [transaction specs](https://codemirror.net/6/docs/ref/#state.TransactionSpec)
  can be passed. Unless
  [`sequential`](https://codemirror.net/6/docs/ref/#state.TransactionSpec.sequential) is set, the
  [changes](https://codemirror.net/6/docs/ref/#state.TransactionSpec.changes) (if any) of each spec
  are assumed to start in the _current_ document (not the document
  produced by previous specs), and its
  [selection](https://codemirror.net/6/docs/ref/#state.TransactionSpec.selection) and
  [effects](https://codemirror.net/6/docs/ref/#state.TransactionSpec.effects) are assumed to refer
  to the document created by its _own_ changes. The resulting
  transaction contains the combined effect of all the different
  specs. For [selection](https://codemirror.net/6/docs/ref/#state.TransactionSpec.selection), later
  specs take precedence over earlier ones.
  */
  update(...e) {
    return Pl(this, e, !0);
  }
  /**
  @internal
  */
  applyTransaction(e) {
    let t = this.config, { base: i, compartments: r } = t;
    for (let a of e.effects)
      a.is(ci.reconfigure) ? (t && (r = /* @__PURE__ */ new Map(), t.compartments.forEach((o, l) => r.set(l, o)), t = null), r.set(a.value.compartment, a.value.extension)) : a.is(U.reconfigure) ? (t = null, i = a.value) : a.is(U.appendConfig) && (t = null, i = Bt(i).concat(a.value));
    let O;
    t ? O = e.startState.values.slice() : (t = Zn.resolve(i, r, this), O = new q(t, this.doc, this.selection, t.dynamicSlots.map(() => null), (o, l) => l.reconfigure(o, this), null).values);
    let s = e.startState.facet(sO) ? e.newSelection : e.newSelection.asSingle();
    new q(t, e.newDoc, s, O, (a, o) => o.update(a, e), e);
  }
  /**
  Create a [transaction spec](https://codemirror.net/6/docs/ref/#state.TransactionSpec) that
  replaces every selection range with the given content.
  */
  replaceSelection(e) {
    return typeof e == "string" && (e = this.toText(e)), this.changeByRange((t) => ({
      changes: { from: t.from, to: t.to, insert: e },
      range: S.cursor(t.from + e.length)
    }));
  }
  /**
  Create a set of changes and a new selection by running the given
  function for each range in the active selection. The function
  can return an optional set of changes (in the coordinate space
  of the start document), plus an updated range (in the coordinate
  space of the document produced by the call's own changes). This
  method will merge all the changes and ranges into a single
  changeset and selection, and return it as a [transaction
  spec](https://codemirror.net/6/docs/ref/#state.TransactionSpec), which can be passed to
  [`update`](https://codemirror.net/6/docs/ref/#state.EditorState.update).
  */
  changeByRange(e) {
    let t = this.selection, i = e(t.ranges[0]), r = this.changes(i.changes), O = [i.range], s = Bt(i.effects);
    for (let a = 1; a < t.ranges.length; a++) {
      let o = e(t.ranges[a]), l = this.changes(o.changes), c = l.map(r);
      for (let f = 0; f < a; f++)
        O[f] = O[f].map(c);
      let h = r.mapDesc(l, !0);
      O.push(o.range.map(h)), r = r.compose(c), s = U.mapEffects(s, c).concat(U.mapEffects(Bt(o.effects), h));
    }
    return {
      changes: r,
      selection: S.create(O, t.mainIndex),
      effects: s
    };
  }
  /**
  Create a [change set](https://codemirror.net/6/docs/ref/#state.ChangeSet) from the given change
  description, taking the state's document length and line
  separator into account.
  */
  changes(e = []) {
    return e instanceof J ? e : J.of(e, this.doc.length, this.facet(q.lineSeparator));
  }
  /**
  Using the state's [line
  separator](https://codemirror.net/6/docs/ref/#state.EditorState^lineSeparator), create a
  [`Text`](https://codemirror.net/6/docs/ref/#state.Text) instance from the given string.
  */
  toText(e) {
    return W.of(e.split(this.facet(q.lineSeparator) || tO));
  }
  /**
  Return the given range of the document as a string.
  */
  sliceDoc(e = 0, t = this.doc.length) {
    return this.doc.sliceString(e, t, this.lineBreak);
  }
  /**
  Get the value of a state [facet](https://codemirror.net/6/docs/ref/#state.Facet).
  */
  facet(e) {
    let t = this.config.address[e.id];
    return t == null ? e.default : (ki(this, t), Rn(this, t));
  }
  /**
  Convert this state to a JSON-serializable object. When custom
  fields should be serialized, you can pass them in as an object
  mapping property names (in the resulting object, which should
  not use `doc` or `selection`) to fields.
  */
  toJSON(e) {
    let t = {
      doc: this.sliceDoc(),
      selection: this.selection.toJSON()
    };
    if (e)
      for (let i in e) {
        let r = e[i];
        r instanceof Te && this.config.address[r.id] != null && (t[i] = r.spec.toJSON(this.field(e[i]), this));
      }
    return t;
  }
  /**
  Deserialize a state from its JSON representation. When custom
  fields should be deserialized, pass the same object you passed
  to [`toJSON`](https://codemirror.net/6/docs/ref/#state.EditorState.toJSON) when serializing as
  third argument.
  */
  static fromJSON(e, t = {}, i) {
    if (!e || typeof e.doc != "string")
      throw new RangeError("Invalid JSON representation for EditorState");
    let r = [];
    if (i) {
      for (let O in i)
        if (Object.prototype.hasOwnProperty.call(e, O)) {
          let s = i[O], a = e[O];
          r.push(s.init((o) => s.spec.fromJSON(a, o)));
        }
    }
    return q.create({
      doc: e.doc,
      selection: S.fromJSON(e.selection),
      extensions: t.extensions ? r.concat([t.extensions]) : r
    });
  }
  /**
  Create a new state. You'll usually only need this when
  initializing an editor—updated states are created by applying
  transactions.
  */
  static create(e = {}) {
    let t = Zn.resolve(e.extensions || [], /* @__PURE__ */ new Map()), i = e.doc instanceof W ? e.doc : W.of((e.doc || "").split(t.staticFacet(q.lineSeparator) || tO)), r = e.selection ? e.selection instanceof S ? e.selection : S.single(e.selection.anchor, e.selection.head) : S.single(0);
    return fl(r, i.length), t.staticFacet(sO) || (r = r.asSingle()), new q(t, i, r, t.dynamicSlots.map(() => null), (O, s) => s.create(O), null);
  }
  /**
  The size (in columns) of a tab in the document, determined by
  the [`tabSize`](https://codemirror.net/6/docs/ref/#state.EditorState^tabSize) facet.
  */
  get tabSize() {
    return this.facet(q.tabSize);
  }
  /**
  Get the proper [line-break](https://codemirror.net/6/docs/ref/#state.EditorState^lineSeparator)
  string for this state.
  */
  get lineBreak() {
    return this.facet(q.lineSeparator) || `
`;
  }
  /**
  Returns true when the editor is
  [configured](https://codemirror.net/6/docs/ref/#state.EditorState^readOnly) to be read-only.
  */
  get readOnly() {
    return this.facet(gl);
  }
  /**
  Look up a translation for the given phrase (via the
  [`phrases`](https://codemirror.net/6/docs/ref/#state.EditorState^phrases) facet), or return the
  original string if no translation is found.
  
  If additional arguments are passed, they will be inserted in
  place of markers like `$1` (for the first value) and `$2`, etc.
  A single `$` is equivalent to `$1`, and `$$` will produce a
  literal dollar sign.
  */
  phrase(e, ...t) {
    for (let i of this.facet(q.phrases))
      if (Object.prototype.hasOwnProperty.call(i, e)) {
        e = i[e];
        break;
      }
    return t.length && (e = e.replace(/\$(\$|\d*)/g, (i, r) => {
      if (r == "$")
        return "$";
      let O = +(r || 1);
      return !O || O > t.length ? i : t[O - 1];
    })), e;
  }
  /**
  Find the values for a given language data field, provided by the
  the [`languageData`](https://codemirror.net/6/docs/ref/#state.EditorState^languageData) facet.
  
  Examples of language data fields are...
  
  - [`"commentTokens"`](https://codemirror.net/6/docs/ref/#commands.CommentTokens) for specifying
    comment syntax.
  - [`"autocomplete"`](https://codemirror.net/6/docs/ref/#autocomplete.autocompletion^config.override)
    for providing language-specific completion sources.
  - [`"wordChars"`](https://codemirror.net/6/docs/ref/#state.EditorState.charCategorizer) for adding
    characters that should be considered part of words in this
    language.
  - [`"closeBrackets"`](https://codemirror.net/6/docs/ref/#autocomplete.CloseBracketConfig) controls
    bracket closing behavior.
  */
  languageDataAt(e, t, i = -1) {
    let r = [];
    for (let O of this.facet($l))
      for (let s of O(this, t, i))
        Object.prototype.hasOwnProperty.call(s, e) && r.push(s[e]);
    return r;
  }
  /**
  Return a function that can categorize strings (expected to
  represent a single [grapheme cluster](https://codemirror.net/6/docs/ref/#state.findClusterBreak))
  into one of:
  
   - Word (contains an alphanumeric character or a character
     explicitly listed in the local language's `"wordChars"`
     language data, which should be a string)
   - Space (contains only whitespace)
   - Other (anything else)
  */
  charCategorizer(e) {
    let t = this.languageDataAt("wordChars", e);
    return Nf(t.length ? t[0] : "");
  }
  /**
  Find the word at the given position, meaning the range
  containing all [word](https://codemirror.net/6/docs/ref/#state.CharCategory.Word) characters
  around it. If no word characters are adjacent to the position,
  this returns null.
  */
  wordAt(e) {
    let { text: t, from: i, length: r } = this.doc.lineAt(e), O = this.charCategorizer(e), s = e - i, a = e - i;
    for (; s > 0; ) {
      let o = re(t, s, !1);
      if (O(t.slice(o, s)) != xe.Word)
        break;
      s = o;
    }
    for (; a < r; ) {
      let o = re(t, a);
      if (O(t.slice(a, o)) != xe.Word)
        break;
      a = o;
    }
    return s == a ? null : S.range(s + i, a + i);
  }
}
q.allowMultipleSelections = sO;
q.tabSize = /* @__PURE__ */ w.define({
  combine: (n) => n.length ? n[0] : 4
});
q.lineSeparator = dl;
q.readOnly = gl;
q.phrases = /* @__PURE__ */ w.define({
  compare(n, e) {
    let t = Object.keys(n), i = Object.keys(e);
    return t.length == i.length && t.every((r) => n[r] == e[r]);
  }
});
q.languageData = $l;
q.changeFilter = pl;
q.transactionFilter = Ql;
q.transactionExtender = ml;
ci.reconfigure = /* @__PURE__ */ U.define();
function Bi(n, e, t = {}) {
  let i = {};
  for (let r of n)
    for (let O of Object.keys(r)) {
      let s = r[O], a = i[O];
      if (a === void 0)
        i[O] = s;
      else if (!(a === s || s === void 0)) if (Object.hasOwnProperty.call(t, O))
        i[O] = t[O](a, s);
      else
        throw new Error("Config merge conflict for field " + O);
    }
  for (let r in e)
    i[r] === void 0 && (i[r] = e[r]);
  return i;
}
class pt {
  /**
  Compare this value with another value. Used when comparing
  rangesets. The default implementation compares by identity.
  Unless you are only creating a fixed number of unique instances
  of your value type, it is a good idea to implement this
  properly.
  */
  eq(e) {
    return this == e;
  }
  /**
  Create a [range](https://codemirror.net/6/docs/ref/#state.Range) with this value.
  */
  range(e, t = e) {
    return lO.create(e, t, this);
  }
}
pt.prototype.startSide = pt.prototype.endSide = 0;
pt.prototype.point = !1;
pt.prototype.mapMode = se.TrackDel;
function es(n, e) {
  return n == e || n.constructor == e.constructor && n.eq(e);
}
let lO = class Tl {
  constructor(e, t, i) {
    this.from = e, this.to = t, this.value = i;
  }
  /**
  @internal
  */
  static create(e, t, i) {
    return new Tl(e, t, i);
  }
};
function cO(n, e) {
  return n.from - e.from || n.value.startSide - e.value.startSide;
}
class ts {
  constructor(e, t, i, r) {
    this.from = e, this.to = t, this.value = i, this.maxPoint = r;
  }
  get length() {
    return this.to[this.to.length - 1];
  }
  // Find the index of the given position and side. Use the ranges'
  // `from` pos when `end == false`, `to` when `end == true`.
  findIndex(e, t, i, r = 0) {
    let O = i ? this.to : this.from;
    for (let s = r, a = O.length; ; ) {
      if (s == a)
        return s;
      let o = s + a >> 1, l = O[o] - e || (i ? this.value[o].endSide : this.value[o].startSide) - t;
      if (o == s)
        return l >= 0 ? s : a;
      l >= 0 ? a = o : s = o + 1;
    }
  }
  between(e, t, i, r) {
    for (let O = this.findIndex(t, -1e9, !0), s = this.findIndex(i, 1e9, !1, O); O < s; O++)
      if (r(this.from[O] + e, this.to[O] + e, this.value[O]) === !1)
        return !1;
  }
  map(e, t) {
    let i = [], r = [], O = [], s = -1, a = -1;
    for (let o = 0; o < this.value.length; o++) {
      let l = this.value[o], c = this.from[o] + e, h = this.to[o] + e, f, u;
      if (c == h) {
        let d = t.mapPos(c, l.startSide, l.mapMode);
        if (d == null || (f = u = d, l.startSide != l.endSide && (u = t.mapPos(c, l.endSide), u < f)))
          continue;
      } else if (f = t.mapPos(c, l.startSide), u = t.mapPos(h, l.endSide), f > u || f == u && l.startSide > 0 && l.endSide <= 0)
        continue;
      (u - f || l.endSide - l.startSide) < 0 || (s < 0 && (s = f), l.point && (a = Math.max(a, u - f)), i.push(l), r.push(f - s), O.push(u - s));
    }
    return { mapped: i.length ? new ts(r, O, i, a) : null, pos: s };
  }
}
class _ {
  constructor(e, t, i, r) {
    this.chunkPos = e, this.chunk = t, this.nextLayer = i, this.maxPoint = r;
  }
  /**
  @internal
  */
  static create(e, t, i, r) {
    return new _(e, t, i, r);
  }
  /**
  @internal
  */
  get length() {
    let e = this.chunk.length - 1;
    return e < 0 ? 0 : Math.max(this.chunkEnd(e), this.nextLayer.length);
  }
  /**
  The number of ranges in the set.
  */
  get size() {
    if (this.isEmpty)
      return 0;
    let e = this.nextLayer.size;
    for (let t of this.chunk)
      e += t.value.length;
    return e;
  }
  /**
  @internal
  */
  chunkEnd(e) {
    return this.chunkPos[e] + this.chunk[e].length;
  }
  /**
  Update the range set, optionally adding new ranges or filtering
  out existing ones.
  
  (Note: The type parameter is just there as a kludge to work
  around TypeScript variance issues that prevented `RangeSet<X>`
  from being a subtype of `RangeSet<Y>` when `X` is a subtype of
  `Y`.)
  */
  update(e) {
    let { add: t = [], sort: i = !1, filterFrom: r = 0, filterTo: O = this.length } = e, s = e.filter;
    if (t.length == 0 && !s)
      return this;
    if (i && (t = t.slice().sort(cO)), this.isEmpty)
      return t.length ? _.of(t) : this;
    let a = new yl(this, null, -1).goto(0), o = 0, l = [], c = new ti();
    for (; a.value || o < t.length; )
      if (o < t.length && (a.from - t[o].from || a.startSide - t[o].value.startSide) >= 0) {
        let h = t[o++];
        c.addInner(h.from, h.to, h.value) || l.push(h);
      } else a.rangeIndex == 1 && a.chunkIndex < this.chunk.length && (o == t.length || this.chunkEnd(a.chunkIndex) < t[o].from) && (!s || r > this.chunkEnd(a.chunkIndex) || O < this.chunkPos[a.chunkIndex]) && c.addChunk(this.chunkPos[a.chunkIndex], this.chunk[a.chunkIndex]) ? a.nextChunk() : ((!s || r > a.to || O < a.from || s(a.from, a.to, a.value)) && (c.addInner(a.from, a.to, a.value) || l.push(lO.create(a.from, a.to, a.value))), a.next());
    return c.finishInner(this.nextLayer.isEmpty && !l.length ? _.empty : this.nextLayer.update({ add: l, filter: s, filterFrom: r, filterTo: O }));
  }
  /**
  Map this range set through a set of changes, return the new set.
  */
  map(e) {
    if (e.empty || this.isEmpty)
      return this;
    let t = [], i = [], r = -1;
    for (let s = 0; s < this.chunk.length; s++) {
      let a = this.chunkPos[s], o = this.chunk[s], l = e.touchesRange(a, a + o.length);
      if (l === !1)
        r = Math.max(r, o.maxPoint), t.push(o), i.push(e.mapPos(a));
      else if (l === !0) {
        let { mapped: c, pos: h } = o.map(a, e);
        c && (r = Math.max(r, c.maxPoint), t.push(c), i.push(h));
      }
    }
    let O = this.nextLayer.map(e);
    return t.length == 0 ? O : new _(i, t, O || _.empty, r);
  }
  /**
  Iterate over the ranges that touch the region `from` to `to`,
  calling `f` for each. There is no guarantee that the ranges will
  be reported in any specific order. When the callback returns
  `false`, iteration stops.
  */
  between(e, t, i) {
    if (!this.isEmpty) {
      for (let r = 0; r < this.chunk.length; r++) {
        let O = this.chunkPos[r], s = this.chunk[r];
        if (t >= O && e <= O + s.length && s.between(O, e - O, t - O, i) === !1)
          return;
      }
      this.nextLayer.between(e, t, i);
    }
  }
  /**
  Iterate over the ranges in this set, in order, including all
  ranges that end at or after `from`.
  */
  iter(e = 0) {
    return Vi.from([this]).goto(e);
  }
  /**
  @internal
  */
  get isEmpty() {
    return this.nextLayer == this;
  }
  /**
  Iterate over the ranges in a collection of sets, in order,
  starting from `from`.
  */
  static iter(e, t = 0) {
    return Vi.from(e).goto(t);
  }
  /**
  Iterate over two groups of sets, calling methods on `comparator`
  to notify it of possible differences.
  */
  static compare(e, t, i, r, O = -1) {
    let s = e.filter((h) => h.maxPoint > 0 || !h.isEmpty && h.maxPoint >= O), a = t.filter((h) => h.maxPoint > 0 || !h.isEmpty && h.maxPoint >= O), o = Ds(s, a, i), l = new pi(s, o, O), c = new pi(a, o, O);
    i.iterGaps((h, f, u) => Bs(l, h, c, f, u, r)), i.empty && i.length == 0 && Bs(l, 0, c, 0, 0, r);
  }
  /**
  Compare the contents of two groups of range sets, returning true
  if they are equivalent in the given range.
  */
  static eq(e, t, i = 0, r) {
    r == null && (r = 999999999);
    let O = e.filter((c) => !c.isEmpty && t.indexOf(c) < 0), s = t.filter((c) => !c.isEmpty && e.indexOf(c) < 0);
    if (O.length != s.length)
      return !1;
    if (!O.length)
      return !0;
    let a = Ds(O, s), o = new pi(O, a, 0).goto(i), l = new pi(s, a, 0).goto(i);
    for (; ; ) {
      if (o.to != l.to || !hO(o.active, l.active) || o.point && (!l.point || !es(o.point, l.point)))
        return !1;
      if (o.to > r)
        return !0;
      o.next(), l.next();
    }
  }
  /**
  Iterate over a group of range sets at the same time, notifying
  the iterator about the ranges covering every given piece of
  content. Returns the open count (see
  [`SpanIterator.span`](https://codemirror.net/6/docs/ref/#state.SpanIterator.span)) at the end
  of the iteration.
  */
  static spans(e, t, i, r, O = -1) {
    let s = new pi(e, null, O).goto(t), a = t, o = s.openStart;
    for (; ; ) {
      let l = Math.min(s.to, i);
      if (s.point) {
        let c = s.activeForPoint(s.to), h = s.pointFrom < t ? c.length + 1 : s.point.startSide < 0 ? c.length : Math.min(c.length, o);
        r.point(a, l, s.point, c, h, s.pointRank), o = Math.min(s.openEnd(l), c.length);
      } else l > a && (r.span(a, l, s.active, o), o = s.openEnd(l));
      if (s.to > i)
        return o + (s.point && s.to > i ? 1 : 0);
      a = s.to, s.next();
    }
  }
  /**
  Create a range set for the given range or array of ranges. By
  default, this expects the ranges to be _sorted_ (by start
  position and, if two start at the same position,
  `value.startSide`). You can pass `true` as second argument to
  cause the method to sort them.
  */
  static of(e, t = !1) {
    let i = new ti();
    for (let r of e instanceof lO ? [e] : t ? Ff(e) : e)
      i.add(r.from, r.to, r.value);
    return i.finish();
  }
  /**
  Join an array of range sets into a single set.
  */
  static join(e) {
    if (!e.length)
      return _.empty;
    let t = e[e.length - 1];
    for (let i = e.length - 2; i >= 0; i--)
      for (let r = e[i]; r != _.empty; r = r.nextLayer)
        t = new _(r.chunkPos, r.chunk, t, Math.max(r.maxPoint, t.maxPoint));
    return t;
  }
}
_.empty = /* @__PURE__ */ new _([], [], null, -1);
function Ff(n) {
  if (n.length > 1)
    for (let e = n[0], t = 1; t < n.length; t++) {
      let i = n[t];
      if (cO(e, i) > 0)
        return n.slice().sort(cO);
      e = i;
    }
  return n;
}
_.empty.nextLayer = _.empty;
class ti {
  finishChunk(e) {
    this.chunks.push(new ts(this.from, this.to, this.value, this.maxPoint)), this.chunkPos.push(this.chunkStart), this.chunkStart = -1, this.setMaxPoint = Math.max(this.setMaxPoint, this.maxPoint), this.maxPoint = -1, e && (this.from = [], this.to = [], this.value = []);
  }
  /**
  Create an empty builder.
  */
  constructor() {
    this.chunks = [], this.chunkPos = [], this.chunkStart = -1, this.last = null, this.lastFrom = -1e9, this.lastTo = -1e9, this.from = [], this.to = [], this.value = [], this.maxPoint = -1, this.setMaxPoint = -1, this.nextLayer = null;
  }
  /**
  Add a range. Ranges should be added in sorted (by `from` and
  `value.startSide`) order.
  */
  add(e, t, i) {
    this.addInner(e, t, i) || (this.nextLayer || (this.nextLayer = new ti())).add(e, t, i);
  }
  /**
  @internal
  */
  addInner(e, t, i) {
    let r = e - this.lastTo || i.startSide - this.last.endSide;
    if (r <= 0 && (e - this.lastFrom || i.startSide - this.last.startSide) < 0)
      throw new Error("Ranges must be added sorted by `from` position and `startSide`");
    return r < 0 ? !1 : (this.from.length == 250 && this.finishChunk(!0), this.chunkStart < 0 && (this.chunkStart = e), this.from.push(e - this.chunkStart), this.to.push(t - this.chunkStart), this.last = i, this.lastFrom = e, this.lastTo = t, this.value.push(i), i.point && (this.maxPoint = Math.max(this.maxPoint, t - e)), !0);
  }
  /**
  @internal
  */
  addChunk(e, t) {
    if ((e - this.lastTo || t.value[0].startSide - this.last.endSide) < 0)
      return !1;
    this.from.length && this.finishChunk(!0), this.setMaxPoint = Math.max(this.setMaxPoint, t.maxPoint), this.chunks.push(t), this.chunkPos.push(e);
    let i = t.value.length - 1;
    return this.last = t.value[i], this.lastFrom = t.from[i] + e, this.lastTo = t.to[i] + e, !0;
  }
  /**
  Finish the range set. Returns the new set. The builder can't be
  used anymore after this has been called.
  */
  finish() {
    return this.finishInner(_.empty);
  }
  /**
  @internal
  */
  finishInner(e) {
    if (this.from.length && this.finishChunk(!1), this.chunks.length == 0)
      return e;
    let t = _.create(this.chunkPos, this.chunks, this.nextLayer ? this.nextLayer.finishInner(e) : e, this.setMaxPoint);
    return this.from = null, t;
  }
}
function Ds(n, e, t) {
  let i = /* @__PURE__ */ new Map();
  for (let O of n)
    for (let s = 0; s < O.chunk.length; s++)
      O.chunk[s].maxPoint <= 0 && i.set(O.chunk[s], O.chunkPos[s]);
  let r = /* @__PURE__ */ new Set();
  for (let O of e)
    for (let s = 0; s < O.chunk.length; s++) {
      let a = i.get(O.chunk[s]);
      a != null && (t ? t.mapPos(a) : a) == O.chunkPos[s] && !(t != null && t.touchesRange(a, a + O.chunk[s].length)) && r.add(O.chunk[s]);
    }
  return r;
}
class yl {
  constructor(e, t, i, r = 0) {
    this.layer = e, this.skip = t, this.minPoint = i, this.rank = r;
  }
  get startSide() {
    return this.value ? this.value.startSide : 0;
  }
  get endSide() {
    return this.value ? this.value.endSide : 0;
  }
  goto(e, t = -1e9) {
    return this.chunkIndex = this.rangeIndex = 0, this.gotoInner(e, t, !1), this;
  }
  gotoInner(e, t, i) {
    for (; this.chunkIndex < this.layer.chunk.length; ) {
      let r = this.layer.chunk[this.chunkIndex];
      if (!(this.skip && this.skip.has(r) || this.layer.chunkEnd(this.chunkIndex) < e || r.maxPoint < this.minPoint))
        break;
      this.chunkIndex++, i = !1;
    }
    if (this.chunkIndex < this.layer.chunk.length) {
      let r = this.layer.chunk[this.chunkIndex].findIndex(e - this.layer.chunkPos[this.chunkIndex], t, !0);
      (!i || this.rangeIndex < r) && this.setRangeIndex(r);
    }
    this.next();
  }
  forward(e, t) {
    (this.to - e || this.endSide - t) < 0 && this.gotoInner(e, t, !0);
  }
  next() {
    for (; ; )
      if (this.chunkIndex == this.layer.chunk.length) {
        this.from = this.to = 1e9, this.value = null;
        break;
      } else {
        let e = this.layer.chunkPos[this.chunkIndex], t = this.layer.chunk[this.chunkIndex], i = e + t.from[this.rangeIndex];
        if (this.from = i, this.to = e + t.to[this.rangeIndex], this.value = t.value[this.rangeIndex], this.setRangeIndex(this.rangeIndex + 1), this.minPoint < 0 || this.value.point && this.to - this.from >= this.minPoint)
          break;
      }
  }
  setRangeIndex(e) {
    if (e == this.layer.chunk[this.chunkIndex].value.length) {
      if (this.chunkIndex++, this.skip)
        for (; this.chunkIndex < this.layer.chunk.length && this.skip.has(this.layer.chunk[this.chunkIndex]); )
          this.chunkIndex++;
      this.rangeIndex = 0;
    } else
      this.rangeIndex = e;
  }
  nextChunk() {
    this.chunkIndex++, this.rangeIndex = 0, this.next();
  }
  compare(e) {
    return this.from - e.from || this.startSide - e.startSide || this.rank - e.rank || this.to - e.to || this.endSide - e.endSide;
  }
}
class Vi {
  constructor(e) {
    this.heap = e;
  }
  static from(e, t = null, i = -1) {
    let r = [];
    for (let O = 0; O < e.length; O++)
      for (let s = e[O]; !s.isEmpty; s = s.nextLayer)
        s.maxPoint >= i && r.push(new yl(s, t, i, O));
    return r.length == 1 ? r[0] : new Vi(r);
  }
  get startSide() {
    return this.value ? this.value.startSide : 0;
  }
  goto(e, t = -1e9) {
    for (let i of this.heap)
      i.goto(e, t);
    for (let i = this.heap.length >> 1; i >= 0; i--)
      mr(this.heap, i);
    return this.next(), this;
  }
  forward(e, t) {
    for (let i of this.heap)
      i.forward(e, t);
    for (let i = this.heap.length >> 1; i >= 0; i--)
      mr(this.heap, i);
    (this.to - e || this.value.endSide - t) < 0 && this.next();
  }
  next() {
    if (this.heap.length == 0)
      this.from = this.to = 1e9, this.value = null, this.rank = -1;
    else {
      let e = this.heap[0];
      this.from = e.from, this.to = e.to, this.value = e.value, this.rank = e.rank, e.value && e.next(), mr(this.heap, 0);
    }
  }
}
function mr(n, e) {
  for (let t = n[e]; ; ) {
    let i = (e << 1) + 1;
    if (i >= n.length)
      break;
    let r = n[i];
    if (i + 1 < n.length && r.compare(n[i + 1]) >= 0 && (r = n[i + 1], i++), t.compare(r) < 0)
      break;
    n[i] = t, n[e] = r, e = i;
  }
}
class pi {
  constructor(e, t, i) {
    this.minPoint = i, this.active = [], this.activeTo = [], this.activeRank = [], this.minActive = -1, this.point = null, this.pointFrom = 0, this.pointRank = 0, this.to = -1e9, this.endSide = 0, this.openStart = -1, this.cursor = Vi.from(e, t, i);
  }
  goto(e, t = -1e9) {
    return this.cursor.goto(e, t), this.active.length = this.activeTo.length = this.activeRank.length = 0, this.minActive = -1, this.to = e, this.endSide = t, this.openStart = -1, this.next(), this;
  }
  forward(e, t) {
    for (; this.minActive > -1 && (this.activeTo[this.minActive] - e || this.active[this.minActive].endSide - t) < 0; )
      this.removeActive(this.minActive);
    this.cursor.forward(e, t);
  }
  removeActive(e) {
    rn(this.active, e), rn(this.activeTo, e), rn(this.activeRank, e), this.minActive = Is(this.active, this.activeTo);
  }
  addActive(e) {
    let t = 0, { value: i, to: r, rank: O } = this.cursor;
    for (; t < this.activeRank.length && (O - this.activeRank[t] || r - this.activeTo[t]) > 0; )
      t++;
    On(this.active, t, i), On(this.activeTo, t, r), On(this.activeRank, t, O), e && On(e, t, this.cursor.from), this.minActive = Is(this.active, this.activeTo);
  }
  // After calling this, if `this.point` != null, the next range is a
  // point. Otherwise, it's a regular range, covered by `this.active`.
  next() {
    let e = this.to, t = this.point;
    this.point = null;
    let i = this.openStart < 0 ? [] : null;
    for (; ; ) {
      let r = this.minActive;
      if (r > -1 && (this.activeTo[r] - this.cursor.from || this.active[r].endSide - this.cursor.startSide) < 0) {
        if (this.activeTo[r] > e) {
          this.to = this.activeTo[r], this.endSide = this.active[r].endSide;
          break;
        }
        this.removeActive(r), i && rn(i, r);
      } else if (this.cursor.value)
        if (this.cursor.from > e) {
          this.to = this.cursor.from, this.endSide = this.cursor.startSide;
          break;
        } else {
          let O = this.cursor.value;
          if (!O.point)
            this.addActive(i), this.cursor.next();
          else if (t && this.cursor.to == this.to && this.cursor.from < this.cursor.to)
            this.cursor.next();
          else {
            this.point = O, this.pointFrom = this.cursor.from, this.pointRank = this.cursor.rank, this.to = this.cursor.to, this.endSide = O.endSide, this.cursor.next(), this.forward(this.to, this.endSide);
            break;
          }
        }
      else {
        this.to = this.endSide = 1e9;
        break;
      }
    }
    if (i) {
      this.openStart = 0;
      for (let r = i.length - 1; r >= 0 && i[r] < e; r--)
        this.openStart++;
    }
  }
  activeForPoint(e) {
    if (!this.active.length)
      return this.active;
    let t = [];
    for (let i = this.active.length - 1; i >= 0 && !(this.activeRank[i] < this.pointRank); i--)
      (this.activeTo[i] > e || this.activeTo[i] == e && this.active[i].endSide >= this.point.endSide) && t.push(this.active[i]);
    return t.reverse();
  }
  openEnd(e) {
    let t = 0;
    for (let i = this.activeTo.length - 1; i >= 0 && this.activeTo[i] > e; i--)
      t++;
    return t;
  }
}
function Bs(n, e, t, i, r, O) {
  n.goto(e), t.goto(i);
  let s = i + r, a = i, o = i - e, l = !!O.boundChange;
  for (let c = !1; ; ) {
    let h = n.to + o - t.to, f = h || n.endSide - t.endSide, u = f < 0 ? n.to + o : t.to, d = Math.min(u, s);
    if (n.point || t.point ? (n.point && t.point && es(n.point, t.point) && hO(n.activeForPoint(n.to), t.activeForPoint(t.to)) || O.comparePoint(a, d, n.point, t.point), c = !1) : (c && O.boundChange(a), d > a && !hO(n.active, t.active) && O.compareRange(a, d, n.active, t.active), l && d < s && (h || n.openEnd(u) != t.openEnd(u)) && (c = !0)), u > s)
      break;
    a = u, f <= 0 && n.next(), f >= 0 && t.next();
  }
}
function hO(n, e) {
  if (n.length != e.length)
    return !1;
  for (let t = 0; t < n.length; t++)
    if (n[t] != e[t] && !es(n[t], e[t]))
      return !1;
  return !0;
}
function rn(n, e) {
  for (let t = e, i = n.length - 1; t < i; t++)
    n[t] = n[t + 1];
  n.pop();
}
function On(n, e, t) {
  for (let i = n.length - 1; i >= e; i--)
    n[i + 1] = n[i];
  n[e] = t;
}
function Is(n, e) {
  let t = -1, i = 1e9;
  for (let r = 0; r < e.length; r++)
    (e[r] - i || n[r].endSide - n[t].endSide) < 0 && (t = r, i = e[r]);
  return t;
}
function ir(n, e, t = n.length) {
  let i = 0;
  for (let r = 0; r < t && r < n.length; )
    n.charCodeAt(r) == 9 ? (i += e - i % e, r++) : (i++, r = re(n, r));
  return i;
}
function Hf(n, e, t, i) {
  for (let r = 0, O = 0; ; ) {
    if (O >= e)
      return r;
    if (r == n.length)
      break;
    O += n.charCodeAt(r) == 9 ? t - O % t : 1, r = re(n, r);
  }
  return n.length;
}
const fO = "ͼ", Ns = typeof Symbol > "u" ? "__" + fO : Symbol.for(fO), uO = typeof Symbol > "u" ? "__styleSet" + Math.floor(Math.random() * 1e8) : Symbol("styleSet"), Fs = typeof globalThis < "u" ? globalThis : typeof window < "u" ? window : {};
class Qt {
  // :: (Object<Style>, ?{finish: ?(string) → string})
  // Create a style module from the given spec.
  //
  // When `finish` is given, it is called on regular (non-`@`)
  // selectors (after `&` expansion) to compute the final selector.
  constructor(e, t) {
    this.rules = [];
    let { finish: i } = t || {};
    function r(s) {
      return /^@/.test(s) ? [s] : s.split(/,\s*/);
    }
    function O(s, a, o, l) {
      let c = [], h = /^@(\w+)\b/.exec(s[0]), f = h && h[1] == "keyframes";
      if (h && a == null) return o.push(s[0] + ";");
      for (let u in a) {
        let d = a[u];
        if (/&/.test(u))
          O(
            u.split(/,\s*/).map((p) => s.map((Q) => p.replace(/&/, Q))).reduce((p, Q) => p.concat(Q)),
            d,
            o
          );
        else if (d && typeof d == "object") {
          if (!h) throw new RangeError("The value of a property (" + u + ") should be a primitive value.");
          O(r(u), d, c, f);
        } else d != null && c.push(u.replace(/_.*/, "").replace(/[A-Z]/g, (p) => "-" + p.toLowerCase()) + ": " + d + ";");
      }
      (c.length || f) && o.push((i && !h && !l ? s.map(i) : s).join(", ") + " {" + c.join(" ") + "}");
    }
    for (let s in e) O(r(s), e[s], this.rules);
  }
  // :: () → string
  // Returns a string containing the module's CSS rules.
  getRules() {
    return this.rules.join(`
`);
  }
  // :: () → string
  // Generate a new unique CSS class name.
  static newName() {
    let e = Fs[Ns] || 1;
    return Fs[Ns] = e + 1, fO + e.toString(36);
  }
  // :: (union<Document, ShadowRoot>, union<[StyleModule], StyleModule>, ?{nonce: ?string})
  //
  // Mount the given set of modules in the given DOM root, which ensures
  // that the CSS rules defined by the module are available in that
  // context.
  //
  // Rules are only added to the document once per root.
  //
  // Rule order will follow the order of the modules, so that rules from
  // modules later in the array take precedence of those from earlier
  // modules. If you call this function multiple times for the same root
  // in a way that changes the order of already mounted modules, the old
  // order will be changed.
  //
  // If a Content Security Policy nonce is provided, it is added to
  // the `<style>` tag generated by the library.
  static mount(e, t, i) {
    let r = e[uO], O = i && i.nonce;
    r ? O && r.setNonce(O) : r = new Kf(e, O), r.mount(Array.isArray(t) ? t : [t], e);
  }
}
let Hs = /* @__PURE__ */ new Map();
class Kf {
  constructor(e, t) {
    let i = e.ownerDocument || e, r = i.defaultView;
    if (!e.head && e.adoptedStyleSheets && r.CSSStyleSheet) {
      let O = Hs.get(i);
      if (O) return e[uO] = O;
      this.sheet = new r.CSSStyleSheet(), Hs.set(i, this);
    } else
      this.styleTag = i.createElement("style"), t && this.styleTag.setAttribute("nonce", t);
    this.modules = [], e[uO] = this;
  }
  mount(e, t) {
    let i = this.sheet, r = 0, O = 0;
    for (let s = 0; s < e.length; s++) {
      let a = e[s], o = this.modules.indexOf(a);
      if (o < O && o > -1 && (this.modules.splice(o, 1), O--, o = -1), o == -1) {
        if (this.modules.splice(O++, 0, a), i) for (let l = 0; l < a.rules.length; l++)
          i.insertRule(a.rules[l], r++);
      } else {
        for (; O < o; ) r += this.modules[O++].rules.length;
        r += a.rules.length, O++;
      }
    }
    if (i)
      t.adoptedStyleSheets.indexOf(this.sheet) < 0 && (t.adoptedStyleSheets = [this.sheet, ...t.adoptedStyleSheets]);
    else {
      let s = "";
      for (let o = 0; o < this.modules.length; o++)
        s += this.modules[o].getRules() + `
`;
      this.styleTag.textContent = s;
      let a = t.head || t;
      this.styleTag.parentNode != a && a.insertBefore(this.styleTag, a.firstChild);
    }
  }
  setNonce(e) {
    this.styleTag && this.styleTag.getAttribute("nonce") != e && this.styleTag.setAttribute("nonce", e);
  }
}
let le = typeof navigator < "u" ? navigator : { userAgent: "", vendor: "", platform: "" }, $O = typeof document < "u" ? document : { documentElement: { style: {} } };
const dO = /* @__PURE__ */ /Edge\/(\d+)/.exec(le.userAgent), bl = /* @__PURE__ */ /MSIE \d/.test(le.userAgent), pO = /* @__PURE__ */ /Trident\/(?:[7-9]|\d{2,})\..*rv:(\d+)/.exec(le.userAgent), nr = !!(bl || pO || dO), Ks = !nr && /* @__PURE__ */ /gecko\/(\d+)/i.test(le.userAgent), gr = !nr && /* @__PURE__ */ /Chrome\/(\d+)/.exec(le.userAgent), Jf = "webkitFontSmoothing" in $O.documentElement.style, QO = !nr && /* @__PURE__ */ /Apple Computer/.test(le.vendor), Js = QO && (/* @__PURE__ */ /Mobile\/\w+/.test(le.userAgent) || le.maxTouchPoints > 2);
var b = {
  mac: Js || /* @__PURE__ */ /Mac/.test(le.platform),
  windows: /* @__PURE__ */ /Win/.test(le.platform),
  linux: /* @__PURE__ */ /Linux|X11/.test(le.platform),
  ie: nr,
  ie_version: bl ? $O.documentMode || 6 : pO ? +pO[1] : dO ? +dO[1] : 0,
  gecko: Ks,
  gecko_version: Ks ? +(/* @__PURE__ */ /Firefox\/(\d+)/.exec(le.userAgent) || [0, 0])[1] : 0,
  chrome: !!gr,
  chrome_version: gr ? +gr[1] : 0,
  ios: Js,
  android: /* @__PURE__ */ /Android\b/.test(le.userAgent),
  webkit_version: Jf ? +(/* @__PURE__ */ /\bAppleWebKit\/(\d+)/.exec(le.userAgent) || [0, 0])[1] : 0,
  safari: QO,
  safari_version: QO ? +(/* @__PURE__ */ /\bVersion\/(\d+(\.\d+)?)/.exec(le.userAgent) || [0, 0])[1] : 0,
  tabSize: $O.documentElement.style.tabSize != null ? "tab-size" : "-moz-tab-size"
};
function is(n, e) {
  for (let t in n)
    t == "class" && e.class ? e.class += " " + n.class : t == "style" && e.style ? e.style += ";" + n.style : e[t] = n[t];
  return e;
}
const zn = /* @__PURE__ */ Object.create(null);
function ns(n, e, t) {
  if (n == e)
    return !0;
  n || (n = zn), e || (e = zn);
  let i = Object.keys(n), r = Object.keys(e);
  if (i.length - 0 != r.length - 0)
    return !1;
  for (let O of i)
    if (O != t && (r.indexOf(O) == -1 || n[O] !== e[O]))
      return !1;
  return !0;
}
function eu(n, e) {
  for (let t = n.attributes.length - 1; t >= 0; t--) {
    let i = n.attributes[t].name;
    e[i] == null && n.removeAttribute(i);
  }
  for (let t in e) {
    let i = e[t];
    t == "style" ? n.style.cssText = i : n.getAttribute(t) != i && n.setAttribute(t, i);
  }
}
function ea(n, e, t) {
  let i = !1;
  if (e)
    for (let r in e)
      t && r in t || (i = !0, r == "style" ? n.style.cssText = "" : n.removeAttribute(r));
  if (t)
    for (let r in t)
      e && e[r] == t[r] || (i = !0, r == "style" ? n.style.cssText = t[r] : n.setAttribute(r, t[r]));
  return i;
}
function tu(n) {
  let e = /* @__PURE__ */ Object.create(null);
  for (let t = 0; t < n.attributes.length; t++) {
    let i = n.attributes[t];
    e[i.name] = i.value;
  }
  return e;
}
class Pt {
  /**
  Compare this instance to another instance of the same type.
  (TypeScript can't express this, but only instances of the same
  specific class will be passed to this method.) This is used to
  avoid redrawing widgets when they are replaced by a new
  decoration of the same type. The default implementation just
  returns `false`, which will cause new instances of the widget to
  always be redrawn.
  */
  eq(e) {
    return !1;
  }
  /**
  Update a DOM element created by a widget of the same type (but
  different, non-`eq` content) to reflect this widget. May return
  true to indicate that it could update, false to indicate it
  couldn't (in which case the widget will be redrawn). The default
  implementation just returns false.
  */
  updateDOM(e, t) {
    return !1;
  }
  /**
  @internal
  */
  compare(e) {
    return this == e || this.constructor == e.constructor && this.eq(e);
  }
  /**
  The estimated height this widget will have, to be used when
  estimating the height of content that hasn't been drawn. May
  return -1 to indicate you don't know. The default implementation
  returns -1.
  */
  get estimatedHeight() {
    return -1;
  }
  /**
  For inline widgets that are displayed inline (as opposed to
  `inline-block`) and introduce line breaks (through `<br>` tags
  or textual newlines), this must indicate the amount of line
  breaks they introduce. Defaults to 0.
  */
  get lineBreaks() {
    return 0;
  }
  /**
  Can be used to configure which kinds of events inside the widget
  should be ignored by the editor. The default is to ignore all
  events.
  */
  ignoreEvent(e) {
    return !0;
  }
  /**
  Override the way screen coordinates for positions at/in the
  widget are found. `pos` will be the offset into the widget, and
  `side` the side of the position that is being queried—less than
  zero for before, greater than zero for after, and zero for
  directly at that position.
  */
  coordsAt(e, t, i) {
    return null;
  }
  /**
  @internal
  */
  get isHidden() {
    return !1;
  }
  /**
  @internal
  */
  get editable() {
    return !1;
  }
  /**
  This is called when the an instance of the widget is removed
  from the editor view.
  */
  destroy(e) {
  }
}
var pe = /* @__PURE__ */ (function(n) {
  return n[n.Text = 0] = "Text", n[n.WidgetBefore = 1] = "WidgetBefore", n[n.WidgetAfter = 2] = "WidgetAfter", n[n.WidgetRange = 3] = "WidgetRange", n;
})(pe || (pe = {}));
class Y extends pt {
  constructor(e, t, i, r) {
    super(), this.startSide = e, this.endSide = t, this.widget = i, this.spec = r;
  }
  /**
  @internal
  */
  get heightRelevant() {
    return !1;
  }
  /**
  Create a mark decoration, which influences the styling of the
  content in its range. Nested mark decorations will cause nested
  DOM elements to be created. Nesting order is determined by
  precedence of the [facet](https://codemirror.net/6/docs/ref/#view.EditorView^decorations), with
  the higher-precedence decorations creating the inner DOM nodes.
  Such elements are split on line boundaries and on the boundaries
  of lower-precedence decorations.
  */
  static mark(e) {
    return new Ii(e);
  }
  /**
  Create a widget decoration, which displays a DOM element at the
  given position.
  */
  static widget(e) {
    let t = Math.max(-1e4, Math.min(1e4, e.side || 0)), i = !!e.block;
    return t += i && !e.inlineOrder ? t > 0 ? 3e8 : -4e8 : t > 0 ? 1e8 : -1e8, new Vt(e, t, t, i, e.widget || null, !1);
  }
  /**
  Create a replace decoration which replaces the given range with
  a widget, or simply hides it.
  */
  static replace(e) {
    let t = !!e.block, i, r;
    if (e.isBlockGap)
      i = -5e8, r = 4e8;
    else {
      let { start: O, end: s } = wl(e, t);
      i = (O ? t ? -3e8 : -1 : 5e8) - 1, r = (s ? t ? 2e8 : 1 : -6e8) + 1;
    }
    return new Vt(e, i, r, t, e.widget || null, !0);
  }
  /**
  Create a line decoration, which can add DOM attributes to the
  line starting at the given position.
  */
  static line(e) {
    return new Ni(e);
  }
  /**
  Build a [`DecorationSet`](https://codemirror.net/6/docs/ref/#view.DecorationSet) from the given
  decorated range or ranges. If the ranges aren't already sorted,
  pass `true` for `sort` to make the library sort them for you.
  */
  static set(e, t = !1) {
    return _.of(e, t);
  }
  /**
  @internal
  */
  hasHeight() {
    return this.widget ? this.widget.estimatedHeight > -1 : !1;
  }
}
Y.none = _.empty;
class Ii extends Y {
  constructor(e) {
    let { start: t, end: i } = wl(e);
    super(t ? -1 : 5e8, i ? 1 : -6e8, null, e), this.tagName = e.tagName || "span", this.attrs = e.class && e.attributes ? is(e.attributes, { class: e.class }) : e.class ? { class: e.class } : e.attributes || zn;
  }
  eq(e) {
    return this == e || e instanceof Ii && this.tagName == e.tagName && ns(this.attrs, e.attrs);
  }
  range(e, t = e) {
    if (e >= t)
      throw new RangeError("Mark decorations may not be empty");
    return super.range(e, t);
  }
}
Ii.prototype.point = !1;
class Ni extends Y {
  constructor(e) {
    super(-2e8, -2e8, null, e);
  }
  eq(e) {
    return e instanceof Ni && this.spec.class == e.spec.class && ns(this.spec.attributes, e.spec.attributes);
  }
  range(e, t = e) {
    if (t != e)
      throw new RangeError("Line decoration ranges must be zero-length");
    return super.range(e, t);
  }
}
Ni.prototype.mapMode = se.TrackBefore;
Ni.prototype.point = !0;
class Vt extends Y {
  constructor(e, t, i, r, O, s) {
    super(t, i, O, e), this.block = r, this.isReplace = s, this.mapMode = r ? t <= 0 ? se.TrackBefore : se.TrackAfter : se.TrackDel;
  }
  // Only relevant when this.block == true
  get type() {
    return this.startSide != this.endSide ? pe.WidgetRange : this.startSide <= 0 ? pe.WidgetBefore : pe.WidgetAfter;
  }
  get heightRelevant() {
    return this.block || !!this.widget && (this.widget.estimatedHeight >= 5 || this.widget.lineBreaks > 0);
  }
  eq(e) {
    return e instanceof Vt && iu(this.widget, e.widget) && this.block == e.block && this.startSide == e.startSide && this.endSide == e.endSide;
  }
  range(e, t = e) {
    if (this.isReplace && (e > t || e == t && this.startSide > 0 && this.endSide <= 0))
      throw new RangeError("Invalid range for replacement decoration");
    if (!this.isReplace && t != e)
      throw new RangeError("Widget decorations can only have zero-length ranges");
    return super.range(e, t);
  }
}
Vt.prototype.point = !0;
function wl(n, e = !1) {
  let { inclusiveStart: t, inclusiveEnd: i } = n;
  return t == null && (t = n.inclusive), i == null && (i = n.inclusive), { start: t ?? e, end: i ?? e };
}
function iu(n, e) {
  return n == e || !!(n && e && n.compare(e));
}
function It(n, e, t, i = 0) {
  let r = t.length - 1;
  r >= 0 && t[r] + i >= n ? t[r] = Math.max(t[r], e) : t.push(n, e);
}
class Wi extends pt {
  constructor(e, t) {
    super(), this.tagName = e, this.attributes = t;
  }
  eq(e) {
    return e == this || e instanceof Wi && this.tagName == e.tagName && ns(this.attributes, e.attributes);
  }
  /**
  Create a block wrapper object with the given tag name and
  attributes.
  */
  static create(e) {
    return new Wi(e.tagName, e.attributes || zn);
  }
  /**
  Create a range set from the given block wrapper ranges.
  */
  static set(e, t = !1) {
    return _.of(e, t);
  }
}
Wi.prototype.startSide = Wi.prototype.endSide = -1;
function ii(n) {
  let e;
  return n.nodeType == 11 ? e = n.getSelection ? n : n.ownerDocument : e = n, e.getSelection();
}
function mO(n, e) {
  return e ? n == e || n.contains(e.nodeType != 1 ? e.parentNode : e) : !1;
}
function Xi(n, e) {
  if (!e.anchorNode)
    return !1;
  try {
    return mO(n, e.anchorNode);
  } catch {
    return !1;
  }
}
function vi(n) {
  return n.nodeType == 3 ? Ci(n, 0, n.nodeValue.length).getClientRects() : n.nodeType == 1 ? n.getClientRects() : [];
}
function Zi(n, e, t, i) {
  return t ? ta(n, e, t, i, -1) || ta(n, e, t, i, 1) : !1;
}
function mt(n) {
  for (var e = 0; ; e++)
    if (n = n.previousSibling, !n)
      return e;
}
function _n(n) {
  return n.nodeType == 1 && /^(DIV|P|LI|UL|OL|BLOCKQUOTE|DD|DT|H\d|SECTION|PRE)$/.test(n.nodeName);
}
function ta(n, e, t, i, r) {
  for (; ; ) {
    if (n == t && e == i)
      return !0;
    if (e == (r < 0 ? 0 : Ot(n))) {
      if (n.nodeName == "DIV")
        return !1;
      let O = n.parentNode;
      if (!O || O.nodeType != 1)
        return !1;
      e = mt(n) + (r < 0 ? 0 : 1), n = O;
    } else if (n.nodeType == 1) {
      if (n = n.childNodes[e + (r < 0 ? -1 : 0)], n.nodeType == 1 && n.contentEditable == "false")
        return !1;
      e = r < 0 ? Ot(n) : 0;
    } else
      return !1;
  }
}
function Ot(n) {
  return n.nodeType == 3 ? n.nodeValue.length : n.childNodes.length;
}
function qi(n, e) {
  let t = e ? n.left : n.right;
  return { left: t, right: t, top: n.top, bottom: n.bottom };
}
function nu(n) {
  let e = n.visualViewport;
  return e ? {
    left: 0,
    right: e.width,
    top: 0,
    bottom: e.height
  } : {
    left: 0,
    right: n.innerWidth,
    top: 0,
    bottom: n.innerHeight
  };
}
function xl(n, e) {
  let t = e.width / n.offsetWidth, i = e.height / n.offsetHeight;
  return (t > 0.995 && t < 1.005 || !isFinite(t) || Math.abs(e.width - n.offsetWidth) < 1) && (t = 1), (i > 0.995 && i < 1.005 || !isFinite(i) || Math.abs(e.height - n.offsetHeight) < 1) && (i = 1), { scaleX: t, scaleY: i };
}
function ru(n, e, t, i, r, O, s, a) {
  let o = n.ownerDocument, l = o.defaultView || window;
  for (let c = n, h = !1; c && !h; )
    if (c.nodeType == 1) {
      let f, u = c == o.body, d = 1, p = 1;
      if (u)
        f = nu(l);
      else {
        if (/^(fixed|sticky)$/.test(getComputedStyle(c).position) && (h = !0), c.scrollHeight <= c.clientHeight && c.scrollWidth <= c.clientWidth) {
          c = c.assignedSlot || c.parentNode;
          continue;
        }
        let g = c.getBoundingClientRect();
        ({ scaleX: d, scaleY: p } = xl(c, g)), f = {
          left: g.left,
          right: g.left + c.clientWidth * d,
          top: g.top,
          bottom: g.top + c.clientHeight * p
        };
      }
      let Q = 0, m = 0;
      if (r == "nearest")
        e.top < f.top ? (m = e.top - (f.top + s), t > 0 && e.bottom > f.bottom + m && (m = e.bottom - f.bottom + s)) : e.bottom > f.bottom && (m = e.bottom - f.bottom + s, t < 0 && e.top - m < f.top && (m = e.top - (f.top + s)));
      else {
        let g = e.bottom - e.top, T = f.bottom - f.top;
        m = (r == "center" && g <= T ? e.top + g / 2 - T / 2 : r == "start" || r == "center" && t < 0 ? e.top - s : e.bottom - T + s) - f.top;
      }
      if (i == "nearest" ? e.left < f.left ? (Q = e.left - (f.left + O), t > 0 && e.right > f.right + Q && (Q = e.right - f.right + O)) : e.right > f.right && (Q = e.right - f.right + O, t < 0 && e.left < f.left + Q && (Q = e.left - (f.left + O))) : Q = (i == "center" ? e.left + (e.right - e.left) / 2 - (f.right - f.left) / 2 : i == "start" == a ? e.left - O : e.right - (f.right - f.left) + O) - f.left, Q || m)
        if (u)
          l.scrollBy(Q, m);
        else {
          let g = 0, T = 0;
          if (m) {
            let v = c.scrollTop;
            c.scrollTop += m / p, T = (c.scrollTop - v) * p;
          }
          if (Q) {
            let v = c.scrollLeft;
            c.scrollLeft += Q / d, g = (c.scrollLeft - v) * d;
          }
          e = {
            left: e.left - g,
            top: e.top - T,
            right: e.right - g,
            bottom: e.bottom - T
          }, g && Math.abs(g - Q) < 1 && (i = "nearest"), T && Math.abs(T - m) < 1 && (r = "nearest");
        }
      if (u)
        break;
      (e.top < f.top || e.bottom > f.bottom || e.left < f.left || e.right > f.right) && (e = {
        left: Math.max(e.left, f.left),
        right: Math.min(e.right, f.right),
        top: Math.max(e.top, f.top),
        bottom: Math.min(e.bottom, f.bottom)
      }), c = c.assignedSlot || c.parentNode;
    } else if (c.nodeType == 11)
      c = c.host;
    else
      break;
}
function Ou(n) {
  let e = n.ownerDocument, t, i;
  for (let r = n.parentNode; r && !(r == e.body || t && i); )
    if (r.nodeType == 1)
      !i && r.scrollHeight > r.clientHeight && (i = r), !t && r.scrollWidth > r.clientWidth && (t = r), r = r.assignedSlot || r.parentNode;
    else if (r.nodeType == 11)
      r = r.host;
    else
      break;
  return { x: t, y: i };
}
class su {
  constructor() {
    this.anchorNode = null, this.anchorOffset = 0, this.focusNode = null, this.focusOffset = 0;
  }
  eq(e) {
    return this.anchorNode == e.anchorNode && this.anchorOffset == e.anchorOffset && this.focusNode == e.focusNode && this.focusOffset == e.focusOffset;
  }
  setRange(e) {
    let { anchorNode: t, focusNode: i } = e;
    this.set(t, Math.min(e.anchorOffset, t ? Ot(t) : 0), i, Math.min(e.focusOffset, i ? Ot(i) : 0));
  }
  set(e, t, i, r) {
    this.anchorNode = e, this.anchorOffset = t, this.focusNode = i, this.focusOffset = r;
  }
}
let kt = null;
b.safari && b.safari_version >= 26 && (kt = !1);
function kl(n) {
  if (n.setActive)
    return n.setActive();
  if (kt)
    return n.focus(kt);
  let e = [];
  for (let t = n; t && (e.push(t, t.scrollTop, t.scrollLeft), t != t.ownerDocument); t = t.parentNode)
    ;
  if (n.focus(kt == null ? {
    get preventScroll() {
      return kt = { preventScroll: !0 }, !0;
    }
  } : void 0), !kt) {
    kt = !1;
    for (let t = 0; t < e.length; ) {
      let i = e[t++], r = e[t++], O = e[t++];
      i.scrollTop != r && (i.scrollTop = r), i.scrollLeft != O && (i.scrollLeft = O);
    }
  }
}
let ia;
function Ci(n, e, t = e) {
  let i = ia || (ia = document.createRange());
  return i.setEnd(n, t), i.setStart(n, e), i;
}
function Nt(n, e, t, i) {
  let r = { key: e, code: e, keyCode: t, which: t, cancelable: !0 };
  i && ({ altKey: r.altKey, ctrlKey: r.ctrlKey, shiftKey: r.shiftKey, metaKey: r.metaKey } = i);
  let O = new KeyboardEvent("keydown", r);
  O.synthetic = !0, n.dispatchEvent(O);
  let s = new KeyboardEvent("keyup", r);
  return s.synthetic = !0, n.dispatchEvent(s), O.defaultPrevented || s.defaultPrevented;
}
function au(n) {
  for (; n; ) {
    if (n && (n.nodeType == 9 || n.nodeType == 11 && n.host))
      return n;
    n = n.assignedSlot || n.parentNode;
  }
  return null;
}
function ou(n, e) {
  let t = e.focusNode, i = e.focusOffset;
  if (!t || e.anchorNode != t || e.anchorOffset != i)
    return !1;
  for (i = Math.min(i, Ot(t)); ; )
    if (i) {
      if (t.nodeType != 1)
        return !1;
      let r = t.childNodes[i - 1];
      r.contentEditable == "false" ? i-- : (t = r, i = Ot(t));
    } else {
      if (t == n)
        return !0;
      i = mt(t), t = t.parentNode;
    }
}
function Xl(n) {
  return n.scrollTop > Math.max(1, n.scrollHeight - n.clientHeight - 4);
}
function vl(n, e) {
  for (let t = n, i = e; ; ) {
    if (t.nodeType == 3 && i > 0)
      return { node: t, offset: i };
    if (t.nodeType == 1 && i > 0) {
      if (t.contentEditable == "false")
        return null;
      t = t.childNodes[i - 1], i = Ot(t);
    } else if (t.parentNode && !_n(t))
      i = mt(t), t = t.parentNode;
    else
      return null;
  }
}
function Zl(n, e) {
  for (let t = n, i = e; ; ) {
    if (t.nodeType == 3 && i < t.nodeValue.length)
      return { node: t, offset: i };
    if (t.nodeType == 1 && i < t.childNodes.length) {
      if (t.contentEditable == "false")
        return null;
      t = t.childNodes[i], i = 0;
    } else if (t.parentNode && !_n(t))
      i = mt(t) + 1, t = t.parentNode;
    else
      return null;
  }
}
class Ye {
  constructor(e, t, i = !0) {
    this.node = e, this.offset = t, this.precise = i;
  }
  static before(e, t) {
    return new Ye(e.parentNode, mt(e), t);
  }
  static after(e, t) {
    return new Ye(e.parentNode, mt(e) + 1, t);
  }
}
var B = /* @__PURE__ */ (function(n) {
  return n[n.LTR = 0] = "LTR", n[n.RTL = 1] = "RTL", n;
})(B || (B = {}));
const Wt = B.LTR, rs = B.RTL;
function Rl(n) {
  let e = [];
  for (let t = 0; t < n.length; t++)
    e.push(1 << +n[t]);
  return e;
}
const lu = /* @__PURE__ */ Rl("88888888888888888888888888888888888666888888787833333333337888888000000000000000000000000008888880000000000000000000000000088888888888888888888888888888888888887866668888088888663380888308888800000000000000000000000800000000000000000000000000000008"), cu = /* @__PURE__ */ Rl("4444448826627288999999999992222222222222222222222222222222222222222222222229999999999999999999994444444444644222822222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222999999949999999229989999223333333333"), gO = /* @__PURE__ */ Object.create(null), Ae = [];
for (let n of ["()", "[]", "{}"]) {
  let e = /* @__PURE__ */ n.charCodeAt(0), t = /* @__PURE__ */ n.charCodeAt(1);
  gO[e] = t, gO[t] = -e;
}
function zl(n) {
  return n <= 247 ? lu[n] : 1424 <= n && n <= 1524 ? 2 : 1536 <= n && n <= 1785 ? cu[n - 1536] : 1774 <= n && n <= 2220 ? 4 : 8192 <= n && n <= 8204 ? 256 : 64336 <= n && n <= 65023 ? 4 : 1;
}
const hu = /[\u0590-\u05f4\u0600-\u06ff\u0700-\u08ac\ufb50-\ufdff]/;
class nt {
  /**
  The direction of this span.
  */
  get dir() {
    return this.level % 2 ? rs : Wt;
  }
  /**
  @internal
  */
  constructor(e, t, i) {
    this.from = e, this.to = t, this.level = i;
  }
  /**
  @internal
  */
  side(e, t) {
    return this.dir == t == e ? this.to : this.from;
  }
  /**
  @internal
  */
  forward(e, t) {
    return e == (this.dir == t);
  }
  /**
  @internal
  */
  static find(e, t, i, r) {
    let O = -1;
    for (let s = 0; s < e.length; s++) {
      let a = e[s];
      if (a.from <= t && a.to >= t) {
        if (a.level == i)
          return s;
        (O < 0 || (r != 0 ? r < 0 ? a.from < t : a.to > t : e[O].level > a.level)) && (O = s);
      }
    }
    if (O < 0)
      throw new RangeError("Index out of range");
    return O;
  }
}
function _l(n, e) {
  if (n.length != e.length)
    return !1;
  for (let t = 0; t < n.length; t++) {
    let i = n[t], r = e[t];
    if (i.from != r.from || i.to != r.to || i.direction != r.direction || !_l(i.inner, r.inner))
      return !1;
  }
  return !0;
}
const G = [];
function fu(n, e, t, i, r) {
  for (let O = 0; O <= i.length; O++) {
    let s = O ? i[O - 1].to : e, a = O < i.length ? i[O].from : t, o = O ? 256 : r;
    for (let l = s, c = o, h = o; l < a; l++) {
      let f = zl(n.charCodeAt(l));
      f == 512 ? f = c : f == 8 && h == 4 && (f = 16), G[l] = f == 4 ? 2 : f, f & 7 && (h = f), c = f;
    }
    for (let l = s, c = o, h = o; l < a; l++) {
      let f = G[l];
      if (f == 128)
        l < a - 1 && c == G[l + 1] && c & 24 ? f = G[l] = c : G[l] = 256;
      else if (f == 64) {
        let u = l + 1;
        for (; u < a && G[u] == 64; )
          u++;
        let d = l && c == 8 || u < t && G[u] == 8 ? h == 1 ? 1 : 8 : 256;
        for (let p = l; p < u; p++)
          G[p] = d;
        l = u - 1;
      } else f == 8 && h == 1 && (G[l] = 1);
      c = f, f & 7 && (h = f);
    }
  }
}
function uu(n, e, t, i, r) {
  let O = r == 1 ? 2 : 1;
  for (let s = 0, a = 0, o = 0; s <= i.length; s++) {
    let l = s ? i[s - 1].to : e, c = s < i.length ? i[s].from : t;
    for (let h = l, f, u, d; h < c; h++)
      if (u = gO[f = n.charCodeAt(h)])
        if (u < 0) {
          for (let p = a - 3; p >= 0; p -= 3)
            if (Ae[p + 1] == -u) {
              let Q = Ae[p + 2], m = Q & 2 ? r : Q & 4 ? Q & 1 ? O : r : 0;
              m && (G[h] = G[Ae[p]] = m), a = p;
              break;
            }
        } else {
          if (Ae.length == 189)
            break;
          Ae[a++] = h, Ae[a++] = f, Ae[a++] = o;
        }
      else if ((d = G[h]) == 2 || d == 1) {
        let p = d == r;
        o = p ? 0 : 1;
        for (let Q = a - 3; Q >= 0; Q -= 3) {
          let m = Ae[Q + 2];
          if (m & 2)
            break;
          if (p)
            Ae[Q + 2] |= 2;
          else {
            if (m & 4)
              break;
            Ae[Q + 2] |= 4;
          }
        }
      }
  }
}
function $u(n, e, t, i) {
  for (let r = 0, O = i; r <= t.length; r++) {
    let s = r ? t[r - 1].to : n, a = r < t.length ? t[r].from : e;
    for (let o = s; o < a; ) {
      let l = G[o];
      if (l == 256) {
        let c = o + 1;
        for (; ; )
          if (c == a) {
            if (r == t.length)
              break;
            c = t[r++].to, a = r < t.length ? t[r].from : e;
          } else if (G[c] == 256)
            c++;
          else
            break;
        let h = O == 1, f = (c < e ? G[c] : i) == 1, u = h == f ? h ? 1 : 2 : i;
        for (let d = c, p = r, Q = p ? t[p - 1].to : n; d > o; )
          d == Q && (d = t[--p].from, Q = p ? t[p - 1].to : n), G[--d] = u;
        o = c;
      } else
        O = l, o++;
    }
  }
}
function SO(n, e, t, i, r, O, s) {
  let a = i % 2 ? 2 : 1;
  if (i % 2 == r % 2)
    for (let o = e, l = 0; o < t; ) {
      let c = !0, h = !1;
      if (l == O.length || o < O[l].from) {
        let p = G[o];
        p != a && (c = !1, h = p == 16);
      }
      let f = !c && a == 1 ? [] : null, u = c ? i : i + 1, d = o;
      e: for (; ; )
        if (l < O.length && d == O[l].from) {
          if (h)
            break e;
          let p = O[l];
          if (!c)
            for (let Q = p.to, m = l + 1; ; ) {
              if (Q == t)
                break e;
              if (m < O.length && O[m].from == Q)
                Q = O[m++].to;
              else {
                if (G[Q] == a)
                  break e;
                break;
              }
            }
          if (l++, f)
            f.push(p);
          else {
            p.from > o && s.push(new nt(o, p.from, u));
            let Q = p.direction == Wt != !(u % 2);
            PO(n, Q ? i + 1 : i, r, p.inner, p.from, p.to, s), o = p.to;
          }
          d = p.to;
        } else {
          if (d == t || (c ? G[d] != a : G[d] == a))
            break;
          d++;
        }
      f ? SO(n, o, d, i + 1, r, f, s) : o < d && s.push(new nt(o, d, u)), o = d;
    }
  else
    for (let o = t, l = O.length; o > e; ) {
      let c = !0, h = !1;
      if (!l || o > O[l - 1].to) {
        let p = G[o - 1];
        p != a && (c = !1, h = p == 16);
      }
      let f = !c && a == 1 ? [] : null, u = c ? i : i + 1, d = o;
      e: for (; ; )
        if (l && d == O[l - 1].to) {
          if (h)
            break e;
          let p = O[--l];
          if (!c)
            for (let Q = p.from, m = l; ; ) {
              if (Q == e)
                break e;
              if (m && O[m - 1].to == Q)
                Q = O[--m].from;
              else {
                if (G[Q - 1] == a)
                  break e;
                break;
              }
            }
          if (f)
            f.push(p);
          else {
            p.to < o && s.push(new nt(p.to, o, u));
            let Q = p.direction == Wt != !(u % 2);
            PO(n, Q ? i + 1 : i, r, p.inner, p.from, p.to, s), o = p.from;
          }
          d = p.from;
        } else {
          if (d == e || (c ? G[d - 1] != a : G[d - 1] == a))
            break;
          d--;
        }
      f ? SO(n, d, o, i + 1, r, f, s) : d < o && s.push(new nt(d, o, u)), o = d;
    }
}
function PO(n, e, t, i, r, O, s) {
  let a = e % 2 ? 2 : 1;
  fu(n, r, O, i, a), uu(n, r, O, i, a), $u(r, O, i, a), SO(n, r, O, e, t, i, s);
}
function du(n, e, t) {
  if (!n)
    return [new nt(0, 0, e == rs ? 1 : 0)];
  if (e == Wt && !t.length && !hu.test(n))
    return Yl(n.length);
  if (t.length)
    for (; n.length > G.length; )
      G[G.length] = 256;
  let i = [], r = e == Wt ? 0 : 1;
  return PO(n, r, r, t, 0, n.length, i), i;
}
function Yl(n) {
  return [new nt(0, n, 0)];
}
let Vl = "";
function pu(n, e, t, i, r) {
  var O;
  let s = i.head - n.from, a = nt.find(e, s, (O = i.bidiLevel) !== null && O !== void 0 ? O : -1, i.assoc), o = e[a], l = o.side(r, t);
  if (s == l) {
    let f = a += r ? 1 : -1;
    if (f < 0 || f >= e.length)
      return null;
    o = e[a = f], s = o.side(!r, t), l = o.side(r, t);
  }
  let c = re(n.text, s, o.forward(r, t));
  (c < o.from || c > o.to) && (c = l), Vl = n.text.slice(Math.min(s, c), Math.max(s, c));
  let h = a == (r ? e.length - 1 : 0) ? null : e[a + (r ? 1 : -1)];
  return h && c == l && h.level + (r ? 0 : 1) < o.level ? S.cursor(h.side(!r, t) + n.from, h.forward(r, t) ? 1 : -1, h.level) : S.cursor(c + n.from, o.forward(r, t) ? -1 : 1, o.level);
}
function Qu(n, e, t) {
  for (let i = e; i < t; i++) {
    let r = zl(n.charCodeAt(i));
    if (r == 1)
      return Wt;
    if (r == 2 || r == 4)
      return rs;
  }
  return Wt;
}
const Wl = /* @__PURE__ */ w.define(), ql = /* @__PURE__ */ w.define(), Cl = /* @__PURE__ */ w.define(), Ul = /* @__PURE__ */ w.define(), TO = /* @__PURE__ */ w.define(), Al = /* @__PURE__ */ w.define(), Gl = /* @__PURE__ */ w.define(), Os = /* @__PURE__ */ w.define(), ss = /* @__PURE__ */ w.define(), jl = /* @__PURE__ */ w.define({
  combine: (n) => n.some((e) => e)
}), mu = /* @__PURE__ */ w.define({
  combine: (n) => n.some((e) => e)
}), Ml = /* @__PURE__ */ w.define();
class Ft {
  constructor(e, t = "nearest", i = "nearest", r = 5, O = 5, s = !1) {
    this.range = e, this.y = t, this.x = i, this.yMargin = r, this.xMargin = O, this.isSnapshot = s;
  }
  map(e) {
    return e.empty ? this : new Ft(this.range.map(e), this.y, this.x, this.yMargin, this.xMargin, this.isSnapshot);
  }
  clip(e) {
    return this.range.to <= e.doc.length ? this : new Ft(S.cursor(e.doc.length), this.y, this.x, this.yMargin, this.xMargin, this.isSnapshot);
  }
}
const sn = /* @__PURE__ */ U.define({ map: (n, e) => n.map(e) }), El = /* @__PURE__ */ U.define();
function Se(n, e, t) {
  let i = n.facet(Ul);
  i.length ? i[0](e) : window.onerror && window.onerror(String(e), t, void 0, void 0, e) || (t ? console.error(t + ":", e) : console.error(e));
}
const it = /* @__PURE__ */ w.define({ combine: (n) => n.length ? n[0] : !0 });
let gu = 0;
const Mt = /* @__PURE__ */ w.define({
  combine(n) {
    return n.filter((e, t) => {
      for (let i = 0; i < t; i++)
        if (n[i].plugin == e.plugin)
          return !1;
      return !0;
    });
  }
});
class Pe {
  constructor(e, t, i, r, O) {
    this.id = e, this.create = t, this.domEventHandlers = i, this.domEventObservers = r, this.baseExtensions = O(this), this.extension = this.baseExtensions.concat(Mt.of({ plugin: this, arg: void 0 }));
  }
  /**
  Create an extension for this plugin with the given argument.
  */
  of(e) {
    return this.baseExtensions.concat(Mt.of({ plugin: this, arg: e }));
  }
  /**
  Define a plugin from a constructor function that creates the
  plugin's value, given an editor view.
  */
  static define(e, t) {
    const { eventHandlers: i, eventObservers: r, provide: O, decorations: s } = t || {};
    return new Pe(gu++, e, i, r, (a) => {
      let o = [];
      return s && o.push(rr.of((l) => {
        let c = l.plugin(a);
        return c ? s(c) : Y.none;
      })), O && o.push(O(a)), o;
    });
  }
  /**
  Create a plugin for a class whose constructor takes a single
  editor view as argument.
  */
  static fromClass(e, t) {
    return Pe.define((i, r) => new e(i, r), t);
  }
}
class Sr {
  constructor(e) {
    this.spec = e, this.mustUpdate = null, this.value = null;
  }
  get plugin() {
    return this.spec && this.spec.plugin;
  }
  update(e) {
    if (this.value) {
      if (this.mustUpdate) {
        let t = this.mustUpdate;
        if (this.mustUpdate = null, this.value.update)
          try {
            this.value.update(t);
          } catch (i) {
            if (Se(t.state, i, "CodeMirror plugin crashed"), this.value.destroy)
              try {
                this.value.destroy();
              } catch {
              }
            this.deactivate();
          }
      }
    } else if (this.spec)
      try {
        this.value = this.spec.plugin.create(e, this.spec.arg);
      } catch (t) {
        Se(e.state, t, "CodeMirror plugin crashed"), this.deactivate();
      }
    return this;
  }
  destroy(e) {
    var t;
    if (!((t = this.value) === null || t === void 0) && t.destroy)
      try {
        this.value.destroy();
      } catch (i) {
        Se(e.state, i, "CodeMirror plugin crashed");
      }
  }
  deactivate() {
    this.spec = this.value = null;
  }
}
const Ll = /* @__PURE__ */ w.define(), as = /* @__PURE__ */ w.define(), rr = /* @__PURE__ */ w.define(), Dl = /* @__PURE__ */ w.define(), os = /* @__PURE__ */ w.define(), Fi = /* @__PURE__ */ w.define(), Bl = /* @__PURE__ */ w.define();
function na(n, e) {
  let t = n.state.facet(Bl);
  if (!t.length)
    return t;
  let i = t.map((O) => O instanceof Function ? O(n) : O), r = [];
  return _.spans(i, e.from, e.to, {
    point() {
    },
    span(O, s, a, o) {
      let l = O - e.from, c = s - e.from, h = r;
      for (let f = a.length - 1; f >= 0; f--, o--) {
        let u = a[f].spec.bidiIsolate, d;
        if (u == null && (u = Qu(e.text, l, c)), o > 0 && h.length && (d = h[h.length - 1]).to == l && d.direction == u)
          d.to = c, h = d.inner;
        else {
          let p = { from: l, to: c, direction: u, inner: [] };
          h.push(p), h = p.inner;
        }
      }
    }
  }), r;
}
const Il = /* @__PURE__ */ w.define();
function ls(n) {
  let e = 0, t = 0, i = 0, r = 0;
  for (let O of n.state.facet(Il)) {
    let s = O(n);
    s && (s.left != null && (e = Math.max(e, s.left)), s.right != null && (t = Math.max(t, s.right)), s.top != null && (i = Math.max(i, s.top)), s.bottom != null && (r = Math.max(r, s.bottom)));
  }
  return { left: e, right: t, top: i, bottom: r };
}
const Ti = /* @__PURE__ */ w.define();
class ke {
  constructor(e, t, i, r) {
    this.fromA = e, this.toA = t, this.fromB = i, this.toB = r;
  }
  join(e) {
    return new ke(Math.min(this.fromA, e.fromA), Math.max(this.toA, e.toA), Math.min(this.fromB, e.fromB), Math.max(this.toB, e.toB));
  }
  addToSet(e) {
    let t = e.length, i = this;
    for (; t > 0; t--) {
      let r = e[t - 1];
      if (!(r.fromA > i.toA)) {
        if (r.toA < i.fromA)
          break;
        i = i.join(r), e.splice(t - 1, 1);
      }
    }
    return e.splice(t, 0, i), e;
  }
  // Extend a set to cover all the content in `ranges`, which is a
  // flat array with each pair of numbers representing fromB/toB
  // positions. These pairs are generated in unchanged ranges, so the
  // offset between doc A and doc B is the same for their start and
  // end points.
  static extendWithRanges(e, t) {
    if (t.length == 0)
      return e;
    let i = [];
    for (let r = 0, O = 0, s = 0; ; ) {
      let a = r < e.length ? e[r].fromB : 1e9, o = O < t.length ? t[O] : 1e9, l = Math.min(a, o);
      if (l == 1e9)
        break;
      let c = l + s, h = l, f = c;
      for (; ; )
        if (O < t.length && t[O] <= h) {
          let u = t[O + 1];
          O += 2, h = Math.max(h, u);
          for (let d = r; d < e.length && e[d].fromB <= h; d++)
            s = e[d].toA - e[d].toB;
          f = Math.max(f, u + s);
        } else if (r < e.length && e[r].fromB <= h) {
          let u = e[r++];
          h = Math.max(h, u.toB), f = Math.max(f, u.toA), s = u.toA - u.toB;
        } else
          break;
      i.push(new ke(c, f, l, h));
    }
    return i;
  }
}
class Yn {
  constructor(e, t, i) {
    this.view = e, this.state = t, this.transactions = i, this.flags = 0, this.startState = e.state, this.changes = J.empty(this.startState.doc.length);
    for (let O of i)
      this.changes = this.changes.compose(O.changes);
    let r = [];
    this.changes.iterChangedRanges((O, s, a, o) => r.push(new ke(O, s, a, o))), this.changedRanges = r;
  }
  /**
  @internal
  */
  static create(e, t, i) {
    return new Yn(e, t, i);
  }
  /**
  Tells you whether the [viewport](https://codemirror.net/6/docs/ref/#view.EditorView.viewport) or
  [visible ranges](https://codemirror.net/6/docs/ref/#view.EditorView.visibleRanges) changed in this
  update.
  */
  get viewportChanged() {
    return (this.flags & 4) > 0;
  }
  /**
  Returns true when
  [`viewportChanged`](https://codemirror.net/6/docs/ref/#view.ViewUpdate.viewportChanged) is true
  and the viewport change is not just the result of mapping it in
  response to document changes.
  */
  get viewportMoved() {
    return (this.flags & 8) > 0;
  }
  /**
  Indicates whether the height of a block element in the editor
  changed in this update.
  */
  get heightChanged() {
    return (this.flags & 2) > 0;
  }
  /**
  Returns true when the document was modified or the size of the
  editor, or elements within the editor, changed.
  */
  get geometryChanged() {
    return this.docChanged || (this.flags & 18) > 0;
  }
  /**
  True when this update indicates a focus change.
  */
  get focusChanged() {
    return (this.flags & 1) > 0;
  }
  /**
  Whether the document changed in this update.
  */
  get docChanged() {
    return !this.changes.empty;
  }
  /**
  Whether the selection was explicitly set in this update.
  */
  get selectionSet() {
    return this.transactions.some((e) => e.selection);
  }
  /**
  @internal
  */
  get empty() {
    return this.flags == 0 && this.transactions.length == 0;
  }
}
const Su = [];
class K {
  constructor(e, t, i = 0) {
    this.dom = e, this.length = t, this.flags = i, this.parent = null, e.cmTile = this;
  }
  get breakAfter() {
    return this.flags & 1;
  }
  get children() {
    return Su;
  }
  isWidget() {
    return !1;
  }
  get isHidden() {
    return !1;
  }
  isComposite() {
    return !1;
  }
  isLine() {
    return !1;
  }
  isText() {
    return !1;
  }
  isBlock() {
    return !1;
  }
  get domAttrs() {
    return null;
  }
  sync(e) {
    if (this.flags |= 2, this.flags & 4) {
      this.flags &= -5;
      let t = this.domAttrs;
      t && eu(this.dom, t);
    }
  }
  toString() {
    return this.constructor.name + (this.children.length ? `(${this.children})` : "") + (this.breakAfter ? "#" : "");
  }
  destroy() {
    this.parent = null;
  }
  setDOM(e) {
    this.dom = e, e.cmTile = this;
  }
  get posAtStart() {
    return this.parent ? this.parent.posBefore(this) : 0;
  }
  get posAtEnd() {
    return this.posAtStart + this.length;
  }
  posBefore(e, t = this.posAtStart) {
    let i = t;
    for (let r of this.children) {
      if (r == e)
        return i;
      i += r.length + r.breakAfter;
    }
    throw new RangeError("Invalid child in posBefore");
  }
  posAfter(e) {
    return this.posBefore(e) + e.length;
  }
  covers(e) {
    return !0;
  }
  coordsIn(e, t) {
    return null;
  }
  domPosFor(e, t) {
    let i = mt(this.dom), r = this.length ? e > 0 : t > 0;
    return new Ye(this.parent.dom, i + (r ? 1 : 0), e == 0 || e == this.length);
  }
  markDirty(e) {
    this.flags &= -3, e && (this.flags |= 4), this.parent && this.parent.flags & 2 && this.parent.markDirty(!1);
  }
  get overrideDOMText() {
    return null;
  }
  get root() {
    for (let e = this; e; e = e.parent)
      if (e instanceof sr)
        return e;
    return null;
  }
  static get(e) {
    return e.cmTile;
  }
}
class Or extends K {
  constructor(e) {
    super(e, 0), this._children = [];
  }
  isComposite() {
    return !0;
  }
  get children() {
    return this._children;
  }
  get lastChild() {
    return this.children.length ? this.children[this.children.length - 1] : null;
  }
  append(e) {
    this.children.push(e), e.parent = this;
  }
  sync(e) {
    if (this.flags & 2)
      return;
    super.sync(e);
    let t = this.dom, i = null, r, O = (e == null ? void 0 : e.node) == t ? e : null, s = 0;
    for (let a of this.children) {
      if (a.sync(e), s += a.length + a.breakAfter, r = i ? i.nextSibling : t.firstChild, O && r != a.dom && (O.written = !0), a.dom.parentNode == t)
        for (; r && r != a.dom; )
          r = ra(r);
      else
        t.insertBefore(a.dom, r);
      i = a.dom;
    }
    for (r = i ? i.nextSibling : t.firstChild, O && r && (O.written = !0); r; )
      r = ra(r);
    this.length = s;
  }
}
function ra(n) {
  let e = n.nextSibling;
  return n.parentNode.removeChild(n), e;
}
class sr extends Or {
  constructor(e, t) {
    super(t), this.view = e;
  }
  owns(e) {
    for (; e; e = e.parent)
      if (e == this)
        return !0;
    return !1;
  }
  isBlock() {
    return !0;
  }
  nearest(e) {
    for (; ; ) {
      if (!e)
        return null;
      let t = K.get(e);
      if (t && this.owns(t))
        return t;
      e = e.parentNode;
    }
  }
  blockTiles(e) {
    for (let t = [], i = this, r = 0, O = 0; ; )
      if (r == i.children.length) {
        if (!t.length)
          return;
        i = i.parent, i.breakAfter && O++, r = t.pop();
      } else {
        let s = i.children[r++];
        if (s instanceof dt)
          t.push(r), i = s, r = 0;
        else {
          let a = O + s.length, o = e(s, O);
          if (o !== void 0)
            return o;
          O = a + s.breakAfter;
        }
      }
  }
  // Find the block at the given position. If side < -1, make sure to
  // stay before block widgets at that position, if side > 1, after
  // such widgets (used for selection drawing, which needs to be able
  // to get coordinates for positions that aren't valid cursor positions).
  resolveBlock(e, t) {
    let i, r = -1, O, s = -1;
    if (this.blockTiles((a, o) => {
      let l = o + a.length;
      if (e >= o && e <= l) {
        if (a.isWidget() && t >= -1 && t <= 1) {
          if (a.flags & 32)
            return !0;
          a.flags & 16 && (i = void 0);
        }
        (o < e || e == l && (t < -1 ? a.length : a.covers(1))) && (!i || !a.isWidget() && i.isWidget()) && (i = a, r = e - o), (l > e || e == o && (t > 1 ? a.length : a.covers(-1))) && (!O || !a.isWidget() && O.isWidget()) && (O = a, s = e - o);
      }
    }), !i && !O)
      throw new Error("No tile at position " + e);
    return i && t < 0 || !O ? { tile: i, offset: r } : { tile: O, offset: s };
  }
}
class dt extends Or {
  constructor(e, t) {
    super(e), this.wrapper = t;
  }
  isBlock() {
    return !0;
  }
  covers(e) {
    return this.children.length ? e < 0 ? this.children[0].covers(-1) : this.lastChild.covers(1) : !1;
  }
  get domAttrs() {
    return this.wrapper.attributes;
  }
  static of(e, t) {
    let i = new dt(t || document.createElement(e.tagName), e);
    return t || (i.flags |= 4), i;
  }
}
class ni extends Or {
  constructor(e, t) {
    super(e), this.attrs = t;
  }
  isLine() {
    return !0;
  }
  static start(e, t, i) {
    let r = new ni(t || document.createElement("div"), e);
    return (!t || !i) && (r.flags |= 4), r;
  }
  get domAttrs() {
    return this.attrs;
  }
  // Find the tile associated with a given position in this line.
  resolveInline(e, t, i) {
    let r = null, O = -1, s = null, a = -1;
    function o(c, h) {
      for (let f = 0, u = 0; f < c.children.length && u <= h; f++) {
        let d = c.children[f], p = u + d.length;
        p >= h && (d.isComposite() ? o(d, h - u) : (!s || s.isHidden && (t > 0 || i && Tu(s, d))) && (p > h || d.flags & 32) ? (s = d, a = h - u) : (u < h || d.flags & 16 && !d.isHidden) && (r = d, O = h - u)), u = p;
      }
    }
    o(this, e);
    let l = (t < 0 ? r : s) || r || s;
    return l ? { tile: l, offset: l == r ? O : a } : null;
  }
  coordsIn(e, t) {
    let i = this.resolveInline(e, t, !0);
    return i ? i.tile.coordsIn(Math.max(0, i.offset), t) : Pu(this);
  }
  domIn(e, t) {
    let i = this.resolveInline(e, t);
    if (i) {
      let { tile: r, offset: O } = i;
      if (this.dom.contains(r.dom))
        return r.isText() ? new Ye(r.dom, Math.min(r.dom.nodeValue.length, O)) : r.domPosFor(O, r.flags & 16 ? 1 : r.flags & 32 ? -1 : t);
      let s = i.tile.parent, a = !1;
      for (let o of s.children) {
        if (a)
          return new Ye(o.dom, 0);
        o == i.tile && (a = !0);
      }
    }
    return new Ye(this.dom, 0);
  }
}
function Pu(n) {
  let e = n.dom.lastChild;
  if (!e)
    return n.dom.getBoundingClientRect();
  let t = vi(e);
  return t[t.length - 1] || null;
}
function Tu(n, e) {
  let t = n.coordsIn(0, 1), i = e.coordsIn(0, 1);
  return t && i && i.top < t.bottom;
}
class $e extends Or {
  constructor(e, t) {
    super(e), this.mark = t;
  }
  get domAttrs() {
    return this.mark.attrs;
  }
  static of(e, t) {
    let i = new $e(t || document.createElement(e.tagName), e);
    return t || (i.flags |= 4), i;
  }
}
class zt extends K {
  constructor(e, t) {
    super(e, t.length), this.text = t;
  }
  sync(e) {
    this.flags & 2 || (super.sync(e), this.dom.nodeValue != this.text && (e && e.node == this.dom && (e.written = !0), this.dom.nodeValue = this.text));
  }
  isText() {
    return !0;
  }
  toString() {
    return JSON.stringify(this.text);
  }
  coordsIn(e, t) {
    let i = this.dom.nodeValue.length;
    e > i && (e = i);
    let r = e, O = e, s = 0;
    e == 0 && t < 0 || e == i && t >= 0 ? b.chrome || b.gecko || (e ? (r--, s = 1) : O < i && (O++, s = -1)) : t < 0 ? r-- : O < i && O++;
    let a = Ci(this.dom, r, O).getClientRects();
    if (!a.length)
      return null;
    let o = a[(s ? s < 0 : t >= 0) ? 0 : a.length - 1];
    return b.safari && !s && o.width == 0 && (o = Array.prototype.find.call(a, (l) => l.width) || o), s ? qi(o, s < 0) : o || null;
  }
  static of(e, t) {
    let i = new zt(t || document.createTextNode(e), e);
    return t || (i.flags |= 2), i;
  }
}
class qt extends K {
  constructor(e, t, i, r) {
    super(e, t, r), this.widget = i;
  }
  isWidget() {
    return !0;
  }
  get isHidden() {
    return this.widget.isHidden;
  }
  covers(e) {
    return this.flags & 48 ? !1 : (this.flags & (e < 0 ? 64 : 128)) > 0;
  }
  coordsIn(e, t) {
    return this.coordsInWidget(e, t, !1);
  }
  coordsInWidget(e, t, i) {
    let r = this.widget.coordsAt(this.dom, e, t);
    if (r)
      return r;
    if (i)
      return qi(this.dom.getBoundingClientRect(), this.length ? e == 0 : t <= 0);
    {
      let O = this.dom.getClientRects(), s = null;
      if (!O.length)
        return null;
      let a = this.flags & 16 ? !0 : this.flags & 32 ? !1 : e > 0;
      for (let o = a ? O.length - 1 : 0; s = O[o], !(e > 0 ? o == 0 : o == O.length - 1 || s.top < s.bottom); o += a ? -1 : 1)
        ;
      return qi(s, !a);
    }
  }
  get overrideDOMText() {
    if (!this.length)
      return W.empty;
    let { root: e } = this;
    if (!e)
      return W.empty;
    let t = this.posAtStart;
    return e.view.state.doc.slice(t, t + this.length);
  }
  destroy() {
    super.destroy(), this.widget.destroy(this.dom);
  }
  static of(e, t, i, r, O) {
    return O || (O = e.toDOM(t), e.editable || (O.contentEditable = "false")), new qt(O, i, e, r);
  }
}
class Vn extends K {
  constructor(e) {
    let t = document.createElement("img");
    t.className = "cm-widgetBuffer", t.setAttribute("aria-hidden", "true"), super(t, 0, e);
  }
  get isHidden() {
    return !0;
  }
  get overrideDOMText() {
    return W.empty;
  }
  coordsIn(e) {
    return this.dom.getBoundingClientRect();
  }
}
class yu {
  constructor(e) {
    this.index = 0, this.beforeBreak = !1, this.parents = [], this.tile = e;
  }
  // Advance by the given distance. If side is -1, stop leaving or
  // entering tiles, or skipping zero-length tiles, once the distance
  // has been traversed. When side is 1, leave, enter, or skip
  // everything at the end position.
  advance(e, t, i) {
    let { tile: r, index: O, beforeBreak: s, parents: a } = this;
    for (; e || t > 0; )
      if (r.isComposite())
        if (s) {
          if (!e)
            break;
          i && i.break(), e--, s = !1;
        } else if (O == r.children.length) {
          if (!e && !a.length)
            break;
          i && i.leave(r), s = !!r.breakAfter, { tile: r, index: O } = a.pop(), O++;
        } else {
          let o = r.children[O], l = o.breakAfter;
          (t > 0 ? o.length <= e : o.length < e) && (!i || i.skip(o, 0, o.length) !== !1 || !o.isComposite) ? (s = !!l, O++, e -= o.length) : (a.push({ tile: r, index: O }), r = o, O = 0, i && o.isComposite() && i.enter(o));
        }
      else if (O == r.length)
        s = !!r.breakAfter, { tile: r, index: O } = a.pop(), O++;
      else if (e) {
        let o = Math.min(e, r.length - O);
        i && i.skip(r, O, O + o), e -= o, O += o;
      } else
        break;
    return this.tile = r, this.index = O, this.beforeBreak = s, this;
  }
  get root() {
    return this.parents.length ? this.parents[0].tile : this.tile;
  }
}
class bu {
  constructor(e, t, i, r) {
    this.from = e, this.to = t, this.wrapper = i, this.rank = r;
  }
}
class wu {
  constructor(e, t, i) {
    this.cache = e, this.root = t, this.blockWrappers = i, this.curLine = null, this.lastBlock = null, this.afterWidget = null, this.pos = 0, this.wrappers = [], this.wrapperPos = 0;
  }
  addText(e, t, i, r) {
    var O;
    this.flushBuffer();
    let s = this.ensureMarks(t, i), a = s.lastChild;
    if (a && a.isText() && !(a.flags & 8)) {
      this.cache.reused.set(
        a,
        2
        /* Reused.DOM */
      );
      let o = s.children[s.children.length - 1] = new zt(a.dom, a.text + e);
      o.parent = s;
    } else
      s.append(r || zt.of(e, (O = this.cache.find(zt)) === null || O === void 0 ? void 0 : O.dom));
    this.pos += e.length, this.afterWidget = null;
  }
  addComposition(e, t) {
    let i = this.curLine;
    i.dom != t.line.dom && (i.setDOM(this.cache.reused.has(t.line) ? Pr(t.line.dom) : t.line.dom), this.cache.reused.set(
      t.line,
      2
      /* Reused.DOM */
    ));
    let r = i;
    for (let a = t.marks.length - 1; a >= 0; a--) {
      let o = t.marks[a], l = r.lastChild;
      if (l instanceof $e && l.mark.eq(o.mark))
        l.dom != o.dom && l.setDOM(Pr(o.dom)), r = l;
      else {
        if (this.cache.reused.get(o)) {
          let h = K.get(o.dom);
          h && h.setDOM(Pr(o.dom));
        }
        let c = $e.of(o.mark, o.dom);
        r.append(c), r = c;
      }
      this.cache.reused.set(
        o,
        2
        /* Reused.DOM */
      );
    }
    let O = K.get(e.text);
    O && this.cache.reused.set(
      O,
      2
      /* Reused.DOM */
    );
    let s = new zt(e.text, e.text.nodeValue);
    s.flags |= 8, r.append(s);
  }
  addInlineWidget(e, t, i) {
    let r = this.afterWidget && e.flags & 48 && (this.afterWidget.flags & 48) == (e.flags & 48);
    r || this.flushBuffer();
    let O = this.ensureMarks(t, i);
    !r && !(e.flags & 16) && O.append(this.getBuffer(1)), O.append(e), this.pos += e.length, this.afterWidget = e;
  }
  addMark(e, t, i) {
    this.flushBuffer(), this.ensureMarks(t, i).append(e), this.pos += e.length, this.afterWidget = null;
  }
  addBlockWidget(e) {
    this.getBlockPos().append(e), this.pos += e.length, this.lastBlock = e, this.endLine();
  }
  continueWidget(e) {
    let t = this.afterWidget || this.lastBlock;
    t.length += e, this.pos += e;
  }
  addLineStart(e, t) {
    var i;
    e || (e = Nl);
    let r = ni.start(e, t || ((i = this.cache.find(ni)) === null || i === void 0 ? void 0 : i.dom), !!t);
    this.getBlockPos().append(this.lastBlock = this.curLine = r);
  }
  addLine(e) {
    this.getBlockPos().append(e), this.pos += e.length, this.lastBlock = e, this.endLine();
  }
  addBreak() {
    this.lastBlock.flags |= 1, this.endLine(), this.pos++;
  }
  addLineStartIfNotCovered(e) {
    this.blockPosCovered() || this.addLineStart(e);
  }
  ensureLine(e) {
    this.curLine || this.addLineStart(e);
  }
  ensureMarks(e, t) {
    var i;
    let r = this.curLine;
    for (let O = e.length - 1; O >= 0; O--) {
      let s = e[O], a;
      if (t > 0 && (a = r.lastChild) && a instanceof $e && a.mark.eq(s))
        r = a, t--;
      else {
        let o = $e.of(s, (i = this.cache.find($e, (l) => l.mark.eq(s))) === null || i === void 0 ? void 0 : i.dom);
        r.append(o), r = o, t = 0;
      }
    }
    return r;
  }
  endLine() {
    if (this.curLine) {
      this.flushBuffer();
      let e = this.curLine.lastChild;
      (!e || !Oa(this.curLine, !1) || e.dom.nodeName != "BR" && e.isWidget() && !(b.ios && Oa(this.curLine, !0))) && this.curLine.append(this.cache.findWidget(
        Tr,
        0,
        32
        /* TileFlag.After */
      ) || new qt(
        Tr.toDOM(),
        0,
        Tr,
        32
        /* TileFlag.After */
      )), this.curLine = this.afterWidget = null;
    }
  }
  updateBlockWrappers() {
    this.wrapperPos > this.pos + 1e4 && (this.blockWrappers.goto(this.pos), this.wrappers.length = 0);
    for (let e = this.wrappers.length - 1; e >= 0; e--)
      this.wrappers[e].to < this.pos && this.wrappers.splice(e, 1);
    for (let e = this.blockWrappers; e.value && e.from <= this.pos; e.next())
      if (e.to >= this.pos) {
        let t = new bu(e.from, e.to, e.value, e.rank), i = this.wrappers.length;
        for (; i > 0 && (this.wrappers[i - 1].rank - t.rank || this.wrappers[i - 1].to - t.to) < 0; )
          i--;
        this.wrappers.splice(i, 0, t);
      }
    this.wrapperPos = this.pos;
  }
  getBlockPos() {
    var e;
    this.updateBlockWrappers();
    let t = this.root;
    for (let i of this.wrappers) {
      let r = t.lastChild;
      if (i.from < this.pos && r instanceof dt && r.wrapper.eq(i.wrapper))
        t = r;
      else {
        let O = dt.of(i.wrapper, (e = this.cache.find(dt, (s) => s.wrapper.eq(i.wrapper))) === null || e === void 0 ? void 0 : e.dom);
        t.append(O), t = O;
      }
    }
    return t;
  }
  blockPosCovered() {
    let e = this.lastBlock;
    return e != null && !e.breakAfter && (!e.isWidget() || (e.flags & 160) > 0);
  }
  getBuffer(e) {
    let t = 2 | (e < 0 ? 16 : 32), i = this.cache.find(
      Vn,
      void 0,
      1
      /* Reused.Full */
    );
    return i && (i.flags = t), i || new Vn(t);
  }
  flushBuffer() {
    this.afterWidget && !(this.afterWidget.flags & 32) && (this.afterWidget.parent.append(this.getBuffer(-1)), this.afterWidget = null);
  }
}
class xu {
  constructor(e) {
    this.skipCount = 0, this.text = "", this.textOff = 0, this.cursor = e.iter();
  }
  skip(e) {
    this.textOff + e <= this.text.length ? this.textOff += e : (this.skipCount += e - (this.text.length - this.textOff), this.text = "", this.textOff = 0);
  }
  next(e) {
    if (this.textOff == this.text.length) {
      let { value: r, lineBreak: O, done: s } = this.cursor.next(this.skipCount);
      if (this.skipCount = 0, s)
        throw new Error("Ran out of text content when drawing inline views");
      this.text = r;
      let a = this.textOff = Math.min(e, r.length);
      return O ? null : r.slice(0, a);
    }
    let t = Math.min(this.text.length, this.textOff + e), i = this.text.slice(this.textOff, t);
    return this.textOff = t, i;
  }
}
const Wn = [qt, ni, zt, $e, Vn, dt, sr];
for (let n = 0; n < Wn.length; n++)
  Wn[n].bucket = n;
class ku {
  constructor(e) {
    this.view = e, this.buckets = Wn.map(() => []), this.index = Wn.map(() => 0), this.reused = /* @__PURE__ */ new Map();
  }
  // Put a tile in the cache.
  add(e) {
    let t = e.constructor.bucket, i = this.buckets[t];
    i.length < 6 ? i.push(e) : i[
      this.index[t] = (this.index[t] + 1) % 6
      /* C.Bucket */
    ] = e;
  }
  find(e, t, i = 2) {
    let r = e.bucket, O = this.buckets[r], s = this.index[r];
    for (let a = O.length - 1; a >= 0; a--) {
      let o = (a + s) % O.length, l = O[o];
      if ((!t || t(l)) && !this.reused.has(l))
        return O.splice(o, 1), o < s && this.index[r]--, this.reused.set(l, i), l;
    }
    return null;
  }
  findWidget(e, t, i) {
    let r = this.buckets[0];
    if (r.length)
      for (let O = 0, s = 0; ; O++) {
        if (O == r.length) {
          if (s)
            return null;
          s = 1, O = 0;
        }
        let a = r[O];
        if (!this.reused.has(a) && (s == 0 ? a.widget.compare(e) : a.widget.constructor == e.constructor && e.updateDOM(a.dom, this.view)))
          return r.splice(O, 1), O < this.index[0] && this.index[0]--, a.widget == e && a.length == t && (a.flags & 497) == i ? (this.reused.set(
            a,
            1
            /* Reused.Full */
          ), a) : (this.reused.set(
            a,
            2
            /* Reused.DOM */
          ), new qt(a.dom, t, e, a.flags & -498 | i));
      }
  }
  reuse(e) {
    return this.reused.set(
      e,
      1
      /* Reused.Full */
    ), e;
  }
  maybeReuse(e, t = 2) {
    if (!this.reused.has(e))
      return this.reused.set(e, t), e.dom;
  }
  clear() {
    for (let e = 0; e < this.buckets.length; e++)
      this.buckets[e].length = this.index[e] = 0;
  }
}
class Xu {
  constructor(e, t, i, r, O) {
    this.view = e, this.decorations = r, this.disallowBlockEffectsFor = O, this.openWidget = !1, this.openMarks = 0, this.cache = new ku(e), this.text = new xu(e.state.doc), this.builder = new wu(this.cache, new sr(e, e.contentDOM), _.iter(i)), this.cache.reused.set(
      t,
      2
      /* Reused.DOM */
    ), this.old = new yu(t), this.reuseWalker = {
      skip: (s, a, o) => {
        if (this.cache.add(s), s.isComposite())
          return !1;
      },
      enter: (s) => this.cache.add(s),
      leave: () => {
      },
      break: () => {
      }
    };
  }
  run(e, t) {
    let i = t && this.getCompositionContext(t.text);
    for (let r = 0, O = 0, s = 0; ; ) {
      let a = s < e.length ? e[s++] : null, o = a ? a.fromA : this.old.root.length;
      if (o > r) {
        let l = o - r;
        this.preserve(l, !s, !a), r = o, O += l;
      }
      if (!a)
        break;
      t && a.fromA <= t.range.fromA && a.toA >= t.range.toA ? (this.forward(a.fromA, t.range.fromA, t.range.fromA < t.range.toA ? 1 : -1), this.emit(O, t.range.fromB), this.cache.clear(), this.builder.addComposition(t, i), this.text.skip(t.range.toB - t.range.fromB), this.forward(t.range.fromA, a.toA), this.emit(t.range.toB, a.toB)) : (this.forward(a.fromA, a.toA), this.emit(O, a.toB)), O = a.toB, r = a.toA;
    }
    return this.builder.curLine && this.builder.endLine(), this.builder.root;
  }
  preserve(e, t, i) {
    let r = Ru(this.old), O = this.openMarks;
    this.old.advance(e, i ? 1 : -1, {
      skip: (s, a, o) => {
        if (s.isWidget())
          if (this.openWidget)
            this.builder.continueWidget(o - a);
          else {
            let l = o > 0 || a < s.length ? qt.of(s.widget, this.view, o - a, s.flags & 496, this.cache.maybeReuse(s)) : this.cache.reuse(s);
            l.flags & 256 ? (l.flags &= -2, this.builder.addBlockWidget(l)) : (this.builder.ensureLine(null), this.builder.addInlineWidget(l, r, O), O = r.length);
          }
        else if (s.isText())
          this.builder.ensureLine(null), !a && o == s.length ? this.builder.addText(s.text, r, O, this.cache.reuse(s)) : (this.cache.add(s), this.builder.addText(s.text.slice(a, o), r, O)), O = r.length;
        else if (s.isLine())
          s.flags &= -2, this.cache.reused.set(
            s,
            1
            /* Reused.Full */
          ), this.builder.addLine(s);
        else if (s instanceof Vn)
          this.cache.add(s);
        else if (s instanceof $e)
          this.builder.ensureLine(null), this.builder.addMark(s, r, O), this.cache.reused.set(
            s,
            1
            /* Reused.Full */
          ), O = r.length;
        else
          return !1;
        this.openWidget = !1;
      },
      enter: (s) => {
        s.isLine() ? this.builder.addLineStart(s.attrs, this.cache.maybeReuse(s)) : (this.cache.add(s), s instanceof $e && r.unshift(s.mark)), this.openWidget = !1;
      },
      leave: (s) => {
        s.isLine() ? r.length && (r.length = O = 0) : s instanceof $e && (r.shift(), O = Math.min(O, r.length));
      },
      break: () => {
        this.builder.addBreak(), this.openWidget = !1;
      }
    }), this.text.skip(e);
  }
  emit(e, t) {
    let i = null, r = this.builder, O = 0, s = _.spans(this.decorations, e, t, {
      point: (a, o, l, c, h, f) => {
        if (l instanceof Vt) {
          if (this.disallowBlockEffectsFor[f]) {
            if (l.block)
              throw new RangeError("Block decorations may not be specified via plugins");
            if (o > this.view.state.doc.lineAt(a).to)
              throw new RangeError("Decorations that replace line breaks may not be specified via plugins");
          }
          if (O = c.length, h > c.length)
            r.continueWidget(o - a);
          else {
            let u = l.widget || (l.block ? ri.block : ri.inline), d = vu(l), p = this.cache.findWidget(u, o - a, d) || qt.of(u, this.view, o - a, d);
            l.block ? (l.startSide > 0 && r.addLineStartIfNotCovered(i), r.addBlockWidget(p)) : (r.ensureLine(i), r.addInlineWidget(p, c, h));
          }
          i = null;
        } else
          i = Zu(i, l);
        o > a && this.text.skip(o - a);
      },
      span: (a, o, l, c) => {
        for (let h = a; h < o; ) {
          let f = this.text.next(Math.min(512, o - h));
          f == null ? (r.addLineStartIfNotCovered(i), r.addBreak(), h++) : (r.ensureLine(i), r.addText(f, l, c), h += f.length), i = null;
        }
      }
    });
    r.addLineStartIfNotCovered(i), this.openWidget = s > O, this.openMarks = s;
  }
  forward(e, t, i = 1) {
    t - e <= 10 ? this.old.advance(t - e, i, this.reuseWalker) : (this.old.advance(5, -1, this.reuseWalker), this.old.advance(t - e - 10, -1), this.old.advance(5, i, this.reuseWalker));
  }
  getCompositionContext(e) {
    let t = [], i = null;
    for (let r = e.parentNode; ; r = r.parentNode) {
      let O = K.get(r);
      if (r == this.view.contentDOM)
        break;
      O instanceof $e ? t.push(O) : O != null && O.isLine() ? i = O : r.nodeName == "DIV" && !i && r != this.view.contentDOM ? i = new ni(r, Nl) : t.push($e.of(new Ii({ tagName: r.nodeName.toLowerCase(), attributes: tu(r) }), r));
    }
    return { line: i, marks: t };
  }
}
function Oa(n, e) {
  let t = (i) => {
    for (let r of i.children)
      if ((e ? r.isText() : r.length) || t(r))
        return !0;
    return !1;
  };
  return t(n);
}
function vu(n) {
  let e = n.isReplace ? (n.startSide < 0 ? 64 : 0) | (n.endSide > 0 ? 128 : 0) : n.startSide > 0 ? 32 : 16;
  return n.block && (e |= 256), e;
}
const Nl = { class: "cm-line" };
function Zu(n, e) {
  let t = e.spec.attributes, i = e.spec.class;
  return !t && !i || (n || (n = { class: "cm-line" }), t && is(t, n), i && (n.class += " " + i)), n;
}
function Ru(n) {
  let e = [];
  for (let t = n.parents.length; t > 1; t--) {
    let i = t == n.parents.length ? n.tile : n.parents[t].tile;
    i instanceof $e && e.push(i.mark);
  }
  return e;
}
function Pr(n) {
  let e = K.get(n);
  return e && e.setDOM(n.cloneNode()), n;
}
class ri extends Pt {
  constructor(e) {
    super(), this.tag = e;
  }
  eq(e) {
    return e.tag == this.tag;
  }
  toDOM() {
    return document.createElement(this.tag);
  }
  updateDOM(e) {
    return e.nodeName.toLowerCase() == this.tag;
  }
  get isHidden() {
    return !0;
  }
}
ri.inline = /* @__PURE__ */ new ri("span");
ri.block = /* @__PURE__ */ new ri("div");
const Tr = /* @__PURE__ */ new class extends Pt {
  toDOM() {
    return document.createElement("br");
  }
  get isHidden() {
    return !0;
  }
  get editable() {
    return !0;
  }
}();
class sa {
  constructor(e) {
    this.view = e, this.decorations = [], this.blockWrappers = [], this.dynamicDecorationMap = [!1], this.domChanged = null, this.hasComposition = null, this.editContextFormatting = Y.none, this.lastCompositionAfterCursor = !1, this.minWidth = 0, this.minWidthFrom = 0, this.minWidthTo = 0, this.impreciseAnchor = null, this.impreciseHead = null, this.forceSelection = !1, this.lastUpdate = Date.now(), this.updateDeco(), this.tile = new sr(e, e.contentDOM), this.updateInner([new ke(0, 0, 0, e.state.doc.length)], null);
  }
  // Update the document view to a given state.
  update(e) {
    var t;
    let i = e.changedRanges;
    this.minWidth > 0 && i.length && (i.every(({ fromA: c, toA: h }) => h < this.minWidthFrom || c > this.minWidthTo) ? (this.minWidthFrom = e.changes.mapPos(this.minWidthFrom, 1), this.minWidthTo = e.changes.mapPos(this.minWidthTo, 1)) : this.minWidth = this.minWidthFrom = this.minWidthTo = 0), this.updateEditContextFormatting(e);
    let r = -1;
    this.view.inputState.composing >= 0 && !this.view.observer.editContext && (!((t = this.domChanged) === null || t === void 0) && t.newSel ? r = this.domChanged.newSel.head : !Au(e.changes, this.hasComposition) && !e.selectionSet && (r = e.state.selection.main.head));
    let O = r > -1 ? _u(this.view, e.changes, r) : null;
    if (this.domChanged = null, this.hasComposition) {
      let { from: c, to: h } = this.hasComposition;
      i = new ke(c, h, e.changes.mapPos(c, -1), e.changes.mapPos(h, 1)).addToSet(i.slice());
    }
    this.hasComposition = O ? { from: O.range.fromB, to: O.range.toB } : null, (b.ie || b.chrome) && !O && e && e.state.doc.lines != e.startState.doc.lines && (this.forceSelection = !0);
    let s = this.decorations, a = this.blockWrappers;
    this.updateDeco();
    let o = Wu(s, this.decorations, e.changes);
    o.length && (i = ke.extendWithRanges(i, o));
    let l = Cu(a, this.blockWrappers, e.changes);
    return l.length && (i = ke.extendWithRanges(i, l)), O && !i.some((c) => c.fromA <= O.range.fromA && c.toA >= O.range.toA) && (i = O.range.addToSet(i.slice())), this.tile.flags & 2 && i.length == 0 ? !1 : (this.updateInner(i, O), e.transactions.length && (this.lastUpdate = Date.now()), !0);
  }
  // Used by update and the constructor do perform the actual DOM
  // update
  updateInner(e, t) {
    this.view.viewState.mustMeasureContent = !0;
    let { observer: i } = this.view;
    i.ignore(() => {
      if (t || e.length) {
        let s = this.tile, a = new Xu(this.view, s, this.blockWrappers, this.decorations, this.dynamicDecorationMap);
        this.tile = a.run(e, t), yO(s, a.cache.reused);
      }
      this.tile.dom.style.height = this.view.viewState.contentHeight / this.view.scaleY + "px", this.tile.dom.style.flexBasis = this.minWidth ? this.minWidth + "px" : "";
      let O = b.chrome || b.ios ? { node: i.selectionRange.focusNode, written: !1 } : void 0;
      this.tile.sync(O), O && (O.written || i.selectionRange.focusNode != O.node || !this.tile.dom.contains(O.node)) && (this.forceSelection = !0), this.tile.dom.style.height = "";
    });
    let r = [];
    if (this.view.viewport.from || this.view.viewport.to < this.view.state.doc.length)
      for (let O of this.tile.children)
        O.isWidget() && O.widget instanceof yr && r.push(O.dom);
    i.updateGaps(r);
  }
  updateEditContextFormatting(e) {
    this.editContextFormatting = this.editContextFormatting.map(e.changes);
    for (let t of e.transactions)
      for (let i of t.effects)
        i.is(El) && (this.editContextFormatting = i.value);
  }
  // Sync the DOM selection to this.state.selection
  updateSelection(e = !1, t = !1) {
    (e || !this.view.observer.selectionRange.focusNode) && this.view.observer.readSelectionRange();
    let { dom: i } = this.tile, r = this.view.root.activeElement, O = r == i, s = !O && !(this.view.state.facet(it) || i.tabIndex > -1) && Xi(i, this.view.observer.selectionRange) && !(r && i.contains(r));
    if (!(O || t || s))
      return;
    let a = this.forceSelection;
    this.forceSelection = !1;
    let o = this.view.state.selection.main, l, c;
    if (o.empty ? c = l = this.inlineDOMNearPos(o.anchor, o.assoc || 1) : (c = this.inlineDOMNearPos(o.head, o.head == o.from ? 1 : -1), l = this.inlineDOMNearPos(o.anchor, o.anchor == o.from ? 1 : -1)), b.gecko && o.empty && !this.hasComposition && zu(l)) {
      let f = document.createTextNode("");
      this.view.observer.ignore(() => l.node.insertBefore(f, l.node.childNodes[l.offset] || null)), l = c = new Ye(f, 0), a = !0;
    }
    let h = this.view.observer.selectionRange;
    (a || !h.focusNode || (!Zi(l.node, l.offset, h.anchorNode, h.anchorOffset) || !Zi(c.node, c.offset, h.focusNode, h.focusOffset)) && !this.suppressWidgetCursorChange(h, o)) && (this.view.observer.ignore(() => {
      b.android && b.chrome && i.contains(h.focusNode) && Uu(h.focusNode, i) && (i.blur(), i.focus({ preventScroll: !0 }));
      let f = ii(this.view.root);
      if (f) if (o.empty) {
        if (b.gecko) {
          let u = Yu(l.node, l.offset);
          if (u && u != 3) {
            let d = (u == 1 ? vl : Zl)(l.node, l.offset);
            d && (l = new Ye(d.node, d.offset));
          }
        }
        f.collapse(l.node, l.offset), o.bidiLevel != null && f.caretBidiLevel !== void 0 && (f.caretBidiLevel = o.bidiLevel);
      } else if (f.extend) {
        f.collapse(l.node, l.offset);
        try {
          f.extend(c.node, c.offset);
        } catch {
        }
      } else {
        let u = document.createRange();
        o.anchor > o.head && ([l, c] = [c, l]), u.setEnd(c.node, c.offset), u.setStart(l.node, l.offset), f.removeAllRanges(), f.addRange(u);
      }
      s && this.view.root.activeElement == i && (i.blur(), r && r.focus());
    }), this.view.observer.setSelectionRange(l, c)), this.impreciseAnchor = l.precise ? null : new Ye(h.anchorNode, h.anchorOffset), this.impreciseHead = c.precise ? null : new Ye(h.focusNode, h.focusOffset);
  }
  // If a zero-length widget is inserted next to the cursor during
  // composition, avoid moving it across it and disrupting the
  // composition.
  suppressWidgetCursorChange(e, t) {
    return this.hasComposition && t.empty && Zi(e.focusNode, e.focusOffset, e.anchorNode, e.anchorOffset) && this.posFromDOM(e.focusNode, e.focusOffset) == t.head;
  }
  enforceCursorAssoc() {
    if (this.hasComposition)
      return;
    let { view: e } = this, t = e.state.selection.main, i = ii(e.root), { anchorNode: r, anchorOffset: O } = e.observer.selectionRange;
    if (!i || !t.empty || !t.assoc || !i.modify)
      return;
    let s = this.lineAt(t.head, t.assoc);
    if (!s)
      return;
    let a = s.posAtStart;
    if (t.head == a || t.head == a + s.length)
      return;
    let o = this.coordsAt(t.head, -1), l = this.coordsAt(t.head, 1);
    if (!o || !l || o.bottom > l.top)
      return;
    let c = this.domAtPos(t.head + t.assoc, t.assoc);
    i.collapse(c.node, c.offset), i.modify("move", t.assoc < 0 ? "forward" : "backward", "lineboundary"), e.observer.readSelectionRange();
    let h = e.observer.selectionRange;
    e.docView.posFromDOM(h.anchorNode, h.anchorOffset) != t.from && i.collapse(r, O);
  }
  posFromDOM(e, t) {
    let i = this.tile.nearest(e);
    if (!i)
      return this.tile.dom.compareDocumentPosition(e) & 2 ? 0 : this.view.state.doc.length;
    let r = i.posAtStart;
    if (i.isComposite()) {
      let O;
      if (e == i.dom)
        O = i.dom.childNodes[t];
      else {
        let s = Ot(e) == 0 ? 0 : t == 0 ? -1 : 1;
        for (; ; ) {
          let a = e.parentNode;
          if (a == i.dom)
            break;
          s == 0 && a.firstChild != a.lastChild && (e == a.firstChild ? s = -1 : s = 1), e = a;
        }
        s < 0 ? O = e : O = e.nextSibling;
      }
      if (O == i.dom.firstChild)
        return r;
      for (; O && !K.get(O); )
        O = O.nextSibling;
      if (!O)
        return r + i.length;
      for (let s = 0, a = r; ; s++) {
        let o = i.children[s];
        if (o.dom == O)
          return a;
        a += o.length + o.breakAfter;
      }
    } else return i.isText() ? e == i.dom ? r + t : r + (t ? i.length : 0) : r;
  }
  domAtPos(e, t) {
    let { tile: i, offset: r } = this.tile.resolveBlock(e, t);
    return i.isWidget() ? i.domPosFor(e, t) : i.domIn(r, t);
  }
  inlineDOMNearPos(e, t) {
    let i, r = -1, O = !1, s, a = -1, o = !1;
    return this.tile.blockTiles((l, c) => {
      if (l.isWidget()) {
        if (l.flags & 32 && c >= e)
          return !0;
        l.flags & 16 && (O = !0);
      } else {
        let h = c + l.length;
        if (c <= e && (i = l, r = e - c, O = h < e), h >= e && !s && (s = l, a = e - c, o = c > e), c > e && s)
          return !0;
      }
    }), !i && !s ? this.domAtPos(e, t) : (O && s ? i = null : o && i && (s = null), i && t < 0 || !s ? i.domIn(r, t) : s.domIn(a, t));
  }
  coordsAt(e, t) {
    let { tile: i, offset: r } = this.tile.resolveBlock(e, t);
    return i.isWidget() ? i.widget instanceof yr ? null : i.coordsInWidget(r, t, !0) : i.coordsIn(r, t);
  }
  lineAt(e, t) {
    let { tile: i } = this.tile.resolveBlock(e, t);
    return i.isLine() ? i : null;
  }
  coordsForChar(e) {
    let { tile: t, offset: i } = this.tile.resolveBlock(e, 1);
    if (!t.isLine())
      return null;
    function r(O, s) {
      if (O.isComposite())
        for (let a of O.children) {
          if (a.length >= s) {
            let o = r(a, s);
            if (o)
              return o;
          }
          if (s -= a.length, s < 0)
            break;
        }
      else if (O.isText() && s < O.length) {
        let a = re(O.text, s);
        if (a == s)
          return null;
        let o = Ci(O.dom, s, a).getClientRects();
        for (let l = 0; l < o.length; l++) {
          let c = o[l];
          if (l == o.length - 1 || c.top < c.bottom && c.left < c.right)
            return c;
        }
      }
      return null;
    }
    return r(t, i);
  }
  measureVisibleLineHeights(e) {
    let t = [], { from: i, to: r } = e, O = this.view.contentDOM.clientWidth, s = O > Math.max(this.view.scrollDOM.clientWidth, this.minWidth) + 1, a = -1, o = this.view.textDirection == B.LTR, l = 0, c = (h, f, u) => {
      for (let d = 0; d < h.children.length && !(f > r); d++) {
        let p = h.children[d], Q = f + p.length, m = p.dom.getBoundingClientRect(), { height: g } = m;
        if (u && !d && (l += m.top - u.top), p instanceof dt)
          Q > i && c(p, f, m);
        else if (f >= i && (l > 0 && t.push(-l), t.push(g + l), l = 0, s)) {
          let T = p.dom.lastChild, v = T ? vi(T) : [];
          if (v.length) {
            let y = v[v.length - 1], Z = o ? y.right - m.left : m.right - y.left;
            Z > a && (a = Z, this.minWidth = O, this.minWidthFrom = f, this.minWidthTo = Q);
          }
        }
        u && d == h.children.length - 1 && (l += u.bottom - m.bottom), f = Q + p.breakAfter;
      }
    };
    return c(this.tile, 0, null), t;
  }
  textDirectionAt(e) {
    let { tile: t } = this.tile.resolveBlock(e, 1);
    return getComputedStyle(t.dom).direction == "rtl" ? B.RTL : B.LTR;
  }
  measureTextSize() {
    let e = this.tile.blockTiles((s) => {
      if (s.isLine() && s.children.length && s.length <= 20) {
        let a = 0, o;
        for (let l of s.children) {
          if (!l.isText() || /[^ -~]/.test(l.text))
            return;
          let c = vi(l.dom);
          if (c.length != 1)
            return;
          a += c[0].width, o = c[0].height;
        }
        if (a)
          return {
            lineHeight: s.dom.getBoundingClientRect().height,
            charWidth: a / s.length,
            textHeight: o
          };
      }
    });
    if (e)
      return e;
    let t = document.createElement("div"), i, r, O;
    return t.className = "cm-line", t.style.width = "99999px", t.style.position = "absolute", t.textContent = "abc def ghi jkl mno pqr stu", this.view.observer.ignore(() => {
      this.tile.dom.appendChild(t);
      let s = vi(t.firstChild)[0];
      i = t.getBoundingClientRect().height, r = s && s.width ? s.width / 27 : 7, O = s && s.height ? s.height : i, t.remove();
    }), { lineHeight: i, charWidth: r, textHeight: O };
  }
  computeBlockGapDeco() {
    let e = [], t = this.view.viewState;
    for (let i = 0, r = 0; ; r++) {
      let O = r == t.viewports.length ? null : t.viewports[r], s = O ? O.from - 1 : this.view.state.doc.length;
      if (s > i) {
        let a = (t.lineBlockAt(s).bottom - t.lineBlockAt(i).top) / this.view.scaleY;
        e.push(Y.replace({
          widget: new yr(a),
          block: !0,
          inclusive: !0,
          isBlockGap: !0
        }).range(i, s));
      }
      if (!O)
        break;
      i = O.to + 1;
    }
    return Y.set(e);
  }
  updateDeco() {
    let e = 1, t = this.view.state.facet(rr).map((O) => (this.dynamicDecorationMap[e++] = typeof O == "function") ? O(this.view) : O), i = !1, r = this.view.state.facet(os).map((O, s) => {
      let a = typeof O == "function";
      return a && (i = !0), a ? O(this.view) : O;
    });
    for (r.length && (this.dynamicDecorationMap[e++] = i, t.push(_.join(r))), this.decorations = [
      this.editContextFormatting,
      ...t,
      this.computeBlockGapDeco(),
      this.view.viewState.lineGapDeco
    ]; e < this.decorations.length; )
      this.dynamicDecorationMap[e++] = !1;
    this.blockWrappers = this.view.state.facet(Dl).map((O) => typeof O == "function" ? O(this.view) : O);
  }
  scrollIntoView(e) {
    if (e.isSnapshot) {
      let l = this.view.viewState.lineBlockAt(e.range.head);
      this.view.scrollDOM.scrollTop = l.top - e.yMargin, this.view.scrollDOM.scrollLeft = e.xMargin;
      return;
    }
    for (let l of this.view.state.facet(Ml))
      try {
        if (l(this.view, e.range, e))
          return !0;
      } catch (c) {
        Se(this.view.state, c, "scroll handler");
      }
    let { range: t } = e, i = this.coordsAt(t.head, t.empty ? t.assoc : t.head > t.anchor ? -1 : 1), r;
    if (!i)
      return;
    !t.empty && (r = this.coordsAt(t.anchor, t.anchor > t.head ? -1 : 1)) && (i = {
      left: Math.min(i.left, r.left),
      top: Math.min(i.top, r.top),
      right: Math.max(i.right, r.right),
      bottom: Math.max(i.bottom, r.bottom)
    });
    let O = ls(this.view), s = {
      left: i.left - O.left,
      top: i.top - O.top,
      right: i.right + O.right,
      bottom: i.bottom + O.bottom
    }, { offsetWidth: a, offsetHeight: o } = this.view.scrollDOM;
    ru(this.view.scrollDOM, s, t.head < t.anchor ? -1 : 1, e.x, e.y, Math.max(Math.min(e.xMargin, a), -a), Math.max(Math.min(e.yMargin, o), -o), this.view.textDirection == B.LTR);
  }
  lineHasWidget(e) {
    let t = (i) => i.isWidget() || i.children.some(t);
    return t(this.tile.resolveBlock(e, 1).tile);
  }
  destroy() {
    yO(this.tile);
  }
}
function yO(n, e) {
  let t = e == null ? void 0 : e.get(n);
  if (t != 1) {
    t == null && n.destroy();
    for (let i of n.children)
      yO(i, e);
  }
}
function zu(n) {
  return n.node.nodeType == 1 && n.node.firstChild && (n.offset == 0 || n.node.childNodes[n.offset - 1].contentEditable == "false") && (n.offset == n.node.childNodes.length || n.node.childNodes[n.offset].contentEditable == "false");
}
function Fl(n, e) {
  let t = n.observer.selectionRange;
  if (!t.focusNode)
    return null;
  let i = vl(t.focusNode, t.focusOffset), r = Zl(t.focusNode, t.focusOffset), O = i || r;
  if (r && i && r.node != i.node) {
    let a = K.get(r.node);
    if (!a || a.isText() && a.text != r.node.nodeValue)
      O = r;
    else if (n.docView.lastCompositionAfterCursor) {
      let o = K.get(i.node);
      !o || o.isText() && o.text != i.node.nodeValue || (O = r);
    }
  }
  if (n.docView.lastCompositionAfterCursor = O != i, !O)
    return null;
  let s = e - O.offset;
  return { from: s, to: s + O.node.nodeValue.length, node: O.node };
}
function _u(n, e, t) {
  let i = Fl(n, t);
  if (!i)
    return null;
  let { node: r, from: O, to: s } = i, a = r.nodeValue;
  if (/[\n\r]/.test(a) || n.state.doc.sliceString(i.from, i.to) != a)
    return null;
  let o = e.invertedDesc;
  return { range: new ke(o.mapPos(O), o.mapPos(s), O, s), text: r };
}
function Yu(n, e) {
  return n.nodeType != 1 ? 0 : (e && n.childNodes[e - 1].contentEditable == "false" ? 1 : 0) | (e < n.childNodes.length && n.childNodes[e].contentEditable == "false" ? 2 : 0);
}
let Vu = class {
  constructor() {
    this.changes = [];
  }
  compareRange(e, t) {
    It(e, t, this.changes);
  }
  comparePoint(e, t) {
    It(e, t, this.changes);
  }
  boundChange(e) {
    It(e, e, this.changes);
  }
};
function Wu(n, e, t) {
  let i = new Vu();
  return _.compare(n, e, t, i), i.changes;
}
class qu {
  constructor() {
    this.changes = [];
  }
  compareRange(e, t) {
    It(e, t, this.changes);
  }
  comparePoint() {
  }
  boundChange(e) {
    It(e, e, this.changes);
  }
}
function Cu(n, e, t) {
  let i = new qu();
  return _.compare(n, e, t, i), i.changes;
}
function Uu(n, e) {
  for (let t = n; t && t != e; t = t.assignedSlot || t.parentNode)
    if (t.nodeType == 1 && t.contentEditable == "false")
      return !0;
  return !1;
}
function Au(n, e) {
  let t = !1;
  return e && n.iterChangedRanges((i, r) => {
    i < e.to && r > e.from && (t = !0);
  }), t;
}
class yr extends Pt {
  constructor(e) {
    super(), this.height = e;
  }
  toDOM() {
    let e = document.createElement("div");
    return e.className = "cm-gap", this.updateDOM(e), e;
  }
  eq(e) {
    return e.height == this.height;
  }
  updateDOM(e) {
    return e.style.height = this.height + "px", !0;
  }
  get editable() {
    return !0;
  }
  get estimatedHeight() {
    return this.height;
  }
  ignoreEvent() {
    return !1;
  }
}
function Gu(n, e, t = 1) {
  let i = n.charCategorizer(e), r = n.doc.lineAt(e), O = e - r.from;
  if (r.length == 0)
    return S.cursor(e);
  O == 0 ? t = 1 : O == r.length && (t = -1);
  let s = O, a = O;
  t < 0 ? s = re(r.text, O, !1) : a = re(r.text, O);
  let o = i(r.text.slice(s, a));
  for (; s > 0; ) {
    let l = re(r.text, s, !1);
    if (i(r.text.slice(l, s)) != o)
      break;
    s = l;
  }
  for (; a < r.length; ) {
    let l = re(r.text, a);
    if (i(r.text.slice(a, l)) != o)
      break;
    a = l;
  }
  return S.range(s + r.from, a + r.from);
}
function ju(n, e, t, i, r) {
  let O = Math.round((i - e.left) * n.defaultCharacterWidth);
  if (n.lineWrapping && t.height > n.defaultLineHeight * 1.5) {
    let a = n.viewState.heightOracle.textHeight, o = Math.floor((r - t.top - (n.defaultLineHeight - a) * 0.5) / a);
    O += o * n.viewState.heightOracle.lineLength;
  }
  let s = n.state.sliceDoc(t.from, t.to);
  return t.from + Hf(s, O, n.state.tabSize);
}
function Mu(n, e, t) {
  let i = n.lineBlockAt(e);
  if (Array.isArray(i.type)) {
    let r;
    for (let O of i.type) {
      if (O.from > e)
        break;
      if (!(O.to < e)) {
        if (O.from < e && O.to > e)
          return O;
        (!r || O.type == pe.Text && (r.type != O.type || (t < 0 ? O.from < e : O.to > e))) && (r = O);
      }
    }
    return r || i;
  }
  return i;
}
function Eu(n, e, t, i) {
  let r = Mu(n, e.head, e.assoc || -1), O = !i || r.type != pe.Text || !(n.lineWrapping || r.widgetLineBreaks) ? null : n.coordsAtPos(e.assoc < 0 && e.head > r.from ? e.head - 1 : e.head);
  if (O) {
    let s = n.dom.getBoundingClientRect(), a = n.textDirectionAt(r.from), o = n.posAtCoords({
      x: t == (a == B.LTR) ? s.right - 1 : s.left + 1,
      y: (O.top + O.bottom) / 2
    });
    if (o != null)
      return S.cursor(o, t ? -1 : 1);
  }
  return S.cursor(t ? r.to : r.from, t ? -1 : 1);
}
function aa(n, e, t, i) {
  let r = n.state.doc.lineAt(e.head), O = n.bidiSpans(r), s = n.textDirectionAt(r.from);
  for (let a = e, o = null; ; ) {
    let l = pu(r, O, s, a, t), c = Vl;
    if (!l) {
      if (r.number == (t ? n.state.doc.lines : 1))
        return a;
      c = `
`, r = n.state.doc.line(r.number + (t ? 1 : -1)), O = n.bidiSpans(r), l = n.visualLineSide(r, !t);
    }
    if (o) {
      if (!o(c))
        return a;
    } else {
      if (!i)
        return l;
      o = i(c);
    }
    a = l;
  }
}
function Lu(n, e, t) {
  let i = n.state.charCategorizer(e), r = i(t);
  return (O) => {
    let s = i(O);
    return r == xe.Space && (r = s), r == s;
  };
}
function Du(n, e, t, i) {
  let r = e.head, O = t ? 1 : -1;
  if (r == (t ? n.state.doc.length : 0))
    return S.cursor(r, e.assoc);
  let s = e.goalColumn, a, o = n.contentDOM.getBoundingClientRect(), l = n.coordsAtPos(r, e.assoc || -1), c = n.documentTop;
  if (l)
    s == null && (s = l.left - o.left), a = O < 0 ? l.top : l.bottom;
  else {
    let d = n.viewState.lineBlockAt(r);
    s == null && (s = Math.min(o.right - o.left, n.defaultCharacterWidth * (r - d.from))), a = (O < 0 ? d.top : d.bottom) + c;
  }
  let h = o.left + s, f = i ?? n.viewState.heightOracle.textHeight >> 1, u = bO(n, { x: h, y: a + f * O }, !1, O);
  return S.cursor(u.pos, u.assoc, void 0, s);
}
function Ri(n, e, t) {
  for (; ; ) {
    let i = 0;
    for (let r of n)
      r.between(e - 1, e + 1, (O, s, a) => {
        if (e > O && e < s) {
          let o = i || t || (e - O < s - e ? -1 : 1);
          e = o < 0 ? O : s, i = o;
        }
      });
    if (!i)
      return e;
  }
}
function Hl(n, e) {
  let t = null;
  for (let i = 0; i < e.ranges.length; i++) {
    let r = e.ranges[i], O = null;
    if (r.empty) {
      let s = Ri(n, r.from, 0);
      s != r.from && (O = S.cursor(s, -1));
    } else {
      let s = Ri(n, r.from, -1), a = Ri(n, r.to, 1);
      (s != r.from || a != r.to) && (O = S.range(r.from == r.anchor ? s : a, r.from == r.head ? s : a));
    }
    O && (t || (t = e.ranges.slice()), t[i] = O);
  }
  return t ? S.create(t, e.mainIndex) : e;
}
function br(n, e, t) {
  let i = Ri(n.state.facet(Fi).map((r) => r(n)), t.from, e.head > t.from ? -1 : 1);
  return i == t.from ? t : S.cursor(i, i < t.from ? 1 : -1);
}
class Le {
  constructor(e, t) {
    this.pos = e, this.assoc = t;
  }
}
function bO(n, e, t, i) {
  let r = n.contentDOM.getBoundingClientRect(), O = r.top + n.viewState.paddingTop, { x: s, y: a } = e, o = a - O, l;
  for (; ; ) {
    if (o < 0)
      return new Le(0, 1);
    if (o > n.viewState.docHeight)
      return new Le(n.state.doc.length, -1);
    if (l = n.elementAtHeight(o), i == null)
      break;
    if (l.type == pe.Text) {
      let f = n.docView.coordsAt(i < 0 ? l.from : l.to, i);
      if (f && (i < 0 ? f.top <= o + O : f.bottom >= o + O))
        break;
    }
    let h = n.viewState.heightOracle.textHeight / 2;
    o = i > 0 ? l.bottom + h : l.top - h;
  }
  if (n.viewport.from >= l.to || n.viewport.to <= l.from) {
    if (t)
      return null;
    if (l.type == pe.Text) {
      let h = ju(n, r, l, s, a);
      return new Le(h, h == l.from ? 1 : -1);
    }
  }
  if (l.type != pe.Text)
    return o < (l.top + l.bottom) / 2 ? new Le(l.from, 1) : new Le(l.to, -1);
  let c = n.docView.lineAt(l.from, 2);
  return (!c || c.length != l.length) && (c = n.docView.lineAt(l.from, -2)), Kl(n, c, l.from, s, a);
}
function Kl(n, e, t, i, r) {
  let O = -1, s = null, a = 1e9, o = 1e9, l = r, c = r, h = (f, u) => {
    for (let d = 0; d < f.length; d++) {
      let p = f[d];
      if (p.top == p.bottom)
        continue;
      let Q = p.left > i ? p.left - i : p.right < i ? i - p.right : 0, m = p.top > r ? p.top - r : p.bottom < r ? r - p.bottom : 0;
      p.top <= c && p.bottom >= l && (l = Math.min(p.top, l), c = Math.max(p.bottom, c), m = 0), (O < 0 || (m - o || Q - a) < 0) && (O >= 0 && o && a < Q && s.top <= c - 2 && s.bottom >= l + 2 ? o = 0 : (O = u, a = Q, o = m, s = p));
    }
  };
  if (e.isText()) {
    for (let u = 0; u < e.length; ) {
      let d = re(e.text, u);
      if (h(Ci(e.dom, u, d).getClientRects(), u), !a && !o)
        break;
      u = d;
    }
    return i > (s.left + s.right) / 2 == (oa(n, O + t) == B.LTR) ? new Le(t + re(e.text, O), -1) : new Le(t + O, 1);
  } else {
    if (!e.length)
      return new Le(t, 1);
    for (let p = 0; p < e.children.length; p++) {
      let Q = e.children[p];
      if (Q.flags & 48)
        continue;
      let m = (Q.dom.nodeType == 1 ? Q.dom : Ci(Q.dom, 0, Q.length)).getClientRects();
      if (h(m, p), !a && !o)
        break;
    }
    let f = e.children[O], u = e.posBefore(f, t);
    return f.isComposite() || f.isText() ? Kl(n, f, u, Math.max(s.left, Math.min(s.right, i)), r) : i > (s.left + s.right) / 2 == (oa(n, O + t) == B.LTR) ? new Le(u + f.length, -1) : new Le(u, 1);
  }
}
function oa(n, e) {
  let t = n.state.doc.lineAt(e);
  return n.bidiSpans(t)[nt.find(n.bidiSpans(t), e - t.from, -1, 1)].dir;
}
const yi = "￿";
class Bu {
  constructor(e, t) {
    this.points = e, this.view = t, this.text = "", this.lineSeparator = t.state.facet(q.lineSeparator);
  }
  append(e) {
    this.text += e;
  }
  lineBreak() {
    this.text += yi;
  }
  readRange(e, t) {
    if (!e)
      return this;
    let i = e.parentNode;
    for (let r = e; ; ) {
      this.findPointBefore(i, r);
      let O = this.text.length;
      this.readNode(r);
      let s = K.get(r), a = r.nextSibling;
      if (a == t) {
        s != null && s.breakAfter && !a && i != this.view.contentDOM && this.lineBreak();
        break;
      }
      let o = K.get(a);
      (s && o ? s.breakAfter : (s ? s.breakAfter : _n(r)) || _n(a) && (r.nodeName != "BR" || s != null && s.isWidget()) && this.text.length > O) && !Nu(a, t) && this.lineBreak(), r = a;
    }
    return this.findPointBefore(i, t), this;
  }
  readTextNode(e) {
    let t = e.nodeValue;
    for (let i of this.points)
      i.node == e && (i.pos = this.text.length + Math.min(i.offset, t.length));
    for (let i = 0, r = this.lineSeparator ? null : /\r\n?|\n/g; ; ) {
      let O = -1, s = 1, a;
      if (this.lineSeparator ? (O = t.indexOf(this.lineSeparator, i), s = this.lineSeparator.length) : (a = r.exec(t)) && (O = a.index, s = a[0].length), this.append(t.slice(i, O < 0 ? t.length : O)), O < 0)
        break;
      if (this.lineBreak(), s > 1)
        for (let o of this.points)
          o.node == e && o.pos > this.text.length && (o.pos -= s - 1);
      i = O + s;
    }
  }
  readNode(e) {
    let t = K.get(e), i = t && t.overrideDOMText;
    if (i != null) {
      this.findPointInside(e, i.length);
      for (let r = i.iter(); !r.next().done; )
        r.lineBreak ? this.lineBreak() : this.append(r.value);
    } else e.nodeType == 3 ? this.readTextNode(e) : e.nodeName == "BR" ? e.nextSibling && this.lineBreak() : e.nodeType == 1 && this.readRange(e.firstChild, null);
  }
  findPointBefore(e, t) {
    for (let i of this.points)
      i.node == e && e.childNodes[i.offset] == t && (i.pos = this.text.length);
  }
  findPointInside(e, t) {
    for (let i of this.points)
      (e.nodeType == 3 ? i.node == e : e.contains(i.node)) && (i.pos = this.text.length + (Iu(e, i.node, i.offset) ? t : 0));
  }
}
function Iu(n, e, t) {
  for (; ; ) {
    if (!e || t < Ot(e))
      return !1;
    if (e == n)
      return !0;
    t = mt(e) + 1, e = e.parentNode;
  }
}
function Nu(n, e) {
  let t;
  for (; !(n == e || !n); n = n.nextSibling) {
    let i = K.get(n);
    if (!(i != null && i.isWidget()))
      return !1;
    i && (t || (t = [])).push(i);
  }
  if (t)
    for (let i of t) {
      let r = i.overrideDOMText;
      if (r != null && r.length)
        return !1;
    }
  return !0;
}
class la {
  constructor(e, t) {
    this.node = e, this.offset = t, this.pos = -1;
  }
}
class Fu {
  constructor(e, t, i, r) {
    this.typeOver = r, this.bounds = null, this.text = "", this.domChanged = t > -1;
    let { impreciseHead: O, impreciseAnchor: s } = e.docView;
    if (e.state.readOnly && t > -1)
      this.newSel = null;
    else if (t > -1 && (this.bounds = Jl(e.docView.tile, t, i, 0))) {
      let a = O || s ? [] : Ku(e), o = new Bu(a, e);
      o.readRange(this.bounds.startDOM, this.bounds.endDOM), this.text = o.text, this.newSel = Ju(a, this.bounds.from);
    } else {
      let a = e.observer.selectionRange, o = O && O.node == a.focusNode && O.offset == a.focusOffset || !mO(e.contentDOM, a.focusNode) ? e.state.selection.main.head : e.docView.posFromDOM(a.focusNode, a.focusOffset), l = s && s.node == a.anchorNode && s.offset == a.anchorOffset || !mO(e.contentDOM, a.anchorNode) ? e.state.selection.main.anchor : e.docView.posFromDOM(a.anchorNode, a.anchorOffset), c = e.viewport;
      if ((b.ios || b.chrome) && e.state.selection.main.empty && o != l && (c.from > 0 || c.to < e.state.doc.length)) {
        let h = Math.min(o, l), f = Math.max(o, l), u = c.from - h, d = c.to - f;
        (u == 0 || u == 1 || h == 0) && (d == 0 || d == -1 || f == e.state.doc.length) && (o = 0, l = e.state.doc.length);
      }
      e.inputState.composing > -1 && e.state.selection.ranges.length > 1 ? this.newSel = e.state.selection.replaceRange(S.range(l, o)) : this.newSel = S.single(l, o);
    }
  }
}
function Jl(n, e, t, i) {
  if (n.isComposite()) {
    let r = -1, O = -1, s = -1, a = -1;
    for (let o = 0, l = i, c = i; o < n.children.length; o++) {
      let h = n.children[o], f = l + h.length;
      if (l < e && f > t)
        return Jl(h, e, t, l);
      if (f >= e && r == -1 && (r = o, O = l), l > t && h.dom.parentNode == n.dom) {
        s = o, a = c;
        break;
      }
      c = f, l = f + h.breakAfter;
    }
    return {
      from: O,
      to: a < 0 ? i + n.length : a,
      startDOM: (r ? n.children[r - 1].dom.nextSibling : null) || n.dom.firstChild,
      endDOM: s < n.children.length && s >= 0 ? n.children[s].dom : null
    };
  } else return n.isText() ? { from: i, to: i + n.length, startDOM: n.dom, endDOM: n.dom.nextSibling } : null;
}
function ec(n, e) {
  let t, { newSel: i } = e, r = n.state.selection.main, O = n.inputState.lastKeyTime > Date.now() - 100 ? n.inputState.lastKeyCode : -1;
  if (e.bounds) {
    let { from: s, to: a } = e.bounds, o = r.from, l = null;
    (O === 8 || b.android && e.text.length < a - s) && (o = r.to, l = "end");
    let c = tc(n.state.doc.sliceString(s, a, yi), e.text, o - s, l);
    c && (b.chrome && O == 13 && c.toB == c.from + 2 && e.text.slice(c.from, c.toB) == yi + yi && c.toB--, t = {
      from: s + c.from,
      to: s + c.toA,
      insert: W.of(e.text.slice(c.from, c.toB).split(yi))
    });
  } else i && (!n.hasFocus && n.state.facet(it) || qn(i, r)) && (i = null);
  if (!t && !i)
    return !1;
  if (!t && e.typeOver && !r.empty && i && i.main.empty ? t = { from: r.from, to: r.to, insert: n.state.doc.slice(r.from, r.to) } : (b.mac || b.android) && t && t.from == t.to && t.from == r.head - 1 && /^\. ?$/.test(t.insert.toString()) && n.contentDOM.getAttribute("autocorrect") == "off" ? (i && t.insert.length == 2 && (i = S.single(i.main.anchor - 1, i.main.head - 1)), t = { from: t.from, to: t.to, insert: W.of([t.insert.toString().replace(".", " ")]) }) : t && t.from >= r.from && t.to <= r.to && (t.from != r.from || t.to != r.to) && r.to - r.from - (t.to - t.from) <= 4 ? t = {
    from: r.from,
    to: r.to,
    insert: n.state.doc.slice(r.from, t.from).append(t.insert).append(n.state.doc.slice(t.to, r.to))
  } : n.state.doc.lineAt(r.from).to < r.to && n.docView.lineHasWidget(r.to) && n.inputState.insertingTextAt > Date.now() - 50 ? t = {
    from: r.from,
    to: r.to,
    insert: n.state.toText(n.inputState.insertingText)
  } : b.chrome && t && t.from == t.to && t.from == r.head && t.insert.toString() == `
 ` && n.lineWrapping && (i && (i = S.single(i.main.anchor - 1, i.main.head - 1)), t = { from: r.from, to: r.to, insert: W.of([" "]) }), t)
    return cs(n, t, i, O);
  if (i && !qn(i, r)) {
    let s = !1, a = "select";
    return n.inputState.lastSelectionTime > Date.now() - 50 && (n.inputState.lastSelectionOrigin == "select" && (s = !0), a = n.inputState.lastSelectionOrigin, a == "select.pointer" && (i = Hl(n.state.facet(Fi).map((o) => o(n)), i))), n.dispatch({ selection: i, scrollIntoView: s, userEvent: a }), !0;
  } else
    return !1;
}
function cs(n, e, t, i = -1) {
  if (b.ios && n.inputState.flushIOSKey(e))
    return !0;
  let r = n.state.selection.main;
  if (b.android && (e.to == r.to && // GBoard will sometimes remove a space it just inserted
  // after a completion when you press enter
  (e.from == r.from || e.from == r.from - 1 && n.state.sliceDoc(e.from, r.from) == " ") && e.insert.length == 1 && e.insert.lines == 2 && Nt(n.contentDOM, "Enter", 13) || (e.from == r.from - 1 && e.to == r.to && e.insert.length == 0 || i == 8 && e.insert.length < e.to - e.from && e.to > r.head) && Nt(n.contentDOM, "Backspace", 8) || e.from == r.from && e.to == r.to + 1 && e.insert.length == 0 && Nt(n.contentDOM, "Delete", 46)))
    return !0;
  let O = e.insert.toString();
  n.inputState.composing >= 0 && n.inputState.composing++;
  let s, a = () => s || (s = Hu(n, e, t));
  return n.state.facet(Al).some((o) => o(n, e.from, e.to, O, a)) || n.dispatch(a()), !0;
}
function Hu(n, e, t) {
  let i, r = n.state, O = r.selection.main, s = -1;
  if (e.from == e.to && e.from < O.from || e.from > O.to) {
    let o = e.from < O.from ? -1 : 1, l = o < 0 ? O.from : O.to, c = Ri(r.facet(Fi).map((h) => h(n)), l, o);
    e.from == c && (s = c);
  }
  if (s > -1)
    i = {
      changes: e,
      selection: S.cursor(e.from + e.insert.length, -1)
    };
  else if (e.from >= O.from && e.to <= O.to && e.to - e.from >= (O.to - O.from) / 3 && (!t || t.main.empty && t.main.from == e.from + e.insert.length) && n.inputState.composing < 0) {
    let o = O.from < e.from ? r.sliceDoc(O.from, e.from) : "", l = O.to > e.to ? r.sliceDoc(e.to, O.to) : "";
    i = r.replaceSelection(n.state.toText(o + e.insert.sliceString(0, void 0, n.state.lineBreak) + l));
  } else {
    let o = r.changes(e), l = t && t.main.to <= o.newLength ? t.main : void 0;
    if (r.selection.ranges.length > 1 && (n.inputState.composing >= 0 || n.inputState.compositionPendingChange) && e.to <= O.to + 10 && e.to >= O.to - 10) {
      let c = n.state.sliceDoc(e.from, e.to), h, f = t && Fl(n, t.main.head);
      if (f) {
        let d = e.insert.length - (e.to - e.from);
        h = { from: f.from, to: f.to - d };
      } else
        h = n.state.doc.lineAt(O.head);
      let u = O.to - e.to;
      i = r.changeByRange((d) => {
        if (d.from == O.from && d.to == O.to)
          return { changes: o, range: l || d.map(o) };
        let p = d.to - u, Q = p - c.length;
        if (n.state.sliceDoc(Q, p) != c || // Unfortunately, there's no way to make multiple
        // changes in the same node work without aborting
        // composition, so cursors in the composition range are
        // ignored.
        p >= h.from && Q <= h.to)
          return { range: d };
        let m = r.changes({ from: Q, to: p, insert: e.insert }), g = d.to - O.to;
        return {
          changes: m,
          range: l ? S.range(Math.max(0, l.anchor + g), Math.max(0, l.head + g)) : d.map(m)
        };
      });
    } else
      i = {
        changes: o,
        selection: l && r.selection.replaceRange(l)
      };
  }
  let a = "input.type";
  return (n.composing || n.inputState.compositionPendingChange && n.inputState.compositionEndedAt > Date.now() - 50) && (n.inputState.compositionPendingChange = !1, a += ".compose", n.inputState.compositionFirstChange && (a += ".start", n.inputState.compositionFirstChange = !1)), r.update(i, { userEvent: a, scrollIntoView: !0 });
}
function tc(n, e, t, i) {
  let r = Math.min(n.length, e.length), O = 0;
  for (; O < r && n.charCodeAt(O) == e.charCodeAt(O); )
    O++;
  if (O == r && n.length == e.length)
    return null;
  let s = n.length, a = e.length;
  for (; s > 0 && a > 0 && n.charCodeAt(s - 1) == e.charCodeAt(a - 1); )
    s--, a--;
  if (i == "end") {
    let o = Math.max(0, O - Math.min(s, a));
    t -= s + o - O;
  }
  if (s < O && n.length < e.length) {
    let o = t <= O && t >= s ? O - t : 0;
    O -= o, a = O + (a - s), s = O;
  } else if (a < O) {
    let o = t <= O && t >= a ? O - t : 0;
    O -= o, s = O + (s - a), a = O;
  }
  return { from: O, toA: s, toB: a };
}
function Ku(n) {
  let e = [];
  if (n.root.activeElement != n.contentDOM)
    return e;
  let { anchorNode: t, anchorOffset: i, focusNode: r, focusOffset: O } = n.observer.selectionRange;
  return t && (e.push(new la(t, i)), (r != t || O != i) && e.push(new la(r, O))), e;
}
function Ju(n, e) {
  if (n.length == 0)
    return null;
  let t = n[0].pos, i = n.length == 2 ? n[1].pos : t;
  return t > -1 && i > -1 ? S.single(t + e, i + e) : null;
}
function qn(n, e) {
  return e.head == n.main.head && e.anchor == n.main.anchor;
}
class e$ {
  setSelectionOrigin(e) {
    this.lastSelectionOrigin = e, this.lastSelectionTime = Date.now();
  }
  constructor(e) {
    this.view = e, this.lastKeyCode = 0, this.lastKeyTime = 0, this.lastTouchTime = 0, this.lastFocusTime = 0, this.lastScrollTop = 0, this.lastScrollLeft = 0, this.pendingIOSKey = void 0, this.tabFocusMode = -1, this.lastSelectionOrigin = null, this.lastSelectionTime = 0, this.lastContextMenu = 0, this.scrollHandlers = [], this.handlers = /* @__PURE__ */ Object.create(null), this.composing = -1, this.compositionFirstChange = null, this.compositionEndedAt = 0, this.compositionPendingKey = !1, this.compositionPendingChange = !1, this.insertingText = "", this.insertingTextAt = 0, this.mouseSelection = null, this.draggedContent = null, this.handleEvent = this.handleEvent.bind(this), this.notifiedFocused = e.hasFocus, b.safari && e.contentDOM.addEventListener("input", () => null), b.gecko && d$(e.contentDOM.ownerDocument);
  }
  handleEvent(e) {
    !o$(this.view, e) || this.ignoreDuringComposition(e) || e.type == "keydown" && this.keydown(e) || (this.view.updateState != 0 ? Promise.resolve().then(() => this.runHandlers(e.type, e)) : this.runHandlers(e.type, e));
  }
  runHandlers(e, t) {
    let i = this.handlers[e];
    if (i) {
      for (let r of i.observers)
        r(this.view, t);
      for (let r of i.handlers) {
        if (t.defaultPrevented)
          break;
        if (r(this.view, t)) {
          t.preventDefault();
          break;
        }
      }
    }
  }
  ensureHandlers(e) {
    let t = t$(e), i = this.handlers, r = this.view.contentDOM;
    for (let O in t)
      if (O != "scroll") {
        let s = !t[O].handlers.length, a = i[O];
        a && s != !a.handlers.length && (r.removeEventListener(O, this.handleEvent), a = null), a || r.addEventListener(O, this.handleEvent, { passive: s });
      }
    for (let O in i)
      O != "scroll" && !t[O] && r.removeEventListener(O, this.handleEvent);
    this.handlers = t;
  }
  keydown(e) {
    if (this.lastKeyCode = e.keyCode, this.lastKeyTime = Date.now(), e.keyCode == 9 && this.tabFocusMode > -1 && (!this.tabFocusMode || Date.now() <= this.tabFocusMode))
      return !0;
    if (this.tabFocusMode > 0 && e.keyCode != 27 && nc.indexOf(e.keyCode) < 0 && (this.tabFocusMode = -1), b.android && b.chrome && !e.synthetic && (e.keyCode == 13 || e.keyCode == 8))
      return this.view.observer.delayAndroidKey(e.key, e.keyCode), !0;
    let t;
    return b.ios && !e.synthetic && !e.altKey && !e.metaKey && ((t = ic.find((i) => i.keyCode == e.keyCode)) && !e.ctrlKey || i$.indexOf(e.key) > -1 && e.ctrlKey && !e.shiftKey) ? (this.pendingIOSKey = t || e, setTimeout(() => this.flushIOSKey(), 250), !0) : (e.keyCode != 229 && this.view.observer.forceFlush(), !1);
  }
  flushIOSKey(e) {
    let t = this.pendingIOSKey;
    return !t || t.key == "Enter" && e && e.from < e.to && /^\S+$/.test(e.insert.toString()) ? !1 : (this.pendingIOSKey = void 0, Nt(this.view.contentDOM, t.key, t.keyCode, t instanceof KeyboardEvent ? t : void 0));
  }
  ignoreDuringComposition(e) {
    return !/^key/.test(e.type) || e.synthetic ? !1 : this.composing > 0 ? !0 : b.safari && !b.ios && this.compositionPendingKey && Date.now() - this.compositionEndedAt < 100 ? (this.compositionPendingKey = !1, !0) : !1;
  }
  startMouseSelection(e) {
    this.mouseSelection && this.mouseSelection.destroy(), this.mouseSelection = e;
  }
  update(e) {
    this.view.observer.update(e), this.mouseSelection && this.mouseSelection.update(e), this.draggedContent && e.docChanged && (this.draggedContent = this.draggedContent.map(e.changes)), e.transactions.length && (this.lastKeyCode = this.lastSelectionTime = 0);
  }
  destroy() {
    this.mouseSelection && this.mouseSelection.destroy();
  }
}
function ca(n, e) {
  return (t, i) => {
    try {
      return e.call(n, i, t);
    } catch (r) {
      Se(t.state, r);
    }
  };
}
function t$(n) {
  let e = /* @__PURE__ */ Object.create(null);
  function t(i) {
    return e[i] || (e[i] = { observers: [], handlers: [] });
  }
  for (let i of n) {
    let r = i.spec, O = r && r.plugin.domEventHandlers, s = r && r.plugin.domEventObservers;
    if (O)
      for (let a in O) {
        let o = O[a];
        o && t(a).handlers.push(ca(i.value, o));
      }
    if (s)
      for (let a in s) {
        let o = s[a];
        o && t(a).observers.push(ca(i.value, o));
      }
  }
  for (let i in We)
    t(i).handlers.push(We[i]);
  for (let i in Re)
    t(i).observers.push(Re[i]);
  return e;
}
const ic = [
  { key: "Backspace", keyCode: 8, inputType: "deleteContentBackward" },
  { key: "Enter", keyCode: 13, inputType: "insertParagraph" },
  { key: "Enter", keyCode: 13, inputType: "insertLineBreak" },
  { key: "Delete", keyCode: 46, inputType: "deleteContentForward" }
], i$ = "dthko", nc = [16, 17, 18, 20, 91, 92, 224, 225], an = 6;
function on(n) {
  return Math.max(0, n) * 0.7 + 8;
}
function n$(n, e) {
  return Math.max(Math.abs(n.clientX - e.clientX), Math.abs(n.clientY - e.clientY));
}
class r$ {
  constructor(e, t, i, r) {
    this.view = e, this.startEvent = t, this.style = i, this.mustSelect = r, this.scrollSpeed = { x: 0, y: 0 }, this.scrolling = -1, this.lastEvent = t, this.scrollParents = Ou(e.contentDOM), this.atoms = e.state.facet(Fi).map((s) => s(e));
    let O = e.contentDOM.ownerDocument;
    O.addEventListener("mousemove", this.move = this.move.bind(this)), O.addEventListener("mouseup", this.up = this.up.bind(this)), this.extend = t.shiftKey, this.multiple = e.state.facet(q.allowMultipleSelections) && O$(e, t), this.dragging = a$(e, t) && sc(t) == 1 ? null : !1;
  }
  start(e) {
    this.dragging === !1 && this.select(e);
  }
  move(e) {
    if (e.buttons == 0)
      return this.destroy();
    if (this.dragging || this.dragging == null && n$(this.startEvent, e) < 10)
      return;
    this.select(this.lastEvent = e);
    let t = 0, i = 0, r = 0, O = 0, s = this.view.win.innerWidth, a = this.view.win.innerHeight;
    this.scrollParents.x && ({ left: r, right: s } = this.scrollParents.x.getBoundingClientRect()), this.scrollParents.y && ({ top: O, bottom: a } = this.scrollParents.y.getBoundingClientRect());
    let o = ls(this.view);
    e.clientX - o.left <= r + an ? t = -on(r - e.clientX) : e.clientX + o.right >= s - an && (t = on(e.clientX - s)), e.clientY - o.top <= O + an ? i = -on(O - e.clientY) : e.clientY + o.bottom >= a - an && (i = on(e.clientY - a)), this.setScrollSpeed(t, i);
  }
  up(e) {
    this.dragging == null && this.select(this.lastEvent), this.dragging || e.preventDefault(), this.destroy();
  }
  destroy() {
    this.setScrollSpeed(0, 0);
    let e = this.view.contentDOM.ownerDocument;
    e.removeEventListener("mousemove", this.move), e.removeEventListener("mouseup", this.up), this.view.inputState.mouseSelection = this.view.inputState.draggedContent = null;
  }
  setScrollSpeed(e, t) {
    this.scrollSpeed = { x: e, y: t }, e || t ? this.scrolling < 0 && (this.scrolling = setInterval(() => this.scroll(), 50)) : this.scrolling > -1 && (clearInterval(this.scrolling), this.scrolling = -1);
  }
  scroll() {
    let { x: e, y: t } = this.scrollSpeed;
    e && this.scrollParents.x && (this.scrollParents.x.scrollLeft += e, e = 0), t && this.scrollParents.y && (this.scrollParents.y.scrollTop += t, t = 0), (e || t) && this.view.win.scrollBy(e, t), this.dragging === !1 && this.select(this.lastEvent);
  }
  select(e) {
    let { view: t } = this, i = Hl(this.atoms, this.style.get(e, this.extend, this.multiple));
    (this.mustSelect || !i.eq(t.state.selection, this.dragging === !1)) && this.view.dispatch({
      selection: i,
      userEvent: "select.pointer"
    }), this.mustSelect = !1;
  }
  update(e) {
    e.transactions.some((t) => t.isUserEvent("input.type")) ? this.destroy() : this.style.update(e) && setTimeout(() => this.select(this.lastEvent), 20);
  }
}
function O$(n, e) {
  let t = n.state.facet(Wl);
  return t.length ? t[0](e) : b.mac ? e.metaKey : e.ctrlKey;
}
function s$(n, e) {
  let t = n.state.facet(ql);
  return t.length ? t[0](e) : b.mac ? !e.altKey : !e.ctrlKey;
}
function a$(n, e) {
  let { main: t } = n.state.selection;
  if (t.empty)
    return !1;
  let i = ii(n.root);
  if (!i || i.rangeCount == 0)
    return !0;
  let r = i.getRangeAt(0).getClientRects();
  for (let O = 0; O < r.length; O++) {
    let s = r[O];
    if (s.left <= e.clientX && s.right >= e.clientX && s.top <= e.clientY && s.bottom >= e.clientY)
      return !0;
  }
  return !1;
}
function o$(n, e) {
  if (!e.bubbles)
    return !0;
  if (e.defaultPrevented)
    return !1;
  for (let t = e.target, i; t != n.contentDOM; t = t.parentNode)
    if (!t || t.nodeType == 11 || (i = K.get(t)) && i.isWidget() && !i.isHidden && i.widget.ignoreEvent(e))
      return !1;
  return !0;
}
const We = /* @__PURE__ */ Object.create(null), Re = /* @__PURE__ */ Object.create(null), rc = b.ie && b.ie_version < 15 || b.ios && b.webkit_version < 604;
function l$(n) {
  let e = n.dom.parentNode;
  if (!e)
    return;
  let t = e.appendChild(document.createElement("textarea"));
  t.style.cssText = "position: fixed; left: -10000px; top: 10px", t.focus(), setTimeout(() => {
    n.focus(), t.remove(), Oc(n, t.value);
  }, 50);
}
function ar(n, e, t) {
  for (let i of n.facet(e))
    t = i(t, n);
  return t;
}
function Oc(n, e) {
  e = ar(n.state, Os, e);
  let { state: t } = n, i, r = 1, O = t.toText(e), s = O.lines == t.selection.ranges.length;
  if (wO != null && t.selection.ranges.every((o) => o.empty) && wO == O.toString()) {
    let o = -1;
    i = t.changeByRange((l) => {
      let c = t.doc.lineAt(l.from);
      if (c.from == o)
        return { range: l };
      o = c.from;
      let h = t.toText((s ? O.line(r++).text : e) + t.lineBreak);
      return {
        changes: { from: c.from, insert: h },
        range: S.cursor(l.from + h.length)
      };
    });
  } else s ? i = t.changeByRange((o) => {
    let l = O.line(r++);
    return {
      changes: { from: o.from, to: o.to, insert: l.text },
      range: S.cursor(o.from + l.length)
    };
  }) : i = t.replaceSelection(O);
  n.dispatch(i, {
    userEvent: "input.paste",
    scrollIntoView: !0
  });
}
Re.scroll = (n) => {
  n.inputState.lastScrollTop = n.scrollDOM.scrollTop, n.inputState.lastScrollLeft = n.scrollDOM.scrollLeft;
};
We.keydown = (n, e) => (n.inputState.setSelectionOrigin("select"), e.keyCode == 27 && n.inputState.tabFocusMode != 0 && (n.inputState.tabFocusMode = Date.now() + 2e3), !1);
Re.touchstart = (n, e) => {
  n.inputState.lastTouchTime = Date.now(), n.inputState.setSelectionOrigin("select.pointer");
};
Re.touchmove = (n) => {
  n.inputState.setSelectionOrigin("select.pointer");
};
We.mousedown = (n, e) => {
  if (n.observer.flush(), n.inputState.lastTouchTime > Date.now() - 2e3)
    return !1;
  let t = null;
  for (let i of n.state.facet(Cl))
    if (t = i(n, e), t)
      break;
  if (!t && e.button == 0 && (t = h$(n, e)), t) {
    let i = !n.hasFocus;
    n.inputState.startMouseSelection(new r$(n, e, t, i)), i && n.observer.ignore(() => {
      kl(n.contentDOM);
      let O = n.root.activeElement;
      O && !O.contains(n.contentDOM) && O.blur();
    });
    let r = n.inputState.mouseSelection;
    if (r)
      return r.start(e), r.dragging === !1;
  } else
    n.inputState.setSelectionOrigin("select.pointer");
  return !1;
};
function ha(n, e, t, i) {
  if (i == 1)
    return S.cursor(e, t);
  if (i == 2)
    return Gu(n.state, e, t);
  {
    let r = n.docView.lineAt(e, t), O = n.state.doc.lineAt(r ? r.posAtEnd : e), s = r ? r.posAtStart : O.from, a = r ? r.posAtEnd : O.to;
    return a < n.state.doc.length && a == O.to && a++, S.range(s, a);
  }
}
const c$ = b.ie && b.ie_version <= 11;
let fa = null, ua = 0, $a = 0;
function sc(n) {
  if (!c$)
    return n.detail;
  let e = fa, t = $a;
  return fa = n, $a = Date.now(), ua = !e || t > Date.now() - 400 && Math.abs(e.clientX - n.clientX) < 2 && Math.abs(e.clientY - n.clientY) < 2 ? (ua + 1) % 3 : 1;
}
function h$(n, e) {
  let t = n.posAndSideAtCoords({ x: e.clientX, y: e.clientY }, !1), i = sc(e), r = n.state.selection;
  return {
    update(O) {
      O.docChanged && (t.pos = O.changes.mapPos(t.pos), r = r.map(O.changes));
    },
    get(O, s, a) {
      let o = n.posAndSideAtCoords({ x: O.clientX, y: O.clientY }, !1), l, c = ha(n, o.pos, o.assoc, i);
      if (t.pos != o.pos && !s) {
        let h = ha(n, t.pos, t.assoc, i), f = Math.min(h.from, c.from), u = Math.max(h.to, c.to);
        c = f < c.from ? S.range(f, u) : S.range(u, f);
      }
      return s ? r.replaceRange(r.main.extend(c.from, c.to)) : a && i == 1 && r.ranges.length > 1 && (l = f$(r, o.pos)) ? l : a ? r.addRange(c) : S.create([c]);
    }
  };
}
function f$(n, e) {
  for (let t = 0; t < n.ranges.length; t++) {
    let { from: i, to: r } = n.ranges[t];
    if (i <= e && r >= e)
      return S.create(n.ranges.slice(0, t).concat(n.ranges.slice(t + 1)), n.mainIndex == t ? 0 : n.mainIndex - (n.mainIndex > t ? 1 : 0));
  }
  return null;
}
We.dragstart = (n, e) => {
  let { selection: { main: t } } = n.state;
  if (e.target.draggable) {
    let r = n.docView.tile.nearest(e.target);
    if (r && r.isWidget()) {
      let O = r.posAtStart, s = O + r.length;
      (O >= t.to || s <= t.from) && (t = S.range(O, s));
    }
  }
  let { inputState: i } = n;
  return i.mouseSelection && (i.mouseSelection.dragging = !0), i.draggedContent = t, e.dataTransfer && (e.dataTransfer.setData("Text", ar(n.state, ss, n.state.sliceDoc(t.from, t.to))), e.dataTransfer.effectAllowed = "copyMove"), !1;
};
We.dragend = (n) => (n.inputState.draggedContent = null, !1);
function da(n, e, t, i) {
  if (t = ar(n.state, Os, t), !t)
    return;
  let r = n.posAtCoords({ x: e.clientX, y: e.clientY }, !1), { draggedContent: O } = n.inputState, s = i && O && s$(n, e) ? { from: O.from, to: O.to } : null, a = { from: r, insert: t }, o = n.state.changes(s ? [s, a] : a);
  n.focus(), n.dispatch({
    changes: o,
    selection: { anchor: o.mapPos(r, -1), head: o.mapPos(r, 1) },
    userEvent: s ? "move.drop" : "input.drop"
  }), n.inputState.draggedContent = null;
}
We.drop = (n, e) => {
  if (!e.dataTransfer)
    return !1;
  if (n.state.readOnly)
    return !0;
  let t = e.dataTransfer.files;
  if (t && t.length) {
    let i = Array(t.length), r = 0, O = () => {
      ++r == t.length && da(n, e, i.filter((s) => s != null).join(n.state.lineBreak), !1);
    };
    for (let s = 0; s < t.length; s++) {
      let a = new FileReader();
      a.onerror = O, a.onload = () => {
        /[\x00-\x08\x0e-\x1f]{2}/.test(a.result) || (i[s] = a.result), O();
      }, a.readAsText(t[s]);
    }
    return !0;
  } else {
    let i = e.dataTransfer.getData("Text");
    if (i)
      return da(n, e, i, !0), !0;
  }
  return !1;
};
We.paste = (n, e) => {
  if (n.state.readOnly)
    return !0;
  n.observer.flush();
  let t = rc ? null : e.clipboardData;
  return t ? (Oc(n, t.getData("text/plain") || t.getData("text/uri-list")), !0) : (l$(n), !1);
};
function u$(n, e) {
  let t = n.dom.parentNode;
  if (!t)
    return;
  let i = t.appendChild(document.createElement("textarea"));
  i.style.cssText = "position: fixed; left: -10000px; top: 10px", i.value = e, i.focus(), i.selectionEnd = e.length, i.selectionStart = 0, setTimeout(() => {
    i.remove(), n.focus();
  }, 50);
}
function $$(n) {
  let e = [], t = [], i = !1;
  for (let r of n.selection.ranges)
    r.empty || (e.push(n.sliceDoc(r.from, r.to)), t.push(r));
  if (!e.length) {
    let r = -1;
    for (let { from: O } of n.selection.ranges) {
      let s = n.doc.lineAt(O);
      s.number > r && (e.push(s.text), t.push({ from: s.from, to: Math.min(n.doc.length, s.to + 1) })), r = s.number;
    }
    i = !0;
  }
  return { text: ar(n, ss, e.join(n.lineBreak)), ranges: t, linewise: i };
}
let wO = null;
We.copy = We.cut = (n, e) => {
  let t = ii(n.root);
  if (t && !Xi(n.contentDOM, t))
    return !1;
  let { text: i, ranges: r, linewise: O } = $$(n.state);
  if (!i && !O)
    return !1;
  wO = O ? i : null, e.type == "cut" && !n.state.readOnly && n.dispatch({
    changes: r,
    scrollIntoView: !0,
    userEvent: "delete.cut"
  });
  let s = rc ? null : e.clipboardData;
  return s ? (s.clearData(), s.setData("text/plain", i), !0) : (u$(n, i), !1);
};
const ac = /* @__PURE__ */ lt.define();
function oc(n, e) {
  let t = [];
  for (let i of n.facet(Gl)) {
    let r = i(n, e);
    r && t.push(r);
  }
  return t.length ? n.update({ effects: t, annotations: ac.of(!0) }) : null;
}
function lc(n) {
  setTimeout(() => {
    let e = n.hasFocus;
    if (e != n.inputState.notifiedFocused) {
      let t = oc(n.state, e);
      t ? n.dispatch(t) : n.update([]);
    }
  }, 10);
}
Re.focus = (n) => {
  n.inputState.lastFocusTime = Date.now(), !n.scrollDOM.scrollTop && (n.inputState.lastScrollTop || n.inputState.lastScrollLeft) && (n.scrollDOM.scrollTop = n.inputState.lastScrollTop, n.scrollDOM.scrollLeft = n.inputState.lastScrollLeft), lc(n);
};
Re.blur = (n) => {
  n.observer.clearSelectionRange(), lc(n);
};
Re.compositionstart = Re.compositionupdate = (n) => {
  n.observer.editContext || (n.inputState.compositionFirstChange == null && (n.inputState.compositionFirstChange = !0), n.inputState.composing < 0 && (n.inputState.composing = 0));
};
Re.compositionend = (n) => {
  n.observer.editContext || (n.inputState.composing = -1, n.inputState.compositionEndedAt = Date.now(), n.inputState.compositionPendingKey = !0, n.inputState.compositionPendingChange = n.observer.pendingRecords().length > 0, n.inputState.compositionFirstChange = null, b.chrome && b.android ? n.observer.flushSoon() : n.inputState.compositionPendingChange ? Promise.resolve().then(() => n.observer.flush()) : setTimeout(() => {
    n.inputState.composing < 0 && n.docView.hasComposition && n.update([]);
  }, 50));
};
Re.contextmenu = (n) => {
  n.inputState.lastContextMenu = Date.now();
};
We.beforeinput = (n, e) => {
  var t, i;
  if ((e.inputType == "insertText" || e.inputType == "insertCompositionText") && (n.inputState.insertingText = e.data, n.inputState.insertingTextAt = Date.now()), e.inputType == "insertReplacementText" && n.observer.editContext) {
    let O = (t = e.dataTransfer) === null || t === void 0 ? void 0 : t.getData("text/plain"), s = e.getTargetRanges();
    if (O && s.length) {
      let a = s[0], o = n.posAtDOM(a.startContainer, a.startOffset), l = n.posAtDOM(a.endContainer, a.endOffset);
      return cs(n, { from: o, to: l, insert: n.state.toText(O) }, null), !0;
    }
  }
  let r;
  if (b.chrome && b.android && (r = ic.find((O) => O.inputType == e.inputType)) && (n.observer.delayAndroidKey(r.key, r.keyCode), r.key == "Backspace" || r.key == "Delete")) {
    let O = ((i = window.visualViewport) === null || i === void 0 ? void 0 : i.height) || 0;
    setTimeout(() => {
      var s;
      (((s = window.visualViewport) === null || s === void 0 ? void 0 : s.height) || 0) > O + 10 && n.hasFocus && (n.contentDOM.blur(), n.focus());
    }, 100);
  }
  return b.ios && e.inputType == "deleteContentForward" && n.observer.flushSoon(), b.safari && e.inputType == "insertText" && n.inputState.composing >= 0 && setTimeout(() => Re.compositionend(n, e), 20), !1;
};
const pa = /* @__PURE__ */ new Set();
function d$(n) {
  pa.has(n) || (pa.add(n), n.addEventListener("copy", () => {
  }), n.addEventListener("cut", () => {
  }));
}
const Qa = ["pre-wrap", "normal", "pre-line", "break-spaces"];
let Oi = !1;
function ma() {
  Oi = !1;
}
class p$ {
  constructor(e) {
    this.lineWrapping = e, this.doc = W.empty, this.heightSamples = {}, this.lineHeight = 14, this.charWidth = 7, this.textHeight = 14, this.lineLength = 30;
  }
  heightForGap(e, t) {
    let i = this.doc.lineAt(t).number - this.doc.lineAt(e).number + 1;
    return this.lineWrapping && (i += Math.max(0, Math.ceil((t - e - i * this.lineLength * 0.5) / this.lineLength))), this.lineHeight * i;
  }
  heightForLine(e) {
    return this.lineWrapping ? (1 + Math.max(0, Math.ceil((e - this.lineLength) / Math.max(1, this.lineLength - 5)))) * this.lineHeight : this.lineHeight;
  }
  setDoc(e) {
    return this.doc = e, this;
  }
  mustRefreshForWrapping(e) {
    return Qa.indexOf(e) > -1 != this.lineWrapping;
  }
  mustRefreshForHeights(e) {
    let t = !1;
    for (let i = 0; i < e.length; i++) {
      let r = e[i];
      r < 0 ? i++ : this.heightSamples[Math.floor(r * 10)] || (t = !0, this.heightSamples[Math.floor(r * 10)] = !0);
    }
    return t;
  }
  refresh(e, t, i, r, O, s) {
    let a = Qa.indexOf(e) > -1, o = Math.abs(t - this.lineHeight) > 0.3 || this.lineWrapping != a || Math.abs(i - this.charWidth) > 0.1;
    if (this.lineWrapping = a, this.lineHeight = t, this.charWidth = i, this.textHeight = r, this.lineLength = O, o) {
      this.heightSamples = {};
      for (let l = 0; l < s.length; l++) {
        let c = s[l];
        c < 0 ? l++ : this.heightSamples[Math.floor(c * 10)] = !0;
      }
    }
    return o;
  }
}
class Q$ {
  constructor(e, t) {
    this.from = e, this.heights = t, this.index = 0;
  }
  get more() {
    return this.index < this.heights.length;
  }
}
class _e {
  /**
  @internal
  */
  constructor(e, t, i, r, O) {
    this.from = e, this.length = t, this.top = i, this.height = r, this._content = O;
  }
  /**
  The type of element this is. When querying lines, this may be
  an array of all the blocks that make up the line.
  */
  get type() {
    return typeof this._content == "number" ? pe.Text : Array.isArray(this._content) ? this._content : this._content.type;
  }
  /**
  The end of the element as a document position.
  */
  get to() {
    return this.from + this.length;
  }
  /**
  The bottom position of the element.
  */
  get bottom() {
    return this.top + this.height;
  }
  /**
  If this is a widget block, this will return the widget
  associated with it.
  */
  get widget() {
    return this._content instanceof Vt ? this._content.widget : null;
  }
  /**
  If this is a textblock, this holds the number of line breaks
  that appear in widgets inside the block.
  */
  get widgetLineBreaks() {
    return typeof this._content == "number" ? this._content : 0;
  }
  /**
  @internal
  */
  join(e) {
    let t = (Array.isArray(this._content) ? this._content : [this]).concat(Array.isArray(e._content) ? e._content : [e]);
    return new _e(this.from, this.length + e.length, this.top, this.height + e.height, t);
  }
}
var M = /* @__PURE__ */ (function(n) {
  return n[n.ByPos = 0] = "ByPos", n[n.ByHeight = 1] = "ByHeight", n[n.ByPosNoHeight = 2] = "ByPosNoHeight", n;
})(M || (M = {}));
const yn = 1e-3;
class ce {
  constructor(e, t, i = 2) {
    this.length = e, this.height = t, this.flags = i;
  }
  get outdated() {
    return (this.flags & 2) > 0;
  }
  set outdated(e) {
    this.flags = (e ? 2 : 0) | this.flags & -3;
  }
  setHeight(e) {
    this.height != e && (Math.abs(this.height - e) > yn && (Oi = !0), this.height = e);
  }
  // Base case is to replace a leaf node, which simply builds a tree
  // from the new nodes and returns that (HeightMapBranch and
  // HeightMapGap override this to actually use from/to)
  replace(e, t, i) {
    return ce.of(i);
  }
  // Again, these are base cases, and are overridden for branch and gap nodes.
  decomposeLeft(e, t) {
    t.push(this);
  }
  decomposeRight(e, t) {
    t.push(this);
  }
  applyChanges(e, t, i, r) {
    let O = this, s = i.doc;
    for (let a = r.length - 1; a >= 0; a--) {
      let { fromA: o, toA: l, fromB: c, toB: h } = r[a], f = O.lineAt(o, M.ByPosNoHeight, i.setDoc(t), 0, 0), u = f.to >= l ? f : O.lineAt(l, M.ByPosNoHeight, i, 0, 0);
      for (h += u.to - l, l = u.to; a > 0 && f.from <= r[a - 1].toA; )
        o = r[a - 1].fromA, c = r[a - 1].fromB, a--, o < f.from && (f = O.lineAt(o, M.ByPosNoHeight, i, 0, 0));
      c += f.from - o, o = f.from;
      let d = hs.build(i.setDoc(s), e, c, h);
      O = Cn(O, O.replace(o, l, d));
    }
    return O.updateHeight(i, 0);
  }
  static empty() {
    return new ge(0, 0, 0);
  }
  // nodes uses null values to indicate the position of line breaks.
  // There are never line breaks at the start or end of the array, or
  // two line breaks next to each other, and the array isn't allowed
  // to be empty (same restrictions as return value from the builder).
  static of(e) {
    if (e.length == 1)
      return e[0];
    let t = 0, i = e.length, r = 0, O = 0;
    for (; ; )
      if (t == i)
        if (r > O * 2) {
          let a = e[t - 1];
          a.break ? e.splice(--t, 1, a.left, null, a.right) : e.splice(--t, 1, a.left, a.right), i += 1 + a.break, r -= a.size;
        } else if (O > r * 2) {
          let a = e[i];
          a.break ? e.splice(i, 1, a.left, null, a.right) : e.splice(i, 1, a.left, a.right), i += 2 + a.break, O -= a.size;
        } else
          break;
      else if (r < O) {
        let a = e[t++];
        a && (r += a.size);
      } else {
        let a = e[--i];
        a && (O += a.size);
      }
    let s = 0;
    return e[t - 1] == null ? (s = 1, t--) : e[t] == null && (s = 1, i++), new g$(ce.of(e.slice(0, t)), s, ce.of(e.slice(i)));
  }
}
function Cn(n, e) {
  return n == e ? n : (n.constructor != e.constructor && (Oi = !0), e);
}
ce.prototype.size = 1;
const m$ = /* @__PURE__ */ Y.replace({});
class cc extends ce {
  constructor(e, t, i) {
    super(e, t), this.deco = i, this.spaceAbove = 0;
  }
  mainBlock(e, t) {
    return new _e(t, this.length, e + this.spaceAbove, this.height - this.spaceAbove, this.deco || 0);
  }
  blockAt(e, t, i, r) {
    return this.spaceAbove && e < i + this.spaceAbove ? new _e(r, 0, i, this.spaceAbove, m$) : this.mainBlock(i, r);
  }
  lineAt(e, t, i, r, O) {
    let s = this.mainBlock(r, O);
    return this.spaceAbove ? this.blockAt(0, i, r, O).join(s) : s;
  }
  forEachLine(e, t, i, r, O, s) {
    e <= O + this.length && t >= O && s(this.lineAt(0, M.ByPos, i, r, O));
  }
  setMeasuredHeight(e) {
    let t = e.heights[e.index++];
    t < 0 ? (this.spaceAbove = -t, t = e.heights[e.index++]) : this.spaceAbove = 0, this.setHeight(t);
  }
  updateHeight(e, t = 0, i = !1, r) {
    return r && r.from <= t && r.more && this.setMeasuredHeight(r), this.outdated = !1, this;
  }
  toString() {
    return `block(${this.length})`;
  }
}
class ge extends cc {
  constructor(e, t, i) {
    super(e, t, null), this.collapsed = 0, this.widgetHeight = 0, this.breaks = 0, this.spaceAbove = i;
  }
  mainBlock(e, t) {
    return new _e(t, this.length, e + this.spaceAbove, this.height - this.spaceAbove, this.breaks);
  }
  replace(e, t, i) {
    let r = i[0];
    return i.length == 1 && (r instanceof ge || r instanceof ne && r.flags & 4) && Math.abs(this.length - r.length) < 10 ? (r instanceof ne ? r = new ge(r.length, this.height, this.spaceAbove) : r.height = this.height, this.outdated || (r.outdated = !1), r) : ce.of(i);
  }
  updateHeight(e, t = 0, i = !1, r) {
    return r && r.from <= t && r.more ? this.setMeasuredHeight(r) : (i || this.outdated) && (this.spaceAbove = 0, this.setHeight(Math.max(this.widgetHeight, e.heightForLine(this.length - this.collapsed)) + this.breaks * e.lineHeight)), this.outdated = !1, this;
  }
  toString() {
    return `line(${this.length}${this.collapsed ? -this.collapsed : ""}${this.widgetHeight ? ":" + this.widgetHeight : ""})`;
  }
}
class ne extends ce {
  constructor(e) {
    super(e, 0);
  }
  heightMetrics(e, t) {
    let i = e.doc.lineAt(t).number, r = e.doc.lineAt(t + this.length).number, O = r - i + 1, s, a = 0;
    if (e.lineWrapping) {
      let o = Math.min(this.height, e.lineHeight * O);
      s = o / O, this.length > O + 1 && (a = (this.height - o) / (this.length - O - 1));
    } else
      s = this.height / O;
    return { firstLine: i, lastLine: r, perLine: s, perChar: a };
  }
  blockAt(e, t, i, r) {
    let { firstLine: O, lastLine: s, perLine: a, perChar: o } = this.heightMetrics(t, r);
    if (t.lineWrapping) {
      let l = r + (e < t.lineHeight ? 0 : Math.round(Math.max(0, Math.min(1, (e - i) / this.height)) * this.length)), c = t.doc.lineAt(l), h = a + c.length * o, f = Math.max(i, e - h / 2);
      return new _e(c.from, c.length, f, h, 0);
    } else {
      let l = Math.max(0, Math.min(s - O, Math.floor((e - i) / a))), { from: c, length: h } = t.doc.line(O + l);
      return new _e(c, h, i + a * l, a, 0);
    }
  }
  lineAt(e, t, i, r, O) {
    if (t == M.ByHeight)
      return this.blockAt(e, i, r, O);
    if (t == M.ByPosNoHeight) {
      let { from: u, to: d } = i.doc.lineAt(e);
      return new _e(u, d - u, 0, 0, 0);
    }
    let { firstLine: s, perLine: a, perChar: o } = this.heightMetrics(i, O), l = i.doc.lineAt(e), c = a + l.length * o, h = l.number - s, f = r + a * h + o * (l.from - O - h);
    return new _e(l.from, l.length, Math.max(r, Math.min(f, r + this.height - c)), c, 0);
  }
  forEachLine(e, t, i, r, O, s) {
    e = Math.max(e, O), t = Math.min(t, O + this.length);
    let { firstLine: a, perLine: o, perChar: l } = this.heightMetrics(i, O);
    for (let c = e, h = r; c <= t; ) {
      let f = i.doc.lineAt(c);
      if (c == e) {
        let d = f.number - a;
        h += o * d + l * (e - O - d);
      }
      let u = o + l * f.length;
      s(new _e(f.from, f.length, h, u, 0)), h += u, c = f.to + 1;
    }
  }
  replace(e, t, i) {
    let r = this.length - t;
    if (r > 0) {
      let O = i[i.length - 1];
      O instanceof ne ? i[i.length - 1] = new ne(O.length + r) : i.push(null, new ne(r - 1));
    }
    if (e > 0) {
      let O = i[0];
      O instanceof ne ? i[0] = new ne(e + O.length) : i.unshift(new ne(e - 1), null);
    }
    return ce.of(i);
  }
  decomposeLeft(e, t) {
    t.push(new ne(e - 1), null);
  }
  decomposeRight(e, t) {
    t.push(null, new ne(this.length - e - 1));
  }
  updateHeight(e, t = 0, i = !1, r) {
    let O = t + this.length;
    if (r && r.from <= t + this.length && r.more) {
      let s = [], a = Math.max(t, r.from), o = -1;
      for (r.from > t && s.push(new ne(r.from - t - 1).updateHeight(e, t)); a <= O && r.more; ) {
        let c = e.doc.lineAt(a).length;
        s.length && s.push(null);
        let h = r.heights[r.index++], f = 0;
        h < 0 && (f = -h, h = r.heights[r.index++]), o == -1 ? o = h : Math.abs(h - o) >= yn && (o = -2);
        let u = new ge(c, h, f);
        u.outdated = !1, s.push(u), a += c + 1;
      }
      a <= O && s.push(null, new ne(O - a).updateHeight(e, a));
      let l = ce.of(s);
      return (o < 0 || Math.abs(l.height - this.height) >= yn || Math.abs(o - this.heightMetrics(e, t).perLine) >= yn) && (Oi = !0), Cn(this, l);
    } else (i || this.outdated) && (this.setHeight(e.heightForGap(t, t + this.length)), this.outdated = !1);
    return this;
  }
  toString() {
    return `gap(${this.length})`;
  }
}
class g$ extends ce {
  constructor(e, t, i) {
    super(e.length + t + i.length, e.height + i.height, t | (e.outdated || i.outdated ? 2 : 0)), this.left = e, this.right = i, this.size = e.size + i.size;
  }
  get break() {
    return this.flags & 1;
  }
  blockAt(e, t, i, r) {
    let O = i + this.left.height;
    return e < O ? this.left.blockAt(e, t, i, r) : this.right.blockAt(e, t, O, r + this.left.length + this.break);
  }
  lineAt(e, t, i, r, O) {
    let s = r + this.left.height, a = O + this.left.length + this.break, o = t == M.ByHeight ? e < s : e < a, l = o ? this.left.lineAt(e, t, i, r, O) : this.right.lineAt(e, t, i, s, a);
    if (this.break || (o ? l.to < a : l.from > a))
      return l;
    let c = t == M.ByPosNoHeight ? M.ByPosNoHeight : M.ByPos;
    return o ? l.join(this.right.lineAt(a, c, i, s, a)) : this.left.lineAt(a, c, i, r, O).join(l);
  }
  forEachLine(e, t, i, r, O, s) {
    let a = r + this.left.height, o = O + this.left.length + this.break;
    if (this.break)
      e < o && this.left.forEachLine(e, t, i, r, O, s), t >= o && this.right.forEachLine(e, t, i, a, o, s);
    else {
      let l = this.lineAt(o, M.ByPos, i, r, O);
      e < l.from && this.left.forEachLine(e, l.from - 1, i, r, O, s), l.to >= e && l.from <= t && s(l), t > l.to && this.right.forEachLine(l.to + 1, t, i, a, o, s);
    }
  }
  replace(e, t, i) {
    let r = this.left.length + this.break;
    if (t < r)
      return this.balanced(this.left.replace(e, t, i), this.right);
    if (e > this.left.length)
      return this.balanced(this.left, this.right.replace(e - r, t - r, i));
    let O = [];
    e > 0 && this.decomposeLeft(e, O);
    let s = O.length;
    for (let a of i)
      O.push(a);
    if (e > 0 && ga(O, s - 1), t < this.length) {
      let a = O.length;
      this.decomposeRight(t, O), ga(O, a);
    }
    return ce.of(O);
  }
  decomposeLeft(e, t) {
    let i = this.left.length;
    if (e <= i)
      return this.left.decomposeLeft(e, t);
    t.push(this.left), this.break && (i++, e >= i && t.push(null)), e > i && this.right.decomposeLeft(e - i, t);
  }
  decomposeRight(e, t) {
    let i = this.left.length, r = i + this.break;
    if (e >= r)
      return this.right.decomposeRight(e - r, t);
    e < i && this.left.decomposeRight(e, t), this.break && e < r && t.push(null), t.push(this.right);
  }
  balanced(e, t) {
    return e.size > 2 * t.size || t.size > 2 * e.size ? ce.of(this.break ? [e, null, t] : [e, t]) : (this.left = Cn(this.left, e), this.right = Cn(this.right, t), this.setHeight(e.height + t.height), this.outdated = e.outdated || t.outdated, this.size = e.size + t.size, this.length = e.length + this.break + t.length, this);
  }
  updateHeight(e, t = 0, i = !1, r) {
    let { left: O, right: s } = this, a = t + O.length + this.break, o = null;
    return r && r.from <= t + O.length && r.more ? o = O = O.updateHeight(e, t, i, r) : O.updateHeight(e, t, i), r && r.from <= a + s.length && r.more ? o = s = s.updateHeight(e, a, i, r) : s.updateHeight(e, a, i), o ? this.balanced(O, s) : (this.height = this.left.height + this.right.height, this.outdated = !1, this);
  }
  toString() {
    return this.left + (this.break ? " " : "-") + this.right;
  }
}
function ga(n, e) {
  let t, i;
  n[e] == null && (t = n[e - 1]) instanceof ne && (i = n[e + 1]) instanceof ne && n.splice(e - 1, 3, new ne(t.length + 1 + i.length));
}
const S$ = 5;
class hs {
  constructor(e, t) {
    this.pos = e, this.oracle = t, this.nodes = [], this.lineStart = -1, this.lineEnd = -1, this.covering = null, this.writtenTo = e;
  }
  get isCovered() {
    return this.covering && this.nodes[this.nodes.length - 1] == this.covering;
  }
  span(e, t) {
    if (this.lineStart > -1) {
      let i = Math.min(t, this.lineEnd), r = this.nodes[this.nodes.length - 1];
      r instanceof ge ? r.length += i - this.pos : (i > this.pos || !this.isCovered) && this.nodes.push(new ge(i - this.pos, -1, 0)), this.writtenTo = i, t > i && (this.nodes.push(null), this.writtenTo++, this.lineStart = -1);
    }
    this.pos = t;
  }
  point(e, t, i) {
    if (e < t || i.heightRelevant) {
      let r = i.widget ? i.widget.estimatedHeight : 0, O = i.widget ? i.widget.lineBreaks : 0;
      r < 0 && (r = this.oracle.lineHeight);
      let s = t - e;
      i.block ? this.addBlock(new cc(s, r, i)) : (s || O || r >= S$) && this.addLineDeco(r, O, s);
    } else t > e && this.span(e, t);
    this.lineEnd > -1 && this.lineEnd < this.pos && (this.lineEnd = this.oracle.doc.lineAt(this.pos).to);
  }
  enterLine() {
    if (this.lineStart > -1)
      return;
    let { from: e, to: t } = this.oracle.doc.lineAt(this.pos);
    this.lineStart = e, this.lineEnd = t, this.writtenTo < e && ((this.writtenTo < e - 1 || this.nodes[this.nodes.length - 1] == null) && this.nodes.push(this.blankContent(this.writtenTo, e - 1)), this.nodes.push(null)), this.pos > e && this.nodes.push(new ge(this.pos - e, -1, 0)), this.writtenTo = this.pos;
  }
  blankContent(e, t) {
    let i = new ne(t - e);
    return this.oracle.doc.lineAt(e).to == t && (i.flags |= 4), i;
  }
  ensureLine() {
    this.enterLine();
    let e = this.nodes.length ? this.nodes[this.nodes.length - 1] : null;
    if (e instanceof ge)
      return e;
    let t = new ge(0, -1, 0);
    return this.nodes.push(t), t;
  }
  addBlock(e) {
    this.enterLine();
    let t = e.deco;
    t && t.startSide > 0 && !this.isCovered && this.ensureLine(), this.nodes.push(e), this.writtenTo = this.pos = this.pos + e.length, t && t.endSide > 0 && (this.covering = e);
  }
  addLineDeco(e, t, i) {
    let r = this.ensureLine();
    r.length += i, r.collapsed += i, r.widgetHeight = Math.max(r.widgetHeight, e), r.breaks += t, this.writtenTo = this.pos = this.pos + i;
  }
  finish(e) {
    let t = this.nodes.length == 0 ? null : this.nodes[this.nodes.length - 1];
    this.lineStart > -1 && !(t instanceof ge) && !this.isCovered ? this.nodes.push(new ge(0, -1, 0)) : (this.writtenTo < this.pos || t == null) && this.nodes.push(this.blankContent(this.writtenTo, this.pos));
    let i = e;
    for (let r of this.nodes)
      r instanceof ge && r.updateHeight(this.oracle, i), i += r ? r.length : 1;
    return this.nodes;
  }
  // Always called with a region that on both sides either stretches
  // to a line break or the end of the document.
  // The returned array uses null to indicate line breaks, but never
  // starts or ends in a line break, or has multiple line breaks next
  // to each other.
  static build(e, t, i, r) {
    let O = new hs(i, e);
    return _.spans(t, i, r, O, 0), O.finish(i);
  }
}
function P$(n, e, t) {
  let i = new T$();
  return _.compare(n, e, t, i, 0), i.changes;
}
class T$ {
  constructor() {
    this.changes = [];
  }
  compareRange() {
  }
  comparePoint(e, t, i, r) {
    (e < t || i && i.heightRelevant || r && r.heightRelevant) && It(e, t, this.changes, 5);
  }
}
function y$(n, e) {
  let t = n.getBoundingClientRect(), i = n.ownerDocument, r = i.defaultView || window, O = Math.max(0, t.left), s = Math.min(r.innerWidth, t.right), a = Math.max(0, t.top), o = Math.min(r.innerHeight, t.bottom);
  for (let l = n.parentNode; l && l != i.body; )
    if (l.nodeType == 1) {
      let c = l, h = window.getComputedStyle(c);
      if ((c.scrollHeight > c.clientHeight || c.scrollWidth > c.clientWidth) && h.overflow != "visible") {
        let f = c.getBoundingClientRect();
        O = Math.max(O, f.left), s = Math.min(s, f.right), a = Math.max(a, f.top), o = Math.min(l == n.parentNode ? r.innerHeight : o, f.bottom);
      }
      l = h.position == "absolute" || h.position == "fixed" ? c.offsetParent : c.parentNode;
    } else if (l.nodeType == 11)
      l = l.host;
    else
      break;
  return {
    left: O - t.left,
    right: Math.max(O, s) - t.left,
    top: a - (t.top + e),
    bottom: Math.max(a, o) - (t.top + e)
  };
}
function b$(n) {
  let e = n.getBoundingClientRect(), t = n.ownerDocument.defaultView || window;
  return e.left < t.innerWidth && e.right > 0 && e.top < t.innerHeight && e.bottom > 0;
}
function w$(n, e) {
  let t = n.getBoundingClientRect();
  return {
    left: 0,
    right: t.right - t.left,
    top: e,
    bottom: t.bottom - (t.top + e)
  };
}
class wr {
  constructor(e, t, i, r) {
    this.from = e, this.to = t, this.size = i, this.displaySize = r;
  }
  static same(e, t) {
    if (e.length != t.length)
      return !1;
    for (let i = 0; i < e.length; i++) {
      let r = e[i], O = t[i];
      if (r.from != O.from || r.to != O.to || r.size != O.size)
        return !1;
    }
    return !0;
  }
  draw(e, t) {
    return Y.replace({
      widget: new x$(this.displaySize * (t ? e.scaleY : e.scaleX), t)
    }).range(this.from, this.to);
  }
}
class x$ extends Pt {
  constructor(e, t) {
    super(), this.size = e, this.vertical = t;
  }
  eq(e) {
    return e.size == this.size && e.vertical == this.vertical;
  }
  toDOM() {
    let e = document.createElement("div");
    return this.vertical ? e.style.height = this.size + "px" : (e.style.width = this.size + "px", e.style.height = "2px", e.style.display = "inline-block"), e;
  }
  get estimatedHeight() {
    return this.vertical ? this.size : -1;
  }
}
class Sa {
  constructor(e) {
    this.state = e, this.pixelViewport = { left: 0, right: window.innerWidth, top: 0, bottom: 0 }, this.inView = !0, this.paddingTop = 0, this.paddingBottom = 0, this.contentDOMWidth = 0, this.contentDOMHeight = 0, this.editorHeight = 0, this.editorWidth = 0, this.scrollTop = 0, this.scrolledToBottom = !1, this.scaleX = 1, this.scaleY = 1, this.scrollAnchorPos = 0, this.scrollAnchorHeight = -1, this.scaler = Pa, this.scrollTarget = null, this.printing = !1, this.mustMeasureContent = !0, this.defaultTextDirection = B.LTR, this.visibleRanges = [], this.mustEnforceCursorAssoc = !1;
    let t = e.facet(as).some((i) => typeof i != "function" && i.class == "cm-lineWrapping");
    this.heightOracle = new p$(t), this.stateDeco = Ta(e), this.heightMap = ce.empty().applyChanges(this.stateDeco, W.empty, this.heightOracle.setDoc(e.doc), [new ke(0, 0, 0, e.doc.length)]);
    for (let i = 0; i < 2 && (this.viewport = this.getViewport(0, null), !!this.updateForViewport()); i++)
      ;
    this.updateViewportLines(), this.lineGaps = this.ensureLineGaps([]), this.lineGapDeco = Y.set(this.lineGaps.map((i) => i.draw(this, !1))), this.computeVisibleRanges();
  }
  updateForViewport() {
    let e = [this.viewport], { main: t } = this.state.selection;
    for (let i = 0; i <= 1; i++) {
      let r = i ? t.head : t.anchor;
      if (!e.some(({ from: O, to: s }) => r >= O && r <= s)) {
        let { from: O, to: s } = this.lineBlockAt(r);
        e.push(new ln(O, s));
      }
    }
    return this.viewports = e.sort((i, r) => i.from - r.from), this.updateScaler();
  }
  updateScaler() {
    let e = this.scaler;
    return this.scaler = this.heightMap.height <= 7e6 ? Pa : new fs(this.heightOracle, this.heightMap, this.viewports), e.eq(this.scaler) ? 0 : 2;
  }
  updateViewportLines() {
    this.viewportLines = [], this.heightMap.forEachLine(this.viewport.from, this.viewport.to, this.heightOracle.setDoc(this.state.doc), 0, 0, (e) => {
      this.viewportLines.push(bi(e, this.scaler));
    });
  }
  update(e, t = null) {
    this.state = e.state;
    let i = this.stateDeco;
    this.stateDeco = Ta(this.state);
    let r = e.changedRanges, O = ke.extendWithRanges(r, P$(i, this.stateDeco, e ? e.changes : J.empty(this.state.doc.length))), s = this.heightMap.height, a = this.scrolledToBottom ? null : this.scrollAnchorAt(this.scrollTop);
    ma(), this.heightMap = this.heightMap.applyChanges(this.stateDeco, e.startState.doc, this.heightOracle.setDoc(this.state.doc), O), (this.heightMap.height != s || Oi) && (e.flags |= 2), a ? (this.scrollAnchorPos = e.changes.mapPos(a.from, -1), this.scrollAnchorHeight = a.top) : (this.scrollAnchorPos = -1, this.scrollAnchorHeight = s);
    let o = O.length ? this.mapViewport(this.viewport, e.changes) : this.viewport;
    (t && (t.range.head < o.from || t.range.head > o.to) || !this.viewportIsAppropriate(o)) && (o = this.getViewport(0, t));
    let l = o.from != this.viewport.from || o.to != this.viewport.to;
    this.viewport = o, e.flags |= this.updateForViewport(), (l || !e.changes.empty || e.flags & 2) && this.updateViewportLines(), (this.lineGaps.length || this.viewport.to - this.viewport.from > 4e3) && this.updateLineGaps(this.ensureLineGaps(this.mapLineGaps(this.lineGaps, e.changes))), e.flags |= this.computeVisibleRanges(e.changes), t && (this.scrollTarget = t), !this.mustEnforceCursorAssoc && (e.selectionSet || e.focusChanged) && e.view.lineWrapping && e.state.selection.main.empty && e.state.selection.main.assoc && !e.state.facet(mu) && (this.mustEnforceCursorAssoc = !0);
  }
  measure(e) {
    let t = e.contentDOM, i = window.getComputedStyle(t), r = this.heightOracle, O = i.whiteSpace;
    this.defaultTextDirection = i.direction == "rtl" ? B.RTL : B.LTR;
    let s = this.heightOracle.mustRefreshForWrapping(O) || this.mustMeasureContent, a = t.getBoundingClientRect(), o = s || this.mustMeasureContent || this.contentDOMHeight != a.height;
    this.contentDOMHeight = a.height, this.mustMeasureContent = !1;
    let l = 0, c = 0;
    if (a.width && a.height) {
      let { scaleX: v, scaleY: y } = xl(t, a);
      (v > 5e-3 && Math.abs(this.scaleX - v) > 5e-3 || y > 5e-3 && Math.abs(this.scaleY - y) > 5e-3) && (this.scaleX = v, this.scaleY = y, l |= 16, s = o = !0);
    }
    let h = (parseInt(i.paddingTop) || 0) * this.scaleY, f = (parseInt(i.paddingBottom) || 0) * this.scaleY;
    (this.paddingTop != h || this.paddingBottom != f) && (this.paddingTop = h, this.paddingBottom = f, l |= 18), this.editorWidth != e.scrollDOM.clientWidth && (r.lineWrapping && (o = !0), this.editorWidth = e.scrollDOM.clientWidth, l |= 16);
    let u = e.scrollDOM.scrollTop * this.scaleY;
    this.scrollTop != u && (this.scrollAnchorHeight = -1, this.scrollTop = u), this.scrolledToBottom = Xl(e.scrollDOM);
    let d = (this.printing ? w$ : y$)(t, this.paddingTop), p = d.top - this.pixelViewport.top, Q = d.bottom - this.pixelViewport.bottom;
    this.pixelViewport = d;
    let m = this.pixelViewport.bottom > this.pixelViewport.top && this.pixelViewport.right > this.pixelViewport.left;
    if (m != this.inView && (this.inView = m, m && (o = !0)), !this.inView && !this.scrollTarget && !b$(e.dom))
      return 0;
    let g = a.width;
    if ((this.contentDOMWidth != g || this.editorHeight != e.scrollDOM.clientHeight) && (this.contentDOMWidth = a.width, this.editorHeight = e.scrollDOM.clientHeight, l |= 16), o) {
      let v = e.docView.measureVisibleLineHeights(this.viewport);
      if (r.mustRefreshForHeights(v) && (s = !0), s || r.lineWrapping && Math.abs(g - this.contentDOMWidth) > r.charWidth) {
        let { lineHeight: y, charWidth: Z, textHeight: x } = e.docView.measureTextSize();
        s = y > 0 && r.refresh(O, y, Z, x, Math.max(5, g / Z), v), s && (e.docView.minWidth = 0, l |= 16);
      }
      p > 0 && Q > 0 ? c = Math.max(p, Q) : p < 0 && Q < 0 && (c = Math.min(p, Q)), ma();
      for (let y of this.viewports) {
        let Z = y.from == this.viewport.from ? v : e.docView.measureVisibleLineHeights(y);
        this.heightMap = (s ? ce.empty().applyChanges(this.stateDeco, W.empty, this.heightOracle, [new ke(0, 0, 0, e.state.doc.length)]) : this.heightMap).updateHeight(r, 0, s, new Q$(y.from, Z));
      }
      Oi && (l |= 2);
    }
    let T = !this.viewportIsAppropriate(this.viewport, c) || this.scrollTarget && (this.scrollTarget.range.head < this.viewport.from || this.scrollTarget.range.head > this.viewport.to);
    return T && (l & 2 && (l |= this.updateScaler()), this.viewport = this.getViewport(c, this.scrollTarget), l |= this.updateForViewport()), (l & 2 || T) && this.updateViewportLines(), (this.lineGaps.length || this.viewport.to - this.viewport.from > 4e3) && this.updateLineGaps(this.ensureLineGaps(s ? [] : this.lineGaps, e)), l |= this.computeVisibleRanges(), this.mustEnforceCursorAssoc && (this.mustEnforceCursorAssoc = !1, e.docView.enforceCursorAssoc()), l;
  }
  get visibleTop() {
    return this.scaler.fromDOM(this.pixelViewport.top);
  }
  get visibleBottom() {
    return this.scaler.fromDOM(this.pixelViewport.bottom);
  }
  getViewport(e, t) {
    let i = 0.5 - Math.max(-0.5, Math.min(0.5, e / 1e3 / 2)), r = this.heightMap, O = this.heightOracle, { visibleTop: s, visibleBottom: a } = this, o = new ln(r.lineAt(s - i * 1e3, M.ByHeight, O, 0, 0).from, r.lineAt(a + (1 - i) * 1e3, M.ByHeight, O, 0, 0).to);
    if (t) {
      let { head: l } = t.range;
      if (l < o.from || l > o.to) {
        let c = Math.min(this.editorHeight, this.pixelViewport.bottom - this.pixelViewport.top), h = r.lineAt(l, M.ByPos, O, 0, 0), f;
        t.y == "center" ? f = (h.top + h.bottom) / 2 - c / 2 : t.y == "start" || t.y == "nearest" && l < o.from ? f = h.top : f = h.bottom - c, o = new ln(r.lineAt(f - 1e3 / 2, M.ByHeight, O, 0, 0).from, r.lineAt(f + c + 1e3 / 2, M.ByHeight, O, 0, 0).to);
      }
    }
    return o;
  }
  mapViewport(e, t) {
    let i = t.mapPos(e.from, -1), r = t.mapPos(e.to, 1);
    return new ln(this.heightMap.lineAt(i, M.ByPos, this.heightOracle, 0, 0).from, this.heightMap.lineAt(r, M.ByPos, this.heightOracle, 0, 0).to);
  }
  // Checks if a given viewport covers the visible part of the
  // document and not too much beyond that.
  viewportIsAppropriate({ from: e, to: t }, i = 0) {
    if (!this.inView)
      return !0;
    let { top: r } = this.heightMap.lineAt(e, M.ByPos, this.heightOracle, 0, 0), { bottom: O } = this.heightMap.lineAt(t, M.ByPos, this.heightOracle, 0, 0), { visibleTop: s, visibleBottom: a } = this;
    return (e == 0 || r <= s - Math.max(10, Math.min(
      -i,
      250
      /* VP.MaxCoverMargin */
    ))) && (t == this.state.doc.length || O >= a + Math.max(10, Math.min(
      i,
      250
      /* VP.MaxCoverMargin */
    ))) && r > s - 2 * 1e3 && O < a + 2 * 1e3;
  }
  mapLineGaps(e, t) {
    if (!e.length || t.empty)
      return e;
    let i = [];
    for (let r of e)
      t.touchesRange(r.from, r.to) || i.push(new wr(t.mapPos(r.from), t.mapPos(r.to), r.size, r.displaySize));
    return i;
  }
  // Computes positions in the viewport where the start or end of a
  // line should be hidden, trying to reuse existing line gaps when
  // appropriate to avoid unneccesary redraws.
  // Uses crude character-counting for the positioning and sizing,
  // since actual DOM coordinates aren't always available and
  // predictable. Relies on generous margins (see LG.Margin) to hide
  // the artifacts this might produce from the user.
  ensureLineGaps(e, t) {
    let i = this.heightOracle.lineWrapping, r = i ? 1e4 : 2e3, O = r >> 1, s = r << 1;
    if (this.defaultTextDirection != B.LTR && !i)
      return [];
    let a = [], o = (c, h, f, u) => {
      if (h - c < O)
        return;
      let d = this.state.selection.main, p = [d.from];
      d.empty || p.push(d.to);
      for (let m of p)
        if (m > c && m < h) {
          o(c, m - 10, f, u), o(m + 10, h, f, u);
          return;
        }
      let Q = X$(e, (m) => m.from >= f.from && m.to <= f.to && Math.abs(m.from - c) < O && Math.abs(m.to - h) < O && !p.some((g) => m.from < g && m.to > g));
      if (!Q) {
        if (h < f.to && t && i && t.visibleRanges.some((T) => T.from <= h && T.to >= h)) {
          let T = t.moveToLineBoundary(S.cursor(h), !1, !0).head;
          T > c && (h = T);
        }
        let m = this.gapSize(f, c, h, u), g = i || m < 2e6 ? m : 2e6;
        Q = new wr(c, h, m, g);
      }
      a.push(Q);
    }, l = (c) => {
      if (c.length < s || c.type != pe.Text)
        return;
      let h = k$(c.from, c.to, this.stateDeco);
      if (h.total < s)
        return;
      let f = this.scrollTarget ? this.scrollTarget.range.head : null, u, d;
      if (i) {
        let p = r / this.heightOracle.lineLength * this.heightOracle.lineHeight, Q, m;
        if (f != null) {
          let g = hn(h, f), T = ((this.visibleBottom - this.visibleTop) / 2 + p) / c.height;
          Q = g - T, m = g + T;
        } else
          Q = (this.visibleTop - c.top - p) / c.height, m = (this.visibleBottom - c.top + p) / c.height;
        u = cn(h, Q), d = cn(h, m);
      } else {
        let p = h.total * this.heightOracle.charWidth, Q = r * this.heightOracle.charWidth, m = 0;
        if (p > 2e6)
          for (let Z of e)
            Z.from >= c.from && Z.from < c.to && Z.size != Z.displaySize && Z.from * this.heightOracle.charWidth + m < this.pixelViewport.left && (m = Z.size - Z.displaySize);
        let g = this.pixelViewport.left + m, T = this.pixelViewport.right + m, v, y;
        if (f != null) {
          let Z = hn(h, f), x = ((T - g) / 2 + Q) / p;
          v = Z - x, y = Z + x;
        } else
          v = (g - Q) / p, y = (T + Q) / p;
        u = cn(h, v), d = cn(h, y);
      }
      u > c.from && o(c.from, u, c, h), d < c.to && o(d, c.to, c, h);
    };
    for (let c of this.viewportLines)
      Array.isArray(c.type) ? c.type.forEach(l) : l(c);
    return a;
  }
  gapSize(e, t, i, r) {
    let O = hn(r, i) - hn(r, t);
    return this.heightOracle.lineWrapping ? e.height * O : r.total * this.heightOracle.charWidth * O;
  }
  updateLineGaps(e) {
    wr.same(e, this.lineGaps) || (this.lineGaps = e, this.lineGapDeco = Y.set(e.map((t) => t.draw(this, this.heightOracle.lineWrapping))));
  }
  computeVisibleRanges(e) {
    let t = this.stateDeco;
    this.lineGaps.length && (t = t.concat(this.lineGapDeco));
    let i = [];
    _.spans(t, this.viewport.from, this.viewport.to, {
      span(O, s) {
        i.push({ from: O, to: s });
      },
      point() {
      }
    }, 20);
    let r = 0;
    if (i.length != this.visibleRanges.length)
      r = 12;
    else
      for (let O = 0; O < i.length && !(r & 8); O++) {
        let s = this.visibleRanges[O], a = i[O];
        (s.from != a.from || s.to != a.to) && (r |= 4, e && e.mapPos(s.from, -1) == a.from && e.mapPos(s.to, 1) == a.to || (r |= 8));
      }
    return this.visibleRanges = i, r;
  }
  lineBlockAt(e) {
    return e >= this.viewport.from && e <= this.viewport.to && this.viewportLines.find((t) => t.from <= e && t.to >= e) || bi(this.heightMap.lineAt(e, M.ByPos, this.heightOracle, 0, 0), this.scaler);
  }
  lineBlockAtHeight(e) {
    return e >= this.viewportLines[0].top && e <= this.viewportLines[this.viewportLines.length - 1].bottom && this.viewportLines.find((t) => t.top <= e && t.bottom >= e) || bi(this.heightMap.lineAt(this.scaler.fromDOM(e), M.ByHeight, this.heightOracle, 0, 0), this.scaler);
  }
  scrollAnchorAt(e) {
    let t = this.lineBlockAtHeight(e + 8);
    return t.from >= this.viewport.from || this.viewportLines[0].top - e > 200 ? t : this.viewportLines[0];
  }
  elementAtHeight(e) {
    return bi(this.heightMap.blockAt(this.scaler.fromDOM(e), this.heightOracle, 0, 0), this.scaler);
  }
  get docHeight() {
    return this.scaler.toDOM(this.heightMap.height);
  }
  get contentHeight() {
    return this.docHeight + this.paddingTop + this.paddingBottom;
  }
}
class ln {
  constructor(e, t) {
    this.from = e, this.to = t;
  }
}
function k$(n, e, t) {
  let i = [], r = n, O = 0;
  return _.spans(t, n, e, {
    span() {
    },
    point(s, a) {
      s > r && (i.push({ from: r, to: s }), O += s - r), r = a;
    }
  }, 20), r < e && (i.push({ from: r, to: e }), O += e - r), { total: O, ranges: i };
}
function cn({ total: n, ranges: e }, t) {
  if (t <= 0)
    return e[0].from;
  if (t >= 1)
    return e[e.length - 1].to;
  let i = Math.floor(n * t);
  for (let r = 0; ; r++) {
    let { from: O, to: s } = e[r], a = s - O;
    if (i <= a)
      return O + i;
    i -= a;
  }
}
function hn(n, e) {
  let t = 0;
  for (let { from: i, to: r } of n.ranges) {
    if (e <= r) {
      t += e - i;
      break;
    }
    t += r - i;
  }
  return t / n.total;
}
function X$(n, e) {
  for (let t of n)
    if (e(t))
      return t;
}
const Pa = {
  toDOM(n) {
    return n;
  },
  fromDOM(n) {
    return n;
  },
  scale: 1,
  eq(n) {
    return n == this;
  }
};
function Ta(n) {
  let e = n.facet(rr).filter((i) => typeof i != "function"), t = n.facet(os).filter((i) => typeof i != "function");
  return t.length && e.push(_.join(t)), e;
}
class fs {
  constructor(e, t, i) {
    let r = 0, O = 0, s = 0;
    this.viewports = i.map(({ from: a, to: o }) => {
      let l = t.lineAt(a, M.ByPos, e, 0, 0).top, c = t.lineAt(o, M.ByPos, e, 0, 0).bottom;
      return r += c - l, { from: a, to: o, top: l, bottom: c, domTop: 0, domBottom: 0 };
    }), this.scale = (7e6 - r) / (t.height - r);
    for (let a of this.viewports)
      a.domTop = s + (a.top - O) * this.scale, s = a.domBottom = a.domTop + (a.bottom - a.top), O = a.bottom;
  }
  toDOM(e) {
    for (let t = 0, i = 0, r = 0; ; t++) {
      let O = t < this.viewports.length ? this.viewports[t] : null;
      if (!O || e < O.top)
        return r + (e - i) * this.scale;
      if (e <= O.bottom)
        return O.domTop + (e - O.top);
      i = O.bottom, r = O.domBottom;
    }
  }
  fromDOM(e) {
    for (let t = 0, i = 0, r = 0; ; t++) {
      let O = t < this.viewports.length ? this.viewports[t] : null;
      if (!O || e < O.domTop)
        return i + (e - r) / this.scale;
      if (e <= O.domBottom)
        return O.top + (e - O.domTop);
      i = O.bottom, r = O.domBottom;
    }
  }
  eq(e) {
    return e instanceof fs ? this.scale == e.scale && this.viewports.length == e.viewports.length && this.viewports.every((t, i) => t.from == e.viewports[i].from && t.to == e.viewports[i].to) : !1;
  }
}
function bi(n, e) {
  if (e.scale == 1)
    return n;
  let t = e.toDOM(n.top), i = e.toDOM(n.bottom);
  return new _e(n.from, n.length, t, i - t, Array.isArray(n._content) ? n._content.map((r) => bi(r, e)) : n._content);
}
const fn = /* @__PURE__ */ w.define({ combine: (n) => n.join(" ") }), xO = /* @__PURE__ */ w.define({ combine: (n) => n.indexOf(!0) > -1 }), kO = /* @__PURE__ */ Qt.newName(), hc = /* @__PURE__ */ Qt.newName(), fc = /* @__PURE__ */ Qt.newName(), uc = { "&light": "." + hc, "&dark": "." + fc };
function XO(n, e, t) {
  return new Qt(e, {
    finish(i) {
      return /&/.test(i) ? i.replace(/&\w*/, (r) => {
        if (r == "&")
          return n;
        if (!t || !t[r])
          throw new RangeError(`Unsupported selector: ${r}`);
        return t[r];
      }) : n + " " + i;
    }
  });
}
const v$ = /* @__PURE__ */ XO("." + kO, {
  "&": {
    position: "relative !important",
    boxSizing: "border-box",
    "&.cm-focused": {
      // Provide a simple default outline to make sure a focused
      // editor is visually distinct. Can't leave the default behavior
      // because that will apply to the content element, which is
      // inside the scrollable container and doesn't include the
      // gutters. We also can't use an 'auto' outline, since those
      // are, for some reason, drawn behind the element content, which
      // will cause things like the active line background to cover
      // the outline (#297).
      outline: "1px dotted #212121"
    },
    display: "flex !important",
    flexDirection: "column"
  },
  ".cm-scroller": {
    display: "flex !important",
    alignItems: "flex-start !important",
    fontFamily: "monospace",
    lineHeight: 1.4,
    height: "100%",
    overflowX: "auto",
    position: "relative",
    zIndex: 0,
    overflowAnchor: "none"
  },
  ".cm-content": {
    margin: 0,
    flexGrow: 2,
    flexShrink: 0,
    display: "block",
    whiteSpace: "pre",
    wordWrap: "normal",
    // https://github.com/codemirror/dev/issues/456
    boxSizing: "border-box",
    minHeight: "100%",
    padding: "4px 0",
    outline: "none",
    "&[contenteditable=true]": {
      WebkitUserModify: "read-write-plaintext-only"
    }
  },
  ".cm-lineWrapping": {
    whiteSpace_fallback: "pre-wrap",
    // For IE
    whiteSpace: "break-spaces",
    wordBreak: "break-word",
    // For Safari, which doesn't support overflow-wrap: anywhere
    overflowWrap: "anywhere",
    flexShrink: 1
  },
  "&light .cm-content": { caretColor: "black" },
  "&dark .cm-content": { caretColor: "white" },
  ".cm-line": {
    display: "block",
    padding: "0 2px 0 6px"
  },
  ".cm-layer": {
    position: "absolute",
    left: 0,
    top: 0,
    contain: "size style",
    "& > *": {
      position: "absolute"
    }
  },
  "&light .cm-selectionBackground": {
    background: "#d9d9d9"
  },
  "&dark .cm-selectionBackground": {
    background: "#222"
  },
  "&light.cm-focused > .cm-scroller > .cm-selectionLayer .cm-selectionBackground": {
    background: "#d7d4f0"
  },
  "&dark.cm-focused > .cm-scroller > .cm-selectionLayer .cm-selectionBackground": {
    background: "#233"
  },
  ".cm-cursorLayer": {
    pointerEvents: "none"
  },
  "&.cm-focused > .cm-scroller > .cm-cursorLayer": {
    animation: "steps(1) cm-blink 1.2s infinite"
  },
  // Two animations defined so that we can switch between them to
  // restart the animation without forcing another style
  // recomputation.
  "@keyframes cm-blink": { "0%": {}, "50%": { opacity: 0 }, "100%": {} },
  "@keyframes cm-blink2": { "0%": {}, "50%": { opacity: 0 }, "100%": {} },
  ".cm-cursor, .cm-dropCursor": {
    borderLeft: "1.2px solid black",
    marginLeft: "-0.6px",
    pointerEvents: "none"
  },
  ".cm-cursor": {
    display: "none"
  },
  "&dark .cm-cursor": {
    borderLeftColor: "#ddd"
  },
  ".cm-dropCursor": {
    position: "absolute"
  },
  "&.cm-focused > .cm-scroller > .cm-cursorLayer .cm-cursor": {
    display: "block"
  },
  ".cm-iso": {
    unicodeBidi: "isolate"
  },
  ".cm-announced": {
    position: "fixed",
    top: "-10000px"
  },
  "@media print": {
    ".cm-announced": { display: "none" }
  },
  "&light .cm-activeLine": { backgroundColor: "#cceeff44" },
  "&dark .cm-activeLine": { backgroundColor: "#99eeff33" },
  "&light .cm-specialChar": { color: "red" },
  "&dark .cm-specialChar": { color: "#f78" },
  ".cm-gutters": {
    flexShrink: 0,
    display: "flex",
    height: "100%",
    boxSizing: "border-box",
    zIndex: 200
  },
  ".cm-gutters-before": { insetInlineStart: 0 },
  ".cm-gutters-after": { insetInlineEnd: 0 },
  "&light .cm-gutters": {
    backgroundColor: "#f5f5f5",
    color: "#6c6c6c",
    border: "0px solid #ddd",
    "&.cm-gutters-before": { borderRightWidth: "1px" },
    "&.cm-gutters-after": { borderLeftWidth: "1px" }
  },
  "&dark .cm-gutters": {
    backgroundColor: "#333338",
    color: "#ccc"
  },
  ".cm-gutter": {
    display: "flex !important",
    // Necessary -- prevents margin collapsing
    flexDirection: "column",
    flexShrink: 0,
    boxSizing: "border-box",
    minHeight: "100%",
    overflow: "hidden"
  },
  ".cm-gutterElement": {
    boxSizing: "border-box"
  },
  ".cm-lineNumbers .cm-gutterElement": {
    padding: "0 3px 0 5px",
    minWidth: "20px",
    textAlign: "right",
    whiteSpace: "nowrap"
  },
  "&light .cm-activeLineGutter": {
    backgroundColor: "#e2f2ff"
  },
  "&dark .cm-activeLineGutter": {
    backgroundColor: "#222227"
  },
  ".cm-panels": {
    boxSizing: "border-box",
    position: "sticky",
    left: 0,
    right: 0,
    zIndex: 300
  },
  "&light .cm-panels": {
    backgroundColor: "#f5f5f5",
    color: "black"
  },
  "&light .cm-panels-top": {
    borderBottom: "1px solid #ddd"
  },
  "&light .cm-panels-bottom": {
    borderTop: "1px solid #ddd"
  },
  "&dark .cm-panels": {
    backgroundColor: "#333338",
    color: "white"
  },
  ".cm-dialog": {
    padding: "2px 19px 4px 6px",
    position: "relative",
    "& label": { fontSize: "80%" }
  },
  ".cm-dialog-close": {
    position: "absolute",
    top: "3px",
    right: "4px",
    backgroundColor: "inherit",
    border: "none",
    font: "inherit",
    fontSize: "14px",
    padding: "0"
  },
  ".cm-tab": {
    display: "inline-block",
    overflow: "hidden",
    verticalAlign: "bottom"
  },
  ".cm-widgetBuffer": {
    verticalAlign: "text-top",
    height: "1em",
    width: 0,
    display: "inline"
  },
  ".cm-placeholder": {
    color: "#888",
    display: "inline-block",
    verticalAlign: "top",
    userSelect: "none"
  },
  ".cm-highlightSpace": {
    backgroundImage: "radial-gradient(circle at 50% 55%, #aaa 20%, transparent 5%)",
    backgroundPosition: "center"
  },
  ".cm-highlightTab": {
    backgroundImage: `url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="20"><path stroke="%23888" stroke-width="1" fill="none" d="M1 10H196L190 5M190 15L196 10M197 4L197 16"/></svg>')`,
    backgroundSize: "auto 100%",
    backgroundPosition: "right 90%",
    backgroundRepeat: "no-repeat"
  },
  ".cm-trailingSpace": {
    backgroundColor: "#ff332255"
  },
  ".cm-button": {
    verticalAlign: "middle",
    color: "inherit",
    fontSize: "70%",
    padding: ".2em 1em",
    borderRadius: "1px"
  },
  "&light .cm-button": {
    backgroundImage: "linear-gradient(#eff1f5, #d9d9df)",
    border: "1px solid #888",
    "&:active": {
      backgroundImage: "linear-gradient(#b4b4b4, #d0d3d6)"
    }
  },
  "&dark .cm-button": {
    backgroundImage: "linear-gradient(#393939, #111)",
    border: "1px solid #888",
    "&:active": {
      backgroundImage: "linear-gradient(#111, #333)"
    }
  },
  ".cm-textfield": {
    verticalAlign: "middle",
    color: "inherit",
    fontSize: "70%",
    border: "1px solid silver",
    padding: ".2em .5em"
  },
  "&light .cm-textfield": {
    backgroundColor: "white"
  },
  "&dark .cm-textfield": {
    border: "1px solid #555",
    backgroundColor: "inherit"
  }
}, uc), Z$ = {
  childList: !0,
  characterData: !0,
  subtree: !0,
  attributes: !0,
  characterDataOldValue: !0
}, xr = b.ie && b.ie_version <= 11;
class R$ {
  constructor(e) {
    this.view = e, this.active = !1, this.editContext = null, this.selectionRange = new su(), this.selectionChanged = !1, this.delayedFlush = -1, this.resizeTimeout = -1, this.queue = [], this.delayedAndroidKey = null, this.flushingAndroidKey = -1, this.lastChange = 0, this.scrollTargets = [], this.intersection = null, this.resizeScroll = null, this.intersecting = !1, this.gapIntersection = null, this.gaps = [], this.printQuery = null, this.parentCheck = -1, this.dom = e.contentDOM, this.observer = new MutationObserver((t) => {
      for (let i of t)
        this.queue.push(i);
      (b.ie && b.ie_version <= 11 || b.ios && e.composing) && t.some((i) => i.type == "childList" && i.removedNodes.length || i.type == "characterData" && i.oldValue.length > i.target.nodeValue.length) ? this.flushSoon() : this.flush();
    }), window.EditContext && b.android && e.constructor.EDIT_CONTEXT !== !1 && // Chrome <126 doesn't support inverted selections in edit context (#1392)
    !(b.chrome && b.chrome_version < 126) && (this.editContext = new _$(e), e.state.facet(it) && (e.contentDOM.editContext = this.editContext.editContext)), xr && (this.onCharData = (t) => {
      this.queue.push({
        target: t.target,
        type: "characterData",
        oldValue: t.prevValue
      }), this.flushSoon();
    }), this.onSelectionChange = this.onSelectionChange.bind(this), this.onResize = this.onResize.bind(this), this.onPrint = this.onPrint.bind(this), this.onScroll = this.onScroll.bind(this), window.matchMedia && (this.printQuery = window.matchMedia("print")), typeof ResizeObserver == "function" && (this.resizeScroll = new ResizeObserver(() => {
      var t;
      ((t = this.view.docView) === null || t === void 0 ? void 0 : t.lastUpdate) < Date.now() - 75 && this.onResize();
    }), this.resizeScroll.observe(e.scrollDOM)), this.addWindowListeners(this.win = e.win), this.start(), typeof IntersectionObserver == "function" && (this.intersection = new IntersectionObserver((t) => {
      this.parentCheck < 0 && (this.parentCheck = setTimeout(this.listenForScroll.bind(this), 1e3)), t.length > 0 && t[t.length - 1].intersectionRatio > 0 != this.intersecting && (this.intersecting = !this.intersecting, this.intersecting != this.view.inView && this.onScrollChanged(document.createEvent("Event")));
    }, { threshold: [0, 1e-3] }), this.intersection.observe(this.dom), this.gapIntersection = new IntersectionObserver((t) => {
      t.length > 0 && t[t.length - 1].intersectionRatio > 0 && this.onScrollChanged(document.createEvent("Event"));
    }, {})), this.listenForScroll(), this.readSelectionRange();
  }
  onScrollChanged(e) {
    this.view.inputState.runHandlers("scroll", e), this.intersecting && this.view.measure();
  }
  onScroll(e) {
    this.intersecting && this.flush(!1), this.editContext && this.view.requestMeasure(this.editContext.measureReq), this.onScrollChanged(e);
  }
  onResize() {
    this.resizeTimeout < 0 && (this.resizeTimeout = setTimeout(() => {
      this.resizeTimeout = -1, this.view.requestMeasure();
    }, 50));
  }
  onPrint(e) {
    (e.type == "change" || !e.type) && !e.matches || (this.view.viewState.printing = !0, this.view.measure(), setTimeout(() => {
      this.view.viewState.printing = !1, this.view.requestMeasure();
    }, 500));
  }
  updateGaps(e) {
    if (this.gapIntersection && (e.length != this.gaps.length || this.gaps.some((t, i) => t != e[i]))) {
      this.gapIntersection.disconnect();
      for (let t of e)
        this.gapIntersection.observe(t);
      this.gaps = e;
    }
  }
  onSelectionChange(e) {
    let t = this.selectionChanged;
    if (!this.readSelectionRange() || this.delayedAndroidKey)
      return;
    let { view: i } = this, r = this.selectionRange;
    if (i.state.facet(it) ? i.root.activeElement != this.dom : !Xi(this.dom, r))
      return;
    let O = r.anchorNode && i.docView.tile.nearest(r.anchorNode);
    if (O && O.isWidget() && O.widget.ignoreEvent(e)) {
      t || (this.selectionChanged = !1);
      return;
    }
    (b.ie && b.ie_version <= 11 || b.android && b.chrome) && !i.state.selection.main.empty && // (Selection.isCollapsed isn't reliable on IE)
    r.focusNode && Zi(r.focusNode, r.focusOffset, r.anchorNode, r.anchorOffset) ? this.flushSoon() : this.flush(!1);
  }
  readSelectionRange() {
    let { view: e } = this, t = ii(e.root);
    if (!t)
      return !1;
    let i = b.safari && e.root.nodeType == 11 && e.root.activeElement == this.dom && z$(this.view, t) || t;
    if (!i || this.selectionRange.eq(i))
      return !1;
    let r = Xi(this.dom, i);
    return r && !this.selectionChanged && e.inputState.lastFocusTime > Date.now() - 200 && e.inputState.lastTouchTime < Date.now() - 300 && ou(this.dom, i) ? (this.view.inputState.lastFocusTime = 0, e.docView.updateSelection(), !1) : (this.selectionRange.setRange(i), r && (this.selectionChanged = !0), !0);
  }
  setSelectionRange(e, t) {
    this.selectionRange.set(e.node, e.offset, t.node, t.offset), this.selectionChanged = !1;
  }
  clearSelectionRange() {
    this.selectionRange.set(null, 0, null, 0);
  }
  listenForScroll() {
    this.parentCheck = -1;
    let e = 0, t = null;
    for (let i = this.dom; i; )
      if (i.nodeType == 1)
        !t && e < this.scrollTargets.length && this.scrollTargets[e] == i ? e++ : t || (t = this.scrollTargets.slice(0, e)), t && t.push(i), i = i.assignedSlot || i.parentNode;
      else if (i.nodeType == 11)
        i = i.host;
      else
        break;
    if (e < this.scrollTargets.length && !t && (t = this.scrollTargets.slice(0, e)), t) {
      for (let i of this.scrollTargets)
        i.removeEventListener("scroll", this.onScroll);
      for (let i of this.scrollTargets = t)
        i.addEventListener("scroll", this.onScroll);
    }
  }
  ignore(e) {
    if (!this.active)
      return e();
    try {
      return this.stop(), e();
    } finally {
      this.start(), this.clear();
    }
  }
  start() {
    this.active || (this.observer.observe(this.dom, Z$), xr && this.dom.addEventListener("DOMCharacterDataModified", this.onCharData), this.active = !0);
  }
  stop() {
    this.active && (this.active = !1, this.observer.disconnect(), xr && this.dom.removeEventListener("DOMCharacterDataModified", this.onCharData));
  }
  // Throw away any pending changes
  clear() {
    this.processRecords(), this.queue.length = 0, this.selectionChanged = !1;
  }
  // Chrome Android, especially in combination with GBoard, not only
  // doesn't reliably fire regular key events, but also often
  // surrounds the effect of enter or backspace with a bunch of
  // composition events that, when interrupted, cause text duplication
  // or other kinds of corruption. This hack makes the editor back off
  // from handling DOM changes for a moment when such a key is
  // detected (via beforeinput or keydown), and then tries to flush
  // them or, if that has no effect, dispatches the given key.
  delayAndroidKey(e, t) {
    var i;
    if (!this.delayedAndroidKey) {
      let r = () => {
        let O = this.delayedAndroidKey;
        O && (this.clearDelayedAndroidKey(), this.view.inputState.lastKeyCode = O.keyCode, this.view.inputState.lastKeyTime = Date.now(), !this.flush() && O.force && Nt(this.dom, O.key, O.keyCode));
      };
      this.flushingAndroidKey = this.view.win.requestAnimationFrame(r);
    }
    (!this.delayedAndroidKey || e == "Enter") && (this.delayedAndroidKey = {
      key: e,
      keyCode: t,
      // Only run the key handler when no changes are detected if
      // this isn't coming right after another change, in which case
      // it is probably part of a weird chain of updates, and should
      // be ignored if it returns the DOM to its previous state.
      force: this.lastChange < Date.now() - 50 || !!(!((i = this.delayedAndroidKey) === null || i === void 0) && i.force)
    });
  }
  clearDelayedAndroidKey() {
    this.win.cancelAnimationFrame(this.flushingAndroidKey), this.delayedAndroidKey = null, this.flushingAndroidKey = -1;
  }
  flushSoon() {
    this.delayedFlush < 0 && (this.delayedFlush = this.view.win.requestAnimationFrame(() => {
      this.delayedFlush = -1, this.flush();
    }));
  }
  forceFlush() {
    this.delayedFlush >= 0 && (this.view.win.cancelAnimationFrame(this.delayedFlush), this.delayedFlush = -1), this.flush();
  }
  pendingRecords() {
    for (let e of this.observer.takeRecords())
      this.queue.push(e);
    return this.queue;
  }
  processRecords() {
    let e = this.pendingRecords();
    e.length && (this.queue = []);
    let t = -1, i = -1, r = !1;
    for (let O of e) {
      let s = this.readMutation(O);
      s && (s.typeOver && (r = !0), t == -1 ? { from: t, to: i } = s : (t = Math.min(s.from, t), i = Math.max(s.to, i)));
    }
    return { from: t, to: i, typeOver: r };
  }
  readChange() {
    let { from: e, to: t, typeOver: i } = this.processRecords(), r = this.selectionChanged && Xi(this.dom, this.selectionRange);
    if (e < 0 && !r)
      return null;
    e > -1 && (this.lastChange = Date.now()), this.view.inputState.lastFocusTime = 0, this.selectionChanged = !1;
    let O = new Fu(this.view, e, t, i);
    return this.view.docView.domChanged = { newSel: O.newSel ? O.newSel.main : null }, O;
  }
  // Apply pending changes, if any
  flush(e = !0) {
    if (this.delayedFlush >= 0 || this.delayedAndroidKey)
      return !1;
    e && this.readSelectionRange();
    let t = this.readChange();
    if (!t)
      return this.view.requestMeasure(), !1;
    let i = this.view.state, r = ec(this.view, t);
    return this.view.state == i && (t.domChanged || t.newSel && !qn(this.view.state.selection, t.newSel.main)) && this.view.update([]), r;
  }
  readMutation(e) {
    let t = this.view.docView.tile.nearest(e.target);
    if (!t || t.isWidget())
      return null;
    if (t.markDirty(e.type == "attributes"), e.type == "childList") {
      let i = ya(t, e.previousSibling || e.target.previousSibling, -1), r = ya(t, e.nextSibling || e.target.nextSibling, 1);
      return {
        from: i ? t.posAfter(i) : t.posAtStart,
        to: r ? t.posBefore(r) : t.posAtEnd,
        typeOver: !1
      };
    } else return e.type == "characterData" ? { from: t.posAtStart, to: t.posAtEnd, typeOver: e.target.nodeValue == e.oldValue } : null;
  }
  setWindow(e) {
    e != this.win && (this.removeWindowListeners(this.win), this.win = e, this.addWindowListeners(this.win));
  }
  addWindowListeners(e) {
    e.addEventListener("resize", this.onResize), this.printQuery ? this.printQuery.addEventListener ? this.printQuery.addEventListener("change", this.onPrint) : this.printQuery.addListener(this.onPrint) : e.addEventListener("beforeprint", this.onPrint), e.addEventListener("scroll", this.onScroll), e.document.addEventListener("selectionchange", this.onSelectionChange);
  }
  removeWindowListeners(e) {
    e.removeEventListener("scroll", this.onScroll), e.removeEventListener("resize", this.onResize), this.printQuery ? this.printQuery.removeEventListener ? this.printQuery.removeEventListener("change", this.onPrint) : this.printQuery.removeListener(this.onPrint) : e.removeEventListener("beforeprint", this.onPrint), e.document.removeEventListener("selectionchange", this.onSelectionChange);
  }
  update(e) {
    this.editContext && (this.editContext.update(e), e.startState.facet(it) != e.state.facet(it) && (e.view.contentDOM.editContext = e.state.facet(it) ? this.editContext.editContext : null));
  }
  destroy() {
    var e, t, i;
    this.stop(), (e = this.intersection) === null || e === void 0 || e.disconnect(), (t = this.gapIntersection) === null || t === void 0 || t.disconnect(), (i = this.resizeScroll) === null || i === void 0 || i.disconnect();
    for (let r of this.scrollTargets)
      r.removeEventListener("scroll", this.onScroll);
    this.removeWindowListeners(this.win), clearTimeout(this.parentCheck), clearTimeout(this.resizeTimeout), this.win.cancelAnimationFrame(this.delayedFlush), this.win.cancelAnimationFrame(this.flushingAndroidKey), this.editContext && (this.view.contentDOM.editContext = null, this.editContext.destroy());
  }
}
function ya(n, e, t) {
  for (; e; ) {
    let i = K.get(e);
    if (i && i.parent == n)
      return i;
    let r = e.parentNode;
    e = r != n.dom ? r : t > 0 ? e.nextSibling : e.previousSibling;
  }
  return null;
}
function ba(n, e) {
  let t = e.startContainer, i = e.startOffset, r = e.endContainer, O = e.endOffset, s = n.docView.domAtPos(n.state.selection.main.anchor, 1);
  return Zi(s.node, s.offset, r, O) && ([t, i, r, O] = [r, O, t, i]), { anchorNode: t, anchorOffset: i, focusNode: r, focusOffset: O };
}
function z$(n, e) {
  if (e.getComposedRanges) {
    let r = e.getComposedRanges(n.root)[0];
    if (r)
      return ba(n, r);
  }
  let t = null;
  function i(r) {
    r.preventDefault(), r.stopImmediatePropagation(), t = r.getTargetRanges()[0];
  }
  return n.contentDOM.addEventListener("beforeinput", i, !0), n.dom.ownerDocument.execCommand("indent"), n.contentDOM.removeEventListener("beforeinput", i, !0), t ? ba(n, t) : null;
}
class _$ {
  constructor(e) {
    this.from = 0, this.to = 0, this.pendingContextChange = null, this.handlers = /* @__PURE__ */ Object.create(null), this.composing = null, this.resetRange(e.state);
    let t = this.editContext = new window.EditContext({
      text: e.state.doc.sliceString(this.from, this.to),
      selectionStart: this.toContextPos(Math.max(this.from, Math.min(this.to, e.state.selection.main.anchor))),
      selectionEnd: this.toContextPos(e.state.selection.main.head)
    });
    this.handlers.textupdate = (i) => {
      let r = e.state.selection.main, { anchor: O, head: s } = r, a = this.toEditorPos(i.updateRangeStart), o = this.toEditorPos(i.updateRangeEnd);
      e.inputState.composing >= 0 && !this.composing && (this.composing = { contextBase: i.updateRangeStart, editorBase: a, drifted: !1 });
      let l = o - a > i.text.length;
      a == this.from && O < this.from ? a = O : o == this.to && O > this.to && (o = O);
      let c = tc(e.state.sliceDoc(a, o), i.text, (l ? r.from : r.to) - a, l ? "end" : null);
      if (!c) {
        let f = S.single(this.toEditorPos(i.selectionStart), this.toEditorPos(i.selectionEnd));
        qn(f, r) || e.dispatch({ selection: f, userEvent: "select" });
        return;
      }
      let h = {
        from: c.from + a,
        to: c.toA + a,
        insert: W.of(i.text.slice(c.from, c.toB).split(`
`))
      };
      if ((b.mac || b.android) && h.from == s - 1 && /^\. ?$/.test(i.text) && e.contentDOM.getAttribute("autocorrect") == "off" && (h = { from: a, to: o, insert: W.of([i.text.replace(".", " ")]) }), this.pendingContextChange = h, !e.state.readOnly) {
        let f = this.to - this.from + (h.to - h.from + h.insert.length);
        cs(e, h, S.single(this.toEditorPos(i.selectionStart, f), this.toEditorPos(i.selectionEnd, f)));
      }
      this.pendingContextChange && (this.revertPending(e.state), this.setSelection(e.state)), h.from < h.to && !h.insert.length && e.inputState.composing >= 0 && !/[\\p{Alphabetic}\\p{Number}_]/.test(t.text.slice(Math.max(0, i.updateRangeStart - 1), Math.min(t.text.length, i.updateRangeStart + 1))) && this.handlers.compositionend(i);
    }, this.handlers.characterboundsupdate = (i) => {
      let r = [], O = null;
      for (let s = this.toEditorPos(i.rangeStart), a = this.toEditorPos(i.rangeEnd); s < a; s++) {
        let o = e.coordsForChar(s);
        O = o && new DOMRect(o.left, o.top, o.right - o.left, o.bottom - o.top) || O || new DOMRect(), r.push(O);
      }
      t.updateCharacterBounds(i.rangeStart, r);
    }, this.handlers.textformatupdate = (i) => {
      let r = [];
      for (let O of i.getTextFormats()) {
        let s = O.underlineStyle, a = O.underlineThickness;
        if (!/none/i.test(s) && !/none/i.test(a)) {
          let o = this.toEditorPos(O.rangeStart), l = this.toEditorPos(O.rangeEnd);
          if (o < l) {
            let c = `text-decoration: underline ${/^[a-z]/.test(s) ? s + " " : s == "Dashed" ? "dashed " : s == "Squiggle" ? "wavy " : ""}${/thin/i.test(a) ? 1 : 2}px`;
            r.push(Y.mark({ attributes: { style: c } }).range(o, l));
          }
        }
      }
      e.dispatch({ effects: El.of(Y.set(r)) });
    }, this.handlers.compositionstart = () => {
      e.inputState.composing < 0 && (e.inputState.composing = 0, e.inputState.compositionFirstChange = !0);
    }, this.handlers.compositionend = () => {
      if (e.inputState.composing = -1, e.inputState.compositionFirstChange = null, this.composing) {
        let { drifted: i } = this.composing;
        this.composing = null, i && this.reset(e.state);
      }
    };
    for (let i in this.handlers)
      t.addEventListener(i, this.handlers[i]);
    this.measureReq = { read: (i) => {
      this.editContext.updateControlBounds(i.contentDOM.getBoundingClientRect());
      let r = ii(i.root);
      r && r.rangeCount && this.editContext.updateSelectionBounds(r.getRangeAt(0).getBoundingClientRect());
    } };
  }
  applyEdits(e) {
    let t = 0, i = !1, r = this.pendingContextChange;
    return e.changes.iterChanges((O, s, a, o, l) => {
      if (i)
        return;
      let c = l.length - (s - O);
      if (r && s >= r.to)
        if (r.from == O && r.to == s && r.insert.eq(l)) {
          r = this.pendingContextChange = null, t += c, this.to += c;
          return;
        } else
          r = null, this.revertPending(e.state);
      if (O += t, s += t, s <= this.from)
        this.from += c, this.to += c;
      else if (O < this.to) {
        if (O < this.from || s > this.to || this.to - this.from + l.length > 3e4) {
          i = !0;
          return;
        }
        this.editContext.updateText(this.toContextPos(O), this.toContextPos(s), l.toString()), this.to += c;
      }
      t += c;
    }), r && !i && this.revertPending(e.state), !i;
  }
  update(e) {
    let t = this.pendingContextChange, i = e.startState.selection.main;
    this.composing && (this.composing.drifted || !e.changes.touchesRange(i.from, i.to) && e.transactions.some((r) => !r.isUserEvent("input.type") && r.changes.touchesRange(this.from, this.to))) ? (this.composing.drifted = !0, this.composing.editorBase = e.changes.mapPos(this.composing.editorBase)) : !this.applyEdits(e) || !this.rangeIsValid(e.state) ? (this.pendingContextChange = null, this.reset(e.state)) : (e.docChanged || e.selectionSet || t) && this.setSelection(e.state), (e.geometryChanged || e.docChanged || e.selectionSet) && e.view.requestMeasure(this.measureReq);
  }
  resetRange(e) {
    let { head: t } = e.selection.main;
    this.from = Math.max(
      0,
      t - 1e4
      /* CxVp.Margin */
    ), this.to = Math.min(
      e.doc.length,
      t + 1e4
      /* CxVp.Margin */
    );
  }
  reset(e) {
    this.resetRange(e), this.editContext.updateText(0, this.editContext.text.length, e.doc.sliceString(this.from, this.to)), this.setSelection(e);
  }
  revertPending(e) {
    let t = this.pendingContextChange;
    this.pendingContextChange = null, this.editContext.updateText(this.toContextPos(t.from), this.toContextPos(t.from + t.insert.length), e.doc.sliceString(t.from, t.to));
  }
  setSelection(e) {
    let { main: t } = e.selection, i = this.toContextPos(Math.max(this.from, Math.min(this.to, t.anchor))), r = this.toContextPos(t.head);
    (this.editContext.selectionStart != i || this.editContext.selectionEnd != r) && this.editContext.updateSelection(i, r);
  }
  rangeIsValid(e) {
    let { head: t } = e.selection.main;
    return !(this.from > 0 && t - this.from < 500 || this.to < e.doc.length && this.to - t < 500 || this.to - this.from > 1e4 * 3);
  }
  toEditorPos(e, t = this.to - this.from) {
    e = Math.min(e, t);
    let i = this.composing;
    return i && i.drifted ? i.editorBase + (e - i.contextBase) : e + this.from;
  }
  toContextPos(e) {
    let t = this.composing;
    return t && t.drifted ? t.contextBase + (e - t.editorBase) : e - this.from;
  }
  destroy() {
    for (let e in this.handlers)
      this.editContext.removeEventListener(e, this.handlers[e]);
  }
}
class k {
  /**
  The current editor state.
  */
  get state() {
    return this.viewState.state;
  }
  /**
  To be able to display large documents without consuming too much
  memory or overloading the browser, CodeMirror only draws the
  code that is visible (plus a margin around it) to the DOM. This
  property tells you the extent of the current drawn viewport, in
  document positions.
  */
  get viewport() {
    return this.viewState.viewport;
  }
  /**
  When there are, for example, large collapsed ranges in the
  viewport, its size can be a lot bigger than the actual visible
  content. Thus, if you are doing something like styling the
  content in the viewport, it is preferable to only do so for
  these ranges, which are the subset of the viewport that is
  actually drawn.
  */
  get visibleRanges() {
    return this.viewState.visibleRanges;
  }
  /**
  Returns false when the editor is entirely scrolled out of view
  or otherwise hidden.
  */
  get inView() {
    return this.viewState.inView;
  }
  /**
  Indicates whether the user is currently composing text via
  [IME](https://en.wikipedia.org/wiki/Input_method), and at least
  one change has been made in the current composition.
  */
  get composing() {
    return !!this.inputState && this.inputState.composing > 0;
  }
  /**
  Indicates whether the user is currently in composing state. Note
  that on some platforms, like Android, this will be the case a
  lot, since just putting the cursor on a word starts a
  composition there.
  */
  get compositionStarted() {
    return !!this.inputState && this.inputState.composing >= 0;
  }
  /**
  The document or shadow root that the view lives in.
  */
  get root() {
    return this._root;
  }
  /**
  @internal
  */
  get win() {
    return this.dom.ownerDocument.defaultView || window;
  }
  /**
  Construct a new view. You'll want to either provide a `parent`
  option, or put `view.dom` into your document after creating a
  view, so that the user can see the editor.
  */
  constructor(e = {}) {
    var t;
    this.plugins = [], this.pluginMap = /* @__PURE__ */ new Map(), this.editorAttrs = {}, this.contentAttrs = {}, this.bidiCache = [], this.destroyed = !1, this.updateState = 2, this.measureScheduled = -1, this.measureRequests = [], this.contentDOM = document.createElement("div"), this.scrollDOM = document.createElement("div"), this.scrollDOM.tabIndex = -1, this.scrollDOM.className = "cm-scroller", this.scrollDOM.appendChild(this.contentDOM), this.announceDOM = document.createElement("div"), this.announceDOM.className = "cm-announced", this.announceDOM.setAttribute("aria-live", "polite"), this.dom = document.createElement("div"), this.dom.appendChild(this.announceDOM), this.dom.appendChild(this.scrollDOM), e.parent && e.parent.appendChild(this.dom);
    let { dispatch: i } = e;
    this.dispatchTransactions = e.dispatchTransactions || i && ((r) => r.forEach((O) => i(O, this))) || ((r) => this.update(r)), this.dispatch = this.dispatch.bind(this), this._root = e.root || au(e.parent) || document, this.viewState = new Sa(e.state || q.create(e)), e.scrollTo && e.scrollTo.is(sn) && (this.viewState.scrollTarget = e.scrollTo.value.clip(this.viewState.state)), this.plugins = this.state.facet(Mt).map((r) => new Sr(r));
    for (let r of this.plugins)
      r.update(this);
    this.observer = new R$(this), this.inputState = new e$(this), this.inputState.ensureHandlers(this.plugins), this.docView = new sa(this), this.mountStyles(), this.updateAttrs(), this.updateState = 0, this.requestMeasure(), !((t = document.fonts) === null || t === void 0) && t.ready && document.fonts.ready.then(() => {
      this.viewState.mustMeasureContent = !0, this.requestMeasure();
    });
  }
  dispatch(...e) {
    let t = e.length == 1 && e[0] instanceof H ? e : e.length == 1 && Array.isArray(e[0]) ? e[0] : [this.state.update(...e)];
    this.dispatchTransactions(t, this);
  }
  /**
  Update the view for the given array of transactions. This will
  update the visible document and selection to match the state
  produced by the transactions, and notify view plugins of the
  change. You should usually call
  [`dispatch`](https://codemirror.net/6/docs/ref/#view.EditorView.dispatch) instead, which uses this
  as a primitive.
  */
  update(e) {
    if (this.updateState != 0)
      throw new Error("Calls to EditorView.update are not allowed while an update is in progress");
    let t = !1, i = !1, r, O = this.state;
    for (let f of e) {
      if (f.startState != O)
        throw new RangeError("Trying to update state with a transaction that doesn't start from the previous state.");
      O = f.state;
    }
    if (this.destroyed) {
      this.viewState.state = O;
      return;
    }
    let s = this.hasFocus, a = 0, o = null;
    e.some((f) => f.annotation(ac)) ? (this.inputState.notifiedFocused = s, a = 1) : s != this.inputState.notifiedFocused && (this.inputState.notifiedFocused = s, o = oc(O, s), o || (a = 1));
    let l = this.observer.delayedAndroidKey, c = null;
    if (l ? (this.observer.clearDelayedAndroidKey(), c = this.observer.readChange(), (c && !this.state.doc.eq(O.doc) || !this.state.selection.eq(O.selection)) && (c = null)) : this.observer.clear(), O.facet(q.phrases) != this.state.facet(q.phrases))
      return this.setState(O);
    r = Yn.create(this, O, e), r.flags |= a;
    let h = this.viewState.scrollTarget;
    try {
      this.updateState = 2;
      for (let f of e) {
        if (h && (h = h.map(f.changes)), f.scrollIntoView) {
          let { main: u } = f.state.selection;
          h = new Ft(u.empty ? u : S.cursor(u.head, u.head > u.anchor ? -1 : 1));
        }
        for (let u of f.effects)
          u.is(sn) && (h = u.value.clip(this.state));
      }
      this.viewState.update(r, h), this.bidiCache = Un.update(this.bidiCache, r.changes), r.empty || (this.updatePlugins(r), this.inputState.update(r)), t = this.docView.update(r), this.state.facet(Ti) != this.styleModules && this.mountStyles(), i = this.updateAttrs(), this.showAnnouncements(e), this.docView.updateSelection(t, e.some((f) => f.isUserEvent("select.pointer")));
    } finally {
      this.updateState = 0;
    }
    if (r.startState.facet(fn) != r.state.facet(fn) && (this.viewState.mustMeasureContent = !0), (t || i || h || this.viewState.mustEnforceCursorAssoc || this.viewState.mustMeasureContent) && this.requestMeasure(), t && this.docViewUpdate(), !r.empty)
      for (let f of this.state.facet(TO))
        try {
          f(r);
        } catch (u) {
          Se(this.state, u, "update listener");
        }
    (o || c) && Promise.resolve().then(() => {
      o && this.state == o.startState && this.dispatch(o), c && !ec(this, c) && l.force && Nt(this.contentDOM, l.key, l.keyCode);
    });
  }
  /**
  Reset the view to the given state. (This will cause the entire
  document to be redrawn and all view plugins to be reinitialized,
  so you should probably only use it when the new state isn't
  derived from the old state. Otherwise, use
  [`dispatch`](https://codemirror.net/6/docs/ref/#view.EditorView.dispatch) instead.)
  */
  setState(e) {
    if (this.updateState != 0)
      throw new Error("Calls to EditorView.setState are not allowed while an update is in progress");
    if (this.destroyed) {
      this.viewState.state = e;
      return;
    }
    this.updateState = 2;
    let t = this.hasFocus;
    try {
      for (let i of this.plugins)
        i.destroy(this);
      this.viewState = new Sa(e), this.plugins = e.facet(Mt).map((i) => new Sr(i)), this.pluginMap.clear();
      for (let i of this.plugins)
        i.update(this);
      this.docView.destroy(), this.docView = new sa(this), this.inputState.ensureHandlers(this.plugins), this.mountStyles(), this.updateAttrs(), this.bidiCache = [];
    } finally {
      this.updateState = 0;
    }
    t && this.focus(), this.requestMeasure();
  }
  updatePlugins(e) {
    let t = e.startState.facet(Mt), i = e.state.facet(Mt);
    if (t != i) {
      let r = [];
      for (let O of i) {
        let s = t.indexOf(O);
        if (s < 0)
          r.push(new Sr(O));
        else {
          let a = this.plugins[s];
          a.mustUpdate = e, r.push(a);
        }
      }
      for (let O of this.plugins)
        O.mustUpdate != e && O.destroy(this);
      this.plugins = r, this.pluginMap.clear();
    } else
      for (let r of this.plugins)
        r.mustUpdate = e;
    for (let r = 0; r < this.plugins.length; r++)
      this.plugins[r].update(this);
    t != i && this.inputState.ensureHandlers(this.plugins);
  }
  docViewUpdate() {
    for (let e of this.plugins) {
      let t = e.value;
      if (t && t.docViewUpdate)
        try {
          t.docViewUpdate(this);
        } catch (i) {
          Se(this.state, i, "doc view update listener");
        }
    }
  }
  /**
  @internal
  */
  measure(e = !0) {
    if (this.destroyed)
      return;
    if (this.measureScheduled > -1 && this.win.cancelAnimationFrame(this.measureScheduled), this.observer.delayedAndroidKey) {
      this.measureScheduled = -1, this.requestMeasure();
      return;
    }
    this.measureScheduled = 0, e && this.observer.forceFlush();
    let t = null, i = this.scrollDOM, r = i.scrollTop * this.scaleY, { scrollAnchorPos: O, scrollAnchorHeight: s } = this.viewState;
    Math.abs(r - this.viewState.scrollTop) > 1 && (s = -1), this.viewState.scrollAnchorHeight = -1;
    try {
      for (let a = 0; ; a++) {
        if (s < 0)
          if (Xl(i))
            O = -1, s = this.viewState.heightMap.height;
          else {
            let u = this.viewState.scrollAnchorAt(r);
            O = u.from, s = u.top;
          }
        this.updateState = 1;
        let o = this.viewState.measure(this);
        if (!o && !this.measureRequests.length && this.viewState.scrollTarget == null)
          break;
        if (a > 5) {
          console.warn(this.measureRequests.length ? "Measure loop restarted more than 5 times" : "Viewport failed to stabilize");
          break;
        }
        let l = [];
        o & 4 || ([this.measureRequests, l] = [l, this.measureRequests]);
        let c = l.map((u) => {
          try {
            return u.read(this);
          } catch (d) {
            return Se(this.state, d), wa;
          }
        }), h = Yn.create(this, this.state, []), f = !1;
        h.flags |= o, t ? t.flags |= o : t = h, this.updateState = 2, h.empty || (this.updatePlugins(h), this.inputState.update(h), this.updateAttrs(), f = this.docView.update(h), f && this.docViewUpdate());
        for (let u = 0; u < l.length; u++)
          if (c[u] != wa)
            try {
              let d = l[u];
              d.write && d.write(c[u], this);
            } catch (d) {
              Se(this.state, d);
            }
        if (f && this.docView.updateSelection(!0), !h.viewportChanged && this.measureRequests.length == 0) {
          if (this.viewState.editorHeight)
            if (this.viewState.scrollTarget) {
              this.docView.scrollIntoView(this.viewState.scrollTarget), this.viewState.scrollTarget = null, s = -1;
              continue;
            } else {
              let d = (O < 0 ? this.viewState.heightMap.height : this.viewState.lineBlockAt(O).top) - s;
              if (d > 1 || d < -1) {
                r = r + d, i.scrollTop = r / this.scaleY, s = -1;
                continue;
              }
            }
          break;
        }
      }
    } finally {
      this.updateState = 0, this.measureScheduled = -1;
    }
    if (t && !t.empty)
      for (let a of this.state.facet(TO))
        a(t);
  }
  /**
  Get the CSS classes for the currently active editor themes.
  */
  get themeClasses() {
    return kO + " " + (this.state.facet(xO) ? fc : hc) + " " + this.state.facet(fn);
  }
  updateAttrs() {
    let e = xa(this, Ll, {
      class: "cm-editor" + (this.hasFocus ? " cm-focused " : " ") + this.themeClasses
    }), t = {
      spellcheck: "false",
      autocorrect: "off",
      autocapitalize: "off",
      writingsuggestions: "false",
      translate: "no",
      contenteditable: this.state.facet(it) ? "true" : "false",
      class: "cm-content",
      style: `${b.tabSize}: ${this.state.tabSize}`,
      role: "textbox",
      "aria-multiline": "true"
    };
    this.state.readOnly && (t["aria-readonly"] = "true"), xa(this, as, t);
    let i = this.observer.ignore(() => {
      let r = ea(this.contentDOM, this.contentAttrs, t), O = ea(this.dom, this.editorAttrs, e);
      return r || O;
    });
    return this.editorAttrs = e, this.contentAttrs = t, i;
  }
  showAnnouncements(e) {
    let t = !0;
    for (let i of e)
      for (let r of i.effects)
        if (r.is(k.announce)) {
          t && (this.announceDOM.textContent = ""), t = !1;
          let O = this.announceDOM.appendChild(document.createElement("div"));
          O.textContent = r.value;
        }
  }
  mountStyles() {
    this.styleModules = this.state.facet(Ti);
    let e = this.state.facet(k.cspNonce);
    Qt.mount(this.root, this.styleModules.concat(v$).reverse(), e ? { nonce: e } : void 0);
  }
  readMeasured() {
    if (this.updateState == 2)
      throw new Error("Reading the editor layout isn't allowed during an update");
    this.updateState == 0 && this.measureScheduled > -1 && this.measure(!1);
  }
  /**
  Schedule a layout measurement, optionally providing callbacks to
  do custom DOM measuring followed by a DOM write phase. Using
  this is preferable reading DOM layout directly from, for
  example, an event handler, because it'll make sure measuring and
  drawing done by other components is synchronized, avoiding
  unnecessary DOM layout computations.
  */
  requestMeasure(e) {
    if (this.measureScheduled < 0 && (this.measureScheduled = this.win.requestAnimationFrame(() => this.measure())), e) {
      if (this.measureRequests.indexOf(e) > -1)
        return;
      if (e.key != null) {
        for (let t = 0; t < this.measureRequests.length; t++)
          if (this.measureRequests[t].key === e.key) {
            this.measureRequests[t] = e;
            return;
          }
      }
      this.measureRequests.push(e);
    }
  }
  /**
  Get the value of a specific plugin, if present. Note that
  plugins that crash can be dropped from a view, so even when you
  know you registered a given plugin, it is recommended to check
  the return value of this method.
  */
  plugin(e) {
    let t = this.pluginMap.get(e);
    return (t === void 0 || t && t.plugin != e) && this.pluginMap.set(e, t = this.plugins.find((i) => i.plugin == e) || null), t && t.update(this).value;
  }
  /**
  The top position of the document, in screen coordinates. This
  may be negative when the editor is scrolled down. Points
  directly to the top of the first line, not above the padding.
  */
  get documentTop() {
    return this.contentDOM.getBoundingClientRect().top + this.viewState.paddingTop;
  }
  /**
  Reports the padding above and below the document.
  */
  get documentPadding() {
    return { top: this.viewState.paddingTop, bottom: this.viewState.paddingBottom };
  }
  /**
  If the editor is transformed with CSS, this provides the scale
  along the X axis. Otherwise, it will just be 1. Note that
  transforms other than translation and scaling are not supported.
  */
  get scaleX() {
    return this.viewState.scaleX;
  }
  /**
  Provide the CSS transformed scale along the Y axis.
  */
  get scaleY() {
    return this.viewState.scaleY;
  }
  /**
  Find the text line or block widget at the given vertical
  position (which is interpreted as relative to the [top of the
  document](https://codemirror.net/6/docs/ref/#view.EditorView.documentTop)).
  */
  elementAtHeight(e) {
    return this.readMeasured(), this.viewState.elementAtHeight(e);
  }
  /**
  Find the line block (see
  [`lineBlockAt`](https://codemirror.net/6/docs/ref/#view.EditorView.lineBlockAt)) at the given
  height, again interpreted relative to the [top of the
  document](https://codemirror.net/6/docs/ref/#view.EditorView.documentTop).
  */
  lineBlockAtHeight(e) {
    return this.readMeasured(), this.viewState.lineBlockAtHeight(e);
  }
  /**
  Get the extent and vertical position of all [line
  blocks](https://codemirror.net/6/docs/ref/#view.EditorView.lineBlockAt) in the viewport. Positions
  are relative to the [top of the
  document](https://codemirror.net/6/docs/ref/#view.EditorView.documentTop);
  */
  get viewportLineBlocks() {
    return this.viewState.viewportLines;
  }
  /**
  Find the line block around the given document position. A line
  block is a range delimited on both sides by either a
  non-[hidden](https://codemirror.net/6/docs/ref/#view.Decoration^replace) line break, or the
  start/end of the document. It will usually just hold a line of
  text, but may be broken into multiple textblocks by block
  widgets.
  */
  lineBlockAt(e) {
    return this.viewState.lineBlockAt(e);
  }
  /**
  The editor's total content height.
  */
  get contentHeight() {
    return this.viewState.contentHeight;
  }
  /**
  Move a cursor position by [grapheme
  cluster](https://codemirror.net/6/docs/ref/#state.findClusterBreak). `forward` determines whether
  the motion is away from the line start, or towards it. In
  bidirectional text, the line is traversed in visual order, using
  the editor's [text direction](https://codemirror.net/6/docs/ref/#view.EditorView.textDirection).
  When the start position was the last one on the line, the
  returned position will be across the line break. If there is no
  further line, the original position is returned.
  
  By default, this method moves over a single cluster. The
  optional `by` argument can be used to move across more. It will
  be called with the first cluster as argument, and should return
  a predicate that determines, for each subsequent cluster,
  whether it should also be moved over.
  */
  moveByChar(e, t, i) {
    return br(this, e, aa(this, e, t, i));
  }
  /**
  Move a cursor position across the next group of either
  [letters](https://codemirror.net/6/docs/ref/#state.EditorState.charCategorizer) or non-letter
  non-whitespace characters.
  */
  moveByGroup(e, t) {
    return br(this, e, aa(this, e, t, (i) => Lu(this, e.head, i)));
  }
  /**
  Get the cursor position visually at the start or end of a line.
  Note that this may differ from the _logical_ position at its
  start or end (which is simply at `line.from`/`line.to`) if text
  at the start or end goes against the line's base text direction.
  */
  visualLineSide(e, t) {
    let i = this.bidiSpans(e), r = this.textDirectionAt(e.from), O = i[t ? i.length - 1 : 0];
    return S.cursor(O.side(t, r) + e.from, O.forward(!t, r) ? 1 : -1);
  }
  /**
  Move to the next line boundary in the given direction. If
  `includeWrap` is true, line wrapping is on, and there is a
  further wrap point on the current line, the wrap point will be
  returned. Otherwise this function will return the start or end
  of the line.
  */
  moveToLineBoundary(e, t, i = !0) {
    return Eu(this, e, t, i);
  }
  /**
  Move a cursor position vertically. When `distance` isn't given,
  it defaults to moving to the next line (including wrapped
  lines). Otherwise, `distance` should provide a positive distance
  in pixels.
  
  When `start` has a
  [`goalColumn`](https://codemirror.net/6/docs/ref/#state.SelectionRange.goalColumn), the vertical
  motion will use that as a target horizontal position. Otherwise,
  the cursor's own horizontal position is used. The returned
  cursor will have its goal column set to whichever column was
  used.
  */
  moveVertically(e, t, i) {
    return br(this, e, Du(this, e, t, i));
  }
  /**
  Find the DOM parent node and offset (child offset if `node` is
  an element, character offset when it is a text node) at the
  given document position.
  
  Note that for positions that aren't currently in
  `visibleRanges`, the resulting DOM position isn't necessarily
  meaningful (it may just point before or after a placeholder
  element).
  */
  domAtPos(e, t = 1) {
    return this.docView.domAtPos(e, t);
  }
  /**
  Find the document position at the given DOM node. Can be useful
  for associating positions with DOM events. Will raise an error
  when `node` isn't part of the editor content.
  */
  posAtDOM(e, t = 0) {
    return this.docView.posFromDOM(e, t);
  }
  posAtCoords(e, t = !0) {
    this.readMeasured();
    let i = bO(this, e, t);
    return i && i.pos;
  }
  posAndSideAtCoords(e, t = !0) {
    return this.readMeasured(), bO(this, e, t);
  }
  /**
  Get the screen coordinates at the given document position.
  `side` determines whether the coordinates are based on the
  element before (-1) or after (1) the position (if no element is
  available on the given side, the method will transparently use
  another strategy to get reasonable coordinates).
  */
  coordsAtPos(e, t = 1) {
    this.readMeasured();
    let i = this.docView.coordsAt(e, t);
    if (!i || i.left == i.right)
      return i;
    let r = this.state.doc.lineAt(e), O = this.bidiSpans(r), s = O[nt.find(O, e - r.from, -1, t)];
    return qi(i, s.dir == B.LTR == t > 0);
  }
  /**
  Return the rectangle around a given character. If `pos` does not
  point in front of a character that is in the viewport and
  rendered (i.e. not replaced, not a line break), this will return
  null. For space characters that are a line wrap point, this will
  return the position before the line break.
  */
  coordsForChar(e) {
    return this.readMeasured(), this.docView.coordsForChar(e);
  }
  /**
  The default width of a character in the editor. May not
  accurately reflect the width of all characters (given variable
  width fonts or styling of invididual ranges).
  */
  get defaultCharacterWidth() {
    return this.viewState.heightOracle.charWidth;
  }
  /**
  The default height of a line in the editor. May not be accurate
  for all lines.
  */
  get defaultLineHeight() {
    return this.viewState.heightOracle.lineHeight;
  }
  /**
  The text direction
  ([`direction`](https://developer.mozilla.org/en-US/docs/Web/CSS/direction)
  CSS property) of the editor's content element.
  */
  get textDirection() {
    return this.viewState.defaultTextDirection;
  }
  /**
  Find the text direction of the block at the given position, as
  assigned by CSS. If
  [`perLineTextDirection`](https://codemirror.net/6/docs/ref/#view.EditorView^perLineTextDirection)
  isn't enabled, or the given position is outside of the viewport,
  this will always return the same as
  [`textDirection`](https://codemirror.net/6/docs/ref/#view.EditorView.textDirection). Note that
  this may trigger a DOM layout.
  */
  textDirectionAt(e) {
    return !this.state.facet(jl) || e < this.viewport.from || e > this.viewport.to ? this.textDirection : (this.readMeasured(), this.docView.textDirectionAt(e));
  }
  /**
  Whether this editor [wraps lines](https://codemirror.net/6/docs/ref/#view.EditorView.lineWrapping)
  (as determined by the
  [`white-space`](https://developer.mozilla.org/en-US/docs/Web/CSS/white-space)
  CSS property of its content element).
  */
  get lineWrapping() {
    return this.viewState.heightOracle.lineWrapping;
  }
  /**
  Returns the bidirectional text structure of the given line
  (which should be in the current document) as an array of span
  objects. The order of these spans matches the [text
  direction](https://codemirror.net/6/docs/ref/#view.EditorView.textDirection)—if that is
  left-to-right, the leftmost spans come first, otherwise the
  rightmost spans come first.
  */
  bidiSpans(e) {
    if (e.length > Y$)
      return Yl(e.length);
    let t = this.textDirectionAt(e.from), i;
    for (let O of this.bidiCache)
      if (O.from == e.from && O.dir == t && (O.fresh || _l(O.isolates, i = na(this, e))))
        return O.order;
    i || (i = na(this, e));
    let r = du(e.text, t, i);
    return this.bidiCache.push(new Un(e.from, e.to, t, i, !0, r)), r;
  }
  /**
  Check whether the editor has focus.
  */
  get hasFocus() {
    var e;
    return (this.dom.ownerDocument.hasFocus() || b.safari && ((e = this.inputState) === null || e === void 0 ? void 0 : e.lastContextMenu) > Date.now() - 3e4) && this.root.activeElement == this.contentDOM;
  }
  /**
  Put focus on the editor.
  */
  focus() {
    this.observer.ignore(() => {
      kl(this.contentDOM), this.docView.updateSelection();
    });
  }
  /**
  Update the [root](https://codemirror.net/6/docs/ref/##view.EditorViewConfig.root) in which the editor lives. This is only
  necessary when moving the editor's existing DOM to a new window or shadow root.
  */
  setRoot(e) {
    this._root != e && (this._root = e, this.observer.setWindow((e.nodeType == 9 ? e : e.ownerDocument).defaultView || window), this.mountStyles());
  }
  /**
  Clean up this editor view, removing its element from the
  document, unregistering event handlers, and notifying
  plugins. The view instance can no longer be used after
  calling this.
  */
  destroy() {
    this.root.activeElement == this.contentDOM && this.contentDOM.blur();
    for (let e of this.plugins)
      e.destroy(this);
    this.plugins = [], this.inputState.destroy(), this.docView.destroy(), this.dom.remove(), this.observer.destroy(), this.measureScheduled > -1 && this.win.cancelAnimationFrame(this.measureScheduled), this.destroyed = !0;
  }
  /**
  Returns an effect that can be
  [added](https://codemirror.net/6/docs/ref/#state.TransactionSpec.effects) to a transaction to
  cause it to scroll the given position or range into view.
  */
  static scrollIntoView(e, t = {}) {
    return sn.of(new Ft(typeof e == "number" ? S.cursor(e) : e, t.y, t.x, t.yMargin, t.xMargin));
  }
  /**
  Return an effect that resets the editor to its current (at the
  time this method was called) scroll position. Note that this
  only affects the editor's own scrollable element, not parents.
  See also
  [`EditorViewConfig.scrollTo`](https://codemirror.net/6/docs/ref/#view.EditorViewConfig.scrollTo).
  
  The effect should be used with a document identical to the one
  it was created for. Failing to do so is not an error, but may
  not scroll to the expected position. You can
  [map](https://codemirror.net/6/docs/ref/#state.StateEffect.map) the effect to account for changes.
  */
  scrollSnapshot() {
    let { scrollTop: e, scrollLeft: t } = this.scrollDOM, i = this.viewState.scrollAnchorAt(e);
    return sn.of(new Ft(S.cursor(i.from), "start", "start", i.top - e, t, !0));
  }
  /**
  Enable or disable tab-focus mode, which disables key bindings
  for Tab and Shift-Tab, letting the browser's default
  focus-changing behavior go through instead. This is useful to
  prevent trapping keyboard users in your editor.
  
  Without argument, this toggles the mode. With a boolean, it
  enables (true) or disables it (false). Given a number, it
  temporarily enables the mode until that number of milliseconds
  have passed or another non-Tab key is pressed.
  */
  setTabFocusMode(e) {
    e == null ? this.inputState.tabFocusMode = this.inputState.tabFocusMode < 0 ? 0 : -1 : typeof e == "boolean" ? this.inputState.tabFocusMode = e ? 0 : -1 : this.inputState.tabFocusMode != 0 && (this.inputState.tabFocusMode = Date.now() + e);
  }
  /**
  Returns an extension that can be used to add DOM event handlers.
  The value should be an object mapping event names to handler
  functions. For any given event, such functions are ordered by
  extension precedence, and the first handler to return true will
  be assumed to have handled that event, and no other handlers or
  built-in behavior will be activated for it. These are registered
  on the [content element](https://codemirror.net/6/docs/ref/#view.EditorView.contentDOM), except
  for `scroll` handlers, which will be called any time the
  editor's [scroll element](https://codemirror.net/6/docs/ref/#view.EditorView.scrollDOM) or one of
  its parent nodes is scrolled.
  */
  static domEventHandlers(e) {
    return Pe.define(() => ({}), { eventHandlers: e });
  }
  /**
  Create an extension that registers DOM event observers. Contrary
  to event [handlers](https://codemirror.net/6/docs/ref/#view.EditorView^domEventHandlers),
  observers can't be prevented from running by a higher-precedence
  handler returning true. They also don't prevent other handlers
  and observers from running when they return true, and should not
  call `preventDefault`.
  */
  static domEventObservers(e) {
    return Pe.define(() => ({}), { eventObservers: e });
  }
  /**
  Create a theme extension. The first argument can be a
  [`style-mod`](https://github.com/marijnh/style-mod#documentation)
  style spec providing the styles for the theme. These will be
  prefixed with a generated class for the style.
  
  Because the selectors will be prefixed with a scope class, rule
  that directly match the editor's [wrapper
  element](https://codemirror.net/6/docs/ref/#view.EditorView.dom)—to which the scope class will be
  added—need to be explicitly differentiated by adding an `&` to
  the selector for that element—for example
  `&.cm-focused`.
  
  When `dark` is set to true, the theme will be marked as dark,
  which will cause the `&dark` rules from [base
  themes](https://codemirror.net/6/docs/ref/#view.EditorView^baseTheme) to be used (as opposed to
  `&light` when a light theme is active).
  */
  static theme(e, t) {
    let i = Qt.newName(), r = [fn.of(i), Ti.of(XO(`.${i}`, e))];
    return t && t.dark && r.push(xO.of(!0)), r;
  }
  /**
  Create an extension that adds styles to the base theme. Like
  with [`theme`](https://codemirror.net/6/docs/ref/#view.EditorView^theme), use `&` to indicate the
  place of the editor wrapper element when directly targeting
  that. You can also use `&dark` or `&light` instead to only
  target editors with a dark or light theme.
  */
  static baseTheme(e) {
    return li.lowest(Ti.of(XO("." + kO, e, uc)));
  }
  /**
  Retrieve an editor view instance from the view's DOM
  representation.
  */
  static findFromDOM(e) {
    var t;
    let i = e.querySelector(".cm-content"), r = i && K.get(i) || K.get(e);
    return ((t = r == null ? void 0 : r.root) === null || t === void 0 ? void 0 : t.view) || null;
  }
}
k.styleModule = Ti;
k.inputHandler = Al;
k.clipboardInputFilter = Os;
k.clipboardOutputFilter = ss;
k.scrollHandler = Ml;
k.focusChangeEffect = Gl;
k.perLineTextDirection = jl;
k.exceptionSink = Ul;
k.updateListener = TO;
k.editable = it;
k.mouseSelectionStyle = Cl;
k.dragMovesSelection = ql;
k.clickAddsSelectionRange = Wl;
k.decorations = rr;
k.blockWrappers = Dl;
k.outerDecorations = os;
k.atomicRanges = Fi;
k.bidiIsolatedRanges = Bl;
k.scrollMargins = Il;
k.darkTheme = xO;
k.cspNonce = /* @__PURE__ */ w.define({ combine: (n) => n.length ? n[0] : "" });
k.contentAttributes = as;
k.editorAttributes = Ll;
k.lineWrapping = /* @__PURE__ */ k.contentAttributes.of({ class: "cm-lineWrapping" });
k.announce = /* @__PURE__ */ U.define();
const Y$ = 4096, wa = {};
class Un {
  constructor(e, t, i, r, O, s) {
    this.from = e, this.to = t, this.dir = i, this.isolates = r, this.fresh = O, this.order = s;
  }
  static update(e, t) {
    if (t.empty && !e.some((O) => O.fresh))
      return e;
    let i = [], r = e.length ? e[e.length - 1].dir : B.LTR;
    for (let O = Math.max(0, e.length - 10); O < e.length; O++) {
      let s = e[O];
      s.dir == r && !t.touchesRange(s.from, s.to) && i.push(new Un(t.mapPos(s.from, 1), t.mapPos(s.to, -1), s.dir, s.isolates, !1, s.order));
    }
    return i;
  }
}
function xa(n, e, t) {
  for (let i = n.state.facet(e), r = i.length - 1; r >= 0; r--) {
    let O = i[r], s = typeof O == "function" ? O(n) : O;
    s && is(s, t);
  }
  return t;
}
const V$ = b.mac ? "mac" : b.windows ? "win" : b.linux ? "linux" : "key";
function W$(n, e) {
  const t = n.split(/-(?!$)/);
  let i = t[t.length - 1];
  i == "Space" && (i = " ");
  let r, O, s, a;
  for (let o = 0; o < t.length - 1; ++o) {
    const l = t[o];
    if (/^(cmd|meta|m)$/i.test(l))
      a = !0;
    else if (/^a(lt)?$/i.test(l))
      r = !0;
    else if (/^(c|ctrl|control)$/i.test(l))
      O = !0;
    else if (/^s(hift)?$/i.test(l))
      s = !0;
    else if (/^mod$/i.test(l))
      e == "mac" ? a = !0 : O = !0;
    else
      throw new Error("Unrecognized modifier name: " + l);
  }
  return r && (i = "Alt-" + i), O && (i = "Ctrl-" + i), a && (i = "Meta-" + i), s && (i = "Shift-" + i), i;
}
function un(n, e, t) {
  return e.altKey && (n = "Alt-" + n), e.ctrlKey && (n = "Ctrl-" + n), e.metaKey && (n = "Meta-" + n), t !== !1 && e.shiftKey && (n = "Shift-" + n), n;
}
const q$ = /* @__PURE__ */ li.default(/* @__PURE__ */ k.domEventHandlers({
  keydown(n, e) {
    return G$(C$(e.state), n, e, "editor");
  }
})), or = /* @__PURE__ */ w.define({ enables: q$ }), ka = /* @__PURE__ */ new WeakMap();
function C$(n) {
  let e = n.facet(or), t = ka.get(e);
  return t || ka.set(e, t = A$(e.reduce((i, r) => i.concat(r), []))), t;
}
let ut = null;
const U$ = 4e3;
function A$(n, e = V$) {
  let t = /* @__PURE__ */ Object.create(null), i = /* @__PURE__ */ Object.create(null), r = (s, a) => {
    let o = i[s];
    if (o == null)
      i[s] = a;
    else if (o != a)
      throw new Error("Key binding " + s + " is used both as a regular binding and as a multi-stroke prefix");
  }, O = (s, a, o, l, c) => {
    var h, f;
    let u = t[s] || (t[s] = /* @__PURE__ */ Object.create(null)), d = a.split(/ (?!$)/).map((m) => W$(m, e));
    for (let m = 1; m < d.length; m++) {
      let g = d.slice(0, m).join(" ");
      r(g, !0), u[g] || (u[g] = {
        preventDefault: !0,
        stopPropagation: !1,
        run: [(T) => {
          let v = ut = { view: T, prefix: g, scope: s };
          return setTimeout(() => {
            ut == v && (ut = null);
          }, U$), !0;
        }]
      });
    }
    let p = d.join(" ");
    r(p, !1);
    let Q = u[p] || (u[p] = {
      preventDefault: !1,
      stopPropagation: !1,
      run: ((f = (h = u._any) === null || h === void 0 ? void 0 : h.run) === null || f === void 0 ? void 0 : f.slice()) || []
    });
    o && Q.run.push(o), l && (Q.preventDefault = !0), c && (Q.stopPropagation = !0);
  };
  for (let s of n) {
    let a = s.scope ? s.scope.split(" ") : ["editor"];
    if (s.any)
      for (let l of a) {
        let c = t[l] || (t[l] = /* @__PURE__ */ Object.create(null));
        c._any || (c._any = { preventDefault: !1, stopPropagation: !1, run: [] });
        let { any: h } = s;
        for (let f in c)
          c[f].run.push((u) => h(u, vO));
      }
    let o = s[e] || s.key;
    if (o)
      for (let l of a)
        O(l, o, s.run, s.preventDefault, s.stopPropagation), s.shift && O(l, "Shift-" + o, s.shift, s.preventDefault, s.stopPropagation);
  }
  return t;
}
let vO = null;
function G$(n, e, t, i) {
  vO = e;
  let r = vf(e), O = be(r, 0), s = tt(O) == r.length && r != " ", a = "", o = !1, l = !1, c = !1;
  ut && ut.view == t && ut.scope == i && (a = ut.prefix + " ", nc.indexOf(e.keyCode) < 0 && (l = !0, ut = null));
  let h = /* @__PURE__ */ new Set(), f = (Q) => {
    if (Q) {
      for (let m of Q.run)
        if (!h.has(m) && (h.add(m), m(t)))
          return Q.stopPropagation && (c = !0), !0;
      Q.preventDefault && (Q.stopPropagation && (c = !0), l = !0);
    }
    return !1;
  }, u = n[i], d, p;
  return u && (f(u[a + un(r, e, !s)]) ? o = !0 : s && (e.altKey || e.metaKey || e.ctrlKey) && // Ctrl-Alt may be used for AltGr on Windows
  !(b.windows && e.ctrlKey && e.altKey) && // Alt-combinations on macOS tend to be typed characters
  !(b.mac && e.altKey && !(e.ctrlKey || e.metaKey)) && (d = Zf[e.keyCode]) && d != r ? (f(u[a + un(d, e, !0)]) || e.shiftKey && (p = Rf[e.keyCode]) != r && p != d && f(u[a + un(p, e, !1)])) && (o = !0) : s && e.shiftKey && f(u[a + un(r, e, !0)]) && (o = !0), !o && f(u._any) && (o = !0)), l && (o = !0), o && c && e.stopPropagation(), vO = null, o;
}
function j$() {
  return E$;
}
const M$ = /* @__PURE__ */ Y.line({ class: "cm-activeLine" }), E$ = /* @__PURE__ */ Pe.fromClass(class {
  constructor(n) {
    this.decorations = this.getDeco(n);
  }
  update(n) {
    (n.docChanged || n.selectionSet) && (this.decorations = this.getDeco(n.view));
  }
  getDeco(n) {
    let e = -1, t = [];
    for (let i of n.state.selection.ranges) {
      let r = n.lineBlockAt(i.head);
      r.from > e && (t.push(M$.range(r.from)), e = r.from);
    }
    return Y.set(t);
  }
}, {
  decorations: (n) => n.decorations
});
class L$ extends Pt {
  constructor(e) {
    super(), this.content = e;
  }
  toDOM(e) {
    let t = document.createElement("span");
    return t.className = "cm-placeholder", t.style.pointerEvents = "none", t.appendChild(typeof this.content == "string" ? document.createTextNode(this.content) : typeof this.content == "function" ? this.content(e) : this.content.cloneNode(!0)), t.setAttribute("aria-hidden", "true"), t;
  }
  coordsAt(e) {
    let t = e.firstChild ? vi(e.firstChild) : [];
    if (!t.length)
      return null;
    let i = window.getComputedStyle(e.parentNode), r = qi(t[0], i.direction != "rtl"), O = parseInt(i.lineHeight);
    return r.bottom - r.top > O * 1.5 ? { left: r.left, right: r.right, top: r.top, bottom: r.top + O } : r;
  }
  ignoreEvent() {
    return !1;
  }
}
function D$(n) {
  let e = Pe.fromClass(class {
    constructor(t) {
      this.view = t, this.placeholder = n ? Y.set([Y.widget({ widget: new L$(n), side: 1 }).range(0)]) : Y.none;
    }
    get decorations() {
      return this.view.state.doc.length ? Y.none : this.placeholder;
    }
  }, { decorations: (t) => t.decorations });
  return typeof n == "string" ? [
    e,
    k.contentAttributes.of({ "aria-placeholder": n })
  ] : e;
}
const $n = "-10000px";
class B$ {
  constructor(e, t, i, r) {
    this.facet = t, this.createTooltipView = i, this.removeTooltipView = r, this.input = e.state.facet(t), this.tooltips = this.input.filter((s) => s);
    let O = null;
    this.tooltipViews = this.tooltips.map((s) => O = i(s, O));
  }
  update(e, t) {
    var i;
    let r = e.state.facet(this.facet), O = r.filter((o) => o);
    if (r === this.input) {
      for (let o of this.tooltipViews)
        o.update && o.update(e);
      return !1;
    }
    let s = [], a = t ? [] : null;
    for (let o = 0; o < O.length; o++) {
      let l = O[o], c = -1;
      if (l) {
        for (let h = 0; h < this.tooltips.length; h++) {
          let f = this.tooltips[h];
          f && f.create == l.create && (c = h);
        }
        if (c < 0)
          s[o] = this.createTooltipView(l, o ? s[o - 1] : null), a && (a[o] = !!l.above);
        else {
          let h = s[o] = this.tooltipViews[c];
          a && (a[o] = t[c]), h.update && h.update(e);
        }
      }
    }
    for (let o of this.tooltipViews)
      s.indexOf(o) < 0 && (this.removeTooltipView(o), (i = o.destroy) === null || i === void 0 || i.call(o));
    return t && (a.forEach((o, l) => t[l] = o), t.length = a.length), this.input = r, this.tooltips = O, this.tooltipViews = s, !0;
  }
}
function I$(n) {
  let e = n.dom.ownerDocument.documentElement;
  return { top: 0, left: 0, bottom: e.clientHeight, right: e.clientWidth };
}
const kr = /* @__PURE__ */ w.define({
  combine: (n) => {
    var e, t, i;
    return {
      position: b.ios ? "absolute" : ((e = n.find((r) => r.position)) === null || e === void 0 ? void 0 : e.position) || "fixed",
      parent: ((t = n.find((r) => r.parent)) === null || t === void 0 ? void 0 : t.parent) || null,
      tooltipSpace: ((i = n.find((r) => r.tooltipSpace)) === null || i === void 0 ? void 0 : i.tooltipSpace) || I$
    };
  }
}), Xa = /* @__PURE__ */ new WeakMap(), $c = /* @__PURE__ */ Pe.fromClass(class {
  constructor(n) {
    this.view = n, this.above = [], this.inView = !0, this.madeAbsolute = !1, this.lastTransaction = 0, this.measureTimeout = -1;
    let e = n.state.facet(kr);
    this.position = e.position, this.parent = e.parent, this.classes = n.themeClasses, this.createContainer(), this.measureReq = { read: this.readMeasure.bind(this), write: this.writeMeasure.bind(this), key: this }, this.resizeObserver = typeof ResizeObserver == "function" ? new ResizeObserver(() => this.measureSoon()) : null, this.manager = new B$(n, dc, (t, i) => this.createTooltip(t, i), (t) => {
      this.resizeObserver && this.resizeObserver.unobserve(t.dom), t.dom.remove();
    }), this.above = this.manager.tooltips.map((t) => !!t.above), this.intersectionObserver = typeof IntersectionObserver == "function" ? new IntersectionObserver((t) => {
      Date.now() > this.lastTransaction - 50 && t.length > 0 && t[t.length - 1].intersectionRatio < 1 && this.measureSoon();
    }, { threshold: [1] }) : null, this.observeIntersection(), n.win.addEventListener("resize", this.measureSoon = this.measureSoon.bind(this)), this.maybeMeasure();
  }
  createContainer() {
    this.parent ? (this.container = document.createElement("div"), this.container.style.position = "relative", this.container.className = this.view.themeClasses, this.parent.appendChild(this.container)) : this.container = this.view.dom;
  }
  observeIntersection() {
    if (this.intersectionObserver) {
      this.intersectionObserver.disconnect();
      for (let n of this.manager.tooltipViews)
        this.intersectionObserver.observe(n.dom);
    }
  }
  measureSoon() {
    this.measureTimeout < 0 && (this.measureTimeout = setTimeout(() => {
      this.measureTimeout = -1, this.maybeMeasure();
    }, 50));
  }
  update(n) {
    n.transactions.length && (this.lastTransaction = Date.now());
    let e = this.manager.update(n, this.above);
    e && this.observeIntersection();
    let t = e || n.geometryChanged, i = n.state.facet(kr);
    if (i.position != this.position && !this.madeAbsolute) {
      this.position = i.position;
      for (let r of this.manager.tooltipViews)
        r.dom.style.position = this.position;
      t = !0;
    }
    if (i.parent != this.parent) {
      this.parent && this.container.remove(), this.parent = i.parent, this.createContainer();
      for (let r of this.manager.tooltipViews)
        this.container.appendChild(r.dom);
      t = !0;
    } else this.parent && this.view.themeClasses != this.classes && (this.classes = this.container.className = this.view.themeClasses);
    t && this.maybeMeasure();
  }
  createTooltip(n, e) {
    let t = n.create(this.view), i = e ? e.dom : null;
    if (t.dom.classList.add("cm-tooltip"), n.arrow && !t.dom.querySelector(".cm-tooltip > .cm-tooltip-arrow")) {
      let r = document.createElement("div");
      r.className = "cm-tooltip-arrow", t.dom.appendChild(r);
    }
    return t.dom.style.position = this.position, t.dom.style.top = $n, t.dom.style.left = "0px", this.container.insertBefore(t.dom, i), t.mount && t.mount(this.view), this.resizeObserver && this.resizeObserver.observe(t.dom), t;
  }
  destroy() {
    var n, e, t;
    this.view.win.removeEventListener("resize", this.measureSoon);
    for (let i of this.manager.tooltipViews)
      i.dom.remove(), (n = i.destroy) === null || n === void 0 || n.call(i);
    this.parent && this.container.remove(), (e = this.resizeObserver) === null || e === void 0 || e.disconnect(), (t = this.intersectionObserver) === null || t === void 0 || t.disconnect(), clearTimeout(this.measureTimeout);
  }
  readMeasure() {
    let n = 1, e = 1, t = !1;
    if (this.position == "fixed" && this.manager.tooltipViews.length) {
      let { dom: O } = this.manager.tooltipViews[0];
      if (b.safari) {
        let s = O.getBoundingClientRect();
        t = Math.abs(s.top + 1e4) > 1 || Math.abs(s.left) > 1;
      } else
        t = !!O.offsetParent && O.offsetParent != this.container.ownerDocument.body;
    }
    if (t || this.position == "absolute")
      if (this.parent) {
        let O = this.parent.getBoundingClientRect();
        O.width && O.height && (n = O.width / this.parent.offsetWidth, e = O.height / this.parent.offsetHeight);
      } else
        ({ scaleX: n, scaleY: e } = this.view.viewState);
    let i = this.view.scrollDOM.getBoundingClientRect(), r = ls(this.view);
    return {
      visible: {
        left: i.left + r.left,
        top: i.top + r.top,
        right: i.right - r.right,
        bottom: i.bottom - r.bottom
      },
      parent: this.parent ? this.container.getBoundingClientRect() : this.view.dom.getBoundingClientRect(),
      pos: this.manager.tooltips.map((O, s) => {
        let a = this.manager.tooltipViews[s];
        return a.getCoords ? a.getCoords(O.pos) : this.view.coordsAtPos(O.pos);
      }),
      size: this.manager.tooltipViews.map(({ dom: O }) => O.getBoundingClientRect()),
      space: this.view.state.facet(kr).tooltipSpace(this.view),
      scaleX: n,
      scaleY: e,
      makeAbsolute: t
    };
  }
  writeMeasure(n) {
    var e;
    if (n.makeAbsolute) {
      this.madeAbsolute = !0, this.position = "absolute";
      for (let a of this.manager.tooltipViews)
        a.dom.style.position = "absolute";
    }
    let { visible: t, space: i, scaleX: r, scaleY: O } = n, s = [];
    for (let a = 0; a < this.manager.tooltips.length; a++) {
      let o = this.manager.tooltips[a], l = this.manager.tooltipViews[a], { dom: c } = l, h = n.pos[a], f = n.size[a];
      if (!h || o.clip !== !1 && (h.bottom <= Math.max(t.top, i.top) || h.top >= Math.min(t.bottom, i.bottom) || h.right < Math.max(t.left, i.left) - 0.1 || h.left > Math.min(t.right, i.right) + 0.1)) {
        c.style.top = $n;
        continue;
      }
      let u = o.arrow ? l.dom.querySelector(".cm-tooltip-arrow") : null, d = u ? 7 : 0, p = f.right - f.left, Q = (e = Xa.get(l)) !== null && e !== void 0 ? e : f.bottom - f.top, m = l.offset || F$, g = this.view.textDirection == B.LTR, T = f.width > i.right - i.left ? g ? i.left : i.right - f.width : g ? Math.max(i.left, Math.min(h.left - (u ? 14 : 0) + m.x, i.right - p)) : Math.min(Math.max(i.left, h.left - p + (u ? 14 : 0) - m.x), i.right - p), v = this.above[a];
      !o.strictSide && (v ? h.top - Q - d - m.y < i.top : h.bottom + Q + d + m.y > i.bottom) && v == i.bottom - h.bottom > h.top - i.top && (v = this.above[a] = !v);
      let y = (v ? h.top - i.top : i.bottom - h.bottom) - d;
      if (y < Q && l.resize !== !1) {
        if (y < this.view.defaultLineHeight) {
          c.style.top = $n;
          continue;
        }
        Xa.set(l, Q), c.style.height = (Q = y) / O + "px";
      } else c.style.height && (c.style.height = "");
      let Z = v ? h.top - Q - d - m.y : h.bottom + d + m.y, x = T + p;
      if (l.overlap !== !0)
        for (let C of s)
          C.left < x && C.right > T && C.top < Z + Q && C.bottom > Z && (Z = v ? C.top - Q - 2 - d : C.bottom + d + 2);
      if (this.position == "absolute" ? (c.style.top = (Z - n.parent.top) / O + "px", va(c, (T - n.parent.left) / r)) : (c.style.top = Z / O + "px", va(c, T / r)), u) {
        let C = h.left + (g ? m.x : -m.x) - (T + 14 - 7);
        u.style.left = C / r + "px";
      }
      l.overlap !== !0 && s.push({ left: T, top: Z, right: x, bottom: Z + Q }), c.classList.toggle("cm-tooltip-above", v), c.classList.toggle("cm-tooltip-below", !v), l.positioned && l.positioned(n.space);
    }
  }
  maybeMeasure() {
    if (this.manager.tooltips.length && (this.view.inView && this.view.requestMeasure(this.measureReq), this.inView != this.view.inView && (this.inView = this.view.inView, !this.inView)))
      for (let n of this.manager.tooltipViews)
        n.dom.style.top = $n;
  }
}, {
  eventObservers: {
    scroll() {
      this.maybeMeasure();
    }
  }
});
function va(n, e) {
  let t = parseInt(n.style.left, 10);
  (isNaN(t) || Math.abs(e - t) > 1) && (n.style.left = e + "px");
}
const N$ = /* @__PURE__ */ k.baseTheme({
  ".cm-tooltip": {
    zIndex: 500,
    boxSizing: "border-box"
  },
  "&light .cm-tooltip": {
    border: "1px solid #bbb",
    backgroundColor: "#f5f5f5"
  },
  "&light .cm-tooltip-section:not(:first-child)": {
    borderTop: "1px solid #bbb"
  },
  "&dark .cm-tooltip": {
    backgroundColor: "#333338",
    color: "white"
  },
  ".cm-tooltip-arrow": {
    height: "7px",
    width: "14px",
    position: "absolute",
    zIndex: -1,
    overflow: "hidden",
    "&:before, &:after": {
      content: "''",
      position: "absolute",
      width: 0,
      height: 0,
      borderLeft: "7px solid transparent",
      borderRight: "7px solid transparent"
    },
    ".cm-tooltip-above &": {
      bottom: "-7px",
      "&:before": {
        borderTop: "7px solid #bbb"
      },
      "&:after": {
        borderTop: "7px solid #f5f5f5",
        bottom: "1px"
      }
    },
    ".cm-tooltip-below &": {
      top: "-7px",
      "&:before": {
        borderBottom: "7px solid #bbb"
      },
      "&:after": {
        borderBottom: "7px solid #f5f5f5",
        top: "1px"
      }
    }
  },
  "&dark .cm-tooltip .cm-tooltip-arrow": {
    "&:before": {
      borderTopColor: "#333338",
      borderBottomColor: "#333338"
    },
    "&:after": {
      borderTopColor: "transparent",
      borderBottomColor: "transparent"
    }
  }
}), F$ = { x: 0, y: 0 }, dc = /* @__PURE__ */ w.define({
  enables: [$c, N$]
});
function pc(n, e) {
  let t = n.plugin($c);
  if (!t)
    return null;
  let i = t.manager.tooltips.indexOf(e);
  return i < 0 ? null : t.manager.tooltipViews[i];
}
class st extends pt {
  /**
  @internal
  */
  compare(e) {
    return this == e || this.constructor == e.constructor && this.eq(e);
  }
  /**
  Compare this marker to another marker of the same type.
  */
  eq(e) {
    return !1;
  }
  /**
  Called if the marker has a `toDOM` method and its representation
  was removed from a gutter.
  */
  destroy(e) {
  }
}
st.prototype.elementClass = "";
st.prototype.toDOM = void 0;
st.prototype.mapMode = se.TrackBefore;
st.prototype.startSide = st.prototype.endSide = -1;
st.prototype.point = !0;
const bn = /* @__PURE__ */ w.define(), H$ = /* @__PURE__ */ w.define(), K$ = {
  class: "",
  renderEmptyElements: !1,
  elementStyle: "",
  markers: () => _.empty,
  lineMarker: () => null,
  widgetMarker: () => null,
  lineMarkerChange: null,
  initialSpacer: null,
  updateSpacer: null,
  domEventHandlers: {},
  side: "before"
}, zi = /* @__PURE__ */ w.define();
function J$(n) {
  return [Qc(), zi.of({ ...K$, ...n })];
}
const Za = /* @__PURE__ */ w.define({
  combine: (n) => n.some((e) => e)
});
function Qc(n) {
  return [
    ed
  ];
}
const ed = /* @__PURE__ */ Pe.fromClass(class {
  constructor(n) {
    this.view = n, this.domAfter = null, this.prevViewport = n.viewport, this.dom = document.createElement("div"), this.dom.className = "cm-gutters cm-gutters-before", this.dom.setAttribute("aria-hidden", "true"), this.dom.style.minHeight = this.view.contentHeight / this.view.scaleY + "px", this.gutters = n.state.facet(zi).map((e) => new za(n, e)), this.fixed = !n.state.facet(Za);
    for (let e of this.gutters)
      e.config.side == "after" ? this.getDOMAfter().appendChild(e.dom) : this.dom.appendChild(e.dom);
    this.fixed && (this.dom.style.position = "sticky"), this.syncGutters(!1), n.scrollDOM.insertBefore(this.dom, n.contentDOM);
  }
  getDOMAfter() {
    return this.domAfter || (this.domAfter = document.createElement("div"), this.domAfter.className = "cm-gutters cm-gutters-after", this.domAfter.setAttribute("aria-hidden", "true"), this.domAfter.style.minHeight = this.view.contentHeight / this.view.scaleY + "px", this.domAfter.style.position = this.fixed ? "sticky" : "", this.view.scrollDOM.appendChild(this.domAfter)), this.domAfter;
  }
  update(n) {
    if (this.updateGutters(n)) {
      let e = this.prevViewport, t = n.view.viewport, i = Math.min(e.to, t.to) - Math.max(e.from, t.from);
      this.syncGutters(i < (t.to - t.from) * 0.8);
    }
    if (n.geometryChanged) {
      let e = this.view.contentHeight / this.view.scaleY + "px";
      this.dom.style.minHeight = e, this.domAfter && (this.domAfter.style.minHeight = e);
    }
    this.view.state.facet(Za) != !this.fixed && (this.fixed = !this.fixed, this.dom.style.position = this.fixed ? "sticky" : "", this.domAfter && (this.domAfter.style.position = this.fixed ? "sticky" : "")), this.prevViewport = n.view.viewport;
  }
  syncGutters(n) {
    let e = this.dom.nextSibling;
    n && (this.dom.remove(), this.domAfter && this.domAfter.remove());
    let t = _.iter(this.view.state.facet(bn), this.view.viewport.from), i = [], r = this.gutters.map((O) => new td(O, this.view.viewport, -this.view.documentPadding.top));
    for (let O of this.view.viewportLineBlocks)
      if (i.length && (i = []), Array.isArray(O.type)) {
        let s = !0;
        for (let a of O.type)
          if (a.type == pe.Text && s) {
            ZO(t, i, a.from);
            for (let o of r)
              o.line(this.view, a, i);
            s = !1;
          } else if (a.widget)
            for (let o of r)
              o.widget(this.view, a);
      } else if (O.type == pe.Text) {
        ZO(t, i, O.from);
        for (let s of r)
          s.line(this.view, O, i);
      } else if (O.widget)
        for (let s of r)
          s.widget(this.view, O);
    for (let O of r)
      O.finish();
    n && (this.view.scrollDOM.insertBefore(this.dom, e), this.domAfter && this.view.scrollDOM.appendChild(this.domAfter));
  }
  updateGutters(n) {
    let e = n.startState.facet(zi), t = n.state.facet(zi), i = n.docChanged || n.heightChanged || n.viewportChanged || !_.eq(n.startState.facet(bn), n.state.facet(bn), n.view.viewport.from, n.view.viewport.to);
    if (e == t)
      for (let r of this.gutters)
        r.update(n) && (i = !0);
    else {
      i = !0;
      let r = [];
      for (let O of t) {
        let s = e.indexOf(O);
        s < 0 ? r.push(new za(this.view, O)) : (this.gutters[s].update(n), r.push(this.gutters[s]));
      }
      for (let O of this.gutters)
        O.dom.remove(), r.indexOf(O) < 0 && O.destroy();
      for (let O of r)
        O.config.side == "after" ? this.getDOMAfter().appendChild(O.dom) : this.dom.appendChild(O.dom);
      this.gutters = r;
    }
    return i;
  }
  destroy() {
    for (let n of this.gutters)
      n.destroy();
    this.dom.remove(), this.domAfter && this.domAfter.remove();
  }
}, {
  provide: (n) => k.scrollMargins.of((e) => {
    let t = e.plugin(n);
    if (!t || t.gutters.length == 0 || !t.fixed)
      return null;
    let i = t.dom.offsetWidth * e.scaleX, r = t.domAfter ? t.domAfter.offsetWidth * e.scaleX : 0;
    return e.textDirection == B.LTR ? { left: i, right: r } : { right: i, left: r };
  })
});
function Ra(n) {
  return Array.isArray(n) ? n : [n];
}
function ZO(n, e, t) {
  for (; n.value && n.from <= t; )
    n.from == t && e.push(n.value), n.next();
}
class td {
  constructor(e, t, i) {
    this.gutter = e, this.height = i, this.i = 0, this.cursor = _.iter(e.markers, t.from);
  }
  addElement(e, t, i) {
    let { gutter: r } = this, O = (t.top - this.height) / e.scaleY, s = t.height / e.scaleY;
    if (this.i == r.elements.length) {
      let a = new mc(e, s, O, i);
      r.elements.push(a), r.dom.appendChild(a.dom);
    } else
      r.elements[this.i].update(e, s, O, i);
    this.height = t.bottom, this.i++;
  }
  line(e, t, i) {
    let r = [];
    ZO(this.cursor, r, t.from), i.length && (r = r.concat(i));
    let O = this.gutter.config.lineMarker(e, t, r);
    O && r.unshift(O);
    let s = this.gutter;
    r.length == 0 && !s.config.renderEmptyElements || this.addElement(e, t, r);
  }
  widget(e, t) {
    let i = this.gutter.config.widgetMarker(e, t.widget, t), r = i ? [i] : null;
    for (let O of e.state.facet(H$)) {
      let s = O(e, t.widget, t);
      s && (r || (r = [])).push(s);
    }
    r && this.addElement(e, t, r);
  }
  finish() {
    let e = this.gutter;
    for (; e.elements.length > this.i; ) {
      let t = e.elements.pop();
      e.dom.removeChild(t.dom), t.destroy();
    }
  }
}
class za {
  constructor(e, t) {
    this.view = e, this.config = t, this.elements = [], this.spacer = null, this.dom = document.createElement("div"), this.dom.className = "cm-gutter" + (this.config.class ? " " + this.config.class : "");
    for (let i in t.domEventHandlers)
      this.dom.addEventListener(i, (r) => {
        let O = r.target, s;
        if (O != this.dom && this.dom.contains(O)) {
          for (; O.parentNode != this.dom; )
            O = O.parentNode;
          let o = O.getBoundingClientRect();
          s = (o.top + o.bottom) / 2;
        } else
          s = r.clientY;
        let a = e.lineBlockAtHeight(s - e.documentTop);
        t.domEventHandlers[i](e, a, r) && r.preventDefault();
      });
    this.markers = Ra(t.markers(e)), t.initialSpacer && (this.spacer = new mc(e, 0, 0, [t.initialSpacer(e)]), this.dom.appendChild(this.spacer.dom), this.spacer.dom.style.cssText += "visibility: hidden; pointer-events: none");
  }
  update(e) {
    let t = this.markers;
    if (this.markers = Ra(this.config.markers(e.view)), this.spacer && this.config.updateSpacer) {
      let r = this.config.updateSpacer(this.spacer.markers[0], e);
      r != this.spacer.markers[0] && this.spacer.update(e.view, 0, 0, [r]);
    }
    let i = e.view.viewport;
    return !_.eq(this.markers, t, i.from, i.to) || (this.config.lineMarkerChange ? this.config.lineMarkerChange(e) : !1);
  }
  destroy() {
    for (let e of this.elements)
      e.destroy();
  }
}
class mc {
  constructor(e, t, i, r) {
    this.height = -1, this.above = 0, this.markers = [], this.dom = document.createElement("div"), this.dom.className = "cm-gutterElement", this.update(e, t, i, r);
  }
  update(e, t, i, r) {
    this.height != t && (this.height = t, this.dom.style.height = t + "px"), this.above != i && (this.dom.style.marginTop = (this.above = i) ? i + "px" : ""), id(this.markers, r) || this.setMarkers(e, r);
  }
  setMarkers(e, t) {
    let i = "cm-gutterElement", r = this.dom.firstChild;
    for (let O = 0, s = 0; ; ) {
      let a = s, o = O < t.length ? t[O++] : null, l = !1;
      if (o) {
        let c = o.elementClass;
        c && (i += " " + c);
        for (let h = s; h < this.markers.length; h++)
          if (this.markers[h].compare(o)) {
            a = h, l = !0;
            break;
          }
      } else
        a = this.markers.length;
      for (; s < a; ) {
        let c = this.markers[s++];
        if (c.toDOM) {
          c.destroy(r);
          let h = r.nextSibling;
          r.remove(), r = h;
        }
      }
      if (!o)
        break;
      o.toDOM && (l ? r = r.nextSibling : this.dom.insertBefore(o.toDOM(e), r)), l && s++;
    }
    this.dom.className = i, this.markers = t;
  }
  destroy() {
    this.setMarkers(null, []);
  }
}
function id(n, e) {
  if (n.length != e.length)
    return !1;
  for (let t = 0; t < n.length; t++)
    if (!n[t].compare(e[t]))
      return !1;
  return !0;
}
const nd = /* @__PURE__ */ w.define(), rd = /* @__PURE__ */ w.define(), Et = /* @__PURE__ */ w.define({
  combine(n) {
    return Bi(n, { formatNumber: String, domEventHandlers: {} }, {
      domEventHandlers(e, t) {
        let i = Object.assign({}, e);
        for (let r in t) {
          let O = i[r], s = t[r];
          i[r] = O ? (a, o, l) => O(a, o, l) || s(a, o, l) : s;
        }
        return i;
      }
    });
  }
});
class Xr extends st {
  constructor(e) {
    super(), this.number = e;
  }
  eq(e) {
    return this.number == e.number;
  }
  toDOM() {
    return document.createTextNode(this.number);
  }
}
function vr(n, e) {
  return n.state.facet(Et).formatNumber(e, n.state);
}
const Od = /* @__PURE__ */ zi.compute([Et], (n) => ({
  class: "cm-lineNumbers",
  renderEmptyElements: !1,
  markers(e) {
    return e.state.facet(nd);
  },
  lineMarker(e, t, i) {
    return i.some((r) => r.toDOM) ? null : new Xr(vr(e, e.state.doc.lineAt(t.from).number));
  },
  widgetMarker: (e, t, i) => {
    for (let r of e.state.facet(rd)) {
      let O = r(e, t, i);
      if (O)
        return O;
    }
    return null;
  },
  lineMarkerChange: (e) => e.startState.facet(Et) != e.state.facet(Et),
  initialSpacer(e) {
    return new Xr(vr(e, _a(e.state.doc.lines)));
  },
  updateSpacer(e, t) {
    let i = vr(t.view, _a(t.view.state.doc.lines));
    return i == e.number ? e : new Xr(i);
  },
  domEventHandlers: n.facet(Et).domEventHandlers,
  side: "before"
}));
function sd(n = {}) {
  return [
    Et.of(n),
    Qc(),
    Od
  ];
}
function _a(n) {
  let e = 9;
  for (; e < n; )
    e = e * 10 + 9;
  return e;
}
const ad = /* @__PURE__ */ new class extends st {
  constructor() {
    super(...arguments), this.elementClass = "cm-activeLineGutter";
  }
}(), od = /* @__PURE__ */ bn.compute(["selection"], (n) => {
  let e = [], t = -1;
  for (let i of n.selection.ranges) {
    let r = n.doc.lineAt(i.head).from;
    r > t && (t = r, e.push(ad.range(r)));
  }
  return _.of(e);
});
function ld() {
  return od;
}
const gc = 1024;
let cd = 0;
class Xe {
  constructor(e, t) {
    this.from = e, this.to = t;
  }
}
class z {
  /**
  Create a new node prop type.
  */
  constructor(e = {}) {
    this.id = cd++, this.perNode = !!e.perNode, this.deserialize = e.deserialize || (() => {
      throw new Error("This node type doesn't define a deserialize function");
    }), this.combine = e.combine || null;
  }
  /**
  This is meant to be used with
  [`NodeSet.extend`](#common.NodeSet.extend) or
  [`LRParser.configure`](#lr.ParserConfig.props) to compute
  prop values for each node type in the set. Takes a [match
  object](#common.NodeType^match) or function that returns undefined
  if the node type doesn't get this prop, and the prop's value if
  it does.
  */
  add(e) {
    if (this.perNode)
      throw new RangeError("Can't add per-node props to node types");
    return typeof e != "function" && (e = he.match(e)), (t) => {
      let i = e(t);
      return i === void 0 ? null : [this, i];
    };
  }
}
z.closedBy = new z({ deserialize: (n) => n.split(" ") });
z.openedBy = new z({ deserialize: (n) => n.split(" ") });
z.group = new z({ deserialize: (n) => n.split(" ") });
z.isolate = new z({ deserialize: (n) => {
  if (n && n != "rtl" && n != "ltr" && n != "auto")
    throw new RangeError("Invalid value for isolate: " + n);
  return n || "auto";
} });
z.contextHash = new z({ perNode: !0 });
z.lookAhead = new z({ perNode: !0 });
z.mounted = new z({ perNode: !0 });
class Ht {
  constructor(e, t, i, r = !1) {
    this.tree = e, this.overlay = t, this.parser = i, this.bracketed = r;
  }
  /**
  @internal
  */
  static get(e) {
    return e && e.props && e.props[z.mounted.id];
  }
}
const hd = /* @__PURE__ */ Object.create(null);
class he {
  /**
  @internal
  */
  constructor(e, t, i, r = 0) {
    this.name = e, this.props = t, this.id = i, this.flags = r;
  }
  /**
  Define a node type.
  */
  static define(e) {
    let t = e.props && e.props.length ? /* @__PURE__ */ Object.create(null) : hd, i = (e.top ? 1 : 0) | (e.skipped ? 2 : 0) | (e.error ? 4 : 0) | (e.name == null ? 8 : 0), r = new he(e.name || "", t, e.id, i);
    if (e.props) {
      for (let O of e.props)
        if (Array.isArray(O) || (O = O(r)), O) {
          if (O[0].perNode)
            throw new RangeError("Can't store a per-node prop on a node type");
          t[O[0].id] = O[1];
        }
    }
    return r;
  }
  /**
  Retrieves a node prop for this type. Will return `undefined` if
  the prop isn't present on this node.
  */
  prop(e) {
    return this.props[e.id];
  }
  /**
  True when this is the top node of a grammar.
  */
  get isTop() {
    return (this.flags & 1) > 0;
  }
  /**
  True when this node is produced by a skip rule.
  */
  get isSkipped() {
    return (this.flags & 2) > 0;
  }
  /**
  Indicates whether this is an error node.
  */
  get isError() {
    return (this.flags & 4) > 0;
  }
  /**
  When true, this node type doesn't correspond to a user-declared
  named node, for example because it is used to cache repetition.
  */
  get isAnonymous() {
    return (this.flags & 8) > 0;
  }
  /**
  Returns true when this node's name or one of its
  [groups](#common.NodeProp^group) matches the given string.
  */
  is(e) {
    if (typeof e == "string") {
      if (this.name == e)
        return !0;
      let t = this.prop(z.group);
      return t ? t.indexOf(e) > -1 : !1;
    }
    return this.id == e;
  }
  /**
  Create a function from node types to arbitrary values by
  specifying an object whose property names are node or
  [group](#common.NodeProp^group) names. Often useful with
  [`NodeProp.add`](#common.NodeProp.add). You can put multiple
  names, separated by spaces, in a single property name to map
  multiple node names to a single value.
  */
  static match(e) {
    let t = /* @__PURE__ */ Object.create(null);
    for (let i in e)
      for (let r of i.split(" "))
        t[r] = e[i];
    return (i) => {
      for (let r = i.prop(z.group), O = -1; O < (r ? r.length : 0); O++) {
        let s = t[O < 0 ? i.name : r[O]];
        if (s)
          return s;
      }
    };
  }
}
he.none = new he(
  "",
  /* @__PURE__ */ Object.create(null),
  0,
  8
  /* NodeFlag.Anonymous */
);
class us {
  /**
  Create a set with the given types. The `id` property of each
  type should correspond to its position within the array.
  */
  constructor(e) {
    this.types = e;
    for (let t = 0; t < e.length; t++)
      if (e[t].id != t)
        throw new RangeError("Node type ids should correspond to array positions when creating a node set");
  }
  /**
  Create a copy of this set with some node properties added. The
  arguments to this method can be created with
  [`NodeProp.add`](#common.NodeProp.add).
  */
  extend(...e) {
    let t = [];
    for (let i of this.types) {
      let r = null;
      for (let O of e) {
        let s = O(i);
        if (s) {
          r || (r = Object.assign({}, i.props));
          let a = s[1], o = s[0];
          o.combine && o.id in r && (a = o.combine(r[o.id], a)), r[o.id] = a;
        }
      }
      t.push(r ? new he(i.name, r, i.id, i.flags) : i);
    }
    return new us(t);
  }
}
const dn = /* @__PURE__ */ new WeakMap(), Ya = /* @__PURE__ */ new WeakMap();
var A;
(function(n) {
  n[n.ExcludeBuffers = 1] = "ExcludeBuffers", n[n.IncludeAnonymous = 2] = "IncludeAnonymous", n[n.IgnoreMounts = 4] = "IgnoreMounts", n[n.IgnoreOverlays = 8] = "IgnoreOverlays", n[n.EnterBracketed = 16] = "EnterBracketed";
})(A || (A = {}));
class L {
  /**
  Construct a new tree. See also [`Tree.build`](#common.Tree^build).
  */
  constructor(e, t, i, r, O) {
    if (this.type = e, this.children = t, this.positions = i, this.length = r, this.props = null, O && O.length) {
      this.props = /* @__PURE__ */ Object.create(null);
      for (let [s, a] of O)
        this.props[typeof s == "number" ? s : s.id] = a;
    }
  }
  /**
  @internal
  */
  toString() {
    let e = Ht.get(this);
    if (e && !e.overlay)
      return e.tree.toString();
    let t = "";
    for (let i of this.children) {
      let r = i.toString();
      r && (t && (t += ","), t += r);
    }
    return this.type.name ? (/\W/.test(this.type.name) && !this.type.isError ? JSON.stringify(this.type.name) : this.type.name) + (t.length ? "(" + t + ")" : "") : t;
  }
  /**
  Get a [tree cursor](#common.TreeCursor) positioned at the top of
  the tree. Mode can be used to [control](#common.IterMode) which
  nodes the cursor visits.
  */
  cursor(e = 0) {
    return new An(this.topNode, e);
  }
  /**
  Get a [tree cursor](#common.TreeCursor) pointing into this tree
  at the given position and side (see
  [`moveTo`](#common.TreeCursor.moveTo).
  */
  cursorAt(e, t = 0, i = 0) {
    let r = dn.get(this) || this.topNode, O = new An(r);
    return O.moveTo(e, t), dn.set(this, O._tree), O;
  }
  /**
  Get a [syntax node](#common.SyntaxNode) object for the top of the
  tree.
  */
  get topNode() {
    return new ae(this, 0, 0, null);
  }
  /**
  Get the [syntax node](#common.SyntaxNode) at the given position.
  If `side` is -1, this will move into nodes that end at the
  position. If 1, it'll move into nodes that start at the
  position. With 0, it'll only enter nodes that cover the position
  from both sides.
  
  Note that this will not enter
  [overlays](#common.MountedTree.overlay), and you often want
  [`resolveInner`](#common.Tree.resolveInner) instead.
  */
  resolve(e, t = 0) {
    let i = Ui(dn.get(this) || this.topNode, e, t, !1);
    return dn.set(this, i), i;
  }
  /**
  Like [`resolve`](#common.Tree.resolve), but will enter
  [overlaid](#common.MountedTree.overlay) nodes, producing a syntax node
  pointing into the innermost overlaid tree at the given position
  (with parent links going through all parent structure, including
  the host trees).
  */
  resolveInner(e, t = 0) {
    let i = Ui(Ya.get(this) || this.topNode, e, t, !0);
    return Ya.set(this, i), i;
  }
  /**
  In some situations, it can be useful to iterate through all
  nodes around a position, including those in overlays that don't
  directly cover the position. This method gives you an iterator
  that will produce all nodes, from small to big, around the given
  position.
  */
  resolveStack(e, t = 0) {
    return $d(this, e, t);
  }
  /**
  Iterate over the tree and its children, calling `enter` for any
  node that touches the `from`/`to` region (if given) before
  running over such a node's children, and `leave` (if given) when
  leaving the node. When `enter` returns `false`, that node will
  not have its children iterated over (or `leave` called).
  */
  iterate(e) {
    let { enter: t, leave: i, from: r = 0, to: O = this.length } = e, s = e.mode || 0, a = (s & A.IncludeAnonymous) > 0;
    for (let o = this.cursor(s | A.IncludeAnonymous); ; ) {
      let l = !1;
      if (o.from <= O && o.to >= r && (!a && o.type.isAnonymous || t(o) !== !1)) {
        if (o.firstChild())
          continue;
        l = !0;
      }
      for (; l && i && (a || !o.type.isAnonymous) && i(o), !o.nextSibling(); ) {
        if (!o.parent())
          return;
        l = !0;
      }
    }
  }
  /**
  Get the value of the given [node prop](#common.NodeProp) for this
  node. Works with both per-node and per-type props.
  */
  prop(e) {
    return e.perNode ? this.props ? this.props[e.id] : void 0 : this.type.prop(e);
  }
  /**
  Returns the node's [per-node props](#common.NodeProp.perNode) in a
  format that can be passed to the [`Tree`](#common.Tree)
  constructor.
  */
  get propValues() {
    let e = [];
    if (this.props)
      for (let t in this.props)
        e.push([+t, this.props[t]]);
    return e;
  }
  /**
  Balance the direct children of this tree, producing a copy of
  which may have children grouped into subtrees with type
  [`NodeType.none`](#common.NodeType^none).
  */
  balance(e = {}) {
    return this.children.length <= 8 ? this : ps(he.none, this.children, this.positions, 0, this.children.length, 0, this.length, (t, i, r) => new L(this.type, t, i, r, this.propValues), e.makeTree || ((t, i, r) => new L(he.none, t, i, r)));
  }
  /**
  Build a tree from a postfix-ordered buffer of node information,
  or a cursor over such a buffer.
  */
  static build(e) {
    return dd(e);
  }
}
L.empty = new L(he.none, [], [], 0);
class $s {
  constructor(e, t) {
    this.buffer = e, this.index = t;
  }
  get id() {
    return this.buffer[this.index - 4];
  }
  get start() {
    return this.buffer[this.index - 3];
  }
  get end() {
    return this.buffer[this.index - 2];
  }
  get size() {
    return this.buffer[this.index - 1];
  }
  get pos() {
    return this.index;
  }
  next() {
    this.index -= 4;
  }
  fork() {
    return new $s(this.buffer, this.index);
  }
}
class gt {
  /**
  Create a tree buffer.
  */
  constructor(e, t, i) {
    this.buffer = e, this.length = t, this.set = i;
  }
  /**
  @internal
  */
  get type() {
    return he.none;
  }
  /**
  @internal
  */
  toString() {
    let e = [];
    for (let t = 0; t < this.buffer.length; )
      e.push(this.childString(t)), t = this.buffer[t + 3];
    return e.join(",");
  }
  /**
  @internal
  */
  childString(e) {
    let t = this.buffer[e], i = this.buffer[e + 3], r = this.set.types[t], O = r.name;
    if (/\W/.test(O) && !r.isError && (O = JSON.stringify(O)), e += 4, i == e)
      return O;
    let s = [];
    for (; e < i; )
      s.push(this.childString(e)), e = this.buffer[e + 3];
    return O + "(" + s.join(",") + ")";
  }
  /**
  @internal
  */
  findChild(e, t, i, r, O) {
    let { buffer: s } = this, a = -1;
    for (let o = e; o != t && !(Sc(O, r, s[o + 1], s[o + 2]) && (a = o, i > 0)); o = s[o + 3])
      ;
    return a;
  }
  /**
  @internal
  */
  slice(e, t, i) {
    let r = this.buffer, O = new Uint16Array(t - e), s = 0;
    for (let a = e, o = 0; a < t; ) {
      O[o++] = r[a++], O[o++] = r[a++] - i;
      let l = O[o++] = r[a++] - i;
      O[o++] = r[a++] - e, s = Math.max(s, l);
    }
    return new gt(O, s, this.set);
  }
}
function Sc(n, e, t, i) {
  switch (n) {
    case -2:
      return t < e;
    case -1:
      return i >= e && t < e;
    case 0:
      return t < e && i > e;
    case 1:
      return t <= e && i > e;
    case 2:
      return i > e;
    case 4:
      return !0;
  }
}
function Ui(n, e, t, i) {
  for (var r; n.from == n.to || (t < 1 ? n.from >= e : n.from > e) || (t > -1 ? n.to <= e : n.to < e); ) {
    let s = !i && n instanceof ae && n.index < 0 ? null : n.parent;
    if (!s)
      return n;
    n = s;
  }
  let O = i ? 0 : A.IgnoreOverlays;
  if (i)
    for (let s = n, a = s.parent; a; s = a, a = s.parent)
      s instanceof ae && s.index < 0 && ((r = a.enter(e, t, O)) === null || r === void 0 ? void 0 : r.from) != s.from && (n = a);
  for (; ; ) {
    let s = n.enter(e, t, O);
    if (!s)
      return n;
    n = s;
  }
}
class Pc {
  cursor(e = 0) {
    return new An(this, e);
  }
  getChild(e, t = null, i = null) {
    let r = Va(this, e, t, i);
    return r.length ? r[0] : null;
  }
  getChildren(e, t = null, i = null) {
    return Va(this, e, t, i);
  }
  resolve(e, t = 0) {
    return Ui(this, e, t, !1);
  }
  resolveInner(e, t = 0) {
    return Ui(this, e, t, !0);
  }
  matchContext(e) {
    return RO(this.parent, e);
  }
  enterUnfinishedNodesBefore(e) {
    let t = this.childBefore(e), i = this;
    for (; t; ) {
      let r = t.lastChild;
      if (!r || r.to != t.to)
        break;
      r.type.isError && r.from == r.to ? (i = t, t = r.prevSibling) : t = r;
    }
    return i;
  }
  get node() {
    return this;
  }
  get next() {
    return this.parent;
  }
}
class ae extends Pc {
  constructor(e, t, i, r) {
    super(), this._tree = e, this.from = t, this.index = i, this._parent = r;
  }
  get type() {
    return this._tree.type;
  }
  get name() {
    return this._tree.type.name;
  }
  get to() {
    return this.from + this._tree.length;
  }
  nextChild(e, t, i, r, O = 0) {
    var s;
    for (let a = this; ; ) {
      for (let { children: o, positions: l } = a._tree, c = t > 0 ? o.length : -1; e != c; e += t) {
        let h = o[e], f = l[e] + a.from;
        if (!(!(O & A.EnterBracketed && h instanceof L && ((s = Ht.get(h)) === null || s === void 0 ? void 0 : s.overlay) === null && (f >= i || f + h.length <= i)) && !Sc(r, i, f, f + h.length))) {
          if (h instanceof gt) {
            if (O & A.ExcludeBuffers)
              continue;
            let u = h.findChild(0, h.buffer.length, t, i - f, r);
            if (u > -1)
              return new De(new fd(a, h, e, f), null, u);
          } else if (O & A.IncludeAnonymous || !h.type.isAnonymous || ds(h)) {
            let u;
            if (!(O & A.IgnoreMounts) && (u = Ht.get(h)) && !u.overlay)
              return new ae(u.tree, f, e, a);
            let d = new ae(h, f, e, a);
            return O & A.IncludeAnonymous || !d.type.isAnonymous ? d : d.nextChild(t < 0 ? h.children.length - 1 : 0, t, i, r, O);
          }
        }
      }
      if (O & A.IncludeAnonymous || !a.type.isAnonymous || (a.index >= 0 ? e = a.index + t : e = t < 0 ? -1 : a._parent._tree.children.length, a = a._parent, !a))
        return null;
    }
  }
  get firstChild() {
    return this.nextChild(
      0,
      1,
      0,
      4
      /* Side.DontCare */
    );
  }
  get lastChild() {
    return this.nextChild(
      this._tree.children.length - 1,
      -1,
      0,
      4
      /* Side.DontCare */
    );
  }
  childAfter(e) {
    return this.nextChild(
      0,
      1,
      e,
      2
      /* Side.After */
    );
  }
  childBefore(e) {
    return this.nextChild(
      this._tree.children.length - 1,
      -1,
      e,
      -2
      /* Side.Before */
    );
  }
  prop(e) {
    return this._tree.prop(e);
  }
  enter(e, t, i = 0) {
    let r;
    if (!(i & A.IgnoreOverlays) && (r = Ht.get(this._tree)) && r.overlay) {
      let O = e - this.from, s = i & A.EnterBracketed && r.bracketed;
      for (let { from: a, to: o } of r.overlay)
        if ((t > 0 || s ? a <= O : a < O) && (t < 0 || s ? o >= O : o > O))
          return new ae(r.tree, r.overlay[0].from + this.from, -1, this);
    }
    return this.nextChild(0, 1, e, t, i);
  }
  nextSignificantParent() {
    let e = this;
    for (; e.type.isAnonymous && e._parent; )
      e = e._parent;
    return e;
  }
  get parent() {
    return this._parent ? this._parent.nextSignificantParent() : null;
  }
  get nextSibling() {
    return this._parent && this.index >= 0 ? this._parent.nextChild(
      this.index + 1,
      1,
      0,
      4
      /* Side.DontCare */
    ) : null;
  }
  get prevSibling() {
    return this._parent && this.index >= 0 ? this._parent.nextChild(
      this.index - 1,
      -1,
      0,
      4
      /* Side.DontCare */
    ) : null;
  }
  get tree() {
    return this._tree;
  }
  toTree() {
    return this._tree;
  }
  /**
  @internal
  */
  toString() {
    return this._tree.toString();
  }
}
function Va(n, e, t, i) {
  let r = n.cursor(), O = [];
  if (!r.firstChild())
    return O;
  if (t != null) {
    for (let s = !1; !s; )
      if (s = r.type.is(t), !r.nextSibling())
        return O;
  }
  for (; ; ) {
    if (i != null && r.type.is(i))
      return O;
    if (r.type.is(e) && O.push(r.node), !r.nextSibling())
      return i == null ? O : [];
  }
}
function RO(n, e, t = e.length - 1) {
  for (let i = n; t >= 0; i = i.parent) {
    if (!i)
      return !1;
    if (!i.type.isAnonymous) {
      if (e[t] && e[t] != i.name)
        return !1;
      t--;
    }
  }
  return !0;
}
class fd {
  constructor(e, t, i, r) {
    this.parent = e, this.buffer = t, this.index = i, this.start = r;
  }
}
class De extends Pc {
  get name() {
    return this.type.name;
  }
  get from() {
    return this.context.start + this.context.buffer.buffer[this.index + 1];
  }
  get to() {
    return this.context.start + this.context.buffer.buffer[this.index + 2];
  }
  constructor(e, t, i) {
    super(), this.context = e, this._parent = t, this.index = i, this.type = e.buffer.set.types[e.buffer.buffer[i]];
  }
  child(e, t, i) {
    let { buffer: r } = this.context, O = r.findChild(this.index + 4, r.buffer[this.index + 3], e, t - this.context.start, i);
    return O < 0 ? null : new De(this.context, this, O);
  }
  get firstChild() {
    return this.child(
      1,
      0,
      4
      /* Side.DontCare */
    );
  }
  get lastChild() {
    return this.child(
      -1,
      0,
      4
      /* Side.DontCare */
    );
  }
  childAfter(e) {
    return this.child(
      1,
      e,
      2
      /* Side.After */
    );
  }
  childBefore(e) {
    return this.child(
      -1,
      e,
      -2
      /* Side.Before */
    );
  }
  prop(e) {
    return this.type.prop(e);
  }
  enter(e, t, i = 0) {
    if (i & A.ExcludeBuffers)
      return null;
    let { buffer: r } = this.context, O = r.findChild(this.index + 4, r.buffer[this.index + 3], t > 0 ? 1 : -1, e - this.context.start, t);
    return O < 0 ? null : new De(this.context, this, O);
  }
  get parent() {
    return this._parent || this.context.parent.nextSignificantParent();
  }
  externalSibling(e) {
    return this._parent ? null : this.context.parent.nextChild(
      this.context.index + e,
      e,
      0,
      4
      /* Side.DontCare */
    );
  }
  get nextSibling() {
    let { buffer: e } = this.context, t = e.buffer[this.index + 3];
    return t < (this._parent ? e.buffer[this._parent.index + 3] : e.buffer.length) ? new De(this.context, this._parent, t) : this.externalSibling(1);
  }
  get prevSibling() {
    let { buffer: e } = this.context, t = this._parent ? this._parent.index + 4 : 0;
    return this.index == t ? this.externalSibling(-1) : new De(this.context, this._parent, e.findChild(
      t,
      this.index,
      -1,
      0,
      4
      /* Side.DontCare */
    ));
  }
  get tree() {
    return null;
  }
  toTree() {
    let e = [], t = [], { buffer: i } = this.context, r = this.index + 4, O = i.buffer[this.index + 3];
    if (O > r) {
      let s = i.buffer[this.index + 1];
      e.push(i.slice(r, O, s)), t.push(0);
    }
    return new L(this.type, e, t, this.to - this.from);
  }
  /**
  @internal
  */
  toString() {
    return this.context.buffer.childString(this.index);
  }
}
function Tc(n) {
  if (!n.length)
    return null;
  let e = 0, t = n[0];
  for (let O = 1; O < n.length; O++) {
    let s = n[O];
    (s.from > t.from || s.to < t.to) && (t = s, e = O);
  }
  let i = t instanceof ae && t.index < 0 ? null : t.parent, r = n.slice();
  return i ? r[e] = i : r.splice(e, 1), new ud(r, t);
}
class ud {
  constructor(e, t) {
    this.heads = e, this.node = t;
  }
  get next() {
    return Tc(this.heads);
  }
}
function $d(n, e, t) {
  let i = n.resolveInner(e, t), r = null;
  for (let O = i instanceof ae ? i : i.context.parent; O; O = O.parent)
    if (O.index < 0) {
      let s = O.parent;
      (r || (r = [i])).push(s.resolve(e, t)), O = s;
    } else {
      let s = Ht.get(O.tree);
      if (s && s.overlay && s.overlay[0].from <= e && s.overlay[s.overlay.length - 1].to >= e) {
        let a = new ae(s.tree, s.overlay[0].from + O.from, -1, O);
        (r || (r = [i])).push(Ui(a, e, t, !1));
      }
    }
  return r ? Tc(r) : i;
}
class An {
  /**
  Shorthand for `.type.name`.
  */
  get name() {
    return this.type.name;
  }
  /**
  @internal
  */
  constructor(e, t = 0) {
    if (this.buffer = null, this.stack = [], this.index = 0, this.bufferNode = null, this.mode = t & ~A.EnterBracketed, e instanceof ae)
      this.yieldNode(e);
    else {
      this._tree = e.context.parent, this.buffer = e.context;
      for (let i = e._parent; i; i = i._parent)
        this.stack.unshift(i.index);
      this.bufferNode = e, this.yieldBuf(e.index);
    }
  }
  yieldNode(e) {
    return e ? (this._tree = e, this.type = e.type, this.from = e.from, this.to = e.to, !0) : !1;
  }
  yieldBuf(e, t) {
    this.index = e;
    let { start: i, buffer: r } = this.buffer;
    return this.type = t || r.set.types[r.buffer[e]], this.from = i + r.buffer[e + 1], this.to = i + r.buffer[e + 2], !0;
  }
  /**
  @internal
  */
  yield(e) {
    return e ? e instanceof ae ? (this.buffer = null, this.yieldNode(e)) : (this.buffer = e.context, this.yieldBuf(e.index, e.type)) : !1;
  }
  /**
  @internal
  */
  toString() {
    return this.buffer ? this.buffer.buffer.childString(this.index) : this._tree.toString();
  }
  /**
  @internal
  */
  enterChild(e, t, i) {
    if (!this.buffer)
      return this.yield(this._tree.nextChild(e < 0 ? this._tree._tree.children.length - 1 : 0, e, t, i, this.mode));
    let { buffer: r } = this.buffer, O = r.findChild(this.index + 4, r.buffer[this.index + 3], e, t - this.buffer.start, i);
    return O < 0 ? !1 : (this.stack.push(this.index), this.yieldBuf(O));
  }
  /**
  Move the cursor to this node's first child. When this returns
  false, the node has no child, and the cursor has not been moved.
  */
  firstChild() {
    return this.enterChild(
      1,
      0,
      4
      /* Side.DontCare */
    );
  }
  /**
  Move the cursor to this node's last child.
  */
  lastChild() {
    return this.enterChild(
      -1,
      0,
      4
      /* Side.DontCare */
    );
  }
  /**
  Move the cursor to the first child that ends after `pos`.
  */
  childAfter(e) {
    return this.enterChild(
      1,
      e,
      2
      /* Side.After */
    );
  }
  /**
  Move to the last child that starts before `pos`.
  */
  childBefore(e) {
    return this.enterChild(
      -1,
      e,
      -2
      /* Side.Before */
    );
  }
  /**
  Move the cursor to the child around `pos`. If side is -1 the
  child may end at that position, when 1 it may start there. This
  will also enter [overlaid](#common.MountedTree.overlay)
  [mounted](#common.NodeProp^mounted) trees unless `overlays` is
  set to false.
  */
  enter(e, t, i = this.mode) {
    return this.buffer ? i & A.ExcludeBuffers ? !1 : this.enterChild(1, e, t) : this.yield(this._tree.enter(e, t, i));
  }
  /**
  Move to the node's parent node, if this isn't the top node.
  */
  parent() {
    if (!this.buffer)
      return this.yieldNode(this.mode & A.IncludeAnonymous ? this._tree._parent : this._tree.parent);
    if (this.stack.length)
      return this.yieldBuf(this.stack.pop());
    let e = this.mode & A.IncludeAnonymous ? this.buffer.parent : this.buffer.parent.nextSignificantParent();
    return this.buffer = null, this.yieldNode(e);
  }
  /**
  @internal
  */
  sibling(e) {
    if (!this.buffer)
      return this._tree._parent ? this.yield(this._tree.index < 0 ? null : this._tree._parent.nextChild(this._tree.index + e, e, 0, 4, this.mode)) : !1;
    let { buffer: t } = this.buffer, i = this.stack.length - 1;
    if (e < 0) {
      let r = i < 0 ? 0 : this.stack[i] + 4;
      if (this.index != r)
        return this.yieldBuf(t.findChild(
          r,
          this.index,
          -1,
          0,
          4
          /* Side.DontCare */
        ));
    } else {
      let r = t.buffer[this.index + 3];
      if (r < (i < 0 ? t.buffer.length : t.buffer[this.stack[i] + 3]))
        return this.yieldBuf(r);
    }
    return i < 0 ? this.yield(this.buffer.parent.nextChild(this.buffer.index + e, e, 0, 4, this.mode)) : !1;
  }
  /**
  Move to this node's next sibling, if any.
  */
  nextSibling() {
    return this.sibling(1);
  }
  /**
  Move to this node's previous sibling, if any.
  */
  prevSibling() {
    return this.sibling(-1);
  }
  atLastNode(e) {
    let t, i, { buffer: r } = this;
    if (r) {
      if (e > 0) {
        if (this.index < r.buffer.buffer.length)
          return !1;
      } else
        for (let O = 0; O < this.index; O++)
          if (r.buffer.buffer[O + 3] < this.index)
            return !1;
      ({ index: t, parent: i } = r);
    } else
      ({ index: t, _parent: i } = this._tree);
    for (; i; { index: t, _parent: i } = i)
      if (t > -1)
        for (let O = t + e, s = e < 0 ? -1 : i._tree.children.length; O != s; O += e) {
          let a = i._tree.children[O];
          if (this.mode & A.IncludeAnonymous || a instanceof gt || !a.type.isAnonymous || ds(a))
            return !1;
        }
    return !0;
  }
  move(e, t) {
    if (t && this.enterChild(
      e,
      0,
      4
      /* Side.DontCare */
    ))
      return !0;
    for (; ; ) {
      if (this.sibling(e))
        return !0;
      if (this.atLastNode(e) || !this.parent())
        return !1;
    }
  }
  /**
  Move to the next node in a
  [pre-order](https://en.wikipedia.org/wiki/Tree_traversal#Pre-order,_NLR)
  traversal, going from a node to its first child or, if the
  current node is empty or `enter` is false, its next sibling or
  the next sibling of the first parent node that has one.
  */
  next(e = !0) {
    return this.move(1, e);
  }
  /**
  Move to the next node in a last-to-first pre-order traversal. A
  node is followed by its last child or, if it has none, its
  previous sibling or the previous sibling of the first parent
  node that has one.
  */
  prev(e = !0) {
    return this.move(-1, e);
  }
  /**
  Move the cursor to the innermost node that covers `pos`. If
  `side` is -1, it will enter nodes that end at `pos`. If it is 1,
  it will enter nodes that start at `pos`.
  */
  moveTo(e, t = 0) {
    for (; (this.from == this.to || (t < 1 ? this.from >= e : this.from > e) || (t > -1 ? this.to <= e : this.to < e)) && this.parent(); )
      ;
    for (; this.enterChild(1, e, t); )
      ;
    return this;
  }
  /**
  Get a [syntax node](#common.SyntaxNode) at the cursor's current
  position.
  */
  get node() {
    if (!this.buffer)
      return this._tree;
    let e = this.bufferNode, t = null, i = 0;
    if (e && e.context == this.buffer)
      e: for (let r = this.index, O = this.stack.length; O >= 0; ) {
        for (let s = e; s; s = s._parent)
          if (s.index == r) {
            if (r == this.index)
              return s;
            t = s, i = O + 1;
            break e;
          }
        r = this.stack[--O];
      }
    for (let r = i; r < this.stack.length; r++)
      t = new De(this.buffer, t, this.stack[r]);
    return this.bufferNode = new De(this.buffer, t, this.index);
  }
  /**
  Get the [tree](#common.Tree) that represents the current node, if
  any. Will return null when the node is in a [tree
  buffer](#common.TreeBuffer).
  */
  get tree() {
    return this.buffer ? null : this._tree._tree;
  }
  /**
  Iterate over the current node and all its descendants, calling
  `enter` when entering a node and `leave`, if given, when leaving
  one. When `enter` returns `false`, any children of that node are
  skipped, and `leave` isn't called for it.
  */
  iterate(e, t) {
    for (let i = 0; ; ) {
      let r = !1;
      if (this.type.isAnonymous || e(this) !== !1) {
        if (this.firstChild()) {
          i++;
          continue;
        }
        this.type.isAnonymous || (r = !0);
      }
      for (; ; ) {
        if (r && t && t(this), r = this.type.isAnonymous, !i)
          return;
        if (this.nextSibling())
          break;
        this.parent(), i--, r = !0;
      }
    }
  }
  /**
  Test whether the current node matches a given context—a sequence
  of direct parent node names. Empty strings in the context array
  are treated as wildcards.
  */
  matchContext(e) {
    if (!this.buffer)
      return RO(this.node.parent, e);
    let { buffer: t } = this.buffer, { types: i } = t.set;
    for (let r = e.length - 1, O = this.stack.length - 1; r >= 0; O--) {
      if (O < 0)
        return RO(this._tree, e, r);
      let s = i[t.buffer[this.stack[O]]];
      if (!s.isAnonymous) {
        if (e[r] && e[r] != s.name)
          return !1;
        r--;
      }
    }
    return !0;
  }
}
function ds(n) {
  return n.children.some((e) => e instanceof gt || !e.type.isAnonymous || ds(e));
}
function dd(n) {
  var e;
  let { buffer: t, nodeSet: i, maxBufferLength: r = gc, reused: O = [], minRepeatType: s = i.types.length } = n, a = Array.isArray(t) ? new $s(t, t.length) : t, o = i.types, l = 0, c = 0;
  function h(y, Z, x, C, j, N) {
    let { id: V, start: R, end: E, size: D } = a, ie = c, ct = l;
    if (D < 0)
      if (a.next(), D == -1) {
        let Ke = O[V];
        x.push(Ke), C.push(R - y);
        return;
      } else if (D == -3) {
        l = V;
        return;
      } else if (D == -4) {
        c = V;
        return;
      } else
        throw new RangeError(`Unrecognized record size: ${D}`);
    let $i = o[V], en, yt, Us = R - y;
    if (E - R <= r && (yt = Q(a.pos - Z, j))) {
      let Ke = new Uint16Array(yt.size - yt.skip), ye = a.pos - yt.size, Ue = Ke.length;
      for (; a.pos > ye; )
        Ue = m(yt.start, Ke, Ue);
      en = new gt(Ke, E - yt.start, i), Us = yt.start - y;
    } else {
      let Ke = a.pos - D;
      a.next();
      let ye = [], Ue = [], bt = V >= s ? V : -1, Gt = 0, tn = E;
      for (; a.pos > Ke; )
        bt >= 0 && a.id == bt && a.size >= 0 ? (a.end <= tn - r && (d(ye, Ue, R, Gt, a.end, tn, bt, ie, ct), Gt = ye.length, tn = a.end), a.next()) : N > 2500 ? f(R, Ke, ye, Ue) : h(R, Ke, ye, Ue, bt, N + 1);
      if (bt >= 0 && Gt > 0 && Gt < ye.length && d(ye, Ue, R, Gt, R, tn, bt, ie, ct), ye.reverse(), Ue.reverse(), bt > -1 && Gt > 0) {
        let As = u($i, ct);
        en = ps($i, ye, Ue, 0, ye.length, 0, E - R, As, As);
      } else
        en = p($i, ye, Ue, E - R, ie - E, ct);
    }
    x.push(en), C.push(Us);
  }
  function f(y, Z, x, C) {
    let j = [], N = 0, V = -1;
    for (; a.pos > Z; ) {
      let { id: R, start: E, end: D, size: ie } = a;
      if (ie > 4)
        a.next();
      else {
        if (V > -1 && E < V)
          break;
        V < 0 && (V = D - r), j.push(R, E, D), N++, a.next();
      }
    }
    if (N) {
      let R = new Uint16Array(N * 4), E = j[j.length - 2];
      for (let D = j.length - 3, ie = 0; D >= 0; D -= 3)
        R[ie++] = j[D], R[ie++] = j[D + 1] - E, R[ie++] = j[D + 2] - E, R[ie++] = ie;
      x.push(new gt(R, j[2] - E, i)), C.push(E - y);
    }
  }
  function u(y, Z) {
    return (x, C, j) => {
      let N = 0, V = x.length - 1, R, E;
      if (V >= 0 && (R = x[V]) instanceof L) {
        if (!V && R.type == y && R.length == j)
          return R;
        (E = R.prop(z.lookAhead)) && (N = C[V] + R.length + E);
      }
      return p(y, x, C, j, N, Z);
    };
  }
  function d(y, Z, x, C, j, N, V, R, E) {
    let D = [], ie = [];
    for (; y.length > C; )
      D.push(y.pop()), ie.push(Z.pop() + x - j);
    y.push(p(i.types[V], D, ie, N - j, R - N, E)), Z.push(j - x);
  }
  function p(y, Z, x, C, j, N, V) {
    if (N) {
      let R = [z.contextHash, N];
      V = V ? [R].concat(V) : [R];
    }
    if (j > 25) {
      let R = [z.lookAhead, j];
      V = V ? [R].concat(V) : [R];
    }
    return new L(y, Z, x, C, V);
  }
  function Q(y, Z) {
    let x = a.fork(), C = 0, j = 0, N = 0, V = x.end - r, R = { size: 0, start: 0, skip: 0 };
    e: for (let E = x.pos - y; x.pos > E; ) {
      let D = x.size;
      if (x.id == Z && D >= 0) {
        R.size = C, R.start = j, R.skip = N, N += 4, C += 4, x.next();
        continue;
      }
      let ie = x.pos - D;
      if (D < 0 || ie < E || x.start < V)
        break;
      let ct = x.id >= s ? 4 : 0, $i = x.start;
      for (x.next(); x.pos > ie; ) {
        if (x.size < 0)
          if (x.size == -3 || x.size == -4)
            ct += 4;
          else
            break e;
        else x.id >= s && (ct += 4);
        x.next();
      }
      j = $i, C += D, N += ct;
    }
    return (Z < 0 || C == y) && (R.size = C, R.start = j, R.skip = N), R.size > 4 ? R : void 0;
  }
  function m(y, Z, x) {
    let { id: C, start: j, end: N, size: V } = a;
    if (a.next(), V >= 0 && C < s) {
      let R = x;
      if (V > 4) {
        let E = a.pos - (V - 4);
        for (; a.pos > E; )
          x = m(y, Z, x);
      }
      Z[--x] = R, Z[--x] = N - y, Z[--x] = j - y, Z[--x] = C;
    } else V == -3 ? l = C : V == -4 && (c = C);
    return x;
  }
  let g = [], T = [];
  for (; a.pos > 0; )
    h(n.start || 0, n.bufferStart || 0, g, T, -1, 0);
  let v = (e = n.length) !== null && e !== void 0 ? e : g.length ? T[0] + g[0].length : 0;
  return new L(o[n.topID], g.reverse(), T.reverse(), v);
}
const Wa = /* @__PURE__ */ new WeakMap();
function wn(n, e) {
  if (!n.isAnonymous || e instanceof gt || e.type != n)
    return 1;
  let t = Wa.get(e);
  if (t == null) {
    t = 1;
    for (let i of e.children) {
      if (i.type != n || !(i instanceof L)) {
        t = 1;
        break;
      }
      t += wn(n, i);
    }
    Wa.set(e, t);
  }
  return t;
}
function ps(n, e, t, i, r, O, s, a, o) {
  let l = 0;
  for (let d = i; d < r; d++)
    l += wn(n, e[d]);
  let c = Math.ceil(
    l * 1.5 / 8
    /* Balance.BranchFactor */
  ), h = [], f = [];
  function u(d, p, Q, m, g) {
    for (let T = Q; T < m; ) {
      let v = T, y = p[T], Z = wn(n, d[T]);
      for (T++; T < m; T++) {
        let x = wn(n, d[T]);
        if (Z + x >= c)
          break;
        Z += x;
      }
      if (T == v + 1) {
        if (Z > c) {
          let x = d[v];
          u(x.children, x.positions, 0, x.children.length, p[v] + g);
          continue;
        }
        h.push(d[v]);
      } else {
        let x = p[T - 1] + d[T - 1].length - y;
        h.push(ps(n, d, p, v, T, y, x, null, o));
      }
      f.push(y + g - O);
    }
  }
  return u(e, t, i, r, 0), (a || o)(h, f, s);
}
class yc {
  constructor() {
    this.map = /* @__PURE__ */ new WeakMap();
  }
  setBuffer(e, t, i) {
    let r = this.map.get(e);
    r || this.map.set(e, r = /* @__PURE__ */ new Map()), r.set(t, i);
  }
  getBuffer(e, t) {
    let i = this.map.get(e);
    return i && i.get(t);
  }
  /**
  Set the value for this syntax node.
  */
  set(e, t) {
    e instanceof De ? this.setBuffer(e.context.buffer, e.index, t) : e instanceof ae && this.map.set(e.tree, t);
  }
  /**
  Retrieve value for this syntax node, if it exists in the map.
  */
  get(e) {
    return e instanceof De ? this.getBuffer(e.context.buffer, e.index) : e instanceof ae ? this.map.get(e.tree) : void 0;
  }
  /**
  Set the value for the node that a cursor currently points to.
  */
  cursorSet(e, t) {
    e.buffer ? this.setBuffer(e.buffer.buffer, e.index, t) : this.map.set(e.tree, t);
  }
  /**
  Retrieve the value for the node that a cursor currently points
  to.
  */
  cursorGet(e) {
    return e.buffer ? this.getBuffer(e.buffer.buffer, e.index) : this.map.get(e.tree);
  }
}
class rt {
  /**
  Construct a tree fragment. You'll usually want to use
  [`addTree`](#common.TreeFragment^addTree) and
  [`applyChanges`](#common.TreeFragment^applyChanges) instead of
  calling this directly.
  */
  constructor(e, t, i, r, O = !1, s = !1) {
    this.from = e, this.to = t, this.tree = i, this.offset = r, this.open = (O ? 1 : 0) | (s ? 2 : 0);
  }
  /**
  Whether the start of the fragment represents the start of a
  parse, or the end of a change. (In the second case, it may not
  be safe to reuse some nodes at the start, depending on the
  parsing algorithm.)
  */
  get openStart() {
    return (this.open & 1) > 0;
  }
  /**
  Whether the end of the fragment represents the end of a
  full-document parse, or the start of a change.
  */
  get openEnd() {
    return (this.open & 2) > 0;
  }
  /**
  Create a set of fragments from a freshly parsed tree, or update
  an existing set of fragments by replacing the ones that overlap
  with a tree with content from the new tree. When `partial` is
  true, the parse is treated as incomplete, and the resulting
  fragment has [`openEnd`](#common.TreeFragment.openEnd) set to
  true.
  */
  static addTree(e, t = [], i = !1) {
    let r = [new rt(0, e.length, e, 0, !1, i)];
    for (let O of t)
      O.to > e.length && r.push(O);
    return r;
  }
  /**
  Apply a set of edits to an array of fragments, removing or
  splitting fragments as necessary to remove edited ranges, and
  adjusting offsets for fragments that moved.
  */
  static applyChanges(e, t, i = 128) {
    if (!t.length)
      return e;
    let r = [], O = 1, s = e.length ? e[0] : null;
    for (let a = 0, o = 0, l = 0; ; a++) {
      let c = a < t.length ? t[a] : null, h = c ? c.fromA : 1e9;
      if (h - o >= i)
        for (; s && s.from < h; ) {
          let f = s;
          if (o >= f.from || h <= f.to || l) {
            let u = Math.max(f.from, o) - l, d = Math.min(f.to, h) - l;
            f = u >= d ? null : new rt(u, d, f.tree, f.offset + l, a > 0, !!c);
          }
          if (f && r.push(f), s.to > h)
            break;
          s = O < e.length ? e[O++] : null;
        }
      if (!c)
        break;
      o = c.toA, l = c.toA - c.toB;
    }
    return r;
  }
}
class bc {
  /**
  Start a parse, returning a [partial parse](#common.PartialParse)
  object. [`fragments`](#common.TreeFragment) can be passed in to
  make the parse incremental.
  
  By default, the entire input is parsed. You can pass `ranges`,
  which should be a sorted array of non-empty, non-overlapping
  ranges, to parse only those ranges. The tree returned in that
  case will start at `ranges[0].from`.
  */
  startParse(e, t, i) {
    return typeof e == "string" && (e = new pd(e)), i = i ? i.length ? i.map((r) => new Xe(r.from, r.to)) : [new Xe(0, 0)] : [new Xe(0, e.length)], this.createParse(e, t || [], i);
  }
  /**
  Run a full parse, returning the resulting tree.
  */
  parse(e, t, i) {
    let r = this.startParse(e, t, i);
    for (; ; ) {
      let O = r.advance();
      if (O)
        return O;
    }
  }
}
class pd {
  constructor(e) {
    this.string = e;
  }
  get length() {
    return this.string.length;
  }
  chunk(e) {
    return this.string.slice(e);
  }
  get lineChunks() {
    return !1;
  }
  read(e, t) {
    return this.string.slice(e, t);
  }
}
function wc(n) {
  return (e, t, i, r) => new md(e, n, t, i, r);
}
class qa {
  constructor(e, t, i, r, O, s) {
    this.parser = e, this.parse = t, this.overlay = i, this.bracketed = r, this.target = O, this.from = s;
  }
}
function Ca(n) {
  if (!n.length || n.some((e) => e.from >= e.to))
    throw new RangeError("Invalid inner parse ranges given: " + JSON.stringify(n));
}
class Qd {
  constructor(e, t, i, r, O, s, a, o) {
    this.parser = e, this.predicate = t, this.mounts = i, this.index = r, this.start = O, this.bracketed = s, this.target = a, this.prev = o, this.depth = 0, this.ranges = [];
  }
}
const zO = new z({ perNode: !0 });
class md {
  constructor(e, t, i, r, O) {
    this.nest = t, this.input = i, this.fragments = r, this.ranges = O, this.inner = [], this.innerDone = 0, this.baseTree = null, this.stoppedAt = null, this.baseParse = e;
  }
  advance() {
    if (this.baseParse) {
      let i = this.baseParse.advance();
      if (!i)
        return null;
      if (this.baseParse = null, this.baseTree = i, this.startInner(), this.stoppedAt != null)
        for (let r of this.inner)
          r.parse.stopAt(this.stoppedAt);
    }
    if (this.innerDone == this.inner.length) {
      let i = this.baseTree;
      return this.stoppedAt != null && (i = new L(i.type, i.children, i.positions, i.length, i.propValues.concat([[zO, this.stoppedAt]]))), i;
    }
    let e = this.inner[this.innerDone], t = e.parse.advance();
    if (t) {
      this.innerDone++;
      let i = Object.assign(/* @__PURE__ */ Object.create(null), e.target.props);
      i[z.mounted.id] = new Ht(t, e.overlay, e.parser, e.bracketed), e.target.props = i;
    }
    return null;
  }
  get parsedPos() {
    if (this.baseParse)
      return 0;
    let e = this.input.length;
    for (let t = this.innerDone; t < this.inner.length; t++)
      this.inner[t].from < e && (e = Math.min(e, this.inner[t].parse.parsedPos));
    return e;
  }
  stopAt(e) {
    if (this.stoppedAt = e, this.baseParse)
      this.baseParse.stopAt(e);
    else
      for (let t = this.innerDone; t < this.inner.length; t++)
        this.inner[t].parse.stopAt(e);
  }
  startInner() {
    let e = new Pd(this.fragments), t = null, i = null, r = new An(new ae(this.baseTree, this.ranges[0].from, 0, null), A.IncludeAnonymous | A.IgnoreMounts);
    e: for (let O, s; ; ) {
      let a = !0, o;
      if (this.stoppedAt != null && r.from >= this.stoppedAt)
        a = !1;
      else if (e.hasNode(r)) {
        if (t) {
          let l = t.mounts.find((c) => c.frag.from <= r.from && c.frag.to >= r.to && c.mount.overlay);
          if (l)
            for (let c of l.mount.overlay) {
              let h = c.from + l.pos, f = c.to + l.pos;
              h >= r.from && f <= r.to && !t.ranges.some((u) => u.from < f && u.to > h) && t.ranges.push({ from: h, to: f });
            }
        }
        a = !1;
      } else if (i && (s = gd(i.ranges, r.from, r.to)))
        a = s != 2;
      else if (!r.type.isAnonymous && (O = this.nest(r, this.input)) && (r.from < r.to || !O.overlay)) {
        r.tree || (Sd(r), t && t.depth++, i && i.depth++);
        let l = e.findMounts(r.from, O.parser);
        if (typeof O.overlay == "function")
          t = new Qd(O.parser, O.overlay, l, this.inner.length, r.from, !!O.bracketed, r.tree, t);
        else {
          let c = Ga(this.ranges, O.overlay || (r.from < r.to ? [new Xe(r.from, r.to)] : []));
          c.length && Ca(c), (c.length || !O.overlay) && this.inner.push(new qa(O.parser, c.length ? O.parser.startParse(this.input, ja(l, c), c) : O.parser.startParse(""), O.overlay ? O.overlay.map((h) => new Xe(h.from - r.from, h.to - r.from)) : null, !!O.bracketed, r.tree, c.length ? c[0].from : r.from)), O.overlay ? c.length && (i = { ranges: c, depth: 0, prev: i }) : a = !1;
        }
      } else if (t && (o = t.predicate(r)) && (o === !0 && (o = new Xe(r.from, r.to)), o.from < o.to)) {
        let l = t.ranges.length - 1;
        l >= 0 && t.ranges[l].to == o.from ? t.ranges[l] = { from: t.ranges[l].from, to: o.to } : t.ranges.push(o);
      }
      if (a && r.firstChild())
        t && t.depth++, i && i.depth++;
      else
        for (; !r.nextSibling(); ) {
          if (!r.parent())
            break e;
          if (t && !--t.depth) {
            let l = Ga(this.ranges, t.ranges);
            l.length && (Ca(l), this.inner.splice(t.index, 0, new qa(t.parser, t.parser.startParse(this.input, ja(t.mounts, l), l), t.ranges.map((c) => new Xe(c.from - t.start, c.to - t.start)), t.bracketed, t.target, l[0].from))), t = t.prev;
          }
          i && !--i.depth && (i = i.prev);
        }
    }
  }
}
function gd(n, e, t) {
  for (let i of n) {
    if (i.from >= t)
      break;
    if (i.to > e)
      return i.from <= e && i.to >= t ? 2 : 1;
  }
  return 0;
}
function Ua(n, e, t, i, r, O) {
  if (e < t) {
    let s = n.buffer[e + 1];
    i.push(n.slice(e, t, s)), r.push(s - O);
  }
}
function Sd(n) {
  let { node: e } = n, t = [], i = e.context.buffer;
  do
    t.push(n.index), n.parent();
  while (!n.tree);
  let r = n.tree, O = r.children.indexOf(i), s = r.children[O], a = s.buffer, o = [O];
  function l(c, h, f, u, d, p) {
    let Q = t[p], m = [], g = [];
    Ua(s, c, Q, m, g, u);
    let T = a[Q + 1], v = a[Q + 2];
    o.push(m.length);
    let y = p ? l(Q + 4, a[Q + 3], s.set.types[a[Q]], T, v - T, p - 1) : e.toTree();
    return m.push(y), g.push(T - u), Ua(s, a[Q + 3], h, m, g, u), new L(f, m, g, d);
  }
  r.children[O] = l(0, a.length, he.none, 0, s.length, t.length - 1);
  for (let c of o) {
    let h = n.tree.children[c], f = n.tree.positions[c];
    n.yield(new ae(h, f + n.from, c, n._tree));
  }
}
class Aa {
  constructor(e, t) {
    this.offset = t, this.done = !1, this.cursor = e.cursor(A.IncludeAnonymous | A.IgnoreMounts);
  }
  // Move to the first node (in pre-order) that starts at or after `pos`.
  moveTo(e) {
    let { cursor: t } = this, i = e - this.offset;
    for (; !this.done && t.from < i; )
      t.to >= e && t.enter(i, 1, A.IgnoreOverlays | A.ExcludeBuffers) || t.next(!1) || (this.done = !0);
  }
  hasNode(e) {
    if (this.moveTo(e.from), !this.done && this.cursor.from + this.offset == e.from && this.cursor.tree)
      for (let t = this.cursor.tree; ; ) {
        if (t == e.tree)
          return !0;
        if (t.children.length && t.positions[0] == 0 && t.children[0] instanceof L)
          t = t.children[0];
        else
          break;
      }
    return !1;
  }
}
let Pd = class {
  constructor(e) {
    var t;
    if (this.fragments = e, this.curTo = 0, this.fragI = 0, e.length) {
      let i = this.curFrag = e[0];
      this.curTo = (t = i.tree.prop(zO)) !== null && t !== void 0 ? t : i.to, this.inner = new Aa(i.tree, -i.offset);
    } else
      this.curFrag = this.inner = null;
  }
  hasNode(e) {
    for (; this.curFrag && e.from >= this.curTo; )
      this.nextFrag();
    return this.curFrag && this.curFrag.from <= e.from && this.curTo >= e.to && this.inner.hasNode(e);
  }
  nextFrag() {
    var e;
    if (this.fragI++, this.fragI == this.fragments.length)
      this.curFrag = this.inner = null;
    else {
      let t = this.curFrag = this.fragments[this.fragI];
      this.curTo = (e = t.tree.prop(zO)) !== null && e !== void 0 ? e : t.to, this.inner = new Aa(t.tree, -t.offset);
    }
  }
  findMounts(e, t) {
    var i;
    let r = [];
    if (this.inner) {
      this.inner.cursor.moveTo(e, 1);
      for (let O = this.inner.cursor.node; O; O = O.parent) {
        let s = (i = O.tree) === null || i === void 0 ? void 0 : i.prop(z.mounted);
        if (s && s.parser == t)
          for (let a = this.fragI; a < this.fragments.length; a++) {
            let o = this.fragments[a];
            if (o.from >= O.to)
              break;
            o.tree == this.curFrag.tree && r.push({
              frag: o,
              pos: O.from - o.offset,
              mount: s
            });
          }
      }
    }
    return r;
  }
};
function Ga(n, e) {
  let t = null, i = e;
  for (let r = 1, O = 0; r < n.length; r++) {
    let s = n[r - 1].to, a = n[r].from;
    for (; O < i.length; O++) {
      let o = i[O];
      if (o.from >= a)
        break;
      o.to <= s || (t || (i = t = e.slice()), o.from < s ? (t[O] = new Xe(o.from, s), o.to > a && t.splice(O + 1, 0, new Xe(a, o.to))) : o.to > a ? t[O--] = new Xe(a, o.to) : t.splice(O--, 1));
    }
  }
  return i;
}
function Td(n, e, t, i) {
  let r = 0, O = 0, s = !1, a = !1, o = -1e9, l = [];
  for (; ; ) {
    let c = r == n.length ? 1e9 : s ? n[r].to : n[r].from, h = O == e.length ? 1e9 : a ? e[O].to : e[O].from;
    if (s != a) {
      let f = Math.max(o, t), u = Math.min(c, h, i);
      f < u && l.push(new Xe(f, u));
    }
    if (o = Math.min(c, h), o == 1e9)
      break;
    c == o && (s ? (s = !1, r++) : s = !0), h == o && (a ? (a = !1, O++) : a = !0);
  }
  return l;
}
function ja(n, e) {
  let t = [];
  for (let { pos: i, mount: r, frag: O } of n) {
    let s = i + (r.overlay ? r.overlay[0].from : 0), a = s + r.tree.length, o = Math.max(O.from, s), l = Math.min(O.to, a);
    if (r.overlay) {
      let c = r.overlay.map((f) => new Xe(f.from + i, f.to + i)), h = Td(e, c, o, l);
      for (let f = 0, u = o; ; f++) {
        let d = f == h.length, p = d ? l : h[f].from;
        if (p > u && t.push(new rt(u, p, r.tree, -s, O.from >= u || O.openStart, O.to <= p || O.openEnd)), d)
          break;
        u = h[f].to;
      }
    } else
      t.push(new rt(o, l, r.tree, -s, O.from >= s || O.openStart, O.to <= a || O.openEnd));
  }
  return t;
}
let yd = 0;
class we {
  /**
  @internal
  */
  constructor(e, t, i, r) {
    this.name = e, this.set = t, this.base = i, this.modified = r, this.id = yd++;
  }
  toString() {
    let { name: e } = this;
    for (let t of this.modified)
      t.name && (e = `${t.name}(${e})`);
    return e;
  }
  static define(e, t) {
    let i = typeof e == "string" ? e : "?";
    if (e instanceof we && (t = e), t != null && t.base)
      throw new Error("Can not derive from a modified tag");
    let r = new we(i, [], null, []);
    if (r.set.push(r), t)
      for (let O of t.set)
        r.set.push(O);
    return r;
  }
  /**
  Define a tag _modifier_, which is a function that, given a tag,
  will return a tag that is a subtag of the original. Applying the
  same modifier to a twice tag will return the same value (`m1(t1)
  == m1(t1)`) and applying multiple modifiers will, regardless or
  order, produce the same tag (`m1(m2(t1)) == m2(m1(t1))`).
  
  When multiple modifiers are applied to a given base tag, each
  smaller set of modifiers is registered as a parent, so that for
  example `m1(m2(m3(t1)))` is a subtype of `m1(m2(t1))`,
  `m1(m3(t1)`, and so on.
  */
  static defineModifier(e) {
    let t = new Gn(e);
    return (i) => i.modified.indexOf(t) > -1 ? i : Gn.get(i.base || i, i.modified.concat(t).sort((r, O) => r.id - O.id));
  }
}
let bd = 0;
class Gn {
  constructor(e) {
    this.name = e, this.instances = [], this.id = bd++;
  }
  static get(e, t) {
    if (!t.length)
      return e;
    let i = t[0].instances.find((a) => a.base == e && wd(t, a.modified));
    if (i)
      return i;
    let r = [], O = new we(e.name, r, e, t);
    for (let a of t)
      a.instances.push(O);
    let s = xd(t);
    for (let a of e.set)
      if (!a.modified.length)
        for (let o of s)
          r.push(Gn.get(a, o));
    return O;
  }
}
function wd(n, e) {
  return n.length == e.length && n.every((t, i) => t == e[i]);
}
function xd(n) {
  let e = [[]];
  for (let t = 0; t < n.length; t++)
    for (let i = 0, r = e.length; i < r; i++)
      e.push(e[i].concat(n[t]));
  return e.sort((t, i) => i.length - t.length);
}
function Ct(n) {
  let e = /* @__PURE__ */ Object.create(null);
  for (let t in n) {
    let i = n[t];
    Array.isArray(i) || (i = [i]);
    for (let r of t.split(" "))
      if (r) {
        let O = [], s = 2, a = r;
        for (let h = 0; ; ) {
          if (a == "..." && h > 0 && h + 3 == r.length) {
            s = 1;
            break;
          }
          let f = /^"(?:[^"\\]|\\.)*?"|[^\/!]+/.exec(a);
          if (!f)
            throw new RangeError("Invalid path: " + r);
          if (O.push(f[0] == "*" ? "" : f[0][0] == '"' ? JSON.parse(f[0]) : f[0]), h += f[0].length, h == r.length)
            break;
          let u = r[h++];
          if (h == r.length && u == "!") {
            s = 0;
            break;
          }
          if (u != "/")
            throw new RangeError("Invalid path: " + r);
          a = r.slice(h);
        }
        let o = O.length - 1, l = O[o];
        if (!l)
          throw new RangeError("Invalid path: " + r);
        let c = new Ai(i, s, o > 0 ? O.slice(0, o) : null);
        e[l] = c.sort(e[l]);
      }
  }
  return xc.add(e);
}
const xc = new z({
  combine(n, e) {
    let t, i, r;
    for (; n || e; ) {
      if (!n || e && n.depth >= e.depth ? (r = e, e = e.next) : (r = n, n = n.next), t && t.mode == r.mode && !r.context && !t.context)
        continue;
      let O = new Ai(r.tags, r.mode, r.context);
      t ? t.next = O : i = O, t = O;
    }
    return i;
  }
});
class Ai {
  constructor(e, t, i, r) {
    this.tags = e, this.mode = t, this.context = i, this.next = r;
  }
  get opaque() {
    return this.mode == 0;
  }
  get inherit() {
    return this.mode == 1;
  }
  sort(e) {
    return !e || e.depth < this.depth ? (this.next = e, this) : (e.next = this.sort(e.next), e);
  }
  get depth() {
    return this.context ? this.context.length : 0;
  }
}
Ai.empty = new Ai([], 2, null);
function kc(n, e) {
  let t = /* @__PURE__ */ Object.create(null);
  for (let O of n)
    if (!Array.isArray(O.tag))
      t[O.tag.id] = O.class;
    else
      for (let s of O.tag)
        t[s.id] = O.class;
  let { scope: i, all: r = null } = e || {};
  return {
    style: (O) => {
      let s = r;
      for (let a of O)
        for (let o of a.set) {
          let l = t[o.id];
          if (l) {
            s = s ? s + " " + l : l;
            break;
          }
        }
      return s;
    },
    scope: i
  };
}
function kd(n, e) {
  let t = null;
  for (let i of n) {
    let r = i.style(e);
    r && (t = t ? t + " " + r : r);
  }
  return t;
}
function Xd(n, e, t, i = 0, r = n.length) {
  let O = new vd(i, Array.isArray(e) ? e : [e], t);
  O.highlightRange(n.cursor(), i, r, "", O.highlighters), O.flush(r);
}
class vd {
  constructor(e, t, i) {
    this.at = e, this.highlighters = t, this.span = i, this.class = "";
  }
  startSpan(e, t) {
    t != this.class && (this.flush(e), e > this.at && (this.at = e), this.class = t);
  }
  flush(e) {
    e > this.at && this.class && this.span(this.at, e, this.class);
  }
  highlightRange(e, t, i, r, O) {
    let { type: s, from: a, to: o } = e;
    if (a >= i || o <= t)
      return;
    s.isTop && (O = this.highlighters.filter((u) => !u.scope || u.scope(s)));
    let l = r, c = Zd(e) || Ai.empty, h = kd(O, c.tags);
    if (h && (l && (l += " "), l += h, c.mode == 1 && (r += (r ? " " : "") + h)), this.startSpan(Math.max(t, a), l), c.opaque)
      return;
    let f = e.tree && e.tree.prop(z.mounted);
    if (f && f.overlay) {
      let u = e.node.enter(f.overlay[0].from + a, 1), d = this.highlighters.filter((Q) => !Q.scope || Q.scope(f.tree.type)), p = e.firstChild();
      for (let Q = 0, m = a; ; Q++) {
        let g = Q < f.overlay.length ? f.overlay[Q] : null, T = g ? g.from + a : o, v = Math.max(t, m), y = Math.min(i, T);
        if (v < y && p)
          for (; e.from < y && (this.highlightRange(e, v, y, r, O), this.startSpan(Math.min(y, e.to), l), !(e.to >= T || !e.nextSibling())); )
            ;
        if (!g || T > i)
          break;
        m = g.to + a, m > t && (this.highlightRange(u.cursor(), Math.max(t, g.from + a), Math.min(i, m), "", d), this.startSpan(Math.min(i, m), l));
      }
      p && e.parent();
    } else if (e.firstChild()) {
      f && (r = "");
      do
        if (!(e.to <= t)) {
          if (e.from >= i)
            break;
          this.highlightRange(e, t, i, r, O), this.startSpan(Math.min(i, e.to), l);
        }
      while (e.nextSibling());
      e.parent();
    }
  }
}
function Zd(n) {
  let e = n.type.prop(xc);
  for (; e && e.context && !n.matchContext(e.context); )
    e = e.next;
  return e || null;
}
const P = we.define, pn = P(), ht = P(), Ma = P(ht), Ea = P(ht), ft = P(), Qn = P(ft), Zr = P(ft), Me = P(), wt = P(Me), Ge = P(), je = P(), _O = P(), Qi = P(_O), mn = P(), $ = {
  /**
  A comment.
  */
  comment: pn,
  /**
  A line [comment](#highlight.tags.comment).
  */
  lineComment: P(pn),
  /**
  A block [comment](#highlight.tags.comment).
  */
  blockComment: P(pn),
  /**
  A documentation [comment](#highlight.tags.comment).
  */
  docComment: P(pn),
  /**
  Any kind of identifier.
  */
  name: ht,
  /**
  The [name](#highlight.tags.name) of a variable.
  */
  variableName: P(ht),
  /**
  A type [name](#highlight.tags.name).
  */
  typeName: Ma,
  /**
  A tag name (subtag of [`typeName`](#highlight.tags.typeName)).
  */
  tagName: P(Ma),
  /**
  A property or field [name](#highlight.tags.name).
  */
  propertyName: Ea,
  /**
  An attribute name (subtag of [`propertyName`](#highlight.tags.propertyName)).
  */
  attributeName: P(Ea),
  /**
  The [name](#highlight.tags.name) of a class.
  */
  className: P(ht),
  /**
  A label [name](#highlight.tags.name).
  */
  labelName: P(ht),
  /**
  A namespace [name](#highlight.tags.name).
  */
  namespace: P(ht),
  /**
  The [name](#highlight.tags.name) of a macro.
  */
  macroName: P(ht),
  /**
  A literal value.
  */
  literal: ft,
  /**
  A string [literal](#highlight.tags.literal).
  */
  string: Qn,
  /**
  A documentation [string](#highlight.tags.string).
  */
  docString: P(Qn),
  /**
  A character literal (subtag of [string](#highlight.tags.string)).
  */
  character: P(Qn),
  /**
  An attribute value (subtag of [string](#highlight.tags.string)).
  */
  attributeValue: P(Qn),
  /**
  A number [literal](#highlight.tags.literal).
  */
  number: Zr,
  /**
  An integer [number](#highlight.tags.number) literal.
  */
  integer: P(Zr),
  /**
  A floating-point [number](#highlight.tags.number) literal.
  */
  float: P(Zr),
  /**
  A boolean [literal](#highlight.tags.literal).
  */
  bool: P(ft),
  /**
  Regular expression [literal](#highlight.tags.literal).
  */
  regexp: P(ft),
  /**
  An escape [literal](#highlight.tags.literal), for example a
  backslash escape in a string.
  */
  escape: P(ft),
  /**
  A color [literal](#highlight.tags.literal).
  */
  color: P(ft),
  /**
  A URL [literal](#highlight.tags.literal).
  */
  url: P(ft),
  /**
  A language keyword.
  */
  keyword: Ge,
  /**
  The [keyword](#highlight.tags.keyword) for the self or this
  object.
  */
  self: P(Ge),
  /**
  The [keyword](#highlight.tags.keyword) for null.
  */
  null: P(Ge),
  /**
  A [keyword](#highlight.tags.keyword) denoting some atomic value.
  */
  atom: P(Ge),
  /**
  A [keyword](#highlight.tags.keyword) that represents a unit.
  */
  unit: P(Ge),
  /**
  A modifier [keyword](#highlight.tags.keyword).
  */
  modifier: P(Ge),
  /**
  A [keyword](#highlight.tags.keyword) that acts as an operator.
  */
  operatorKeyword: P(Ge),
  /**
  A control-flow related [keyword](#highlight.tags.keyword).
  */
  controlKeyword: P(Ge),
  /**
  A [keyword](#highlight.tags.keyword) that defines something.
  */
  definitionKeyword: P(Ge),
  /**
  A [keyword](#highlight.tags.keyword) related to defining or
  interfacing with modules.
  */
  moduleKeyword: P(Ge),
  /**
  An operator.
  */
  operator: je,
  /**
  An [operator](#highlight.tags.operator) that dereferences something.
  */
  derefOperator: P(je),
  /**
  Arithmetic-related [operator](#highlight.tags.operator).
  */
  arithmeticOperator: P(je),
  /**
  Logical [operator](#highlight.tags.operator).
  */
  logicOperator: P(je),
  /**
  Bit [operator](#highlight.tags.operator).
  */
  bitwiseOperator: P(je),
  /**
  Comparison [operator](#highlight.tags.operator).
  */
  compareOperator: P(je),
  /**
  [Operator](#highlight.tags.operator) that updates its operand.
  */
  updateOperator: P(je),
  /**
  [Operator](#highlight.tags.operator) that defines something.
  */
  definitionOperator: P(je),
  /**
  Type-related [operator](#highlight.tags.operator).
  */
  typeOperator: P(je),
  /**
  Control-flow [operator](#highlight.tags.operator).
  */
  controlOperator: P(je),
  /**
  Program or markup punctuation.
  */
  punctuation: _O,
  /**
  [Punctuation](#highlight.tags.punctuation) that separates
  things.
  */
  separator: P(_O),
  /**
  Bracket-style [punctuation](#highlight.tags.punctuation).
  */
  bracket: Qi,
  /**
  Angle [brackets](#highlight.tags.bracket) (usually `<` and `>`
  tokens).
  */
  angleBracket: P(Qi),
  /**
  Square [brackets](#highlight.tags.bracket) (usually `[` and `]`
  tokens).
  */
  squareBracket: P(Qi),
  /**
  Parentheses (usually `(` and `)` tokens). Subtag of
  [bracket](#highlight.tags.bracket).
  */
  paren: P(Qi),
  /**
  Braces (usually `{` and `}` tokens). Subtag of
  [bracket](#highlight.tags.bracket).
  */
  brace: P(Qi),
  /**
  Content, for example plain text in XML or markup documents.
  */
  content: Me,
  /**
  [Content](#highlight.tags.content) that represents a heading.
  */
  heading: wt,
  /**
  A level 1 [heading](#highlight.tags.heading).
  */
  heading1: P(wt),
  /**
  A level 2 [heading](#highlight.tags.heading).
  */
  heading2: P(wt),
  /**
  A level 3 [heading](#highlight.tags.heading).
  */
  heading3: P(wt),
  /**
  A level 4 [heading](#highlight.tags.heading).
  */
  heading4: P(wt),
  /**
  A level 5 [heading](#highlight.tags.heading).
  */
  heading5: P(wt),
  /**
  A level 6 [heading](#highlight.tags.heading).
  */
  heading6: P(wt),
  /**
  A prose [content](#highlight.tags.content) separator (such as a horizontal rule).
  */
  contentSeparator: P(Me),
  /**
  [Content](#highlight.tags.content) that represents a list.
  */
  list: P(Me),
  /**
  [Content](#highlight.tags.content) that represents a quote.
  */
  quote: P(Me),
  /**
  [Content](#highlight.tags.content) that is emphasized.
  */
  emphasis: P(Me),
  /**
  [Content](#highlight.tags.content) that is styled strong.
  */
  strong: P(Me),
  /**
  [Content](#highlight.tags.content) that is part of a link.
  */
  link: P(Me),
  /**
  [Content](#highlight.tags.content) that is styled as code or
  monospace.
  */
  monospace: P(Me),
  /**
  [Content](#highlight.tags.content) that has a strike-through
  style.
  */
  strikethrough: P(Me),
  /**
  Inserted text in a change-tracking format.
  */
  inserted: P(),
  /**
  Deleted text.
  */
  deleted: P(),
  /**
  Changed text.
  */
  changed: P(),
  /**
  An invalid or unsyntactic element.
  */
  invalid: P(),
  /**
  Metadata or meta-instruction.
  */
  meta: mn,
  /**
  [Metadata](#highlight.tags.meta) that applies to the entire
  document.
  */
  documentMeta: P(mn),
  /**
  [Metadata](#highlight.tags.meta) that annotates or adds
  attributes to a given syntactic element.
  */
  annotation: P(mn),
  /**
  Processing instruction or preprocessor directive. Subtag of
  [meta](#highlight.tags.meta).
  */
  processingInstruction: P(mn),
  /**
  [Modifier](#highlight.Tag^defineModifier) that indicates that a
  given element is being defined. Expected to be used with the
  various [name](#highlight.tags.name) tags.
  */
  definition: we.defineModifier("definition"),
  /**
  [Modifier](#highlight.Tag^defineModifier) that indicates that
  something is constant. Mostly expected to be used with
  [variable names](#highlight.tags.variableName).
  */
  constant: we.defineModifier("constant"),
  /**
  [Modifier](#highlight.Tag^defineModifier) used to indicate that
  a [variable](#highlight.tags.variableName) or [property
  name](#highlight.tags.propertyName) is being called or defined
  as a function.
  */
  function: we.defineModifier("function"),
  /**
  [Modifier](#highlight.Tag^defineModifier) that can be applied to
  [names](#highlight.tags.name) to indicate that they belong to
  the language's standard environment.
  */
  standard: we.defineModifier("standard"),
  /**
  [Modifier](#highlight.Tag^defineModifier) that indicates a given
  [names](#highlight.tags.name) is local to some scope.
  */
  local: we.defineModifier("local"),
  /**
  A generic variant [modifier](#highlight.Tag^defineModifier) that
  can be used to tag language-specific alternative variants of
  some common tag. It is recommended for themes to define special
  forms of at least the [string](#highlight.tags.string) and
  [variable name](#highlight.tags.variableName) tags, since those
  come up a lot.
  */
  special: we.defineModifier("special")
};
for (let n in $) {
  let e = $[n];
  e instanceof we && (e.name = n);
}
kc([
  { tag: $.link, class: "tok-link" },
  { tag: $.heading, class: "tok-heading" },
  { tag: $.emphasis, class: "tok-emphasis" },
  { tag: $.strong, class: "tok-strong" },
  { tag: $.keyword, class: "tok-keyword" },
  { tag: $.atom, class: "tok-atom" },
  { tag: $.bool, class: "tok-bool" },
  { tag: $.url, class: "tok-url" },
  { tag: $.labelName, class: "tok-labelName" },
  { tag: $.inserted, class: "tok-inserted" },
  { tag: $.deleted, class: "tok-deleted" },
  { tag: $.literal, class: "tok-literal" },
  { tag: $.string, class: "tok-string" },
  { tag: $.number, class: "tok-number" },
  { tag: [$.regexp, $.escape, $.special($.string)], class: "tok-string2" },
  { tag: $.variableName, class: "tok-variableName" },
  { tag: $.local($.variableName), class: "tok-variableName tok-local" },
  { tag: $.definition($.variableName), class: "tok-variableName tok-definition" },
  { tag: $.special($.variableName), class: "tok-variableName2" },
  { tag: $.definition($.propertyName), class: "tok-propertyName tok-definition" },
  { tag: $.typeName, class: "tok-typeName" },
  { tag: $.namespace, class: "tok-namespace" },
  { tag: $.className, class: "tok-className" },
  { tag: $.macroName, class: "tok-macroName" },
  { tag: $.propertyName, class: "tok-propertyName" },
  { tag: $.operator, class: "tok-operator" },
  { tag: $.comment, class: "tok-comment" },
  { tag: $.meta, class: "tok-meta" },
  { tag: $.invalid, class: "tok-invalid" },
  { tag: $.punctuation, class: "tok-punctuation" }
]);
var Rr;
const Lt = /* @__PURE__ */ new z();
function Xc(n) {
  return w.define({
    combine: n ? (e) => e.concat(n) : void 0
  });
}
const Qs = /* @__PURE__ */ new z();
class Ve {
  /**
  Construct a language object. If you need to invoke this
  directly, first define a data facet with
  [`defineLanguageFacet`](https://codemirror.net/6/docs/ref/#language.defineLanguageFacet), and then
  configure your parser to [attach](https://codemirror.net/6/docs/ref/#language.languageDataProp) it
  to the language's outer syntax node.
  */
  constructor(e, t, i = [], r = "") {
    this.data = e, this.name = r, q.prototype.hasOwnProperty("tree") || Object.defineProperty(q.prototype, "tree", { get() {
      return I(this);
    } }), this.parser = t, this.extension = [
      St.of(this),
      q.languageData.of((O, s, a) => {
        let o = La(O, s, a), l = o.type.prop(Lt);
        if (!l)
          return [];
        let c = O.facet(l), h = o.type.prop(Qs);
        if (h) {
          let f = o.resolve(s - o.from, a);
          for (let u of h)
            if (u.test(f, O)) {
              let d = O.facet(u.facet);
              return u.type == "replace" ? d : d.concat(c);
            }
        }
        return c;
      })
    ].concat(i);
  }
  /**
  Query whether this language is active at the given position.
  */
  isActiveAt(e, t, i = -1) {
    return La(e, t, i).type.prop(Lt) == this.data;
  }
  /**
  Find the document regions that were parsed using this language.
  The returned regions will _include_ any nested languages rooted
  in this language, when those exist.
  */
  findRegions(e) {
    let t = e.facet(St);
    if ((t == null ? void 0 : t.data) == this.data)
      return [{ from: 0, to: e.doc.length }];
    if (!t || !t.allowsNesting)
      return [];
    let i = [], r = (O, s) => {
      if (O.prop(Lt) == this.data) {
        i.push({ from: s, to: s + O.length });
        return;
      }
      let a = O.prop(z.mounted);
      if (a) {
        if (a.tree.prop(Lt) == this.data) {
          if (a.overlay)
            for (let o of a.overlay)
              i.push({ from: o.from + s, to: o.to + s });
          else
            i.push({ from: s, to: s + O.length });
          return;
        } else if (a.overlay) {
          let o = i.length;
          if (r(a.tree, a.overlay[0].from + s), i.length > o)
            return;
        }
      }
      for (let o = 0; o < O.children.length; o++) {
        let l = O.children[o];
        l instanceof L && r(l, O.positions[o] + s);
      }
    };
    return r(I(e), 0), i;
  }
  /**
  Indicates whether this language allows nested languages. The
  default implementation returns true.
  */
  get allowsNesting() {
    return !0;
  }
}
Ve.setState = /* @__PURE__ */ U.define();
function La(n, e, t) {
  let i = n.facet(St), r = I(n).topNode;
  if (!i || i.allowsNesting)
    for (let O = r; O; O = O.enter(e, t, A.ExcludeBuffers | A.EnterBracketed))
      O.type.isTop && (r = O);
  return r;
}
class at extends Ve {
  constructor(e, t, i) {
    super(e, t, [], i), this.parser = t;
  }
  /**
  Define a language from a parser.
  */
  static define(e) {
    let t = Xc(e.languageData);
    return new at(t, e.parser.configure({
      props: [Lt.add((i) => i.isTop ? t : void 0)]
    }), e.name);
  }
  /**
  Create a new instance of this language with a reconfigured
  version of its parser and optionally a new name.
  */
  configure(e, t) {
    return new at(this.data, this.parser.configure(e), t || this.name);
  }
  get allowsNesting() {
    return this.parser.hasWrappers();
  }
}
function I(n) {
  let e = n.field(Ve.state, !1);
  return e ? e.tree : L.empty;
}
class Rd {
  /**
  Create an input object for the given document.
  */
  constructor(e) {
    this.doc = e, this.cursorPos = 0, this.string = "", this.cursor = e.iter();
  }
  get length() {
    return this.doc.length;
  }
  syncTo(e) {
    return this.string = this.cursor.next(e - this.cursorPos).value, this.cursorPos = e + this.string.length, this.cursorPos - this.string.length;
  }
  chunk(e) {
    return this.syncTo(e), this.string;
  }
  get lineChunks() {
    return !0;
  }
  read(e, t) {
    let i = this.cursorPos - this.string.length;
    return e < i || t >= this.cursorPos ? this.doc.sliceString(e, t) : this.string.slice(e - i, t - i);
  }
}
let mi = null;
class jn {
  constructor(e, t, i = [], r, O, s, a, o) {
    this.parser = e, this.state = t, this.fragments = i, this.tree = r, this.treeLen = O, this.viewport = s, this.skipped = a, this.scheduleOn = o, this.parse = null, this.tempSkipped = [];
  }
  /**
  @internal
  */
  static create(e, t, i) {
    return new jn(e, t, [], L.empty, 0, i, [], null);
  }
  startParse() {
    return this.parser.startParse(new Rd(this.state.doc), this.fragments);
  }
  /**
  @internal
  */
  work(e, t) {
    return t != null && t >= this.state.doc.length && (t = void 0), this.tree != L.empty && this.isDone(t ?? this.state.doc.length) ? (this.takeTree(), !0) : this.withContext(() => {
      var i;
      if (typeof e == "number") {
        let r = Date.now() + e;
        e = () => Date.now() > r;
      }
      for (this.parse || (this.parse = this.startParse()), t != null && (this.parse.stoppedAt == null || this.parse.stoppedAt > t) && t < this.state.doc.length && this.parse.stopAt(t); ; ) {
        let r = this.parse.advance();
        if (r)
          if (this.fragments = this.withoutTempSkipped(rt.addTree(r, this.fragments, this.parse.stoppedAt != null)), this.treeLen = (i = this.parse.stoppedAt) !== null && i !== void 0 ? i : this.state.doc.length, this.tree = r, this.parse = null, this.treeLen < (t ?? this.state.doc.length))
            this.parse = this.startParse();
          else
            return !0;
        if (e())
          return !1;
      }
    });
  }
  /**
  @internal
  */
  takeTree() {
    let e, t;
    this.parse && (e = this.parse.parsedPos) >= this.treeLen && ((this.parse.stoppedAt == null || this.parse.stoppedAt > e) && this.parse.stopAt(e), this.withContext(() => {
      for (; !(t = this.parse.advance()); )
        ;
    }), this.treeLen = e, this.tree = t, this.fragments = this.withoutTempSkipped(rt.addTree(this.tree, this.fragments, !0)), this.parse = null);
  }
  withContext(e) {
    let t = mi;
    mi = this;
    try {
      return e();
    } finally {
      mi = t;
    }
  }
  withoutTempSkipped(e) {
    for (let t; t = this.tempSkipped.pop(); )
      e = Da(e, t.from, t.to);
    return e;
  }
  /**
  @internal
  */
  changes(e, t) {
    let { fragments: i, tree: r, treeLen: O, viewport: s, skipped: a } = this;
    if (this.takeTree(), !e.empty) {
      let o = [];
      if (e.iterChangedRanges((l, c, h, f) => o.push({ fromA: l, toA: c, fromB: h, toB: f })), i = rt.applyChanges(i, o), r = L.empty, O = 0, s = { from: e.mapPos(s.from, -1), to: e.mapPos(s.to, 1) }, this.skipped.length) {
        a = [];
        for (let l of this.skipped) {
          let c = e.mapPos(l.from, 1), h = e.mapPos(l.to, -1);
          c < h && a.push({ from: c, to: h });
        }
      }
    }
    return new jn(this.parser, t, i, r, O, s, a, this.scheduleOn);
  }
  /**
  @internal
  */
  updateViewport(e) {
    if (this.viewport.from == e.from && this.viewport.to == e.to)
      return !1;
    this.viewport = e;
    let t = this.skipped.length;
    for (let i = 0; i < this.skipped.length; i++) {
      let { from: r, to: O } = this.skipped[i];
      r < e.to && O > e.from && (this.fragments = Da(this.fragments, r, O), this.skipped.splice(i--, 1));
    }
    return this.skipped.length >= t ? !1 : (this.reset(), !0);
  }
  /**
  @internal
  */
  reset() {
    this.parse && (this.takeTree(), this.parse = null);
  }
  /**
  Notify the parse scheduler that the given region was skipped
  because it wasn't in view, and the parse should be restarted
  when it comes into view.
  */
  skipUntilInView(e, t) {
    this.skipped.push({ from: e, to: t });
  }
  /**
  Returns a parser intended to be used as placeholder when
  asynchronously loading a nested parser. It'll skip its input and
  mark it as not-really-parsed, so that the next update will parse
  it again.
  
  When `until` is given, a reparse will be scheduled when that
  promise resolves.
  */
  static getSkippingParser(e) {
    return new class extends bc {
      createParse(t, i, r) {
        let O = r[0].from, s = r[r.length - 1].to;
        return {
          parsedPos: O,
          advance() {
            let o = mi;
            if (o) {
              for (let l of r)
                o.tempSkipped.push(l);
              e && (o.scheduleOn = o.scheduleOn ? Promise.all([o.scheduleOn, e]) : e);
            }
            return this.parsedPos = s, new L(he.none, [], [], s - O);
          },
          stoppedAt: null,
          stopAt() {
          }
        };
      }
    }();
  }
  /**
  @internal
  */
  isDone(e) {
    e = Math.min(e, this.state.doc.length);
    let t = this.fragments;
    return this.treeLen >= e && t.length && t[0].from == 0 && t[0].to >= e;
  }
  /**
  Get the context for the current parse, or `null` if no editor
  parse is in progress.
  */
  static get() {
    return mi;
  }
}
function Da(n, e, t) {
  return rt.applyChanges(n, [{ fromA: e, toA: t, fromB: e, toB: t }]);
}
class si {
  constructor(e) {
    this.context = e, this.tree = e.tree;
  }
  apply(e) {
    if (!e.docChanged && this.tree == this.context.tree)
      return this;
    let t = this.context.changes(e.changes, e.state), i = this.context.treeLen == e.startState.doc.length ? void 0 : Math.max(e.changes.mapPos(this.context.treeLen), t.viewport.to);
    return t.work(20, i) || t.takeTree(), new si(t);
  }
  static init(e) {
    let t = Math.min(3e3, e.doc.length), i = jn.create(e.facet(St).parser, e, { from: 0, to: t });
    return i.work(20, t) || i.takeTree(), new si(i);
  }
}
Ve.state = /* @__PURE__ */ Te.define({
  create: si.init,
  update(n, e) {
    for (let t of e.effects)
      if (t.is(Ve.setState))
        return t.value;
    return e.startState.facet(St) != e.state.facet(St) ? si.init(e.state) : n.apply(e);
  }
});
let vc = (n) => {
  let e = setTimeout(
    () => n(),
    500
    /* Work.MaxPause */
  );
  return () => clearTimeout(e);
};
typeof requestIdleCallback < "u" && (vc = (n) => {
  let e = -1, t = setTimeout(
    () => {
      e = requestIdleCallback(n, {
        timeout: 400
        /* Work.MinPause */
      });
    },
    100
    /* Work.MinPause */
  );
  return () => e < 0 ? clearTimeout(t) : cancelIdleCallback(e);
});
const zr = typeof navigator < "u" && (!((Rr = navigator.scheduling) === null || Rr === void 0) && Rr.isInputPending) ? () => navigator.scheduling.isInputPending() : null, zd = /* @__PURE__ */ Pe.fromClass(class {
  constructor(e) {
    this.view = e, this.working = null, this.workScheduled = 0, this.chunkEnd = -1, this.chunkBudget = -1, this.work = this.work.bind(this), this.scheduleWork();
  }
  update(e) {
    let t = this.view.state.field(Ve.state).context;
    (t.updateViewport(e.view.viewport) || this.view.viewport.to > t.treeLen) && this.scheduleWork(), (e.docChanged || e.selectionSet) && (this.view.hasFocus && (this.chunkBudget += 50), this.scheduleWork()), this.checkAsyncSchedule(t);
  }
  scheduleWork() {
    if (this.working)
      return;
    let { state: e } = this.view, t = e.field(Ve.state);
    (t.tree != t.context.tree || !t.context.isDone(e.doc.length)) && (this.working = vc(this.work));
  }
  work(e) {
    this.working = null;
    let t = Date.now();
    if (this.chunkEnd < t && (this.chunkEnd < 0 || this.view.hasFocus) && (this.chunkEnd = t + 3e4, this.chunkBudget = 3e3), this.chunkBudget <= 0)
      return;
    let { state: i, viewport: { to: r } } = this.view, O = i.field(Ve.state);
    if (O.tree == O.context.tree && O.context.isDone(
      r + 1e5
      /* Work.MaxParseAhead */
    ))
      return;
    let s = Date.now() + Math.min(this.chunkBudget, 100, e && !zr ? Math.max(25, e.timeRemaining() - 5) : 1e9), a = O.context.treeLen < r && i.doc.length > r + 1e3, o = O.context.work(() => zr && zr() || Date.now() > s, r + (a ? 0 : 1e5));
    this.chunkBudget -= Date.now() - t, (o || this.chunkBudget <= 0) && (O.context.takeTree(), this.view.dispatch({ effects: Ve.setState.of(new si(O.context)) })), this.chunkBudget > 0 && !(o && !a) && this.scheduleWork(), this.checkAsyncSchedule(O.context);
  }
  checkAsyncSchedule(e) {
    e.scheduleOn && (this.workScheduled++, e.scheduleOn.then(() => this.scheduleWork()).catch((t) => Se(this.view.state, t)).then(() => this.workScheduled--), e.scheduleOn = null);
  }
  destroy() {
    this.working && this.working();
  }
  isWorking() {
    return !!(this.working || this.workScheduled > 0);
  }
}, {
  eventHandlers: { focus() {
    this.scheduleWork();
  } }
}), St = /* @__PURE__ */ w.define({
  combine(n) {
    return n.length ? n[0] : null;
  },
  enables: (n) => [
    Ve.state,
    zd,
    k.contentAttributes.compute([n], (e) => {
      let t = e.facet(n);
      return t && t.name ? { "data-language": t.name } : {};
    })
  ]
});
class hi {
  /**
  Create a language support object.
  */
  constructor(e, t = []) {
    this.language = e, this.support = t, this.extension = [e, t];
  }
}
const _d = /* @__PURE__ */ w.define(), lr = /* @__PURE__ */ w.define({
  combine: (n) => {
    if (!n.length)
      return "  ";
    let e = n[0];
    if (!e || /\S/.test(e) || Array.from(e).some((t) => t != e[0]))
      throw new Error("Invalid indent unit: " + JSON.stringify(n[0]));
    return e;
  }
});
function Mn(n) {
  let e = n.facet(lr);
  return e.charCodeAt(0) == 9 ? n.tabSize * e.length : e.length;
}
function Gi(n, e) {
  let t = "", i = n.tabSize, r = n.facet(lr)[0];
  if (r == "	") {
    for (; e >= i; )
      t += "	", e -= i;
    r = " ";
  }
  for (let O = 0; O < e; O++)
    t += r;
  return t;
}
function ms(n, e) {
  n instanceof q && (n = new cr(n));
  for (let i of n.state.facet(_d)) {
    let r = i(n, e);
    if (r !== void 0)
      return r;
  }
  let t = I(n.state);
  return t.length >= e ? Yd(n, t, e) : null;
}
class cr {
  /**
  Create an indent context.
  */
  constructor(e, t = {}) {
    this.state = e, this.options = t, this.unit = Mn(e);
  }
  /**
  Get a description of the line at the given position, taking
  [simulated line
  breaks](https://codemirror.net/6/docs/ref/#language.IndentContext.constructor^options.simulateBreak)
  into account. If there is such a break at `pos`, the `bias`
  argument determines whether the part of the line line before or
  after the break is used.
  */
  lineAt(e, t = 1) {
    let i = this.state.doc.lineAt(e), { simulateBreak: r, simulateDoubleBreak: O } = this.options;
    return r != null && r >= i.from && r <= i.to ? O && r == e ? { text: "", from: e } : (t < 0 ? r < e : r <= e) ? { text: i.text.slice(r - i.from), from: r } : { text: i.text.slice(0, r - i.from), from: i.from } : i;
  }
  /**
  Get the text directly after `pos`, either the entire line
  or the next 100 characters, whichever is shorter.
  */
  textAfterPos(e, t = 1) {
    if (this.options.simulateDoubleBreak && e == this.options.simulateBreak)
      return "";
    let { text: i, from: r } = this.lineAt(e, t);
    return i.slice(e - r, Math.min(i.length, e + 100 - r));
  }
  /**
  Find the column for the given position.
  */
  column(e, t = 1) {
    let { text: i, from: r } = this.lineAt(e, t), O = this.countColumn(i, e - r), s = this.options.overrideIndentation ? this.options.overrideIndentation(r) : -1;
    return s > -1 && (O += s - this.countColumn(i, i.search(/\S|$/))), O;
  }
  /**
  Find the column position (taking tabs into account) of the given
  position in the given string.
  */
  countColumn(e, t = e.length) {
    return ir(e, this.state.tabSize, t);
  }
  /**
  Find the indentation column of the line at the given point.
  */
  lineIndent(e, t = 1) {
    let { text: i, from: r } = this.lineAt(e, t), O = this.options.overrideIndentation;
    if (O) {
      let s = O(r);
      if (s > -1)
        return s;
    }
    return this.countColumn(i, i.search(/\S|$/));
  }
  /**
  Returns the [simulated line
  break](https://codemirror.net/6/docs/ref/#language.IndentContext.constructor^options.simulateBreak)
  for this context, if any.
  */
  get simulatedBreak() {
    return this.options.simulateBreak || null;
  }
}
const Ut = /* @__PURE__ */ new z();
function Yd(n, e, t) {
  let i = e.resolveStack(t), r = e.resolveInner(t, -1).resolve(t, 0).enterUnfinishedNodesBefore(t);
  if (r != i.node) {
    let O = [];
    for (let s = r; s && !(s.from < i.node.from || s.to > i.node.to || s.from == i.node.from && s.type == i.node.type); s = s.parent)
      O.push(s);
    for (let s = O.length - 1; s >= 0; s--)
      i = { node: O[s], next: i };
  }
  return Zc(i, n, t);
}
function Zc(n, e, t) {
  for (let i = n; i; i = i.next) {
    let r = Wd(i.node);
    if (r)
      return r(gs.create(e, t, i));
  }
  return 0;
}
function Vd(n) {
  return n.pos == n.options.simulateBreak && n.options.simulateDoubleBreak;
}
function Wd(n) {
  let e = n.type.prop(Ut);
  if (e)
    return e;
  let t = n.firstChild, i;
  if (t && (i = t.type.prop(z.closedBy))) {
    let r = n.lastChild, O = r && i.indexOf(r.name) > -1;
    return (s) => zc(s, !0, 1, void 0, O && !Vd(s) ? r.from : void 0);
  }
  return n.parent == null ? qd : null;
}
function qd() {
  return 0;
}
class gs extends cr {
  constructor(e, t, i) {
    super(e.state, e.options), this.base = e, this.pos = t, this.context = i;
  }
  /**
  The syntax tree node to which the indentation strategy
  applies.
  */
  get node() {
    return this.context.node;
  }
  /**
  @internal
  */
  static create(e, t, i) {
    return new gs(e, t, i);
  }
  /**
  Get the text directly after `this.pos`, either the entire line
  or the next 100 characters, whichever is shorter.
  */
  get textAfter() {
    return this.textAfterPos(this.pos);
  }
  /**
  Get the indentation at the reference line for `this.node`, which
  is the line on which it starts, unless there is a node that is
  _not_ a parent of this node covering the start of that line. If
  so, the line at the start of that node is tried, again skipping
  on if it is covered by another such node.
  */
  get baseIndent() {
    return this.baseIndentFor(this.node);
  }
  /**
  Get the indentation for the reference line of the given node
  (see [`baseIndent`](https://codemirror.net/6/docs/ref/#language.TreeIndentContext.baseIndent)).
  */
  baseIndentFor(e) {
    let t = this.state.doc.lineAt(e.from);
    for (; ; ) {
      let i = e.resolve(t.from);
      for (; i.parent && i.parent.from == i.from; )
        i = i.parent;
      if (Cd(i, e))
        break;
      t = this.state.doc.lineAt(i.from);
    }
    return this.lineIndent(t.from);
  }
  /**
  Continue looking for indentations in the node's parent nodes,
  and return the result of that.
  */
  continue() {
    return Zc(this.context.next, this.base, this.pos);
  }
}
function Cd(n, e) {
  for (let t = e; t; t = t.parent)
    if (n == t)
      return !0;
  return !1;
}
function Ud(n) {
  let e = n.node, t = e.childAfter(e.from), i = e.lastChild;
  if (!t)
    return null;
  let r = n.options.simulateBreak, O = n.state.doc.lineAt(t.from), s = r == null || r <= O.from ? O.to : Math.min(O.to, r);
  for (let a = t.to; ; ) {
    let o = e.childAfter(a);
    if (!o || o == i)
      return null;
    if (!o.type.isSkipped) {
      if (o.from >= s)
        return null;
      let l = /^ */.exec(O.text.slice(t.to - O.from))[0].length;
      return { from: t.from, to: t.to + l };
    }
    a = o.to;
  }
}
function Rc({ closing: n, align: e = !0, units: t = 1 }) {
  return (i) => zc(i, e, t, n);
}
function zc(n, e, t, i, r) {
  let O = n.textAfter, s = O.match(/^\s*/)[0].length, a = i && O.slice(s, s + i.length) == i || r == n.pos + s, o = e ? Ud(n) : null;
  return o ? a ? n.column(o.from) : n.column(o.to) : n.baseIndent + (a ? 0 : n.unit * t);
}
const Ad = (n) => n.baseIndent;
function Fe({ except: n, units: e = 1 } = {}) {
  return (t) => {
    let i = n && n.test(t.textAfter);
    return t.baseIndent + (i ? 0 : e * t.unit);
  };
}
const Gd = 200;
function jd() {
  return q.transactionFilter.of((n) => {
    if (!n.docChanged || !n.isUserEvent("input.type") && !n.isUserEvent("input.complete"))
      return n;
    let e = n.startState.languageDataAt("indentOnInput", n.startState.selection.main.head);
    if (!e.length)
      return n;
    let t = n.newDoc, { head: i } = n.newSelection.main, r = t.lineAt(i);
    if (i > r.from + Gd)
      return n;
    let O = t.sliceString(r.from, i);
    if (!e.some((l) => l.test(O)))
      return n;
    let { state: s } = n, a = -1, o = [];
    for (let { head: l } of s.selection.ranges) {
      let c = s.doc.lineAt(l);
      if (c.from == a)
        continue;
      a = c.from;
      let h = ms(s, c.from);
      if (h == null)
        continue;
      let f = /^\s*/.exec(c.text)[0], u = Gi(s, h);
      f != u && o.push({ from: c.from, to: c.from + f.length, insert: u });
    }
    return o.length ? [n, { changes: o, sequential: !0 }] : n;
  });
}
const Md = /* @__PURE__ */ w.define(), At = /* @__PURE__ */ new z();
function hr(n) {
  let e = n.firstChild, t = n.lastChild;
  return e && e.to < t.from ? { from: e.to, to: t.type.isError ? n.to : t.from } : null;
}
function Ed(n, e, t) {
  let i = I(n);
  if (i.length < t)
    return null;
  let r = i.resolveStack(t, 1), O = null;
  for (let s = r; s; s = s.next) {
    let a = s.node;
    if (a.to <= t || a.from > t)
      continue;
    if (O && a.from < e)
      break;
    let o = a.type.prop(At);
    if (o && (a.to < i.length - 50 || i.length == n.doc.length || !Ld(a))) {
      let l = o(a, n);
      l && l.from <= t && l.from >= e && l.to > t && (O = l);
    }
  }
  return O;
}
function Ld(n) {
  let e = n.lastChild;
  return e && e.to == n.to && e.type.isError;
}
function Ba(n, e, t) {
  for (let i of n.facet(Md)) {
    let r = i(n, e, t);
    if (r)
      return r;
  }
  return Ed(n, e, t);
}
function _c(n, e) {
  let t = e.mapPos(n.from, 1), i = e.mapPos(n.to, -1);
  return t >= i ? void 0 : { from: t, to: i };
}
const Yc = /* @__PURE__ */ U.define({ map: _c }), Ss = /* @__PURE__ */ U.define({ map: _c }), En = /* @__PURE__ */ Te.define({
  create() {
    return Y.none;
  },
  update(n, e) {
    e.isUserEvent("delete") && e.changes.iterChangedRanges((t, i) => n = Ia(n, t, i)), n = n.map(e.changes);
    for (let t of e.effects)
      if (t.is(Yc) && !Dd(n, t.value.from, t.value.to)) {
        let { preparePlaceholder: i } = e.state.facet(Vc), r = i ? Y.replace({ widget: new Nd(i(e.state, t.value)) }) : Na;
        n = n.update({ add: [r.range(t.value.from, t.value.to)] });
      } else t.is(Ss) && (n = n.update({
        filter: (i, r) => t.value.from != i || t.value.to != r,
        filterFrom: t.value.from,
        filterTo: t.value.to
      }));
    return e.selection && (n = Ia(n, e.selection.main.head)), n;
  },
  provide: (n) => k.decorations.from(n),
  toJSON(n, e) {
    let t = [];
    return n.between(0, e.doc.length, (i, r) => {
      t.push(i, r);
    }), t;
  },
  fromJSON(n) {
    if (!Array.isArray(n) || n.length % 2)
      throw new RangeError("Invalid JSON for fold state");
    let e = [];
    for (let t = 0; t < n.length; ) {
      let i = n[t++], r = n[t++];
      if (typeof i != "number" || typeof r != "number")
        throw new RangeError("Invalid JSON for fold state");
      e.push(Na.range(i, r));
    }
    return Y.set(e, !0);
  }
});
function Ia(n, e, t = e) {
  let i = !1;
  return n.between(e, t, (r, O) => {
    r < t && O > e && (i = !0);
  }), i ? n.update({
    filterFrom: e,
    filterTo: t,
    filter: (r, O) => r >= t || O <= e
  }) : n;
}
function YO(n, e, t) {
  var i;
  let r = null;
  return (i = n.field(En, !1)) === null || i === void 0 || i.between(e, t, (O, s) => {
    (!r || r.from > O) && (r = { from: O, to: s });
  }), r;
}
function Dd(n, e, t) {
  let i = !1;
  return n.between(e, e, (r, O) => {
    r == e && O == t && (i = !0);
  }), i;
}
const Bd = {
  placeholderDOM: null,
  preparePlaceholder: null,
  placeholderText: "…"
}, Vc = /* @__PURE__ */ w.define({
  combine(n) {
    return Bi(n, Bd);
  }
});
function Id(n) {
  return [En, Kd];
}
function Wc(n, e) {
  let { state: t } = n, i = t.facet(Vc), r = (s) => {
    let a = n.lineBlockAt(n.posAtDOM(s.target)), o = YO(n.state, a.from, a.to);
    o && n.dispatch({ effects: Ss.of(o) }), s.preventDefault();
  };
  if (i.placeholderDOM)
    return i.placeholderDOM(n, r, e);
  let O = document.createElement("span");
  return O.textContent = i.placeholderText, O.setAttribute("aria-label", t.phrase("folded code")), O.title = t.phrase("unfold"), O.className = "cm-foldPlaceholder", O.onclick = r, O;
}
const Na = /* @__PURE__ */ Y.replace({ widget: /* @__PURE__ */ new class extends Pt {
  toDOM(n) {
    return Wc(n, null);
  }
}() });
class Nd extends Pt {
  constructor(e) {
    super(), this.value = e;
  }
  eq(e) {
    return this.value == e.value;
  }
  toDOM(e) {
    return Wc(e, this.value);
  }
}
const Fd = {
  openText: "⌄",
  closedText: "›",
  markerDOM: null,
  domEventHandlers: {},
  foldingChanged: () => !1
};
class _r extends st {
  constructor(e, t) {
    super(), this.config = e, this.open = t;
  }
  eq(e) {
    return this.config == e.config && this.open == e.open;
  }
  toDOM(e) {
    if (this.config.markerDOM)
      return this.config.markerDOM(this.open);
    let t = document.createElement("span");
    return t.textContent = this.open ? this.config.openText : this.config.closedText, t.title = e.state.phrase(this.open ? "Fold line" : "Unfold line"), t;
  }
}
function Hd(n = {}) {
  let e = { ...Fd, ...n }, t = new _r(e, !0), i = new _r(e, !1), r = Pe.fromClass(class {
    constructor(s) {
      this.from = s.viewport.from, this.markers = this.buildMarkers(s);
    }
    update(s) {
      (s.docChanged || s.viewportChanged || s.startState.facet(St) != s.state.facet(St) || s.startState.field(En, !1) != s.state.field(En, !1) || I(s.startState) != I(s.state) || e.foldingChanged(s)) && (this.markers = this.buildMarkers(s.view));
    }
    buildMarkers(s) {
      let a = new ti();
      for (let o of s.viewportLineBlocks) {
        let l = YO(s.state, o.from, o.to) ? i : Ba(s.state, o.from, o.to) ? t : null;
        l && a.add(o.from, o.from, l);
      }
      return a.finish();
    }
  }), { domEventHandlers: O } = e;
  return [
    r,
    J$({
      class: "cm-foldGutter",
      markers(s) {
        var a;
        return ((a = s.plugin(r)) === null || a === void 0 ? void 0 : a.markers) || _.empty;
      },
      initialSpacer() {
        return new _r(e, !1);
      },
      domEventHandlers: {
        ...O,
        click: (s, a, o) => {
          if (O.click && O.click(s, a, o))
            return !0;
          let l = YO(s.state, a.from, a.to);
          if (l)
            return s.dispatch({ effects: Ss.of(l) }), !0;
          let c = Ba(s.state, a.from, a.to);
          return c ? (s.dispatch({ effects: Yc.of(c) }), !0) : !1;
        }
      }
    }),
    Id()
  ];
}
const Kd = /* @__PURE__ */ k.baseTheme({
  ".cm-foldPlaceholder": {
    backgroundColor: "#eee",
    border: "1px solid #ddd",
    color: "#888",
    borderRadius: ".2em",
    margin: "0 1px",
    padding: "0 1px",
    cursor: "pointer"
  },
  ".cm-foldGutter span": {
    padding: "0 1px",
    cursor: "pointer"
  }
});
class Hi {
  constructor(e, t) {
    this.specs = e;
    let i;
    function r(a) {
      let o = Qt.newName();
      return (i || (i = /* @__PURE__ */ Object.create(null)))["." + o] = a, o;
    }
    const O = typeof t.all == "string" ? t.all : t.all ? r(t.all) : void 0, s = t.scope;
    this.scope = s instanceof Ve ? (a) => a.prop(Lt) == s.data : s ? (a) => a == s : void 0, this.style = kc(e.map((a) => ({
      tag: a.tag,
      class: a.class || r(Object.assign({}, a, { tag: null }))
    })), {
      all: O
    }).style, this.module = i ? new Qt(i) : null, this.themeType = t.themeType;
  }
  /**
  Create a highlighter style that associates the given styles to
  the given tags. The specs must be objects that hold a style tag
  or array of tags in their `tag` property, and either a single
  `class` property providing a static CSS class (for highlighter
  that rely on external styling), or a
  [`style-mod`](https://github.com/marijnh/style-mod#documentation)-style
  set of CSS properties (which define the styling for those tags).
  
  The CSS rules created for a highlighter will be emitted in the
  order of the spec's properties. That means that for elements that
  have multiple tags associated with them, styles defined further
  down in the list will have a higher CSS precedence than styles
  defined earlier.
  */
  static define(e, t) {
    return new Hi(e, t || {});
  }
}
const VO = /* @__PURE__ */ w.define(), Jd = /* @__PURE__ */ w.define({
  combine(n) {
    return n.length ? [n[0]] : null;
  }
});
function Yr(n) {
  let e = n.facet(VO);
  return e.length ? e : n.facet(Jd);
}
function qc(n, e) {
  let t = [tp], i;
  return n instanceof Hi && (n.module && t.push(k.styleModule.of(n.module)), i = n.themeType), i ? t.push(VO.computeN([k.darkTheme], (r) => r.facet(k.darkTheme) == (i == "dark") ? [n] : [])) : t.push(VO.of(n)), t;
}
class ep {
  constructor(e) {
    this.markCache = /* @__PURE__ */ Object.create(null), this.tree = I(e.state), this.decorations = this.buildDeco(e, Yr(e.state)), this.decoratedTo = e.viewport.to;
  }
  update(e) {
    let t = I(e.state), i = Yr(e.state), r = i != Yr(e.startState), { viewport: O } = e.view, s = e.changes.mapPos(this.decoratedTo, 1);
    t.length < O.to && !r && t.type == this.tree.type && s >= O.to ? (this.decorations = this.decorations.map(e.changes), this.decoratedTo = s) : (t != this.tree || e.viewportChanged || r) && (this.tree = t, this.decorations = this.buildDeco(e.view, i), this.decoratedTo = O.to);
  }
  buildDeco(e, t) {
    if (!t || !this.tree.length)
      return Y.none;
    let i = new ti();
    for (let { from: r, to: O } of e.visibleRanges)
      Xd(this.tree, t, (s, a, o) => {
        i.add(s, a, this.markCache[o] || (this.markCache[o] = Y.mark({ class: o })));
      }, r, O);
    return i.finish();
  }
}
const tp = /* @__PURE__ */ li.high(/* @__PURE__ */ Pe.fromClass(ep, {
  decorations: (n) => n.decorations
})), ip = /* @__PURE__ */ k.baseTheme({
  "&.cm-focused .cm-matchingBracket": { backgroundColor: "#328c8252" },
  "&.cm-focused .cm-nonmatchingBracket": { backgroundColor: "#bb555544" }
}), Cc = 1e4, Uc = "()[]{}", Ac = /* @__PURE__ */ w.define({
  combine(n) {
    return Bi(n, {
      afterCursor: !0,
      brackets: Uc,
      maxScanDistance: Cc,
      renderMatch: Op
    });
  }
}), np = /* @__PURE__ */ Y.mark({ class: "cm-matchingBracket" }), rp = /* @__PURE__ */ Y.mark({ class: "cm-nonmatchingBracket" });
function Op(n) {
  let e = [], t = n.matched ? np : rp;
  return e.push(t.range(n.start.from, n.start.to)), n.end && e.push(t.range(n.end.from, n.end.to)), e;
}
const sp = /* @__PURE__ */ Te.define({
  create() {
    return Y.none;
  },
  update(n, e) {
    if (!e.docChanged && !e.selection)
      return n;
    let t = [], i = e.state.facet(Ac);
    for (let r of e.state.selection.ranges) {
      if (!r.empty)
        continue;
      let O = Be(e.state, r.head, -1, i) || r.head > 0 && Be(e.state, r.head - 1, 1, i) || i.afterCursor && (Be(e.state, r.head, 1, i) || r.head < e.state.doc.length && Be(e.state, r.head + 1, -1, i));
      O && (t = t.concat(i.renderMatch(O, e.state)));
    }
    return Y.set(t, !0);
  },
  provide: (n) => k.decorations.from(n)
}), ap = [
  sp,
  ip
];
function op(n = {}) {
  return [Ac.of(n), ap];
}
const Gc = /* @__PURE__ */ new z();
function WO(n, e, t) {
  let i = n.prop(e < 0 ? z.openedBy : z.closedBy);
  if (i)
    return i;
  if (n.name.length == 1) {
    let r = t.indexOf(n.name);
    if (r > -1 && r % 2 == (e < 0 ? 1 : 0))
      return [t[r + e]];
  }
  return null;
}
function qO(n) {
  let e = n.type.prop(Gc);
  return e ? e(n.node) : n;
}
function Be(n, e, t, i = {}) {
  let r = i.maxScanDistance || Cc, O = i.brackets || Uc, s = I(n), a = s.resolveInner(e, t);
  for (let o = a; o; o = o.parent) {
    let l = WO(o.type, t, O);
    if (l && o.from < o.to) {
      let c = qO(o);
      if (c && (t > 0 ? e >= c.from && e < c.to : e > c.from && e <= c.to))
        return lp(n, e, t, o, c, l, O);
    }
  }
  return cp(n, e, t, s, a.type, r, O);
}
function lp(n, e, t, i, r, O, s) {
  let a = i.parent, o = { from: r.from, to: r.to }, l = 0, c = a == null ? void 0 : a.cursor();
  if (c && (t < 0 ? c.childBefore(i.from) : c.childAfter(i.to)))
    do
      if (t < 0 ? c.to <= i.from : c.from >= i.to) {
        if (l == 0 && O.indexOf(c.type.name) > -1 && c.from < c.to) {
          let h = qO(c);
          return { start: o, end: h ? { from: h.from, to: h.to } : void 0, matched: !0 };
        } else if (WO(c.type, t, s))
          l++;
        else if (WO(c.type, -t, s)) {
          if (l == 0) {
            let h = qO(c);
            return {
              start: o,
              end: h && h.from < h.to ? { from: h.from, to: h.to } : void 0,
              matched: !1
            };
          }
          l--;
        }
      }
    while (t < 0 ? c.prevSibling() : c.nextSibling());
  return { start: o, matched: !1 };
}
function cp(n, e, t, i, r, O, s) {
  let a = t < 0 ? n.sliceDoc(e - 1, e) : n.sliceDoc(e, e + 1), o = s.indexOf(a);
  if (o < 0 || o % 2 == 0 != t > 0)
    return null;
  let l = { from: t < 0 ? e - 1 : e, to: t > 0 ? e + 1 : e }, c = n.doc.iterRange(e, t > 0 ? n.doc.length : 0), h = 0;
  for (let f = 0; !c.next().done && f <= O; ) {
    let u = c.value;
    t < 0 && (f += u.length);
    let d = e + f * t;
    for (let p = t > 0 ? 0 : u.length - 1, Q = t > 0 ? u.length : -1; p != Q; p += t) {
      let m = s.indexOf(u[p]);
      if (!(m < 0 || i.resolveInner(d + p, 1).type != r))
        if (m % 2 == 0 == t > 0)
          h++;
        else {
          if (h == 1)
            return { start: l, end: { from: d + p, to: d + p + 1 }, matched: m >> 1 == o >> 1 };
          h--;
        }
    }
    t > 0 && (f += u.length);
  }
  return c.done ? { start: l, matched: !1 } : null;
}
const hp = /* @__PURE__ */ Object.create(null), Fa = [he.none], Ha = [], Ka = /* @__PURE__ */ Object.create(null), fp = /* @__PURE__ */ Object.create(null);
for (let [n, e] of [
  ["variable", "variableName"],
  ["variable-2", "variableName.special"],
  ["string-2", "string.special"],
  ["def", "variableName.definition"],
  ["tag", "tagName"],
  ["attribute", "attributeName"],
  ["type", "typeName"],
  ["builtin", "variableName.standard"],
  ["qualifier", "modifier"],
  ["error", "invalid"],
  ["header", "heading"],
  ["property", "propertyName"]
])
  fp[n] = /* @__PURE__ */ up(hp, e);
function Vr(n, e) {
  Ha.indexOf(n) > -1 || (Ha.push(n), console.warn(e));
}
function up(n, e) {
  let t = [];
  for (let a of e.split(" ")) {
    let o = [];
    for (let l of a.split(".")) {
      let c = n[l] || $[l];
      c ? typeof c == "function" ? o.length ? o = o.map(c) : Vr(l, `Modifier ${l} used at start of tag`) : o.length ? Vr(l, `Tag ${l} used as modifier`) : o = Array.isArray(c) ? c : [c] : Vr(l, `Unknown highlighting tag ${l}`);
    }
    for (let l of o)
      t.push(l);
  }
  if (!t.length)
    return 0;
  let i = e.replace(/ /g, "_"), r = i + " " + t.map((a) => a.id), O = Ka[r];
  if (O)
    return O.id;
  let s = Ka[r] = he.define({
    id: Fa.length,
    name: i,
    props: [Ct({ [i]: t })]
  });
  return Fa.push(s), s.id;
}
B.RTL, B.LTR;
const $p = (n) => {
  let { state: e } = n, t = e.doc.lineAt(e.selection.main.from), i = Ts(n.state, t.from);
  return i.line ? dp(n) : i.block ? Qp(n) : !1;
};
function Ps(n, e) {
  return ({ state: t, dispatch: i }) => {
    if (t.readOnly)
      return !1;
    let r = n(e, t);
    return r ? (i(t.update(r)), !0) : !1;
  };
}
const dp = /* @__PURE__ */ Ps(
  Sp,
  0
  /* CommentOption.Toggle */
), pp = /* @__PURE__ */ Ps(
  jc,
  0
  /* CommentOption.Toggle */
), Qp = /* @__PURE__ */ Ps(
  (n, e) => jc(n, e, gp(e)),
  0
  /* CommentOption.Toggle */
);
function Ts(n, e) {
  let t = n.languageDataAt("commentTokens", e, 1);
  return t.length ? t[0] : {};
}
const gi = 50;
function mp(n, { open: e, close: t }, i, r) {
  let O = n.sliceDoc(i - gi, i), s = n.sliceDoc(r, r + gi), a = /\s*$/.exec(O)[0].length, o = /^\s*/.exec(s)[0].length, l = O.length - a;
  if (O.slice(l - e.length, l) == e && s.slice(o, o + t.length) == t)
    return {
      open: { pos: i - a, margin: a && 1 },
      close: { pos: r + o, margin: o && 1 }
    };
  let c, h;
  r - i <= 2 * gi ? c = h = n.sliceDoc(i, r) : (c = n.sliceDoc(i, i + gi), h = n.sliceDoc(r - gi, r));
  let f = /^\s*/.exec(c)[0].length, u = /\s*$/.exec(h)[0].length, d = h.length - u - t.length;
  return c.slice(f, f + e.length) == e && h.slice(d, d + t.length) == t ? {
    open: {
      pos: i + f + e.length,
      margin: /\s/.test(c.charAt(f + e.length)) ? 1 : 0
    },
    close: {
      pos: r - u - t.length,
      margin: /\s/.test(h.charAt(d - 1)) ? 1 : 0
    }
  } : null;
}
function gp(n) {
  let e = [];
  for (let t of n.selection.ranges) {
    let i = n.doc.lineAt(t.from), r = t.to <= i.to ? i : n.doc.lineAt(t.to);
    r.from > i.from && r.from == t.to && (r = t.to == i.to + 1 ? i : n.doc.lineAt(t.to - 1));
    let O = e.length - 1;
    O >= 0 && e[O].to > i.from ? e[O].to = r.to : e.push({ from: i.from + /^\s*/.exec(i.text)[0].length, to: r.to });
  }
  return e;
}
function jc(n, e, t = e.selection.ranges) {
  let i = t.map((O) => Ts(e, O.from).block);
  if (!i.every((O) => O))
    return null;
  let r = t.map((O, s) => mp(e, i[s], O.from, O.to));
  if (n != 2 && !r.every((O) => O))
    return { changes: e.changes(t.map((O, s) => r[s] ? [] : [{ from: O.from, insert: i[s].open + " " }, { from: O.to, insert: " " + i[s].close }])) };
  if (n != 1 && r.some((O) => O)) {
    let O = [];
    for (let s = 0, a; s < r.length; s++)
      if (a = r[s]) {
        let o = i[s], { open: l, close: c } = a;
        O.push({ from: l.pos - o.open.length, to: l.pos + l.margin }, { from: c.pos - c.margin, to: c.pos + o.close.length });
      }
    return { changes: O };
  }
  return null;
}
function Sp(n, e, t = e.selection.ranges) {
  let i = [], r = -1;
  for (let { from: O, to: s } of t) {
    let a = i.length, o = 1e9, l = Ts(e, O).line;
    if (l) {
      for (let c = O; c <= s; ) {
        let h = e.doc.lineAt(c);
        if (h.from > r && (O == s || s > h.from)) {
          r = h.from;
          let f = /^\s*/.exec(h.text)[0].length, u = f == h.length, d = h.text.slice(f, f + l.length) == l ? f : -1;
          f < h.text.length && f < o && (o = f), i.push({ line: h, comment: d, token: l, indent: f, empty: u, single: !1 });
        }
        c = h.to + 1;
      }
      if (o < 1e9)
        for (let c = a; c < i.length; c++)
          i[c].indent < i[c].line.text.length && (i[c].indent = o);
      i.length == a + 1 && (i[a].single = !0);
    }
  }
  if (n != 2 && i.some((O) => O.comment < 0 && (!O.empty || O.single))) {
    let O = [];
    for (let { line: a, token: o, indent: l, empty: c, single: h } of i)
      (h || !c) && O.push({ from: a.from + l, insert: o + " " });
    let s = e.changes(O);
    return { changes: s, selection: e.selection.map(s, 1) };
  } else if (n != 1 && i.some((O) => O.comment >= 0)) {
    let O = [];
    for (let { line: s, comment: a, token: o } of i)
      if (a >= 0) {
        let l = s.from + a, c = l + o.length;
        s.text[c - s.from] == " " && c++, O.push({ from: l, to: c });
      }
    return { changes: O };
  }
  return null;
}
const CO = /* @__PURE__ */ lt.define(), Pp = /* @__PURE__ */ lt.define(), Tp = /* @__PURE__ */ w.define(), Mc = /* @__PURE__ */ w.define({
  combine(n) {
    return Bi(n, {
      minDepth: 100,
      newGroupDelay: 500,
      joinToEvent: (e, t) => t
    }, {
      minDepth: Math.max,
      newGroupDelay: Math.min,
      joinToEvent: (e, t) => (i, r) => e(i, r) || t(i, r)
    });
  }
}), Ec = /* @__PURE__ */ Te.define({
  create() {
    return Ie.empty;
  },
  update(n, e) {
    let t = e.state.facet(Mc), i = e.annotation(CO);
    if (i) {
      let o = de.fromTransaction(e, i.selection), l = i.side, c = l == 0 ? n.undone : n.done;
      return o ? c = Ln(c, c.length, t.minDepth, o) : c = Bc(c, e.startState.selection), new Ie(l == 0 ? i.rest : c, l == 0 ? c : i.rest);
    }
    let r = e.annotation(Pp);
    if ((r == "full" || r == "before") && (n = n.isolate()), e.annotation(H.addToHistory) === !1)
      return e.changes.empty ? n : n.addMapping(e.changes.desc);
    let O = de.fromTransaction(e), s = e.annotation(H.time), a = e.annotation(H.userEvent);
    return O ? n = n.addChanges(O, s, a, t, e) : e.selection && (n = n.addSelection(e.startState.selection, s, a, t.newGroupDelay)), (r == "full" || r == "after") && (n = n.isolate()), n;
  },
  toJSON(n) {
    return { done: n.done.map((e) => e.toJSON()), undone: n.undone.map((e) => e.toJSON()) };
  },
  fromJSON(n) {
    return new Ie(n.done.map(de.fromJSON), n.undone.map(de.fromJSON));
  }
});
function yp(n = {}) {
  return [
    Ec,
    Mc.of(n),
    k.domEventHandlers({
      beforeinput(e, t) {
        let i = e.inputType == "historyUndo" ? Lc : e.inputType == "historyRedo" ? UO : null;
        return i ? (e.preventDefault(), i(t)) : !1;
      }
    })
  ];
}
function fr(n, e) {
  return function({ state: t, dispatch: i }) {
    if (!e && t.readOnly)
      return !1;
    let r = t.field(Ec, !1);
    if (!r)
      return !1;
    let O = r.pop(n, t, e);
    return O ? (i(O), !0) : !1;
  };
}
const Lc = /* @__PURE__ */ fr(0, !1), UO = /* @__PURE__ */ fr(1, !1), bp = /* @__PURE__ */ fr(0, !0), wp = /* @__PURE__ */ fr(1, !0);
class de {
  constructor(e, t, i, r, O) {
    this.changes = e, this.effects = t, this.mapped = i, this.startSelection = r, this.selectionsAfter = O;
  }
  setSelAfter(e) {
    return new de(this.changes, this.effects, this.mapped, this.startSelection, e);
  }
  toJSON() {
    var e, t, i;
    return {
      changes: (e = this.changes) === null || e === void 0 ? void 0 : e.toJSON(),
      mapped: (t = this.mapped) === null || t === void 0 ? void 0 : t.toJSON(),
      startSelection: (i = this.startSelection) === null || i === void 0 ? void 0 : i.toJSON(),
      selectionsAfter: this.selectionsAfter.map((r) => r.toJSON())
    };
  }
  static fromJSON(e) {
    return new de(e.changes && J.fromJSON(e.changes), [], e.mapped && Ne.fromJSON(e.mapped), e.startSelection && S.fromJSON(e.startSelection), e.selectionsAfter.map(S.fromJSON));
  }
  // This does not check `addToHistory` and such, it assumes the
  // transaction needs to be converted to an item. Returns null when
  // there are no changes or effects in the transaction.
  static fromTransaction(e, t) {
    let i = ve;
    for (let r of e.startState.facet(Tp)) {
      let O = r(e);
      O.length && (i = i.concat(O));
    }
    return !i.length && e.changes.empty ? null : new de(e.changes.invert(e.startState.doc), i, void 0, t || e.startState.selection, ve);
  }
  static selection(e) {
    return new de(void 0, ve, void 0, void 0, e);
  }
}
function Ln(n, e, t, i) {
  let r = e + 1 > t + 20 ? e - t - 1 : 0, O = n.slice(r, e);
  return O.push(i), O;
}
function xp(n, e) {
  let t = [], i = !1;
  return n.iterChangedRanges((r, O) => t.push(r, O)), e.iterChangedRanges((r, O, s, a) => {
    for (let o = 0; o < t.length; ) {
      let l = t[o++], c = t[o++];
      a >= l && s <= c && (i = !0);
    }
  }), i;
}
function kp(n, e) {
  return n.ranges.length == e.ranges.length && n.ranges.filter((t, i) => t.empty != e.ranges[i].empty).length === 0;
}
function Dc(n, e) {
  return n.length ? e.length ? n.concat(e) : n : e;
}
const ve = [], Xp = 200;
function Bc(n, e) {
  if (n.length) {
    let t = n[n.length - 1], i = t.selectionsAfter.slice(Math.max(0, t.selectionsAfter.length - Xp));
    return i.length && i[i.length - 1].eq(e) ? n : (i.push(e), Ln(n, n.length - 1, 1e9, t.setSelAfter(i)));
  } else
    return [de.selection([e])];
}
function vp(n) {
  let e = n[n.length - 1], t = n.slice();
  return t[n.length - 1] = e.setSelAfter(e.selectionsAfter.slice(0, e.selectionsAfter.length - 1)), t;
}
function Wr(n, e) {
  if (!n.length)
    return n;
  let t = n.length, i = ve;
  for (; t; ) {
    let r = Zp(n[t - 1], e, i);
    if (r.changes && !r.changes.empty || r.effects.length) {
      let O = n.slice(0, t);
      return O[t - 1] = r, O;
    } else
      e = r.mapped, t--, i = r.selectionsAfter;
  }
  return i.length ? [de.selection(i)] : ve;
}
function Zp(n, e, t) {
  let i = Dc(n.selectionsAfter.length ? n.selectionsAfter.map((a) => a.map(e)) : ve, t);
  if (!n.changes)
    return de.selection(i);
  let r = n.changes.map(e), O = e.mapDesc(n.changes, !0), s = n.mapped ? n.mapped.composeDesc(O) : O;
  return new de(r, U.mapEffects(n.effects, e), s, n.startSelection.map(O), i);
}
const Rp = /^(input\.type|delete)($|\.)/;
class Ie {
  constructor(e, t, i = 0, r = void 0) {
    this.done = e, this.undone = t, this.prevTime = i, this.prevUserEvent = r;
  }
  isolate() {
    return this.prevTime ? new Ie(this.done, this.undone) : this;
  }
  addChanges(e, t, i, r, O) {
    let s = this.done, a = s[s.length - 1];
    return a && a.changes && !a.changes.empty && e.changes && (!i || Rp.test(i)) && (!a.selectionsAfter.length && t - this.prevTime < r.newGroupDelay && r.joinToEvent(O, xp(a.changes, e.changes)) || // For compose (but not compose.start) events, always join with previous event
    i == "input.type.compose") ? s = Ln(s, s.length - 1, r.minDepth, new de(e.changes.compose(a.changes), Dc(U.mapEffects(e.effects, a.changes), a.effects), a.mapped, a.startSelection, ve)) : s = Ln(s, s.length, r.minDepth, e), new Ie(s, ve, t, i);
  }
  addSelection(e, t, i, r) {
    let O = this.done.length ? this.done[this.done.length - 1].selectionsAfter : ve;
    return O.length > 0 && t - this.prevTime < r && i == this.prevUserEvent && i && /^select($|\.)/.test(i) && kp(O[O.length - 1], e) ? this : new Ie(Bc(this.done, e), this.undone, t, i);
  }
  addMapping(e) {
    return new Ie(Wr(this.done, e), Wr(this.undone, e), this.prevTime, this.prevUserEvent);
  }
  pop(e, t, i) {
    let r = e == 0 ? this.done : this.undone;
    if (r.length == 0)
      return null;
    let O = r[r.length - 1], s = O.selectionsAfter[0] || t.selection;
    if (i && O.selectionsAfter.length)
      return t.update({
        selection: O.selectionsAfter[O.selectionsAfter.length - 1],
        annotations: CO.of({ side: e, rest: vp(r), selection: s }),
        userEvent: e == 0 ? "select.undo" : "select.redo",
        scrollIntoView: !0
      });
    if (O.changes) {
      let a = r.length == 1 ? ve : r.slice(0, r.length - 1);
      return O.mapped && (a = Wr(a, O.mapped)), t.update({
        changes: O.changes,
        selection: O.startSelection,
        effects: O.effects,
        annotations: CO.of({ side: e, rest: a, selection: s }),
        filter: !1,
        userEvent: e == 0 ? "undo" : "redo",
        scrollIntoView: !0
      });
    } else
      return null;
  }
}
Ie.empty = /* @__PURE__ */ new Ie(ve, ve);
const zp = [
  { key: "Mod-z", run: Lc, preventDefault: !0 },
  { key: "Mod-y", mac: "Mod-Shift-z", run: UO, preventDefault: !0 },
  { linux: "Ctrl-Shift-z", run: UO, preventDefault: !0 },
  { key: "Mod-u", run: bp, preventDefault: !0 },
  { key: "Alt-u", mac: "Mod-Shift-u", run: wp, preventDefault: !0 }
];
function fi(n, e) {
  return S.create(n.ranges.map(e), n.mainIndex);
}
function qe(n, e) {
  return n.update({ selection: e, scrollIntoView: !0, userEvent: "select" });
}
function Ce({ state: n, dispatch: e }, t) {
  let i = fi(n.selection, t);
  return i.eq(n.selection, !0) ? !1 : (e(qe(n, i)), !0);
}
function ur(n, e) {
  return S.cursor(e ? n.to : n.from);
}
function Ic(n, e) {
  return Ce(n, (t) => t.empty ? n.moveByChar(t, e) : ur(t, e));
}
function oe(n) {
  return n.textDirectionAt(n.state.selection.main.head) == B.LTR;
}
const Nc = (n) => Ic(n, !oe(n)), Fc = (n) => Ic(n, oe(n));
function Hc(n, e) {
  return Ce(n, (t) => t.empty ? n.moveByGroup(t, e) : ur(t, e));
}
const _p = (n) => Hc(n, !oe(n)), Yp = (n) => Hc(n, oe(n));
function Vp(n, e, t) {
  if (e.type.prop(t))
    return !0;
  let i = e.to - e.from;
  return i && (i > 2 || /[^\s,.;:]/.test(n.sliceDoc(e.from, e.to))) || e.firstChild;
}
function $r(n, e, t) {
  let i = I(n).resolveInner(e.head), r = t ? z.closedBy : z.openedBy;
  for (let o = e.head; ; ) {
    let l = t ? i.childAfter(o) : i.childBefore(o);
    if (!l)
      break;
    Vp(n, l, r) ? i = l : o = t ? l.to : l.from;
  }
  let O = i.type.prop(r), s, a;
  return O && (s = t ? Be(n, i.from, 1) : Be(n, i.to, -1)) && s.matched ? a = t ? s.end.to : s.end.from : a = t ? i.to : i.from, S.cursor(a, t ? -1 : 1);
}
const Wp = (n) => Ce(n, (e) => $r(n.state, e, !oe(n))), qp = (n) => Ce(n, (e) => $r(n.state, e, oe(n)));
function Kc(n, e) {
  return Ce(n, (t) => {
    if (!t.empty)
      return ur(t, e);
    let i = n.moveVertically(t, e);
    return i.head != t.head ? i : n.moveToLineBoundary(t, e);
  });
}
const Jc = (n) => Kc(n, !1), eh = (n) => Kc(n, !0);
function th(n) {
  let e = n.scrollDOM.clientHeight < n.scrollDOM.scrollHeight - 2, t = 0, i = 0, r;
  if (e) {
    for (let O of n.state.facet(k.scrollMargins)) {
      let s = O(n);
      s != null && s.top && (t = Math.max(s == null ? void 0 : s.top, t)), s != null && s.bottom && (i = Math.max(s == null ? void 0 : s.bottom, i));
    }
    r = n.scrollDOM.clientHeight - t - i;
  } else
    r = (n.dom.ownerDocument.defaultView || window).innerHeight;
  return {
    marginTop: t,
    marginBottom: i,
    selfScroll: e,
    height: Math.max(n.defaultLineHeight, r - 5)
  };
}
function ih(n, e) {
  let t = th(n), { state: i } = n, r = fi(i.selection, (s) => s.empty ? n.moveVertically(s, e, t.height) : ur(s, e));
  if (r.eq(i.selection))
    return !1;
  let O;
  if (t.selfScroll) {
    let s = n.coordsAtPos(i.selection.main.head), a = n.scrollDOM.getBoundingClientRect(), o = a.top + t.marginTop, l = a.bottom - t.marginBottom;
    s && s.top > o && s.bottom < l && (O = k.scrollIntoView(r.main.head, { y: "start", yMargin: s.top - o }));
  }
  return n.dispatch(qe(i, r), { effects: O }), !0;
}
const Ja = (n) => ih(n, !1), AO = (n) => ih(n, !0);
function Tt(n, e, t) {
  let i = n.lineBlockAt(e.head), r = n.moveToLineBoundary(e, t);
  if (r.head == e.head && r.head != (t ? i.to : i.from) && (r = n.moveToLineBoundary(e, t, !1)), !t && r.head == i.from && i.length) {
    let O = /^\s*/.exec(n.state.sliceDoc(i.from, Math.min(i.from + 100, i.to)))[0].length;
    O && e.head != i.from + O && (r = S.cursor(i.from + O));
  }
  return r;
}
const Cp = (n) => Ce(n, (e) => Tt(n, e, !0)), Up = (n) => Ce(n, (e) => Tt(n, e, !1)), Ap = (n) => Ce(n, (e) => Tt(n, e, !oe(n))), Gp = (n) => Ce(n, (e) => Tt(n, e, oe(n))), jp = (n) => Ce(n, (e) => S.cursor(n.lineBlockAt(e.head).from, 1)), Mp = (n) => Ce(n, (e) => S.cursor(n.lineBlockAt(e.head).to, -1));
function Ep(n, e, t) {
  let i = !1, r = fi(n.selection, (O) => {
    let s = Be(n, O.head, -1) || Be(n, O.head, 1) || O.head > 0 && Be(n, O.head - 1, 1) || O.head < n.doc.length && Be(n, O.head + 1, -1);
    if (!s || !s.end)
      return O;
    i = !0;
    let a = s.start.from == O.head ? s.end.to : s.end.from;
    return S.cursor(a);
  });
  return i ? (e(qe(n, r)), !0) : !1;
}
const Lp = ({ state: n, dispatch: e }) => Ep(n, e);
function ze(n, e) {
  let t = fi(n.state.selection, (i) => {
    let r = e(i);
    return S.range(i.anchor, r.head, r.goalColumn, r.bidiLevel || void 0);
  });
  return t.eq(n.state.selection) ? !1 : (n.dispatch(qe(n.state, t)), !0);
}
function nh(n, e) {
  return ze(n, (t) => n.moveByChar(t, e));
}
const rh = (n) => nh(n, !oe(n)), Oh = (n) => nh(n, oe(n));
function sh(n, e) {
  return ze(n, (t) => n.moveByGroup(t, e));
}
const Dp = (n) => sh(n, !oe(n)), Bp = (n) => sh(n, oe(n)), Ip = (n) => ze(n, (e) => $r(n.state, e, !oe(n))), Np = (n) => ze(n, (e) => $r(n.state, e, oe(n)));
function ah(n, e) {
  return ze(n, (t) => n.moveVertically(t, e));
}
const oh = (n) => ah(n, !1), lh = (n) => ah(n, !0);
function ch(n, e) {
  return ze(n, (t) => n.moveVertically(t, e, th(n).height));
}
const eo = (n) => ch(n, !1), to = (n) => ch(n, !0), Fp = (n) => ze(n, (e) => Tt(n, e, !0)), Hp = (n) => ze(n, (e) => Tt(n, e, !1)), Kp = (n) => ze(n, (e) => Tt(n, e, !oe(n))), Jp = (n) => ze(n, (e) => Tt(n, e, oe(n))), eQ = (n) => ze(n, (e) => S.cursor(n.lineBlockAt(e.head).from)), tQ = (n) => ze(n, (e) => S.cursor(n.lineBlockAt(e.head).to)), io = ({ state: n, dispatch: e }) => (e(qe(n, { anchor: 0 })), !0), no = ({ state: n, dispatch: e }) => (e(qe(n, { anchor: n.doc.length })), !0), ro = ({ state: n, dispatch: e }) => (e(qe(n, { anchor: n.selection.main.anchor, head: 0 })), !0), Oo = ({ state: n, dispatch: e }) => (e(qe(n, { anchor: n.selection.main.anchor, head: n.doc.length })), !0), iQ = ({ state: n, dispatch: e }) => (e(n.update({ selection: { anchor: 0, head: n.doc.length }, userEvent: "select" })), !0), nQ = ({ state: n, dispatch: e }) => {
  let t = dr(n).map(({ from: i, to: r }) => S.range(i, Math.min(r + 1, n.doc.length)));
  return e(n.update({ selection: S.create(t), userEvent: "select" })), !0;
}, rQ = ({ state: n, dispatch: e }) => {
  let t = fi(n.selection, (i) => {
    let r = I(n), O = r.resolveStack(i.from, 1);
    if (i.empty) {
      let s = r.resolveStack(i.from, -1);
      s.node.from >= O.node.from && s.node.to <= O.node.to && (O = s);
    }
    for (let s = O; s; s = s.next) {
      let { node: a } = s;
      if ((a.from < i.from && a.to >= i.to || a.to > i.to && a.from <= i.from) && s.next)
        return S.range(a.to, a.from);
    }
    return i;
  });
  return t.eq(n.selection) ? !1 : (e(qe(n, t)), !0);
};
function hh(n, e) {
  let { state: t } = n, i = t.selection, r = t.selection.ranges.slice();
  for (let O of t.selection.ranges) {
    let s = t.doc.lineAt(O.head);
    if (e ? s.to < n.state.doc.length : s.from > 0)
      for (let a = O; ; ) {
        let o = n.moveVertically(a, e);
        if (o.head < s.from || o.head > s.to) {
          r.some((l) => l.head == o.head) || r.push(o);
          break;
        } else {
          if (o.head == a.head)
            break;
          a = o;
        }
      }
  }
  return r.length == i.ranges.length ? !1 : (n.dispatch(qe(t, S.create(r, r.length - 1))), !0);
}
const OQ = (n) => hh(n, !1), sQ = (n) => hh(n, !0), aQ = ({ state: n, dispatch: e }) => {
  let t = n.selection, i = null;
  return t.ranges.length > 1 ? i = S.create([t.main]) : t.main.empty || (i = S.create([S.cursor(t.main.head)])), i ? (e(qe(n, i)), !0) : !1;
};
function Ki(n, e) {
  if (n.state.readOnly)
    return !1;
  let t = "delete.selection", { state: i } = n, r = i.changeByRange((O) => {
    let { from: s, to: a } = O;
    if (s == a) {
      let o = e(O);
      o < s ? (t = "delete.backward", o = gn(n, o, !1)) : o > s && (t = "delete.forward", o = gn(n, o, !0)), s = Math.min(s, o), a = Math.max(a, o);
    } else
      s = gn(n, s, !1), a = gn(n, a, !0);
    return s == a ? { range: O } : { changes: { from: s, to: a }, range: S.cursor(s, s < O.head ? -1 : 1) };
  });
  return r.changes.empty ? !1 : (n.dispatch(i.update(r, {
    scrollIntoView: !0,
    userEvent: t,
    effects: t == "delete.selection" ? k.announce.of(i.phrase("Selection deleted")) : void 0
  })), !0);
}
function gn(n, e, t) {
  if (n instanceof k)
    for (let i of n.state.facet(k.atomicRanges).map((r) => r(n)))
      i.between(e, e, (r, O) => {
        r < e && O > e && (e = t ? O : r);
      });
  return e;
}
const fh = (n, e, t) => Ki(n, (i) => {
  let r = i.from, { state: O } = n, s = O.doc.lineAt(r), a, o;
  if (t && !e && r > s.from && r < s.from + 200 && !/[^ \t]/.test(a = s.text.slice(0, r - s.from))) {
    if (a[a.length - 1] == "	")
      return r - 1;
    let l = ir(a, O.tabSize), c = l % Mn(O) || Mn(O);
    for (let h = 0; h < c && a[a.length - 1 - h] == " "; h++)
      r--;
    o = r;
  } else
    o = re(s.text, r - s.from, e, e) + s.from, o == r && s.number != (e ? O.doc.lines : 1) ? o += e ? 1 : -1 : !e && /[\ufe00-\ufe0f]/.test(s.text.slice(o - s.from, r - s.from)) && (o = re(s.text, o - s.from, !1, !1) + s.from);
  return o;
}), GO = (n) => fh(n, !1, !0), uh = (n) => fh(n, !0, !1), $h = (n, e) => Ki(n, (t) => {
  let i = t.head, { state: r } = n, O = r.doc.lineAt(i), s = r.charCategorizer(i);
  for (let a = null; ; ) {
    if (i == (e ? O.to : O.from)) {
      i == t.head && O.number != (e ? r.doc.lines : 1) && (i += e ? 1 : -1);
      break;
    }
    let o = re(O.text, i - O.from, e) + O.from, l = O.text.slice(Math.min(i, o) - O.from, Math.max(i, o) - O.from), c = s(l);
    if (a != null && c != a)
      break;
    (l != " " || i != t.head) && (a = c), i = o;
  }
  return i;
}), dh = (n) => $h(n, !1), oQ = (n) => $h(n, !0), lQ = (n) => Ki(n, (e) => {
  let t = n.lineBlockAt(e.head).to;
  return e.head < t ? t : Math.min(n.state.doc.length, e.head + 1);
}), cQ = (n) => Ki(n, (e) => {
  let t = n.moveToLineBoundary(e, !1).head;
  return e.head > t ? t : Math.max(0, e.head - 1);
}), hQ = (n) => Ki(n, (e) => {
  let t = n.moveToLineBoundary(e, !0).head;
  return e.head < t ? t : Math.min(n.state.doc.length, e.head + 1);
}), fQ = ({ state: n, dispatch: e }) => {
  if (n.readOnly)
    return !1;
  let t = n.changeByRange((i) => ({
    changes: { from: i.from, to: i.to, insert: W.of(["", ""]) },
    range: S.cursor(i.from)
  }));
  return e(n.update(t, { scrollIntoView: !0, userEvent: "input" })), !0;
}, uQ = ({ state: n, dispatch: e }) => {
  if (n.readOnly)
    return !1;
  let t = n.changeByRange((i) => {
    if (!i.empty || i.from == 0 || i.from == n.doc.length)
      return { range: i };
    let r = i.from, O = n.doc.lineAt(r), s = r == O.from ? r - 1 : re(O.text, r - O.from, !1) + O.from, a = r == O.to ? r + 1 : re(O.text, r - O.from, !0) + O.from;
    return {
      changes: { from: s, to: a, insert: n.doc.slice(r, a).append(n.doc.slice(s, r)) },
      range: S.cursor(a)
    };
  });
  return t.changes.empty ? !1 : (e(n.update(t, { scrollIntoView: !0, userEvent: "move.character" })), !0);
};
function dr(n) {
  let e = [], t = -1;
  for (let i of n.selection.ranges) {
    let r = n.doc.lineAt(i.from), O = n.doc.lineAt(i.to);
    if (!i.empty && i.to == O.from && (O = n.doc.lineAt(i.to - 1)), t >= r.number) {
      let s = e[e.length - 1];
      s.to = O.to, s.ranges.push(i);
    } else
      e.push({ from: r.from, to: O.to, ranges: [i] });
    t = O.number + 1;
  }
  return e;
}
function ph(n, e, t) {
  if (n.readOnly)
    return !1;
  let i = [], r = [];
  for (let O of dr(n)) {
    if (t ? O.to == n.doc.length : O.from == 0)
      continue;
    let s = n.doc.lineAt(t ? O.to + 1 : O.from - 1), a = s.length + 1;
    if (t) {
      i.push({ from: O.to, to: s.to }, { from: O.from, insert: s.text + n.lineBreak });
      for (let o of O.ranges)
        r.push(S.range(Math.min(n.doc.length, o.anchor + a), Math.min(n.doc.length, o.head + a)));
    } else {
      i.push({ from: s.from, to: O.from }, { from: O.to, insert: n.lineBreak + s.text });
      for (let o of O.ranges)
        r.push(S.range(o.anchor - a, o.head - a));
    }
  }
  return i.length ? (e(n.update({
    changes: i,
    scrollIntoView: !0,
    selection: S.create(r, n.selection.mainIndex),
    userEvent: "move.line"
  })), !0) : !1;
}
const $Q = ({ state: n, dispatch: e }) => ph(n, e, !1), dQ = ({ state: n, dispatch: e }) => ph(n, e, !0);
function Qh(n, e, t) {
  if (n.readOnly)
    return !1;
  let i = [];
  for (let O of dr(n))
    t ? i.push({ from: O.from, insert: n.doc.slice(O.from, O.to) + n.lineBreak }) : i.push({ from: O.to, insert: n.lineBreak + n.doc.slice(O.from, O.to) });
  let r = n.changes(i);
  return e(n.update({
    changes: r,
    selection: n.selection.map(r, t ? 1 : -1),
    scrollIntoView: !0,
    userEvent: "input.copyline"
  })), !0;
}
const pQ = ({ state: n, dispatch: e }) => Qh(n, e, !1), QQ = ({ state: n, dispatch: e }) => Qh(n, e, !0), mQ = (n) => {
  if (n.state.readOnly)
    return !1;
  let { state: e } = n, t = e.changes(dr(e).map(({ from: r, to: O }) => (r > 0 ? r-- : O < e.doc.length && O++, { from: r, to: O }))), i = fi(e.selection, (r) => {
    let O;
    if (n.lineWrapping) {
      let s = n.lineBlockAt(r.head), a = n.coordsAtPos(r.head, r.assoc || 1);
      a && (O = s.bottom + n.documentTop - a.bottom + n.defaultLineHeight / 2);
    }
    return n.moveVertically(r, !0, O);
  }).map(t);
  return n.dispatch({ changes: t, selection: i, scrollIntoView: !0, userEvent: "delete.line" }), !0;
};
function gQ(n, e) {
  if (/\(\)|\[\]|\{\}/.test(n.sliceDoc(e - 1, e + 1)))
    return { from: e, to: e };
  let t = I(n).resolveInner(e), i = t.childBefore(e), r = t.childAfter(e), O;
  return i && r && i.to <= e && r.from >= e && (O = i.type.prop(z.closedBy)) && O.indexOf(r.name) > -1 && n.doc.lineAt(i.to).from == n.doc.lineAt(r.from).from && !/\S/.test(n.sliceDoc(i.to, r.from)) ? { from: i.to, to: r.from } : null;
}
const so = /* @__PURE__ */ mh(!1), SQ = /* @__PURE__ */ mh(!0);
function mh(n) {
  return ({ state: e, dispatch: t }) => {
    if (e.readOnly)
      return !1;
    let i = e.changeByRange((r) => {
      let { from: O, to: s } = r, a = e.doc.lineAt(O), o = !n && O == s && gQ(e, O);
      n && (O = s = (s <= a.to ? a : e.doc.lineAt(s)).to);
      let l = new cr(e, { simulateBreak: O, simulateDoubleBreak: !!o }), c = ms(l, O);
      for (c == null && (c = ir(/^\s*/.exec(e.doc.lineAt(O).text)[0], e.tabSize)); s < a.to && /\s/.test(a.text[s - a.from]); )
        s++;
      o ? { from: O, to: s } = o : O > a.from && O < a.from + 100 && !/\S/.test(a.text.slice(0, O)) && (O = a.from);
      let h = ["", Gi(e, c)];
      return o && h.push(Gi(e, l.lineIndent(a.from, -1))), {
        changes: { from: O, to: s, insert: W.of(h) },
        range: S.cursor(O + 1 + h[1].length)
      };
    });
    return t(e.update(i, { scrollIntoView: !0, userEvent: "input" })), !0;
  };
}
function ys(n, e) {
  let t = -1;
  return n.changeByRange((i) => {
    let r = [];
    for (let s = i.from; s <= i.to; ) {
      let a = n.doc.lineAt(s);
      a.number > t && (i.empty || i.to > a.from) && (e(a, r, i), t = a.number), s = a.to + 1;
    }
    let O = n.changes(r);
    return {
      changes: r,
      range: S.range(O.mapPos(i.anchor, 1), O.mapPos(i.head, 1))
    };
  });
}
const PQ = ({ state: n, dispatch: e }) => {
  if (n.readOnly)
    return !1;
  let t = /* @__PURE__ */ Object.create(null), i = new cr(n, { overrideIndentation: (O) => {
    let s = t[O];
    return s ?? -1;
  } }), r = ys(n, (O, s, a) => {
    let o = ms(i, O.from);
    if (o == null)
      return;
    /\S/.test(O.text) || (o = 0);
    let l = /^\s*/.exec(O.text)[0], c = Gi(n, o);
    (l != c || a.from < O.from + l.length) && (t[O.from] = o, s.push({ from: O.from, to: O.from + l.length, insert: c }));
  });
  return r.changes.empty || e(n.update(r, { userEvent: "indent" })), !0;
}, gh = ({ state: n, dispatch: e }) => n.readOnly ? !1 : (e(n.update(ys(n, (t, i) => {
  i.push({ from: t.from, insert: n.facet(lr) });
}), { userEvent: "input.indent" })), !0), Sh = ({ state: n, dispatch: e }) => n.readOnly ? !1 : (e(n.update(ys(n, (t, i) => {
  let r = /^\s*/.exec(t.text)[0];
  if (!r)
    return;
  let O = ir(r, n.tabSize), s = 0, a = Gi(n, Math.max(0, O - Mn(n)));
  for (; s < r.length && s < a.length && r.charCodeAt(s) == a.charCodeAt(s); )
    s++;
  i.push({ from: t.from + s, to: t.from + r.length, insert: a.slice(s) });
}), { userEvent: "delete.dedent" })), !0), TQ = (n) => (n.setTabFocusMode(), !0), yQ = [
  { key: "Ctrl-b", run: Nc, shift: rh, preventDefault: !0 },
  { key: "Ctrl-f", run: Fc, shift: Oh },
  { key: "Ctrl-p", run: Jc, shift: oh },
  { key: "Ctrl-n", run: eh, shift: lh },
  { key: "Ctrl-a", run: jp, shift: eQ },
  { key: "Ctrl-e", run: Mp, shift: tQ },
  { key: "Ctrl-d", run: uh },
  { key: "Ctrl-h", run: GO },
  { key: "Ctrl-k", run: lQ },
  { key: "Ctrl-Alt-h", run: dh },
  { key: "Ctrl-o", run: fQ },
  { key: "Ctrl-t", run: uQ },
  { key: "Ctrl-v", run: AO }
], bQ = /* @__PURE__ */ [
  { key: "ArrowLeft", run: Nc, shift: rh, preventDefault: !0 },
  { key: "Mod-ArrowLeft", mac: "Alt-ArrowLeft", run: _p, shift: Dp, preventDefault: !0 },
  { mac: "Cmd-ArrowLeft", run: Ap, shift: Kp, preventDefault: !0 },
  { key: "ArrowRight", run: Fc, shift: Oh, preventDefault: !0 },
  { key: "Mod-ArrowRight", mac: "Alt-ArrowRight", run: Yp, shift: Bp, preventDefault: !0 },
  { mac: "Cmd-ArrowRight", run: Gp, shift: Jp, preventDefault: !0 },
  { key: "ArrowUp", run: Jc, shift: oh, preventDefault: !0 },
  { mac: "Cmd-ArrowUp", run: io, shift: ro },
  { mac: "Ctrl-ArrowUp", run: Ja, shift: eo },
  { key: "ArrowDown", run: eh, shift: lh, preventDefault: !0 },
  { mac: "Cmd-ArrowDown", run: no, shift: Oo },
  { mac: "Ctrl-ArrowDown", run: AO, shift: to },
  { key: "PageUp", run: Ja, shift: eo },
  { key: "PageDown", run: AO, shift: to },
  { key: "Home", run: Up, shift: Hp, preventDefault: !0 },
  { key: "Mod-Home", run: io, shift: ro },
  { key: "End", run: Cp, shift: Fp, preventDefault: !0 },
  { key: "Mod-End", run: no, shift: Oo },
  { key: "Enter", run: so, shift: so },
  { key: "Mod-a", run: iQ },
  { key: "Backspace", run: GO, shift: GO, preventDefault: !0 },
  { key: "Delete", run: uh, preventDefault: !0 },
  { key: "Mod-Backspace", mac: "Alt-Backspace", run: dh, preventDefault: !0 },
  { key: "Mod-Delete", mac: "Alt-Delete", run: oQ, preventDefault: !0 },
  { mac: "Mod-Backspace", run: cQ, preventDefault: !0 },
  { mac: "Mod-Delete", run: hQ, preventDefault: !0 }
].concat(/* @__PURE__ */ yQ.map((n) => ({ mac: n.key, run: n.run, shift: n.shift }))), wQ = /* @__PURE__ */ [
  { key: "Alt-ArrowLeft", mac: "Ctrl-ArrowLeft", run: Wp, shift: Ip },
  { key: "Alt-ArrowRight", mac: "Ctrl-ArrowRight", run: qp, shift: Np },
  { key: "Alt-ArrowUp", run: $Q },
  { key: "Shift-Alt-ArrowUp", run: pQ },
  { key: "Alt-ArrowDown", run: dQ },
  { key: "Shift-Alt-ArrowDown", run: QQ },
  { key: "Mod-Alt-ArrowUp", run: OQ },
  { key: "Mod-Alt-ArrowDown", run: sQ },
  { key: "Escape", run: aQ },
  { key: "Mod-Enter", run: SQ },
  { key: "Alt-l", mac: "Ctrl-l", run: nQ },
  { key: "Mod-i", run: rQ, preventDefault: !0 },
  { key: "Mod-[", run: Sh },
  { key: "Mod-]", run: gh },
  { key: "Mod-Alt-\\", run: PQ },
  { key: "Shift-Mod-k", run: mQ },
  { key: "Shift-Mod-\\", run: Lp },
  { key: "Mod-/", run: $p },
  { key: "Alt-A", run: pp },
  { key: "Ctrl-m", mac: "Shift-Alt-m", run: TQ }
].concat(bQ), xQ = { key: "Tab", run: gh, shift: Sh };
class Ph {
  /**
  Create a new completion context. (Mostly useful for testing
  completion sources—in the editor, the extension will create
  these for you.)
  */
  constructor(e, t, i, r) {
    this.state = e, this.pos = t, this.explicit = i, this.view = r, this.abortListeners = [], this.abortOnDocChange = !1;
  }
  /**
  Get the extent, content, and (if there is a token) type of the
  token before `this.pos`.
  */
  tokenBefore(e) {
    let t = I(this.state).resolveInner(this.pos, -1);
    for (; t && e.indexOf(t.name) < 0; )
      t = t.parent;
    return t ? {
      from: t.from,
      to: this.pos,
      text: this.state.sliceDoc(t.from, this.pos),
      type: t.type
    } : null;
  }
  /**
  Get the match of the given expression directly before the
  cursor.
  */
  matchBefore(e) {
    let t = this.state.doc.lineAt(this.pos), i = Math.max(t.from, this.pos - 250), r = t.text.slice(i - t.from, this.pos - t.from), O = r.search(yh(e, !1));
    return O < 0 ? null : { from: i + O, to: this.pos, text: r.slice(O) };
  }
  /**
  Yields true when the query has been aborted. Can be useful in
  asynchronous queries to avoid doing work that will be ignored.
  */
  get aborted() {
    return this.abortListeners == null;
  }
  /**
  Allows you to register abort handlers, which will be called when
  the query is
  [aborted](https://codemirror.net/6/docs/ref/#autocomplete.CompletionContext.aborted).
  
  By default, running queries will not be aborted for regular
  typing or backspacing, on the assumption that they are likely to
  return a result with a
  [`validFor`](https://codemirror.net/6/docs/ref/#autocomplete.CompletionResult.validFor) field that
  allows the result to be used after all. Passing `onDocChange:
  true` will cause this query to be aborted for any document
  change.
  */
  addEventListener(e, t, i) {
    e == "abort" && this.abortListeners && (this.abortListeners.push(t), i && i.onDocChange && (this.abortOnDocChange = !0));
  }
}
function ao(n) {
  let e = Object.keys(n).join(""), t = /\w/.test(e);
  return t && (e = e.replace(/\w/g, "")), `[${t ? "\\w" : ""}${e.replace(/[^\w\s]/g, "\\$&")}]`;
}
function kQ(n) {
  let e = /* @__PURE__ */ Object.create(null), t = /* @__PURE__ */ Object.create(null);
  for (let { label: r } of n) {
    e[r[0]] = !0;
    for (let O = 1; O < r.length; O++)
      t[r[O]] = !0;
  }
  let i = ao(e) + ao(t) + "*$";
  return [new RegExp("^" + i), new RegExp(i)];
}
function bs(n) {
  let e = n.map((r) => typeof r == "string" ? { label: r } : r), [t, i] = e.every((r) => /^\w+$/.test(r.label)) ? [/\w*$/, /\w+$/] : kQ(e);
  return (r) => {
    let O = r.matchBefore(i);
    return O || r.explicit ? { from: O ? O.from : r.pos, options: e, validFor: t } : null;
  };
}
function Th(n, e) {
  return (t) => {
    for (let i = I(t.state).resolveInner(t.pos, -1); i; i = i.parent) {
      if (n.indexOf(i.name) > -1)
        return null;
      if (i.type.isTop)
        break;
    }
    return e(t);
  };
}
class oo {
  constructor(e, t, i, r) {
    this.completion = e, this.source = t, this.match = i, this.score = r;
  }
}
function Yt(n) {
  return n.selection.main.from;
}
function yh(n, e) {
  var t;
  let { source: i } = n, r = e && i[0] != "^", O = i[i.length - 1] != "$";
  return !r && !O ? n : new RegExp(`${r ? "^" : ""}(?:${i})${O ? "$" : ""}`, (t = n.flags) !== null && t !== void 0 ? t : n.ignoreCase ? "i" : "");
}
const ws = /* @__PURE__ */ lt.define();
function XQ(n, e, t, i) {
  let { main: r } = n.selection, O = t - r.from, s = i - r.from;
  return {
    ...n.changeByRange((a) => {
      if (a != r && t != i && n.sliceDoc(a.from + O, a.from + s) != n.sliceDoc(t, i))
        return { range: a };
      let o = n.toText(e);
      return {
        changes: { from: a.from + O, to: i == r.from ? a.to : a.from + s, insert: o },
        range: S.cursor(a.from + O + o.length)
      };
    }),
    scrollIntoView: !0,
    userEvent: "input.complete"
  };
}
const lo = /* @__PURE__ */ new WeakMap();
function vQ(n) {
  if (!Array.isArray(n))
    return n;
  let e = lo.get(n);
  return e || lo.set(n, e = bs(n)), e;
}
const Dn = /* @__PURE__ */ U.define(), ji = /* @__PURE__ */ U.define();
class ZQ {
  constructor(e) {
    this.pattern = e, this.chars = [], this.folded = [], this.any = [], this.precise = [], this.byWord = [], this.score = 0, this.matched = [];
    for (let t = 0; t < e.length; ) {
      let i = be(e, t), r = tt(i);
      this.chars.push(i);
      let O = e.slice(t, t + r), s = O.toUpperCase();
      this.folded.push(be(s == O ? O.toLowerCase() : s, 0)), t += r;
    }
    this.astral = e.length != this.chars.length;
  }
  ret(e, t) {
    return this.score = e, this.matched = t, this;
  }
  // Matches a given word (completion) against the pattern (input).
  // Will return a boolean indicating whether there was a match and,
  // on success, set `this.score` to the score, `this.matched` to an
  // array of `from, to` pairs indicating the matched parts of `word`.
  //
  // The score is a number that is more negative the worse the match
  // is. See `Penalty` above.
  match(e) {
    if (this.pattern.length == 0)
      return this.ret(-100, []);
    if (e.length < this.pattern.length)
      return null;
    let { chars: t, folded: i, any: r, precise: O, byWord: s } = this;
    if (t.length == 1) {
      let g = be(e, 0), T = tt(g), v = T == e.length ? 0 : -100;
      if (g != t[0]) if (g == i[0])
        v += -200;
      else
        return null;
      return this.ret(v, [0, T]);
    }
    let a = e.indexOf(this.pattern);
    if (a == 0)
      return this.ret(e.length == this.pattern.length ? 0 : -100, [0, this.pattern.length]);
    let o = t.length, l = 0;
    if (a < 0) {
      for (let g = 0, T = Math.min(e.length, 200); g < T && l < o; ) {
        let v = be(e, g);
        (v == t[l] || v == i[l]) && (r[l++] = g), g += tt(v);
      }
      if (l < o)
        return null;
    }
    let c = 0, h = 0, f = !1, u = 0, d = -1, p = -1, Q = /[a-z]/.test(e), m = !0;
    for (let g = 0, T = Math.min(e.length, 200), v = 0; g < T && h < o; ) {
      let y = be(e, g);
      a < 0 && (c < o && y == t[c] && (O[c++] = g), u < o && (y == t[u] || y == i[u] ? (u == 0 && (d = g), p = g + 1, u++) : u = 0));
      let Z, x = y < 255 ? y >= 48 && y <= 57 || y >= 97 && y <= 122 ? 2 : y >= 65 && y <= 90 ? 1 : 0 : (Z = cl(y)) != Z.toLowerCase() ? 1 : Z != Z.toUpperCase() ? 2 : 0;
      (!g || x == 1 && Q || v == 0 && x != 0) && (t[h] == y || i[h] == y && (f = !0) ? s[h++] = g : s.length && (m = !1)), v = x, g += tt(y);
    }
    return h == o && s[0] == 0 && m ? this.result(-100 + (f ? -200 : 0), s, e) : u == o && d == 0 ? this.ret(-200 - e.length + (p == e.length ? 0 : -100), [0, p]) : a > -1 ? this.ret(-700 - e.length, [a, a + this.pattern.length]) : u == o ? this.ret(-900 - e.length, [d, p]) : h == o ? this.result(-100 + (f ? -200 : 0) + -700 + (m ? 0 : -1100), s, e) : t.length == 2 ? null : this.result((r[0] ? -700 : 0) + -200 + -1100, r, e);
  }
  result(e, t, i) {
    let r = [], O = 0;
    for (let s of t) {
      let a = s + (this.astral ? tt(be(i, s)) : 1);
      O && r[O - 1] == s ? r[O - 1] = a : (r[O++] = s, r[O++] = a);
    }
    return this.ret(e - i.length, r);
  }
}
class RQ {
  constructor(e) {
    this.pattern = e, this.matched = [], this.score = 0, this.folded = e.toLowerCase();
  }
  match(e) {
    if (e.length < this.pattern.length)
      return null;
    let t = e.slice(0, this.pattern.length), i = t == this.pattern ? 0 : t.toLowerCase() == this.folded ? -200 : null;
    return i == null ? null : (this.matched = [0, t.length], this.score = i + (e.length == this.pattern.length ? 0 : -100), this);
  }
}
const ee = /* @__PURE__ */ w.define({
  combine(n) {
    return Bi(n, {
      activateOnTyping: !0,
      activateOnCompletion: () => !1,
      activateOnTypingDelay: 100,
      selectOnOpen: !0,
      override: null,
      closeOnBlur: !0,
      maxRenderedOptions: 100,
      defaultKeymap: !0,
      tooltipClass: () => "",
      optionClass: () => "",
      aboveCursor: !1,
      icons: !0,
      addToOptions: [],
      positionInfo: zQ,
      filterStrict: !1,
      compareCompletions: (e, t) => (e.sortText || e.label).localeCompare(t.sortText || t.label),
      interactionDelay: 75,
      updateSyncTime: 100
    }, {
      defaultKeymap: (e, t) => e && t,
      closeOnBlur: (e, t) => e && t,
      icons: (e, t) => e && t,
      tooltipClass: (e, t) => (i) => co(e(i), t(i)),
      optionClass: (e, t) => (i) => co(e(i), t(i)),
      addToOptions: (e, t) => e.concat(t),
      filterStrict: (e, t) => e || t
    });
  }
});
function co(n, e) {
  return n ? e ? n + " " + e : n : e;
}
function zQ(n, e, t, i, r, O) {
  let s = n.textDirection == B.RTL, a = s, o = !1, l = "top", c, h, f = e.left - r.left, u = r.right - e.right, d = i.right - i.left, p = i.bottom - i.top;
  if (a && f < Math.min(d, u) ? a = !1 : !a && u < Math.min(d, f) && (a = !0), d <= (a ? f : u))
    c = Math.max(r.top, Math.min(t.top, r.bottom - p)) - e.top, h = Math.min(400, a ? f : u);
  else {
    o = !0, h = Math.min(
      400,
      (s ? e.right : r.right - e.left) - 30
      /* Info.Margin */
    );
    let g = r.bottom - e.bottom;
    g >= p || g > e.top ? c = t.bottom - e.top : (l = "bottom", c = e.bottom - t.top);
  }
  let Q = (e.bottom - e.top) / O.offsetHeight, m = (e.right - e.left) / O.offsetWidth;
  return {
    style: `${l}: ${c / Q}px; max-width: ${h / m}px`,
    class: "cm-completionInfo-" + (o ? s ? "left-narrow" : "right-narrow" : a ? "left" : "right")
  };
}
function _Q(n) {
  let e = n.addToOptions.slice();
  return n.icons && e.push({
    render(t) {
      let i = document.createElement("div");
      return i.classList.add("cm-completionIcon"), t.type && i.classList.add(...t.type.split(/\s+/g).map((r) => "cm-completionIcon-" + r)), i.setAttribute("aria-hidden", "true"), i;
    },
    position: 20
  }), e.push({
    render(t, i, r, O) {
      let s = document.createElement("span");
      s.className = "cm-completionLabel";
      let a = t.displayLabel || t.label, o = 0;
      for (let l = 0; l < O.length; ) {
        let c = O[l++], h = O[l++];
        c > o && s.appendChild(document.createTextNode(a.slice(o, c)));
        let f = s.appendChild(document.createElement("span"));
        f.appendChild(document.createTextNode(a.slice(c, h))), f.className = "cm-completionMatchedText", o = h;
      }
      return o < a.length && s.appendChild(document.createTextNode(a.slice(o))), s;
    },
    position: 50
  }, {
    render(t) {
      if (!t.detail)
        return null;
      let i = document.createElement("span");
      return i.className = "cm-completionDetail", i.textContent = t.detail, i;
    },
    position: 80
  }), e.sort((t, i) => t.position - i.position).map((t) => t.render);
}
function qr(n, e, t) {
  if (n <= t)
    return { from: 0, to: n };
  if (e < 0 && (e = 0), e <= n >> 1) {
    let r = Math.floor(e / t);
    return { from: r * t, to: (r + 1) * t };
  }
  let i = Math.floor((n - e) / t);
  return { from: n - (i + 1) * t, to: n - i * t };
}
class YQ {
  constructor(e, t, i) {
    this.view = e, this.stateField = t, this.applyCompletion = i, this.info = null, this.infoDestroy = null, this.placeInfoReq = {
      read: () => this.measureInfo(),
      write: (o) => this.placeInfo(o),
      key: this
    }, this.space = null, this.currentClass = "";
    let r = e.state.field(t), { options: O, selected: s } = r.open, a = e.state.facet(ee);
    this.optionContent = _Q(a), this.optionClass = a.optionClass, this.tooltipClass = a.tooltipClass, this.range = qr(O.length, s, a.maxRenderedOptions), this.dom = document.createElement("div"), this.dom.className = "cm-tooltip-autocomplete", this.updateTooltipClass(e.state), this.dom.addEventListener("mousedown", (o) => {
      let { options: l } = e.state.field(t).open;
      for (let c = o.target, h; c && c != this.dom; c = c.parentNode)
        if (c.nodeName == "LI" && (h = /-(\d+)$/.exec(c.id)) && +h[1] < l.length) {
          this.applyCompletion(e, l[+h[1]]), o.preventDefault();
          return;
        }
    }), this.dom.addEventListener("focusout", (o) => {
      let l = e.state.field(this.stateField, !1);
      l && l.tooltip && e.state.facet(ee).closeOnBlur && o.relatedTarget != e.contentDOM && e.dispatch({ effects: ji.of(null) });
    }), this.showOptions(O, r.id);
  }
  mount() {
    this.updateSel();
  }
  showOptions(e, t) {
    this.list && this.list.remove(), this.list = this.dom.appendChild(this.createListBox(e, t, this.range)), this.list.addEventListener("scroll", () => {
      this.info && this.view.requestMeasure(this.placeInfoReq);
    });
  }
  update(e) {
    var t;
    let i = e.state.field(this.stateField), r = e.startState.field(this.stateField);
    if (this.updateTooltipClass(e.state), i != r) {
      let { options: O, selected: s, disabled: a } = i.open;
      (!r.open || r.open.options != O) && (this.range = qr(O.length, s, e.state.facet(ee).maxRenderedOptions), this.showOptions(O, i.id)), this.updateSel(), a != ((t = r.open) === null || t === void 0 ? void 0 : t.disabled) && this.dom.classList.toggle("cm-tooltip-autocomplete-disabled", !!a);
    }
  }
  updateTooltipClass(e) {
    let t = this.tooltipClass(e);
    if (t != this.currentClass) {
      for (let i of this.currentClass.split(" "))
        i && this.dom.classList.remove(i);
      for (let i of t.split(" "))
        i && this.dom.classList.add(i);
      this.currentClass = t;
    }
  }
  positioned(e) {
    this.space = e, this.info && this.view.requestMeasure(this.placeInfoReq);
  }
  updateSel() {
    let e = this.view.state.field(this.stateField), t = e.open;
    (t.selected > -1 && t.selected < this.range.from || t.selected >= this.range.to) && (this.range = qr(t.options.length, t.selected, this.view.state.facet(ee).maxRenderedOptions), this.showOptions(t.options, e.id));
    let i = this.updateSelectedOption(t.selected);
    if (i) {
      this.destroyInfo();
      let { completion: r } = t.options[t.selected], { info: O } = r;
      if (!O)
        return;
      let s = typeof O == "string" ? document.createTextNode(O) : O(r);
      if (!s)
        return;
      "then" in s ? s.then((a) => {
        a && this.view.state.field(this.stateField, !1) == e && this.addInfoPane(a, r);
      }).catch((a) => Se(this.view.state, a, "completion info")) : (this.addInfoPane(s, r), i.setAttribute("aria-describedby", this.info.id));
    }
  }
  addInfoPane(e, t) {
    this.destroyInfo();
    let i = this.info = document.createElement("div");
    if (i.className = "cm-tooltip cm-completionInfo", i.id = "cm-completionInfo-" + Math.floor(Math.random() * 65535).toString(16), e.nodeType != null)
      i.appendChild(e), this.infoDestroy = null;
    else {
      let { dom: r, destroy: O } = e;
      i.appendChild(r), this.infoDestroy = O || null;
    }
    this.dom.appendChild(i), this.view.requestMeasure(this.placeInfoReq);
  }
  updateSelectedOption(e) {
    let t = null;
    for (let i = this.list.firstChild, r = this.range.from; i; i = i.nextSibling, r++)
      i.nodeName != "LI" || !i.id ? r-- : r == e ? i.hasAttribute("aria-selected") || (i.setAttribute("aria-selected", "true"), t = i) : i.hasAttribute("aria-selected") && (i.removeAttribute("aria-selected"), i.removeAttribute("aria-describedby"));
    return t && WQ(this.list, t), t;
  }
  measureInfo() {
    let e = this.dom.querySelector("[aria-selected]");
    if (!e || !this.info)
      return null;
    let t = this.dom.getBoundingClientRect(), i = this.info.getBoundingClientRect(), r = e.getBoundingClientRect(), O = this.space;
    if (!O) {
      let s = this.dom.ownerDocument.documentElement;
      O = { left: 0, top: 0, right: s.clientWidth, bottom: s.clientHeight };
    }
    return r.top > Math.min(O.bottom, t.bottom) - 10 || r.bottom < Math.max(O.top, t.top) + 10 ? null : this.view.state.facet(ee).positionInfo(this.view, t, r, i, O, this.dom);
  }
  placeInfo(e) {
    this.info && (e ? (e.style && (this.info.style.cssText = e.style), this.info.className = "cm-tooltip cm-completionInfo " + (e.class || "")) : this.info.style.cssText = "top: -1e6px");
  }
  createListBox(e, t, i) {
    const r = document.createElement("ul");
    r.id = t, r.setAttribute("role", "listbox"), r.setAttribute("aria-expanded", "true"), r.setAttribute("aria-label", this.view.state.phrase("Completions")), r.addEventListener("mousedown", (s) => {
      s.target == r && s.preventDefault();
    });
    let O = null;
    for (let s = i.from; s < i.to; s++) {
      let { completion: a, match: o } = e[s], { section: l } = a;
      if (l) {
        let f = typeof l == "string" ? l : l.name;
        if (f != O && (s > i.from || i.from == 0))
          if (O = f, typeof l != "string" && l.header)
            r.appendChild(l.header(l));
          else {
            let u = r.appendChild(document.createElement("completion-section"));
            u.textContent = f;
          }
      }
      const c = r.appendChild(document.createElement("li"));
      c.id = t + "-" + s, c.setAttribute("role", "option");
      let h = this.optionClass(a);
      h && (c.className = h);
      for (let f of this.optionContent) {
        let u = f(a, this.view.state, this.view, o);
        u && c.appendChild(u);
      }
    }
    return i.from && r.classList.add("cm-completionListIncompleteTop"), i.to < e.length && r.classList.add("cm-completionListIncompleteBottom"), r;
  }
  destroyInfo() {
    this.info && (this.infoDestroy && this.infoDestroy(), this.info.remove(), this.info = null);
  }
  destroy() {
    this.destroyInfo();
  }
}
function VQ(n, e) {
  return (t) => new YQ(t, n, e);
}
function WQ(n, e) {
  let t = n.getBoundingClientRect(), i = e.getBoundingClientRect(), r = t.height / n.offsetHeight;
  i.top < t.top ? n.scrollTop -= (t.top - i.top) / r : i.bottom > t.bottom && (n.scrollTop += (i.bottom - t.bottom) / r);
}
function ho(n) {
  return (n.boost || 0) * 100 + (n.apply ? 10 : 0) + (n.info ? 5 : 0) + (n.type ? 1 : 0);
}
function qQ(n, e) {
  let t = [], i = null, r = null, O = (c) => {
    t.push(c);
    let { section: h } = c.completion;
    if (h) {
      i || (i = []);
      let f = typeof h == "string" ? h : h.name;
      i.some((u) => u.name == f) || i.push(typeof h == "string" ? { name: f } : h);
    }
  }, s = e.facet(ee);
  for (let c of n)
    if (c.hasResult()) {
      let h = c.result.getMatch;
      if (c.result.filter === !1)
        for (let f of c.result.options)
          O(new oo(f, c.source, h ? h(f) : [], 1e9 - t.length));
      else {
        let f = e.sliceDoc(c.from, c.to), u, d = s.filterStrict ? new RQ(f) : new ZQ(f);
        for (let p of c.result.options)
          if (u = d.match(p.label)) {
            let Q = p.displayLabel ? h ? h(p, u.matched) : [] : u.matched, m = u.score + (p.boost || 0);
            if (O(new oo(p, c.source, Q, m)), typeof p.section == "object" && p.section.rank === "dynamic") {
              let { name: g } = p.section;
              r || (r = /* @__PURE__ */ Object.create(null)), r[g] = Math.max(m, r[g] || -1e9);
            }
          }
      }
    }
  if (i) {
    let c = /* @__PURE__ */ Object.create(null), h = 0, f = (u, d) => (u.rank === "dynamic" && d.rank === "dynamic" ? r[d.name] - r[u.name] : 0) || (typeof u.rank == "number" ? u.rank : 1e9) - (typeof d.rank == "number" ? d.rank : 1e9) || (u.name < d.name ? -1 : 1);
    for (let u of i.sort(f))
      h -= 1e5, c[u.name] = h;
    for (let u of t) {
      let { section: d } = u.completion;
      d && (u.score += c[typeof d == "string" ? d : d.name]);
    }
  }
  let a = [], o = null, l = s.compareCompletions;
  for (let c of t.sort((h, f) => f.score - h.score || l(h.completion, f.completion))) {
    let h = c.completion;
    !o || o.label != h.label || o.detail != h.detail || o.type != null && h.type != null && o.type != h.type || o.apply != h.apply || o.boost != h.boost ? a.push(c) : ho(c.completion) > ho(o) && (a[a.length - 1] = c), o = c.completion;
  }
  return a;
}
class Dt {
  constructor(e, t, i, r, O, s) {
    this.options = e, this.attrs = t, this.tooltip = i, this.timestamp = r, this.selected = O, this.disabled = s;
  }
  setSelected(e, t) {
    return e == this.selected || e >= this.options.length ? this : new Dt(this.options, fo(t, e), this.tooltip, this.timestamp, e, this.disabled);
  }
  static build(e, t, i, r, O, s) {
    if (r && !s && e.some((l) => l.isPending))
      return r.setDisabled();
    let a = qQ(e, t);
    if (!a.length)
      return r && e.some((l) => l.isPending) ? r.setDisabled() : null;
    let o = t.facet(ee).selectOnOpen ? 0 : -1;
    if (r && r.selected != o && r.selected != -1) {
      let l = r.options[r.selected].completion;
      for (let c = 0; c < a.length; c++)
        if (a[c].completion == l) {
          o = c;
          break;
        }
    }
    return new Dt(a, fo(i, o), {
      pos: e.reduce((l, c) => c.hasResult() ? Math.min(l, c.from) : l, 1e8),
      create: MQ,
      above: O.aboveCursor
    }, r ? r.timestamp : Date.now(), o, !1);
  }
  map(e) {
    return new Dt(this.options, this.attrs, { ...this.tooltip, pos: e.mapPos(this.tooltip.pos) }, this.timestamp, this.selected, this.disabled);
  }
  setDisabled() {
    return new Dt(this.options, this.attrs, this.tooltip, this.timestamp, this.selected, !0);
  }
}
class Bn {
  constructor(e, t, i) {
    this.active = e, this.id = t, this.open = i;
  }
  static start() {
    return new Bn(GQ, "cm-ac-" + Math.floor(Math.random() * 2e6).toString(36), null);
  }
  update(e) {
    let { state: t } = e, i = t.facet(ee), O = (i.override || t.languageDataAt("autocomplete", Yt(t)).map(vQ)).map((o) => (this.active.find((c) => c.source == o) || new Ze(
      o,
      this.active.some(
        (c) => c.state != 0
        /* State.Inactive */
      ) ? 1 : 0
      /* State.Inactive */
    )).update(e, i));
    O.length == this.active.length && O.every((o, l) => o == this.active[l]) && (O = this.active);
    let s = this.open, a = e.effects.some((o) => o.is(xs));
    s && e.docChanged && (s = s.map(e.changes)), e.selection || O.some((o) => o.hasResult() && e.changes.touchesRange(o.from, o.to)) || !CQ(O, this.active) || a ? s = Dt.build(O, t, this.id, s, i, a) : s && s.disabled && !O.some((o) => o.isPending) && (s = null), !s && O.every((o) => !o.isPending) && O.some((o) => o.hasResult()) && (O = O.map((o) => o.hasResult() ? new Ze(
      o.source,
      0
      /* State.Inactive */
    ) : o));
    for (let o of e.effects)
      o.is(wh) && (s = s && s.setSelected(o.value, this.id));
    return O == this.active && s == this.open ? this : new Bn(O, this.id, s);
  }
  get tooltip() {
    return this.open ? this.open.tooltip : null;
  }
  get attrs() {
    return this.open ? this.open.attrs : this.active.length ? UQ : AQ;
  }
}
function CQ(n, e) {
  if (n == e)
    return !0;
  for (let t = 0, i = 0; ; ) {
    for (; t < n.length && !n[t].hasResult(); )
      t++;
    for (; i < e.length && !e[i].hasResult(); )
      i++;
    let r = t == n.length, O = i == e.length;
    if (r || O)
      return r == O;
    if (n[t++].result != e[i++].result)
      return !1;
  }
}
const UQ = {
  "aria-autocomplete": "list"
}, AQ = {};
function fo(n, e) {
  let t = {
    "aria-autocomplete": "list",
    "aria-haspopup": "listbox",
    "aria-controls": n
  };
  return e > -1 && (t["aria-activedescendant"] = n + "-" + e), t;
}
const GQ = [];
function bh(n, e) {
  if (n.isUserEvent("input.complete")) {
    let i = n.annotation(ws);
    if (i && e.activateOnCompletion(i))
      return 12;
  }
  let t = n.isUserEvent("input.type");
  return t && e.activateOnTyping ? 5 : t ? 1 : n.isUserEvent("delete.backward") ? 2 : n.selection ? 8 : n.docChanged ? 16 : 0;
}
class Ze {
  constructor(e, t, i = !1) {
    this.source = e, this.state = t, this.explicit = i;
  }
  hasResult() {
    return !1;
  }
  get isPending() {
    return this.state == 1;
  }
  update(e, t) {
    let i = bh(e, t), r = this;
    (i & 8 || i & 16 && this.touches(e)) && (r = new Ze(
      r.source,
      0
      /* State.Inactive */
    )), i & 4 && r.state == 0 && (r = new Ze(
      this.source,
      1
      /* State.Pending */
    )), r = r.updateFor(e, i);
    for (let O of e.effects)
      if (O.is(Dn))
        r = new Ze(r.source, 1, O.value);
      else if (O.is(ji))
        r = new Ze(
          r.source,
          0
          /* State.Inactive */
        );
      else if (O.is(xs))
        for (let s of O.value)
          s.source == r.source && (r = s);
    return r;
  }
  updateFor(e, t) {
    return this.map(e.changes);
  }
  map(e) {
    return this;
  }
  touches(e) {
    return e.changes.touchesRange(Yt(e.state));
  }
}
class Kt extends Ze {
  constructor(e, t, i, r, O, s) {
    super(e, 3, t), this.limit = i, this.result = r, this.from = O, this.to = s;
  }
  hasResult() {
    return !0;
  }
  updateFor(e, t) {
    var i;
    if (!(t & 3))
      return this.map(e.changes);
    let r = this.result;
    r.map && !e.changes.empty && (r = r.map(r, e.changes));
    let O = e.changes.mapPos(this.from), s = e.changes.mapPos(this.to, 1), a = Yt(e.state);
    if (a > s || !r || t & 2 && (Yt(e.startState) == this.from || a < this.limit))
      return new Ze(
        this.source,
        t & 4 ? 1 : 0
        /* State.Inactive */
      );
    let o = e.changes.mapPos(this.limit);
    return jQ(r.validFor, e.state, O, s) ? new Kt(this.source, this.explicit, o, r, O, s) : r.update && (r = r.update(r, O, s, new Ph(e.state, a, !1))) ? new Kt(this.source, this.explicit, o, r, r.from, (i = r.to) !== null && i !== void 0 ? i : Yt(e.state)) : new Ze(this.source, 1, this.explicit);
  }
  map(e) {
    return e.empty ? this : (this.result.map ? this.result.map(this.result, e) : this.result) ? new Kt(this.source, this.explicit, e.mapPos(this.limit), this.result, e.mapPos(this.from), e.mapPos(this.to, 1)) : new Ze(
      this.source,
      0
      /* State.Inactive */
    );
  }
  touches(e) {
    return e.changes.touchesRange(this.from, this.to);
  }
}
function jQ(n, e, t, i) {
  if (!n)
    return !1;
  let r = e.sliceDoc(t, i);
  return typeof n == "function" ? n(r, t, i, e) : yh(n, !0).test(r);
}
const xs = /* @__PURE__ */ U.define({
  map(n, e) {
    return n.map((t) => t.map(e));
  }
}), wh = /* @__PURE__ */ U.define(), ue = /* @__PURE__ */ Te.define({
  create() {
    return Bn.start();
  },
  update(n, e) {
    return n.update(e);
  },
  provide: (n) => [
    dc.from(n, (e) => e.tooltip),
    k.contentAttributes.from(n, (e) => e.attrs)
  ]
});
function ks(n, e) {
  const t = e.completion.apply || e.completion.label;
  let i = n.state.field(ue).active.find((r) => r.source == e.source);
  return i instanceof Kt ? (typeof t == "string" ? n.dispatch({
    ...XQ(n.state, t, i.from, i.to),
    annotations: ws.of(e.completion)
  }) : t(n, e.completion, i.from, i.to), !0) : !1;
}
const MQ = /* @__PURE__ */ VQ(ue, ks);
function Sn(n, e = "option") {
  return (t) => {
    let i = t.state.field(ue, !1);
    if (!i || !i.open || i.open.disabled || Date.now() - i.open.timestamp < t.state.facet(ee).interactionDelay)
      return !1;
    let r = 1, O;
    e == "page" && (O = pc(t, i.open.tooltip)) && (r = Math.max(2, Math.floor(O.dom.offsetHeight / O.dom.querySelector("li").offsetHeight) - 1));
    let { length: s } = i.open.options, a = i.open.selected > -1 ? i.open.selected + r * (n ? 1 : -1) : n ? 0 : s - 1;
    return a < 0 ? a = e == "page" ? 0 : s - 1 : a >= s && (a = e == "page" ? s - 1 : 0), t.dispatch({ effects: wh.of(a) }), !0;
  };
}
const EQ = (n) => {
  let e = n.state.field(ue, !1);
  return n.state.readOnly || !e || !e.open || e.open.selected < 0 || e.open.disabled || Date.now() - e.open.timestamp < n.state.facet(ee).interactionDelay ? !1 : ks(n, e.open.options[e.open.selected]);
}, Cr = (n) => n.state.field(ue, !1) ? (n.dispatch({ effects: Dn.of(!0) }), !0) : !1, LQ = (n) => {
  let e = n.state.field(ue, !1);
  return !e || !e.active.some(
    (t) => t.state != 0
    /* State.Inactive */
  ) ? !1 : (n.dispatch({ effects: ji.of(null) }), !0);
};
class DQ {
  constructor(e, t) {
    this.active = e, this.context = t, this.time = Date.now(), this.updates = [], this.done = void 0;
  }
}
const BQ = 50, IQ = 1e3, NQ = /* @__PURE__ */ Pe.fromClass(class {
  constructor(n) {
    this.view = n, this.debounceUpdate = -1, this.running = [], this.debounceAccept = -1, this.pendingStart = !1, this.composing = 0;
    for (let e of n.state.field(ue).active)
      e.isPending && this.startQuery(e);
  }
  update(n) {
    let e = n.state.field(ue), t = n.state.facet(ee);
    if (!n.selectionSet && !n.docChanged && n.startState.field(ue) == e)
      return;
    let i = n.transactions.some((O) => {
      let s = bh(O, t);
      return s & 8 || (O.selection || O.docChanged) && !(s & 3);
    });
    for (let O = 0; O < this.running.length; O++) {
      let s = this.running[O];
      if (i || s.context.abortOnDocChange && n.docChanged || s.updates.length + n.transactions.length > BQ && Date.now() - s.time > IQ) {
        for (let a of s.context.abortListeners)
          try {
            a();
          } catch (o) {
            Se(this.view.state, o);
          }
        s.context.abortListeners = null, this.running.splice(O--, 1);
      } else
        s.updates.push(...n.transactions);
    }
    this.debounceUpdate > -1 && clearTimeout(this.debounceUpdate), n.transactions.some((O) => O.effects.some((s) => s.is(Dn))) && (this.pendingStart = !0);
    let r = this.pendingStart ? 50 : t.activateOnTypingDelay;
    if (this.debounceUpdate = e.active.some((O) => O.isPending && !this.running.some((s) => s.active.source == O.source)) ? setTimeout(() => this.startUpdate(), r) : -1, this.composing != 0)
      for (let O of n.transactions)
        O.isUserEvent("input.type") ? this.composing = 2 : this.composing == 2 && O.selection && (this.composing = 3);
  }
  startUpdate() {
    this.debounceUpdate = -1, this.pendingStart = !1;
    let { state: n } = this.view, e = n.field(ue);
    for (let t of e.active)
      t.isPending && !this.running.some((i) => i.active.source == t.source) && this.startQuery(t);
    this.running.length && e.open && e.open.disabled && (this.debounceAccept = setTimeout(() => this.accept(), this.view.state.facet(ee).updateSyncTime));
  }
  startQuery(n) {
    let { state: e } = this.view, t = Yt(e), i = new Ph(e, t, n.explicit, this.view), r = new DQ(n, i);
    this.running.push(r), Promise.resolve(n.source(i)).then((O) => {
      r.context.aborted || (r.done = O || null, this.scheduleAccept());
    }, (O) => {
      this.view.dispatch({ effects: ji.of(null) }), Se(this.view.state, O);
    });
  }
  scheduleAccept() {
    this.running.every((n) => n.done !== void 0) ? this.accept() : this.debounceAccept < 0 && (this.debounceAccept = setTimeout(() => this.accept(), this.view.state.facet(ee).updateSyncTime));
  }
  // For each finished query in this.running, try to create a result
  // or, if appropriate, restart the query.
  accept() {
    var n;
    this.debounceAccept > -1 && clearTimeout(this.debounceAccept), this.debounceAccept = -1;
    let e = [], t = this.view.state.facet(ee), i = this.view.state.field(ue);
    for (let r = 0; r < this.running.length; r++) {
      let O = this.running[r];
      if (O.done === void 0)
        continue;
      if (this.running.splice(r--, 1), O.done) {
        let a = Yt(O.updates.length ? O.updates[0].startState : this.view.state), o = Math.min(a, O.done.from + (O.active.explicit ? 0 : 1)), l = new Kt(O.active.source, O.active.explicit, o, O.done, O.done.from, (n = O.done.to) !== null && n !== void 0 ? n : a);
        for (let c of O.updates)
          l = l.update(c, t);
        if (l.hasResult()) {
          e.push(l);
          continue;
        }
      }
      let s = i.active.find((a) => a.source == O.active.source);
      if (s && s.isPending)
        if (O.done == null) {
          let a = new Ze(
            O.active.source,
            0
            /* State.Inactive */
          );
          for (let o of O.updates)
            a = a.update(o, t);
          a.isPending || e.push(a);
        } else
          this.startQuery(s);
    }
    (e.length || i.open && i.open.disabled) && this.view.dispatch({ effects: xs.of(e) });
  }
}, {
  eventHandlers: {
    blur(n) {
      let e = this.view.state.field(ue, !1);
      if (e && e.tooltip && this.view.state.facet(ee).closeOnBlur) {
        let t = e.open && pc(this.view, e.open.tooltip);
        (!t || !t.dom.contains(n.relatedTarget)) && setTimeout(() => this.view.dispatch({ effects: ji.of(null) }), 10);
      }
    },
    compositionstart() {
      this.composing = 1;
    },
    compositionend() {
      this.composing == 3 && setTimeout(() => this.view.dispatch({ effects: Dn.of(!1) }), 20), this.composing = 0;
    }
  }
}), FQ = typeof navigator == "object" && /* @__PURE__ */ /Win/.test(navigator.platform), HQ = /* @__PURE__ */ li.highest(/* @__PURE__ */ k.domEventHandlers({
  keydown(n, e) {
    let t = e.state.field(ue, !1);
    if (!t || !t.open || t.open.disabled || t.open.selected < 0 || n.key.length > 1 || n.ctrlKey && !(FQ && n.altKey) || n.metaKey)
      return !1;
    let i = t.open.options[t.open.selected], r = t.active.find((s) => s.source == i.source), O = i.completion.commitCharacters || r.result.commitCharacters;
    return O && O.indexOf(n.key) > -1 && ks(e, i), !1;
  }
})), xh = /* @__PURE__ */ k.baseTheme({
  ".cm-tooltip.cm-tooltip-autocomplete": {
    "& > ul": {
      fontFamily: "monospace",
      whiteSpace: "nowrap",
      overflow: "hidden auto",
      maxWidth_fallback: "700px",
      maxWidth: "min(700px, 95vw)",
      minWidth: "250px",
      maxHeight: "10em",
      height: "100%",
      listStyle: "none",
      margin: 0,
      padding: 0,
      "& > li, & > completion-section": {
        padding: "1px 3px",
        lineHeight: 1.2
      },
      "& > li": {
        overflowX: "hidden",
        textOverflow: "ellipsis",
        cursor: "pointer"
      },
      "& > completion-section": {
        display: "list-item",
        borderBottom: "1px solid silver",
        paddingLeft: "0.5em",
        opacity: 0.7
      }
    }
  },
  "&light .cm-tooltip-autocomplete ul li[aria-selected]": {
    background: "#17c",
    color: "white"
  },
  "&light .cm-tooltip-autocomplete-disabled ul li[aria-selected]": {
    background: "#777"
  },
  "&dark .cm-tooltip-autocomplete ul li[aria-selected]": {
    background: "#347",
    color: "white"
  },
  "&dark .cm-tooltip-autocomplete-disabled ul li[aria-selected]": {
    background: "#444"
  },
  ".cm-completionListIncompleteTop:before, .cm-completionListIncompleteBottom:after": {
    content: '"···"',
    opacity: 0.5,
    display: "block",
    textAlign: "center"
  },
  ".cm-tooltip.cm-completionInfo": {
    position: "absolute",
    padding: "3px 9px",
    width: "max-content",
    maxWidth: "400px",
    boxSizing: "border-box",
    whiteSpace: "pre-line"
  },
  ".cm-completionInfo.cm-completionInfo-left": { right: "100%" },
  ".cm-completionInfo.cm-completionInfo-right": { left: "100%" },
  ".cm-completionInfo.cm-completionInfo-left-narrow": { right: "30px" },
  ".cm-completionInfo.cm-completionInfo-right-narrow": { left: "30px" },
  "&light .cm-snippetField": { backgroundColor: "#00000022" },
  "&dark .cm-snippetField": { backgroundColor: "#ffffff22" },
  ".cm-snippetFieldPosition": {
    verticalAlign: "text-top",
    width: 0,
    height: "1.15em",
    display: "inline-block",
    margin: "0 -0.7px -.7em",
    borderLeft: "1.4px dotted #888"
  },
  ".cm-completionMatchedText": {
    textDecoration: "underline"
  },
  ".cm-completionDetail": {
    marginLeft: "0.5em",
    fontStyle: "italic"
  },
  ".cm-completionIcon": {
    fontSize: "90%",
    width: ".8em",
    display: "inline-block",
    textAlign: "center",
    paddingRight: ".6em",
    opacity: "0.6",
    boxSizing: "content-box"
  },
  ".cm-completionIcon-function, .cm-completionIcon-method": {
    "&:after": { content: "'ƒ'" }
  },
  ".cm-completionIcon-class": {
    "&:after": { content: "'○'" }
  },
  ".cm-completionIcon-interface": {
    "&:after": { content: "'◌'" }
  },
  ".cm-completionIcon-variable": {
    "&:after": { content: "'𝑥'" }
  },
  ".cm-completionIcon-constant": {
    "&:after": { content: "'𝐶'" }
  },
  ".cm-completionIcon-type": {
    "&:after": { content: "'𝑡'" }
  },
  ".cm-completionIcon-enum": {
    "&:after": { content: "'∪'" }
  },
  ".cm-completionIcon-property": {
    "&:after": { content: "'□'" }
  },
  ".cm-completionIcon-keyword": {
    "&:after": { content: "'🔑︎'" }
    // Disable emoji rendering
  },
  ".cm-completionIcon-namespace": {
    "&:after": { content: "'▢'" }
  },
  ".cm-completionIcon-text": {
    "&:after": { content: "'abc'", fontSize: "50%", verticalAlign: "middle" }
  }
});
class KQ {
  constructor(e, t, i, r) {
    this.field = e, this.line = t, this.from = i, this.to = r;
  }
}
class Xs {
  constructor(e, t, i) {
    this.field = e, this.from = t, this.to = i;
  }
  map(e) {
    let t = e.mapPos(this.from, -1, se.TrackDel), i = e.mapPos(this.to, 1, se.TrackDel);
    return t == null || i == null ? null : new Xs(this.field, t, i);
  }
}
class vs {
  constructor(e, t) {
    this.lines = e, this.fieldPositions = t;
  }
  instantiate(e, t) {
    let i = [], r = [t], O = e.doc.lineAt(t), s = /^\s*/.exec(O.text)[0];
    for (let o of this.lines) {
      if (i.length) {
        let l = s, c = /^\t*/.exec(o)[0].length;
        for (let h = 0; h < c; h++)
          l += e.facet(lr);
        r.push(t + l.length - c), o = l + o.slice(c);
      }
      i.push(o), t += o.length + 1;
    }
    let a = this.fieldPositions.map((o) => new Xs(o.field, r[o.line] + o.from, r[o.line] + o.to));
    return { text: i, ranges: a };
  }
  static parse(e) {
    let t = [], i = [], r = [], O;
    for (let s of e.split(/\r\n?|\n/)) {
      for (; O = /[#$]\{(?:(\d+)(?::([^{}]*))?|((?:\\[{}]|[^{}])*))\}/.exec(s); ) {
        let a = O[1] ? +O[1] : null, o = O[2] || O[3] || "", l = -1, c = o.replace(/\\[{}]/g, (h) => h[1]);
        for (let h = 0; h < t.length; h++)
          (a != null ? t[h].seq == a : c && t[h].name == c) && (l = h);
        if (l < 0) {
          let h = 0;
          for (; h < t.length && (a == null || t[h].seq != null && t[h].seq < a); )
            h++;
          t.splice(h, 0, { seq: a, name: c }), l = h;
          for (let f of r)
            f.field >= l && f.field++;
        }
        for (let h of r)
          if (h.line == i.length && h.from > O.index) {
            let f = O[2] ? 3 + (O[1] || "").length : 2;
            h.from -= f, h.to -= f;
          }
        r.push(new KQ(l, i.length, O.index, O.index + c.length)), s = s.slice(0, O.index) + o + s.slice(O.index + O[0].length);
      }
      s = s.replace(/\\([{}])/g, (a, o, l) => {
        for (let c of r)
          c.line == i.length && c.from > l && (c.from--, c.to--);
        return o;
      }), i.push(s);
    }
    return new vs(i, r);
  }
}
let JQ = /* @__PURE__ */ Y.widget({ widget: /* @__PURE__ */ new class extends Pt {
  toDOM() {
    let n = document.createElement("span");
    return n.className = "cm-snippetFieldPosition", n;
  }
  ignoreEvent() {
    return !1;
  }
}() }), em = /* @__PURE__ */ Y.mark({ class: "cm-snippetField" });
class ui {
  constructor(e, t) {
    this.ranges = e, this.active = t, this.deco = Y.set(e.map((i) => (i.from == i.to ? JQ : em).range(i.from, i.to)), !0);
  }
  map(e) {
    let t = [];
    for (let i of this.ranges) {
      let r = i.map(e);
      if (!r)
        return null;
      t.push(r);
    }
    return new ui(t, this.active);
  }
  selectionInsideField(e) {
    return e.ranges.every((t) => this.ranges.some((i) => i.field == this.active && i.from <= t.from && i.to >= t.to));
  }
}
const Ji = /* @__PURE__ */ U.define({
  map(n, e) {
    return n && n.map(e);
  }
}), tm = /* @__PURE__ */ U.define(), Mi = /* @__PURE__ */ Te.define({
  create() {
    return null;
  },
  update(n, e) {
    for (let t of e.effects) {
      if (t.is(Ji))
        return t.value;
      if (t.is(tm) && n)
        return new ui(n.ranges, t.value);
    }
    return n && e.docChanged && (n = n.map(e.changes)), n && e.selection && !n.selectionInsideField(e.selection) && (n = null), n;
  },
  provide: (n) => k.decorations.from(n, (e) => e ? e.deco : Y.none)
});
function Zs(n, e) {
  return S.create(n.filter((t) => t.field == e).map((t) => S.range(t.from, t.to)));
}
function im(n) {
  let e = vs.parse(n);
  return (t, i, r, O) => {
    let { text: s, ranges: a } = e.instantiate(t.state, r), { main: o } = t.state.selection, l = {
      changes: { from: r, to: O == o.from ? o.to : O, insert: W.of(s) },
      scrollIntoView: !0,
      annotations: i ? [ws.of(i), H.userEvent.of("input.complete")] : void 0
    };
    if (a.length && (l.selection = Zs(a, 0)), a.some((c) => c.field > 0)) {
      let c = new ui(a, 0), h = l.effects = [Ji.of(c)];
      t.state.field(Mi, !1) === void 0 && h.push(U.appendConfig.of([Mi, am, om, xh]));
    }
    t.dispatch(t.state.update(l));
  };
}
function kh(n) {
  return ({ state: e, dispatch: t }) => {
    let i = e.field(Mi, !1);
    if (!i || n < 0 && i.active == 0)
      return !1;
    let r = i.active + n, O = n > 0 && !i.ranges.some((s) => s.field == r + n);
    return t(e.update({
      selection: Zs(i.ranges, r),
      effects: Ji.of(O ? null : new ui(i.ranges, r)),
      scrollIntoView: !0
    })), !0;
  };
}
const nm = ({ state: n, dispatch: e }) => n.field(Mi, !1) ? (e(n.update({ effects: Ji.of(null) })), !0) : !1, rm = /* @__PURE__ */ kh(1), Om = /* @__PURE__ */ kh(-1), sm = [
  { key: "Tab", run: rm, shift: Om },
  { key: "Escape", run: nm }
], uo = /* @__PURE__ */ w.define({
  combine(n) {
    return n.length ? n[0] : sm;
  }
}), am = /* @__PURE__ */ li.highest(/* @__PURE__ */ or.compute([uo], (n) => n.facet(uo)));
function fe(n, e) {
  return { ...e, apply: im(n) };
}
const om = /* @__PURE__ */ k.domEventHandlers({
  mousedown(n, e) {
    let t = e.state.field(Mi, !1), i;
    if (!t || (i = e.posAtCoords({ x: n.clientX, y: n.clientY })) == null)
      return !1;
    let r = t.ranges.find((O) => O.from <= i && O.to >= i);
    return !r || r.field == t.active ? !1 : (e.dispatch({
      selection: Zs(t.ranges, r.field),
      effects: Ji.of(t.ranges.some((O) => O.field > r.field) ? new ui(t.ranges, r.field) : null),
      scrollIntoView: !0
    }), !0);
  }
}), Ei = {
  brackets: ["(", "[", "{", "'", '"'],
  before: ")]}:;>",
  stringPrefixes: []
}, _t = /* @__PURE__ */ U.define({
  map(n, e) {
    let t = e.mapPos(n, -1, se.TrackAfter);
    return t ?? void 0;
  }
}), Rs = /* @__PURE__ */ new class extends pt {
}();
Rs.startSide = 1;
Rs.endSide = -1;
const Xh = /* @__PURE__ */ Te.define({
  create() {
    return _.empty;
  },
  update(n, e) {
    if (n = n.map(e.changes), e.selection) {
      let t = e.state.doc.lineAt(e.selection.main.head);
      n = n.update({ filter: (i) => i >= t.from && i <= t.to });
    }
    for (let t of e.effects)
      t.is(_t) && (n = n.update({ add: [Rs.range(t.value, t.value + 1)] }));
    return n;
  }
});
function lm() {
  return [hm, Xh];
}
const Ur = "()[]{}<>«»»«［］｛｝";
function vh(n) {
  for (let e = 0; e < Ur.length; e += 2)
    if (Ur.charCodeAt(e) == n)
      return Ur.charAt(e + 1);
  return cl(n < 128 ? n : n + 1);
}
function Zh(n, e) {
  return n.languageDataAt("closeBrackets", e)[0] || Ei;
}
const cm = typeof navigator == "object" && /* @__PURE__ */ /Android\b/.test(navigator.userAgent), hm = /* @__PURE__ */ k.inputHandler.of((n, e, t, i) => {
  if ((cm ? n.composing : n.compositionStarted) || n.state.readOnly)
    return !1;
  let r = n.state.selection.main;
  if (i.length > 2 || i.length == 2 && tt(be(i, 0)) == 1 || e != r.from || t != r.to)
    return !1;
  let O = $m(n.state, i);
  return O ? (n.dispatch(O), !0) : !1;
}), fm = ({ state: n, dispatch: e }) => {
  if (n.readOnly)
    return !1;
  let i = Zh(n, n.selection.main.head).brackets || Ei.brackets, r = null, O = n.changeByRange((s) => {
    if (s.empty) {
      let a = dm(n.doc, s.head);
      for (let o of i)
        if (o == a && pr(n.doc, s.head) == vh(be(o, 0)))
          return {
            changes: { from: s.head - o.length, to: s.head + o.length },
            range: S.cursor(s.head - o.length)
          };
    }
    return { range: r = s };
  });
  return r || e(n.update(O, { scrollIntoView: !0, userEvent: "delete.backward" })), !r;
}, um = [
  { key: "Backspace", run: fm }
];
function $m(n, e) {
  let t = Zh(n, n.selection.main.head), i = t.brackets || Ei.brackets;
  for (let r of i) {
    let O = vh(be(r, 0));
    if (e == r)
      return O == r ? mm(n, r, i.indexOf(r + r + r) > -1, t) : pm(n, r, O, t.before || Ei.before);
    if (e == O && Rh(n, n.selection.main.from))
      return Qm(n, r, O);
  }
  return null;
}
function Rh(n, e) {
  let t = !1;
  return n.field(Xh).between(0, n.doc.length, (i) => {
    i == e && (t = !0);
  }), t;
}
function pr(n, e) {
  let t = n.sliceString(e, e + 2);
  return t.slice(0, tt(be(t, 0)));
}
function dm(n, e) {
  let t = n.sliceString(e - 2, e);
  return tt(be(t, 0)) == t.length ? t : t.slice(1);
}
function pm(n, e, t, i) {
  let r = null, O = n.changeByRange((s) => {
    if (!s.empty)
      return {
        changes: [{ insert: e, from: s.from }, { insert: t, from: s.to }],
        effects: _t.of(s.to + e.length),
        range: S.range(s.anchor + e.length, s.head + e.length)
      };
    let a = pr(n.doc, s.head);
    return !a || /\s/.test(a) || i.indexOf(a) > -1 ? {
      changes: { insert: e + t, from: s.head },
      effects: _t.of(s.head + e.length),
      range: S.cursor(s.head + e.length)
    } : { range: r = s };
  });
  return r ? null : n.update(O, {
    scrollIntoView: !0,
    userEvent: "input.type"
  });
}
function Qm(n, e, t) {
  let i = null, r = n.changeByRange((O) => O.empty && pr(n.doc, O.head) == t ? {
    changes: { from: O.head, to: O.head + t.length, insert: t },
    range: S.cursor(O.head + t.length)
  } : i = { range: O });
  return i ? null : n.update(r, {
    scrollIntoView: !0,
    userEvent: "input.type"
  });
}
function mm(n, e, t, i) {
  let r = i.stringPrefixes || Ei.stringPrefixes, O = null, s = n.changeByRange((a) => {
    if (!a.empty)
      return {
        changes: [{ insert: e, from: a.from }, { insert: e, from: a.to }],
        effects: _t.of(a.to + e.length),
        range: S.range(a.anchor + e.length, a.head + e.length)
      };
    let o = a.head, l = pr(n.doc, o), c;
    if (l == e) {
      if ($o(n, o))
        return {
          changes: { insert: e + e, from: o },
          effects: _t.of(o + e.length),
          range: S.cursor(o + e.length)
        };
      if (Rh(n, o)) {
        let f = t && n.sliceDoc(o, o + e.length * 3) == e + e + e ? e + e + e : e;
        return {
          changes: { from: o, to: o + f.length, insert: f },
          range: S.cursor(o + f.length)
        };
      }
    } else {
      if (t && n.sliceDoc(o - 2 * e.length, o) == e + e && (c = po(n, o - 2 * e.length, r)) > -1 && $o(n, c))
        return {
          changes: { insert: e + e + e + e, from: o },
          effects: _t.of(o + e.length),
          range: S.cursor(o + e.length)
        };
      if (n.charCategorizer(o)(l) != xe.Word && po(n, o, r) > -1 && !gm(n, o, e, r))
        return {
          changes: { insert: e + e, from: o },
          effects: _t.of(o + e.length),
          range: S.cursor(o + e.length)
        };
    }
    return { range: O = a };
  });
  return O ? null : n.update(s, {
    scrollIntoView: !0,
    userEvent: "input.type"
  });
}
function $o(n, e) {
  let t = I(n).resolveInner(e + 1);
  return t.parent && t.from == e;
}
function gm(n, e, t, i) {
  let r = I(n).resolveInner(e, -1), O = i.reduce((s, a) => Math.max(s, a.length), 0);
  for (let s = 0; s < 5; s++) {
    let a = n.sliceDoc(r.from, Math.min(r.to, r.from + t.length + O)), o = a.indexOf(t);
    if (!o || o > -1 && i.indexOf(a.slice(0, o)) > -1) {
      let c = r.firstChild;
      for (; c && c.from == r.from && c.to - c.from > t.length + o; ) {
        if (n.sliceDoc(c.to - t.length, c.to) == t)
          return !1;
        c = c.firstChild;
      }
      return !0;
    }
    let l = r.to == e && r.parent;
    if (!l)
      break;
    r = l;
  }
  return !1;
}
function po(n, e, t) {
  let i = n.charCategorizer(e);
  if (i(n.sliceDoc(e - 1, e)) != xe.Word)
    return e;
  for (let r of t) {
    let O = e - r.length;
    if (n.sliceDoc(O, e) == r && i(n.sliceDoc(O - 1, O)) != xe.Word)
      return O;
  }
  return -1;
}
function Sm(n = {}) {
  return [
    HQ,
    ue,
    ee.of(n),
    NQ,
    Pm,
    xh
  ];
}
const zh = [
  { key: "Ctrl-Space", run: Cr },
  { mac: "Alt-`", run: Cr },
  { mac: "Alt-i", run: Cr },
  { key: "Escape", run: LQ },
  { key: "ArrowDown", run: /* @__PURE__ */ Sn(!0) },
  { key: "ArrowUp", run: /* @__PURE__ */ Sn(!1) },
  { key: "PageDown", run: /* @__PURE__ */ Sn(!0, "page") },
  { key: "PageUp", run: /* @__PURE__ */ Sn(!1, "page") },
  { key: "Enter", run: EQ }
], Pm = /* @__PURE__ */ li.highest(/* @__PURE__ */ or.computeN([ee], (n) => n.facet(ee).defaultKeymap ? [zh] : []));
class In {
  /**
  @internal
  */
  constructor(e, t, i, r, O, s, a, o, l, c = 0, h) {
    this.p = e, this.stack = t, this.state = i, this.reducePos = r, this.pos = O, this.score = s, this.buffer = a, this.bufferBase = o, this.curContext = l, this.lookAhead = c, this.parent = h;
  }
  /**
  @internal
  */
  toString() {
    return `[${this.stack.filter((e, t) => t % 3 == 0).concat(this.state)}]@${this.pos}${this.score ? "!" + this.score : ""}`;
  }
  // Start an empty stack
  /**
  @internal
  */
  static start(e, t, i = 0) {
    let r = e.parser.context;
    return new In(e, [], t, i, i, 0, [], 0, r ? new Qo(r, r.start) : null, 0, null);
  }
  /**
  The stack's current [context](#lr.ContextTracker) value, if
  any. Its type will depend on the context tracker's type
  parameter, or it will be `null` if there is no context
  tracker.
  */
  get context() {
    return this.curContext ? this.curContext.context : null;
  }
  // Push a state onto the stack, tracking its start position as well
  // as the buffer base at that point.
  /**
  @internal
  */
  pushState(e, t) {
    this.stack.push(this.state, t, this.bufferBase + this.buffer.length), this.state = e;
  }
  // Apply a reduce action
  /**
  @internal
  */
  reduce(e) {
    var t;
    let i = e >> 19, r = e & 65535, { parser: O } = this.p, s = this.reducePos < this.pos - 25 && this.setLookAhead(this.pos), a = O.dynamicPrecedence(r);
    if (a && (this.score += a), i == 0) {
      this.pushState(O.getGoto(this.state, r, !0), this.reducePos), r < O.minRepeatTerm && this.storeNode(r, this.reducePos, this.reducePos, s ? 8 : 4, !0), this.reduceContext(r, this.reducePos);
      return;
    }
    let o = this.stack.length - (i - 1) * 3 - (e & 262144 ? 6 : 0), l = o ? this.stack[o - 2] : this.p.ranges[0].from, c = this.reducePos - l;
    c >= 2e3 && !(!((t = this.p.parser.nodeSet.types[r]) === null || t === void 0) && t.isAnonymous) && (l == this.p.lastBigReductionStart ? (this.p.bigReductionCount++, this.p.lastBigReductionSize = c) : this.p.lastBigReductionSize < c && (this.p.bigReductionCount = 1, this.p.lastBigReductionStart = l, this.p.lastBigReductionSize = c));
    let h = o ? this.stack[o - 1] : 0, f = this.bufferBase + this.buffer.length - h;
    if (r < O.minRepeatTerm || e & 131072) {
      let u = O.stateFlag(
        this.state,
        1
        /* StateFlag.Skipped */
      ) ? this.pos : this.reducePos;
      this.storeNode(r, l, u, f + 4, !0);
    }
    if (e & 262144)
      this.state = this.stack[o];
    else {
      let u = this.stack[o - 3];
      this.state = O.getGoto(u, r, !0);
    }
    for (; this.stack.length > o; )
      this.stack.pop();
    this.reduceContext(r, l);
  }
  // Shift a value into the buffer
  /**
  @internal
  */
  storeNode(e, t, i, r = 4, O = !1) {
    if (e == 0 && (!this.stack.length || this.stack[this.stack.length - 1] < this.buffer.length + this.bufferBase)) {
      let s = this, a = this.buffer.length;
      if (a == 0 && s.parent && (a = s.bufferBase - s.parent.bufferBase, s = s.parent), a > 0 && s.buffer[a - 4] == 0 && s.buffer[a - 1] > -1) {
        if (t == i)
          return;
        if (s.buffer[a - 2] >= t) {
          s.buffer[a - 2] = i;
          return;
        }
      }
    }
    if (!O || this.pos == i)
      this.buffer.push(e, t, i, r);
    else {
      let s = this.buffer.length;
      if (s > 0 && (this.buffer[s - 4] != 0 || this.buffer[s - 1] < 0)) {
        let a = !1;
        for (let o = s; o > 0 && this.buffer[o - 2] > i; o -= 4)
          if (this.buffer[o - 1] >= 0) {
            a = !0;
            break;
          }
        if (a)
          for (; s > 0 && this.buffer[s - 2] > i; )
            this.buffer[s] = this.buffer[s - 4], this.buffer[s + 1] = this.buffer[s - 3], this.buffer[s + 2] = this.buffer[s - 2], this.buffer[s + 3] = this.buffer[s - 1], s -= 4, r > 4 && (r -= 4);
      }
      this.buffer[s] = e, this.buffer[s + 1] = t, this.buffer[s + 2] = i, this.buffer[s + 3] = r;
    }
  }
  // Apply a shift action
  /**
  @internal
  */
  shift(e, t, i, r) {
    if (e & 131072)
      this.pushState(e & 65535, this.pos);
    else if ((e & 262144) == 0) {
      let O = e, { parser: s } = this.p;
      this.pos = r;
      let a = s.stateFlag(
        O,
        1
        /* StateFlag.Skipped */
      );
      !a && (r > i || t <= s.maxNode) && (this.reducePos = r), this.pushState(O, a ? i : Math.min(i, this.reducePos)), this.shiftContext(t, i), t <= s.maxNode && this.buffer.push(t, i, r, 4);
    } else
      this.pos = r, this.shiftContext(t, i), t <= this.p.parser.maxNode && this.buffer.push(t, i, r, 4);
  }
  // Apply an action
  /**
  @internal
  */
  apply(e, t, i, r) {
    e & 65536 ? this.reduce(e) : this.shift(e, t, i, r);
  }
  // Add a prebuilt (reused) node into the buffer.
  /**
  @internal
  */
  useNode(e, t) {
    let i = this.p.reused.length - 1;
    (i < 0 || this.p.reused[i] != e) && (this.p.reused.push(e), i++);
    let r = this.pos;
    this.reducePos = this.pos = r + e.length, this.pushState(t, r), this.buffer.push(
      i,
      r,
      this.reducePos,
      -1
      /* size == -1 means this is a reused value */
    ), this.curContext && this.updateContext(this.curContext.tracker.reuse(this.curContext.context, e, this, this.p.stream.reset(this.pos - e.length)));
  }
  // Split the stack. Due to the buffer sharing and the fact
  // that `this.stack` tends to stay quite shallow, this isn't very
  // expensive.
  /**
  @internal
  */
  split() {
    let e = this, t = e.buffer.length;
    for (; t > 0 && e.buffer[t - 2] > e.reducePos; )
      t -= 4;
    let i = e.buffer.slice(t), r = e.bufferBase + t;
    for (; e && r == e.bufferBase; )
      e = e.parent;
    return new In(this.p, this.stack.slice(), this.state, this.reducePos, this.pos, this.score, i, r, this.curContext, this.lookAhead, e);
  }
  // Try to recover from an error by 'deleting' (ignoring) one token.
  /**
  @internal
  */
  recoverByDelete(e, t) {
    let i = e <= this.p.parser.maxNode;
    i && this.storeNode(e, this.pos, t, 4), this.storeNode(0, this.pos, t, i ? 8 : 4), this.pos = this.reducePos = t, this.score -= 190;
  }
  /**
  Check if the given term would be able to be shifted (optionally
  after some reductions) on this stack. This can be useful for
  external tokenizers that want to make sure they only provide a
  given token when it applies.
  */
  canShift(e) {
    for (let t = new Tm(this); ; ) {
      let i = this.p.parser.stateSlot(
        t.state,
        4
        /* ParseState.DefaultReduce */
      ) || this.p.parser.hasAction(t.state, e);
      if (i == 0)
        return !1;
      if ((i & 65536) == 0)
        return !0;
      t.reduce(i);
    }
  }
  // Apply up to Recover.MaxNext recovery actions that conceptually
  // inserts some missing token or rule.
  /**
  @internal
  */
  recoverByInsert(e) {
    if (this.stack.length >= 300)
      return [];
    let t = this.p.parser.nextStates(this.state);
    if (t.length > 8 || this.stack.length >= 120) {
      let r = [];
      for (let O = 0, s; O < t.length; O += 2)
        (s = t[O + 1]) != this.state && this.p.parser.hasAction(s, e) && r.push(t[O], s);
      if (this.stack.length < 120)
        for (let O = 0; r.length < 8 && O < t.length; O += 2) {
          let s = t[O + 1];
          r.some((a, o) => o & 1 && a == s) || r.push(t[O], s);
        }
      t = r;
    }
    let i = [];
    for (let r = 0; r < t.length && i.length < 4; r += 2) {
      let O = t[r + 1];
      if (O == this.state)
        continue;
      let s = this.split();
      s.pushState(O, this.pos), s.storeNode(0, s.pos, s.pos, 4, !0), s.shiftContext(t[r], this.pos), s.reducePos = this.pos, s.score -= 200, i.push(s);
    }
    return i;
  }
  // Force a reduce, if possible. Return false if that can't
  // be done.
  /**
  @internal
  */
  forceReduce() {
    let { parser: e } = this.p, t = e.stateSlot(
      this.state,
      5
      /* ParseState.ForcedReduce */
    );
    if ((t & 65536) == 0)
      return !1;
    if (!e.validAction(this.state, t)) {
      let i = t >> 19, r = t & 65535, O = this.stack.length - i * 3;
      if (O < 0 || e.getGoto(this.stack[O], r, !1) < 0) {
        let s = this.findForcedReduction();
        if (s == null)
          return !1;
        t = s;
      }
      this.storeNode(0, this.pos, this.pos, 4, !0), this.score -= 100;
    }
    return this.reducePos = this.pos, this.reduce(t), !0;
  }
  /**
  Try to scan through the automaton to find some kind of reduction
  that can be applied. Used when the regular ForcedReduce field
  isn't a valid action. @internal
  */
  findForcedReduction() {
    let { parser: e } = this.p, t = [], i = (r, O) => {
      if (!t.includes(r))
        return t.push(r), e.allActions(r, (s) => {
          if (!(s & 393216)) if (s & 65536) {
            let a = (s >> 19) - O;
            if (a > 1) {
              let o = s & 65535, l = this.stack.length - a * 3;
              if (l >= 0 && e.getGoto(this.stack[l], o, !1) >= 0)
                return a << 19 | 65536 | o;
            }
          } else {
            let a = i(s, O + 1);
            if (a != null)
              return a;
          }
        });
    };
    return i(this.state, 0);
  }
  /**
  @internal
  */
  forceAll() {
    for (; !this.p.parser.stateFlag(
      this.state,
      2
      /* StateFlag.Accepting */
    ); )
      if (!this.forceReduce()) {
        this.storeNode(0, this.pos, this.pos, 4, !0);
        break;
      }
    return this;
  }
  /**
  Check whether this state has no further actions (assumed to be a direct descendant of the
  top state, since any other states must be able to continue
  somehow). @internal
  */
  get deadEnd() {
    if (this.stack.length != 3)
      return !1;
    let { parser: e } = this.p;
    return e.data[e.stateSlot(
      this.state,
      1
      /* ParseState.Actions */
    )] == 65535 && !e.stateSlot(
      this.state,
      4
      /* ParseState.DefaultReduce */
    );
  }
  /**
  Restart the stack (put it back in its start state). Only safe
  when this.stack.length == 3 (state is directly below the top
  state). @internal
  */
  restart() {
    this.storeNode(0, this.pos, this.pos, 4, !0), this.state = this.stack[0], this.stack.length = 0;
  }
  /**
  @internal
  */
  sameState(e) {
    if (this.state != e.state || this.stack.length != e.stack.length)
      return !1;
    for (let t = 0; t < this.stack.length; t += 3)
      if (this.stack[t] != e.stack[t])
        return !1;
    return !0;
  }
  /**
  Get the parser used by this stack.
  */
  get parser() {
    return this.p.parser;
  }
  /**
  Test whether a given dialect (by numeric ID, as exported from
  the terms file) is enabled.
  */
  dialectEnabled(e) {
    return this.p.parser.dialect.flags[e];
  }
  shiftContext(e, t) {
    this.curContext && this.updateContext(this.curContext.tracker.shift(this.curContext.context, e, this, this.p.stream.reset(t)));
  }
  reduceContext(e, t) {
    this.curContext && this.updateContext(this.curContext.tracker.reduce(this.curContext.context, e, this, this.p.stream.reset(t)));
  }
  /**
  @internal
  */
  emitContext() {
    let e = this.buffer.length - 1;
    (e < 0 || this.buffer[e] != -3) && this.buffer.push(this.curContext.hash, this.pos, this.pos, -3);
  }
  /**
  @internal
  */
  emitLookAhead() {
    let e = this.buffer.length - 1;
    (e < 0 || this.buffer[e] != -4) && this.buffer.push(this.lookAhead, this.pos, this.pos, -4);
  }
  updateContext(e) {
    if (e != this.curContext.context) {
      let t = new Qo(this.curContext.tracker, e);
      t.hash != this.curContext.hash && this.emitContext(), this.curContext = t;
    }
  }
  /**
  @internal
  */
  setLookAhead(e) {
    return e <= this.lookAhead ? !1 : (this.emitLookAhead(), this.lookAhead = e, !0);
  }
  /**
  @internal
  */
  close() {
    this.curContext && this.curContext.tracker.strict && this.emitContext(), this.lookAhead > 0 && this.emitLookAhead();
  }
}
class Qo {
  constructor(e, t) {
    this.tracker = e, this.context = t, this.hash = e.strict ? e.hash(t) : 0;
  }
}
class Tm {
  constructor(e) {
    this.start = e, this.state = e.state, this.stack = e.stack, this.base = this.stack.length;
  }
  reduce(e) {
    let t = e & 65535, i = e >> 19;
    i == 0 ? (this.stack == this.start.stack && (this.stack = this.stack.slice()), this.stack.push(this.state, 0, 0), this.base += 3) : this.base -= (i - 1) * 3;
    let r = this.start.p.parser.getGoto(this.stack[this.base - 3], t, !0);
    this.state = r;
  }
}
class Nn {
  constructor(e, t, i) {
    this.stack = e, this.pos = t, this.index = i, this.buffer = e.buffer, this.index == 0 && this.maybeNext();
  }
  static create(e, t = e.bufferBase + e.buffer.length) {
    return new Nn(e, t, t - e.bufferBase);
  }
  maybeNext() {
    let e = this.stack.parent;
    e != null && (this.index = this.stack.bufferBase - e.bufferBase, this.stack = e, this.buffer = e.buffer);
  }
  get id() {
    return this.buffer[this.index - 4];
  }
  get start() {
    return this.buffer[this.index - 3];
  }
  get end() {
    return this.buffer[this.index - 2];
  }
  get size() {
    return this.buffer[this.index - 1];
  }
  next() {
    this.index -= 4, this.pos -= 4, this.index == 0 && this.maybeNext();
  }
  fork() {
    return new Nn(this.stack, this.pos, this.index);
  }
}
function wi(n, e = Uint16Array) {
  if (typeof n != "string")
    return n;
  let t = null;
  for (let i = 0, r = 0; i < n.length; ) {
    let O = 0;
    for (; ; ) {
      let s = n.charCodeAt(i++), a = !1;
      if (s == 126) {
        O = 65535;
        break;
      }
      s >= 92 && s--, s >= 34 && s--;
      let o = s - 32;
      if (o >= 46 && (o -= 46, a = !0), O += o, a)
        break;
      O *= 46;
    }
    t ? t[r++] = O : t = new e(O);
  }
  return t;
}
class xn {
  constructor() {
    this.start = -1, this.value = -1, this.end = -1, this.extended = -1, this.lookAhead = 0, this.mask = 0, this.context = 0;
  }
}
const mo = new xn();
class ym {
  /**
  @internal
  */
  constructor(e, t) {
    this.input = e, this.ranges = t, this.chunk = "", this.chunkOff = 0, this.chunk2 = "", this.chunk2Pos = 0, this.next = -1, this.token = mo, this.rangeIndex = 0, this.pos = this.chunkPos = t[0].from, this.range = t[0], this.end = t[t.length - 1].to, this.readNext();
  }
  /**
  @internal
  */
  resolveOffset(e, t) {
    let i = this.range, r = this.rangeIndex, O = this.pos + e;
    for (; O < i.from; ) {
      if (!r)
        return null;
      let s = this.ranges[--r];
      O -= i.from - s.to, i = s;
    }
    for (; t < 0 ? O > i.to : O >= i.to; ) {
      if (r == this.ranges.length - 1)
        return null;
      let s = this.ranges[++r];
      O += s.from - i.to, i = s;
    }
    return O;
  }
  /**
  @internal
  */
  clipPos(e) {
    if (e >= this.range.from && e < this.range.to)
      return e;
    for (let t of this.ranges)
      if (t.to > e)
        return Math.max(e, t.from);
    return this.end;
  }
  /**
  Look at a code unit near the stream position. `.peek(0)` equals
  `.next`, `.peek(-1)` gives you the previous character, and so
  on.
  
  Note that looking around during tokenizing creates dependencies
  on potentially far-away content, which may reduce the
  effectiveness incremental parsing—when looking forward—or even
  cause invalid reparses when looking backward more than 25 code
  units, since the library does not track lookbehind.
  */
  peek(e) {
    let t = this.chunkOff + e, i, r;
    if (t >= 0 && t < this.chunk.length)
      i = this.pos + e, r = this.chunk.charCodeAt(t);
    else {
      let O = this.resolveOffset(e, 1);
      if (O == null)
        return -1;
      if (i = O, i >= this.chunk2Pos && i < this.chunk2Pos + this.chunk2.length)
        r = this.chunk2.charCodeAt(i - this.chunk2Pos);
      else {
        let s = this.rangeIndex, a = this.range;
        for (; a.to <= i; )
          a = this.ranges[++s];
        this.chunk2 = this.input.chunk(this.chunk2Pos = i), i + this.chunk2.length > a.to && (this.chunk2 = this.chunk2.slice(0, a.to - i)), r = this.chunk2.charCodeAt(0);
      }
    }
    return i >= this.token.lookAhead && (this.token.lookAhead = i + 1), r;
  }
  /**
  Accept a token. By default, the end of the token is set to the
  current stream position, but you can pass an offset (relative to
  the stream position) to change that.
  */
  acceptToken(e, t = 0) {
    let i = t ? this.resolveOffset(t, -1) : this.pos;
    if (i == null || i < this.token.start)
      throw new RangeError("Token end out of bounds");
    this.token.value = e, this.token.end = i;
  }
  /**
  Accept a token ending at a specific given position.
  */
  acceptTokenTo(e, t) {
    this.token.value = e, this.token.end = t;
  }
  getChunk() {
    if (this.pos >= this.chunk2Pos && this.pos < this.chunk2Pos + this.chunk2.length) {
      let { chunk: e, chunkPos: t } = this;
      this.chunk = this.chunk2, this.chunkPos = this.chunk2Pos, this.chunk2 = e, this.chunk2Pos = t, this.chunkOff = this.pos - this.chunkPos;
    } else {
      this.chunk2 = this.chunk, this.chunk2Pos = this.chunkPos;
      let e = this.input.chunk(this.pos), t = this.pos + e.length;
      this.chunk = t > this.range.to ? e.slice(0, this.range.to - this.pos) : e, this.chunkPos = this.pos, this.chunkOff = 0;
    }
  }
  readNext() {
    return this.chunkOff >= this.chunk.length && (this.getChunk(), this.chunkOff == this.chunk.length) ? this.next = -1 : this.next = this.chunk.charCodeAt(this.chunkOff);
  }
  /**
  Move the stream forward N (defaults to 1) code units. Returns
  the new value of [`next`](#lr.InputStream.next).
  */
  advance(e = 1) {
    for (this.chunkOff += e; this.pos + e >= this.range.to; ) {
      if (this.rangeIndex == this.ranges.length - 1)
        return this.setDone();
      e -= this.range.to - this.pos, this.range = this.ranges[++this.rangeIndex], this.pos = this.range.from;
    }
    return this.pos += e, this.pos >= this.token.lookAhead && (this.token.lookAhead = this.pos + 1), this.readNext();
  }
  setDone() {
    return this.pos = this.chunkPos = this.end, this.range = this.ranges[this.rangeIndex = this.ranges.length - 1], this.chunk = "", this.next = -1;
  }
  /**
  @internal
  */
  reset(e, t) {
    if (t ? (this.token = t, t.start = e, t.lookAhead = e + 1, t.value = t.extended = -1) : this.token = mo, this.pos != e) {
      if (this.pos = e, e == this.end)
        return this.setDone(), this;
      for (; e < this.range.from; )
        this.range = this.ranges[--this.rangeIndex];
      for (; e >= this.range.to; )
        this.range = this.ranges[++this.rangeIndex];
      e >= this.chunkPos && e < this.chunkPos + this.chunk.length ? this.chunkOff = e - this.chunkPos : (this.chunk = "", this.chunkOff = 0), this.readNext();
    }
    return this;
  }
  /**
  @internal
  */
  read(e, t) {
    if (e >= this.chunkPos && t <= this.chunkPos + this.chunk.length)
      return this.chunk.slice(e - this.chunkPos, t - this.chunkPos);
    if (e >= this.chunk2Pos && t <= this.chunk2Pos + this.chunk2.length)
      return this.chunk2.slice(e - this.chunk2Pos, t - this.chunk2Pos);
    if (e >= this.range.from && t <= this.range.to)
      return this.input.read(e, t);
    let i = "";
    for (let r of this.ranges) {
      if (r.from >= t)
        break;
      r.to > e && (i += this.input.read(Math.max(r.from, e), Math.min(r.to, t)));
    }
    return i;
  }
}
class Jt {
  constructor(e, t) {
    this.data = e, this.id = t;
  }
  token(e, t) {
    let { parser: i } = t.p;
    _h(this.data, e, t, this.id, i.data, i.tokenPrecTable);
  }
}
Jt.prototype.contextual = Jt.prototype.fallback = Jt.prototype.extend = !1;
class Fn {
  constructor(e, t, i) {
    this.precTable = t, this.elseToken = i, this.data = typeof e == "string" ? wi(e) : e;
  }
  token(e, t) {
    let i = e.pos, r = 0;
    for (; ; ) {
      let O = e.next < 0, s = e.resolveOffset(1, 1);
      if (_h(this.data, e, t, 0, this.data, this.precTable), e.token.value > -1)
        break;
      if (this.elseToken == null)
        return;
      if (O || r++, s == null)
        break;
      e.reset(s, e.token);
    }
    r && (e.reset(i, e.token), e.acceptToken(this.elseToken, r));
  }
}
Fn.prototype.contextual = Jt.prototype.fallback = Jt.prototype.extend = !1;
class te {
  /**
  Create a tokenizer. The first argument is the function that,
  given an input stream, scans for the types of tokens it
  recognizes at the stream's position, and calls
  [`acceptToken`](#lr.InputStream.acceptToken) when it finds
  one.
  */
  constructor(e, t = {}) {
    this.token = e, this.contextual = !!t.contextual, this.fallback = !!t.fallback, this.extend = !!t.extend;
  }
}
function _h(n, e, t, i, r, O) {
  let s = 0, a = 1 << i, { dialect: o } = t.p.parser;
  e: for (; (a & n[s]) != 0; ) {
    let l = n[s + 1];
    for (let u = s + 3; u < l; u += 2)
      if ((n[u + 1] & a) > 0) {
        let d = n[u];
        if (o.allows(d) && (e.token.value == -1 || e.token.value == d || bm(d, e.token.value, r, O))) {
          e.acceptToken(d);
          break;
        }
      }
    let c = e.next, h = 0, f = n[s + 2];
    if (e.next < 0 && f > h && n[l + f * 3 - 3] == 65535) {
      s = n[l + f * 3 - 1];
      continue e;
    }
    for (; h < f; ) {
      let u = h + f >> 1, d = l + u + (u << 1), p = n[d], Q = n[d + 1] || 65536;
      if (c < p)
        f = u;
      else if (c >= Q)
        h = u + 1;
      else {
        s = n[d + 2], e.advance();
        continue e;
      }
    }
    break;
  }
}
function go(n, e, t) {
  for (let i = e, r; (r = n[i]) != 65535; i++)
    if (r == t)
      return i - e;
  return -1;
}
function bm(n, e, t, i) {
  let r = go(t, i, e);
  return r < 0 || go(t, i, n) < r;
}
const Qe = typeof process < "u" && process.env && /\bparse\b/.test(process.env.LOG);
let Ar = null;
function So(n, e, t) {
  let i = n.cursor(A.IncludeAnonymous);
  for (i.moveTo(e); ; )
    if (!(t < 0 ? i.childBefore(e) : i.childAfter(e)))
      for (; ; ) {
        if ((t < 0 ? i.to < e : i.from > e) && !i.type.isError)
          return t < 0 ? Math.max(0, Math.min(
            i.to - 1,
            e - 25
            /* Lookahead.Margin */
          )) : Math.min(n.length, Math.max(
            i.from + 1,
            e + 25
            /* Lookahead.Margin */
          ));
        if (t < 0 ? i.prevSibling() : i.nextSibling())
          break;
        if (!i.parent())
          return t < 0 ? 0 : n.length;
      }
}
class wm {
  constructor(e, t) {
    this.fragments = e, this.nodeSet = t, this.i = 0, this.fragment = null, this.safeFrom = -1, this.safeTo = -1, this.trees = [], this.start = [], this.index = [], this.nextFragment();
  }
  nextFragment() {
    let e = this.fragment = this.i == this.fragments.length ? null : this.fragments[this.i++];
    if (e) {
      for (this.safeFrom = e.openStart ? So(e.tree, e.from + e.offset, 1) - e.offset : e.from, this.safeTo = e.openEnd ? So(e.tree, e.to + e.offset, -1) - e.offset : e.to; this.trees.length; )
        this.trees.pop(), this.start.pop(), this.index.pop();
      this.trees.push(e.tree), this.start.push(-e.offset), this.index.push(0), this.nextStart = this.safeFrom;
    } else
      this.nextStart = 1e9;
  }
  // `pos` must be >= any previously given `pos` for this cursor
  nodeAt(e) {
    if (e < this.nextStart)
      return null;
    for (; this.fragment && this.safeTo <= e; )
      this.nextFragment();
    if (!this.fragment)
      return null;
    for (; ; ) {
      let t = this.trees.length - 1;
      if (t < 0)
        return this.nextFragment(), null;
      let i = this.trees[t], r = this.index[t];
      if (r == i.children.length) {
        this.trees.pop(), this.start.pop(), this.index.pop();
        continue;
      }
      let O = i.children[r], s = this.start[t] + i.positions[r];
      if (s > e)
        return this.nextStart = s, null;
      if (O instanceof L) {
        if (s == e) {
          if (s < this.safeFrom)
            return null;
          let a = s + O.length;
          if (a <= this.safeTo) {
            let o = O.prop(z.lookAhead);
            if (!o || a + o < this.fragment.to)
              return O;
          }
        }
        this.index[t]++, s + O.length >= Math.max(this.safeFrom, e) && (this.trees.push(O), this.start.push(s), this.index.push(0));
      } else
        this.index[t]++, this.nextStart = s + O.length;
    }
  }
}
class xm {
  constructor(e, t) {
    this.stream = t, this.tokens = [], this.mainToken = null, this.actions = [], this.tokens = e.tokenizers.map((i) => new xn());
  }
  getActions(e) {
    let t = 0, i = null, { parser: r } = e.p, { tokenizers: O } = r, s = r.stateSlot(
      e.state,
      3
      /* ParseState.TokenizerMask */
    ), a = e.curContext ? e.curContext.hash : 0, o = 0;
    for (let l = 0; l < O.length; l++) {
      if ((1 << l & s) == 0)
        continue;
      let c = O[l], h = this.tokens[l];
      if (!(i && !c.fallback) && ((c.contextual || h.start != e.pos || h.mask != s || h.context != a) && (this.updateCachedToken(h, c, e), h.mask = s, h.context = a), h.lookAhead > h.end + 25 && (o = Math.max(h.lookAhead, o)), h.value != 0)) {
        let f = t;
        if (h.extended > -1 && (t = this.addActions(e, h.extended, h.end, t)), t = this.addActions(e, h.value, h.end, t), !c.extend && (i = h, t > f))
          break;
      }
    }
    for (; this.actions.length > t; )
      this.actions.pop();
    return o && e.setLookAhead(o), !i && e.pos == this.stream.end && (i = new xn(), i.value = e.p.parser.eofTerm, i.start = i.end = e.pos, t = this.addActions(e, i.value, i.end, t)), this.mainToken = i, this.actions;
  }
  getMainToken(e) {
    if (this.mainToken)
      return this.mainToken;
    let t = new xn(), { pos: i, p: r } = e;
    return t.start = i, t.end = Math.min(i + 1, r.stream.end), t.value = i == r.stream.end ? r.parser.eofTerm : 0, t;
  }
  updateCachedToken(e, t, i) {
    let r = this.stream.clipPos(i.pos);
    if (t.token(this.stream.reset(r, e), i), e.value > -1) {
      let { parser: O } = i.p;
      for (let s = 0; s < O.specialized.length; s++)
        if (O.specialized[s] == e.value) {
          let a = O.specializers[s](this.stream.read(e.start, e.end), i);
          if (a >= 0 && i.p.parser.dialect.allows(a >> 1)) {
            (a & 1) == 0 ? e.value = a >> 1 : e.extended = a >> 1;
            break;
          }
        }
    } else
      e.value = 0, e.end = this.stream.clipPos(r + 1);
  }
  putAction(e, t, i, r) {
    for (let O = 0; O < r; O += 3)
      if (this.actions[O] == e)
        return r;
    return this.actions[r++] = e, this.actions[r++] = t, this.actions[r++] = i, r;
  }
  addActions(e, t, i, r) {
    let { state: O } = e, { parser: s } = e.p, { data: a } = s;
    for (let o = 0; o < 2; o++)
      for (let l = s.stateSlot(
        O,
        o ? 2 : 1
        /* ParseState.Actions */
      ); ; l += 3) {
        if (a[l] == 65535)
          if (a[l + 1] == 1)
            l = et(a, l + 2);
          else {
            r == 0 && a[l + 1] == 2 && (r = this.putAction(et(a, l + 2), t, i, r));
            break;
          }
        a[l] == t && (r = this.putAction(et(a, l + 1), t, i, r));
      }
    return r;
  }
}
class km {
  constructor(e, t, i, r) {
    this.parser = e, this.input = t, this.ranges = r, this.recovering = 0, this.nextStackID = 9812, this.minStackPos = 0, this.reused = [], this.stoppedAt = null, this.lastBigReductionStart = -1, this.lastBigReductionSize = 0, this.bigReductionCount = 0, this.stream = new ym(t, r), this.tokens = new xm(e, this.stream), this.topTerm = e.top[1];
    let { from: O } = r[0];
    this.stacks = [In.start(this, e.top[0], O)], this.fragments = i.length && this.stream.end - O > e.bufferLength * 4 ? new wm(i, e.nodeSet) : null;
  }
  get parsedPos() {
    return this.minStackPos;
  }
  // Move the parser forward. This will process all parse stacks at
  // `this.pos` and try to advance them to a further position. If no
  // stack for such a position is found, it'll start error-recovery.
  //
  // When the parse is finished, this will return a syntax tree. When
  // not, it returns `null`.
  advance() {
    let e = this.stacks, t = this.minStackPos, i = this.stacks = [], r, O;
    if (this.bigReductionCount > 300 && e.length == 1) {
      let [s] = e;
      for (; s.forceReduce() && s.stack.length && s.stack[s.stack.length - 2] >= this.lastBigReductionStart; )
        ;
      this.bigReductionCount = this.lastBigReductionSize = 0;
    }
    for (let s = 0; s < e.length; s++) {
      let a = e[s];
      for (; ; ) {
        if (this.tokens.mainToken = null, a.pos > t)
          i.push(a);
        else {
          if (this.advanceStack(a, i, e))
            continue;
          {
            r || (r = [], O = []), r.push(a);
            let o = this.tokens.getMainToken(a);
            O.push(o.value, o.end);
          }
        }
        break;
      }
    }
    if (!i.length) {
      let s = r && vm(r);
      if (s)
        return Qe && console.log("Finish with " + this.stackID(s)), this.stackToTree(s);
      if (this.parser.strict)
        throw Qe && r && console.log("Stuck with token " + (this.tokens.mainToken ? this.parser.getName(this.tokens.mainToken.value) : "none")), new SyntaxError("No parse at " + t);
      this.recovering || (this.recovering = 5);
    }
    if (this.recovering && r) {
      let s = this.stoppedAt != null && r[0].pos > this.stoppedAt ? r[0] : this.runRecovery(r, O, i);
      if (s)
        return Qe && console.log("Force-finish " + this.stackID(s)), this.stackToTree(s.forceAll());
    }
    if (this.recovering) {
      let s = this.recovering == 1 ? 1 : this.recovering * 3;
      if (i.length > s)
        for (i.sort((a, o) => o.score - a.score); i.length > s; )
          i.pop();
      i.some((a) => a.reducePos > t) && this.recovering--;
    } else if (i.length > 1) {
      e: for (let s = 0; s < i.length - 1; s++) {
        let a = i[s];
        for (let o = s + 1; o < i.length; o++) {
          let l = i[o];
          if (a.sameState(l) || a.buffer.length > 500 && l.buffer.length > 500)
            if ((a.score - l.score || a.buffer.length - l.buffer.length) > 0)
              i.splice(o--, 1);
            else {
              i.splice(s--, 1);
              continue e;
            }
        }
      }
      i.length > 12 && (i.sort((s, a) => a.score - s.score), i.splice(
        12,
        i.length - 12
        /* Rec.MaxStackCount */
      ));
    }
    this.minStackPos = i[0].pos;
    for (let s = 1; s < i.length; s++)
      i[s].pos < this.minStackPos && (this.minStackPos = i[s].pos);
    return null;
  }
  stopAt(e) {
    if (this.stoppedAt != null && this.stoppedAt < e)
      throw new RangeError("Can't move stoppedAt forward");
    this.stoppedAt = e;
  }
  // Returns an updated version of the given stack, or null if the
  // stack can't advance normally. When `split` and `stacks` are
  // given, stacks split off by ambiguous operations will be pushed to
  // `split`, or added to `stacks` if they move `pos` forward.
  advanceStack(e, t, i) {
    let r = e.pos, { parser: O } = this, s = Qe ? this.stackID(e) + " -> " : "";
    if (this.stoppedAt != null && r > this.stoppedAt)
      return e.forceReduce() ? e : null;
    if (this.fragments) {
      let l = e.curContext && e.curContext.tracker.strict, c = l ? e.curContext.hash : 0;
      for (let h = this.fragments.nodeAt(r); h; ) {
        let f = this.parser.nodeSet.types[h.type.id] == h.type ? O.getGoto(e.state, h.type.id) : -1;
        if (f > -1 && h.length && (!l || (h.prop(z.contextHash) || 0) == c))
          return e.useNode(h, f), Qe && console.log(s + this.stackID(e) + ` (via reuse of ${O.getName(h.type.id)})`), !0;
        if (!(h instanceof L) || h.children.length == 0 || h.positions[0] > 0)
          break;
        let u = h.children[0];
        if (u instanceof L && h.positions[0] == 0)
          h = u;
        else
          break;
      }
    }
    let a = O.stateSlot(
      e.state,
      4
      /* ParseState.DefaultReduce */
    );
    if (a > 0)
      return e.reduce(a), Qe && console.log(s + this.stackID(e) + ` (via always-reduce ${O.getName(
        a & 65535
        /* Action.ValueMask */
      )})`), !0;
    if (e.stack.length >= 8400)
      for (; e.stack.length > 6e3 && e.forceReduce(); )
        ;
    let o = this.tokens.getActions(e);
    for (let l = 0; l < o.length; ) {
      let c = o[l++], h = o[l++], f = o[l++], u = l == o.length || !i, d = u ? e : e.split(), p = this.tokens.mainToken;
      if (d.apply(c, h, p ? p.start : d.pos, f), Qe && console.log(s + this.stackID(d) + ` (via ${(c & 65536) == 0 ? "shift" : `reduce of ${O.getName(
        c & 65535
        /* Action.ValueMask */
      )}`} for ${O.getName(h)} @ ${r}${d == e ? "" : ", split"})`), u)
        return !0;
      d.pos > r ? t.push(d) : i.push(d);
    }
    return !1;
  }
  // Advance a given stack forward as far as it will go. Returns the
  // (possibly updated) stack if it got stuck, or null if it moved
  // forward and was given to `pushStackDedup`.
  advanceFully(e, t) {
    let i = e.pos;
    for (; ; ) {
      if (!this.advanceStack(e, null, null))
        return !1;
      if (e.pos > i)
        return Po(e, t), !0;
    }
  }
  runRecovery(e, t, i) {
    let r = null, O = !1;
    for (let s = 0; s < e.length; s++) {
      let a = e[s], o = t[s << 1], l = t[(s << 1) + 1], c = Qe ? this.stackID(a) + " -> " : "";
      if (a.deadEnd && (O || (O = !0, a.restart(), Qe && console.log(c + this.stackID(a) + " (restarted)"), this.advanceFully(a, i))))
        continue;
      let h = a.split(), f = c;
      for (let u = 0; u < 10 && h.forceReduce() && (Qe && console.log(f + this.stackID(h) + " (via force-reduce)"), !this.advanceFully(h, i)); u++)
        Qe && (f = this.stackID(h) + " -> ");
      for (let u of a.recoverByInsert(o))
        Qe && console.log(c + this.stackID(u) + " (via recover-insert)"), this.advanceFully(u, i);
      this.stream.end > a.pos ? (l == a.pos && (l++, o = 0), a.recoverByDelete(o, l), Qe && console.log(c + this.stackID(a) + ` (via recover-delete ${this.parser.getName(o)})`), Po(a, i)) : (!r || r.score < h.score) && (r = h);
    }
    return r;
  }
  // Convert the stack's buffer to a syntax tree.
  stackToTree(e) {
    return e.close(), L.build({
      buffer: Nn.create(e),
      nodeSet: this.parser.nodeSet,
      topID: this.topTerm,
      maxBufferLength: this.parser.bufferLength,
      reused: this.reused,
      start: this.ranges[0].from,
      length: e.pos - this.ranges[0].from,
      minRepeatType: this.parser.minRepeatTerm
    });
  }
  stackID(e) {
    let t = (Ar || (Ar = /* @__PURE__ */ new WeakMap())).get(e);
    return t || Ar.set(e, t = String.fromCodePoint(this.nextStackID++)), t + e;
  }
}
function Po(n, e) {
  for (let t = 0; t < e.length; t++) {
    let i = e[t];
    if (i.pos == n.pos && i.sameState(n)) {
      e[t].score < n.score && (e[t] = n);
      return;
    }
  }
  e.push(n);
}
class Xm {
  constructor(e, t, i) {
    this.source = e, this.flags = t, this.disabled = i;
  }
  allows(e) {
    return !this.disabled || this.disabled[e] == 0;
  }
}
const Gr = (n) => n;
class Yh {
  /**
  Define a context tracker.
  */
  constructor(e) {
    this.start = e.start, this.shift = e.shift || Gr, this.reduce = e.reduce || Gr, this.reuse = e.reuse || Gr, this.hash = e.hash || (() => 0), this.strict = e.strict !== !1;
  }
}
class ot extends bc {
  /**
  @internal
  */
  constructor(e) {
    if (super(), this.wrappers = [], e.version != 14)
      throw new RangeError(`Parser version (${e.version}) doesn't match runtime version (14)`);
    let t = e.nodeNames.split(" ");
    this.minRepeatTerm = t.length;
    for (let a = 0; a < e.repeatNodeCount; a++)
      t.push("");
    let i = Object.keys(e.topRules).map((a) => e.topRules[a][1]), r = [];
    for (let a = 0; a < t.length; a++)
      r.push([]);
    function O(a, o, l) {
      r[a].push([o, o.deserialize(String(l))]);
    }
    if (e.nodeProps)
      for (let a of e.nodeProps) {
        let o = a[0];
        typeof o == "string" && (o = z[o]);
        for (let l = 1; l < a.length; ) {
          let c = a[l++];
          if (c >= 0)
            O(c, o, a[l++]);
          else {
            let h = a[l + -c];
            for (let f = -c; f > 0; f--)
              O(a[l++], o, h);
            l++;
          }
        }
      }
    this.nodeSet = new us(t.map((a, o) => he.define({
      name: o >= this.minRepeatTerm ? void 0 : a,
      id: o,
      props: r[o],
      top: i.indexOf(o) > -1,
      error: o == 0,
      skipped: e.skippedNodes && e.skippedNodes.indexOf(o) > -1
    }))), e.propSources && (this.nodeSet = this.nodeSet.extend(...e.propSources)), this.strict = !1, this.bufferLength = gc;
    let s = wi(e.tokenData);
    this.context = e.context, this.specializerSpecs = e.specialized || [], this.specialized = new Uint16Array(this.specializerSpecs.length);
    for (let a = 0; a < this.specializerSpecs.length; a++)
      this.specialized[a] = this.specializerSpecs[a].term;
    this.specializers = this.specializerSpecs.map(To), this.states = wi(e.states, Uint32Array), this.data = wi(e.stateData), this.goto = wi(e.goto), this.maxTerm = e.maxTerm, this.tokenizers = e.tokenizers.map((a) => typeof a == "number" ? new Jt(s, a) : a), this.topRules = e.topRules, this.dialects = e.dialects || {}, this.dynamicPrecedences = e.dynamicPrecedences || null, this.tokenPrecTable = e.tokenPrec, this.termNames = e.termNames || null, this.maxNode = this.nodeSet.types.length - 1, this.dialect = this.parseDialect(), this.top = this.topRules[Object.keys(this.topRules)[0]];
  }
  createParse(e, t, i) {
    let r = new km(this, e, t, i);
    for (let O of this.wrappers)
      r = O(r, e, t, i);
    return r;
  }
  /**
  Get a goto table entry @internal
  */
  getGoto(e, t, i = !1) {
    let r = this.goto;
    if (t >= r[0])
      return -1;
    for (let O = r[t + 1]; ; ) {
      let s = r[O++], a = s & 1, o = r[O++];
      if (a && i)
        return o;
      for (let l = O + (s >> 1); O < l; O++)
        if (r[O] == e)
          return o;
      if (a)
        return -1;
    }
  }
  /**
  Check if this state has an action for a given terminal @internal
  */
  hasAction(e, t) {
    let i = this.data;
    for (let r = 0; r < 2; r++)
      for (let O = this.stateSlot(
        e,
        r ? 2 : 1
        /* ParseState.Actions */
      ), s; ; O += 3) {
        if ((s = i[O]) == 65535)
          if (i[O + 1] == 1)
            s = i[O = et(i, O + 2)];
          else {
            if (i[O + 1] == 2)
              return et(i, O + 2);
            break;
          }
        if (s == t || s == 0)
          return et(i, O + 1);
      }
    return 0;
  }
  /**
  @internal
  */
  stateSlot(e, t) {
    return this.states[e * 6 + t];
  }
  /**
  @internal
  */
  stateFlag(e, t) {
    return (this.stateSlot(
      e,
      0
      /* ParseState.Flags */
    ) & t) > 0;
  }
  /**
  @internal
  */
  validAction(e, t) {
    return !!this.allActions(e, (i) => i == t ? !0 : null);
  }
  /**
  @internal
  */
  allActions(e, t) {
    let i = this.stateSlot(
      e,
      4
      /* ParseState.DefaultReduce */
    ), r = i ? t(i) : void 0;
    for (let O = this.stateSlot(
      e,
      1
      /* ParseState.Actions */
    ); r == null; O += 3) {
      if (this.data[O] == 65535)
        if (this.data[O + 1] == 1)
          O = et(this.data, O + 2);
        else
          break;
      r = t(et(this.data, O + 1));
    }
    return r;
  }
  /**
  Get the states that can follow this one through shift actions or
  goto jumps. @internal
  */
  nextStates(e) {
    let t = [];
    for (let i = this.stateSlot(
      e,
      1
      /* ParseState.Actions */
    ); ; i += 3) {
      if (this.data[i] == 65535)
        if (this.data[i + 1] == 1)
          i = et(this.data, i + 2);
        else
          break;
      if ((this.data[i + 2] & 1) == 0) {
        let r = this.data[i + 1];
        t.some((O, s) => s & 1 && O == r) || t.push(this.data[i], r);
      }
    }
    return t;
  }
  /**
  Configure the parser. Returns a new parser instance that has the
  given settings modified. Settings not provided in `config` are
  kept from the original parser.
  */
  configure(e) {
    let t = Object.assign(Object.create(ot.prototype), this);
    if (e.props && (t.nodeSet = this.nodeSet.extend(...e.props)), e.top) {
      let i = this.topRules[e.top];
      if (!i)
        throw new RangeError(`Invalid top rule name ${e.top}`);
      t.top = i;
    }
    return e.tokenizers && (t.tokenizers = this.tokenizers.map((i) => {
      let r = e.tokenizers.find((O) => O.from == i);
      return r ? r.to : i;
    })), e.specializers && (t.specializers = this.specializers.slice(), t.specializerSpecs = this.specializerSpecs.map((i, r) => {
      let O = e.specializers.find((a) => a.from == i.external);
      if (!O)
        return i;
      let s = Object.assign(Object.assign({}, i), { external: O.to });
      return t.specializers[r] = To(s), s;
    })), e.contextTracker && (t.context = e.contextTracker), e.dialect && (t.dialect = this.parseDialect(e.dialect)), e.strict != null && (t.strict = e.strict), e.wrap && (t.wrappers = t.wrappers.concat(e.wrap)), e.bufferLength != null && (t.bufferLength = e.bufferLength), t;
  }
  /**
  Tells you whether any [parse wrappers](#lr.ParserConfig.wrap)
  are registered for this parser.
  */
  hasWrappers() {
    return this.wrappers.length > 0;
  }
  /**
  Returns the name associated with a given term. This will only
  work for all terms when the parser was generated with the
  `--names` option. By default, only the names of tagged terms are
  stored.
  */
  getName(e) {
    return this.termNames ? this.termNames[e] : String(e <= this.maxNode && this.nodeSet.types[e].name || e);
  }
  /**
  The eof term id is always allocated directly after the node
  types. @internal
  */
  get eofTerm() {
    return this.maxNode + 1;
  }
  /**
  The type of top node produced by the parser.
  */
  get topNode() {
    return this.nodeSet.types[this.top[1]];
  }
  /**
  @internal
  */
  dynamicPrecedence(e) {
    let t = this.dynamicPrecedences;
    return t == null ? 0 : t[e] || 0;
  }
  /**
  @internal
  */
  parseDialect(e) {
    let t = Object.keys(this.dialects), i = t.map(() => !1);
    if (e)
      for (let O of e.split(" ")) {
        let s = t.indexOf(O);
        s >= 0 && (i[s] = !0);
      }
    let r = null;
    for (let O = 0; O < t.length; O++)
      if (!i[O])
        for (let s = this.dialects[t[O]], a; (a = this.data[s++]) != 65535; )
          (r || (r = new Uint8Array(this.maxTerm + 1)))[a] = 1;
    return new Xm(e, i, r);
  }
  /**
  Used by the output of the parser generator. Not available to
  user code. @hide
  */
  static deserialize(e) {
    return new ot(e);
  }
}
function et(n, e) {
  return n[e] | n[e + 1] << 16;
}
function vm(n) {
  let e = null;
  for (let t of n) {
    let i = t.p.stoppedAt;
    (t.pos == t.p.stream.end || i != null && t.pos > i) && t.p.parser.stateFlag(
      t.state,
      2
      /* StateFlag.Accepting */
    ) && (!e || e.score < t.score) && (e = t);
  }
  return e;
}
function To(n) {
  if (n.external) {
    let e = n.extend ? 1 : 0;
    return (t, i) => n.external(t, i) << 1 | e;
  }
  return n.get;
}
const Zm = 316, Rm = 317, yo = 1, zm = 2, _m = 3, Ym = 4, Vm = 318, Wm = 320, qm = 321, Cm = 5, Um = 6, Am = 0, jO = [
  9,
  10,
  11,
  12,
  13,
  32,
  133,
  160,
  5760,
  8192,
  8193,
  8194,
  8195,
  8196,
  8197,
  8198,
  8199,
  8200,
  8201,
  8202,
  8232,
  8233,
  8239,
  8287,
  12288
], Vh = 125, Gm = 59, MO = 47, jm = 42, Mm = 43, Em = 45, Lm = 60, Dm = 44, Bm = 63, Im = 46, Nm = 91, Fm = new Yh({
  start: !1,
  shift(n, e) {
    return e == Cm || e == Um || e == Wm ? n : e == qm;
  },
  strict: !1
}), Hm = new te((n, e) => {
  let { next: t } = n;
  (t == Vh || t == -1 || e.context) && n.acceptToken(Vm);
}, { contextual: !0, fallback: !0 }), Km = new te((n, e) => {
  let { next: t } = n, i;
  jO.indexOf(t) > -1 || t == MO && ((i = n.peek(1)) == MO || i == jm) || t != Vh && t != Gm && t != -1 && !e.context && n.acceptToken(Zm);
}, { contextual: !0 }), Jm = new te((n, e) => {
  n.next == Nm && !e.context && n.acceptToken(Rm);
}, { contextual: !0 }), eg = new te((n, e) => {
  let { next: t } = n;
  if (t == Mm || t == Em) {
    if (n.advance(), t == n.next) {
      n.advance();
      let i = !e.context && e.canShift(yo);
      n.acceptToken(i ? yo : zm);
    }
  } else t == Bm && n.peek(1) == Im && (n.advance(), n.advance(), (n.next < 48 || n.next > 57) && n.acceptToken(_m));
}, { contextual: !0 });
function jr(n, e) {
  return n >= 65 && n <= 90 || n >= 97 && n <= 122 || n == 95 || n >= 192 || !e && n >= 48 && n <= 57;
}
const tg = new te((n, e) => {
  if (n.next != Lm || !e.dialectEnabled(Am) || (n.advance(), n.next == MO)) return;
  let t = 0;
  for (; jO.indexOf(n.next) > -1; )
    n.advance(), t++;
  if (jr(n.next, !0)) {
    for (n.advance(), t++; jr(n.next, !1); )
      n.advance(), t++;
    for (; jO.indexOf(n.next) > -1; )
      n.advance(), t++;
    if (n.next == Dm) return;
    for (let i = 0; ; i++) {
      if (i == 7) {
        if (!jr(n.next, !0)) return;
        break;
      }
      if (n.next != "extends".charCodeAt(i)) break;
      n.advance(), t++;
    }
  }
  n.acceptToken(Ym, -t);
}), ig = Ct({
  "get set async static": $.modifier,
  "for while do if else switch try catch finally return throw break continue default case defer": $.controlKeyword,
  "in of await yield void typeof delete instanceof as satisfies": $.operatorKeyword,
  "let var const using function class extends": $.definitionKeyword,
  "import export from": $.moduleKeyword,
  "with debugger new": $.keyword,
  TemplateString: $.special($.string),
  super: $.atom,
  BooleanLiteral: $.bool,
  this: $.self,
  null: $.null,
  Star: $.modifier,
  VariableName: $.variableName,
  "CallExpression/VariableName TaggedTemplateExpression/VariableName": $.function($.variableName),
  VariableDefinition: $.definition($.variableName),
  Label: $.labelName,
  PropertyName: $.propertyName,
  PrivatePropertyName: $.special($.propertyName),
  "CallExpression/MemberExpression/PropertyName": $.function($.propertyName),
  "FunctionDeclaration/VariableDefinition": $.function($.definition($.variableName)),
  "ClassDeclaration/VariableDefinition": $.definition($.className),
  "NewExpression/VariableName": $.className,
  PropertyDefinition: $.definition($.propertyName),
  PrivatePropertyDefinition: $.definition($.special($.propertyName)),
  UpdateOp: $.updateOperator,
  "LineComment Hashbang": $.lineComment,
  BlockComment: $.blockComment,
  Number: $.number,
  String: $.string,
  Escape: $.escape,
  ArithOp: $.arithmeticOperator,
  LogicOp: $.logicOperator,
  BitOp: $.bitwiseOperator,
  CompareOp: $.compareOperator,
  RegExp: $.regexp,
  Equals: $.definitionOperator,
  Arrow: $.function($.punctuation),
  ": Spread": $.punctuation,
  "( )": $.paren,
  "[ ]": $.squareBracket,
  "{ }": $.brace,
  "InterpolationStart InterpolationEnd": $.special($.brace),
  ".": $.derefOperator,
  ", ;": $.separator,
  "@": $.meta,
  TypeName: $.typeName,
  TypeDefinition: $.definition($.typeName),
  "type enum interface implements namespace module declare": $.definitionKeyword,
  "abstract global Privacy readonly override": $.modifier,
  "is keyof unique infer asserts": $.operatorKeyword,
  JSXAttributeValue: $.attributeValue,
  JSXText: $.content,
  "JSXStartTag JSXStartCloseTag JSXSelfCloseEndTag JSXEndTag": $.angleBracket,
  "JSXIdentifier JSXNameSpacedName": $.tagName,
  "JSXAttribute/JSXIdentifier JSXAttribute/JSXNameSpacedName": $.attributeName,
  "JSXBuiltin/JSXIdentifier": $.standard($.tagName)
}), ng = { __proto__: null, export: 20, as: 25, from: 33, default: 36, async: 41, function: 42, in: 52, out: 55, const: 56, extends: 60, this: 64, true: 72, false: 72, null: 84, void: 88, typeof: 92, super: 108, new: 142, delete: 154, yield: 163, await: 167, class: 172, public: 235, private: 235, protected: 235, readonly: 237, instanceof: 256, satisfies: 259, import: 292, keyof: 349, unique: 353, infer: 359, asserts: 395, is: 397, abstract: 417, implements: 419, type: 421, let: 424, var: 426, using: 429, interface: 435, enum: 439, namespace: 445, module: 447, declare: 451, global: 455, defer: 471, for: 476, of: 485, while: 488, with: 492, do: 496, if: 500, else: 502, switch: 506, case: 512, try: 518, catch: 522, finally: 526, return: 530, throw: 534, break: 538, continue: 542, debugger: 546 }, rg = { __proto__: null, async: 129, get: 131, set: 133, declare: 195, public: 197, private: 197, protected: 197, static: 199, abstract: 201, override: 203, readonly: 209, accessor: 211, new: 401 }, Og = { __proto__: null, "<": 193 }, sg = ot.deserialize({
  version: 14,
  states: "$F|Q%TQlOOO%[QlOOO'_QpOOP(lO`OOO*zQ!0MxO'#CiO+RO#tO'#CjO+aO&jO'#CjO+oO#@ItO'#DaO.QQlO'#DgO.bQlO'#DrO%[QlO'#DzO0fQlO'#ESOOQ!0Lf'#E['#E[O1PQ`O'#EXOOQO'#Ep'#EpOOQO'#Il'#IlO1XQ`O'#GsO1dQ`O'#EoO1iQ`O'#EoO3hQ!0MxO'#JrO6[Q!0MxO'#JsO6uQ`O'#F]O6zQ,UO'#FtOOQ!0Lf'#Ff'#FfO7VO7dO'#FfO9XQMhO'#F|O9`Q`O'#F{OOQ!0Lf'#Js'#JsOOQ!0Lb'#Jr'#JrO9eQ`O'#GwOOQ['#K_'#K_O9pQ`O'#IYO9uQ!0LrO'#IZOOQ['#J`'#J`OOQ['#I_'#I_Q`QlOOQ`QlOOO9}Q!L^O'#DvO:UQlO'#EOO:]QlO'#EQO9kQ`O'#GsO:dQMhO'#CoO:rQ`O'#EnO:}Q`O'#EyO;hQMhO'#FeO;xQ`O'#GsOOQO'#K`'#K`O;}Q`O'#K`O<]Q`O'#G{O<]Q`O'#G|O<]Q`O'#HOO9kQ`O'#HRO=SQ`O'#HUO>kQ`O'#CeO>{Q`O'#HcO?TQ`O'#HiO?TQ`O'#HkO`QlO'#HmO?TQ`O'#HoO?TQ`O'#HrO?YQ`O'#HxO?_Q!0LsO'#IOO%[QlO'#IQO?jQ!0LsO'#ISO?uQ!0LsO'#IUO9uQ!0LrO'#IWO@QQ!0MxO'#CiOASQpO'#DlQOQ`OOO%[QlO'#EQOAjQ`O'#ETO:dQMhO'#EnOAuQ`O'#EnOBQQ!bO'#FeOOQ['#Cg'#CgOOQ!0Lb'#Dq'#DqOOQ!0Lb'#Jv'#JvO%[QlO'#JvOOQO'#Jy'#JyOOQO'#Ih'#IhOCQQpO'#EgOOQ!0Lb'#Ef'#EfOOQ!0Lb'#J}'#J}OC|Q!0MSO'#EgODWQpO'#EWOOQO'#Jx'#JxODlQpO'#JyOEyQpO'#EWODWQpO'#EgPFWO&2DjO'#CbPOOO)CD})CD}OOOO'#I`'#I`OFcO#tO,59UOOQ!0Lh,59U,59UOOOO'#Ia'#IaOFqO&jO,59UOGPQ!L^O'#DcOOOO'#Ic'#IcOGWO#@ItO,59{OOQ!0Lf,59{,59{OGfQlO'#IdOGyQ`O'#JtOIxQ!fO'#JtO+}QlO'#JtOJPQ`O,5:ROJgQ`O'#EpOJtQ`O'#KTOKPQ`O'#KSOKPQ`O'#KSOKXQ`O,5;^OK^Q`O'#KROOQ!0Ln,5:^,5:^OKeQlO,5:^OMcQ!0MxO,5:fONSQ`O,5:nONmQ!0LrO'#KQONtQ`O'#KPO9eQ`O'#KPO! YQ`O'#KPO! bQ`O,5;]O! gQ`O'#KPO!#lQ!fO'#JsOOQ!0Lh'#Ci'#CiO%[QlO'#ESO!$[Q!fO,5:sOOQS'#Jz'#JzOOQO-E<j-E<jO9kQ`O,5=_O!$rQ`O,5=_O!$wQlO,5;ZO!&zQMhO'#EkO!(eQ`O,5;ZO!(jQlO'#DyO!(tQpO,5;dO!(|QpO,5;dO%[QlO,5;dOOQ['#FT'#FTOOQ['#FV'#FVO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eO%[QlO,5;eOOQ['#FZ'#FZO!)[QlO,5;tOOQ!0Lf,5;y,5;yOOQ!0Lf,5;z,5;zOOQ!0Lf,5;|,5;|O%[QlO'#IpO!+_Q!0LrO,5<iO%[QlO,5;eO!&zQMhO,5;eO!+|QMhO,5;eO!-nQMhO'#E^O%[QlO,5;wOOQ!0Lf,5;{,5;{O!-uQ,UO'#FjO!.rQ,UO'#KXO!.^Q,UO'#KXO!.yQ,UO'#KXOOQO'#KX'#KXO!/_Q,UO,5<SOOOW,5<`,5<`O!/pQlO'#FvOOOW'#Io'#IoO7VO7dO,5<QO!/wQ,UO'#FxOOQ!0Lf,5<Q,5<QO!0hQ$IUO'#CyOOQ!0Lh'#C}'#C}O!0{O#@ItO'#DRO!1iQMjO,5<eO!1pQ`O,5<hO!3YQ(CWO'#GXO!3jQ`O'#GYO!3oQ`O'#GYO!5_Q(CWO'#G^O!6dQpO'#GbOOQO'#Gn'#GnO!,TQMhO'#GmOOQO'#Gp'#GpO!,TQMhO'#GoO!7VQ$IUO'#JlOOQ!0Lh'#Jl'#JlO!7aQ`O'#JkO!7oQ`O'#JjO!7wQ`O'#CuOOQ!0Lh'#C{'#C{O!8YQ`O'#C}OOQ!0Lh'#DV'#DVOOQ!0Lh'#DX'#DXO!8_Q`O,5<eO1SQ`O'#DZO!,TQMhO'#GPO!,TQMhO'#GRO!8gQ`O'#GTO!8lQ`O'#GUO!3oQ`O'#G[O!,TQMhO'#GaO<]Q`O'#JkO!8qQ`O'#EqO!9`Q`O,5<gOOQ!0Lb'#Cr'#CrO!9hQ`O'#ErO!:bQpO'#EsOOQ!0Lb'#KR'#KRO!:iQ!0LrO'#KaO9uQ!0LrO,5=cO`QlO,5>tOOQ['#Jh'#JhOOQ[,5>u,5>uOOQ[-E<]-E<]O!<hQ!0MxO,5:bO!:]QpO,5:`O!?RQ!0MxO,5:jO%[QlO,5:jO!AiQ!0MxO,5:lOOQO,5@z,5@zO!BYQMhO,5=_O!BhQ!0LrO'#JiO9`Q`O'#JiO!ByQ!0LrO,59ZO!CUQpO,59ZO!C^QMhO,59ZO:dQMhO,59ZO!CiQ`O,5;ZO!CqQ`O'#HbO!DVQ`O'#KdO%[QlO,5;}O!:]QpO,5<PO!D_Q`O,5=zO!DdQ`O,5=zO!DiQ`O,5=zO!DwQ`O,5=zO9uQ!0LrO,5=zO<]Q`O,5=jOOQO'#Cy'#CyO!EOQpO,5=gO!EWQMhO,5=hO!EcQ`O,5=jO!EhQ!bO,5=mO!EpQ`O'#K`O?YQ`O'#HWO9kQ`O'#HYO!EuQ`O'#HYO:dQMhO'#H[O!EzQ`O'#H[OOQ[,5=p,5=pO!FPQ`O'#H]O!FbQ`O'#CoO!FgQ`O,59PO!FqQ`O,59PO!HvQlO,59POOQ[,59P,59PO!IWQ!0LrO,59PO%[QlO,59PO!KcQlO'#HeOOQ['#Hf'#HfOOQ['#Hg'#HgO`QlO,5=}O!KyQ`O,5=}O`QlO,5>TO`QlO,5>VO!LOQ`O,5>XO`QlO,5>ZO!LTQ`O,5>^O!LYQlO,5>dOOQ[,5>j,5>jO%[QlO,5>jO9uQ!0LrO,5>lOOQ[,5>n,5>nO#!dQ`O,5>nOOQ[,5>p,5>pO#!dQ`O,5>pOOQ[,5>r,5>rO##QQpO'#D_O%[QlO'#JvO##sQpO'#JvO##}QpO'#DmO#$`QpO'#DmO#&qQlO'#DmO#&xQ`O'#JuO#'QQ`O,5:WO#'VQ`O'#EtO#'eQ`O'#KUO#'mQ`O,5;_O#'rQpO'#DmO#(PQpO'#EVOOQ!0Lf,5:o,5:oO%[QlO,5:oO#(WQ`O,5:oO?YQ`O,5;YO!CUQpO,5;YO!C^QMhO,5;YO:dQMhO,5;YO#(`Q`O,5@bO#(eQ07dO,5:sOOQO-E<f-E<fO#)kQ!0MSO,5;RODWQpO,5:rO#)uQpO,5:rODWQpO,5;RO!ByQ!0LrO,5:rOOQ!0Lb'#Ej'#EjOOQO,5;R,5;RO%[QlO,5;RO#*SQ!0LrO,5;RO#*_Q!0LrO,5;RO!CUQpO,5:rOOQO,5;X,5;XO#*mQ!0LrO,5;RPOOO'#I^'#I^P#+RO&2DjO,58|POOO,58|,58|OOOO-E<^-E<^OOQ!0Lh1G.p1G.pOOOO-E<_-E<_OOOO,59},59}O#+^Q!bO,59}OOOO-E<a-E<aOOQ!0Lf1G/g1G/gO#+cQ!fO,5?OO+}QlO,5?OOOQO,5?U,5?UO#+mQlO'#IdOOQO-E<b-E<bO#+zQ`O,5@`O#,SQ!fO,5@`O#,ZQ`O,5@nOOQ!0Lf1G/m1G/mO%[QlO,5@oO#,cQ`O'#IjOOQO-E<h-E<hO#,ZQ`O,5@nOOQ!0Lb1G0x1G0xOOQ!0Ln1G/x1G/xOOQ!0Ln1G0Y1G0YO%[QlO,5@lO#,wQ!0LrO,5@lO#-YQ!0LrO,5@lO#-aQ`O,5@kO9eQ`O,5@kO#-iQ`O,5@kO#-wQ`O'#ImO#-aQ`O,5@kOOQ!0Lb1G0w1G0wO!(tQpO,5:uO!)PQpO,5:uOOQS,5:w,5:wO#.iQdO,5:wO#.qQMhO1G2yO9kQ`O1G2yOOQ!0Lf1G0u1G0uO#/PQ!0MxO1G0uO#0UQ!0MvO,5;VOOQ!0Lh'#GW'#GWO#0rQ!0MzO'#JlO!$wQlO1G0uO#2}Q!fO'#JwO%[QlO'#JwO#3XQ`O,5:eOOQ!0Lh'#D_'#D_OOQ!0Lf1G1O1G1OO%[QlO1G1OOOQ!0Lf1G1f1G1fO#3^Q`O1G1OO#5rQ!0MxO1G1PO#5yQ!0MxO1G1PO#8aQ!0MxO1G1PO#8hQ!0MxO1G1PO#;OQ!0MxO1G1PO#=fQ!0MxO1G1PO#=mQ!0MxO1G1PO#=tQ!0MxO1G1PO#@[Q!0MxO1G1PO#@cQ!0MxO1G1PO#BpQ?MtO'#CiO#DkQ?MtO1G1`O#DrQ?MtO'#JsO#EVQ!0MxO,5?[OOQ!0Lb-E<n-E<nO#GdQ!0MxO1G1PO#HaQ!0MzO1G1POOQ!0Lf1G1P1G1PO#IdQMjO'#J|O#InQ`O,5:xO#IsQ!0MxO1G1cO#JgQ,UO,5<WO#JoQ,UO,5<XO#JwQ,UO'#FoO#K`Q`O'#FnOOQO'#KY'#KYOOQO'#In'#InO#KeQ,UO1G1nOOQ!0Lf1G1n1G1nOOOW1G1y1G1yO#KvQ?MtO'#JrO#LQQ`O,5<bO!)[QlO,5<bOOOW-E<m-E<mOOQ!0Lf1G1l1G1lO#LVQpO'#KXOOQ!0Lf,5<d,5<dO#L_QpO,5<dO#LdQMhO'#DTOOOO'#Ib'#IbO#LkO#@ItO,59mOOQ!0Lh,59m,59mO%[QlO1G2PO!8lQ`O'#IrO#LvQ`O,5<zOOQ!0Lh,5<w,5<wO!,TQMhO'#IuO#MdQMjO,5=XO!,TQMhO'#IwO#NVQMjO,5=ZO!&zQMhO,5=]OOQO1G2S1G2SO#NaQ!dO'#CrO#NtQ(CWO'#ErO$ |QpO'#GbO$!dQ!dO,5<sO$!kQ`O'#K[O9eQ`O'#K[O$!yQ`O,5<uO$#aQ!dO'#C{O!,TQMhO,5<tO$#kQ`O'#GZO$$PQ`O,5<tO$$UQ!dO'#GWO$$cQ!dO'#K]O$$mQ`O'#K]O!&zQMhO'#K]O$$rQ`O,5<xO$$wQlO'#JvO$%RQpO'#GcO#$`QpO'#GcO$%dQ`O'#GgO!3oQ`O'#GkO$%iQ!0LrO'#ItO$%tQpO,5<|OOQ!0Lp,5<|,5<|O$%{QpO'#GcO$&YQpO'#GdO$&kQpO'#GdO$&pQMjO,5=XO$'QQMjO,5=ZOOQ!0Lh,5=^,5=^O!,TQMhO,5@VO!,TQMhO,5@VO$'bQ`O'#IyO$'vQ`O,5@UO$(OQ`O,59aOOQ!0Lh,59i,59iO$(TQ`O,5@VO$)TQ$IYO,59uOOQ!0Lh'#Jp'#JpO$)vQMjO,5<kO$*iQMjO,5<mO@zQ`O,5<oOOQ!0Lh,5<p,5<pO$*sQ`O,5<vO$*xQMjO,5<{O$+YQ`O'#KPO!$wQlO1G2RO$+_Q`O1G2RO9eQ`O'#KSO9eQ`O'#EtO%[QlO'#EtO9eQ`O'#I{O$+dQ!0LrO,5@{OOQ[1G2}1G2}OOQ[1G4`1G4`OOQ!0Lf1G/|1G/|OOQ!0Lf1G/z1G/zO$-fQ!0MxO1G0UOOQ[1G2y1G2yO!&zQMhO1G2yO%[QlO1G2yO#.tQ`O1G2yO$/jQMhO'#EkOOQ!0Lb,5@T,5@TO$/wQ!0LrO,5@TOOQ[1G.u1G.uO!ByQ!0LrO1G.uO!CUQpO1G.uO!C^QMhO1G.uO$0YQ`O1G0uO$0_Q`O'#CiO$0jQ`O'#KeO$0rQ`O,5=|O$0wQ`O'#KeO$0|Q`O'#KeO$1[Q`O'#JRO$1jQ`O,5AOO$1rQ!fO1G1iOOQ!0Lf1G1k1G1kO9kQ`O1G3fO@zQ`O1G3fO$1yQ`O1G3fO$2OQ`O1G3fO!DiQ`O1G3fO9uQ!0LrO1G3fOOQ[1G3f1G3fO!EcQ`O1G3UO!&zQMhO1G3RO$2TQ`O1G3ROOQ[1G3S1G3SO!&zQMhO1G3SO$2YQ`O1G3SO$2bQpO'#HQOOQ[1G3U1G3UO!6_QpO'#I}O!EhQ!bO1G3XOOQ[1G3X1G3XOOQ[,5=r,5=rO$2jQMhO,5=tO9kQ`O,5=tO$%dQ`O,5=vO9`Q`O,5=vO!CUQpO,5=vO!C^QMhO,5=vO:dQMhO,5=vO$2xQ`O'#KcO$3TQ`O,5=wOOQ[1G.k1G.kO$3YQ!0LrO1G.kO@zQ`O1G.kO$3eQ`O1G.kO9uQ!0LrO1G.kO$5mQ!fO,5AQO$5zQ`O,5AQO9eQ`O,5AQO$6VQlO,5>PO$6^Q`O,5>POOQ[1G3i1G3iO`QlO1G3iOOQ[1G3o1G3oOOQ[1G3q1G3qO?TQ`O1G3sO$6cQlO1G3uO$:gQlO'#HtOOQ[1G3x1G3xO$:tQ`O'#HzO?YQ`O'#H|OOQ[1G4O1G4OO$:|QlO1G4OO9uQ!0LrO1G4UOOQ[1G4W1G4WOOQ!0Lb'#G_'#G_O9uQ!0LrO1G4YO9uQ!0LrO1G4[O$?TQ`O,5@bO!)[QlO,5;`O9eQ`O,5;`O?YQ`O,5:XO!)[QlO,5:XO!CUQpO,5:XO$?YQ?MtO,5:XOOQO,5;`,5;`O$?dQpO'#IeO$?zQ`O,5@aOOQ!0Lf1G/r1G/rO$@SQpO'#IkO$@^Q`O,5@pOOQ!0Lb1G0y1G0yO#$`QpO,5:XOOQO'#Ig'#IgO$@fQpO,5:qOOQ!0Ln,5:q,5:qO#(ZQ`O1G0ZOOQ!0Lf1G0Z1G0ZO%[QlO1G0ZOOQ!0Lf1G0t1G0tO?YQ`O1G0tO!CUQpO1G0tO!C^QMhO1G0tOOQ!0Lb1G5|1G5|O!ByQ!0LrO1G0^OOQO1G0m1G0mO%[QlO1G0mO$@mQ!0LrO1G0mO$@xQ!0LrO1G0mO!CUQpO1G0^ODWQpO1G0^O$AWQ!0LrO1G0mOOQO1G0^1G0^O$AlQ!0MxO1G0mPOOO-E<[-E<[POOO1G.h1G.hOOOO1G/i1G/iO$AvQ!bO,5<iO$BOQ!fO1G4jOOQO1G4p1G4pO%[QlO,5?OO$BYQ`O1G5zO$BbQ`O1G6YO$BjQ!fO1G6ZO9eQ`O,5?UO$BtQ!0MxO1G6WO%[QlO1G6WO$CUQ!0LrO1G6WO$CgQ`O1G6VO$CgQ`O1G6VO9eQ`O1G6VO$CoQ`O,5?XO9eQ`O,5?XOOQO,5?X,5?XO$DTQ`O,5?XO$+YQ`O,5?XOOQO-E<k-E<kOOQS1G0a1G0aOOQS1G0c1G0cO#.lQ`O1G0cOOQ[7+(e7+(eO!&zQMhO7+(eO%[QlO7+(eO$DcQ`O7+(eO$DnQMhO7+(eO$D|Q!0MzO,5=XO$GXQ!0MzO,5=ZO$IdQ!0MzO,5=XO$KuQ!0MzO,5=ZO$NWQ!0MzO,59uO%!]Q!0MzO,5<kO%$hQ!0MzO,5<mO%&sQ!0MzO,5<{OOQ!0Lf7+&a7+&aO%)UQ!0MxO7+&aO%)xQlO'#IfO%*VQ`O,5@cO%*_Q!fO,5@cOOQ!0Lf1G0P1G0PO%*iQ`O7+&jOOQ!0Lf7+&j7+&jO%*nQ?MtO,5:fO%[QlO7+&zO%*xQ?MtO,5:bO%+VQ?MtO,5:jO%+aQ?MtO,5:lO%+kQMhO'#IiO%+uQ`O,5@hOOQ!0Lh1G0d1G0dOOQO1G1r1G1rOOQO1G1s1G1sO%+}Q!jO,5<ZO!)[QlO,5<YOOQO-E<l-E<lOOQ!0Lf7+'Y7+'YOOOW7+'e7+'eOOOW1G1|1G1|O%,YQ`O1G1|OOQ!0Lf1G2O1G2OOOOO,59o,59oO%,_Q!dO,59oOOOO-E<`-E<`OOQ!0Lh1G/X1G/XO%,fQ!0MxO7+'kOOQ!0Lh,5?^,5?^O%-YQMhO1G2fP%-aQ`O'#IrPOQ!0Lh-E<p-E<pO%-}QMjO,5?aOOQ!0Lh-E<s-E<sO%.pQMjO,5?cOOQ!0Lh-E<u-E<uO%.zQ!dO1G2wO%/RQ!dO'#CrO%/iQMhO'#KSO$$wQlO'#JvOOQ!0Lh1G2_1G2_O%/sQ`O'#IqO%0[Q`O,5@vO%0[Q`O,5@vO%0dQ`O,5@vO%0oQ`O,5@vOOQO1G2a1G2aO%0}QMjO1G2`O$+YQ`O'#K[O!,TQMhO1G2`O%1_Q(CWO'#IsO%1lQ`O,5@wO!&zQMhO,5@wO%1tQ!dO,5@wOOQ!0Lh1G2d1G2dO%4UQ!fO'#CiO%4`Q`O,5=POOQ!0Lb,5<},5<}O%4hQpO,5<}OOQ!0Lb,5=O,5=OOCwQ`O,5<}O%4sQpO,5<}OOQ!0Lb,5=R,5=RO$+YQ`O,5=VOOQO,5?`,5?`OOQO-E<r-E<rOOQ!0Lp1G2h1G2hO#$`QpO,5<}O$$wQlO,5=PO%5RQ`O,5=OO%5^QpO,5=OO!,TQMhO'#IuO%6WQMjO1G2sO!,TQMhO'#IwO%6yQMjO1G2uO%7TQMjO1G5qO%7_QMjO1G5qOOQO,5?e,5?eOOQO-E<w-E<wOOQO1G.{1G.{O!,TQMhO1G5qO!,TQMhO1G5qO!:]QpO,59wO%[QlO,59wOOQ!0Lh,5<j,5<jO%7lQ`O1G2ZO!,TQMhO1G2bO%7qQ!0MxO7+'mOOQ!0Lf7+'m7+'mO!$wQlO7+'mO%8eQ`O,5;`OOQ!0Lb,5?g,5?gOOQ!0Lb-E<y-E<yO%8jQ!dO'#K^O#(ZQ`O7+(eO4UQ!fO7+(eO$DfQ`O7+(eO%8tQ!0MvO'#CiO%9XQ!0MvO,5=SO%9lQ`O,5=SO%9tQ`O,5=SOOQ!0Lb1G5o1G5oOOQ[7+$a7+$aO!ByQ!0LrO7+$aO!CUQpO7+$aO!$wQlO7+&aO%9yQ`O'#JQO%:bQ`O,5APOOQO1G3h1G3hO9kQ`O,5APO%:bQ`O,5APO%:jQ`O,5APOOQO,5?m,5?mOOQO-E=P-E=POOQ!0Lf7+'T7+'TO%:oQ`O7+)QO9uQ!0LrO7+)QO9kQ`O7+)QO@zQ`O7+)QO%:tQ`O7+)QOOQ[7+)Q7+)QOOQ[7+(p7+(pO%:yQ!0MvO7+(mO!&zQMhO7+(mO!E^Q`O7+(nOOQ[7+(n7+(nO!&zQMhO7+(nO%;TQ`O'#KbO%;`Q`O,5=lOOQO,5?i,5?iOOQO-E<{-E<{OOQ[7+(s7+(sO%<rQpO'#HZOOQ[1G3`1G3`O!&zQMhO1G3`O%[QlO1G3`O%<yQ`O1G3`O%=UQMhO1G3`O9uQ!0LrO1G3bO$%dQ`O1G3bO9`Q`O1G3bO!CUQpO1G3bO!C^QMhO1G3bO%=dQ`O'#JPO%=xQ`O,5@}O%>QQpO,5@}OOQ!0Lb1G3c1G3cOOQ[7+$V7+$VO@zQ`O7+$VO9uQ!0LrO7+$VO%>]Q`O7+$VO%[QlO1G6lO%[QlO1G6mO%>bQ!0LrO1G6lO%>lQlO1G3kO%>sQ`O1G3kO%>xQlO1G3kOOQ[7+)T7+)TO9uQ!0LrO7+)_O`QlO7+)aOOQ['#Kh'#KhOOQ['#JS'#JSO%?PQlO,5>`OOQ[,5>`,5>`O%[QlO'#HuO%?^Q`O'#HwOOQ[,5>f,5>fO9eQ`O,5>fOOQ[,5>h,5>hOOQ[7+)j7+)jOOQ[7+)p7+)pOOQ[7+)t7+)tOOQ[7+)v7+)vO%?cQpO1G5|O%?}Q?MtO1G0zO%@XQ`O1G0zOOQO1G/s1G/sO%@dQ?MtO1G/sO?YQ`O1G/sO!)[QlO'#DmOOQO,5?P,5?POOQO-E<c-E<cOOQO,5?V,5?VOOQO-E<i-E<iO!CUQpO1G/sOOQO-E<e-E<eOOQ!0Ln1G0]1G0]OOQ!0Lf7+%u7+%uO#(ZQ`O7+%uOOQ!0Lf7+&`7+&`O?YQ`O7+&`O!CUQpO7+&`OOQO7+%x7+%xO$AlQ!0MxO7+&XOOQO7+&X7+&XO%[QlO7+&XO%@nQ!0LrO7+&XO!ByQ!0LrO7+%xO!CUQpO7+%xO%@yQ!0LrO7+&XO%AXQ!0MxO7++rO%[QlO7++rO%AiQ`O7++qO%AiQ`O7++qOOQO1G4s1G4sO9eQ`O1G4sO%AqQ`O1G4sOOQS7+%}7+%}O#(ZQ`O<<LPO4UQ!fO<<LPO%BPQ`O<<LPOOQ[<<LP<<LPO!&zQMhO<<LPO%[QlO<<LPO%BXQ`O<<LPO%BdQ!0MzO,5?aO%DoQ!0MzO,5?cO%FzQ!0MzO1G2`O%I]Q!0MzO1G2sO%KhQ!0MzO1G2uO%MsQ!fO,5?QO%[QlO,5?QOOQO-E<d-E<dO%M}Q`O1G5}OOQ!0Lf<<JU<<JUO%NVQ?MtO1G0uO&!^Q?MtO1G1PO&!eQ?MtO1G1PO&$fQ?MtO1G1PO&$mQ?MtO1G1PO&&nQ?MtO1G1PO&(oQ?MtO1G1PO&(vQ?MtO1G1PO&(}Q?MtO1G1PO&+OQ?MtO1G1PO&+VQ?MtO1G1PO&+^Q!0MxO<<JfO&-UQ?MtO1G1PO&.RQ?MvO1G1PO&/UQ?MvO'#JlO&1[Q?MtO1G1cO&1iQ?MtO1G0UO&1sQMjO,5?TOOQO-E<g-E<gO!)[QlO'#FqOOQO'#KZ'#KZOOQO1G1u1G1uO&1}Q`O1G1tO&2SQ?MtO,5?[OOOW7+'h7+'hOOOO1G/Z1G/ZO&2^Q!dO1G4xOOQ!0Lh7+(Q7+(QP!&zQMhO,5?^O!,TQMhO7+(cO&2eQ`O,5?]O9eQ`O,5?]O$+YQ`O,5?]OOQO-E<o-E<oO&2sQ`O1G6bO&2sQ`O1G6bO&2{Q`O1G6bO&3WQMjO7+'zO&3hQ!dO,5?_O&3rQ`O,5?_O!&zQMhO,5?_OOQO-E<q-E<qO&3wQ!dO1G6cO&4RQ`O1G6cO&4ZQ`O1G2kO!&zQMhO1G2kOOQ!0Lb1G2i1G2iOOQ!0Lb1G2j1G2jO%4hQpO1G2iO!CUQpO1G2iOCwQ`O1G2iOOQ!0Lb1G2q1G2qO&4`QpO1G2iO&4nQ`O1G2kO$+YQ`O1G2jOCwQ`O1G2jO$$wQlO1G2kO&4vQ`O1G2jO&5jQMjO,5?aOOQ!0Lh-E<t-E<tO&6]QMjO,5?cOOQ!0Lh-E<v-E<vO!,TQMhO7++]O&6gQMjO7++]O&6qQMjO7++]OOQ!0Lh1G/c1G/cO&7OQ`O1G/cOOQ!0Lh7+'u7+'uO&7TQMjO7+'|O&7eQ!0MxO<<KXOOQ!0Lf<<KX<<KXO&8XQ`O1G0zO!&zQMhO'#IzO&8^Q`O,5@xO&:`Q!fO<<LPO!&zQMhO1G2nO&:gQ!0LrO1G2nOOQ[<<G{<<G{O!ByQ!0LrO<<G{O&:xQ!0MxO<<I{OOQ!0Lf<<I{<<I{OOQO,5?l,5?lO&;lQ`O,5?lO&;qQ`O,5?lOOQO-E=O-E=OO&<PQ`O1G6kO&<PQ`O1G6kO9kQ`O1G6kO@zQ`O<<LlOOQ[<<Ll<<LlO&<XQ`O<<LlO9uQ!0LrO<<LlO9kQ`O<<LlOOQ[<<LX<<LXO%:yQ!0MvO<<LXOOQ[<<LY<<LYO!E^Q`O<<LYO&<^QpO'#I|O&<iQ`O,5@|O!)[QlO,5@|OOQ[1G3W1G3WOOQO'#JO'#JOO9uQ!0LrO'#JOO&<qQpO,5=uOOQ[,5=u,5=uO&<xQpO'#EgO&=PQpO'#GeO&=UQ`O7+(zO&=ZQ`O7+(zOOQ[7+(z7+(zO!&zQMhO7+(zO%[QlO7+(zO&=cQ`O7+(zOOQ[7+(|7+(|O9uQ!0LrO7+(|O$%dQ`O7+(|O9`Q`O7+(|O!CUQpO7+(|O&=nQ`O,5?kOOQO-E<}-E<}OOQO'#H^'#H^O&=yQ`O1G6iO9uQ!0LrO<<GqOOQ[<<Gq<<GqO@zQ`O<<GqO&>RQ`O7+,WO&>WQ`O7+,XO%[QlO7+,WO%[QlO7+,XOOQ[7+)V7+)VO&>]Q`O7+)VO&>bQlO7+)VO&>iQ`O7+)VOOQ[<<Ly<<LyOOQ[<<L{<<L{OOQ[-E=Q-E=QOOQ[1G3z1G3zO&>nQ`O,5>aOOQ[,5>c,5>cO&>sQ`O1G4QO9eQ`O7+&fO!)[QlO7+&fOOQO7+%_7+%_O&>xQ?MtO1G6ZO?YQ`O7+%_OOQ!0Lf<<Ia<<IaOOQ!0Lf<<Iz<<IzO?YQ`O<<IzOOQO<<Is<<IsO$AlQ!0MxO<<IsO%[QlO<<IsOOQO<<Id<<IdO!ByQ!0LrO<<IdO&?SQ!0LrO<<IsO&?_Q!0MxO<= ^O&?oQ`O<= ]OOQO7+*_7+*_O9eQ`O7+*_OOQ[ANAkANAkO&?wQ!fOANAkO!&zQMhOANAkO#(ZQ`OANAkO4UQ!fOANAkO&@OQ`OANAkO%[QlOANAkO&@WQ!0MzO7+'zO&BiQ!0MzO,5?aO&DtQ!0MzO,5?cO&GPQ!0MzO7+'|O&IbQ!fO1G4lO&IlQ?MtO7+&aO&KpQ?MvO,5=XO&MwQ?MvO,5=ZO&NXQ?MvO,5=XO&NiQ?MvO,5=ZO&NyQ?MvO,59uO'#PQ?MvO,5<kO'%SQ?MvO,5<mO''hQ?MvO,5<{O')^Q?MtO7+'kO')kQ?MtO7+'mO')xQ`O,5<]OOQO7+'`7+'`OOQ!0Lh7+*d7+*dO')}QMjO<<K}OOQO1G4w1G4wO'*UQ`O1G4wO'*aQ`O1G4wO'*oQ`O7++|O'*oQ`O7++|O!&zQMhO1G4yO'*wQ!dO1G4yO'+RQ`O7++}O'+ZQ`O7+(VO'+fQ!dO7+(VOOQ!0Lb7+(T7+(TOOQ!0Lb7+(U7+(UO!CUQpO7+(TOCwQ`O7+(TO'+pQ`O7+(VO!&zQMhO7+(VO$+YQ`O7+(UO'+uQ`O7+(VOCwQ`O7+(UO'+}QMjO<<NwO!,TQMhO<<NwOOQ!0Lh7+$}7+$}O',XQ!dO,5?fOOQO-E<x-E<xO',cQ!0MvO7+(YO!&zQMhO7+(YOOQ[AN=gAN=gO9kQ`O1G5WOOQO1G5W1G5WO',sQ`O1G5WO',xQ`O7+,VO',xQ`O7+,VO9uQ!0LrOANBWO@zQ`OANBWOOQ[ANBWANBWO'-QQ`OANBWOOQ[ANAsANAsOOQ[ANAtANAtO'-VQ`O,5?hOOQO-E<z-E<zO'-bQ?MtO1G6hOOQO,5?j,5?jOOQO-E<|-E<|OOQ[1G3a1G3aO'-lQ`O,5=POOQ[<<Lf<<LfO!&zQMhO<<LfO&=UQ`O<<LfO'-qQ`O<<LfO%[QlO<<LfOOQ[<<Lh<<LhO9uQ!0LrO<<LhO$%dQ`O<<LhO9`Q`O<<LhO'-yQpO1G5VO'.UQ`O7+,TOOQ[AN=]AN=]O9uQ!0LrOAN=]OOQ[<= r<= rOOQ[<= s<= sO'.^Q`O<= rO'.cQ`O<= sOOQ[<<Lq<<LqO'.hQ`O<<LqO'.mQlO<<LqOOQ[1G3{1G3{O?YQ`O7+)lO'.tQ`O<<JQO'/PQ?MtO<<JQOOQO<<Hy<<HyOOQ!0LfAN?fAN?fOOQOAN?_AN?_O$AlQ!0MxOAN?_OOQOAN?OAN?OO%[QlOAN?_OOQO<<My<<MyOOQ[G27VG27VO!&zQMhOG27VO#(ZQ`OG27VO'/ZQ!fOG27VO4UQ!fOG27VO'/bQ`OG27VO'/jQ?MtO<<JfO'/wQ?MvO1G2`O'1mQ?MvO,5?aO'3pQ?MvO,5?cO'5sQ?MvO1G2sO'7vQ?MvO1G2uO'9yQ?MtO<<KXO':WQ?MtO<<I{OOQO1G1w1G1wO!,TQMhOANAiOOQO7+*c7+*cO':eQ`O7+*cO':pQ`O<= hO':xQ!dO7+*eOOQ!0Lb<<Kq<<KqO$+YQ`O<<KqOCwQ`O<<KqO';SQ`O<<KqO!&zQMhO<<KqOOQ!0Lb<<Ko<<KoO!CUQpO<<KoO';_Q!dO<<KqOOQ!0Lb<<Kp<<KpO';iQ`O<<KqO!&zQMhO<<KqO$+YQ`O<<KpO';nQMjOANDcO';xQ!0MvO<<KtOOQO7+*r7+*rO9kQ`O7+*rO'<YQ`O<= qOOQ[G27rG27rO9uQ!0LrOG27rO@zQ`OG27rO!)[QlO1G5SO'<bQ`O7+,SO'<jQ`O1G2kO&=UQ`OANBQOOQ[ANBQANBQO!&zQMhOANBQO'<oQ`OANBQOOQ[ANBSANBSO9uQ!0LrOANBSO$%dQ`OANBSOOQO'#H_'#H_OOQO7+*q7+*qOOQ[G22wG22wOOQ[ANE^ANE^OOQ[ANE_ANE_OOQ[ANB]ANB]O'<wQ`OANB]OOQ[<<MW<<MWO!)[QlOAN?lOOQOG24yG24yO$AlQ!0MxOG24yO#(ZQ`OLD,qOOQ[LD,qLD,qO!&zQMhOLD,qO'<|Q!fOLD,qO'=TQ?MvO7+'zO'>yQ?MvO,5?aO'@|Q?MvO,5?cO'CPQ?MvO7+'|O'DuQMjOG27TOOQO<<M}<<M}OOQ!0LbANA]ANA]O$+YQ`OANA]OCwQ`OANA]O'EVQ!dOANA]OOQ!0LbANAZANAZO'E^Q`OANA]O!&zQMhOANA]O'EiQ!dOANA]OOQ!0LbANA[ANA[OOQO<<N^<<N^OOQ[LD-^LD-^O9uQ!0LrOLD-^O'EsQ?MtO7+*nOOQO'#Gf'#GfOOQ[G27lG27lO&=UQ`OG27lO!&zQMhOG27lOOQ[G27nG27nO9uQ!0LrOG27nOOQ[G27wG27wO'E}Q?MtOG25WOOQOLD*eLD*eOOQ[!$(!]!$(!]O#(ZQ`O!$(!]O!&zQMhO!$(!]O'FXQ!0MzOG27TOOQ!0LbG26wG26wO$+YQ`OG26wO'HjQ`OG26wOCwQ`OG26wO'HuQ!dOG26wO!&zQMhOG26wOOQ[!$(!x!$(!xOOQ[LD-WLD-WO&=UQ`OLD-WOOQ[LD-YLD-YOOQ[!)9Ew!)9EwO#(ZQ`O!)9EwOOQ!0LbLD,cLD,cO$+YQ`OLD,cOCwQ`OLD,cO'H|Q`OLD,cO'IXQ!dOLD,cOOQ[!$(!r!$(!rOOQ[!.K;c!.K;cO'I`Q?MvOG27TOOQ!0Lb!$( }!$( }O$+YQ`O!$( }OCwQ`O!$( }O'KUQ`O!$( }OOQ!0Lb!)9Ei!)9EiO$+YQ`O!)9EiOCwQ`O!)9EiOOQ!0Lb!.K;T!.K;TO$+YQ`O!.K;TOOQ!0Lb!4/0o!4/0oO!)[QlO'#DzO1PQ`O'#EXO'KaQ!fO'#JrO'KhQ!L^O'#DvO'KoQlO'#EOO'KvQ!fO'#CiO'N^Q!fO'#CiO!)[QlO'#EQO'NnQlO,5;ZO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO,5;eO!)[QlO'#IpO(!qQ`O,5<iO!)[QlO,5;eO(!yQMhO,5;eO($dQMhO,5;eO!)[QlO,5;wO!&zQMhO'#GmO(!yQMhO'#GmO!&zQMhO'#GoO(!yQMhO'#GoO1SQ`O'#DZO1SQ`O'#DZO!&zQMhO'#GPO(!yQMhO'#GPO!&zQMhO'#GRO(!yQMhO'#GRO!&zQMhO'#GaO(!yQMhO'#GaO!)[QlO,5:jO($kQpO'#D_O($uQpO'#JvO!)[QlO,5@oO'NnQlO1G0uO(%PQ?MtO'#CiO!)[QlO1G2PO!&zQMhO'#IuO(!yQMhO'#IuO!&zQMhO'#IwO(!yQMhO'#IwO(%ZQ!dO'#CrO!&zQMhO,5<tO(!yQMhO,5<tO'NnQlO1G2RO!)[QlO7+&zO!&zQMhO1G2`O(!yQMhO1G2`O!&zQMhO'#IuO(!yQMhO'#IuO!&zQMhO'#IwO(!yQMhO'#IwO!&zQMhO1G2bO(!yQMhO1G2bO'NnQlO7+'mO'NnQlO7+&aO!&zQMhOANAiO(!yQMhOANAiO(%nQ`O'#EoO(%sQ`O'#EoO(%{Q`O'#F]O(&QQ`O'#EyO(&VQ`O'#KTO(&bQ`O'#KRO(&mQ`O,5;ZO(&rQMjO,5<eO(&yQ`O'#GYO('OQ`O'#GYO('TQ`O,5<eO(']Q`O,5<gO('eQ`O,5;ZO('mQ?MtO1G1`O('tQ`O,5<tO('yQ`O,5<tO((OQ`O,5<vO((TQ`O,5<vO((YQ`O1G2RO((_Q`O1G0uO((dQMjO<<K}O((kQMjO<<K}O((rQMhO'#F|O9`Q`O'#F{OAuQ`O'#EnO!)[QlO,5;tO!3oQ`O'#GYO!3oQ`O'#GYO!3oQ`O'#G[O!3oQ`O'#G[O!,TQMhO7+(cO!,TQMhO7+(cO%.zQ!dO1G2wO%.zQ!dO1G2wO!&zQMhO,5=]O!&zQMhO,5=]",
  stateData: "()x~O'|OS'}OSTOS(ORQ~OPYOQYOSfOY!VOaqOdzOeyOl!POpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_XO!iuO!lZO!oYO!pYO!qYO!svO!uwO!xxO!|]O$W|O$niO%h}O%j!QO%l!OO%m!OO%n!OO%q!RO%s!SO%v!TO%w!TO%y!UO&W!WO&^!XO&`!YO&b!ZO&d![O&g!]O&m!^O&s!_O&u!`O&w!aO&y!bO&{!cO(TSO(VTO(YUO(aVO(o[O~OWtO~P`OPYOQYOSfOd!jOe!iOpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_!eO!iuO!lZO!oYO!pYO!qYO!svO!u!gO!x!hO$W!kO$niO(T!dO(VTO(YUO(aVO(o[O~Oa!wOs!nO!S!oO!b!yO!c!vO!d!vO!|<VO#T!pO#U!pO#V!xO#W!pO#X!pO#[!zO#]!zO(U!lO(VTO(YUO(e!mO(o!sO~O(O!{O~OP]XR]X[]Xa]Xj]Xr]X!Q]X!S]X!]]X!l]X!p]X#R]X#S]X#`]X#kfX#n]X#o]X#p]X#q]X#r]X#s]X#t]X#u]X#v]X#x]X#z]X#{]X$Q]X'z]X(a]X(r]X(y]X(z]X~O!g%RX~P(qO_!}O(V#PO(W!}O(X#PO~O_#QO(X#PO(Y#PO(Z#QO~Ox#SO!U#TO(b#TO(c#VO~OPYOQYOSfOd!jOe!iOpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_!eO!iuO!lZO!oYO!pYO!qYO!svO!u!gO!x!hO$W!kO$niO(T<ZO(VTO(YUO(aVO(o[O~O![#ZO!]#WO!Y(hP!Y(vP~P+}O!^#cO~P`OPYOQYOSfOd!jOe!iOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_!eO!iuO!lZO!oYO!pYO!qYO!svO!u!gO!x!hO$W!kO$niO(VTO(YUO(aVO(o[O~Op#mO![#iO!|]O#i#lO#j#iO(T<[O!k(sP~P.iO!l#oO(T#nO~O!x#sO!|]O%h#tO~O#k#uO~O!g#vO#k#uO~OP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!]$_O!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO#v$SO#x$UO#z$WO#{$XO(aVO(r$YO(y#|O(z#}O~Oa(fX'z(fX'w(fX!k(fX!Y(fX!_(fX%i(fX!g(fX~P1qO#S$dO#`$eO$Q$eOP(gXR(gX[(gXj(gXr(gX!Q(gX!S(gX!](gX!l(gX!p(gX#R(gX#n(gX#o(gX#p(gX#q(gX#r(gX#s(gX#t(gX#u(gX#v(gX#x(gX#z(gX#{(gX(a(gX(r(gX(y(gX(z(gX!_(gX%i(gX~Oa(gX'z(gX'w(gX!Y(gX!k(gXv(gX!g(gX~P4UO#`$eO~O$]$hO$_$gO$f$mO~OSfO!_$nO$i$oO$k$qO~Oh%VOj%dOk%dOp%WOr%XOs$tOt$tOz%YO|%ZO!O%]O!S${O!_$|O!i%bO!l$xO#j%cO$W%`O$t%^O$v%_O$y%aO(T$sO(VTO(YUO(a$uO(y$}O(z%POg(^P~Ol%[O~P7eO!l%eO~O!S%hO!_%iO(T%gO~O!g%mO~Oa%nO'z%nO~O!Q%rO~P%[O(U!lO~P%[O%n%vO~P%[Oh%VO!l%eO(T%gO(U!lO~Oe%}O!l%eO(T%gO~Oj$RO~O!_&PO(T%gO(U!lO(VTO(YUO`)WP~O!Q&SO!l&RO%j&VO&T&WO~P;SO!x#sO~O%s&YO!S)SX!_)SX(T)SX~O(T&ZO~Ol!PO!u&`O%j!QO%l!OO%m!OO%n!OO%q!RO%s!SO%v!TO%w!TO~Od&eOe&dO!x&bO%h&cO%{&aO~P<bOd&hOeyOl!PO!_&gO!u&`O!xxO!|]O%h}O%l!OO%m!OO%n!OO%q!RO%s!SO%v!TO%w!TO%y!UO~Ob&kO#`&nO%j&iO(U!lO~P=gO!l&oO!u&sO~O!l#oO~O!_XO~Oa%nO'x&{O'z%nO~Oa%nO'x'OO'z%nO~Oa%nO'x'QO'z%nO~O'w]X!Y]Xv]X!k]X&[]X!_]X%i]X!g]X~P(qO!b'_O!c'WO!d'WO(U!lO(VTO(YUO~Os'UO!S'TO!['XO(e'SO!^(iP!^(xP~P@nOn'bO!_'`O(T%gO~Oe'gO!l%eO(T%gO~O!Q&SO!l&RO~Os!nO!S!oO!|<VO#T!pO#U!pO#W!pO#X!pO(U!lO(VTO(YUO(e!mO(o!sO~O!b'mO!c'lO!d'lO#V!pO#['nO#]'nO~PBYOa%nOh%VO!g#vO!l%eO'z%nO(r'pO~O!p'tO#`'rO~PChOs!nO!S!oO(VTO(YUO(e!mO(o!sO~O!_XOs(mX!S(mX!b(mX!c(mX!d(mX!|(mX#T(mX#U(mX#V(mX#W(mX#X(mX#[(mX#](mX(U(mX(V(mX(Y(mX(e(mX(o(mX~O!c'lO!d'lO(U!lO~PDWO(P'xO(Q'xO(R'zO~O_!}O(V'|O(W!}O(X'|O~O_#QO(X'|O(Y'|O(Z#QO~Ov(OO~P%[Ox#SO!U#TO(b#TO(c(RO~O![(TO!Y'WX!Y'^X!]'WX!]'^X~P+}O!](VO!Y(hX~OP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!](VO!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO#v$SO#x$UO#z$WO#{$XO(aVO(r$YO(y#|O(z#}O~O!Y(hX~PHRO!Y([O~O!Y(uX!](uX!g(uX!k(uX(r(uX~O#`(uX#k#dX!^(uX~PJUO#`(]O!Y(wX!](wX~O!](^O!Y(vX~O!Y(aO~O#`$eO~PJUO!^(bO~P`OR#zO!Q#yO!S#{O!l#xO(aVOP!na[!naj!nar!na!]!na!p!na#R!na#n!na#o!na#p!na#q!na#r!na#s!na#t!na#u!na#v!na#x!na#z!na#{!na(r!na(y!na(z!na~Oa!na'z!na'w!na!Y!na!k!nav!na!_!na%i!na!g!na~PKlO!k(cO~O!g#vO#`(dO(r'pO!](tXa(tX'z(tX~O!k(tX~PNXO!S%hO!_%iO!|]O#i(iO#j(hO(T%gO~O!](jO!k(sX~O!k(lO~O!S%hO!_%iO#j(hO(T%gO~OP(gXR(gX[(gXj(gXr(gX!Q(gX!S(gX!](gX!l(gX!p(gX#R(gX#n(gX#o(gX#p(gX#q(gX#r(gX#s(gX#t(gX#u(gX#v(gX#x(gX#z(gX#{(gX(a(gX(r(gX(y(gX(z(gX~O!g#vO!k(gX~P! uOR(nO!Q(mO!l#xO#S$dO!|!{a!S!{a~O!x!{a%h!{a!_!{a#i!{a#j!{a(T!{a~P!#vO!x(rO~OPYOQYOSfOd!jOe!iOpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_XO!iuO!lZO!oYO!pYO!qYO!svO!u!gO!x!hO$W!kO$niO(T!dO(VTO(YUO(aVO(o[O~Oh%VOp%WOr%XOs$tOt$tOz%YO|%ZO!O<sO!S${O!_$|O!i>VO!l$xO#j<yO$W%`O$t<uO$v<wO$y%aO(T(vO(VTO(YUO(a$uO(y$}O(z%PO~O#k(xO~O![(zO!k(kP~P%[O(e(|O(o[O~O!S)OO!l#xO(e(|O(o[O~OP<UOQ<UOSfOd>ROe!iOpkOr<UOskOtkOzkO|<UO!O<UO!SWO!WkO!XkO!_!eO!i<XO!lZO!o<UO!p<UO!q<UO!s<YO!u<]O!x!hO$W!kO$n>PO(T)]O(VTO(YUO(aVO(o[O~O!]$_Oa$qa'z$qa'w$qa!k$qa!Y$qa!_$qa%i$qa!g$qa~Ol)dO~P!&zOh%VOp%WOr%XOs$tOt$tOz%YO|%ZO!O%]O!S${O!_$|O!i%bO!l$xO#j%cO$W%`O$t%^O$v%_O$y%aO(T(vO(VTO(YUO(a$uO(y$}O(z%PO~Og(pP~P!,TO!Q)iO!g)hO!_$^X$Z$^X$]$^X$_$^X$f$^X~O!g)hO!_({X$Z({X$]({X$_({X$f({X~O!Q)iO~P!.^O!Q)iO!_({X$Z({X$]({X$_({X$f({X~O!_)kO$Z)oO$])jO$_)jO$f)pO~O![)sO~P!)[O$]$hO$_$gO$f)wO~On$zX!Q$zX#S$zX'y$zX(y$zX(z$zX~OgmXg$zXnmX!]mX#`mX~P!0SOx)yO(b)zO(c)|O~On*VO!Q*OO'y*PO(y$}O(z%PO~Og)}O~P!1WOg*WO~Oh%VOr%XOs$tOt$tOz%YO|%ZO!O<sO!S*YO!_*ZO!i>VO!l$xO#j<yO$W%`O$t<uO$v<wO$y%aO(VTO(YUO(a$uO(y$}O(z%PO~Op*`O![*^O(T*XO!k)OP~P!1uO#k*aO~O!l*bO~Oh%VOp%WOr%XOs$tOt$tOz%YO|%ZO!O<sO!S${O!_$|O!i>VO!l$xO#j<yO$W%`O$t<uO$v<wO$y%aO(T*dO(VTO(YUO(a$uO(y$}O(z%PO~O![*gO!Y)PP~P!3tOr*sOs!nO!S*iO!b*qO!c*kO!d*kO!l*bO#[*rO%`*mO(U!lO(VTO(YUO(e!mO~O!^*pO~P!5iO#S$dOn(`X!Q(`X'y(`X(y(`X(z(`X!](`X#`(`X~Og(`X$O(`X~P!6kOn*xO#`*wOg(_X!](_X~O!]*yOg(^X~Oj%dOk%dOl%dO(T&ZOg(^P~Os*|O~Og)}O(T&ZO~O!l+SO~O(T(vO~Op+WO!S%hO![#iO!_%iO!|]O#i#lO#j#iO(T%gO!k(sP~O!g#vO#k+XO~O!S%hO![+ZO!](^O!_%iO(T%gO!Y(vP~Os'[O!S+]O![+[O(VTO(YUO(e(|O~O!^(xP~P!9|O!]+^Oa)TX'z)TX~OP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO#v$SO#x$UO#z$WO#{$XO(aVO(r$YO(y#|O(z#}O~Oa!ja!]!ja'z!ja'w!ja!Y!ja!k!jav!ja!_!ja%i!ja!g!ja~P!:tOR#zO!Q#yO!S#{O!l#xO(aVOP!ra[!raj!rar!ra!]!ra!p!ra#R!ra#n!ra#o!ra#p!ra#q!ra#r!ra#s!ra#t!ra#u!ra#v!ra#x!ra#z!ra#{!ra(r!ra(y!ra(z!ra~Oa!ra'z!ra'w!ra!Y!ra!k!rav!ra!_!ra%i!ra!g!ra~P!=[OR#zO!Q#yO!S#{O!l#xO(aVOP!ta[!taj!tar!ta!]!ta!p!ta#R!ta#n!ta#o!ta#p!ta#q!ta#r!ta#s!ta#t!ta#u!ta#v!ta#x!ta#z!ta#{!ta(r!ta(y!ta(z!ta~Oa!ta'z!ta'w!ta!Y!ta!k!tav!ta!_!ta%i!ta!g!ta~P!?rOh%VOn+gO!_'`O%i+fO~O!g+iOa(]X!_(]X'z(]X!](]X~Oa%nO!_XO'z%nO~Oh%VO!l%eO~Oh%VO!l%eO(T%gO~O!g#vO#k(xO~Ob+tO%j+uO(T+qO(VTO(YUO!^)XP~O!]+vO`)WX~O[+zO~O`+{O~O!_&PO(T%gO(U!lO`)WP~O%j,OO~P;SOh%VO#`,SO~Oh%VOn,VO!_$|O~O!_,XO~O!Q,ZO!_XO~O%n%vO~O!x,`O~Oe,eO~Ob,fO(T#nO(VTO(YUO!^)VP~Oe%}O~O%j!QO(T&ZO~P=gO[,kO`,jO~OPYOQYOSfOdzOeyOpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!iuO!lZO!oYO!pYO!qYO!svO!xxO!|]O$niO%h}O(VTO(YUO(aVO(o[O~O!_!eO!u!gO$W!kO(T!dO~P!FyO`,jOa%nO'z%nO~OPYOQYOSfOd!jOe!iOpkOrYOskOtkOzkO|YO!OYO!SWO!WkO!XkO!_!eO!iuO!lZO!oYO!pYO!qYO!svO!x!hO$W!kO$niO(T!dO(VTO(YUO(aVO(o[O~Oa,pOl!OO!uwO%l!OO%m!OO%n!OO~P!IcO!l&oO~O&^,vO~O!_,xO~O&o,zO&q,{OP&laQ&laS&laY&laa&lad&lae&lal&lap&lar&las&lat&laz&la|&la!O&la!S&la!W&la!X&la!_&la!i&la!l&la!o&la!p&la!q&la!s&la!u&la!x&la!|&la$W&la$n&la%h&la%j&la%l&la%m&la%n&la%q&la%s&la%v&la%w&la%y&la&W&la&^&la&`&la&b&la&d&la&g&la&m&la&s&la&u&la&w&la&y&la&{&la'w&la(T&la(V&la(Y&la(a&la(o&la!^&la&e&lab&la&j&la~O(T-QO~Oh!eX!]!RX!^!RX!g!RX!g!eX!l!eX#`!RX~O!]!eX!^!eX~P#!iO!g-VO#`-UOh(jX!]#hX!^#hX!g(jX!l(jX~O!](jX!^(jX~P##[Oh%VO!g-XO!l%eO!]!aX!^!aX~Os!nO!S!oO(VTO(YUO(e!mO~OP<UOQ<UOSfOd>ROe!iOpkOr<UOskOtkOzkO|<UO!O<UO!SWO!WkO!XkO!_!eO!i<XO!lZO!o<UO!p<UO!q<UO!s<YO!u<]O!x!hO$W!kO$n>PO(VTO(YUO(aVO(o[O~O(T=QO~P#$qO!]-]O!^(iX~O!^-_O~O!g-VO#`-UO!]#hX!^#hX~O!]-`O!^(xX~O!^-bO~O!c-cO!d-cO(U!lO~P#$`O!^-fO~P'_On-iO!_'`O~O!Y-nO~Os!{a!b!{a!c!{a!d!{a#T!{a#U!{a#V!{a#W!{a#X!{a#[!{a#]!{a(U!{a(V!{a(Y!{a(e!{a(o!{a~P!#vO!p-sO#`-qO~PChO!c-uO!d-uO(U!lO~PDWOa%nO#`-qO'z%nO~Oa%nO!g#vO#`-qO'z%nO~Oa%nO!g#vO!p-sO#`-qO'z%nO(r'pO~O(P'xO(Q'xO(R-zO~Ov-{O~O!Y'Wa!]'Wa~P!:tO![.PO!Y'WX!]'WX~P%[O!](VO!Y(ha~O!Y(ha~PHRO!](^O!Y(va~O!S%hO![.TO!_%iO(T%gO!Y'^X!]'^X~O#`.VO!](ta!k(taa(ta'z(ta~O!g#vO~P#,wO!](jO!k(sa~O!S%hO!_%iO#j.ZO(T%gO~Op.`O!S%hO![.]O!_%iO!|]O#i._O#j.]O(T%gO!]'aX!k'aX~OR.dO!l#xO~Oh%VOn.gO!_'`O%i.fO~Oa#ci!]#ci'z#ci'w#ci!Y#ci!k#civ#ci!_#ci%i#ci!g#ci~P!:tOn>]O!Q*OO'y*PO(y$}O(z%PO~O#k#_aa#_a#`#_a'z#_a!]#_a!k#_a!_#_a!Y#_a~P#/sO#k(`XP(`XR(`X[(`Xa(`Xj(`Xr(`X!S(`X!l(`X!p(`X#R(`X#n(`X#o(`X#p(`X#q(`X#r(`X#s(`X#t(`X#u(`X#v(`X#x(`X#z(`X#{(`X'z(`X(a(`X(r(`X!k(`X!Y(`X'w(`Xv(`X!_(`X%i(`X!g(`X~P!6kO!].tO!k(kX~P!:tO!k.wO~O!Y.yO~OP$[OR#zO!Q#yO!S#{O!l#xO!p$[O(aVO[#mia#mij#mir#mi!]#mi#R#mi#o#mi#p#mi#q#mi#r#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi'z#mi(r#mi(y#mi(z#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~O#n#mi~P#3cO#n$OO~P#3cOP$[OR#zOr$aO!Q#yO!S#{O!l#xO!p$[O#n$OO#o$PO#p$PO#q$PO(aVO[#mia#mij#mi!]#mi#R#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi'z#mi(r#mi(y#mi(z#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~O#r#mi~P#6QO#r$QO~P#6QOP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO(aVOa#mi!]#mi#x#mi#z#mi#{#mi'z#mi(r#mi(y#mi(z#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~O#v#mi~P#8oOP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO#v$SO(aVO(z#}Oa#mi!]#mi#z#mi#{#mi'z#mi(r#mi(y#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~O#x$UO~P#;VO#x#mi~P#;VO#v$SO~P#8oOP$[OR#zO[$cOj$ROr$aO!Q#yO!S#{O!l#xO!p$[O#R$RO#n$OO#o$PO#p$PO#q$PO#r$QO#s$RO#t$RO#u$bO#v$SO#x$UO(aVO(y#|O(z#}Oa#mi!]#mi#{#mi'z#mi(r#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~O#z#mi~P#={O#z$WO~P#={OP]XR]X[]Xj]Xr]X!Q]X!S]X!l]X!p]X#R]X#S]X#`]X#kfX#n]X#o]X#p]X#q]X#r]X#s]X#t]X#u]X#v]X#x]X#z]X#{]X$Q]X(a]X(r]X(y]X(z]X!]]X!^]X~O$O]X~P#@jOP$[OR#zO[<mOj<bOr<kO!Q#yO!S#{O!l#xO!p$[O#R<bO#n<_O#o<`O#p<`O#q<`O#r<aO#s<bO#t<bO#u<lO#v<cO#x<eO#z<gO#{<hO(aVO(r$YO(y#|O(z#}O~O$O.{O~P#BwO#S$dO#`<nO$Q<nO$O(gX!^(gX~P! uOa'da!]'da'z'da'w'da!k'da!Y'dav'da!_'da%i'da!g'da~P!:tO[#mia#mij#mir#mi!]#mi#R#mi#r#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi'z#mi(r#mi'w#mi!Y#mi!k#miv#mi!_#mi%i#mi!g#mi~OP$[OR#zO!Q#yO!S#{O!l#xO!p$[O#n$OO#o$PO#p$PO#q$PO(aVO(y#mi(z#mi~P#EyOn>]O!Q*OO'y*PO(y$}O(z%POP#miR#mi!S#mi!l#mi!p#mi#n#mi#o#mi#p#mi#q#mi(a#mi~P#EyO!]/POg(pX~P!1WOg/RO~Oa$Pi!]$Pi'z$Pi'w$Pi!Y$Pi!k$Piv$Pi!_$Pi%i$Pi!g$Pi~P!:tO$]/SO$_/SO~O$]/TO$_/TO~O!g)hO#`/UO!_$cX$Z$cX$]$cX$_$cX$f$cX~O![/VO~O!_)kO$Z/XO$])jO$_)jO$f/YO~O!]<iO!^(fX~P#BwO!^/ZO~O!g)hO$f({X~O$f/]O~Ov/^O~P!&zOx)yO(b)zO(c/aO~O!S/dO~O(y$}On%aa!Q%aa'y%aa(z%aa!]%aa#`%aa~Og%aa$O%aa~P#L{O(z%POn%ca!Q%ca'y%ca(y%ca!]%ca#`%ca~Og%ca$O%ca~P#MnO!]fX!gfX!kfX!k$zX(rfX~P!0SOp%WO![/mO!](^O(T/lO!Y(vP!Y)PP~P!1uOr*sO!b*qO!c*kO!d*kO!l*bO#[*rO%`*mO(U!lO(VTO(YUO~Os<}O!S/nO![+[O!^*pO(e<|O!^(xP~P$ [O!k/oO~P#/sO!]/pO!g#vO(r'pO!k)OX~O!k/uO~OnoX!QoX'yoX(yoX(zoX~O!g#vO!koX~P$#OOp/wO!S%hO![*^O!_%iO(T%gO!k)OP~O#k/xO~O!Y$zX!]$zX!g%RX~P!0SO!]/yO!Y)PX~P#/sO!g/{O~O!Y/}O~OpkO(T0OO~P.iOh%VOr0TO!g#vO!l%eO(r'pO~O!g+iO~Oa%nO!]0XO'z%nO~O!^0ZO~P!5iO!c0[O!d0[O(U!lO~P#$`Os!nO!S0]O(VTO(YUO(e!mO~O#[0_O~Og%aa!]%aa#`%aa$O%aa~P!1WOg%ca!]%ca#`%ca$O%ca~P!1WOj%dOk%dOl%dO(T&ZOg'mX!]'mX~O!]*yOg(^a~Og0hO~On0jO#`0iOg(_a!](_a~OR0kO!Q0kO!S0lO#S$dOn}a'y}a(y}a(z}a!]}a#`}a~Og}a$O}a~P$(cO!Q*OO'y*POn$sa(y$sa(z$sa!]$sa#`$sa~Og$sa$O$sa~P$)_O!Q*OO'y*POn$ua(y$ua(z$ua!]$ua#`$ua~Og$ua$O$ua~P$*QO#k0oO~Og%Ta!]%Ta#`%Ta$O%Ta~P!1WO!g#vO~O#k0rO~O!]+^Oa)Ta'z)Ta~OR#zO!Q#yO!S#{O!l#xO(aVOP!ri[!rij!rir!ri!]!ri!p!ri#R!ri#n!ri#o!ri#p!ri#q!ri#r!ri#s!ri#t!ri#u!ri#v!ri#x!ri#z!ri#{!ri(r!ri(y!ri(z!ri~Oa!ri'z!ri'w!ri!Y!ri!k!riv!ri!_!ri%i!ri!g!ri~P$+oOh%VOr%XOs$tOt$tOz%YO|%ZO!O<sO!S${O!_$|O!i>VO!l$xO#j<yO$W%`O$t<uO$v<wO$y%aO(VTO(YUO(a$uO(y$}O(z%PO~Op0{O%]0|O(T0zO~P$.VO!g+iOa(]a!_(]a'z(]a!](]a~O#k1SO~O[]X!]fX!^fX~O!]1TO!^)XX~O!^1VO~O[1WO~Ob1YO(T+qO(VTO(YUO~O!_&PO(T%gO`'uX!]'uX~O!]+vO`)Wa~O!k1]O~P!:tO[1`O~O`1aO~O#`1fO~On1iO!_$|O~O(e(|O!^)UP~Oh%VOn1rO!_1oO%i1qO~O[1|O!]1zO!^)VX~O!^1}O~O`2POa%nO'z%nO~O(T#nO(VTO(YUO~O#S$dO#`$eO$Q$eOP(gXR(gX[(gXr(gX!Q(gX!S(gX!](gX!l(gX!p(gX#R(gX#n(gX#o(gX#p(gX#q(gX#r(gX#s(gX#t(gX#u(gX#v(gX#x(gX#z(gX#{(gX(a(gX(r(gX(y(gX(z(gX~Oj2SO&[2TOa(gX~P$3pOj2SO#`$eO&[2TO~Oa2VO~P%[Oa2XO~O&e2[OP&ciQ&ciS&ciY&cia&cid&cie&cil&cip&cir&cis&cit&ciz&ci|&ci!O&ci!S&ci!W&ci!X&ci!_&ci!i&ci!l&ci!o&ci!p&ci!q&ci!s&ci!u&ci!x&ci!|&ci$W&ci$n&ci%h&ci%j&ci%l&ci%m&ci%n&ci%q&ci%s&ci%v&ci%w&ci%y&ci&W&ci&^&ci&`&ci&b&ci&d&ci&g&ci&m&ci&s&ci&u&ci&w&ci&y&ci&{&ci'w&ci(T&ci(V&ci(Y&ci(a&ci(o&ci!^&cib&ci&j&ci~Ob2bO!^2`O&j2aO~P`O!_XO!l2dO~O&q,{OP&liQ&liS&liY&lia&lid&lie&lil&lip&lir&lis&lit&liz&li|&li!O&li!S&li!W&li!X&li!_&li!i&li!l&li!o&li!p&li!q&li!s&li!u&li!x&li!|&li$W&li$n&li%h&li%j&li%l&li%m&li%n&li%q&li%s&li%v&li%w&li%y&li&W&li&^&li&`&li&b&li&d&li&g&li&m&li&s&li&u&li&w&li&y&li&{&li'w&li(T&li(V&li(Y&li(a&li(o&li!^&li&e&lib&li&j&li~O!Y2jO~O!]!aa!^!aa~P#BwOs!nO!S!oO![2pO(e!mO!]'XX!^'XX~P@nO!]-]O!^(ia~O!]'_X!^'_X~P!9|O!]-`O!^(xa~O!^2wO~P'_Oa%nO#`3QO'z%nO~Oa%nO!g#vO#`3QO'z%nO~Oa%nO!g#vO!p3UO#`3QO'z%nO(r'pO~Oa%nO'z%nO~P!:tO!]$_Ov$qa~O!Y'Wi!]'Wi~P!:tO!](VO!Y(hi~O!](^O!Y(vi~O!Y(wi!](wi~P!:tO!](ti!k(tia(ti'z(ti~P!:tO#`3WO!](ti!k(tia(ti'z(ti~O!](jO!k(si~O!S%hO!_%iO!|]O#i3]O#j3[O(T%gO~O!S%hO!_%iO#j3[O(T%gO~On3dO!_'`O%i3cO~Oh%VOn3dO!_'`O%i3cO~O#k%aaP%aaR%aa[%aaa%aaj%aar%aa!S%aa!l%aa!p%aa#R%aa#n%aa#o%aa#p%aa#q%aa#r%aa#s%aa#t%aa#u%aa#v%aa#x%aa#z%aa#{%aa'z%aa(a%aa(r%aa!k%aa!Y%aa'w%aav%aa!_%aa%i%aa!g%aa~P#L{O#k%caP%caR%ca[%caa%caj%car%ca!S%ca!l%ca!p%ca#R%ca#n%ca#o%ca#p%ca#q%ca#r%ca#s%ca#t%ca#u%ca#v%ca#x%ca#z%ca#{%ca'z%ca(a%ca(r%ca!k%ca!Y%ca'w%cav%ca!_%ca%i%ca!g%ca~P#MnO#k%aaP%aaR%aa[%aaa%aaj%aar%aa!S%aa!]%aa!l%aa!p%aa#R%aa#n%aa#o%aa#p%aa#q%aa#r%aa#s%aa#t%aa#u%aa#v%aa#x%aa#z%aa#{%aa'z%aa(a%aa(r%aa!k%aa!Y%aa'w%aa#`%aav%aa!_%aa%i%aa!g%aa~P#/sO#k%caP%caR%ca[%caa%caj%car%ca!S%ca!]%ca!l%ca!p%ca#R%ca#n%ca#o%ca#p%ca#q%ca#r%ca#s%ca#t%ca#u%ca#v%ca#x%ca#z%ca#{%ca'z%ca(a%ca(r%ca!k%ca!Y%ca'w%ca#`%cav%ca!_%ca%i%ca!g%ca~P#/sO#k}aP}a[}aa}aj}ar}a!l}a!p}a#R}a#n}a#o}a#p}a#q}a#r}a#s}a#t}a#u}a#v}a#x}a#z}a#{}a'z}a(a}a(r}a!k}a!Y}a'w}av}a!_}a%i}a!g}a~P$(cO#k$saP$saR$sa[$saa$saj$sar$sa!S$sa!l$sa!p$sa#R$sa#n$sa#o$sa#p$sa#q$sa#r$sa#s$sa#t$sa#u$sa#v$sa#x$sa#z$sa#{$sa'z$sa(a$sa(r$sa!k$sa!Y$sa'w$sav$sa!_$sa%i$sa!g$sa~P$)_O#k$uaP$uaR$ua[$uaa$uaj$uar$ua!S$ua!l$ua!p$ua#R$ua#n$ua#o$ua#p$ua#q$ua#r$ua#s$ua#t$ua#u$ua#v$ua#x$ua#z$ua#{$ua'z$ua(a$ua(r$ua!k$ua!Y$ua'w$uav$ua!_$ua%i$ua!g$ua~P$*QO#k%TaP%TaR%Ta[%Taa%Taj%Tar%Ta!S%Ta!]%Ta!l%Ta!p%Ta#R%Ta#n%Ta#o%Ta#p%Ta#q%Ta#r%Ta#s%Ta#t%Ta#u%Ta#v%Ta#x%Ta#z%Ta#{%Ta'z%Ta(a%Ta(r%Ta!k%Ta!Y%Ta'w%Ta#`%Tav%Ta!_%Ta%i%Ta!g%Ta~P#/sOa#cq!]#cq'z#cq'w#cq!Y#cq!k#cqv#cq!_#cq%i#cq!g#cq~P!:tO![3lO!]'YX!k'YX~P%[O!].tO!k(ka~O!].tO!k(ka~P!:tO!Y3oO~O$O!na!^!na~PKlO$O!ja!]!ja!^!ja~P#BwO$O!ra!^!ra~P!=[O$O!ta!^!ta~P!?rOg']X!]']X~P!,TO!]/POg(pa~OSfO!_4TO$d4UO~O!^4YO~Ov4ZO~P#/sOa$mq!]$mq'z$mq'w$mq!Y$mq!k$mqv$mq!_$mq%i$mq!g$mq~P!:tO!Y4]O~P!&zO!S4^O~O!Q*OO'y*PO(z%POn'ia(y'ia!]'ia#`'ia~Og'ia$O'ia~P%-fO!Q*OO'y*POn'ka(y'ka(z'ka!]'ka#`'ka~Og'ka$O'ka~P%.XO(r$YO~P#/sO!YfX!Y$zX!]fX!]$zX!g%RX#`fX~P!0SOp%WO(T=WO~P!1uOp4bO!S%hO![4aO!_%iO(T%gO!]'eX!k'eX~O!]/pO!k)Oa~O!]/pO!g#vO!k)Oa~O!]/pO!g#vO(r'pO!k)Oa~Og$|i!]$|i#`$|i$O$|i~P!1WO![4jO!Y'gX!]'gX~P!3tO!]/yO!Y)Pa~O!]/yO!Y)Pa~P#/sOP]XR]X[]Xj]Xr]X!Q]X!S]X!Y]X!]]X!l]X!p]X#R]X#S]X#`]X#kfX#n]X#o]X#p]X#q]X#r]X#s]X#t]X#u]X#v]X#x]X#z]X#{]X$Q]X(a]X(r]X(y]X(z]X~Oj%YX!g%YX~P%2OOj4oO!g#vO~Oh%VO!g#vO!l%eO~Oh%VOr4tO!l%eO(r'pO~Or4yO!g#vO(r'pO~Os!nO!S4zO(VTO(YUO(e!mO~O(y$}On%ai!Q%ai'y%ai(z%ai!]%ai#`%ai~Og%ai$O%ai~P%5oO(z%POn%ci!Q%ci'y%ci(y%ci!]%ci#`%ci~Og%ci$O%ci~P%6bOg(_i!](_i~P!1WO#`5QOg(_i!](_i~P!1WO!k5VO~Oa$oq!]$oq'z$oq'w$oq!Y$oq!k$oqv$oq!_$oq%i$oq!g$oq~P!:tO!Y5ZO~O!]5[O!_)QX~P#/sOa$zX!_$zX%^]X'z$zX!]$zX~P!0SO%^5_OaoX!_oX'zoX!]oX~P$#OOp5`O(T#nO~O%^5_O~Ob5fO%j5gO(T+qO(VTO(YUO!]'tX!^'tX~O!]1TO!^)Xa~O[5kO~O`5lO~O[5pO~Oa%nO'z%nO~P#/sO!]5uO#`5wO!^)UX~O!^5xO~Or6OOs!nO!S*iO!b!yO!c!vO!d!vO!|<VO#T!pO#U!pO#V!pO#W!pO#X!pO#[5}O#]!zO(U!lO(VTO(YUO(e!mO(o!sO~O!^5|O~P%;eOn6TO!_1oO%i6SO~Oh%VOn6TO!_1oO%i6SO~Ob6[O(T#nO(VTO(YUO!]'sX!^'sX~O!]1zO!^)Va~O(VTO(YUO(e6^O~O`6bO~Oj6eO&[6fO~PNXO!k6gO~P%[Oa6iO~Oa6iO~P%[Ob2bO!^6nO&j2aO~P`O!g6pO~O!g6rOh(ji!](ji!^(ji!g(ji!l(jir(ji(r(ji~O!]#hi!^#hi~P#BwO#`6sO!]#hi!^#hi~O!]!ai!^!ai~P#BwOa%nO#`6|O'z%nO~Oa%nO!g#vO#`6|O'z%nO~O!](tq!k(tqa(tq'z(tq~P!:tO!](jO!k(sq~O!S%hO!_%iO#j7TO(T%gO~O!_'`O%i7WO~On7[O!_'`O%i7WO~O#k'iaP'iaR'ia['iaa'iaj'iar'ia!S'ia!l'ia!p'ia#R'ia#n'ia#o'ia#p'ia#q'ia#r'ia#s'ia#t'ia#u'ia#v'ia#x'ia#z'ia#{'ia'z'ia(a'ia(r'ia!k'ia!Y'ia'w'iav'ia!_'ia%i'ia!g'ia~P%-fO#k'kaP'kaR'ka['kaa'kaj'kar'ka!S'ka!l'ka!p'ka#R'ka#n'ka#o'ka#p'ka#q'ka#r'ka#s'ka#t'ka#u'ka#v'ka#x'ka#z'ka#{'ka'z'ka(a'ka(r'ka!k'ka!Y'ka'w'kav'ka!_'ka%i'ka!g'ka~P%.XO#k$|iP$|iR$|i[$|ia$|ij$|ir$|i!S$|i!]$|i!l$|i!p$|i#R$|i#n$|i#o$|i#p$|i#q$|i#r$|i#s$|i#t$|i#u$|i#v$|i#x$|i#z$|i#{$|i'z$|i(a$|i(r$|i!k$|i!Y$|i'w$|i#`$|iv$|i!_$|i%i$|i!g$|i~P#/sO#k%aiP%aiR%ai[%aia%aij%air%ai!S%ai!l%ai!p%ai#R%ai#n%ai#o%ai#p%ai#q%ai#r%ai#s%ai#t%ai#u%ai#v%ai#x%ai#z%ai#{%ai'z%ai(a%ai(r%ai!k%ai!Y%ai'w%aiv%ai!_%ai%i%ai!g%ai~P%5oO#k%ciP%ciR%ci[%cia%cij%cir%ci!S%ci!l%ci!p%ci#R%ci#n%ci#o%ci#p%ci#q%ci#r%ci#s%ci#t%ci#u%ci#v%ci#x%ci#z%ci#{%ci'z%ci(a%ci(r%ci!k%ci!Y%ci'w%civ%ci!_%ci%i%ci!g%ci~P%6bO!]'Ya!k'Ya~P!:tO!].tO!k(ki~O$O#ci!]#ci!^#ci~P#BwOP$[OR#zO!Q#yO!S#{O!l#xO!p$[O(aVO[#mij#mir#mi#R#mi#o#mi#p#mi#q#mi#r#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi$O#mi(r#mi(y#mi(z#mi!]#mi!^#mi~O#n#mi~P%NdO#n<_O~P%NdOP$[OR#zOr<kO!Q#yO!S#{O!l#xO!p$[O#n<_O#o<`O#p<`O#q<`O(aVO[#mij#mi#R#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi$O#mi(r#mi(y#mi(z#mi!]#mi!^#mi~O#r#mi~P&!lO#r<aO~P&!lOP$[OR#zO[<mOj<bOr<kO!Q#yO!S#{O!l#xO!p$[O#R<bO#n<_O#o<`O#p<`O#q<`O#r<aO#s<bO#t<bO#u<lO(aVO#x#mi#z#mi#{#mi$O#mi(r#mi(y#mi(z#mi!]#mi!^#mi~O#v#mi~P&$tOP$[OR#zO[<mOj<bOr<kO!Q#yO!S#{O!l#xO!p$[O#R<bO#n<_O#o<`O#p<`O#q<`O#r<aO#s<bO#t<bO#u<lO#v<cO(aVO(z#}O#z#mi#{#mi$O#mi(r#mi(y#mi!]#mi!^#mi~O#x<eO~P&&uO#x#mi~P&&uO#v<cO~P&$tOP$[OR#zO[<mOj<bOr<kO!Q#yO!S#{O!l#xO!p$[O#R<bO#n<_O#o<`O#p<`O#q<`O#r<aO#s<bO#t<bO#u<lO#v<cO#x<eO(aVO(y#|O(z#}O#{#mi$O#mi(r#mi!]#mi!^#mi~O#z#mi~P&)UO#z<gO~P&)UOa#|y!]#|y'z#|y'w#|y!Y#|y!k#|yv#|y!_#|y%i#|y!g#|y~P!:tO[#mij#mir#mi#R#mi#r#mi#s#mi#t#mi#u#mi#v#mi#x#mi#z#mi#{#mi$O#mi(r#mi!]#mi!^#mi~OP$[OR#zO!Q#yO!S#{O!l#xO!p$[O#n<_O#o<`O#p<`O#q<`O(aVO(y#mi(z#mi~P&,QOn>^O!Q*OO'y*PO(y$}O(z%POP#miR#mi!S#mi!l#mi!p#mi#n#mi#o#mi#p#mi#q#mi(a#mi~P&,QO#S$dOP(`XR(`X[(`Xj(`Xn(`Xr(`X!Q(`X!S(`X!l(`X!p(`X#R(`X#n(`X#o(`X#p(`X#q(`X#r(`X#s(`X#t(`X#u(`X#v(`X#x(`X#z(`X#{(`X$O(`X'y(`X(a(`X(r(`X(y(`X(z(`X!](`X!^(`X~O$O$Pi!]$Pi!^$Pi~P#BwO$O!ri!^!ri~P$+oOg']a!]']a~P!1WO!^7nO~O!]'da!^'da~P#BwO!Y7oO~P#/sO!g#vO(r'pO!]'ea!k'ea~O!]/pO!k)Oi~O!]/pO!g#vO!k)Oi~Og$|q!]$|q#`$|q$O$|q~P!1WO!Y'ga!]'ga~P#/sO!g7vO~O!]/yO!Y)Pi~P#/sO!]/yO!Y)Pi~O!Y7yO~Oh%VOr8OO!l%eO(r'pO~Oj8QO!g#vO~Or8TO!g#vO(r'pO~O!Q*OO'y*PO(z%POn'ja(y'ja!]'ja#`'ja~Og'ja$O'ja~P&5RO!Q*OO'y*POn'la(y'la(z'la!]'la#`'la~Og'la$O'la~P&5tOg(_q!](_q~P!1WO#`8VOg(_q!](_q~P!1WO!Y8WO~Og%Oq!]%Oq#`%Oq$O%Oq~P!1WOa$oy!]$oy'z$oy'w$oy!Y$oy!k$oyv$oy!_$oy%i$oy!g$oy~P!:tO!g6rO~O!]5[O!_)Qa~O!_'`OP$TaR$Ta[$Taj$Tar$Ta!Q$Ta!S$Ta!]$Ta!l$Ta!p$Ta#R$Ta#n$Ta#o$Ta#p$Ta#q$Ta#r$Ta#s$Ta#t$Ta#u$Ta#v$Ta#x$Ta#z$Ta#{$Ta(a$Ta(r$Ta(y$Ta(z$Ta~O%i7WO~P&8fO%^8[Oa%[i!_%[i'z%[i!]%[i~Oa#cy!]#cy'z#cy'w#cy!Y#cy!k#cyv#cy!_#cy%i#cy!g#cy~P!:tO[8^O~Ob8`O(T+qO(VTO(YUO~O!]1TO!^)Xi~O`8dO~O(e(|O!]'pX!^'pX~O!]5uO!^)Ua~O!^8nO~P%;eO(o!sO~P$&YO#[8oO~O!_1oO~O!_1oO%i8qO~On8tO!_1oO%i8qO~O[8yO!]'sa!^'sa~O!]1zO!^)Vi~O!k8}O~O!k9OO~O!k9RO~O!k9RO~P%[Oa9TO~O!g9UO~O!k9VO~O!](wi!^(wi~P#BwOa%nO#`9_O'z%nO~O!](ty!k(tya(ty'z(ty~P!:tO!](jO!k(sy~O%i9bO~P&8fO!_'`O%i9bO~O#k$|qP$|qR$|q[$|qa$|qj$|qr$|q!S$|q!]$|q!l$|q!p$|q#R$|q#n$|q#o$|q#p$|q#q$|q#r$|q#s$|q#t$|q#u$|q#v$|q#x$|q#z$|q#{$|q'z$|q(a$|q(r$|q!k$|q!Y$|q'w$|q#`$|qv$|q!_$|q%i$|q!g$|q~P#/sO#k'jaP'jaR'ja['jaa'jaj'jar'ja!S'ja!l'ja!p'ja#R'ja#n'ja#o'ja#p'ja#q'ja#r'ja#s'ja#t'ja#u'ja#v'ja#x'ja#z'ja#{'ja'z'ja(a'ja(r'ja!k'ja!Y'ja'w'jav'ja!_'ja%i'ja!g'ja~P&5RO#k'laP'laR'la['laa'laj'lar'la!S'la!l'la!p'la#R'la#n'la#o'la#p'la#q'la#r'la#s'la#t'la#u'la#v'la#x'la#z'la#{'la'z'la(a'la(r'la!k'la!Y'la'w'lav'la!_'la%i'la!g'la~P&5tO#k%OqP%OqR%Oq[%Oqa%Oqj%Oqr%Oq!S%Oq!]%Oq!l%Oq!p%Oq#R%Oq#n%Oq#o%Oq#p%Oq#q%Oq#r%Oq#s%Oq#t%Oq#u%Oq#v%Oq#x%Oq#z%Oq#{%Oq'z%Oq(a%Oq(r%Oq!k%Oq!Y%Oq'w%Oq#`%Oqv%Oq!_%Oq%i%Oq!g%Oq~P#/sO!]'Yi!k'Yi~P!:tO$O#cq!]#cq!^#cq~P#BwO(y$}OP%aaR%aa[%aaj%aar%aa!S%aa!l%aa!p%aa#R%aa#n%aa#o%aa#p%aa#q%aa#r%aa#s%aa#t%aa#u%aa#v%aa#x%aa#z%aa#{%aa$O%aa(a%aa(r%aa!]%aa!^%aa~On%aa!Q%aa'y%aa(z%aa~P&IyO(z%POP%caR%ca[%caj%car%ca!S%ca!l%ca!p%ca#R%ca#n%ca#o%ca#p%ca#q%ca#r%ca#s%ca#t%ca#u%ca#v%ca#x%ca#z%ca#{%ca$O%ca(a%ca(r%ca!]%ca!^%ca~On%ca!Q%ca'y%ca(y%ca~P&LQOn>^O!Q*OO'y*PO(z%PO~P&IyOn>^O!Q*OO'y*PO(y$}O~P&LQOR0kO!Q0kO!S0lO#S$dOP}a[}aj}an}ar}a!l}a!p}a#R}a#n}a#o}a#p}a#q}a#r}a#s}a#t}a#u}a#v}a#x}a#z}a#{}a$O}a'y}a(a}a(r}a(y}a(z}a!]}a!^}a~O!Q*OO'y*POP$saR$sa[$saj$san$sar$sa!S$sa!l$sa!p$sa#R$sa#n$sa#o$sa#p$sa#q$sa#r$sa#s$sa#t$sa#u$sa#v$sa#x$sa#z$sa#{$sa$O$sa(a$sa(r$sa(y$sa(z$sa!]$sa!^$sa~O!Q*OO'y*POP$uaR$ua[$uaj$uan$uar$ua!S$ua!l$ua!p$ua#R$ua#n$ua#o$ua#p$ua#q$ua#r$ua#s$ua#t$ua#u$ua#v$ua#x$ua#z$ua#{$ua$O$ua(a$ua(r$ua(y$ua(z$ua!]$ua!^$ua~On>^O!Q*OO'y*PO(y$}O(z%PO~OP%TaR%Ta[%Taj%Tar%Ta!S%Ta!l%Ta!p%Ta#R%Ta#n%Ta#o%Ta#p%Ta#q%Ta#r%Ta#s%Ta#t%Ta#u%Ta#v%Ta#x%Ta#z%Ta#{%Ta$O%Ta(a%Ta(r%Ta!]%Ta!^%Ta~P''VO$O$mq!]$mq!^$mq~P#BwO$O$oq!]$oq!^$oq~P#BwO!^9oO~O$O9pO~P!1WO!g#vO!]'ei!k'ei~O!g#vO(r'pO!]'ei!k'ei~O!]/pO!k)Oq~O!Y'gi!]'gi~P#/sO!]/yO!Y)Pq~Or9wO!g#vO(r'pO~O[9yO!Y9xO~P#/sO!Y9xO~Oj:PO!g#vO~Og(_y!](_y~P!1WO!]'na!_'na~P#/sOa%[q!_%[q'z%[q!]%[q~P#/sO[:UO~O!]1TO!^)Xq~O`:YO~O#`:ZO!]'pa!^'pa~O!]5uO!^)Ui~P#BwO!S:]O~O!_1oO%i:`O~O(VTO(YUO(e:eO~O!]1zO!^)Vq~O!k:hO~O!k:iO~O!k:jO~O!k:jO~P%[O#`:mO!]#hy!^#hy~O!]#hy!^#hy~P#BwO%i:rO~P&8fO!_'`O%i:rO~O$O#|y!]#|y!^#|y~P#BwOP$|iR$|i[$|ij$|ir$|i!S$|i!l$|i!p$|i#R$|i#n$|i#o$|i#p$|i#q$|i#r$|i#s$|i#t$|i#u$|i#v$|i#x$|i#z$|i#{$|i$O$|i(a$|i(r$|i!]$|i!^$|i~P''VO!Q*OO'y*PO(z%POP'iaR'ia['iaj'ian'iar'ia!S'ia!l'ia!p'ia#R'ia#n'ia#o'ia#p'ia#q'ia#r'ia#s'ia#t'ia#u'ia#v'ia#x'ia#z'ia#{'ia$O'ia(a'ia(r'ia(y'ia!]'ia!^'ia~O!Q*OO'y*POP'kaR'ka['kaj'kan'kar'ka!S'ka!l'ka!p'ka#R'ka#n'ka#o'ka#p'ka#q'ka#r'ka#s'ka#t'ka#u'ka#v'ka#x'ka#z'ka#{'ka$O'ka(a'ka(r'ka(y'ka(z'ka!]'ka!^'ka~O(y$}OP%aiR%ai[%aij%ain%air%ai!Q%ai!S%ai!l%ai!p%ai#R%ai#n%ai#o%ai#p%ai#q%ai#r%ai#s%ai#t%ai#u%ai#v%ai#x%ai#z%ai#{%ai$O%ai'y%ai(a%ai(r%ai(z%ai!]%ai!^%ai~O(z%POP%ciR%ci[%cij%cin%cir%ci!Q%ci!S%ci!l%ci!p%ci#R%ci#n%ci#o%ci#p%ci#q%ci#r%ci#s%ci#t%ci#u%ci#v%ci#x%ci#z%ci#{%ci$O%ci'y%ci(a%ci(r%ci(y%ci!]%ci!^%ci~O$O$oy!]$oy!^$oy~P#BwO$O#cy!]#cy!^#cy~P#BwO!g#vO!]'eq!k'eq~O!]/pO!k)Oy~O!Y'gq!]'gq~P#/sOr:|O!g#vO(r'pO~O[;QO!Y;PO~P#/sO!Y;PO~Og(_!R!](_!R~P!1WOa%[y!_%[y'z%[y!]%[y~P#/sO!]1TO!^)Xy~O!]5uO!^)Uq~O(T;XO~O!_1oO%i;[O~O!k;_O~O%i;dO~P&8fOP$|qR$|q[$|qj$|qr$|q!S$|q!l$|q!p$|q#R$|q#n$|q#o$|q#p$|q#q$|q#r$|q#s$|q#t$|q#u$|q#v$|q#x$|q#z$|q#{$|q$O$|q(a$|q(r$|q!]$|q!^$|q~P''VO!Q*OO'y*PO(z%POP'jaR'ja['jaj'jan'jar'ja!S'ja!l'ja!p'ja#R'ja#n'ja#o'ja#p'ja#q'ja#r'ja#s'ja#t'ja#u'ja#v'ja#x'ja#z'ja#{'ja$O'ja(a'ja(r'ja(y'ja!]'ja!^'ja~O!Q*OO'y*POP'laR'la['laj'lan'lar'la!S'la!l'la!p'la#R'la#n'la#o'la#p'la#q'la#r'la#s'la#t'la#u'la#v'la#x'la#z'la#{'la$O'la(a'la(r'la(y'la(z'la!]'la!^'la~OP%OqR%Oq[%Oqj%Oqr%Oq!S%Oq!l%Oq!p%Oq#R%Oq#n%Oq#o%Oq#p%Oq#q%Oq#r%Oq#s%Oq#t%Oq#u%Oq#v%Oq#x%Oq#z%Oq#{%Oq$O%Oq(a%Oq(r%Oq!]%Oq!^%Oq~P''VOg%e!Z!]%e!Z#`%e!Z$O%e!Z~P!1WO!Y;hO~P#/sOr;iO!g#vO(r'pO~O[;kO!Y;hO~P#/sO!]'pq!^'pq~P#BwO!]#h!Z!^#h!Z~P#BwO#k%e!ZP%e!ZR%e!Z[%e!Za%e!Zj%e!Zr%e!Z!S%e!Z!]%e!Z!l%e!Z!p%e!Z#R%e!Z#n%e!Z#o%e!Z#p%e!Z#q%e!Z#r%e!Z#s%e!Z#t%e!Z#u%e!Z#v%e!Z#x%e!Z#z%e!Z#{%e!Z'z%e!Z(a%e!Z(r%e!Z!k%e!Z!Y%e!Z'w%e!Z#`%e!Zv%e!Z!_%e!Z%i%e!Z!g%e!Z~P#/sOr;tO!g#vO(r'pO~O!Y;uO~P#/sOr;|O!g#vO(r'pO~O!Y;}O~P#/sOP%e!ZR%e!Z[%e!Zj%e!Zr%e!Z!S%e!Z!l%e!Z!p%e!Z#R%e!Z#n%e!Z#o%e!Z#p%e!Z#q%e!Z#r%e!Z#s%e!Z#t%e!Z#u%e!Z#v%e!Z#x%e!Z#z%e!Z#{%e!Z$O%e!Z(a%e!Z(r%e!Z!]%e!Z!^%e!Z~P''VOr<QO!g#vO(r'pO~Ov(fX~P1qO!Q%rO~P!)[O(U!lO~P!)[O!YfX!]fX#`fX~P%2OOP]XR]X[]Xj]Xr]X!Q]X!S]X!]]X!]fX!l]X!p]X#R]X#S]X#`]X#`fX#kfX#n]X#o]X#p]X#q]X#r]X#s]X#t]X#u]X#v]X#x]X#z]X#{]X$Q]X(a]X(r]X(y]X(z]X~O!gfX!k]X!kfX(rfX~P'LTOP<UOQ<UOSfOd>ROe!iOpkOr<UOskOtkOzkO|<UO!O<UO!SWO!WkO!XkO!_XO!i<XO!lZO!o<UO!p<UO!q<UO!s<YO!u<]O!x!hO$W!kO$n>PO(T)]O(VTO(YUO(aVO(o[O~O!]<iO!^$qa~Oh%VOp%WOr%XOs$tOt$tOz%YO|%ZO!O<tO!S${O!_$|O!i>WO!l$xO#j<zO$W%`O$t<vO$v<xO$y%aO(T(vO(VTO(YUO(a$uO(y$}O(z%PO~Ol)dO~P(!yOr!eX(r!eX~P#!iOr(jX(r(jX~P##[O!^]X!^fX~P'LTO!YfX!Y$zX!]fX!]$zX#`fX~P!0SO#k<^O~O!g#vO#k<^O~O#`<nO~Oj<bO~O#`=OO!](wX!^(wX~O#`<nO!](uX!^(uX~O#k=PO~Og=RO~P!1WO#k=XO~O#k=YO~Og=RO(T&ZO~O!g#vO#k=ZO~O!g#vO#k=PO~O$O=[O~P#BwO#k=]O~O#k=^O~O#k=cO~O#k=dO~O#k=eO~O#k=fO~O$O=gO~P!1WO$O=hO~P!1WOl=sO~P7eOk#S#T#U#W#X#[#i#j#u$n$t$v$y%]%^%h%i%j%q%s%v%w%y%{~(OT#o!X'|(U#ps#n#qr!Q'}$]'}(T$_(e~",
  goto: "$9Y)]PPPPPP)^PP)aP)rP+W/]PPPP6mPP7TPP=QPPP@tPA^PA^PPPA^PCfPA^PA^PA^PCjPCoPD^PIWPPPI[PPPPI[L_PPPLeMVPI[PI[PP! eI[PPPI[PI[P!#lI[P!'S!(X!(bP!)U!)Y!)U!,gPPPPPPP!-W!(XPP!-h!/YP!2iI[I[!2n!5z!:h!:h!>gPPP!>oI[PPPPPPPPP!BOP!C]PPI[!DnPI[PI[I[I[I[I[PI[!FQP!I[P!LbP!Lf!Lp!Lt!LtP!IXP!Lx!LxP#!OP#!SI[PI[#!Y#%_CjA^PA^PA^A^P#&lA^A^#)OA^#+vA^#.SA^A^#.r#1W#1W#1]#1f#1W#1qPP#1WPA^#2ZA^#6YA^A^6mPPP#:_PPP#:x#:xP#:xP#;`#:xPP#;fP#;]P#;]#;y#;]#<e#<k#<n)aP#<q)aP#<z#<z#<zP)aP)aP)aP)aPP)aP#=Q#=TP#=T)aP#=XP#=[P)aP)aP)aP)aP)aP)a)aPP#=b#=h#=s#=y#>P#>V#>]#>k#>q#>{#?R#?]#?c#?s#?y#@k#@}#AT#AZ#Ai#BO#Cs#DR#DY#Et#FS#Gt#HS#HY#H`#Hf#Hp#Hv#H|#IW#Ij#IpPPPPPPPPPPP#IvPPPPPPP#Jk#Mx$ b$ i$ qPPP$']P$'f$*_$0x$0{$1O$1}$2Q$2X$2aP$2g$2jP$3W$3[$4S$5b$5g$5}PP$6S$6Y$6^$6a$6e$6i$7e$7|$8e$8i$8l$8o$8y$8|$9Q$9UR!|RoqOXst!Z#d%m&r&t&u&w,s,x2[2_Y!vQ'`-e1o5{Q%tvQ%|yQ&T|Q&j!VS'W!e-]Q'f!iS'l!r!yU*k$|*Z*oQ+o%}S+|&V&WQ,d&dQ-c'_Q-m'gQ-u'mQ0[*qQ1b,OQ1y,eR<{<Y%SdOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+],p,s,x-i-q.P.V.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3l4z6T6e6f6i6|8t9T9_S#q]<V!r)_$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SU+P%]<s<tQ+t&PQ,f&gQ,m&oQ0x+gQ0}+iQ1Y+uQ2R,kQ3`.gQ5`0|Q5f1TQ6[1zQ7Y3dQ8`5gR9e7['QkOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>S!S!nQ!r!v!y!z$|'W'_'`'l'm'n*k*o*q*r-]-c-e-u0[0_1o5{5}%[$ti#v$b$c$d$x${%O%Q%^%_%c)y*R*T*V*Y*a*g*w*x+f+i,S,V.f/P/d/m/x/y/{0`0b0i0j0o1f1i1q3c4^4_4j4o5Q5[5_6S7W7v8Q8V8[8q9b9p9y:P:`:r;Q;[;d;k<l<m<o<p<q<r<u<v<w<x<y<z=S=T=U=V=X=Y=]=^=_=`=a=b=c=d=g=h>P>X>Y>]>^Q&X|Q'U!eS'[%i-`Q+t&PQ,P&WQ,f&gQ0n+SQ1Y+uQ1_+{Q2Q,jQ2R,kQ5f1TQ5o1aQ6[1zQ6_1|Q6`2PQ8`5gQ8c5lQ8|6bQ:X8dQ:f8yQ;V:YR<}*ZrnOXst!V!Z#d%m&i&r&t&u&w,s,x2[2_R,h&k&z^OPXYstuvwz!Z!`!g!j!o#S#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'b'r(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>R>S[#]WZ#W#Z'X(T!b%jm#h#i#l$x%e%h(^(h(i(j*Y*^*b+Z+[+^,o-V.T.Z.[.]._/m/p2d3[3]4a6r7TQ%wxQ%{yW&Q|&V&W,OQ&_!TQ'c!hQ'e!iQ(q#sS+n%|%}Q+r&PQ,_&bQ,c&dS-l'f'gQ.i(rQ1R+oQ1X+uQ1Z+vQ1^+zQ1t,`S1x,d,eQ2|-mQ5e1TQ5i1WQ5n1`Q6Z1yQ8_5gQ8b5kQ8f5pQ:T8^R;T:U!U$zi$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>Y!^%yy!i!u%{%|%}'V'e'f'g'k'u*j+n+o-Y-l-m-t0R0U1R2u2|3T4r4s4v7}9{Q+h%wQ,T&[Q,W&]Q,b&dQ.h(qQ1s,_U1w,c,d,eQ3e.iQ6U1tS6Y1x1yQ8x6Z#f>T#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^o>U<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=hW%Ti%V*y>PS&[!Q&iQ&]!RQ&^!SU*}%[%d=sR,R&Y%]%Si#v$b$c$d$x${%O%Q%^%_%c)y*R*T*V*Y*a*g*w*x+f+i,S,V.f/P/d/m/x/y/{0`0b0i0j0o1f1i1q3c4^4_4j4o5Q5[5_6S7W7v8Q8V8[8q9b9p9y:P:`:r;Q;[;d;k<l<m<o<p<q<r<u<v<w<x<y<z=S=T=U=V=X=Y=]=^=_=`=a=b=c=d=g=h>P>X>Y>]>^T)z$u){V+P%]<s<tW'[!e%i*Z-`S(}#y#zQ+c%rQ+y&SS.b(m(nQ1j,XQ5T0kR8i5u'QkOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>S$i$^c#Y#e%q%s%u(S(Y(t(y)R)S)T)U)V)W)X)Y)Z)[)^)`)b)g)q+d+x-Z-x-}.S.U.s.v.z.|.}/O/b0p2k2n3O3V3k3p3q3r3s3t3u3v3w3x3y3z3{3|4P4Q4X5X5c6u6{7Q7a7b7k7l8k9X9]9g9m9n:o;W;`<W=vT#TV#U'RkOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SQ'Y!eR2q-]!W!nQ!e!r!v!y!z$|'W'_'`'l'm'n*Z*k*o*q*r-]-c-e-u0[0_1o5{5}R1l,ZnqOXst!Z#d%m&r&t&u&w,s,x2[2_Q&y!^Q'v!xS(s#u<^Q+l%zQ,]&_Q,^&aQ-j'dQ-w'oS.r(x=PS0q+X=ZQ1P+mQ1n,[Q2c,zQ2e,{Q2m-WQ2z-kQ2}-oS5Y0r=eQ5a1QS5d1S=fQ6t2oQ6x2{Q6}3SQ8]5bQ9Y6vQ9Z6yQ9^7OR:l9V$d$]c#Y#e%s%u(S(Y(t(y)R)S)T)U)V)W)X)Y)Z)[)^)`)b)g)q+d+x-Z-x-}.S.U.s.v.z.}/O/b0p2k2n3O3V3k3p3q3r3s3t3u3v3w3x3y3z3{3|4P4Q4X5X5c6u6{7Q7a7b7k7l8k9X9]9g9m9n:o;W;`<W=vS(o#p'iQ)P#zS+b%q.|S.c(n(pR3^.d'QkOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SS#q]<VQ&t!XQ&u!YQ&w![Q&x!]R2Z,vQ'a!hQ+e%wQ-h'cS.e(q+hQ2x-gW3b.h.i0w0yQ6w2yW7U3_3a3e5^U9a7V7X7ZU:q9c9d9fS;b:p:sQ;p;cR;x;qU!wQ'`-eT5y1o5{!Q_OXZ`st!V!Z#d#h%e%m&i&k&r&t&u&w(j,s,x.[2[2_]!pQ!r'`-e1o5{T#q]<V%^{OPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&o&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+]+g,p,s,x-i-q.P.V.g.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3d3l4z6T6e6f6i6|7[8t9T9_S(}#y#zS.b(m(n!s=l$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SU$fd)_,mS(p#p'iU*v%R(w4OU0m+O.n7gQ5^0xQ7V3`Q9d7YR:s9em!tQ!r!v!y!z'`'l'm'n-e-u1o5{5}Q't!uS(f#g2US-s'k'wQ/s*]Q0R*jQ3U-vQ4f/tQ4r0TQ4s0UQ4x0^Q7r4`S7}4t4vS8R4y4{Q9r7sQ9v7yQ9{8OQ:Q8TS:{9w9xS;g:|;PS;s;h;iS;{;t;uS<P;|;}R<S<QQ#wbQ's!uS(e#g2US(g#m+WQ+Y%fQ+j%xQ+p&OU-r'k't'wQ.W(fU/r*]*`/wQ0S*jQ0V*lQ1O+kQ1u,aS3R-s-vQ3Z.`S4e/s/tQ4n0PS4q0R0^Q4u0WQ6W1vQ7P3US7q4`4bQ7u4fU7|4r4x4{Q8P4wQ8v6XS9q7r7sQ9u7yQ9}8RQ:O8SQ:c8wQ:y9rS:z9v9xQ;S:QQ;^:dS;f:{;PS;r;g;hS;z;s;uS<O;{;}Q<R<PQ<T<SQ=o=jQ={=tR=|=uV!wQ'`-e%^aOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&o&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+]+g,p,s,x-i-q.P.V.g.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3d3l4z6T6e6f6i6|7[8t9T9_S#wz!j!r=i$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SR=o>R%^bOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&o&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+]+g,p,s,x-i-q.P.V.g.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3d3l4z6T6e6f6i6|7[8t9T9_Q%fj!^%xy!i!u%{%|%}'V'e'f'g'k'u*j+n+o-Y-l-m-t0R0U1R2u2|3T4r4s4v7}9{S&Oz!jQ+k%yQ,a&dW1v,b,c,d,eU6X1w1x1yS8w6Y6ZQ:d8x!r=j$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SQ=t>QR=u>R%QeOPXYstuvw!Z!`!g!o#S#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&r&t&u&w&{'T'b'r(V(](d(x(z)O)}*i+X+]+g,p,s,x-i-q.P.V.g.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3d3l4z6T6e6f6i6|7[8t9T9_Y#bWZ#W#Z(T!b%jm#h#i#l$x%e%h(^(h(i(j*Y*^*b+Z+[+^,o-V.T.Z.[.]._/m/p2d3[3]4a6r7TQ,n&o!p=k$Z$n)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SR=n'XU']!e%i*ZR2s-`%SdOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+],p,s,x-i-q.P.V.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3l4z6T6e6f6i6|8t9T9_!r)_$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SQ,m&oQ0x+gQ3`.gQ7Y3dR9e7[!b$Tc#Y%q(S(Y(t(y)Z)[)`)g+x-x-}.S.U.s.v/b0p3O3V3k3{5X5c6{7Q7a9]:o<W!P<d)^)q-Z.|2k2n3p3y3z4P4X6u7b7k7l8k9X9g9m9n;W;`=v!f$Vc#Y%q(S(Y(t(y)W)X)Z)[)`)g+x-x-}.S.U.s.v/b0p3O3V3k3{5X5c6{7Q7a9]:o<W!T<f)^)q-Z.|2k2n3p3v3w3y3z4P4X6u7b7k7l8k9X9g9m9n;W;`=v!^$Zc#Y%q(S(Y(t(y)`)g+x-x-}.S.U.s.v/b0p3O3V3k3{5X5c6{7Q7a9]:o<WQ4_/kz>S)^)q-Z.|2k2n3p4P4X6u7b7k7l8k9X9g9m9n;W;`=vQ>X>ZR>Y>['QkOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>SS$oh$pR4U/U'XgOPWXYZhstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n$p%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/U/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>ST$kf$qQ$ifS)j$l)nR)v$qT$jf$qT)l$l)n'XhOPWXYZhstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$Z$_$a$e$n$p%m%t&R&k&n&o&r&t&u&w&{'T'X'b'r(T(V(](d(x(z)O)s)}*i+X+]+g,p,s,x-U-X-i-q.P.V.g.t.{/U/V/n0]0l0r1S1r2S2T2V2X2[2_2a2p3Q3W3d3l4T4z5w6T6e6f6i6s6|7[8t9T9_:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>ST$oh$pQ$rhR)u$p%^jOPWXYZstuvw!Z!`!g!o#S#W#Z#d#o#u#x#{$O$P$Q$R$S$T$U$V$W$X$_$a$e%m%t&R&k&n&o&r&t&u&w&{'T'b'r(T(V(](d(x(z)O)}*i+X+]+g,p,s,x-i-q.P.V.g.t.{/n0]0l0r1S1r2S2T2V2X2[2_2a3Q3W3d3l4z6T6e6f6i6|7[8t9T9_!s>Q$Z$n'X)s-U-X/V2p4T5w6s:Z:m<U<X<Y<]<^<_<`<a<b<c<d<e<f<g<h<i<k<n<{=O=P=R=Z=[=e=f>S#glOPXZst!Z!`!o#S#d#o#{$n%m&k&n&o&r&t&u&w&{'T'b)O)s*i+]+g,p,s,x-i.g/V/n0]0l1r2S2T2V2X2[2_2a3d4T4z6T6e6f6i7[8t9T!U%Ri$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>Y#f(w#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^Q+T%aQ/c*Oo4O<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=h!U$yi$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>YQ*c$zU*l$|*Z*oQ+U%bQ0W*m#f=q#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^n=r<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=hQ=w>TQ=x>UQ=y>VR=z>W!U%Ri$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>Y#f(w#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^o4O<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=hnoOXst!Z#d%m&r&t&u&w,s,x2[2_S*f${*YQ-R'OQ-S'QR4i/y%[%Si#v$b$c$d$x${%O%Q%^%_%c)y*R*T*V*Y*a*g*w*x+f+i,S,V.f/P/d/m/x/y/{0`0b0i0j0o1f1i1q3c4^4_4j4o5Q5[5_6S7W7v8Q8V8[8q9b9p9y:P:`:r;Q;[;d;k<l<m<o<p<q<r<u<v<w<x<y<z=S=T=U=V=X=Y=]=^=_=`=a=b=c=d=g=h>P>X>Y>]>^Q,U&]Q1h,WQ5s1gR8h5tV*n$|*Z*oU*n$|*Z*oT5z1o5{S0P*i/nQ4w0]T8S4z:]Q+j%xQ0V*lQ1O+kQ1u,aQ6W1vQ8v6XQ:c8wR;^:d!U%Oi$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>Yx*R$v)e*S*u+V/v0d0e4R4g5R5S5W7p8U:R:x=p=}>OS0`*t0a#f<o#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^n<p<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=h!d=S(u)c*[*e.j.m.q/_/k/|0v1e3h4[4h4l5r7]7`7w7z8X8Z9t9|:S:};R;e;j;v>Z>[`=T3}7c7f7j9h:t:w;yS=_.l3iT=`7e9k!U%Qi$d%O%Q%^%_%c*R*T*a*w*x/P/x0`0b0i0j0o4_5Q8V9p>P>X>Y|*T$v)e*U*t+V/g/v0d0e4R4g4|5R5S5W7p8U:R:x=p=}>OS0b*u0c#f<q#v$b$c$x${)y*V*Y*g+f+i,S,V.f/d/m/y/{1f1i1q3c4^4j4o5[5_6S7W7v8Q8[8q9b9y:P:`:r;Q;[;d;k<o<q<u<w<y=S=U=X=]=_=a=c=g>]>^n<r<l<m<p<r<v<x<z=T=V=Y=^=`=b=d=h!h=U(u)c*[*e.k.l.q/_/k/|0v1e3f3h4[4h4l5r7]7^7`7w7z8X8Z9t9|:S:};R;e;j;v>Z>[d=V3}7d7e7j9h9i:t:u:w;yS=a.m3jT=b7f9lrnOXst!V!Z#d%m&i&r&t&u&w,s,x2[2_Q&f!UR,p&ornOXst!V!Z#d%m&i&r&t&u&w,s,x2[2_R&f!UQ,Y&^R1d,RsnOXst!V!Z#d%m&i&r&t&u&w,s,x2[2_Q1p,_S6R1s1tU8p6P6Q6US:_8r8sS;Y:^:aQ;m;ZR;w;nQ&m!VR,i&iR6_1|R:f8yW&Q|&V&W,OR1Z+vQ&r!WR,s&sR,y&xT2],x2_R,}&yQ,|&yR2f,}Q'y!{R-y'ySsOtQ#dXT%ps#dQ#OTR'{#OQ#RUR'}#RQ){$uR/`){Q#UVR(Q#UQ#XWU(W#X(X.QQ(X#YR.Q(YQ-^'YR2r-^Q.u(yS3m.u3nR3n.vQ-e'`R2v-eY!rQ'`-e1o5{R'j!rQ/Q)eR4S/QU#_W%h*YU(_#_(`.RQ(`#`R.R(ZQ-a']R2t-at`OXst!V!Z#d%m&i&k&r&t&u&w,s,x2[2_S#hZ%eU#r`#h.[R.[(jQ(k#jQ.X(gW.a(k.X3X7RQ3X.YR7R3YQ)n$lR/W)nQ$phR)t$pQ$`cU)a$`-|<jQ-|<WR<j)qQ/q*]W4c/q4d7t9sU4d/r/s/tS7t4e4fR9s7u$e*Q$v(u)c)e*[*e*t*u+Q+R+V.l.m.o.p.q/_/g/i/k/v/|0d0e0v1e3f3g3h3}4R4[4g4h4l4|5O5R5S5W5r7]7^7_7`7e7f7h7i7j7p7w7z8U8X8Z9h9i9j9t9|:R:S:t:u:v:w:x:};R;e;j;v;y=p=}>O>Z>[Q/z*eU4k/z4m7xQ4m/|R7x4lS*o$|*ZR0Y*ox*S$v)e*t*u+V/v0d0e4R4g5R5S5W7p8U:R:x=p=}>O!d.j(u)c*[*e.l.m.q/_/k/|0v1e3h4[4h4l5r7]7`7w7z8X8Z9t9|:S:};R;e;j;v>Z>[U/h*S.j7ca7c3}7e7f7j9h:t:w;yQ0a*tQ3i.lU4}0a3i9kR9k7e|*U$v)e*t*u+V/g/v0d0e4R4g4|5R5S5W7p8U:R:x=p=}>O!h.k(u)c*[*e.l.m.q/_/k/|0v1e3f3h4[4h4l5r7]7^7`7w7z8X8Z9t9|:S:};R;e;j;v>Z>[U/j*U.k7de7d3}7e7f7j9h9i:t:u:w;yQ0c*uQ3j.mU5P0c3j9lR9l7fQ*z%UR0g*zQ5]0vR8Y5]Q+_%kR0u+_Q5v1jS8j5v:[R:[8kQ,[&_R1m,[Q5{1oR8m5{Q1{,fS6]1{8zR8z6_Q1U+rW5h1U5j8a:VQ5j1XQ8a5iR:V8bQ+w&QR1[+wQ2_,xR6m2_YrOXst#dQ&v!ZQ+a%mQ,r&rQ,t&tQ,u&uQ,w&wQ2Y,sS2],x2_R6l2[Q%opQ&z!_Q&}!aQ'P!bQ'R!cQ'q!uQ+`%lQ+l%zQ,Q&XQ,h&mQ-P&|W-p'k's't'wQ-w'oQ0X*nQ1P+mQ1c,PS2O,i,lQ2g-OQ2h-RQ2i-SQ2}-oW3P-r-s-v-xQ5a1QQ5m1_Q5q1eQ6V1uQ6a2QQ6k2ZU6z3O3R3UQ6}3SQ8]5bQ8e5oQ8g5rQ8l5zQ8u6WQ8{6`S9[6{7PQ9^7OQ:W8cQ:b8vQ:g8|Q:n9]Q;U:XQ;]:cQ;a:oQ;l;VR;o;^Q%zyQ'd!iQ'o!uU+m%{%|%}Q-W'VU-k'e'f'gS-o'k'uQ0Q*jS1Q+n+oQ2o-YS2{-l-mQ3S-tS4p0R0UQ5b1RQ6v2uQ6y2|Q7O3TU7{4r4s4vQ9z7}R;O9{S$wi>PR*{%VU%Ui%V>PR0f*yQ$viS(u#v+iS)c$b$cQ)e$dQ*[$xS*e${*YQ*t%OQ*u%QQ+Q%^Q+R%_Q+V%cQ.l<oQ.m<qQ.o<uQ.p<wQ.q<yQ/_)yQ/g*RQ/i*TQ/k*VQ/v*aS/|*g/mQ0d*wQ0e*xl0v+f,V.f1i1q3c6S7W8q9b:`:r;[;dQ1e,SQ3f=SQ3g=UQ3h=XS3}<l<mQ4R/PS4[/d4^Q4g/xQ4h/yQ4l/{Q4|0`Q5O0bQ5R0iQ5S0jQ5W0oQ5r1fQ7]=]Q7^=_Q7_=aQ7`=cQ7e<pQ7f<rQ7h<vQ7i<xQ7j<zQ7p4_Q7w4jQ7z4oQ8U5QQ8X5[Q8Z5_Q9h=YQ9i=TQ9j=VQ9t7vQ9|8QQ:R8VQ:S8[Q:t=^Q:u=`Q:v=bQ:w=dQ:x9pQ:}9yQ;R:PQ;e=gQ;j;QQ;v;kQ;y=hQ=p>PQ=}>XQ>O>YQ>Z>]R>[>^Q+O%]Q.n<sR7g<tnpOXst!Z#d%m&r&t&u&w,s,x2[2_Q!fPS#fZ#oQ&|!`W'h!o*i0]4zQ(P#SQ)Q#{Q)r$nS,l&k&nQ,q&oQ-O&{S-T'T/nQ-g'bQ.x)OQ/[)sQ0s+]Q0y+gQ2W,pQ2y-iQ3a.gQ4W/VQ5U0lQ6Q1rQ6c2SQ6d2TQ6h2VQ6j2XQ6o2aQ7Z3dQ7m4TQ8s6TQ9P6eQ9Q6fQ9S6iQ9f7[Q:a8tR:k9T#[cOPXZst!Z!`!o#d#o#{%m&k&n&o&r&t&u&w&{'T'b)O*i+]+g,p,s,x-i.g/n0]0l1r2S2T2V2X2[2_2a3d4z6T6e6f6i7[8t9TQ#YWQ#eYQ%quQ%svS%uw!gS(S#W(VQ(Y#ZQ(t#uQ(y#xQ)R$OQ)S$PQ)T$QQ)U$RQ)V$SQ)W$TQ)X$UQ)Y$VQ)Z$WQ)[$XQ)^$ZQ)`$_Q)b$aQ)g$eW)q$n)s/V4TQ+d%tQ+x&RS-Z'X2pQ-x'rS-}(T.PQ.S(]Q.U(dQ.s(xQ.v(zQ.z<UQ.|<XQ.}<YQ/O<]Q/b)}Q0p+XQ2k-UQ2n-XQ3O-qQ3V.VQ3k.tQ3p<^Q3q<_Q3r<`Q3s<aQ3t<bQ3u<cQ3v<dQ3w<eQ3x<fQ3y<gQ3z<hQ3{.{Q3|<kQ4P<nQ4Q<{Q4X<iQ5X0rQ5c1SQ6u=OQ6{3QQ7Q3WQ7a3lQ7b=PQ7k=RQ7l=ZQ8k5wQ9X6sQ9]6|Q9g=[Q9m=eQ9n=fQ:o9_Q;W:ZQ;`:mQ<W#SR=v>SR#[WR'Z!el!tQ!r!v!y!z'`'l'm'n-e-u1o5{5}S'V!e-]U*j$|*Z*oS-Y'W'_S0U*k*qQ0^*rQ2u-cQ4v0[R4{0_R({#xQ!fQT-d'`-e]!qQ!r'`-e1o5{Q#p]R'i<VR)f$dY!uQ'`-e1o5{Q'k!rS'u!v!yS'w!z5}S-t'l'mQ-v'nR3T-uT#kZ%eS#jZ%eS%km,oU(g#h#i#lS.Y(h(iQ.^(jQ0t+^Q3Y.ZU3Z.[.]._S7S3[3]R9`7Td#^W#W#Z%h(T(^*Y+Z.T/mr#gZm#h#i#l%e(h(i(j+^.Z.[.]._3[3]7TS*]$x*bQ/t*^Q2U,oQ2l-VQ4`/pQ6q2dQ7s4aQ9W6rT=m'X+[V#aW%h*YU#`W%h*YS(U#W(^U(Z#Z+Z/mS-['X+[T.O(T.TV'^!e%i*ZQ$lfR)x$qT)m$l)nR4V/UT*_$x*bT*h${*YQ0w+fQ1g,VQ3_.fQ5t1iQ6P1qQ7X3cQ8r6SQ9c7WQ:^8qQ:p9bQ;Z:`Q;c:rQ;n;[R;q;dnqOXst!Z#d%m&r&t&u&w,s,x2[2_Q&l!VR,h&itmOXst!U!V!Z#d%m&i&r&t&u&w,s,x2[2_R,o&oT%lm,oR1k,XR,g&gQ&U|S+}&V&WR1^,OR+s&PT&p!W&sT&q!W&sT2^,x2_",
  nodeNames: "⚠ ArithOp ArithOp ?. JSXStartTag LineComment BlockComment Script Hashbang ExportDeclaration export Star as VariableName String Escape from ; default FunctionDeclaration async function VariableDefinition > < TypeParamList in out const TypeDefinition extends ThisType this LiteralType ArithOp Number BooleanLiteral TemplateType InterpolationEnd Interpolation InterpolationStart NullType null VoidType void TypeofType typeof MemberExpression . PropertyName [ TemplateString Escape Interpolation super RegExp ] ArrayExpression Spread , } { ObjectExpression Property async get set PropertyDefinition Block : NewTarget new NewExpression ) ( ArgList UnaryExpression delete LogicOp BitOp YieldExpression yield AwaitExpression await ParenthesizedExpression ClassExpression class ClassBody MethodDeclaration Decorator @ MemberExpression PrivatePropertyName CallExpression TypeArgList CompareOp < declare Privacy static abstract override PrivatePropertyDefinition PropertyDeclaration readonly accessor Optional TypeAnnotation Equals StaticBlock FunctionExpression ArrowFunction ParamList ParamList ArrayPattern ObjectPattern PatternProperty Privacy readonly Arrow MemberExpression BinaryExpression ArithOp ArithOp ArithOp ArithOp BitOp CompareOp instanceof satisfies CompareOp BitOp BitOp BitOp LogicOp LogicOp ConditionalExpression LogicOp LogicOp AssignmentExpression UpdateOp PostfixExpression CallExpression InstantiationExpression TaggedTemplateExpression DynamicImport import ImportMeta JSXElement JSXSelfCloseEndTag JSXSelfClosingTag JSXIdentifier JSXBuiltin JSXIdentifier JSXNamespacedName JSXMemberExpression JSXSpreadAttribute JSXAttribute JSXAttributeValue JSXEscape JSXEndTag JSXOpenTag JSXFragmentTag JSXText JSXEscape JSXStartCloseTag JSXCloseTag PrefixCast < ArrowFunction TypeParamList SequenceExpression InstantiationExpression KeyofType keyof UniqueType unique ImportType InferredType infer TypeName ParenthesizedType FunctionSignature ParamList NewSignature IndexedType TupleType Label ArrayType ReadonlyType ObjectType MethodType PropertyType IndexSignature PropertyDefinition CallSignature TypePredicate asserts is NewSignature new UnionType LogicOp IntersectionType LogicOp ConditionalType ParameterizedType ClassDeclaration abstract implements type VariableDeclaration let var using TypeAliasDeclaration InterfaceDeclaration interface EnumDeclaration enum EnumBody NamespaceDeclaration namespace module AmbientDeclaration declare GlobalDeclaration global ClassDeclaration ClassBody AmbientFunctionDeclaration ExportGroup VariableName VariableName ImportDeclaration defer ImportGroup ForStatement for ForSpec ForInSpec ForOfSpec of WhileStatement while WithStatement with DoStatement do IfStatement if else SwitchStatement switch SwitchBody CaseLabel case DefaultLabel TryStatement try CatchClause catch FinallyClause finally ReturnStatement return ThrowStatement throw BreakStatement break ContinueStatement continue DebuggerStatement debugger LabeledStatement ExpressionStatement SingleExpression SingleClassItem",
  maxTerm: 380,
  context: Fm,
  nodeProps: [
    ["isolate", -8, 5, 6, 14, 37, 39, 51, 53, 55, ""],
    ["group", -26, 9, 17, 19, 68, 207, 211, 215, 216, 218, 221, 224, 234, 237, 243, 245, 247, 249, 252, 258, 264, 266, 268, 270, 272, 274, 275, "Statement", -34, 13, 14, 32, 35, 36, 42, 51, 54, 55, 57, 62, 70, 72, 76, 80, 82, 84, 85, 110, 111, 120, 121, 136, 139, 141, 142, 143, 144, 145, 147, 148, 167, 169, 171, "Expression", -23, 31, 33, 37, 41, 43, 45, 173, 175, 177, 178, 180, 181, 182, 184, 185, 186, 188, 189, 190, 201, 203, 205, 206, "Type", -3, 88, 103, 109, "ClassItem"],
    ["openedBy", 23, "<", 38, "InterpolationStart", 56, "[", 60, "{", 73, "(", 160, "JSXStartCloseTag"],
    ["closedBy", -2, 24, 168, ">", 40, "InterpolationEnd", 50, "]", 61, "}", 74, ")", 165, "JSXEndTag"]
  ],
  propSources: [ig],
  skippedNodes: [0, 5, 6, 278],
  repeatNodeCount: 37,
  tokenData: "$Fq07[R!bOX%ZXY+gYZ-yZ[+g[]%Z]^.c^p%Zpq+gqr/mrs3cst:_tuEruvJSvwLkwx! Yxy!'iyz!(sz{!)}{|!,q|}!.O}!O!,q!O!P!/Y!P!Q!9j!Q!R#:O!R![#<_![!]#I_!]!^#Jk!^!_#Ku!_!`$![!`!a$$v!a!b$*T!b!c$,r!c!}Er!}#O$-|#O#P$/W#P#Q$4o#Q#R$5y#R#SEr#S#T$7W#T#o$8b#o#p$<r#p#q$=h#q#r$>x#r#s$@U#s$f%Z$f$g+g$g#BYEr#BY#BZ$A`#BZ$ISEr$IS$I_$A`$I_$I|Er$I|$I}$Dk$I}$JO$Dk$JO$JTEr$JT$JU$A`$JU$KVEr$KV$KW$A`$KW&FUEr&FU&FV$A`&FV;'SEr;'S;=`I|<%l?HTEr?HT?HU$A`?HUOEr(n%d_$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z&j&hT$i&jO!^&c!_#o&c#p;'S&c;'S;=`&w<%lO&c&j&zP;=`<%l&c'|'U]$i&j(Z!bOY&}YZ&cZw&}wx&cx!^&}!^!_'}!_#O&}#O#P&c#P#o&}#o#p'}#p;'S&};'S;=`(l<%lO&}!b(SU(Z!bOY'}Zw'}x#O'}#P;'S'};'S;=`(f<%lO'}!b(iP;=`<%l'}'|(oP;=`<%l&}'[(y]$i&j(WpOY(rYZ&cZr(rrs&cs!^(r!^!_)r!_#O(r#O#P&c#P#o(r#o#p)r#p;'S(r;'S;=`*a<%lO(rp)wU(WpOY)rZr)rs#O)r#P;'S)r;'S;=`*Z<%lO)rp*^P;=`<%l)r'[*dP;=`<%l(r#S*nX(Wp(Z!bOY*gZr*grs'}sw*gwx)rx#O*g#P;'S*g;'S;=`+Z<%lO*g#S+^P;=`<%l*g(n+dP;=`<%l%Z07[+rq$i&j(Wp(Z!b'|0/lOX%ZXY+gYZ&cZ[+g[p%Zpq+gqr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p$f%Z$f$g+g$g#BY%Z#BY#BZ+g#BZ$IS%Z$IS$I_+g$I_$JT%Z$JT$JU+g$JU$KV%Z$KV$KW+g$KW&FU%Z&FU&FV+g&FV;'S%Z;'S;=`+a<%l?HT%Z?HT?HU+g?HUO%Z07[.ST(X#S$i&j'}0/lO!^&c!_#o&c#p;'S&c;'S;=`&w<%lO&c07[.n_$i&j(Wp(Z!b'}0/lOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z)3p/x`$i&j!p),Q(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`0z!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW1V`#v(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`2X!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW2d_#v(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'At3l_(V':f$i&j(Z!bOY4kYZ5qZr4krs7nsw4kwx5qx!^4k!^!_8p!_#O4k#O#P5q#P#o4k#o#p8p#p;'S4k;'S;=`:X<%lO4k(^4r_$i&j(Z!bOY4kYZ5qZr4krs7nsw4kwx5qx!^4k!^!_8p!_#O4k#O#P5q#P#o4k#o#p8p#p;'S4k;'S;=`:X<%lO4k&z5vX$i&jOr5qrs6cs!^5q!^!_6y!_#o5q#o#p6y#p;'S5q;'S;=`7h<%lO5q&z6jT$d`$i&jO!^&c!_#o&c#p;'S&c;'S;=`&w<%lO&c`6|TOr6yrs7]s;'S6y;'S;=`7b<%lO6y`7bO$d``7eP;=`<%l6y&z7kP;=`<%l5q(^7w]$d`$i&j(Z!bOY&}YZ&cZw&}wx&cx!^&}!^!_'}!_#O&}#O#P&c#P#o&}#o#p'}#p;'S&};'S;=`(l<%lO&}!r8uZ(Z!bOY8pYZ6yZr8prs9hsw8pwx6yx#O8p#O#P6y#P;'S8p;'S;=`:R<%lO8p!r9oU$d`(Z!bOY'}Zw'}x#O'}#P;'S'};'S;=`(f<%lO'}!r:UP;=`<%l8p(^:[P;=`<%l4k%9[:hh$i&j(Wp(Z!bOY%ZYZ&cZq%Zqr<Srs&}st%ZtuCruw%Zwx(rx!^%Z!^!_*g!_!c%Z!c!}Cr!}#O%Z#O#P&c#P#R%Z#R#SCr#S#T%Z#T#oCr#o#p*g#p$g%Z$g;'SCr;'S;=`El<%lOCr(r<__WS$i&j(Wp(Z!bOY<SYZ&cZr<Srs=^sw<Swx@nx!^<S!^!_Bm!_#O<S#O#P>`#P#o<S#o#pBm#p;'S<S;'S;=`Cl<%lO<S(Q=g]WS$i&j(Z!bOY=^YZ&cZw=^wx>`x!^=^!^!_?q!_#O=^#O#P>`#P#o=^#o#p?q#p;'S=^;'S;=`@h<%lO=^&n>gXWS$i&jOY>`YZ&cZ!^>`!^!_?S!_#o>`#o#p?S#p;'S>`;'S;=`?k<%lO>`S?XSWSOY?SZ;'S?S;'S;=`?e<%lO?SS?hP;=`<%l?S&n?nP;=`<%l>`!f?xWWS(Z!bOY?qZw?qwx?Sx#O?q#O#P?S#P;'S?q;'S;=`@b<%lO?q!f@eP;=`<%l?q(Q@kP;=`<%l=^'`@w]WS$i&j(WpOY@nYZ&cZr@nrs>`s!^@n!^!_Ap!_#O@n#O#P>`#P#o@n#o#pAp#p;'S@n;'S;=`Bg<%lO@ntAwWWS(WpOYApZrAprs?Ss#OAp#O#P?S#P;'SAp;'S;=`Ba<%lOAptBdP;=`<%lAp'`BjP;=`<%l@n#WBvYWS(Wp(Z!bOYBmZrBmrs?qswBmwxApx#OBm#O#P?S#P;'SBm;'S;=`Cf<%lOBm#WCiP;=`<%lBm(rCoP;=`<%l<S%9[C}i$i&j(o%1l(Wp(Z!bOY%ZYZ&cZr%Zrs&}st%ZtuCruw%Zwx(rx!Q%Z!Q![Cr![!^%Z!^!_*g!_!c%Z!c!}Cr!}#O%Z#O#P&c#P#R%Z#R#SCr#S#T%Z#T#oCr#o#p*g#p$g%Z$g;'SCr;'S;=`El<%lOCr%9[EoP;=`<%lCr07[FRk$i&j(Wp(Z!b$]#t(T,2j(e$I[OY%ZYZ&cZr%Zrs&}st%ZtuEruw%Zwx(rx}%Z}!OGv!O!Q%Z!Q![Er![!^%Z!^!_*g!_!c%Z!c!}Er!}#O%Z#O#P&c#P#R%Z#R#SEr#S#T%Z#T#oEr#o#p*g#p$g%Z$g;'SEr;'S;=`I|<%lOEr+dHRk$i&j(Wp(Z!b$]#tOY%ZYZ&cZr%Zrs&}st%ZtuGvuw%Zwx(rx}%Z}!OGv!O!Q%Z!Q![Gv![!^%Z!^!_*g!_!c%Z!c!}Gv!}#O%Z#O#P&c#P#R%Z#R#SGv#S#T%Z#T#oGv#o#p*g#p$g%Z$g;'SGv;'S;=`Iv<%lOGv+dIyP;=`<%lGv07[JPP;=`<%lEr(KWJ_`$i&j(Wp(Z!b#p(ChOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KWKl_$i&j$Q(Ch(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z,#xLva(z+JY$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sv%ZvwM{wx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KWNW`$i&j#z(Ch(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'At! c_(Y';W$i&j(WpOY!!bYZ!#hZr!!brs!#hsw!!bwx!$xx!^!!b!^!_!%z!_#O!!b#O#P!#h#P#o!!b#o#p!%z#p;'S!!b;'S;=`!'c<%lO!!b'l!!i_$i&j(WpOY!!bYZ!#hZr!!brs!#hsw!!bwx!$xx!^!!b!^!_!%z!_#O!!b#O#P!#h#P#o!!b#o#p!%z#p;'S!!b;'S;=`!'c<%lO!!b&z!#mX$i&jOw!#hwx6cx!^!#h!^!_!$Y!_#o!#h#o#p!$Y#p;'S!#h;'S;=`!$r<%lO!#h`!$]TOw!$Ywx7]x;'S!$Y;'S;=`!$l<%lO!$Y`!$oP;=`<%l!$Y&z!$uP;=`<%l!#h'l!%R]$d`$i&j(WpOY(rYZ&cZr(rrs&cs!^(r!^!_)r!_#O(r#O#P&c#P#o(r#o#p)r#p;'S(r;'S;=`*a<%lO(r!Q!&PZ(WpOY!%zYZ!$YZr!%zrs!$Ysw!%zwx!&rx#O!%z#O#P!$Y#P;'S!%z;'S;=`!']<%lO!%z!Q!&yU$d`(WpOY)rZr)rs#O)r#P;'S)r;'S;=`*Z<%lO)r!Q!'`P;=`<%l!%z'l!'fP;=`<%l!!b/5|!'t_!l/.^$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z#&U!)O_!k!Lf$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z-!n!*[b$i&j(Wp(Z!b(U%&f#q(ChOY%ZYZ&cZr%Zrs&}sw%Zwx(rxz%Zz{!+d{!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW!+o`$i&j(Wp(Z!b#n(ChOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z+;x!,|`$i&j(Wp(Z!br+4YOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z,$U!.Z_!]+Jf$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z07[!/ec$i&j(Wp(Z!b!Q.2^OY%ZYZ&cZr%Zrs&}sw%Zwx(rx!O%Z!O!P!0p!P!Q%Z!Q![!3Y![!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z#%|!0ya$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!O%Z!O!P!2O!P!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z#%|!2Z_![!L^$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad!3eg$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q![!3Y![!^%Z!^!_*g!_!g%Z!g!h!4|!h#O%Z#O#P&c#P#R%Z#R#S!3Y#S#X%Z#X#Y!4|#Y#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad!5Vg$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx{%Z{|!6n|}%Z}!O!6n!O!Q%Z!Q![!8S![!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S!8S#S#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad!6wc$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q![!8S![!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S!8S#S#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad!8_c$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q![!8S![!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S!8S#S#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z07[!9uf$i&j(Wp(Z!b#o(ChOY!;ZYZ&cZr!;Zrs!<nsw!;Zwx!Lcxz!;Zz{#-}{!P!;Z!P!Q#/d!Q!^!;Z!^!_#(i!_!`#7S!`!a#8i!a!}!;Z!}#O#,f#O#P!Dy#P#o!;Z#o#p#(i#p;'S!;Z;'S;=`#-w<%lO!;Z?O!;fb$i&j(Wp(Z!b!X7`OY!;ZYZ&cZr!;Zrs!<nsw!;Zwx!Lcx!P!;Z!P!Q#&`!Q!^!;Z!^!_#(i!_!}!;Z!}#O#,f#O#P!Dy#P#o!;Z#o#p#(i#p;'S!;Z;'S;=`#-w<%lO!;Z>^!<w`$i&j(Z!b!X7`OY!<nYZ&cZw!<nwx!=yx!P!<n!P!Q!Eq!Q!^!<n!^!_!Gr!_!}!<n!}#O!KS#O#P!Dy#P#o!<n#o#p!Gr#p;'S!<n;'S;=`!L]<%lO!<n<z!>Q^$i&j!X7`OY!=yYZ&cZ!P!=y!P!Q!>|!Q!^!=y!^!_!@c!_!}!=y!}#O!CW#O#P!Dy#P#o!=y#o#p!@c#p;'S!=y;'S;=`!Ek<%lO!=y<z!?Td$i&j!X7`O!^&c!_#W&c#W#X!>|#X#Z&c#Z#[!>|#[#]&c#]#^!>|#^#a&c#a#b!>|#b#g&c#g#h!>|#h#i&c#i#j!>|#j#k!>|#k#m&c#m#n!>|#n#o&c#p;'S&c;'S;=`&w<%lO&c7`!@hX!X7`OY!@cZ!P!@c!P!Q!AT!Q!}!@c!}#O!Ar#O#P!Bq#P;'S!@c;'S;=`!CQ<%lO!@c7`!AYW!X7`#W#X!AT#Z#[!AT#]#^!AT#a#b!AT#g#h!AT#i#j!AT#j#k!AT#m#n!AT7`!AuVOY!ArZ#O!Ar#O#P!B[#P#Q!@c#Q;'S!Ar;'S;=`!Bk<%lO!Ar7`!B_SOY!ArZ;'S!Ar;'S;=`!Bk<%lO!Ar7`!BnP;=`<%l!Ar7`!BtSOY!@cZ;'S!@c;'S;=`!CQ<%lO!@c7`!CTP;=`<%l!@c<z!C][$i&jOY!CWYZ&cZ!^!CW!^!_!Ar!_#O!CW#O#P!DR#P#Q!=y#Q#o!CW#o#p!Ar#p;'S!CW;'S;=`!Ds<%lO!CW<z!DWX$i&jOY!CWYZ&cZ!^!CW!^!_!Ar!_#o!CW#o#p!Ar#p;'S!CW;'S;=`!Ds<%lO!CW<z!DvP;=`<%l!CW<z!EOX$i&jOY!=yYZ&cZ!^!=y!^!_!@c!_#o!=y#o#p!@c#p;'S!=y;'S;=`!Ek<%lO!=y<z!EnP;=`<%l!=y>^!Ezl$i&j(Z!b!X7`OY&}YZ&cZw&}wx&cx!^&}!^!_'}!_#O&}#O#P&c#P#W&}#W#X!Eq#X#Z&}#Z#[!Eq#[#]&}#]#^!Eq#^#a&}#a#b!Eq#b#g&}#g#h!Eq#h#i&}#i#j!Eq#j#k!Eq#k#m&}#m#n!Eq#n#o&}#o#p'}#p;'S&};'S;=`(l<%lO&}8r!GyZ(Z!b!X7`OY!GrZw!Grwx!@cx!P!Gr!P!Q!Hl!Q!}!Gr!}#O!JU#O#P!Bq#P;'S!Gr;'S;=`!J|<%lO!Gr8r!Hse(Z!b!X7`OY'}Zw'}x#O'}#P#W'}#W#X!Hl#X#Z'}#Z#[!Hl#[#]'}#]#^!Hl#^#a'}#a#b!Hl#b#g'}#g#h!Hl#h#i'}#i#j!Hl#j#k!Hl#k#m'}#m#n!Hl#n;'S'};'S;=`(f<%lO'}8r!JZX(Z!bOY!JUZw!JUwx!Arx#O!JU#O#P!B[#P#Q!Gr#Q;'S!JU;'S;=`!Jv<%lO!JU8r!JyP;=`<%l!JU8r!KPP;=`<%l!Gr>^!KZ^$i&j(Z!bOY!KSYZ&cZw!KSwx!CWx!^!KS!^!_!JU!_#O!KS#O#P!DR#P#Q!<n#Q#o!KS#o#p!JU#p;'S!KS;'S;=`!LV<%lO!KS>^!LYP;=`<%l!KS>^!L`P;=`<%l!<n=l!Ll`$i&j(Wp!X7`OY!LcYZ&cZr!Lcrs!=ys!P!Lc!P!Q!Mn!Q!^!Lc!^!_# o!_!}!Lc!}#O#%P#O#P!Dy#P#o!Lc#o#p# o#p;'S!Lc;'S;=`#&Y<%lO!Lc=l!Mwl$i&j(Wp!X7`OY(rYZ&cZr(rrs&cs!^(r!^!_)r!_#O(r#O#P&c#P#W(r#W#X!Mn#X#Z(r#Z#[!Mn#[#](r#]#^!Mn#^#a(r#a#b!Mn#b#g(r#g#h!Mn#h#i(r#i#j!Mn#j#k!Mn#k#m(r#m#n!Mn#n#o(r#o#p)r#p;'S(r;'S;=`*a<%lO(r8Q# vZ(Wp!X7`OY# oZr# ors!@cs!P# o!P!Q#!i!Q!}# o!}#O#$R#O#P!Bq#P;'S# o;'S;=`#$y<%lO# o8Q#!pe(Wp!X7`OY)rZr)rs#O)r#P#W)r#W#X#!i#X#Z)r#Z#[#!i#[#])r#]#^#!i#^#a)r#a#b#!i#b#g)r#g#h#!i#h#i)r#i#j#!i#j#k#!i#k#m)r#m#n#!i#n;'S)r;'S;=`*Z<%lO)r8Q#$WX(WpOY#$RZr#$Rrs!Ars#O#$R#O#P!B[#P#Q# o#Q;'S#$R;'S;=`#$s<%lO#$R8Q#$vP;=`<%l#$R8Q#$|P;=`<%l# o=l#%W^$i&j(WpOY#%PYZ&cZr#%Prs!CWs!^#%P!^!_#$R!_#O#%P#O#P!DR#P#Q!Lc#Q#o#%P#o#p#$R#p;'S#%P;'S;=`#&S<%lO#%P=l#&VP;=`<%l#%P=l#&]P;=`<%l!Lc?O#&kn$i&j(Wp(Z!b!X7`OY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#W%Z#W#X#&`#X#Z%Z#Z#[#&`#[#]%Z#]#^#&`#^#a%Z#a#b#&`#b#g%Z#g#h#&`#h#i%Z#i#j#&`#j#k#&`#k#m%Z#m#n#&`#n#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z9d#(r](Wp(Z!b!X7`OY#(iZr#(irs!Grsw#(iwx# ox!P#(i!P!Q#)k!Q!}#(i!}#O#+`#O#P!Bq#P;'S#(i;'S;=`#,`<%lO#(i9d#)th(Wp(Z!b!X7`OY*gZr*grs'}sw*gwx)rx#O*g#P#W*g#W#X#)k#X#Z*g#Z#[#)k#[#]*g#]#^#)k#^#a*g#a#b#)k#b#g*g#g#h#)k#h#i*g#i#j#)k#j#k#)k#k#m*g#m#n#)k#n;'S*g;'S;=`+Z<%lO*g9d#+gZ(Wp(Z!bOY#+`Zr#+`rs!JUsw#+`wx#$Rx#O#+`#O#P!B[#P#Q#(i#Q;'S#+`;'S;=`#,Y<%lO#+`9d#,]P;=`<%l#+`9d#,cP;=`<%l#(i?O#,o`$i&j(Wp(Z!bOY#,fYZ&cZr#,frs!KSsw#,fwx#%Px!^#,f!^!_#+`!_#O#,f#O#P!DR#P#Q!;Z#Q#o#,f#o#p#+`#p;'S#,f;'S;=`#-q<%lO#,f?O#-tP;=`<%l#,f?O#-zP;=`<%l!;Z07[#.[b$i&j(Wp(Z!b(O0/l!X7`OY!;ZYZ&cZr!;Zrs!<nsw!;Zwx!Lcx!P!;Z!P!Q#&`!Q!^!;Z!^!_#(i!_!}!;Z!}#O#,f#O#P!Dy#P#o!;Z#o#p#(i#p;'S!;Z;'S;=`#-w<%lO!;Z07[#/o_$i&j(Wp(Z!bT0/lOY#/dYZ&cZr#/drs#0nsw#/dwx#4Ox!^#/d!^!_#5}!_#O#/d#O#P#1p#P#o#/d#o#p#5}#p;'S#/d;'S;=`#6|<%lO#/d06j#0w]$i&j(Z!bT0/lOY#0nYZ&cZw#0nwx#1px!^#0n!^!_#3R!_#O#0n#O#P#1p#P#o#0n#o#p#3R#p;'S#0n;'S;=`#3x<%lO#0n05W#1wX$i&jT0/lOY#1pYZ&cZ!^#1p!^!_#2d!_#o#1p#o#p#2d#p;'S#1p;'S;=`#2{<%lO#1p0/l#2iST0/lOY#2dZ;'S#2d;'S;=`#2u<%lO#2d0/l#2xP;=`<%l#2d05W#3OP;=`<%l#1p01O#3YW(Z!bT0/lOY#3RZw#3Rwx#2dx#O#3R#O#P#2d#P;'S#3R;'S;=`#3r<%lO#3R01O#3uP;=`<%l#3R06j#3{P;=`<%l#0n05x#4X]$i&j(WpT0/lOY#4OYZ&cZr#4Ors#1ps!^#4O!^!_#5Q!_#O#4O#O#P#1p#P#o#4O#o#p#5Q#p;'S#4O;'S;=`#5w<%lO#4O00^#5XW(WpT0/lOY#5QZr#5Qrs#2ds#O#5Q#O#P#2d#P;'S#5Q;'S;=`#5q<%lO#5Q00^#5tP;=`<%l#5Q05x#5zP;=`<%l#4O01p#6WY(Wp(Z!bT0/lOY#5}Zr#5}rs#3Rsw#5}wx#5Qx#O#5}#O#P#2d#P;'S#5};'S;=`#6v<%lO#5}01p#6yP;=`<%l#5}07[#7PP;=`<%l#/d)3h#7ab$i&j$Q(Ch(Wp(Z!b!X7`OY!;ZYZ&cZr!;Zrs!<nsw!;Zwx!Lcx!P!;Z!P!Q#&`!Q!^!;Z!^!_#(i!_!}!;Z!}#O#,f#O#P!Dy#P#o!;Z#o#p#(i#p;'S!;Z;'S;=`#-w<%lO!;ZAt#8vb$Z#t$i&j(Wp(Z!b!X7`OY!;ZYZ&cZr!;Zrs!<nsw!;Zwx!Lcx!P!;Z!P!Q#&`!Q!^!;Z!^!_#(i!_!}!;Z!}#O#,f#O#P!Dy#P#o!;Z#o#p#(i#p;'S!;Z;'S;=`#-w<%lO!;Z'Ad#:Zp$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!O%Z!O!P!3Y!P!Q%Z!Q![#<_![!^%Z!^!_*g!_!g%Z!g!h!4|!h#O%Z#O#P&c#P#R%Z#R#S#<_#S#U%Z#U#V#?i#V#X%Z#X#Y!4|#Y#b%Z#b#c#>_#c#d#Bq#d#l%Z#l#m#Es#m#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#<jk$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!O%Z!O!P!3Y!P!Q%Z!Q![#<_![!^%Z!^!_*g!_!g%Z!g!h!4|!h#O%Z#O#P&c#P#R%Z#R#S#<_#S#X%Z#X#Y!4|#Y#b%Z#b#c#>_#c#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#>j_$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#?rd$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q!R#AQ!R!S#AQ!S!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S#AQ#S#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#A]f$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q!R#AQ!R!S#AQ!S!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S#AQ#S#b%Z#b#c#>_#c#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#Bzc$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q!Y#DV!Y!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S#DV#S#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#Dbe$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q!Y#DV!Y!^%Z!^!_*g!_#O%Z#O#P&c#P#R%Z#R#S#DV#S#b%Z#b#c#>_#c#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#E|g$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q![#Ge![!^%Z!^!_*g!_!c%Z!c!i#Ge!i#O%Z#O#P&c#P#R%Z#R#S#Ge#S#T%Z#T#Z#Ge#Z#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z'Ad#Gpi$i&j(Wp(Z!bs'9tOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!Q%Z!Q![#Ge![!^%Z!^!_*g!_!c%Z!c!i#Ge!i#O%Z#O#P&c#P#R%Z#R#S#Ge#S#T%Z#T#Z#Ge#Z#b%Z#b#c#>_#c#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z*)x#Il_!g$b$i&j$O)Lv(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z)[#Jv_al$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z04f#LS^h#)`#R-<U(Wp(Z!b$n7`OY*gZr*grs'}sw*gwx)rx!P*g!P!Q#MO!Q!^*g!^!_#Mt!_!`$ f!`#O*g#P;'S*g;'S;=`+Z<%lO*g(n#MXX$k&j(Wp(Z!bOY*gZr*grs'}sw*gwx)rx#O*g#P;'S*g;'S;=`+Z<%lO*g(El#M}Z#r(Ch(Wp(Z!bOY*gZr*grs'}sw*gwx)rx!_*g!_!`#Np!`#O*g#P;'S*g;'S;=`+Z<%lO*g(El#NyX$Q(Ch(Wp(Z!bOY*gZr*grs'}sw*gwx)rx#O*g#P;'S*g;'S;=`+Z<%lO*g(El$ oX#s(Ch(Wp(Z!bOY*gZr*grs'}sw*gwx)rx#O*g#P;'S*g;'S;=`+Z<%lO*g*)x$!ga#`*!Y$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`0z!`!a$#l!a#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(K[$#w_#k(Cl$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z*)x$%Vag!*r#s(Ch$f#|$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`$&[!`!a$'f!a#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW$&g_#s(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW$'qa#r(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`!a$(v!a#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW$)R`#r(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(Kd$*`a(r(Ct$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!a%Z!a!b$+e!b#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW$+p`$i&j#{(Ch(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z%#`$,}_!|$Ip$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z04f$.X_!S0,v$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(n$/]Z$i&jO!^$0O!^!_$0f!_#i$0O#i#j$0k#j#l$0O#l#m$2^#m#o$0O#o#p$0f#p;'S$0O;'S;=`$4i<%lO$0O(n$0VT_#S$i&jO!^&c!_#o&c#p;'S&c;'S;=`&w<%lO&c#S$0kO_#S(n$0p[$i&jO!Q&c!Q![$1f![!^&c!_!c&c!c!i$1f!i#T&c#T#Z$1f#Z#o&c#o#p$3|#p;'S&c;'S;=`&w<%lO&c(n$1kZ$i&jO!Q&c!Q![$2^![!^&c!_!c&c!c!i$2^!i#T&c#T#Z$2^#Z#o&c#p;'S&c;'S;=`&w<%lO&c(n$2cZ$i&jO!Q&c!Q![$3U![!^&c!_!c&c!c!i$3U!i#T&c#T#Z$3U#Z#o&c#p;'S&c;'S;=`&w<%lO&c(n$3ZZ$i&jO!Q&c!Q![$0O![!^&c!_!c&c!c!i$0O!i#T&c#T#Z$0O#Z#o&c#p;'S&c;'S;=`&w<%lO&c#S$4PR!Q![$4Y!c!i$4Y#T#Z$4Y#S$4]S!Q![$4Y!c!i$4Y#T#Z$4Y#q#r$0f(n$4lP;=`<%l$0O#1[$4z_!Y#)l$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z(KW$6U`#x(Ch$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z+;p$7c_$i&j(Wp(Z!b(a+4QOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z07[$8qk$i&j(Wp(Z!b(T,2j$_#t(e$I[OY%ZYZ&cZr%Zrs&}st%Ztu$8buw%Zwx(rx}%Z}!O$:f!O!Q%Z!Q![$8b![!^%Z!^!_*g!_!c%Z!c!}$8b!}#O%Z#O#P&c#P#R%Z#R#S$8b#S#T%Z#T#o$8b#o#p*g#p$g%Z$g;'S$8b;'S;=`$<l<%lO$8b+d$:qk$i&j(Wp(Z!b$_#tOY%ZYZ&cZr%Zrs&}st%Ztu$:fuw%Zwx(rx}%Z}!O$:f!O!Q%Z!Q![$:f![!^%Z!^!_*g!_!c%Z!c!}$:f!}#O%Z#O#P&c#P#R%Z#R#S$:f#S#T%Z#T#o$:f#o#p*g#p$g%Z$g;'S$:f;'S;=`$<f<%lO$:f+d$<iP;=`<%l$:f07[$<oP;=`<%l$8b#Jf$<{X!_#Hb(Wp(Z!bOY*gZr*grs'}sw*gwx)rx#O*g#P;'S*g;'S;=`+Z<%lO*g,#x$=sa(y+JY$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_!`Ka!`#O%Z#O#P&c#P#o%Z#o#p*g#p#q$+e#q;'S%Z;'S;=`+a<%lO%Z)>v$?V_!^(CdvBr$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z?O$@a_!q7`$i&j(Wp(Z!bOY%ZYZ&cZr%Zrs&}sw%Zwx(rx!^%Z!^!_*g!_#O%Z#O#P&c#P#o%Z#o#p*g#p;'S%Z;'S;=`+a<%lO%Z07[$Aq|$i&j(Wp(Z!b'|0/l$]#t(T,2j(e$I[OX%ZXY+gYZ&cZ[+g[p%Zpq+gqr%Zrs&}st%ZtuEruw%Zwx(rx}%Z}!OGv!O!Q%Z!Q![Er![!^%Z!^!_*g!_!c%Z!c!}Er!}#O%Z#O#P&c#P#R%Z#R#SEr#S#T%Z#T#oEr#o#p*g#p$f%Z$f$g+g$g#BYEr#BY#BZ$A`#BZ$ISEr$IS$I_$A`$I_$JTEr$JT$JU$A`$JU$KVEr$KV$KW$A`$KW&FUEr&FU&FV$A`&FV;'SEr;'S;=`I|<%l?HTEr?HT?HU$A`?HUOEr07[$D|k$i&j(Wp(Z!b'}0/l$]#t(T,2j(e$I[OY%ZYZ&cZr%Zrs&}st%ZtuEruw%Zwx(rx}%Z}!OGv!O!Q%Z!Q![Er![!^%Z!^!_*g!_!c%Z!c!}Er!}#O%Z#O#P&c#P#R%Z#R#SEr#S#T%Z#T#oEr#o#p*g#p$g%Z$g;'SEr;'S;=`I|<%lOEr",
  tokenizers: [Km, Jm, eg, tg, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, Hm, new Fn("$S~RRtu[#O#Pg#S#T#|~_P#o#pb~gOx~~jVO#i!P#i#j!U#j#l!P#l#m!q#m;'S!P;'S;=`#v<%lO!P~!UO!U~~!XS!Q![!e!c!i!e#T#Z!e#o#p#Z~!hR!Q![!q!c!i!q#T#Z!q~!tR!Q![!}!c!i!}#T#Z!}~#QR!Q![!P!c!i!P#T#Z!P~#^R!Q![#g!c!i#g#T#Z#g~#jS!Q![#g!c!i#g#T#Z#g#q#r!P~#yP;=`<%l!P~$RO(c~~", 141, 340), new Fn("j~RQYZXz{^~^O(Q~~aP!P!Qd~iO(R~~", 25, 323)],
  topRules: { Script: [0, 7], SingleExpression: [1, 276], SingleClassItem: [2, 277] },
  dialects: { jsx: 0, ts: 15175 },
  dynamicPrecedences: { 80: 1, 82: 1, 94: 1, 169: 1, 199: 1 },
  specialized: [{ term: 327, get: (n) => ng[n] || -1 }, { term: 343, get: (n) => rg[n] || -1 }, { term: 95, get: (n) => Og[n] || -1 }],
  tokenPrec: 15201
}), Wh = [
  /* @__PURE__ */ fe("function ${name}(${params}) {\n	${}\n}", {
    label: "function",
    detail: "definition",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("for (let ${index} = 0; ${index} < ${bound}; ${index}++) {\n	${}\n}", {
    label: "for",
    detail: "loop",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("for (let ${name} of ${collection}) {\n	${}\n}", {
    label: "for",
    detail: "of loop",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("do {\n	${}\n} while (${})", {
    label: "do",
    detail: "loop",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("while (${}) {\n	${}\n}", {
    label: "while",
    detail: "loop",
    type: "keyword"
  }),
  /* @__PURE__ */ fe(`try {
	\${}
} catch (\${error}) {
	\${}
}`, {
    label: "try",
    detail: "/ catch block",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("if (${}) {\n	${}\n}", {
    label: "if",
    detail: "block",
    type: "keyword"
  }),
  /* @__PURE__ */ fe(`if (\${}) {
	\${}
} else {
	\${}
}`, {
    label: "if",
    detail: "/ else block",
    type: "keyword"
  }),
  /* @__PURE__ */ fe(`class \${name} {
	constructor(\${params}) {
		\${}
	}
}`, {
    label: "class",
    detail: "definition",
    type: "keyword"
  }),
  /* @__PURE__ */ fe('import {${names}} from "${module}"\n${}', {
    label: "import",
    detail: "named",
    type: "keyword"
  }),
  /* @__PURE__ */ fe('import ${name} from "${module}"\n${}', {
    label: "import",
    detail: "default",
    type: "keyword"
  })
], ag = /* @__PURE__ */ Wh.concat([
  /* @__PURE__ */ fe("interface ${name} {\n	${}\n}", {
    label: "interface",
    detail: "definition",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("type ${name} = ${type}", {
    label: "type",
    detail: "definition",
    type: "keyword"
  }),
  /* @__PURE__ */ fe("enum ${name} {\n	${}\n}", {
    label: "enum",
    detail: "definition",
    type: "keyword"
  })
]), bo = /* @__PURE__ */ new yc(), qh = /* @__PURE__ */ new Set([
  "Script",
  "Block",
  "FunctionExpression",
  "FunctionDeclaration",
  "ArrowFunction",
  "MethodDeclaration",
  "ForStatement"
]);
function Si(n) {
  return (e, t) => {
    let i = e.node.getChild("VariableDefinition");
    return i && t(i, n), !0;
  };
}
const og = ["FunctionDeclaration"], lg = {
  FunctionDeclaration: /* @__PURE__ */ Si("function"),
  ClassDeclaration: /* @__PURE__ */ Si("class"),
  ClassExpression: () => !0,
  EnumDeclaration: /* @__PURE__ */ Si("constant"),
  TypeAliasDeclaration: /* @__PURE__ */ Si("type"),
  NamespaceDeclaration: /* @__PURE__ */ Si("namespace"),
  VariableDefinition(n, e) {
    n.matchContext(og) || e(n, "variable");
  },
  TypeDefinition(n, e) {
    e(n, "type");
  },
  __proto__: null
};
function Ch(n, e) {
  let t = bo.get(e);
  if (t)
    return t;
  let i = [], r = !0;
  function O(s, a) {
    let o = n.sliceString(s.from, s.to);
    i.push({ label: o, type: a });
  }
  return e.cursor(A.IncludeAnonymous).iterate((s) => {
    if (r)
      r = !1;
    else if (s.name) {
      let a = lg[s.name];
      if (a && a(s, O) || qh.has(s.name))
        return !1;
    } else if (s.to - s.from > 8192) {
      for (let a of Ch(n, s.node))
        i.push(a);
      return !1;
    }
  }), bo.set(e, i), i;
}
const wo = /^[\w$\xa1-\uffff][\w$\d\xa1-\uffff]*$/, Uh = [
  "TemplateString",
  "String",
  "RegExp",
  "LineComment",
  "BlockComment",
  "VariableDefinition",
  "TypeDefinition",
  "Label",
  "PropertyDefinition",
  "PropertyName",
  "PrivatePropertyDefinition",
  "PrivatePropertyName",
  "JSXText",
  "JSXAttributeValue",
  "JSXOpenTag",
  "JSXCloseTag",
  "JSXSelfClosingTag",
  ".",
  "?."
];
function cg(n) {
  let e = I(n.state).resolveInner(n.pos, -1);
  if (Uh.indexOf(e.name) > -1)
    return null;
  let t = e.name == "VariableName" || e.to - e.from < 20 && wo.test(n.state.sliceDoc(e.from, e.to));
  if (!t && !n.explicit)
    return null;
  let i = [];
  for (let r = e; r; r = r.parent)
    qh.has(r.name) && (i = i.concat(Ch(n.state.doc, r)));
  return {
    options: i,
    from: t ? e.from : n.pos,
    validFor: wo
  };
}
const He = /* @__PURE__ */ at.define({
  name: "javascript",
  parser: /* @__PURE__ */ sg.configure({
    props: [
      /* @__PURE__ */ Ut.add({
        IfStatement: /* @__PURE__ */ Fe({ except: /^\s*({|else\b)/ }),
        TryStatement: /* @__PURE__ */ Fe({ except: /^\s*({|catch\b|finally\b)/ }),
        LabeledStatement: Ad,
        SwitchBody: (n) => {
          let e = n.textAfter, t = /^\s*\}/.test(e), i = /^\s*(case|default)\b/.test(e);
          return n.baseIndent + (t ? 0 : i ? 1 : 2) * n.unit;
        },
        Block: /* @__PURE__ */ Rc({ closing: "}" }),
        ArrowFunction: (n) => n.baseIndent + n.unit,
        "TemplateString BlockComment": () => null,
        "Statement Property": /* @__PURE__ */ Fe({ except: /^\s*{/ }),
        JSXElement(n) {
          let e = /^\s*<\//.test(n.textAfter);
          return n.lineIndent(n.node.from) + (e ? 0 : n.unit);
        },
        JSXEscape(n) {
          let e = /\s*\}/.test(n.textAfter);
          return n.lineIndent(n.node.from) + (e ? 0 : n.unit);
        },
        "JSXOpenTag JSXSelfClosingTag"(n) {
          return n.column(n.node.from) + n.unit;
        }
      }),
      /* @__PURE__ */ At.add({
        "Block ClassBody SwitchBody EnumBody ObjectExpression ArrayExpression ObjectType": hr,
        BlockComment(n) {
          return { from: n.from + 2, to: n.to - 2 };
        }
      })
    ]
  }),
  languageData: {
    closeBrackets: { brackets: ["(", "[", "{", "'", '"', "`"] },
    commentTokens: { line: "//", block: { open: "/*", close: "*/" } },
    indentOnInput: /^\s*(?:case |default:|\{|\}|<\/)$/,
    wordChars: "$"
  }
}), Ah = {
  test: (n) => /^JSX/.test(n.name),
  facet: /* @__PURE__ */ Xc({ commentTokens: { block: { open: "{/*", close: "*/}" } } })
}, Gh = /* @__PURE__ */ He.configure({ dialect: "ts" }, "typescript"), jh = /* @__PURE__ */ He.configure({
  dialect: "jsx",
  props: [/* @__PURE__ */ Qs.add((n) => n.isTop ? [Ah] : void 0)]
}), Mh = /* @__PURE__ */ He.configure({
  dialect: "jsx ts",
  props: [/* @__PURE__ */ Qs.add((n) => n.isTop ? [Ah] : void 0)]
}, "typescript");
let Eh = (n) => ({ label: n, type: "keyword" });
const Lh = /* @__PURE__ */ "break case const continue default delete export extends false finally in instanceof let new return static super switch this throw true typeof var yield".split(" ").map(Eh), hg = /* @__PURE__ */ Lh.concat(/* @__PURE__ */ ["declare", "implements", "private", "protected", "public"].map(Eh));
function Xt(n = {}) {
  let e = n.jsx ? n.typescript ? Mh : jh : n.typescript ? Gh : He, t = n.typescript ? ag.concat(hg) : Wh.concat(Lh);
  return new hi(e, [
    He.data.of({
      autocomplete: Th(Uh, bs(t))
    }),
    He.data.of({
      autocomplete: cg
    }),
    n.jsx ? $g : []
  ]);
}
function fg(n) {
  for (; ; ) {
    if (n.name == "JSXOpenTag" || n.name == "JSXSelfClosingTag" || n.name == "JSXFragmentTag")
      return n;
    if (n.name == "JSXEscape" || !n.parent)
      return null;
    n = n.parent;
  }
}
function xo(n, e, t = n.length) {
  for (let i = e == null ? void 0 : e.firstChild; i; i = i.nextSibling)
    if (i.name == "JSXIdentifier" || i.name == "JSXBuiltin" || i.name == "JSXNamespacedName" || i.name == "JSXMemberExpression")
      return n.sliceString(i.from, Math.min(i.to, t));
  return "";
}
const ug = typeof navigator == "object" && /* @__PURE__ */ /Android\b/.test(navigator.userAgent), $g = /* @__PURE__ */ k.inputHandler.of((n, e, t, i, r) => {
  if ((ug ? n.composing : n.compositionStarted) || n.state.readOnly || e != t || i != ">" && i != "/" || !He.isActiveAt(n.state, e, -1))
    return !1;
  let O = r(), { state: s } = O, a = s.changeByRange((o) => {
    var l;
    let { head: c } = o, h = I(s).resolveInner(c - 1, -1), f;
    if (h.name == "JSXStartTag" && (h = h.parent), !(s.doc.sliceString(c - 1, c) != i || h.name == "JSXAttributeValue" && h.to > c)) {
      if (i == ">" && h.name == "JSXFragmentTag")
        return { range: o, changes: { from: c, insert: "</>" } };
      if (i == "/" && h.name == "JSXStartCloseTag") {
        let u = h.parent, d = u.parent;
        if (d && u.from == c - 2 && ((f = xo(s.doc, d.firstChild, c)) || ((l = d.firstChild) === null || l === void 0 ? void 0 : l.name) == "JSXFragmentTag")) {
          let p = `${f}>`;
          return { range: S.cursor(c + p.length, -1), changes: { from: c, insert: p } };
        }
      } else if (i == ">") {
        let u = fg(h);
        if (u && u.name == "JSXOpenTag" && !/^\/?>|^<\//.test(s.doc.sliceString(c, c + 2)) && (f = xo(s.doc, u, c)))
          return { range: o, changes: { from: c, insert: `</${f}>` } };
      }
    }
    return { range: o };
  });
  return a.changes.empty ? !1 : (n.dispatch([
    O,
    s.update(a, { userEvent: "input.complete", scrollIntoView: !0 })
  ]), !0);
}), dg = 55, pg = 1, Qg = 56, mg = 2, gg = 57, Sg = 3, ko = 4, Pg = 5, zs = 6, Dh = 7, Bh = 8, Ih = 9, Nh = 10, Tg = 11, yg = 12, bg = 13, Mr = 58, wg = 14, xg = 15, Xo = 59, Fh = 21, kg = 23, Hh = 24, Xg = 25, EO = 27, Kh = 28, vg = 29, Zg = 32, Rg = 35, zg = 37, _g = 38, Yg = 0, Vg = 1, Wg = {
  area: !0,
  base: !0,
  br: !0,
  col: !0,
  command: !0,
  embed: !0,
  frame: !0,
  hr: !0,
  img: !0,
  input: !0,
  keygen: !0,
  link: !0,
  meta: !0,
  param: !0,
  source: !0,
  track: !0,
  wbr: !0,
  menuitem: !0
}, qg = {
  dd: !0,
  li: !0,
  optgroup: !0,
  option: !0,
  p: !0,
  rp: !0,
  rt: !0,
  tbody: !0,
  td: !0,
  tfoot: !0,
  th: !0,
  tr: !0
}, vo = {
  dd: { dd: !0, dt: !0 },
  dt: { dd: !0, dt: !0 },
  li: { li: !0 },
  option: { option: !0, optgroup: !0 },
  optgroup: { optgroup: !0 },
  p: {
    address: !0,
    article: !0,
    aside: !0,
    blockquote: !0,
    dir: !0,
    div: !0,
    dl: !0,
    fieldset: !0,
    footer: !0,
    form: !0,
    h1: !0,
    h2: !0,
    h3: !0,
    h4: !0,
    h5: !0,
    h6: !0,
    header: !0,
    hgroup: !0,
    hr: !0,
    menu: !0,
    nav: !0,
    ol: !0,
    p: !0,
    pre: !0,
    section: !0,
    table: !0,
    ul: !0
  },
  rp: { rp: !0, rt: !0 },
  rt: { rp: !0, rt: !0 },
  tbody: { tbody: !0, tfoot: !0 },
  td: { td: !0, th: !0 },
  tfoot: { tbody: !0 },
  th: { td: !0, th: !0 },
  thead: { tbody: !0, tfoot: !0 },
  tr: { tr: !0 }
};
function Cg(n) {
  return n == 45 || n == 46 || n == 58 || n >= 65 && n <= 90 || n == 95 || n >= 97 && n <= 122 || n >= 161;
}
let Zo = null, Ro = null, zo = 0;
function LO(n, e) {
  let t = n.pos + e;
  if (zo == t && Ro == n) return Zo;
  let i = n.peek(e), r = "";
  for (; Cg(i); )
    r += String.fromCharCode(i), i = n.peek(++e);
  return Ro = n, zo = t, Zo = r ? r.toLowerCase() : i == Ug || i == Ag ? void 0 : null;
}
const Jh = 60, Hn = 62, _s = 47, Ug = 63, Ag = 33, Gg = 45;
function _o(n, e) {
  this.name = n, this.parent = e;
}
const jg = [zs, Nh, Dh, Bh, Ih], Mg = new Yh({
  start: null,
  shift(n, e, t, i) {
    return jg.indexOf(e) > -1 ? new _o(LO(i, 1) || "", n) : n;
  },
  reduce(n, e) {
    return e == Fh && n ? n.parent : n;
  },
  reuse(n, e, t, i) {
    let r = e.type.id;
    return r == zs || r == zg ? new _o(LO(i, 1) || "", n) : n;
  },
  strict: !1
}), Eg = new te((n, e) => {
  if (n.next != Jh) {
    n.next < 0 && e.context && n.acceptToken(Mr);
    return;
  }
  n.advance();
  let t = n.next == _s;
  t && n.advance();
  let i = LO(n, 0);
  if (i === void 0) return;
  if (!i) return n.acceptToken(t ? xg : wg);
  let r = e.context ? e.context.name : null;
  if (t) {
    if (i == r) return n.acceptToken(Tg);
    if (r && qg[r]) return n.acceptToken(Mr, -2);
    if (e.dialectEnabled(Yg)) return n.acceptToken(yg);
    for (let O = e.context; O; O = O.parent) if (O.name == i) return;
    n.acceptToken(bg);
  } else {
    if (i == "script") return n.acceptToken(Dh);
    if (i == "style") return n.acceptToken(Bh);
    if (i == "textarea") return n.acceptToken(Ih);
    if (Wg.hasOwnProperty(i)) return n.acceptToken(Nh);
    r && vo[r] && vo[r][i] ? n.acceptToken(Mr, -1) : n.acceptToken(zs);
  }
}, { contextual: !0 }), Lg = new te((n) => {
  for (let e = 0, t = 0; ; t++) {
    if (n.next < 0) {
      t && n.acceptToken(Xo);
      break;
    }
    if (n.next == Gg)
      e++;
    else if (n.next == Hn && e >= 2) {
      t >= 3 && n.acceptToken(Xo, -2);
      break;
    } else
      e = 0;
    n.advance();
  }
});
function Dg(n) {
  for (; n; n = n.parent)
    if (n.name == "svg" || n.name == "math") return !0;
  return !1;
}
const Bg = new te((n, e) => {
  if (n.next == _s && n.peek(1) == Hn) {
    let t = e.dialectEnabled(Vg) || Dg(e.context);
    n.acceptToken(t ? Pg : ko, 2);
  } else n.next == Hn && n.acceptToken(ko, 1);
});
function Ys(n, e, t) {
  let i = 2 + n.length;
  return new te((r) => {
    for (let O = 0, s = 0, a = 0; ; a++) {
      if (r.next < 0) {
        a && r.acceptToken(e);
        break;
      }
      if (O == 0 && r.next == Jh || O == 1 && r.next == _s || O >= 2 && O < i && r.next == n.charCodeAt(O - 2))
        O++, s++;
      else if (O == i && r.next == Hn) {
        a > s ? r.acceptToken(e, -s) : r.acceptToken(t, -(s - 2));
        break;
      } else if ((r.next == 10 || r.next == 13) && a) {
        r.acceptToken(e, 1);
        break;
      } else
        O = s = 0;
      r.advance();
    }
  });
}
const Ig = Ys("script", dg, pg), Ng = Ys("style", Qg, mg), Fg = Ys("textarea", gg, Sg), Hg = Ct({
  "Text RawText IncompleteTag IncompleteCloseTag": $.content,
  "StartTag StartCloseTag SelfClosingEndTag EndTag": $.angleBracket,
  TagName: $.tagName,
  "MismatchedCloseTag/TagName": [$.tagName, $.invalid],
  AttributeName: $.attributeName,
  "AttributeValue UnquotedAttributeValue": $.attributeValue,
  Is: $.definitionOperator,
  "EntityReference CharacterReference": $.character,
  Comment: $.blockComment,
  ProcessingInst: $.processingInstruction,
  DoctypeDecl: $.documentMeta
}), Kg = ot.deserialize({
  version: 14,
  states: ",xOVO!rOOO!ZQ#tO'#CrO!`Q#tO'#C{O!eQ#tO'#DOO!jQ#tO'#DRO!oQ#tO'#DTO!tOaO'#CqO#PObO'#CqO#[OdO'#CqO$kO!rO'#CqOOO`'#Cq'#CqO$rO$fO'#DUO$zQ#tO'#DWO%PQ#tO'#DXOOO`'#Dl'#DlOOO`'#DZ'#DZQVO!rOOO%UQ&rO,59^O%aQ&rO,59gO%lQ&rO,59jO%wQ&rO,59mO&SQ&rO,59oOOOa'#D_'#D_O&_OaO'#CyO&jOaO,59]OOOb'#D`'#D`O&rObO'#C|O&}ObO,59]OOOd'#Da'#DaO'VOdO'#DPO'bOdO,59]OOO`'#Db'#DbO'jO!rO,59]O'qQ#tO'#DSOOO`,59],59]OOOp'#Dc'#DcO'vO$fO,59pOOO`,59p,59pO(OQ#|O,59rO(TQ#|O,59sOOO`-E7X-E7XO(YQ&rO'#CtOOQW'#D['#D[O(hQ&rO1G.xOOOa1G.x1G.xOOO`1G/Z1G/ZO(sQ&rO1G/ROOOb1G/R1G/RO)OQ&rO1G/UOOOd1G/U1G/UO)ZQ&rO1G/XOOO`1G/X1G/XO)fQ&rO1G/ZOOOa-E7]-E7]O)qQ#tO'#CzOOO`1G.w1G.wOOOb-E7^-E7^O)vQ#tO'#C}OOOd-E7_-E7_O){Q#tO'#DQOOO`-E7`-E7`O*QQ#|O,59nOOOp-E7a-E7aOOO`1G/[1G/[OOO`1G/^1G/^OOO`1G/_1G/_O*VQ,UO,59`OOQW-E7Y-E7YOOOa7+$d7+$dOOO`7+$u7+$uOOOb7+$m7+$mOOOd7+$p7+$pOOO`7+$s7+$sO*bQ#|O,59fO*gQ#|O,59iO*lQ#|O,59lOOO`1G/Y1G/YO*qO7[O'#CwO+SOMhO'#CwOOQW1G.z1G.zOOO`1G/Q1G/QOOO`1G/T1G/TOOO`1G/W1G/WOOOO'#D]'#D]O+eO7[O,59cOOQW,59c,59cOOOO'#D^'#D^O+vOMhO,59cOOOO-E7Z-E7ZOOQW1G.}1G.}OOOO-E7[-E7[",
  stateData: ",c~O!_OS~OUSOVPOWQOXROYTO[]O][O^^O_^Oa^Ob^Oc^Od^Oy^O|_O!eZO~OgaO~OgbO~OgcO~OgdO~OgeO~O!XfOPmP![mP~O!YiOQpP![pP~O!ZlORsP![sP~OUSOVPOWQOXROYTOZqO[]O][O^^O_^Oa^Ob^Oc^Od^Oy^O!eZO~O![rO~P#gO!]sO!fuO~OgvO~OgwO~OS|OT}OiyO~OS!POT}OiyO~OS!ROT}OiyO~OS!TOT}OiyO~OS}OT}OiyO~O!XfOPmX![mX~OP!WO![!XO~O!YiOQpX![pX~OQ!ZO![!XO~O!ZlORsX![sX~OR!]O![!XO~O![!XO~P#gOg!_O~O!]sO!f!aO~OS!bO~OS!cO~Oj!dOShXThXihX~OS!fOT!gOiyO~OS!hOT!gOiyO~OS!iOT!gOiyO~OS!jOT!gOiyO~OS!gOT!gOiyO~Og!kO~Og!lO~Og!mO~OS!nO~Ol!qO!a!oO!c!pO~OS!rO~OS!sO~OS!tO~Ob!uOc!uOd!uO!a!wO!b!uO~Ob!xOc!xOd!xO!c!wO!d!xO~Ob!uOc!uOd!uO!a!{O!b!uO~Ob!xOc!xOd!xO!c!{O!d!xO~OT~cbd!ey|!e~",
  goto: "%q!aPPPPPPPPPPPPPPPPPPPPP!b!hP!nPP!zP!}#Q#T#Z#^#a#g#j#m#s#y!bP!b!bP$P$V$m$s$y%P%V%]%cPPPPPPPP%iX^OX`pXUOX`pezabcde{!O!Q!S!UR!q!dRhUR!XhXVOX`pRkVR!XkXWOX`pRnWR!XnXXOX`pQrXR!XpXYOX`pQ`ORx`Q{aQ!ObQ!QcQ!SdQ!UeZ!e{!O!Q!S!UQ!v!oR!z!vQ!y!pR!|!yQgUR!VgQjVR!YjQmWR![mQpXR!^pQtZR!`tS_O`ToXp",
  nodeNames: "⚠ StartCloseTag StartCloseTag StartCloseTag EndTag SelfClosingEndTag StartTag StartTag StartTag StartTag StartTag StartCloseTag StartCloseTag StartCloseTag IncompleteTag IncompleteCloseTag Document Text EntityReference CharacterReference InvalidEntity Element OpenTag TagName Attribute AttributeName Is AttributeValue UnquotedAttributeValue ScriptText CloseTag OpenTag StyleText CloseTag OpenTag TextareaText CloseTag OpenTag CloseTag SelfClosingTag Comment ProcessingInst MismatchedCloseTag CloseTag DoctypeDecl",
  maxTerm: 68,
  context: Mg,
  nodeProps: [
    ["closedBy", -10, 1, 2, 3, 7, 8, 9, 10, 11, 12, 13, "EndTag", 6, "EndTag SelfClosingEndTag", -4, 22, 31, 34, 37, "CloseTag"],
    ["openedBy", 4, "StartTag StartCloseTag", 5, "StartTag", -4, 30, 33, 36, 38, "OpenTag"],
    ["group", -10, 14, 15, 18, 19, 20, 21, 40, 41, 42, 43, "Entity", 17, "Entity TextContent", -3, 29, 32, 35, "TextContent Entity"],
    ["isolate", -11, 22, 30, 31, 33, 34, 36, 37, 38, 39, 42, 43, "ltr", -3, 27, 28, 40, ""]
  ],
  propSources: [Hg],
  skippedNodes: [0],
  repeatNodeCount: 9,
  tokenData: "!<p!aR!YOX$qXY,QYZ,QZ[$q[]&X]^,Q^p$qpq,Qqr-_rs3_sv-_vw3}wxHYx}-_}!OH{!O!P-_!P!Q$q!Q![-_![!]Mz!]!^-_!^!_!$S!_!`!;x!`!a&X!a!c-_!c!}Mz!}#R-_#R#SMz#S#T1k#T#oMz#o#s-_#s$f$q$f%W-_%W%oMz%o%p-_%p&aMz&a&b-_&b1pMz1p4U-_4U4dMz4d4e-_4e$ISMz$IS$I`-_$I`$IbMz$Ib$Kh-_$Kh%#tMz%#t&/x-_&/x&EtMz&Et&FV-_&FV;'SMz;'S;:j!#|;:j;=`3X<%l?&r-_?&r?AhMz?Ah?BY$q?BY?MnMz?MnO$q!Z$|caPlW!b`!dpOX$qXZ&XZ[$q[^&X^p$qpq&Xqr$qrs&}sv$qvw+Pwx(tx!^$q!^!_*V!_!a&X!a#S$q#S#T&X#T;'S$q;'S;=`+z<%lO$q!R&bXaP!b`!dpOr&Xrs&}sv&Xwx(tx!^&X!^!_*V!_;'S&X;'S;=`*y<%lO&Xq'UVaP!dpOv&}wx'kx!^&}!^!_(V!_;'S&};'S;=`(n<%lO&}P'pTaPOv'kw!^'k!_;'S'k;'S;=`(P<%lO'kP(SP;=`<%l'kp([S!dpOv(Vx;'S(V;'S;=`(h<%lO(Vp(kP;=`<%l(Vq(qP;=`<%l&}a({WaP!b`Or(trs'ksv(tw!^(t!^!_)e!_;'S(t;'S;=`*P<%lO(t`)jT!b`Or)esv)ew;'S)e;'S;=`)y<%lO)e`)|P;=`<%l)ea*SP;=`<%l(t!Q*^V!b`!dpOr*Vrs(Vsv*Vwx)ex;'S*V;'S;=`*s<%lO*V!Q*vP;=`<%l*V!R*|P;=`<%l&XW+UYlWOX+PZ[+P^p+Pqr+Psw+Px!^+P!a#S+P#T;'S+P;'S;=`+t<%lO+PW+wP;=`<%l+P!Z+}P;=`<%l$q!a,]`aP!b`!dp!_^OX&XXY,QYZ,QZ]&X]^,Q^p&Xpq,Qqr&Xrs&}sv&Xwx(tx!^&X!^!_*V!_;'S&X;'S;=`*y<%lO&X!_-ljiSaPlW!b`!dpOX$qXZ&XZ[$q[^&X^p$qpq&Xqr-_rs&}sv-_vw/^wx(tx!P-_!P!Q$q!Q!^-_!^!_*V!_!a&X!a#S-_#S#T1k#T#s-_#s$f$q$f;'S-_;'S;=`3X<%l?Ah-_?Ah?BY$q?BY?Mn-_?MnO$q[/ebiSlWOX+PZ[+P^p+Pqr/^sw/^x!P/^!P!Q+P!Q!^/^!a#S/^#S#T0m#T#s/^#s$f+P$f;'S/^;'S;=`1e<%l?Ah/^?Ah?BY+P?BY?Mn/^?MnO+PS0rXiSqr0msw0mx!P0m!Q!^0m!a#s0m$f;'S0m;'S;=`1_<%l?Ah0m?BY?Mn0mS1bP;=`<%l0m[1hP;=`<%l/^!V1vciSaP!b`!dpOq&Xqr1krs&}sv1kvw0mwx(tx!P1k!P!Q&X!Q!^1k!^!_*V!_!a&X!a#s1k#s$f&X$f;'S1k;'S;=`3R<%l?Ah1k?Ah?BY&X?BY?Mn1k?MnO&X!V3UP;=`<%l1k!_3[P;=`<%l-_!Z3hV!ahaP!dpOv&}wx'kx!^&}!^!_(V!_;'S&};'S;=`(n<%lO&}!_4WiiSlWd!ROX5uXZ7SZ[5u[^7S^p5uqr8trs7Sst>]tw8twx7Sx!P8t!P!Q5u!Q!]8t!]!^/^!^!a7S!a#S8t#S#T;{#T#s8t#s$f5u$f;'S8t;'S;=`>V<%l?Ah8t?Ah?BY5u?BY?Mn8t?MnO5u!Z5zblWOX5uXZ7SZ[5u[^7S^p5uqr5urs7Sst+Ptw5uwx7Sx!]5u!]!^7w!^!a7S!a#S5u#S#T7S#T;'S5u;'S;=`8n<%lO5u!R7VVOp7Sqs7St!]7S!]!^7l!^;'S7S;'S;=`7q<%lO7S!R7qOb!R!R7tP;=`<%l7S!Z8OYlWb!ROX+PZ[+P^p+Pqr+Psw+Px!^+P!a#S+P#T;'S+P;'S;=`+t<%lO+P!Z8qP;=`<%l5u!_8{iiSlWOX5uXZ7SZ[5u[^7S^p5uqr8trs7Sst/^tw8twx7Sx!P8t!P!Q5u!Q!]8t!]!^:j!^!a7S!a#S8t#S#T;{#T#s8t#s$f5u$f;'S8t;'S;=`>V<%l?Ah8t?Ah?BY5u?BY?Mn8t?MnO5u!_:sbiSlWb!ROX+PZ[+P^p+Pqr/^sw/^x!P/^!P!Q+P!Q!^/^!a#S/^#S#T0m#T#s/^#s$f+P$f;'S/^;'S;=`1e<%l?Ah/^?Ah?BY+P?BY?Mn/^?MnO+P!V<QciSOp7Sqr;{rs7Sst0mtw;{wx7Sx!P;{!P!Q7S!Q!];{!]!^=]!^!a7S!a#s;{#s$f7S$f;'S;{;'S;=`>P<%l?Ah;{?Ah?BY7S?BY?Mn;{?MnO7S!V=dXiSb!Rqr0msw0mx!P0m!Q!^0m!a#s0m$f;'S0m;'S;=`1_<%l?Ah0m?BY?Mn0m!V>SP;=`<%l;{!_>YP;=`<%l8t!_>dhiSlWOX@OXZAYZ[@O[^AY^p@OqrBwrsAYswBwwxAYx!PBw!P!Q@O!Q!]Bw!]!^/^!^!aAY!a#SBw#S#TE{#T#sBw#s$f@O$f;'SBw;'S;=`HS<%l?AhBw?Ah?BY@O?BY?MnBw?MnO@O!Z@TalWOX@OXZAYZ[@O[^AY^p@Oqr@OrsAYsw@OwxAYx!]@O!]!^Az!^!aAY!a#S@O#S#TAY#T;'S@O;'S;=`Bq<%lO@O!RA]UOpAYq!]AY!]!^Ao!^;'SAY;'S;=`At<%lOAY!RAtOc!R!RAwP;=`<%lAY!ZBRYlWc!ROX+PZ[+P^p+Pqr+Psw+Px!^+P!a#S+P#T;'S+P;'S;=`+t<%lO+P!ZBtP;=`<%l@O!_COhiSlWOX@OXZAYZ[@O[^AY^p@OqrBwrsAYswBwwxAYx!PBw!P!Q@O!Q!]Bw!]!^Dj!^!aAY!a#SBw#S#TE{#T#sBw#s$f@O$f;'SBw;'S;=`HS<%l?AhBw?Ah?BY@O?BY?MnBw?MnO@O!_DsbiSlWc!ROX+PZ[+P^p+Pqr/^sw/^x!P/^!P!Q+P!Q!^/^!a#S/^#S#T0m#T#s/^#s$f+P$f;'S/^;'S;=`1e<%l?Ah/^?Ah?BY+P?BY?Mn/^?MnO+P!VFQbiSOpAYqrE{rsAYswE{wxAYx!PE{!P!QAY!Q!]E{!]!^GY!^!aAY!a#sE{#s$fAY$f;'SE{;'S;=`G|<%l?AhE{?Ah?BYAY?BY?MnE{?MnOAY!VGaXiSc!Rqr0msw0mx!P0m!Q!^0m!a#s0m$f;'S0m;'S;=`1_<%l?Ah0m?BY?Mn0m!VHPP;=`<%lE{!_HVP;=`<%lBw!ZHcW!cxaP!b`Or(trs'ksv(tw!^(t!^!_)e!_;'S(t;'S;=`*P<%lO(t!aIYliSaPlW!b`!dpOX$qXZ&XZ[$q[^&X^p$qpq&Xqr-_rs&}sv-_vw/^wx(tx}-_}!OKQ!O!P-_!P!Q$q!Q!^-_!^!_*V!_!a&X!a#S-_#S#T1k#T#s-_#s$f$q$f;'S-_;'S;=`3X<%l?Ah-_?Ah?BY$q?BY?Mn-_?MnO$q!aK_kiSaPlW!b`!dpOX$qXZ&XZ[$q[^&X^p$qpq&Xqr-_rs&}sv-_vw/^wx(tx!P-_!P!Q$q!Q!^-_!^!_*V!_!`&X!`!aMS!a#S-_#S#T1k#T#s-_#s$f$q$f;'S-_;'S;=`3X<%l?Ah-_?Ah?BY$q?BY?Mn-_?MnO$q!TM_XaP!b`!dp!fQOr&Xrs&}sv&Xwx(tx!^&X!^!_*V!_;'S&X;'S;=`*y<%lO&X!aNZ!ZiSgQaPlW!b`!dpOX$qXZ&XZ[$q[^&X^p$qpq&Xqr-_rs&}sv-_vw/^wx(tx}-_}!OMz!O!PMz!P!Q$q!Q![Mz![!]Mz!]!^-_!^!_*V!_!a&X!a!c-_!c!}Mz!}#R-_#R#SMz#S#T1k#T#oMz#o#s-_#s$f$q$f$}-_$}%OMz%O%W-_%W%oMz%o%p-_%p&aMz&a&b-_&b1pMz1p4UMz4U4dMz4d4e-_4e$ISMz$IS$I`-_$I`$IbMz$Ib$Je-_$Je$JgMz$Jg$Kh-_$Kh%#tMz%#t&/x-_&/x&EtMz&Et&FV-_&FV;'SMz;'S;:j!#|;:j;=`3X<%l?&r-_?&r?AhMz?Ah?BY$q?BY?MnMz?MnO$q!a!$PP;=`<%lMz!R!$ZY!b`!dpOq*Vqr!$yrs(Vsv*Vwx)ex!a*V!a!b!4t!b;'S*V;'S;=`*s<%lO*V!R!%Q]!b`!dpOr*Vrs(Vsv*Vwx)ex}*V}!O!%y!O!f*V!f!g!']!g#W*V#W#X!0`#X;'S*V;'S;=`*s<%lO*V!R!&QX!b`!dpOr*Vrs(Vsv*Vwx)ex}*V}!O!&m!O;'S*V;'S;=`*s<%lO*V!R!&vV!b`!dp!ePOr*Vrs(Vsv*Vwx)ex;'S*V;'S;=`*s<%lO*V!R!'dX!b`!dpOr*Vrs(Vsv*Vwx)ex!q*V!q!r!(P!r;'S*V;'S;=`*s<%lO*V!R!(WX!b`!dpOr*Vrs(Vsv*Vwx)ex!e*V!e!f!(s!f;'S*V;'S;=`*s<%lO*V!R!(zX!b`!dpOr*Vrs(Vsv*Vwx)ex!v*V!v!w!)g!w;'S*V;'S;=`*s<%lO*V!R!)nX!b`!dpOr*Vrs(Vsv*Vwx)ex!{*V!{!|!*Z!|;'S*V;'S;=`*s<%lO*V!R!*bX!b`!dpOr*Vrs(Vsv*Vwx)ex!r*V!r!s!*}!s;'S*V;'S;=`*s<%lO*V!R!+UX!b`!dpOr*Vrs(Vsv*Vwx)ex!g*V!g!h!+q!h;'S*V;'S;=`*s<%lO*V!R!+xY!b`!dpOr!+qrs!,hsv!+qvw!-Swx!.[x!`!+q!`!a!/j!a;'S!+q;'S;=`!0Y<%lO!+qq!,mV!dpOv!,hvx!-Sx!`!,h!`!a!-q!a;'S!,h;'S;=`!.U<%lO!,hP!-VTO!`!-S!`!a!-f!a;'S!-S;'S;=`!-k<%lO!-SP!-kO|PP!-nP;=`<%l!-Sq!-xS!dp|POv(Vx;'S(V;'S;=`(h<%lO(Vq!.XP;=`<%l!,ha!.aX!b`Or!.[rs!-Ssv!.[vw!-Sw!`!.[!`!a!.|!a;'S!.[;'S;=`!/d<%lO!.[a!/TT!b`|POr)esv)ew;'S)e;'S;=`)y<%lO)ea!/gP;=`<%l!.[!R!/sV!b`!dp|POr*Vrs(Vsv*Vwx)ex;'S*V;'S;=`*s<%lO*V!R!0]P;=`<%l!+q!R!0gX!b`!dpOr*Vrs(Vsv*Vwx)ex#c*V#c#d!1S#d;'S*V;'S;=`*s<%lO*V!R!1ZX!b`!dpOr*Vrs(Vsv*Vwx)ex#V*V#V#W!1v#W;'S*V;'S;=`*s<%lO*V!R!1}X!b`!dpOr*Vrs(Vsv*Vwx)ex#h*V#h#i!2j#i;'S*V;'S;=`*s<%lO*V!R!2qX!b`!dpOr*Vrs(Vsv*Vwx)ex#m*V#m#n!3^#n;'S*V;'S;=`*s<%lO*V!R!3eX!b`!dpOr*Vrs(Vsv*Vwx)ex#d*V#d#e!4Q#e;'S*V;'S;=`*s<%lO*V!R!4XX!b`!dpOr*Vrs(Vsv*Vwx)ex#X*V#X#Y!+q#Y;'S*V;'S;=`*s<%lO*V!R!4{Y!b`!dpOr!4trs!5ksv!4tvw!6Vwx!8]x!a!4t!a!b!:]!b;'S!4t;'S;=`!;r<%lO!4tq!5pV!dpOv!5kvx!6Vx!a!5k!a!b!7W!b;'S!5k;'S;=`!8V<%lO!5kP!6YTO!a!6V!a!b!6i!b;'S!6V;'S;=`!7Q<%lO!6VP!6lTO!`!6V!`!a!6{!a;'S!6V;'S;=`!7Q<%lO!6VP!7QOyPP!7TP;=`<%l!6Vq!7]V!dpOv!5kvx!6Vx!`!5k!`!a!7r!a;'S!5k;'S;=`!8V<%lO!5kq!7yS!dpyPOv(Vx;'S(V;'S;=`(h<%lO(Vq!8YP;=`<%l!5ka!8bX!b`Or!8]rs!6Vsv!8]vw!6Vw!a!8]!a!b!8}!b;'S!8];'S;=`!:V<%lO!8]a!9SX!b`Or!8]rs!6Vsv!8]vw!6Vw!`!8]!`!a!9o!a;'S!8];'S;=`!:V<%lO!8]a!9vT!b`yPOr)esv)ew;'S)e;'S;=`)y<%lO)ea!:YP;=`<%l!8]!R!:dY!b`!dpOr!4trs!5ksv!4tvw!6Vwx!8]x!`!4t!`!a!;S!a;'S!4t;'S;=`!;r<%lO!4t!R!;]V!b`!dpyPOr*Vrs(Vsv*Vwx)ex;'S*V;'S;=`*s<%lO*V!R!;uP;=`<%l!4t!V!<TXjSaP!b`!dpOr&Xrs&}sv&Xwx(tx!^&X!^!_*V!_;'S&X;'S;=`*y<%lO&X",
  tokenizers: [Ig, Ng, Fg, Bg, Eg, Lg, 0, 1, 2, 3, 4, 5],
  topRules: { Document: [0, 16] },
  dialects: { noMatch: 0, selfClosing: 515 },
  tokenPrec: 517
});
function ef(n, e) {
  let t = /* @__PURE__ */ Object.create(null);
  for (let i of n.getChildren(Hh)) {
    let r = i.getChild(Xg), O = i.getChild(EO) || i.getChild(Kh);
    r && (t[e.read(r.from, r.to)] = O ? O.type.id == EO ? e.read(O.from + 1, O.to - 1) : e.read(O.from, O.to) : "");
  }
  return t;
}
function Yo(n, e) {
  let t = n.getChild(kg);
  return t ? e.read(t.from, t.to) : " ";
}
function Er(n, e, t) {
  let i;
  for (let r of t)
    if (!r.attrs || r.attrs(i || (i = ef(n.node.parent.firstChild, e))))
      return { parser: r.parser, bracketed: !0 };
  return null;
}
function tf(n = [], e = []) {
  let t = [], i = [], r = [], O = [];
  for (let a of n)
    (a.tag == "script" ? t : a.tag == "style" ? i : a.tag == "textarea" ? r : O).push(a);
  let s = e.length ? /* @__PURE__ */ Object.create(null) : null;
  for (let a of e) (s[a.name] || (s[a.name] = [])).push(a);
  return wc((a, o) => {
    let l = a.type.id;
    if (l == vg) return Er(a, o, t);
    if (l == Zg) return Er(a, o, i);
    if (l == Rg) return Er(a, o, r);
    if (l == Fh && O.length) {
      let c = a.node, h = c.firstChild, f = h && Yo(h, o), u;
      if (f) {
        for (let d of O)
          if (d.tag == f && (!d.attrs || d.attrs(u || (u = ef(h, o))))) {
            let p = c.lastChild, Q = p.type.id == _g ? p.from : c.to;
            if (Q > h.to)
              return { parser: d.parser, overlay: [{ from: h.to, to: Q }] };
          }
      }
    }
    if (s && l == Hh) {
      let c = a.node, h;
      if (h = c.firstChild) {
        let f = s[o.read(h.from, h.to)];
        if (f) for (let u of f) {
          if (u.tagName && u.tagName != Yo(c.parent, o)) continue;
          let d = c.lastChild;
          if (d.type.id == EO) {
            let p = d.from + 1, Q = d.lastChild, m = d.to - (Q && Q.isError ? 0 : 1);
            if (m > p) return { parser: u.parser, overlay: [{ from: p, to: m }], bracketed: !0 };
          } else if (d.type.id == Kh)
            return { parser: u.parser, overlay: [{ from: d.from, to: d.to }] };
        }
      }
    }
    return null;
  });
}
const Jg = 122, Vo = 1, eS = 123, tS = 124, nf = 2, iS = 125, nS = 3, rS = 4, rf = [
  9,
  10,
  11,
  12,
  13,
  32,
  133,
  160,
  5760,
  8192,
  8193,
  8194,
  8195,
  8196,
  8197,
  8198,
  8199,
  8200,
  8201,
  8202,
  8232,
  8233,
  8239,
  8287,
  12288
], OS = 58, sS = 40, Of = 95, aS = 91, kn = 45, oS = 46, lS = 35, cS = 37, hS = 38, fS = 92, uS = 10, $S = 42;
function Li(n) {
  return n >= 65 && n <= 90 || n >= 97 && n <= 122 || n >= 161;
}
function Vs(n) {
  return n >= 48 && n <= 57;
}
function Wo(n) {
  return Vs(n) || n >= 97 && n <= 102 || n >= 65 && n <= 70;
}
const sf = (n, e, t) => (i, r) => {
  for (let O = !1, s = 0, a = 0; ; a++) {
    let { next: o } = i;
    if (Li(o) || o == kn || o == Of || O && Vs(o))
      !O && (o != kn || a > 0) && (O = !0), s === a && o == kn && s++, i.advance();
    else if (o == fS && i.peek(1) != uS) {
      if (i.advance(), Wo(i.next)) {
        do
          i.advance();
        while (Wo(i.next));
        i.next == 32 && i.advance();
      } else i.next > -1 && i.advance();
      O = !0;
    } else {
      O && i.acceptToken(
        s == 2 && r.canShift(nf) ? e : o == sS ? t : n
      );
      break;
    }
  }
}, dS = new te(
  sf(eS, nf, tS)
), pS = new te(
  sf(iS, nS, rS)
), QS = new te((n) => {
  if (rf.includes(n.peek(-1))) {
    let { next: e } = n;
    (Li(e) || e == Of || e == lS || e == oS || e == $S || e == aS || e == OS && Li(n.peek(1)) || e == kn || e == hS) && n.acceptToken(Jg);
  }
}), mS = new te((n) => {
  if (!rf.includes(n.peek(-1))) {
    let { next: e } = n;
    if (e == cS && (n.advance(), n.acceptToken(Vo)), Li(e)) {
      do
        n.advance();
      while (Li(n.next) || Vs(n.next));
      n.acceptToken(Vo);
    }
  }
}), gS = Ct({
  "AtKeyword import charset namespace keyframes media supports": $.definitionKeyword,
  "from to selector": $.keyword,
  NamespaceName: $.namespace,
  KeyframeName: $.labelName,
  KeyframeRangeName: $.operatorKeyword,
  TagName: $.tagName,
  ClassName: $.className,
  PseudoClassName: $.constant($.className),
  IdName: $.labelName,
  "FeatureName PropertyName": $.propertyName,
  AttributeName: $.attributeName,
  NumberLiteral: $.number,
  KeywordQuery: $.keyword,
  UnaryQueryOp: $.operatorKeyword,
  "CallTag ValueName": $.atom,
  VariableName: $.variableName,
  Callee: $.operatorKeyword,
  Unit: $.unit,
  "UniversalSelector NestingSelector": $.definitionOperator,
  "MatchOp CompareOp": $.compareOperator,
  "ChildOp SiblingOp, LogicOp": $.logicOperator,
  BinOp: $.arithmeticOperator,
  Important: $.modifier,
  Comment: $.blockComment,
  ColorLiteral: $.color,
  "ParenthesizedContent StringLiteral": $.string,
  ":": $.punctuation,
  "PseudoOp #": $.derefOperator,
  "; ,": $.separator,
  "( )": $.paren,
  "[ ]": $.squareBracket,
  "{ }": $.brace
}), SS = { __proto__: null, lang: 38, "nth-child": 38, "nth-last-child": 38, "nth-of-type": 38, "nth-last-of-type": 38, dir: 38, "host-context": 38, if: 84, url: 124, "url-prefix": 124, domain: 124, regexp: 124 }, PS = { __proto__: null, or: 98, and: 98, not: 106, only: 106, layer: 170 }, TS = { __proto__: null, selector: 112, layer: 166 }, yS = { __proto__: null, "@import": 162, "@media": 174, "@charset": 178, "@namespace": 182, "@keyframes": 188, "@supports": 200, "@scope": 204 }, bS = { __proto__: null, to: 207 }, wS = ot.deserialize({
  version: 14,
  states: "EbQYQdOOO#qQdOOP#xO`OOOOQP'#Cf'#CfOOQP'#Ce'#CeO#}QdO'#ChO$nQaO'#CcO$xQdO'#CkO%TQdO'#DpO%YQdO'#DrO%_QdO'#DuO%_QdO'#DxOOQP'#FV'#FVO&eQhO'#EhOOQS'#FU'#FUOOQS'#Ek'#EkQYQdOOO&lQdO'#EOO&PQhO'#EUO&lQdO'#EWO'aQdO'#EYO'lQdO'#E]O'tQhO'#EcO(VQdO'#EeO(bQaO'#CfO)VQ`O'#D{O)[Q`O'#F`O)gQdO'#F`QOQ`OOP)qO&jO'#CaPOOO)C@t)C@tOOQP'#Cj'#CjOOQP,59S,59SO#}QdO,59SO)|QdO,59VO%TQdO,5:[O%YQdO,5:^O%_QdO,5:aO%_QdO,5:cO%_QdO,5:dO%_QdO'#ErO*XQ`O,58}O*aQdO'#DzOOQS,58},58}OOQP'#Cn'#CnOOQO'#Dn'#DnOOQP,59V,59VO*hQ`O,59VO*mQ`O,59VOOQP'#Dq'#DqOOQP,5:[,5:[OOQO'#Ds'#DsO*rQpO,5:^O+]QaO,5:aO+sQaO,5:dOOQW'#DZ'#DZO,ZQhO'#DdO,xQhO'#FaO'tQhO'#DbO-WQ`O'#DhOOQW'#F['#F[O-]Q`O,5;SO-eQ`O'#DeOOQS-E8i-E8iOOQ['#Cs'#CsO-jQdO'#CtO.QQdO'#CzO.hQdO'#C}O/OQ!pO'#DPO1RQ!jO,5:jOOQO'#DU'#DUO*mQ`O'#DTO1cQ!nO'#FXO3`Q`O'#DVO3eQ`O'#DkOOQ['#FX'#FXO-`Q`O,5:pO3jQ!bO,5:rOOQS'#E['#E[O3rQ`O,5:tO3wQdO,5:tOOQO'#E_'#E_O4PQ`O,5:wO4UQhO,5:}O%_QdO'#DgOOQS,5;P,5;PO-eQ`O,5;PO4^QdO,5;PO4fQdO,5:gO4vQdO'#EtO5TQ`O,5;zO5TQ`O,5;zPOOO'#Ej'#EjP5`O&jO,58{POOO,58{,58{OOQP1G.n1G.nOOQP1G.q1G.qO*hQ`O1G.qO*mQ`O1G.qOOQP1G/v1G/vO5kQpO1G/xO5sQaO1G/{O6ZQaO1G/}O6qQaO1G0OO7XQaO,5;^OOQO-E8p-E8pOOQS1G.i1G.iO7cQ`O,5:fO7hQdO'#DoO7oQdO'#CrOOQP1G/x1G/xO&lQdO1G/xO7vQ!jO'#DZO8UQ!bO,59vO8^QhO,5:OOOQO'#F]'#F]O8XQ!bO,59zO'tQhO,59xO8fQhO'#EvO8sQ`O,5;{O9OQhO,59|O9uQhO'#DiOOQW,5:S,5:SOOQS1G0n1G0nOOQW,5:P,5:PO9|Q!fO'#FYOOQS'#FY'#FYOOQS'#Em'#EmO;^QdO,59`OOQ[,59`,59`O;tQdO,59fOOQ[,59f,59fO<[QdO,59iOOQ[,59i,59iOOQ[,59k,59kO&lQdO,59mO<rQhO'#EQOOQW'#EQ'#EQO=WQ`O1G0UO1[QhO1G0UOOQ[,59o,59oO'tQhO'#DXOOQ[,59q,59qO=]Q#tO,5:VOOQS1G0[1G0[OOQS1G0^1G0^OOQS1G0`1G0`O=hQ`O1G0`O=mQdO'#E`OOQS1G0c1G0cOOQS1G0i1G0iO=xQaO,5:RO-`Q`O1G0kOOQS1G0k1G0kO-eQ`O1G0kO>PQ!fO1G0ROOQO1G0R1G0ROOQO,5;`,5;`O>gQdO,5;`OOQO-E8r-E8rO>tQ`O1G1fPOOO-E8h-E8hPOOO1G.g1G.gOOQP7+$]7+$]OOQP7+%d7+%dO&lQdO7+%dOOQS1G0Q1G0QO?PQaO'#F_O?ZQ`O,5:ZO?`Q!fO'#ElO@^QdO'#FWO@hQ`O,59^O@mQ!bO7+%dO&lQdO1G/bO@uQhO1G/fOOQW1G/j1G/jOOQW1G/d1G/dOAWQhO,5;bOOQO-E8t-E8tOAfQhO'#DZOAtQhO'#F^OBPQ`O'#F^OBUQ`O,5:TOOQS-E8k-E8kOOQ[1G.z1G.zOOQ[1G/Q1G/QOOQ[1G/T1G/TOOQ[1G/X1G/XOBZQdO,5:lOOQS7+%p7+%pOB`Q`O7+%pOBeQhO'#DYOBmQ`O,59sO'tQhO,59sOOQ[1G/q1G/qOBuQ`O1G/qOOQS7+%z7+%zOBzQbO'#DPOOQO'#Eb'#EbOCYQ`O'#EaOOQO'#Ea'#EaOCeQ`O'#EwOCmQdO,5:zOOQS,5:z,5:zOOQ[1G/m1G/mOOQS7+&V7+&VO-`Q`O7+&VOCxQ!fO'#EsO&lQdO'#EsOEPQdO7+%mOOQO7+%m7+%mOOQO1G0z1G0zOEdQ!bO<<IOOElQdO'#EqOEvQ`O,5;yOOQP1G/u1G/uOOQS-E8j-E8jOFOQdO'#EpOFYQ`O,5;rOOQ]1G.x1G.xOOQP<<IO<<IOOFbQdO7+$|OOQO'#D]'#D]OFiQ!bO7+%QOFqQhO'#EoOF{Q`O,5;xO&lQdO,5;xOOQW1G/o1G/oOOQO'#ES'#ESOGTQ`O1G0WOOQS<<I[<<I[O&lQdO,59tOGnQhO1G/_OOQ[1G/_1G/_OGuQ`O1G/_OOQW-E8l-E8lOOQ[7+%]7+%]OOQO,5:{,5:{O=pQdO'#ExOCeQ`O,5;cOOQS,5;c,5;cOOQS-E8u-E8uOOQS1G0f1G0fOOQS<<Iq<<IqOG}Q!fO,5;_OOQS-E8q-E8qOOQO<<IX<<IXOOQPAN>jAN>jOIUQaO,5;]OOQO-E8o-E8oOI`QdO,5;[OOQO-E8n-E8nOOQW<<Hh<<HhOOQW<<Hl<<HlOIjQhO<<HlOI{QhO,5;ZOJWQ`O,5;ZOOQO-E8m-E8mOJ]QdO1G1dOBZQdO'#EuOJgQ`O7+%rOOQW7+%r7+%rOJoQ!bO1G/`OOQ[7+$y7+$yOJzQhO7+$yPKRQ`O'#EnOOQO,5;d,5;dOOQO-E8v-E8vOOQS1G0}1G0}OKWQ`OAN>WO&lQdO1G0uOK]Q`O7+'OOOQO,5;a,5;aOOQO-E8s-E8sOOQW<<I^<<I^OOQ[<<He<<HePOQW,5;Y,5;YOOQWG23rG23rOKeQdO7+&a",
  stateData: "Kx~O#sOS#tQQ~OW[OZ[O]TO`VOaVOi]OjWOmXO!jYO!mZO!saO!ybO!{cO!}dO#QeO#WfO#YgO#oRO~OQiOW[OZ[O]TO`VOaVOi]OjWOmXO!jYO!mZO!saO!ybO!{cO!}dO#QeO#WfO#YgO#ohO~O#m$SP~P!dO#tmO~O#ooO~O]qO`rOarOjsOmtO!juO!mwO#nvO~OpzO!^xO~P$SOc!QO#o|O#p}O~O#o!RO~O#o!TO~OW[OZ[O]TO`VOaVOjWOmXO!jYO!mZO#oRO~OS!]Oe!YO!V![O!Y!`O#q!XOp$TP~Ok$TP~P&POQ!jOe!cOm!dOp!eOr!mOt!mOz!kO!`!lO#o!bO#p!hO#}!fO~Ot!qO!`!lO#o!pO~Ot!sO#o!sO~OS!]Oe!YO!V![O!Y!`O#q!XO~Oe!vOpzO#Z!xO~O]YX`YX`!pXaYXjYXmYXpYX!^YX!jYX!mYX#nYX~O`!zO~Ok!{O#m$SXo$SX~O#m$SXo$SX~P!dO#u#OO#v#OO#w#QO~Oc#UO#o|O#p}O~OpzO!^xO~Oo$SP~P!dOe#`O~Oe#aO~Ol#bO!h#cO~O]qO`rOarOjsOmtO~Op!ia!^!ia!j!ia!m!ia#n!iad!ia~P*zOp!la!^!la!j!la!m!la#n!lad!la~P*zOR#gOS!]Oe!YOr#gOt#gO!V![O!Y!`O#q#dO#}!fO~O!R#iO!^#jOk$TXp$TX~Oe#mO~Ok#oOpzO~Oe!vO~O]#rO`#rOd#uOi#rOj#rOk#rO~P&lO]#rO`#rOi#rOj#rOk#rOl#wO~P&lO]#rO`#rOi#rOj#rOk#rOo#yO~P&lOP#zOSsXesXksXvsX!VsX!YsX!usX!wsX#qsX!TsXQsX]sX`sXdsXisXjsXmsXpsXrsXtsXzsX!`sX#osX#psX#}sXlsXosX!^sX!qsX#msX~Ov#{O!u#|O!w#}Ok$TP~P'tOe#aOS#{Xk#{Xv#{X!V#{X!Y#{X!u#{X!w#{X#q#{XQ#{X]#{X`#{Xd#{Xi#{Xj#{Xm#{Xp#{Xr#{Xt#{Xz#{X!`#{X#o#{X#p#{X#}#{Xl#{Xo#{X!^#{X!q#{X#m#{X~Oe$RO~Oe$TO~Ok$VOv#{O~Ok$WO~Ot$XO!`!lO~Op$YO~OpzO!R#iO~OpzO#Z$`O~O!q$bOk!oa#m!oao!oa~P&lOk#hX#m#hXo#hX~P!dOk!{O#m$Sao$Sa~O#u#OO#v#OO#w$hO~Ol$jO!h$kO~Op!ii!^!ii!j!ii!m!ii#n!iid!ii~P*zOp!ki!^!ki!j!ki!m!ki#n!kid!ki~P*zOp!li!^!li!j!li!m!li#n!lid!li~P*zOp#fa!^#fa~P$SOo$lO~Od$RP~P%_Od#zP~P&lO`!PXd}X!R}X!T!PX~O`$sO!T$tO~Od$uO!R#iO~Ok#jXp#jX!^#jX~P'tO!^#jOk$Tap$Ta~O!R#iOk!Uap!Ua!^!Uad!Ua`!Ua~OS!]Oe!YO!V![O!Y!`O#q$yO~Od$QP~P9dOv#{OQ#|X]#|X`#|Xd#|Xe#|Xi#|Xj#|Xk#|Xm#|Xp#|Xr#|Xt#|Xz#|X!`#|X#o#|X#p#|X#}#|Xl#|Xo#|X~O]#rO`#rOd%OOi#rOj#rOk#rO~P&lO]#rO`#rOi#rOj#rOk#rOl%PO~P&lO]#rO`#rOi#rOj#rOk#rOo%QO~P&lOe%SOS!tXk!tX!V!tX!Y!tX#q!tX~Ok%TO~Od%YOt%ZO!a%ZO~Ok%[O~Oo%cO#o%^O#}%]O~Od%dO~P$SOv#{O!^%hO!q%jOk!oi#m!oio!oi~P&lOk#ha#m#hao#ha~P!dOk!{O#m$Sio$Si~O!^%mOd$RX~P$SOd%oO~Ov#{OQ#`Xd#`Xe#`Xm#`Xp#`Xr#`Xt#`Xz#`X!^#`X!`#`X#o#`X#p#`X#}#`X~O!^%qOd#zX~P&lOd%sO~Ol%tOv#{O~OR#gOr#gOt#gO#q%vO#}!fO~O!R#iOk#jap#ja!^#ja~O`!PXd}X!R}X!^}X~O!R#iO!^%xOd$QX~O`%zO~Od%{O~O#o%|O~Ok&OO~O`&PO!R#iO~Od&ROk&QO~Od&UO~OP#zOpsX!^sXdsX~O#}%]Op#TX!^#TX~OpzO!^&WO~Oo&[O#o%^O#}%]O~Ov#{OQ#gXe#gXk#gXm#gXp#gXr#gXt#gXz#gX!^#gX!`#gX!q#gX#m#gX#o#gX#p#gX#}#gXo#gX~O!^%hO!q&`Ok!oq#m!oqo!oq~P&lOl&aOv#{O~Od#eX!^#eX~P%_O!^%mOd$Ra~Od#dX!^#dX~P&lO!^%qOd#za~Od&fO~P&lOd&gO!T&hO~Od#cX!^#cX~P9dO!^%xOd$Qa~O]&mOd&oO~OS#bae#ba!V#ba!Y#ba#q#ba~Od&qO~PG]Od&qOk&rO~Ov#{OQ#gae#gak#gam#gap#gar#gat#gaz#ga!^#ga!`#ga!q#ga#m#ga#o#ga#p#ga#}#gao#ga~Od#ea!^#ea~P$SOd#da!^#da~P&lOR#gOr#gOt#gO#q%vO#}%]O~O!R#iOd#ca!^#ca~O`&xO~O!^%xOd$Qi~P&lO]&mOd&|O~Ov#{Od|ik|i~Od&}O~PG]Ok'OO~Od'PO~O!^%xOd$Qq~Od#cq!^#cq~P&lO#s!a#t#}]#}v!m~",
  goto: "2h$UPPPPP$VP$YP$c$uP$cP%X$cPP%_PPP%e%o%oPPPPP%oPP%oP&]P%oP%o'W%oP't'w'}'}(^'}P'}P'}P'}'}P(m'}(yP(|PP)p)v$c)|$c*SP$cP$c$cP*Y*{+YP$YP+aP+dP$YP$YP$YP+j$YP+m+p+s+z$YP$YPP$YP,P,V,f,|-[-b-l-r-x.O.U.`.f.l.rPPPPPPPPPPP.x/R/w/z0|P1U1u2O2R2U2[RnQ_^OP`kz!{$dq[OPYZ`kuvwxz!v!{#`$d%mqSOPYZ`kuvwxz!v!{#`$d%mQpTR#RqQ!OVR#SrQ#S!QS$Q!i!jR$i#U!V!mac!c!d!e!z#a#c#t#v#x#{$a$k$p$s%h%i%q%u%z&P&d&l&x'Q!U!mac!c!d!e!z#a#c#t#v#x#{$a$k$p$s%h%i%q%u%z&P&d&l&x'QU#g!Y$t&hU%`$Y%b&WR&V%_!V!iac!c!d!e!z#a#c#t#v#x#{$a$k$p$s%h%i%q%u%z&P&d&l&x'QR$S!kQ%W$RR&S%Xk!^]bf!Y![!g#i#j#m$P$R%X%xQ#e!YQ${#mQ%w$tQ&j%xR&w&hQ!ygQ#p!`Q$^!xR%f$`R#n!]!U!mac!c!d!e!z#a#c#t#v#x#{$a$k$p$s%h%i%q%u%z&P&d&l&x'QQ!qdR$X!rQ!PVR#TrQ#S!PR$i#TQ!SWR#VsQ!UXR#WtQ{UQ!wgQ#^yQ#o!_Q$U!nQ$[!uQ$_!yQ%e$^Q&Y%aQ&]%fR&v&XSjPzQ!}kQ$c!{R%k$dZiPkz!{$dR$P!gQ%}%SR&z&mR!rdR!teR$Z!tS%a$Y%bR&t&WV%_$Y%b&WQ#PmR$g#PQ`OSkPzU!a`k$dR$d!{Q$p#aY%p$p%u&d&l'QQ%u$sQ&d%qQ&l%zR'Q&xQ#t!cQ#v!dQ#x!eV$}#t#v#xQ%X$RR&T%XQ%y$zS&k%y&yR&y&lQ%r$pR&e%rQ%n$mR&c%nQyUR#]yQ%i$aR&_%iQ!|jS$e!|$fR$f!}Q&n%}R&{&nQ#k!ZR$x#kQ%b$YR&Z%bQ&X%aR&u&X__OP`kz!{$d^UOP`kz!{$dQ!VYQ!WZQ#XuQ#YvQ#ZwQ#[xQ$]!vQ$m#`R&b%mR$q#aQ!gaQ!oc[#q!c!d!e#t#v#xQ$a!zd$o#a$p$s%q%u%z&d&l&x'QQ$r#cQ%R#{S%g$a%iQ%l$kQ&^%hR&p&P]#s!c!d!e#t#v#xW!Z]b!g$PQ!ufQ#f!YQ#l![Q$v#iQ$w#jQ$z#mS%V$R%XR&i%xQ#h!YQ%w$tR&w&hR$|#mR$n#`QlPR#_zQ!_]Q!nbQ$O!gR%U$P",
  nodeNames: "⚠ Unit VariableName VariableName QueryCallee Comment StyleSheet RuleSet UniversalSelector TagSelector TagName NestingSelector ClassSelector . ClassName PseudoClassSelector : :: PseudoClassName PseudoClassName ) ( ArgList ValueName ParenthesizedValue AtKeyword # ; ] [ BracketedValue } { BracedValue ColorLiteral NumberLiteral StringLiteral BinaryExpression BinOp CallExpression Callee IfExpression if ArgList IfBranch KeywordQuery FeatureQuery FeatureName BinaryQuery LogicOp ComparisonQuery CompareOp UnaryQuery UnaryQueryOp ParenthesizedQuery SelectorQuery selector ParenthesizedSelector CallQuery ArgList , CallLiteral CallTag ParenthesizedContent PseudoClassName ArgList IdSelector IdName AttributeSelector AttributeName MatchOp ChildSelector ChildOp DescendantSelector SiblingSelector SiblingOp Block Declaration PropertyName Important ImportStatement import Layer layer LayerName layer MediaStatement media CharsetStatement charset NamespaceStatement namespace NamespaceName KeyframesStatement keyframes KeyframeName KeyframeList KeyframeSelector KeyframeRangeName SupportsStatement supports ScopeStatement scope to AtRule Styles",
  maxTerm: 143,
  nodeProps: [
    ["isolate", -2, 5, 36, ""],
    ["openedBy", 20, "(", 28, "[", 31, "{"],
    ["closedBy", 21, ")", 29, "]", 32, "}"]
  ],
  propSources: [gS],
  skippedNodes: [0, 5, 106],
  repeatNodeCount: 15,
  tokenData: "JQ~R!YOX$qX^%i^p$qpq%iqr({rs-ust/itu6Wuv$qvw7Qwx7cxy9Qyz9cz{9h{|:R|}>t}!O?V!O!P?t!P!Q@]!Q![AU![!]BP!]!^B{!^!_C^!_!`DY!`!aDm!a!b$q!b!cEn!c!}$q!}#OG{#O#P$q#P#QH^#Q#R6W#R#o$q#o#pHo#p#q6W#q#rIQ#r#sIc#s#y$q#y#z%i#z$f$q$f$g%i$g#BY$q#BY#BZ%i#BZ$IS$q$IS$I_%i$I_$I|$q$I|$JO%i$JO$JT$q$JT$JU%i$JU$KV$q$KV$KW%i$KW&FU$q&FU&FV%i&FV;'S$q;'S;=`Iz<%lO$q`$tSOy%Qz;'S%Q;'S;=`%c<%lO%Q`%VS!a`Oy%Qz;'S%Q;'S;=`%c<%lO%Q`%fP;=`<%l%Q~%nh#s~OX%QX^'Y^p%Qpq'Yqy%Qz#y%Q#y#z'Y#z$f%Q$f$g'Y$g#BY%Q#BY#BZ'Y#BZ$IS%Q$IS$I_'Y$I_$I|%Q$I|$JO'Y$JO$JT%Q$JT$JU'Y$JU$KV%Q$KV$KW'Y$KW&FU%Q&FU&FV'Y&FV;'S%Q;'S;=`%c<%lO%Q~'ah#s~!a`OX%QX^'Y^p%Qpq'Yqy%Qz#y%Q#y#z'Y#z$f%Q$f$g'Y$g#BY%Q#BY#BZ'Y#BZ$IS%Q$IS$I_'Y$I_$I|%Q$I|$JO'Y$JO$JT%Q$JT$JU'Y$JU$KV%Q$KV$KW'Y$KW&FU%Q&FU&FV'Y&FV;'S%Q;'S;=`%c<%lO%Qj)OUOy%Qz#]%Q#]#^)b#^;'S%Q;'S;=`%c<%lO%Qj)gU!a`Oy%Qz#a%Q#a#b)y#b;'S%Q;'S;=`%c<%lO%Qj*OU!a`Oy%Qz#d%Q#d#e*b#e;'S%Q;'S;=`%c<%lO%Qj*gU!a`Oy%Qz#c%Q#c#d*y#d;'S%Q;'S;=`%c<%lO%Qj+OU!a`Oy%Qz#f%Q#f#g+b#g;'S%Q;'S;=`%c<%lO%Qj+gU!a`Oy%Qz#h%Q#h#i+y#i;'S%Q;'S;=`%c<%lO%Qj,OU!a`Oy%Qz#T%Q#T#U,b#U;'S%Q;'S;=`%c<%lO%Qj,gU!a`Oy%Qz#b%Q#b#c,y#c;'S%Q;'S;=`%c<%lO%Qj-OU!a`Oy%Qz#h%Q#h#i-b#i;'S%Q;'S;=`%c<%lO%Qj-iS!qY!a`Oy%Qz;'S%Q;'S;=`%c<%lO%Q~-xWOY-uZr-urs.bs#O-u#O#P.g#P;'S-u;'S;=`/c<%lO-u~.gOt~~.jRO;'S-u;'S;=`.s;=`O-u~.vXOY-uZr-urs.bs#O-u#O#P.g#P;'S-u;'S;=`/c;=`<%l-u<%lO-u~/fP;=`<%l-uj/nYjYOy%Qz!Q%Q!Q![0^![!c%Q!c!i0^!i#T%Q#T#Z0^#Z;'S%Q;'S;=`%c<%lO%Qj0cY!a`Oy%Qz!Q%Q!Q![1R![!c%Q!c!i1R!i#T%Q#T#Z1R#Z;'S%Q;'S;=`%c<%lO%Qj1WY!a`Oy%Qz!Q%Q!Q![1v![!c%Q!c!i1v!i#T%Q#T#Z1v#Z;'S%Q;'S;=`%c<%lO%Qj1}YrY!a`Oy%Qz!Q%Q!Q![2m![!c%Q!c!i2m!i#T%Q#T#Z2m#Z;'S%Q;'S;=`%c<%lO%Qj2tYrY!a`Oy%Qz!Q%Q!Q![3d![!c%Q!c!i3d!i#T%Q#T#Z3d#Z;'S%Q;'S;=`%c<%lO%Qj3iY!a`Oy%Qz!Q%Q!Q![4X![!c%Q!c!i4X!i#T%Q#T#Z4X#Z;'S%Q;'S;=`%c<%lO%Qj4`YrY!a`Oy%Qz!Q%Q!Q![5O![!c%Q!c!i5O!i#T%Q#T#Z5O#Z;'S%Q;'S;=`%c<%lO%Qj5TY!a`Oy%Qz!Q%Q!Q![5s![!c%Q!c!i5s!i#T%Q#T#Z5s#Z;'S%Q;'S;=`%c<%lO%Qj5zSrY!a`Oy%Qz;'S%Q;'S;=`%c<%lO%Qd6ZUOy%Qz!_%Q!_!`6m!`;'S%Q;'S;=`%c<%lO%Qd6tS!hS!a`Oy%Qz;'S%Q;'S;=`%c<%lO%Qb7VSZQOy%Qz;'S%Q;'S;=`%c<%lO%Q~7fWOY7cZw7cwx.bx#O7c#O#P8O#P;'S7c;'S;=`8z<%lO7c~8RRO;'S7c;'S;=`8[;=`O7c~8_XOY7cZw7cwx.bx#O7c#O#P8O#P;'S7c;'S;=`8z;=`<%l7c<%lO7c~8}P;=`<%l7cj9VSeYOy%Qz;'S%Q;'S;=`%c<%lO%Q~9hOd~n9oUWQvWOy%Qz!_%Q!_!`6m!`;'S%Q;'S;=`%c<%lO%Qj:YWvW!mQOy%Qz!O%Q!O!P:r!P!Q%Q!Q![=w![;'S%Q;'S;=`%c<%lO%Qj:wU!a`Oy%Qz!Q%Q!Q![;Z![;'S%Q;'S;=`%c<%lO%Qj;bY!a`#}YOy%Qz!Q%Q!Q![;Z![!g%Q!g!h<Q!h#X%Q#X#Y<Q#Y;'S%Q;'S;=`%c<%lO%Qj<VY!a`Oy%Qz{%Q{|<u|}%Q}!O<u!O!Q%Q!Q![=^![;'S%Q;'S;=`%c<%lO%Qj<zU!a`Oy%Qz!Q%Q!Q![=^![;'S%Q;'S;=`%c<%lO%Qj=eU!a`#}YOy%Qz!Q%Q!Q![=^![;'S%Q;'S;=`%c<%lO%Qj>O[!a`#}YOy%Qz!O%Q!O!P;Z!P!Q%Q!Q![=w![!g%Q!g!h<Q!h#X%Q#X#Y<Q#Y;'S%Q;'S;=`%c<%lO%Qj>yS!^YOy%Qz;'S%Q;'S;=`%c<%lO%Qj?[WvWOy%Qz!O%Q!O!P:r!P!Q%Q!Q![=w![;'S%Q;'S;=`%c<%lO%Qj?yU]YOy%Qz!Q%Q!Q![;Z![;'S%Q;'S;=`%c<%lO%Q~@bTvWOy%Qz{@q{;'S%Q;'S;=`%c<%lO%Q~@xS!a`#t~Oy%Qz;'S%Q;'S;=`%c<%lO%QjAZ[#}YOy%Qz!O%Q!O!P;Z!P!Q%Q!Q![=w![!g%Q!g!h<Q!h#X%Q#X#Y<Q#Y;'S%Q;'S;=`%c<%lO%QjBUU`YOy%Qz![%Q![!]Bh!];'S%Q;'S;=`%c<%lO%QbBoSaQ!a`Oy%Qz;'S%Q;'S;=`%c<%lO%QjCQSkYOy%Qz;'S%Q;'S;=`%c<%lO%QhCcU!TWOy%Qz!_%Q!_!`Cu!`;'S%Q;'S;=`%c<%lO%QhC|S!TW!a`Oy%Qz;'S%Q;'S;=`%c<%lO%QlDaS!TW!hSOy%Qz;'S%Q;'S;=`%c<%lO%QjDtV!jQ!TWOy%Qz!_%Q!_!`Cu!`!aEZ!a;'S%Q;'S;=`%c<%lO%QbEbS!jQ!a`Oy%Qz;'S%Q;'S;=`%c<%lO%QjEqYOy%Qz}%Q}!OFa!O!c%Q!c!}GO!}#T%Q#T#oGO#o;'S%Q;'S;=`%c<%lO%QjFfW!a`Oy%Qz!c%Q!c!}GO!}#T%Q#T#oGO#o;'S%Q;'S;=`%c<%lO%QjGV[iY!a`Oy%Qz}%Q}!OGO!O!Q%Q!Q![GO![!c%Q!c!}GO!}#T%Q#T#oGO#o;'S%Q;'S;=`%c<%lO%QjHQSmYOy%Qz;'S%Q;'S;=`%c<%lO%QnHcSl^Oy%Qz;'S%Q;'S;=`%c<%lO%QjHtSpYOy%Qz;'S%Q;'S;=`%c<%lO%QjIVSoYOy%Qz;'S%Q;'S;=`%c<%lO%QfIhU!mQOy%Qz!_%Q!_!`6m!`;'S%Q;'S;=`%c<%lO%Q`I}P;=`<%l$q",
  tokenizers: [QS, mS, dS, pS, 1, 2, 3, 4, new Fn("m~RRYZ[z{a~~g~aO#v~~dP!P!Qg~lO#w~~", 28, 129)],
  topRules: { StyleSheet: [0, 6], Styles: [1, 105] },
  specialized: [{ term: 124, get: (n) => SS[n] || -1 }, { term: 125, get: (n) => PS[n] || -1 }, { term: 4, get: (n) => TS[n] || -1 }, { term: 25, get: (n) => yS[n] || -1 }, { term: 123, get: (n) => bS[n] || -1 }],
  tokenPrec: 1963
});
let Lr = null;
function Dr() {
  if (!Lr && typeof document == "object" && document.body) {
    let { style: n } = document.body, e = [], t = /* @__PURE__ */ new Set();
    for (let i in n)
      i != "cssText" && i != "cssFloat" && typeof n[i] == "string" && (/[A-Z]/.test(i) && (i = i.replace(/[A-Z]/g, (r) => "-" + r.toLowerCase())), t.has(i) || (e.push(i), t.add(i)));
    Lr = e.sort().map((i) => ({ type: "property", label: i, apply: i + ": " }));
  }
  return Lr || [];
}
const qo = /* @__PURE__ */ [
  "active",
  "after",
  "any-link",
  "autofill",
  "backdrop",
  "before",
  "checked",
  "cue",
  "default",
  "defined",
  "disabled",
  "empty",
  "enabled",
  "file-selector-button",
  "first",
  "first-child",
  "first-letter",
  "first-line",
  "first-of-type",
  "focus",
  "focus-visible",
  "focus-within",
  "fullscreen",
  "has",
  "host",
  "host-context",
  "hover",
  "in-range",
  "indeterminate",
  "invalid",
  "is",
  "lang",
  "last-child",
  "last-of-type",
  "left",
  "link",
  "marker",
  "modal",
  "not",
  "nth-child",
  "nth-last-child",
  "nth-last-of-type",
  "nth-of-type",
  "only-child",
  "only-of-type",
  "optional",
  "out-of-range",
  "part",
  "placeholder",
  "placeholder-shown",
  "read-only",
  "read-write",
  "required",
  "right",
  "root",
  "scope",
  "selection",
  "slotted",
  "target",
  "target-text",
  "valid",
  "visited",
  "where"
].map((n) => ({ type: "class", label: n })), Co = /* @__PURE__ */ [
  "above",
  "absolute",
  "activeborder",
  "additive",
  "activecaption",
  "after-white-space",
  "ahead",
  "alias",
  "all",
  "all-scroll",
  "alphabetic",
  "alternate",
  "always",
  "antialiased",
  "appworkspace",
  "asterisks",
  "attr",
  "auto",
  "auto-flow",
  "avoid",
  "avoid-column",
  "avoid-page",
  "avoid-region",
  "axis-pan",
  "background",
  "backwards",
  "baseline",
  "below",
  "bidi-override",
  "blink",
  "block",
  "block-axis",
  "bold",
  "bolder",
  "border",
  "border-box",
  "both",
  "bottom",
  "break",
  "break-all",
  "break-word",
  "bullets",
  "button",
  "button-bevel",
  "buttonface",
  "buttonhighlight",
  "buttonshadow",
  "buttontext",
  "calc",
  "capitalize",
  "caps-lock-indicator",
  "caption",
  "captiontext",
  "caret",
  "cell",
  "center",
  "checkbox",
  "circle",
  "cjk-decimal",
  "clear",
  "clip",
  "close-quote",
  "col-resize",
  "collapse",
  "color",
  "color-burn",
  "color-dodge",
  "column",
  "column-reverse",
  "compact",
  "condensed",
  "contain",
  "content",
  "contents",
  "content-box",
  "context-menu",
  "continuous",
  "copy",
  "counter",
  "counters",
  "cover",
  "crop",
  "cross",
  "crosshair",
  "currentcolor",
  "cursive",
  "cyclic",
  "darken",
  "dashed",
  "decimal",
  "decimal-leading-zero",
  "default",
  "default-button",
  "dense",
  "destination-atop",
  "destination-in",
  "destination-out",
  "destination-over",
  "difference",
  "disc",
  "discard",
  "disclosure-closed",
  "disclosure-open",
  "document",
  "dot-dash",
  "dot-dot-dash",
  "dotted",
  "double",
  "down",
  "e-resize",
  "ease",
  "ease-in",
  "ease-in-out",
  "ease-out",
  "element",
  "ellipse",
  "ellipsis",
  "embed",
  "end",
  "ethiopic-abegede-gez",
  "ethiopic-halehame-aa-er",
  "ethiopic-halehame-gez",
  "ew-resize",
  "exclusion",
  "expanded",
  "extends",
  "extra-condensed",
  "extra-expanded",
  "fantasy",
  "fast",
  "fill",
  "fill-box",
  "fixed",
  "flat",
  "flex",
  "flex-end",
  "flex-start",
  "footnotes",
  "forwards",
  "from",
  "geometricPrecision",
  "graytext",
  "grid",
  "groove",
  "hand",
  "hard-light",
  "help",
  "hidden",
  "hide",
  "higher",
  "highlight",
  "highlighttext",
  "horizontal",
  "hsl",
  "hsla",
  "hue",
  "icon",
  "ignore",
  "inactiveborder",
  "inactivecaption",
  "inactivecaptiontext",
  "infinite",
  "infobackground",
  "infotext",
  "inherit",
  "initial",
  "inline",
  "inline-axis",
  "inline-block",
  "inline-flex",
  "inline-grid",
  "inline-table",
  "inset",
  "inside",
  "intrinsic",
  "invert",
  "italic",
  "justify",
  "keep-all",
  "landscape",
  "large",
  "larger",
  "left",
  "level",
  "lighter",
  "lighten",
  "line-through",
  "linear",
  "linear-gradient",
  "lines",
  "list-item",
  "listbox",
  "listitem",
  "local",
  "logical",
  "loud",
  "lower",
  "lower-hexadecimal",
  "lower-latin",
  "lower-norwegian",
  "lowercase",
  "ltr",
  "luminosity",
  "manipulation",
  "match",
  "matrix",
  "matrix3d",
  "medium",
  "menu",
  "menutext",
  "message-box",
  "middle",
  "min-intrinsic",
  "mix",
  "monospace",
  "move",
  "multiple",
  "multiple_mask_images",
  "multiply",
  "n-resize",
  "narrower",
  "ne-resize",
  "nesw-resize",
  "no-close-quote",
  "no-drop",
  "no-open-quote",
  "no-repeat",
  "none",
  "normal",
  "not-allowed",
  "nowrap",
  "ns-resize",
  "numbers",
  "numeric",
  "nw-resize",
  "nwse-resize",
  "oblique",
  "opacity",
  "open-quote",
  "optimizeLegibility",
  "optimizeSpeed",
  "outset",
  "outside",
  "outside-shape",
  "overlay",
  "overline",
  "padding",
  "padding-box",
  "painted",
  "page",
  "paused",
  "perspective",
  "pinch-zoom",
  "plus-darker",
  "plus-lighter",
  "pointer",
  "polygon",
  "portrait",
  "pre",
  "pre-line",
  "pre-wrap",
  "preserve-3d",
  "progress",
  "push-button",
  "radial-gradient",
  "radio",
  "read-only",
  "read-write",
  "read-write-plaintext-only",
  "rectangle",
  "region",
  "relative",
  "repeat",
  "repeating-linear-gradient",
  "repeating-radial-gradient",
  "repeat-x",
  "repeat-y",
  "reset",
  "reverse",
  "rgb",
  "rgba",
  "ridge",
  "right",
  "rotate",
  "rotate3d",
  "rotateX",
  "rotateY",
  "rotateZ",
  "round",
  "row",
  "row-resize",
  "row-reverse",
  "rtl",
  "run-in",
  "running",
  "s-resize",
  "sans-serif",
  "saturation",
  "scale",
  "scale3d",
  "scaleX",
  "scaleY",
  "scaleZ",
  "screen",
  "scroll",
  "scrollbar",
  "scroll-position",
  "se-resize",
  "self-start",
  "self-end",
  "semi-condensed",
  "semi-expanded",
  "separate",
  "serif",
  "show",
  "single",
  "skew",
  "skewX",
  "skewY",
  "skip-white-space",
  "slide",
  "slider-horizontal",
  "slider-vertical",
  "sliderthumb-horizontal",
  "sliderthumb-vertical",
  "slow",
  "small",
  "small-caps",
  "small-caption",
  "smaller",
  "soft-light",
  "solid",
  "source-atop",
  "source-in",
  "source-out",
  "source-over",
  "space",
  "space-around",
  "space-between",
  "space-evenly",
  "spell-out",
  "square",
  "start",
  "static",
  "status-bar",
  "stretch",
  "stroke",
  "stroke-box",
  "sub",
  "subpixel-antialiased",
  "svg_masks",
  "super",
  "sw-resize",
  "symbolic",
  "symbols",
  "system-ui",
  "table",
  "table-caption",
  "table-cell",
  "table-column",
  "table-column-group",
  "table-footer-group",
  "table-header-group",
  "table-row",
  "table-row-group",
  "text",
  "text-bottom",
  "text-top",
  "textarea",
  "textfield",
  "thick",
  "thin",
  "threeddarkshadow",
  "threedface",
  "threedhighlight",
  "threedlightshadow",
  "threedshadow",
  "to",
  "top",
  "transform",
  "translate",
  "translate3d",
  "translateX",
  "translateY",
  "translateZ",
  "transparent",
  "ultra-condensed",
  "ultra-expanded",
  "underline",
  "unidirectional-pan",
  "unset",
  "up",
  "upper-latin",
  "uppercase",
  "url",
  "var",
  "vertical",
  "vertical-text",
  "view-box",
  "visible",
  "visibleFill",
  "visiblePainted",
  "visibleStroke",
  "visual",
  "w-resize",
  "wait",
  "wave",
  "wider",
  "window",
  "windowframe",
  "windowtext",
  "words",
  "wrap",
  "wrap-reverse",
  "x-large",
  "x-small",
  "xor",
  "xx-large",
  "xx-small"
].map((n) => ({ type: "keyword", label: n })).concat(/* @__PURE__ */ [
  "aliceblue",
  "antiquewhite",
  "aqua",
  "aquamarine",
  "azure",
  "beige",
  "bisque",
  "black",
  "blanchedalmond",
  "blue",
  "blueviolet",
  "brown",
  "burlywood",
  "cadetblue",
  "chartreuse",
  "chocolate",
  "coral",
  "cornflowerblue",
  "cornsilk",
  "crimson",
  "cyan",
  "darkblue",
  "darkcyan",
  "darkgoldenrod",
  "darkgray",
  "darkgreen",
  "darkkhaki",
  "darkmagenta",
  "darkolivegreen",
  "darkorange",
  "darkorchid",
  "darkred",
  "darksalmon",
  "darkseagreen",
  "darkslateblue",
  "darkslategray",
  "darkturquoise",
  "darkviolet",
  "deeppink",
  "deepskyblue",
  "dimgray",
  "dodgerblue",
  "firebrick",
  "floralwhite",
  "forestgreen",
  "fuchsia",
  "gainsboro",
  "ghostwhite",
  "gold",
  "goldenrod",
  "gray",
  "grey",
  "green",
  "greenyellow",
  "honeydew",
  "hotpink",
  "indianred",
  "indigo",
  "ivory",
  "khaki",
  "lavender",
  "lavenderblush",
  "lawngreen",
  "lemonchiffon",
  "lightblue",
  "lightcoral",
  "lightcyan",
  "lightgoldenrodyellow",
  "lightgray",
  "lightgreen",
  "lightpink",
  "lightsalmon",
  "lightseagreen",
  "lightskyblue",
  "lightslategray",
  "lightsteelblue",
  "lightyellow",
  "lime",
  "limegreen",
  "linen",
  "magenta",
  "maroon",
  "mediumaquamarine",
  "mediumblue",
  "mediumorchid",
  "mediumpurple",
  "mediumseagreen",
  "mediumslateblue",
  "mediumspringgreen",
  "mediumturquoise",
  "mediumvioletred",
  "midnightblue",
  "mintcream",
  "mistyrose",
  "moccasin",
  "navajowhite",
  "navy",
  "oldlace",
  "olive",
  "olivedrab",
  "orange",
  "orangered",
  "orchid",
  "palegoldenrod",
  "palegreen",
  "paleturquoise",
  "palevioletred",
  "papayawhip",
  "peachpuff",
  "peru",
  "pink",
  "plum",
  "powderblue",
  "purple",
  "rebeccapurple",
  "red",
  "rosybrown",
  "royalblue",
  "saddlebrown",
  "salmon",
  "sandybrown",
  "seagreen",
  "seashell",
  "sienna",
  "silver",
  "skyblue",
  "slateblue",
  "slategray",
  "snow",
  "springgreen",
  "steelblue",
  "tan",
  "teal",
  "thistle",
  "tomato",
  "turquoise",
  "violet",
  "wheat",
  "white",
  "whitesmoke",
  "yellow",
  "yellowgreen"
].map((n) => ({ type: "constant", label: n }))), xS = /* @__PURE__ */ [
  "a",
  "abbr",
  "address",
  "article",
  "aside",
  "b",
  "bdi",
  "bdo",
  "blockquote",
  "body",
  "br",
  "button",
  "canvas",
  "caption",
  "cite",
  "code",
  "col",
  "colgroup",
  "dd",
  "del",
  "details",
  "dfn",
  "dialog",
  "div",
  "dl",
  "dt",
  "em",
  "figcaption",
  "figure",
  "footer",
  "form",
  "header",
  "hgroup",
  "h1",
  "h2",
  "h3",
  "h4",
  "h5",
  "h6",
  "hr",
  "html",
  "i",
  "iframe",
  "img",
  "input",
  "ins",
  "kbd",
  "label",
  "legend",
  "li",
  "main",
  "meter",
  "nav",
  "ol",
  "output",
  "p",
  "pre",
  "ruby",
  "section",
  "select",
  "small",
  "source",
  "span",
  "strong",
  "sub",
  "summary",
  "sup",
  "table",
  "tbody",
  "td",
  "template",
  "textarea",
  "tfoot",
  "th",
  "thead",
  "tr",
  "u",
  "ul"
].map((n) => ({ type: "type", label: n })), kS = /* @__PURE__ */ [
  "@charset",
  "@color-profile",
  "@container",
  "@counter-style",
  "@font-face",
  "@font-feature-values",
  "@font-palette-values",
  "@import",
  "@keyframes",
  "@layer",
  "@media",
  "@namespace",
  "@page",
  "@position-try",
  "@property",
  "@scope",
  "@starting-style",
  "@supports",
  "@view-transition"
].map((n) => ({ type: "keyword", label: n })), Je = /^(\w[\w-]*|-\w[\w-]*|)$/, XS = /^-(-[\w-]*)?$/;
function vS(n, e) {
  var t;
  if ((n.name == "(" || n.type.isError) && (n = n.parent || n), n.name != "ArgList")
    return !1;
  let i = (t = n.parent) === null || t === void 0 ? void 0 : t.firstChild;
  return (i == null ? void 0 : i.name) != "Callee" ? !1 : e.sliceString(i.from, i.to) == "var";
}
const Uo = /* @__PURE__ */ new yc(), ZS = ["Declaration"];
function RS(n) {
  for (let e = n; ; ) {
    if (e.type.isTop)
      return e;
    if (!(e = e.parent))
      return n;
  }
}
function af(n, e, t) {
  if (e.to - e.from > 4096) {
    let i = Uo.get(e);
    if (i)
      return i;
    let r = [], O = /* @__PURE__ */ new Set(), s = e.cursor(A.IncludeAnonymous);
    if (s.firstChild())
      do
        for (let a of af(n, s.node, t))
          O.has(a.label) || (O.add(a.label), r.push(a));
      while (s.nextSibling());
    return Uo.set(e, r), r;
  } else {
    let i = [], r = /* @__PURE__ */ new Set();
    return e.cursor().iterate((O) => {
      var s;
      if (t(O) && O.matchContext(ZS) && ((s = O.node.nextSibling) === null || s === void 0 ? void 0 : s.name) == ":") {
        let a = n.sliceString(O.from, O.to);
        r.has(a) || (r.add(a), i.push({ label: a, type: "variable" }));
      }
    }), i;
  }
}
const zS = (n) => (e) => {
  let { state: t, pos: i } = e, r = I(t).resolveInner(i, -1), O = r.type.isError && r.from == r.to - 1 && t.doc.sliceString(r.from, r.to) == "-";
  if (r.name == "PropertyName" || (O || r.name == "TagName") && /^(Block|Styles)$/.test(r.resolve(r.to).name))
    return { from: r.from, options: Dr(), validFor: Je };
  if (r.name == "ValueName")
    return { from: r.from, options: Co, validFor: Je };
  if (r.name == "PseudoClassName")
    return { from: r.from, options: qo, validFor: Je };
  if (n(r) || (e.explicit || O) && vS(r, t.doc))
    return {
      from: n(r) || O ? r.from : i,
      options: af(t.doc, RS(r), n),
      validFor: XS
    };
  if (r.name == "TagName") {
    for (let { parent: o } = r; o; o = o.parent)
      if (o.name == "Block")
        return { from: r.from, options: Dr(), validFor: Je };
    return { from: r.from, options: xS, validFor: Je };
  }
  if (r.name == "AtKeyword")
    return { from: r.from, options: kS, validFor: Je };
  if (!e.explicit)
    return null;
  let s = r.resolve(i), a = s.childBefore(i);
  return a && a.name == ":" && s.name == "PseudoClassSelector" ? { from: i, options: qo, validFor: Je } : a && a.name == ":" && s.name == "Declaration" || s.name == "ArgList" ? { from: i, options: Co, validFor: Je } : s.name == "Block" || s.name == "Styles" ? { from: i, options: Dr(), validFor: Je } : null;
}, _S = /* @__PURE__ */ zS((n) => n.name == "VariableName"), Kn = /* @__PURE__ */ at.define({
  name: "css",
  parser: /* @__PURE__ */ wS.configure({
    props: [
      /* @__PURE__ */ Ut.add({
        Declaration: /* @__PURE__ */ Fe()
      }),
      /* @__PURE__ */ At.add({
        "Block KeyframeList": hr
      })
    ]
  }),
  languageData: {
    commentTokens: { block: { open: "/*", close: "*/" } },
    indentOnInput: /^\s*\}$/,
    wordChars: "-"
  }
});
function of() {
  return new hi(Kn, Kn.data.of({ autocomplete: _S }));
}
const Pi = ["_blank", "_self", "_top", "_parent"], Br = ["ascii", "utf-8", "utf-16", "latin1", "latin1"], Ir = ["get", "post", "put", "delete"], Nr = ["application/x-www-form-urlencoded", "multipart/form-data", "text/plain"], me = ["true", "false"], X = {}, YS = {
  a: {
    attrs: {
      href: null,
      ping: null,
      type: null,
      media: null,
      target: Pi,
      hreflang: null
    }
  },
  abbr: X,
  address: X,
  area: {
    attrs: {
      alt: null,
      coords: null,
      href: null,
      target: null,
      ping: null,
      media: null,
      hreflang: null,
      type: null,
      shape: ["default", "rect", "circle", "poly"]
    }
  },
  article: X,
  aside: X,
  audio: {
    attrs: {
      src: null,
      mediagroup: null,
      crossorigin: ["anonymous", "use-credentials"],
      preload: ["none", "metadata", "auto"],
      autoplay: ["autoplay"],
      loop: ["loop"],
      controls: ["controls"]
    }
  },
  b: X,
  base: { attrs: { href: null, target: Pi } },
  bdi: X,
  bdo: X,
  blockquote: { attrs: { cite: null } },
  body: X,
  br: X,
  button: {
    attrs: {
      form: null,
      formaction: null,
      name: null,
      value: null,
      autofocus: ["autofocus"],
      disabled: ["autofocus"],
      formenctype: Nr,
      formmethod: Ir,
      formnovalidate: ["novalidate"],
      formtarget: Pi,
      type: ["submit", "reset", "button"]
    }
  },
  canvas: { attrs: { width: null, height: null } },
  caption: X,
  center: X,
  cite: X,
  code: X,
  col: { attrs: { span: null } },
  colgroup: { attrs: { span: null } },
  command: {
    attrs: {
      type: ["command", "checkbox", "radio"],
      label: null,
      icon: null,
      radiogroup: null,
      command: null,
      title: null,
      disabled: ["disabled"],
      checked: ["checked"]
    }
  },
  data: { attrs: { value: null } },
  datagrid: { attrs: { disabled: ["disabled"], multiple: ["multiple"] } },
  datalist: { attrs: { data: null } },
  dd: X,
  del: { attrs: { cite: null, datetime: null } },
  details: { attrs: { open: ["open"] } },
  dfn: X,
  div: X,
  dl: X,
  dt: X,
  em: X,
  embed: { attrs: { src: null, type: null, width: null, height: null } },
  eventsource: { attrs: { src: null } },
  fieldset: { attrs: { disabled: ["disabled"], form: null, name: null } },
  figcaption: X,
  figure: X,
  footer: X,
  form: {
    attrs: {
      action: null,
      name: null,
      "accept-charset": Br,
      autocomplete: ["on", "off"],
      enctype: Nr,
      method: Ir,
      novalidate: ["novalidate"],
      target: Pi
    }
  },
  h1: X,
  h2: X,
  h3: X,
  h4: X,
  h5: X,
  h6: X,
  head: {
    children: ["title", "base", "link", "style", "meta", "script", "noscript", "command"]
  },
  header: X,
  hgroup: X,
  hr: X,
  html: {
    attrs: { manifest: null }
  },
  i: X,
  iframe: {
    attrs: {
      src: null,
      srcdoc: null,
      name: null,
      width: null,
      height: null,
      sandbox: ["allow-top-navigation", "allow-same-origin", "allow-forms", "allow-scripts"],
      seamless: ["seamless"]
    }
  },
  img: {
    attrs: {
      alt: null,
      src: null,
      ismap: null,
      usemap: null,
      width: null,
      height: null,
      crossorigin: ["anonymous", "use-credentials"]
    }
  },
  input: {
    attrs: {
      alt: null,
      dirname: null,
      form: null,
      formaction: null,
      height: null,
      list: null,
      max: null,
      maxlength: null,
      min: null,
      name: null,
      pattern: null,
      placeholder: null,
      size: null,
      src: null,
      step: null,
      value: null,
      width: null,
      accept: ["audio/*", "video/*", "image/*"],
      autocomplete: ["on", "off"],
      autofocus: ["autofocus"],
      checked: ["checked"],
      disabled: ["disabled"],
      formenctype: Nr,
      formmethod: Ir,
      formnovalidate: ["novalidate"],
      formtarget: Pi,
      multiple: ["multiple"],
      readonly: ["readonly"],
      required: ["required"],
      type: [
        "hidden",
        "text",
        "search",
        "tel",
        "url",
        "email",
        "password",
        "datetime",
        "date",
        "month",
        "week",
        "time",
        "datetime-local",
        "number",
        "range",
        "color",
        "checkbox",
        "radio",
        "file",
        "submit",
        "image",
        "reset",
        "button"
      ]
    }
  },
  ins: { attrs: { cite: null, datetime: null } },
  kbd: X,
  keygen: {
    attrs: {
      challenge: null,
      form: null,
      name: null,
      autofocus: ["autofocus"],
      disabled: ["disabled"],
      keytype: ["RSA"]
    }
  },
  label: { attrs: { for: null, form: null } },
  legend: X,
  li: { attrs: { value: null } },
  link: {
    attrs: {
      href: null,
      type: null,
      hreflang: null,
      media: null,
      sizes: ["all", "16x16", "16x16 32x32", "16x16 32x32 64x64"]
    }
  },
  map: { attrs: { name: null } },
  mark: X,
  menu: { attrs: { label: null, type: ["list", "context", "toolbar"] } },
  meta: {
    attrs: {
      content: null,
      charset: Br,
      name: ["viewport", "application-name", "author", "description", "generator", "keywords"],
      "http-equiv": ["content-language", "content-type", "default-style", "refresh"]
    }
  },
  meter: { attrs: { value: null, min: null, low: null, high: null, max: null, optimum: null } },
  nav: X,
  noscript: X,
  object: {
    attrs: {
      data: null,
      type: null,
      name: null,
      usemap: null,
      form: null,
      width: null,
      height: null,
      typemustmatch: ["typemustmatch"]
    }
  },
  ol: {
    attrs: { reversed: ["reversed"], start: null, type: ["1", "a", "A", "i", "I"] },
    children: ["li", "script", "template", "ul", "ol"]
  },
  optgroup: { attrs: { disabled: ["disabled"], label: null } },
  option: { attrs: { disabled: ["disabled"], label: null, selected: ["selected"], value: null } },
  output: { attrs: { for: null, form: null, name: null } },
  p: X,
  param: { attrs: { name: null, value: null } },
  pre: X,
  progress: { attrs: { value: null, max: null } },
  q: { attrs: { cite: null } },
  rp: X,
  rt: X,
  ruby: X,
  samp: X,
  script: {
    attrs: {
      type: ["text/javascript"],
      src: null,
      async: ["async"],
      defer: ["defer"],
      charset: Br
    }
  },
  section: X,
  select: {
    attrs: {
      form: null,
      name: null,
      size: null,
      autofocus: ["autofocus"],
      disabled: ["disabled"],
      multiple: ["multiple"]
    }
  },
  slot: { attrs: { name: null } },
  small: X,
  source: { attrs: { src: null, type: null, media: null } },
  span: X,
  strong: X,
  style: {
    attrs: {
      type: ["text/css"],
      media: null,
      scoped: null
    }
  },
  sub: X,
  summary: X,
  sup: X,
  table: X,
  tbody: X,
  td: { attrs: { colspan: null, rowspan: null, headers: null } },
  template: X,
  textarea: {
    attrs: {
      dirname: null,
      form: null,
      maxlength: null,
      name: null,
      placeholder: null,
      rows: null,
      cols: null,
      autofocus: ["autofocus"],
      disabled: ["disabled"],
      readonly: ["readonly"],
      required: ["required"],
      wrap: ["soft", "hard"]
    }
  },
  tfoot: X,
  th: { attrs: { colspan: null, rowspan: null, headers: null, scope: ["row", "col", "rowgroup", "colgroup"] } },
  thead: X,
  time: { attrs: { datetime: null } },
  title: X,
  tr: X,
  track: {
    attrs: {
      src: null,
      label: null,
      default: null,
      kind: ["subtitles", "captions", "descriptions", "chapters", "metadata"],
      srclang: null
    }
  },
  ul: { children: ["li", "script", "template", "ul", "ol"] },
  var: X,
  video: {
    attrs: {
      src: null,
      poster: null,
      width: null,
      height: null,
      crossorigin: ["anonymous", "use-credentials"],
      preload: ["auto", "metadata", "none"],
      autoplay: ["autoplay"],
      mediagroup: ["movie"],
      muted: ["muted"],
      controls: ["controls"]
    }
  },
  wbr: X
}, lf = {
  accesskey: null,
  class: null,
  contenteditable: me,
  contextmenu: null,
  dir: ["ltr", "rtl", "auto"],
  draggable: ["true", "false", "auto"],
  dropzone: ["copy", "move", "link", "string:", "file:"],
  hidden: ["hidden"],
  id: null,
  inert: ["inert"],
  itemid: null,
  itemprop: null,
  itemref: null,
  itemscope: ["itemscope"],
  itemtype: null,
  lang: ["ar", "bn", "de", "en-GB", "en-US", "es", "fr", "hi", "id", "ja", "pa", "pt", "ru", "tr", "zh"],
  spellcheck: me,
  autocorrect: me,
  autocapitalize: me,
  style: null,
  tabindex: null,
  title: null,
  translate: ["yes", "no"],
  rel: ["stylesheet", "alternate", "author", "bookmark", "help", "license", "next", "nofollow", "noreferrer", "prefetch", "prev", "search", "tag"],
  role: /* @__PURE__ */ "alert application article banner button cell checkbox complementary contentinfo dialog document feed figure form grid gridcell heading img list listbox listitem main navigation region row rowgroup search switch tab table tabpanel textbox timer".split(" "),
  "aria-activedescendant": null,
  "aria-atomic": me,
  "aria-autocomplete": ["inline", "list", "both", "none"],
  "aria-busy": me,
  "aria-checked": ["true", "false", "mixed", "undefined"],
  "aria-controls": null,
  "aria-describedby": null,
  "aria-disabled": me,
  "aria-dropeffect": null,
  "aria-expanded": ["true", "false", "undefined"],
  "aria-flowto": null,
  "aria-grabbed": ["true", "false", "undefined"],
  "aria-haspopup": me,
  "aria-hidden": me,
  "aria-invalid": ["true", "false", "grammar", "spelling"],
  "aria-label": null,
  "aria-labelledby": null,
  "aria-level": null,
  "aria-live": ["off", "polite", "assertive"],
  "aria-multiline": me,
  "aria-multiselectable": me,
  "aria-owns": null,
  "aria-posinset": null,
  "aria-pressed": ["true", "false", "mixed", "undefined"],
  "aria-readonly": me,
  "aria-relevant": null,
  "aria-required": me,
  "aria-selected": ["true", "false", "undefined"],
  "aria-setsize": null,
  "aria-sort": ["ascending", "descending", "none", "other"],
  "aria-valuemax": null,
  "aria-valuemin": null,
  "aria-valuenow": null,
  "aria-valuetext": null
}, cf = /* @__PURE__ */ "beforeunload copy cut dragstart dragover dragleave dragenter dragend drag paste focus blur change click load mousedown mouseenter mouseleave mouseup keydown keyup resize scroll unload".split(" ").map((n) => "on" + n);
for (let n of cf)
  lf[n] = null;
class Jn {
  constructor(e, t) {
    this.tags = { ...YS, ...e }, this.globalAttrs = { ...lf, ...t }, this.allTags = Object.keys(this.tags), this.globalAttrNames = Object.keys(this.globalAttrs);
  }
}
Jn.default = /* @__PURE__ */ new Jn();
function ai(n, e, t = n.length) {
  if (!e)
    return "";
  let i = e.firstChild, r = i && i.getChild("TagName");
  return r ? n.sliceString(r.from, Math.min(r.to, t)) : "";
}
function oi(n, e = !1) {
  for (; n; n = n.parent)
    if (n.name == "Element")
      if (e)
        e = !1;
      else
        return n;
  return null;
}
function hf(n, e, t) {
  let i = t.tags[ai(n, oi(e))];
  return (i == null ? void 0 : i.children) || t.allTags;
}
function Ws(n, e) {
  let t = [];
  for (let i = oi(e); i && !i.type.isTop; i = oi(i.parent)) {
    let r = ai(n, i);
    if (r && i.lastChild.name == "CloseTag")
      break;
    r && t.indexOf(r) < 0 && (e.name == "EndTag" || e.from >= i.firstChild.to) && t.push(r);
  }
  return t;
}
const ff = /^[:\-\.\w\u00b7-\uffff]*$/;
function Ao(n, e, t, i, r) {
  let O = /\s*>/.test(n.sliceDoc(r, r + 5)) ? "" : ">", s = oi(t, t.name == "StartTag" || t.name == "TagName");
  return {
    from: i,
    to: r,
    options: hf(n.doc, s, e).map((a) => ({ label: a, type: "type" })).concat(Ws(n.doc, t).map((a, o) => ({
      label: "/" + a,
      apply: "/" + a + O,
      type: "type",
      boost: 99 - o
    }))),
    validFor: /^\/?[:\-\.\w\u00b7-\uffff]*$/
  };
}
function Go(n, e, t, i) {
  let r = /\s*>/.test(n.sliceDoc(i, i + 5)) ? "" : ">";
  return {
    from: t,
    to: i,
    options: Ws(n.doc, e).map((O, s) => ({ label: O, apply: O + r, type: "type", boost: 99 - s })),
    validFor: ff
  };
}
function VS(n, e, t, i) {
  let r = [], O = 0;
  for (let s of hf(n.doc, t, e))
    r.push({ label: "<" + s, type: "type" });
  for (let s of Ws(n.doc, t))
    r.push({ label: "</" + s + ">", type: "type", boost: 99 - O++ });
  return { from: i, to: i, options: r, validFor: /^<\/?[:\-\.\w\u00b7-\uffff]*$/ };
}
function WS(n, e, t, i, r) {
  let O = oi(t), s = O ? e.tags[ai(n.doc, O)] : null, a = s && s.attrs ? Object.keys(s.attrs) : [], o = s && s.globalAttrs === !1 ? a : a.length ? a.concat(e.globalAttrNames) : e.globalAttrNames;
  return {
    from: i,
    to: r,
    options: o.map((l) => ({ label: l, type: "property" })),
    validFor: ff
  };
}
function qS(n, e, t, i, r) {
  var O;
  let s = (O = t.parent) === null || O === void 0 ? void 0 : O.getChild("AttributeName"), a = [], o;
  if (s) {
    let l = n.sliceDoc(s.from, s.to), c = e.globalAttrs[l];
    if (!c) {
      let h = oi(t), f = h ? e.tags[ai(n.doc, h)] : null;
      c = (f == null ? void 0 : f.attrs) && f.attrs[l];
    }
    if (c) {
      let h = n.sliceDoc(i, r).toLowerCase(), f = '"', u = '"';
      /^['"]/.test(h) ? (o = h[0] == '"' ? /^[^"]*$/ : /^[^']*$/, f = "", u = n.sliceDoc(r, r + 1) == h[0] ? "" : h[0], h = h.slice(1), i++) : o = /^[^\s<>='"]*$/;
      for (let d of c)
        a.push({ label: d, apply: f + d + u, type: "constant" });
    }
  }
  return { from: i, to: r, options: a, validFor: o };
}
function CS(n, e) {
  let { state: t, pos: i } = e, r = I(t).resolveInner(i, -1), O = r.resolve(i);
  for (let s = i, a; O == r && (a = r.childBefore(s)); ) {
    let o = a.lastChild;
    if (!o || !o.type.isError || o.from < o.to)
      break;
    O = r = a, s = o.from;
  }
  return r.name == "TagName" ? r.parent && /CloseTag$/.test(r.parent.name) ? Go(t, r, r.from, i) : Ao(t, n, r, r.from, i) : r.name == "StartTag" || r.name == "IncompleteTag" ? Ao(t, n, r, i, i) : r.name == "StartCloseTag" || r.name == "IncompleteCloseTag" ? Go(t, r, i, i) : r.name == "OpenTag" || r.name == "SelfClosingTag" || r.name == "AttributeName" ? WS(t, n, r, r.name == "AttributeName" ? r.from : i, i) : r.name == "Is" || r.name == "AttributeValue" || r.name == "UnquotedAttributeValue" ? qS(t, n, r, r.name == "Is" ? i : r.from, i) : e.explicit && (O.name == "Element" || O.name == "Text" || O.name == "Document") ? VS(t, n, r, i) : null;
}
function US(n) {
  let { extraTags: e, extraGlobalAttributes: t } = n, i = t || e ? new Jn(e, t) : Jn.default;
  return (r) => CS(i, r);
}
const AS = /* @__PURE__ */ He.parser.configure({ top: "SingleExpression" }), uf = [
  {
    tag: "script",
    attrs: (n) => n.type == "text/typescript" || n.lang == "ts",
    parser: Gh.parser
  },
  {
    tag: "script",
    attrs: (n) => n.type == "text/babel" || n.type == "text/jsx",
    parser: jh.parser
  },
  {
    tag: "script",
    attrs: (n) => n.type == "text/typescript-jsx",
    parser: Mh.parser
  },
  {
    tag: "script",
    attrs(n) {
      return /^(importmap|speculationrules|application\/(.+\+)?json)$/i.test(n.type);
    },
    parser: AS
  },
  {
    tag: "script",
    attrs(n) {
      return !n.type || /^(?:text|application)\/(?:x-)?(?:java|ecma)script$|^module$|^$/i.test(n.type);
    },
    parser: He.parser
  },
  {
    tag: "style",
    attrs(n) {
      return (!n.lang || n.lang == "css") && (!n.type || /^(text\/)?(x-)?(stylesheet|css)$/i.test(n.type));
    },
    parser: Kn.parser
  }
], $f = /* @__PURE__ */ [
  {
    name: "style",
    parser: /* @__PURE__ */ Kn.parser.configure({ top: "Styles" })
  }
].concat(/* @__PURE__ */ cf.map((n) => ({ name: n, parser: He.parser }))), df = /* @__PURE__ */ at.define({
  name: "html",
  parser: /* @__PURE__ */ Kg.configure({
    props: [
      /* @__PURE__ */ Ut.add({
        Element(n) {
          let e = /^(\s*)(<\/)?/.exec(n.textAfter);
          return n.node.to <= n.pos + e[0].length ? n.continue() : n.lineIndent(n.node.from) + (e[2] ? 0 : n.unit);
        },
        "OpenTag CloseTag SelfClosingTag"(n) {
          return n.column(n.node.from) + n.unit;
        },
        Document(n) {
          if (n.pos + /\s*/.exec(n.textAfter)[0].length < n.node.to)
            return n.continue();
          let e = null, t;
          for (let i = n.node; ; ) {
            let r = i.lastChild;
            if (!r || r.name != "Element" || r.to != i.to)
              break;
            e = i = r;
          }
          return e && !((t = e.lastChild) && (t.name == "CloseTag" || t.name == "SelfClosingTag")) ? n.lineIndent(e.from) + n.unit : null;
        }
      }),
      /* @__PURE__ */ At.add({
        Element(n) {
          let e = n.firstChild, t = n.lastChild;
          return !e || e.name != "OpenTag" ? null : { from: e.to, to: t.name == "CloseTag" ? t.from : n.to };
        }
      }),
      /* @__PURE__ */ Gc.add({
        "OpenTag CloseTag": (n) => n.getChild("TagName")
      })
    ]
  }),
  languageData: {
    commentTokens: { block: { open: "<!--", close: "-->" } },
    indentOnInput: /^\s*<\/\w+\W$/,
    wordChars: "-_"
  }
}), Xn = /* @__PURE__ */ df.configure({
  wrap: /* @__PURE__ */ tf(uf, $f)
});
function DO(n = {}) {
  let e = "", t;
  n.matchClosingTags === !1 && (e = "noMatch"), n.selfClosingTags === !0 && (e = (e ? e + " " : "") + "selfClosing"), (n.nestedLanguages && n.nestedLanguages.length || n.nestedAttributes && n.nestedAttributes.length) && (t = tf((n.nestedLanguages || []).concat(uf), (n.nestedAttributes || []).concat($f)));
  let i = t ? df.configure({ wrap: t, dialect: e }) : e ? Xn.configure({ dialect: e }) : Xn;
  return new hi(i, [
    Xn.data.of({ autocomplete: US(n) }),
    n.autoCloseTags !== !1 ? GS : [],
    Xt().support,
    of().support
  ]);
}
const jo = /* @__PURE__ */ new Set(/* @__PURE__ */ "area base br col command embed frame hr img input keygen link meta param source track wbr menuitem".split(" ")), GS = /* @__PURE__ */ k.inputHandler.of((n, e, t, i, r) => {
  if (n.composing || n.state.readOnly || e != t || i != ">" && i != "/" || !Xn.isActiveAt(n.state, e, -1))
    return !1;
  let O = r(), { state: s } = O, a = s.changeByRange((o) => {
    var l, c, h;
    let f = s.doc.sliceString(o.from - 1, o.to) == i, { head: u } = o, d = I(s).resolveInner(u, -1), p;
    if (f && i == ">" && d.name == "EndTag") {
      let Q = d.parent;
      if (((c = (l = Q.parent) === null || l === void 0 ? void 0 : l.lastChild) === null || c === void 0 ? void 0 : c.name) != "CloseTag" && (p = ai(s.doc, Q.parent, u)) && !jo.has(p)) {
        let m = u + (s.doc.sliceString(u, u + 1) === ">" ? 1 : 0), g = `</${p}>`;
        return { range: o, changes: { from: u, to: m, insert: g } };
      }
    } else if (f && i == "/" && d.name == "IncompleteCloseTag") {
      let Q = d.parent;
      if (d.from == u - 2 && ((h = Q.lastChild) === null || h === void 0 ? void 0 : h.name) != "CloseTag" && (p = ai(s.doc, Q, u)) && !jo.has(p)) {
        let m = u + (s.doc.sliceString(u, u + 1) === ">" ? 1 : 0), g = `${p}>`;
        return {
          range: S.cursor(u + g.length, -1),
          changes: { from: u, to: m, insert: g }
        };
      }
    }
    return { range: o };
  });
  return a.changes.empty ? !1 : (n.dispatch([
    O,
    s.update(a, {
      userEvent: "input.complete",
      scrollIntoView: !0
    })
  ]), !0);
}), jS = Ct({
  String: $.string,
  Number: $.number,
  "True False": $.bool,
  PropertyName: $.propertyName,
  Null: $.null,
  ", :": $.separator,
  "[ ]": $.squareBracket,
  "{ }": $.brace
}), MS = ot.deserialize({
  version: 14,
  states: "$bOVQPOOOOQO'#Cb'#CbOnQPO'#CeOvQPO'#ClOOQO'#Cr'#CrQOQPOOOOQO'#Cg'#CgO}QPO'#CfO!SQPO'#CtOOQO,59P,59PO![QPO,59PO!aQPO'#CuOOQO,59W,59WO!iQPO,59WOVQPO,59QOqQPO'#CmO!nQPO,59`OOQO1G.k1G.kOVQPO'#CnO!vQPO,59aOOQO1G.r1G.rOOQO1G.l1G.lOOQO,59X,59XOOQO-E6k-E6kOOQO,59Y,59YOOQO-E6l-E6l",
  stateData: "#O~OeOS~OQSORSOSSOTSOWQO_ROgPO~OVXOgUO~O^[O~PVO[^O~O]_OVhX~OVaO~O]bO^iX~O^dO~O]_OVha~O]bO^ia~O",
  goto: "!kjPPPPPPkPPkqwPPPPk{!RPPP!XP!e!hXSOR^bQWQRf_TVQ_Q`WRg`QcZRicQTOQZRQe^RhbRYQR]R",
  nodeNames: "⚠ JsonText True False Null Number String } { Object Property PropertyName : , ] [ Array",
  maxTerm: 25,
  nodeProps: [
    ["isolate", -2, 6, 11, ""],
    ["openedBy", 7, "{", 14, "["],
    ["closedBy", 8, "}", 15, "]"]
  ],
  propSources: [jS],
  skippedNodes: [0],
  repeatNodeCount: 2,
  tokenData: "(|~RaXY!WYZ!W]^!Wpq!Wrs!]|}$u}!O$z!Q!R%T!R![&c![!]&t!}#O&y#P#Q'O#Y#Z'T#b#c'r#h#i(Z#o#p(r#q#r(w~!]Oe~~!`Wpq!]qr!]rs!xs#O!]#O#P!}#P;'S!];'S;=`$o<%lO!]~!}Og~~#QXrs!]!P!Q!]#O#P!]#U#V!]#Y#Z!]#b#c!]#f#g!]#h#i!]#i#j#m~#pR!Q![#y!c!i#y#T#Z#y~#|R!Q![$V!c!i$V#T#Z$V~$YR!Q![$c!c!i$c#T#Z$c~$fR!Q![!]!c!i!]#T#Z!]~$rP;=`<%l!]~$zO]~~$}Q!Q!R%T!R![&c~%YRT~!O!P%c!g!h%w#X#Y%w~%fP!Q![%i~%nRT~!Q![%i!g!h%w#X#Y%w~%zR{|&T}!O&T!Q![&Z~&WP!Q![&Z~&`PT~!Q![&Z~&hST~!O!P%c!Q![&c!g!h%w#X#Y%w~&yO[~~'OO_~~'TO^~~'WP#T#U'Z~'^P#`#a'a~'dP#g#h'g~'jP#X#Y'm~'rOR~~'uP#i#j'x~'{P#`#a(O~(RP#`#a(U~(ZOS~~(^P#f#g(a~(dP#i#j(g~(jP#X#Y(m~(rOQ~~(wOW~~(|OV~",
  tokenizers: [0],
  topRules: { JsonText: [0, 1] },
  tokenPrec: 0
}), ES = /* @__PURE__ */ at.define({
  name: "json",
  parser: /* @__PURE__ */ MS.configure({
    props: [
      /* @__PURE__ */ Ut.add({
        Object: /* @__PURE__ */ Fe({ except: /^\s*\}/ }),
        Array: /* @__PURE__ */ Fe({ except: /^\s*\]/ })
      }),
      /* @__PURE__ */ At.add({
        "Object Array": hr
      })
    ]
  }),
  languageData: {
    closeBrackets: { brackets: ["[", "{", '"'] },
    indentOnInput: /^\s*[\}\]]$/
  }
});
function LS() {
  return new hi(ES);
}
const DS = 1, BS = 2, IS = 275, NS = 3, FS = 276, Mo = 277, HS = 278, KS = 4, JS = 5, eP = 6, tP = 7, Eo = 8, iP = 9, nP = 10, rP = 11, OP = 12, sP = 13, aP = 14, oP = 15, lP = 16, cP = 17, hP = 18, fP = 19, uP = 20, $P = 21, dP = 22, pP = 23, QP = 24, mP = 25, gP = 26, SP = 27, PP = 28, TP = 29, yP = 30, bP = 31, wP = 32, xP = 33, kP = 34, XP = 35, vP = 36, ZP = 37, RP = 38, zP = 39, _P = 40, YP = 41, VP = 42, WP = 43, qP = 44, CP = 45, UP = 46, AP = 47, GP = 48, jP = 49, MP = 50, EP = 51, LP = 52, DP = 53, BP = 54, IP = 55, NP = 56, FP = 57, HP = 58, KP = 59, JP = 60, e0 = 61, t0 = 62, Fr = 63, i0 = 64, n0 = 65, r0 = 66, O0 = {
  abstract: KS,
  and: JS,
  array: eP,
  as: tP,
  true: Eo,
  false: Eo,
  break: iP,
  case: nP,
  catch: rP,
  clone: OP,
  const: sP,
  continue: aP,
  declare: lP,
  default: oP,
  do: cP,
  echo: hP,
  else: fP,
  elseif: uP,
  enddeclare: $P,
  endfor: dP,
  endforeach: pP,
  endif: QP,
  endswitch: mP,
  endwhile: gP,
  enum: SP,
  extends: PP,
  final: TP,
  finally: yP,
  fn: bP,
  for: wP,
  foreach: xP,
  from: kP,
  function: XP,
  global: vP,
  goto: ZP,
  if: RP,
  implements: zP,
  include: _P,
  include_once: YP,
  instanceof: VP,
  insteadof: WP,
  interface: qP,
  list: CP,
  match: UP,
  namespace: AP,
  new: GP,
  null: jP,
  or: MP,
  print: EP,
  readonly: LP,
  require: DP,
  require_once: BP,
  return: IP,
  switch: NP,
  throw: FP,
  trait: HP,
  try: KP,
  unset: JP,
  use: e0,
  var: t0,
  public: Fr,
  private: Fr,
  protected: Fr,
  while: i0,
  xor: n0,
  yield: r0,
  __proto__: null
};
function Lo(n) {
  let e = O0[n.toLowerCase()];
  return e ?? -1;
}
function Do(n) {
  return n == 9 || n == 10 || n == 13 || n == 32;
}
function pf(n) {
  return n >= 97 && n <= 122 || n >= 65 && n <= 90;
}
function _i(n) {
  return n == 95 || n >= 128 || pf(n);
}
function Hr(n) {
  return n >= 48 && n <= 55 || n >= 97 && n <= 102 || n >= 65 && n <= 70;
}
const s0 = {
  int: !0,
  integer: !0,
  bool: !0,
  boolean: !0,
  float: !0,
  double: !0,
  real: !0,
  string: !0,
  array: !0,
  object: !0,
  unset: !0,
  __proto__: null
}, a0 = new te((n) => {
  if (n.next == 40) {
    n.advance();
    let e = 0;
    for (; Do(n.peek(e)); ) e++;
    let t = "", i;
    for (; pf(i = n.peek(e)); )
      t += String.fromCharCode(i), e++;
    for (; Do(n.peek(e)); ) e++;
    n.peek(e) == 41 && s0[t.toLowerCase()] && n.acceptToken(DS);
  } else if (n.next == 60 && n.peek(1) == 60 && n.peek(2) == 60) {
    for (let i = 0; i < 3; i++) n.advance();
    for (; n.next == 32 || n.next == 9; ) n.advance();
    let e = n.next == 39;
    if (e && n.advance(), !_i(n.next)) return;
    let t = String.fromCharCode(n.next);
    for (; n.advance(), !(!_i(n.next) && !(n.next >= 48 && n.next <= 55)); )
      t += String.fromCharCode(n.next);
    if (e) {
      if (n.next != 39) return;
      n.advance();
    }
    if (n.next != 10 && n.next != 13) return;
    for (; ; ) {
      let i = n.next == 10 || n.next == 13;
      if (n.advance(), n.next < 0) return;
      if (i) {
        for (; n.next == 32 || n.next == 9; ) n.advance();
        let r = !0;
        for (let O = 0; O < t.length; O++) {
          if (n.next != t.charCodeAt(O)) {
            r = !1;
            break;
          }
          n.advance();
        }
        if (r) return n.acceptToken(BS);
      }
    }
  }
}), o0 = new te((n) => {
  n.next < 0 && n.acceptToken(HS);
}), l0 = new te((n, e) => {
  n.next == 63 && e.canShift(Mo) && n.peek(1) == 62 && n.acceptToken(Mo);
});
function c0(n) {
  let e = n.peek(1);
  if (e == 110 || e == 114 || e == 116 || e == 118 || e == 101 || e == 102 || e == 92 || e == 36 || e == 34 || e == 123)
    return 2;
  if (e >= 48 && e <= 55) {
    let t = 2, i;
    for (; t < 5 && (i = n.peek(t)) >= 48 && i <= 55; ) t++;
    return t;
  }
  if (e == 120 && Hr(n.peek(2)))
    return Hr(n.peek(3)) ? 4 : 3;
  if (e == 117 && n.peek(2) == 123)
    for (let t = 3; ; t++) {
      let i = n.peek(t);
      if (i == 125) return t == 2 ? 0 : t + 1;
      if (!Hr(i)) break;
    }
  return 0;
}
const h0 = new te((n, e) => {
  let t = !1;
  for (; !(n.next == 34 || n.next < 0 || n.next == 36 && (_i(n.peek(1)) || n.peek(1) == 123) || n.next == 123 && n.peek(1) == 36); t = !0) {
    if (n.next == 92) {
      let i = c0(n);
      if (i) {
        if (t) break;
        return n.acceptToken(NS, i);
      }
    } else if (!t && (n.next == 91 || n.next == 45 && n.peek(1) == 62 && _i(n.peek(2)) || n.next == 63 && n.peek(1) == 45 && n.peek(2) == 62 && _i(n.peek(3))) && e.canShift(FS))
      break;
    n.advance();
  }
  t && n.acceptToken(IS);
}), f0 = Ct({
  "Visibility abstract final static": $.modifier,
  "for foreach while do if else elseif switch try catch finally return throw break continue default case": $.controlKeyword,
  "endif endfor endforeach endswitch endwhile declare enddeclare goto match": $.controlKeyword,
  "and or xor yield unset clone instanceof insteadof": $.operatorKeyword,
  "function fn class trait implements extends const enum global interface use var": $.definitionKeyword,
  "include include_once require require_once namespace": $.moduleKeyword,
  "new from echo print array list as": $.keyword,
  null: $.null,
  Boolean: $.bool,
  VariableName: $.variableName,
  "NamespaceName/...": $.namespace,
  "NamedType/...": $.typeName,
  Name: $.name,
  "CallExpression/Name": $.function($.variableName),
  "LabelStatement/Name": $.labelName,
  "MemberExpression/Name": $.propertyName,
  "MemberExpression/VariableName": $.special($.propertyName),
  "ScopedExpression/ClassMemberName/Name": $.propertyName,
  "ScopedExpression/ClassMemberName/VariableName": $.special($.propertyName),
  "CallExpression/MemberExpression/Name": $.function($.propertyName),
  "CallExpression/ScopedExpression/ClassMemberName/Name": $.function($.propertyName),
  "MethodDeclaration/Name": $.function($.definition($.variableName)),
  "FunctionDefinition/Name": $.function($.definition($.variableName)),
  "ClassDeclaration/Name": $.definition($.className),
  UpdateOp: $.updateOperator,
  ArithOp: $.arithmeticOperator,
  "LogicOp IntersectionType/&": $.logicOperator,
  BitOp: $.bitwiseOperator,
  CompareOp: $.compareOperator,
  ControlOp: $.controlOperator,
  AssignOp: $.definitionOperator,
  "$ ConcatOp": $.operator,
  LineComment: $.lineComment,
  BlockComment: $.blockComment,
  Integer: $.integer,
  Float: $.float,
  String: $.string,
  ShellExpression: $.special($.string),
  "=> ->": $.punctuation,
  "( )": $.paren,
  "#[ [ ]": $.squareBracket,
  "${ { }": $.brace,
  "-> ?->": $.derefOperator,
  ", ; :: : \\": $.separator,
  "PhpOpen PhpClose": $.processingInstruction
}), u0 = { __proto__: null, static: 325, STATIC: 325, class: 351, CLASS: 351 }, $0 = ot.deserialize({
  version: 14,
  states: "%#[Q`OWOOQhQaOOP%oO`OOOOO#t'#Hh'#HhO%tO#|O'#DuOOO#u'#Dx'#DxQ&SOWO'#DxO&XO$VOOOOQ#u'#Dy'#DyO&lQaO'#D}O'[QdO'#EQO+QQdO'#IqO+_QdO'#ERO-RQaO'#EXO/bQ`O'#EUO/gQ`O'#E_O2UQaO'#E_O2]Q`O'#EgO2bQ`O'#EqO-RQaO'#EqO2mQpO'#FOO2rQ`O'#FOOOQS'#Iq'#IqO2wQ`O'#ExOOQS'#Ih'#IhO5SQdO'#IeO9UQeO'#F]O-RQaO'#FlO-RQaO'#FmO-RQaO'#FnO-RQaO'#FoO-RQaO'#FoO-RQaO'#FrOOQO'#Ir'#IrO9cQ`O'#FxOOQO'#Ht'#HtO9kQ`O'#HXO:VQ`O'#FsO:bQ`O'#HfO:mQ`O'#GPO:uQaO'#GQO-RQaO'#G`O-RQaO'#GcO;bOrO'#GfOOQS'#JP'#JPOOQS'#JO'#JOOOQS'#Ie'#IeO/bQ`O'#GmO/bQ`O'#GoO/bQ`O'#GtOhQaO'#GvO;iQ`O'#GwO;nQ`O'#GzO:]Q`O'#G}O;sQeO'#HOO;sQeO'#HPO;sQeO'#HQO;}Q`O'#HRO<SQ`O'#HTO<XQaO'#HUO>hQ`O'#HVO:]Q`O'#HWO>mQ`O'#HWO;}Q`O'#HXO:]Q`O'#HZO:]Q`O'#H[O:]Q`O'#H]O>rQ`O'#H`O>}Q`O'#HaO<XQaO'#HeOOQ#u'#Ic'#IcOOQ#u'#Hj'#HjQhQaOOO:]Q`O'#HYO:QQ`O'#HYO?]O#|O'#DsPOOO)CDT)CDTOOO#t-E;f-E;fOOO#u,5:d,5:dOOO#u'#Hi'#HiO&XO$VOOO?hQ$VO'#IbOOOO'#Ib'#IbQOOOOOOOQ#y,5:i,5:iO?oQaO,5:iOOQ#u,5:k,5:kO?vQaO,5:nO?}QaO,5;VO@UQpO,5;WOBsQaO'#EuOOQS,5;`,5;`OBzQ`O,5;pOOQP'#Fd'#FdO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xO-RQaO,5;xOOQ#u'#Iv'#IvOOQS,5<z,5<zOOQ#u,5:m,5:mODsQ`O,5:sODzQ`O'#FsOESQ`O'#FsOE[Q`O,5:pOEaQaO'#E`OOQS,5:y,5:yOGeQ`O'#IjO<XQaO'#EbO<XQaO'#IjOOQS'#Ij'#IjOGlQ`O'#IiOGtQ`O,5:yO/lQaO,5:yOGyQaO'#EhOOQS,5;R,5;ROOQS,5;],5;]OHTQ`O,5;]OHsQdO'#FQOJxQ`O'#HrO2mQpO,5;jOOQS,5;j,5;jOJ}QpO,5;jOKSQtO'#EQOKaQpO,5;dO2wQ`O'#E|OOQS'#E}'#E}OOQS'#Ip'#IpOKlQaO,5:xO-RQaO,5;uOOQS,5;w,5;wO-RQaO,5;wOKsQdO,5<WOLTQdO,5<XOLeQdO,5<YOLuQdO,5<ZON|QdO,5<ZO! TQdO,5<^O! eQ`O'#FyO! pQ`O'#IuO! xQ`O,5<dOOQO-E;r-E;rO! }Q`O'#I}O:]Q`O,5=rO!!VQ`O,5=rO;}Q`O,5=sO:]Q`O,5=wO:]Q`O,5=tO!![Q`O,5=tOOQS'#EQ'#EQO!!aQ`O'#FuO!!wQ`O,5<_O!#SQ`O,5<_O!#[Q`O,5?iO!#aQ`O,5<_O!#iQ`O,5<kO!#qQdO'#GYO!$PQdO'#I|O!$[QdO,5>QO!$dQ`O,5<kO!#[Q`O,5<kO!$lQdO,5<lO!$|Q`O,5<lO!%[Q`O,5<lO!%rQdO,5<zO!'wQdO,5<}O!(XOrO'#IPOOOQ'#JS'#JSO-RQaO'#GkOOOQ'#IP'#IPO!(yOrO,5=QOOQS,5=Q,5=QO!)QQaO,5=XO!)XQ`O,5=ZO!)aQeO,5=`O!)kQ`O,5=bO!)pQaO'#GxO!)aQeO,5=cO<XQaO'#G{O!)aQeO,5=fO!$[QdO,5=iO+_QdO,5=jOOQ#u,5=j,5=jO+_QdO,5=kOOQ#u,5=k,5=kO+_QdO,5=lOOQ#u,5=l,5=lO!)wQ`O,5=mO:]Q`O,5=oO!*PQdO'#JUOOQS'#JU'#JUO!$[QdO,5=pO!+iQaO,5=qO!-xQ`O'#GWO!-}QdO'#I{O!$[QdO,5=rOOQ#u,5=s,5=sO!.YQ`O,5=uO!.]Q`O,5=vO!.bQ`O,5=wO!.mQdO,5=zOOQ#u,5=z,5=zO2mQpO,5={O!.xQ`O,5={O!.}QdO'#JVO!$[QdO,5={O!/]Q`O,5={O!/eQdO'#IgO!$[QdO,5>POOQ#u-E;h-E;hO!1QQ`O,5=tOOO#u,5:_,5:_O!1]O#|O,5:_OOO#u-E;g-E;gOOOO,5>|,5>|OOQ#y1G0T1G0TO!1eQ`O1G0YO-RQaO1G0YO!2wQ`O1G0qOOQS1G0q1G0qOOQS'#Eo'#EoOOQS'#Il'#IlO-RQaO'#IlOOQS1G0r1G0rO!4ZQ`O'#IoO!5pQ`O'#IqO!5}QaO'#EwOOQO'#Io'#IoO!6XQ`O'#InO!6aQ`O,5;aO-RQaO'#FXOOQS'#FW'#FWOOQS1G1[1G1[O!6fQdO1G1dO!8kQdO1G1dO!:WQdO1G1dO!;sQdO1G1dO!=`QdO1G1dO!>{QdO1G1dO!@hQdO1G1dO!BTQdO1G1dO!CpQdO1G1dO!E]QdO1G1dO!FxQdO1G1dO!HeQdO1G1dO!JQQdO1G1dO!KmQdO1G1dO!MYQdO1G1dO!NuQdO1G1dOOQT1G0_1G0_O!#[Q`O,5<_O#!bQaO'#EYOOQS1G0[1G0[O#!iQ`O,5:zOEdQaO,5:zO#!nQaO,5;OO#!uQdO,5:|O#$tQdO,5?UO#&sQaO'#HmO#'TQ`O,5?TOOQS1G0e1G0eO#']Q`O1G0eO#'bQ`O'#IkO#(zQ`O'#IkO#)SQ`O,5;SOG|QaO,5;SOOQS1G0w1G0wOOQO,5>^,5>^OOQO-E;p-E;pOOQS1G1U1G1UO#)pQdO'#FQO#+uQ`O'#HsOJ}QpO1G1UO2wQ`O'#HpO#+zQtO,5;eO2wQ`O'#HqO#,iQtO,5;gO#-WQaO1G1OOOQS,5;h,5;hO#/gQtO'#FQO#/tQdO1G0dO-RQaO1G0dO#1aQdO1G1aO#2|QdO1G1cOOQO,5<e,5<eO#3^Q`O'#HuO#3lQ`O,5?aOOQO1G2O1G2OO:]Q`O,5?iO!$[QdO1G3^O:]Q`O1G3^OOQ#u1G3_1G3_O#3tQ`O1G3cO!1QQ`O1G3`O:]Q`O1G3`O#4PQpO'#FvO#4_Q`O'#FvO#4oQ`O'#FvO#4zQ`O'#FvO#5SQ`O'#FzO#5XQ`O'#F{OOQO'#It'#ItO#5`Q`O'#IsO#5hQ`O,5<aOOQS1G1y1G1yO2wQ`O1G1yO#5mQ`O1G1yO#5rQ`O1G1yO!#[Q`O1G5TO#5}QdO1G5TO!#[Q`O1G1yO#6]Q`O1G2VO!#[Q`O1G2VO<XQaO,5<tO#6eQdO'#H}O#6sQdO,5?hOOQ#u1G3l1G3lO-RQaO1G2VO2wQ`O1G2VO#7OQdO1G2WO9cQ`O'#GSO9cQ`O'#GTO#9bQ`O'#GUOOQS1G2W1G2WO!.]Q`O1G2WO!1TQ`O1G2WO!1QQ`O1G2WO!$|Q`O1G2WO:]O`O,5=RO#:[O`O,5=RO#:gO!bO,5=SO#:uQ`O,5=VOOOQ-E;}-E;}OOQS1G2l1G2lO#:|QaO'#GnO#;gQ$VO1G2sO#@gQ`O1G2sO#@rQ`O'#GpO#@}Q`O'#GsOOQ#u1G2u1G2uO#AYQ`O1G2uOOQ#u'#Gu'#GuOOQ#u'#JT'#JTOOQ#u1G2z1G2zO#A_Q`O1G2zO/bQ`O1G2|O#AdQaO,5=dO#AkQ`O,5=dOOQ#u1G2}1G2}O#ApQ`O1G2}O#AuQ`O,5=gOOQ#u1G3Q1G3QO#CXQ`O1G3QOOQ#u1G3T1G3TOOQ#u1G3U1G3UOOQ#u1G3V1G3VOOQ#u1G3W1G3WO#C^Q`O'#IUO;}Q`O'#IUO#CcQ$VO1G3XO#HiQ`O1G3ZO<XQaO'#ITO#HnQdO,5=eOOQ#u1G3[1G3[O#HyQ`O1G3]O<XQaO,5<rO#IOQdO'#H|O#I^QdO,5?gOOQ#u1G3^1G3^OOQ#u1G3a1G3aO!.]Q`O1G3aOOQ#u1G3b1G3bO#IiQ`O'#H^OOQ#u1G3c1G3cO#JfQ`O1G3cO#JkQ`O1G3cOOQ#u1G3f1G3fO#J|Q`O1G3gO#KRQpO1G3gO#KZQdO'#IWO#KlQdO,5?qO:]Q`O,5?qOOQ#u1G3g1G3gO2mQpO1G3gO#KwQ`O1G3gO!$[QdO1G3gO#K|QeO'#HkO#L^QdO,5?ROOQ#u1G3k1G3kOOQ#u1G3`1G3`O!.]Q`O1G3`O!1TQ`O1G3`OOO#u1G/y1G/yO-RQaO7+%tO#LlQdO7+%tOOQS7+&]7+&]O#NXQ`O,5?WO!+iQaO,5;bO#N`Q`O,5;cO$ uQaO'#HoO$!PQ`O,5?YOOQS1G0{1G0{O$!XQ`O,5;sO$!`Q`O'#EZO$!eQ`O'#IfO$!mQ`O,5:tOOQS1G0f1G0fO$!rQ`O1G0fO$!wQ`O1G0jO<XQaO1G0jOOQO,5>X,5>XOOQO-E;k-E;kOOQS7+&P7+&PO!+iQaO,5;TO$$^QaO'#HnO$$hQ`O,5?VOOQS1G0n1G0nO$$pQ`O1G0nPOQO'#FQ'#FQOOQO,5>_,5>_OOQO-E;q-E;qOOQS7+&p7+&pOOQS,5>[,5>[OOQS-E;n-E;nO$$uQtO,5>]OOQS-E;o-E;oO$%dQdO7+&jO$'iQtO'#FQO$'vQdO7+&OOOQS1G0j1G0jOOQO,5>a,5>aOOQO-E;s-E;sOOQ#u7+(x7+(xO!$[QdO7+(xOOQ#u7+(}7+(}O#JfQ`O7+(}O#JkQ`O7+(}OOQ#u7+(z7+(zO!.]Q`O7+(zO!1TQ`O7+(zO!1QQ`O7+(zO$)cQ`O,5<bO$)mQ`O,5<bO$)xQ`O,5<fO$)}QpO,5<bO$*]Q`O,5<bO!+iQaO,5<bOOQO,5<f,5<fO$*eQpO,5<gO$*pQ`O,5<gO$+OQ`O'#HwO$+iQ`O,5?_OOQS1G1{1G1{O$+qQpO7+'eO$+|Q`O'#GOO$,XQ`O7+'eOOQS7+'e7+'eO2wQ`O7+'eO#5mQ`O7+'eO$,aQdO7+*oO2wQ`O7+*oO$,oQ`O7+'eO-RQaO7+'qO2wQ`O7+'qO$,zQ`O7+'qO$-SQdO1G2`OOQS,5>i,5>iOOQS-E;{-E;{O$.lQdO7+'qO$.|QpO7+'qO$/XQdO'#IxOOQO,5<n,5<nOOQO,5<o,5<oO$/jQpO'#GXO$/uQ`O'#GXOOQO'#Iz'#IzOOQO'#H{'#H{O$0iQ`O'#GXO#JkQ`O'#GVO$1YQdO'#GXO!.mQdO'#GZO9cQ`O'#G[OOQO'#Iy'#IyOOQO'#Hz'#HzO$1eQ`O,5<pOOQ#y,5<p,5<pOOQS7+'r7+'rO!.]Q`O7+'rO!1TQ`O7+'rO!1QQ`O7+'rOOOQ1G2m1G2mO:]O`O1G2mO$2_O!bO1G2nO$2mO`O'#GiO$2rO`O1G2nOOOQ1G2q1G2qO$2wQaO,5=YO/bQ`O'#IQO$3bQ$VO7+(_OhQaO7+(_O/bQ`O'#IRO$8bQ`O7+(_O!$[QdO7+(_O$8mQ`O7+(_O$8rQaO'#GqO$;RQ`O'#GrOOQO'#IS'#ISO$;ZQ`O,5=[OOQ#u,5=[,5=[O$;fQ`O,5=_O!$[QdO7+(aO!$[QdO7+(fO!$[QdO7+(hO$;qQaO1G3OO$;xQ`O1G3OO$;}QaO1G3OO!$[QdO7+(iO<XQaO1G3RO!$[QdO7+(lO2wQ`O'#HSO;}Q`O,5>pOOQ#u,5>p,5>pOOQ#u-E<S-E<SO$<UQaO7+(uO$<mQdO,5>oOOQS-E<R-E<RO!$[QdO7+(wO$>VQdO1G2^OOQS,5>h,5>hOOQS-E;z-E;zOOQ#u7+({7+({O$?oQ`O'#GXO:]Q`O'#H_OOQO'#IV'#IVO$@fQ`O,5=xOOQ#u,5=x,5=xO$AcQ!bO'#EQO$AzQ!bO7+(}O$BYQpO7+)RO#KRQpO7+)RO$BbQ`O'#HbO!$[QdO7+)RO$BpQdO,5>rOOQS-E<U-E<UO$COQdO1G5]O$CZQ`O7+)RO#KRQpO7+)ROOQ#u7+)R7+)RO$C`QdO,5>VOOQS-E;i-E;iO$D{QdO<<I`OOQS1G4r1G4rO$FhQ`O1G0|OOQO,5>Z,5>ZOOQO-E;m-E;mOOQS1G1_1G1_O$8rQaO,5:uO$G}QaO'#HlO$H[Q`O,5?QOOQS1G0`1G0`OOQS7+&Q7+&QO$HdQ`O7+&UO$IyQ`O1G0oO$K`Q`O,5>YOOQO,5>Y,5>YOOQO-E;l-E;lOOQS7+&Y7+&YOOQS7+&U7+&UOOQ#u<<Ld<<LdOOQ#u<<Li<<LiO$AzQ!bO<<LiOOQ#u<<Lf<<LfO!.]Q`O<<LfO!1TQ`O<<LfO$LxQ`O1G1|O$MTQ`O1G2QO!+iQaO1G1|OOQO1G2Q1G2QO$MYQ`O1G1|O$MdQ`O1G1|O$NyQ`O1G2RO% XQ`O'#F|O!+iQaO1G2ROOQO1G2R1G2ROOQO,5>c,5>cOOQO-E;u-E;uOOQS<<KP<<KPO% aQ`O'#IwO% iQ`O'#IwO% nQ`O,5<jO2wQ`O<<KPO$+qQpO<<KPO% sQ`O<<KPO2wQ`O<<NZO% {QtO<<NZO#5mQ`O<<KPO%!^QdO<<K]O%!nQpO<<K]O-RQaO<<K]O2wQ`O<<K]O%!yQdO'#HyO%#bQdO,5?dO$1YQdO,5<sO$/jQpO,5<sO%#sQ`O,5<sO#JkQ`O,5<qO!.mQdO,5<uOOQO-E;y-E;yO%$dQ!bO,5<qO%$oQ!bO'#IqO!$[QdO,5<qOOQO,5<s,5<sOOQO,5<u,5<uO%$}QdO,5<vOOQO-E;x-E;xOOQ#y1G2[1G2[OOQS<<K^<<K^O!.]Q`O<<K^O!1TQ`O<<K^OOOQ7+(X7+(XO%%YO`O7+(YOOOO,5=T,5=TOOOQ7+(Y7+(YOhQaO,5>lOOQ#u-E<O-E<OOhQaO<<KyOOQ#u<<Ky<<KyO$8mQ`O,5>mOOQO-E<P-E<PO!$[QdO<<KyO$8mQ`O<<KyO%%_Q`O<<KyO%%dQ`O,5=]O%&yQaO,5=^OOQO-E<Q-E<QOOQ#u1G2v1G2vOOQ#u<<K{<<K{OOQ#u<<LQ<<LQOOQ#u<<LS<<LSOOQT7+(j7+(jO%'ZQ`O7+(jO%'`QaO7+(jO%'gQ`O7+(jOOQ#u<<LT<<LTO%'lQ`O7+(mO%)RQ`O7+(mOOQ#u<<LW<<LWO%)WQpO,5=nOOQ#u1G4[1G4[O%)fQ`O<<LaOOQ#u<<Lc<<LcO:]Q`O,5=yO%)kQdO,5=yOOQO-E<T-E<TOOQ#u1G3d1G3dO%)vQ!bO,5;eO%*XQ!bO,5;gO#JfQ`O<<LiO%*jQ!bO'#FQP%+OQpO<<LmO!$[QdO<<LmO%+WQ`O'#HcO9cQ`O'#HcO%+cQ`O'#JWO%+kQ`O,5=|OOQ#u<<Lm<<LmO:]Q`O1G4^O%+pQdO7+*wO$BYQpO<<LmO#KRQpO<<LmO%+{Q`O1G0aOOQO,5>W,5>WOOQO-E;j-E;jO!+iQaO,5;UOOQ#uANBTANBTO#JfQ`OANBTOOQ#uANBQANBQO!.]Q`OANBQO!+iQaO7+'hOOQO7+'l7+'lO%-bQ`O7+'hO%.wQ`O7+'hO%/SQ`O7+'lO!+iQaO7+'mOOQO7+'m7+'mO%/XQdO'#F}OOQO'#Hv'#HvO%/jQ`O,5<hOOQO,5<h,5<hO%/rQ`O7+'mO%1XQ`O'#HxO%1gQ`O,5?cO%1gQ`O,5?cOOQO1G2U1G2UO$+qQpOAN@kOOQSAN@kAN@kO2wQ`OAN@kO%1oQtOANCuO%2QQ`OAN@kO-RQaOAN@wO%2YQdOAN@wO%2jQpOAN@wOOQS,5>e,5>eOOQS-E;w-E;wOOQO1G2_1G2_O$1YQdO1G2_O$/jQpO1G2_O#JkQ`O1G2]O!.mQdO1G2aO%$dQ!bO1G2]O!$[QdO1G2]OOQO1G2a1G2aOOQO1G2]1G2]O%2uQaO'#G]OOQO1G2b1G2bOOQSAN@xAN@xO!.]Q`OAN@xOOOQ<<Kt<<KtOOQ#u1G4W1G4WOOQ#uANAeANAeOOQO1G4X1G4XO%4tQ`OANAeO!$[QdOANAeO%4yQaO1G2wO%5ZQaO1G2xOOQT<<LU<<LUO%5kQ`O<<LUO%5pQaO<<LUO-RQaO,5=hOOQT<<LX<<LXOOQO1G3Y1G3YO%5wQ`O1G3YO!)aQeOANA{O%5|QdO1G3eOOQO1G3e1G3eO%6XQ`O1G3eO%6aQ!bO,5>]O%6rQ!bO'#FQO!$[QdOANBXOOQ#uANBXANBXO:]Q`O,5=}O%7WQ`O,5=}O%7cQ`O'#IXO%7wQ`O,5?rOOQS1G3h1G3hOOQS7+)x7+)xP%+OQpOANBXO%8PQ`O1G0pOOQ#uG27oG27oOOQ#uG27lG27lO%9fQ`O<<KSO!+iQaO<<KSOOQO<<KW<<KWO%:{Q`O<<KXOOQO,5<i,5<iO-RQaO,5<iO%<bQ`O,5<iOOQO-E;t-E;tOOQO1G2S1G2SOOQO,5>d,5>dO%<jQ`O,5>dOOQO-E;v-E;vO%<oQ`O1G4}OOQSG26VG26VO$+qQpOG26VO2wQ`OG26VO%<wQdOG26cO-RQaOG26cOOQO7+'y7+'yO$1YQdO7+'yO%$dQ!bO7+'wO!$[QdO7+'wOOQO7+'{7+'{OOQO7+'w7+'wO%=XQ`OLD+}O%>hQ`O'#IqO%>rQ`O'#IhO!$[QdO'#IOO%@lQaO,5<wOOQO,5<w,5<wOOQSG26dG26dO!$[QdOG27POOQ#uG27PG27PO%BkQaO7+(cOOQTANApANApO%B{Q`OANApO%CQQ`O1G3SOOQO7+(t7+(tOOQ#uG27gG27gO%CXQ`OG27gOOQO7+)P7+)PO%C^Q`O7+)PO!$[QdO7+)POOQ#uG27sG27sOOQO1G3i1G3iO:]Q`O1G3iO%CfQ`O'#HdO9cQ`O'#HdOOQO,5>s,5>sOOQO-E<V-E<VP!$[QdOG27sO%CqQ`OAN@nO+_QdO1G2TOOQO1G2T1G2TO-RQaO1G2TOOQO1G4O1G4OOOQSLD+qLD+qO$+qQpOLD+qO%EWQdOLD+}OOQO<<Ke<<KeO!$[QdO<<KcOOQO<<Kc<<KcO:]Q`O,5<xO%EhQ`O,5<yOOQP,5>j,5>jOOQP-E;|-E;|OOQO1G2c1G2cOOQ#uLD,kLD,kOOQTG27[G27[O!$[QdOLD-RO!$[QdO<<LkOOQO<<Lk<<LkOOQO7+)T7+)TO:]Q`O,5>OO%EpQ`O,5>OPOQ#uLD-_LD-_OOQO7+'o7+'oO+_QdO7+'oOOQS!$( ]!$( ]OOQOAN@}AN@}OOQS1G2d1G2dOOQS1G2e1G2eO%E{QdO1G2eOOQ#u!$(!m!$(!mOOQOANBVANBVOOQO1G3j1G3jO:]Q`O1G3jOOQO<<KZ<<KZOOQS7+(P7+(POOQO7+)U7+)UO%FWQpO'#FOO%F]QpO'#FOO%FWQpO,5;jO%F]QpO,5;jO%FbQpO,5;jO%FgQpO,5;jO#JkQ`O'#E|O%FlQdO,5<lO%HbQaO,5;OO%FbQpO1G1UO%FgQpO1G1UO#JkQ`O'#HpO#JkQ`O'#HqO-RQaO1G0jO%HiQ`O'#FOO%HnQ`O'#FOO%HsQaO'#GQO#-WQaO'#G`O#-WQaO'#GcO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO#-WQaO,5;xO%H}QdO'#IjO%JmQdO'#IjO#-WQaO'#EbO#-WQaO'#IjO%LrQaO,5:xO#-WQaO,5;uO#-WQaO,5;wO%LyQdO,5<WO%NoQdO,5<XO&!eQdO,5<YO&$ZQdO,5<ZO&&PQdO,5<ZO&&aQdO,5<^O&(VQdO,5<}O#-WQaO1G0YO&){QdO1G1dO&+qQdO1G1dO&-gQdO1G1dO&/]QdO1G1dO&1RQdO1G1dO&2wQdO1G1dO&4mQdO1G1dO&6cQdO1G1dO&8XQdO1G1dO&9}QdO1G1dO&;sQdO1G1dO&=iQdO1G1dO&?_QdO1G1dO&ATQdO1G1dO&ByQdO1G1dO&DoQdO,5:|O&FeQdO,5?UO&HZQdO1G0dO#-WQaO1G0dO&JPQdO1G1aO&KuQdO1G1cO#-WQaO1G2VO#-WQaO7+%tO&MkQdO7+%tO' aQdO7+&OO#-WQaO7+'qO'#VQdO7+'qO'${QdO<<I`O'&qQdO<<K]O#-WQaO<<K]O#-WQaOAN@wO'(gQdOAN@wO'*]QdOG26cO#-WQaOG26cO',RQdOLD+}O'-wQaO,5;OO'/vQaO1G0jO'1rQdO'#IeO'2PQeO'#F]O'5vQeO'#F]O#-WQaO'#FlO'/vQaO'#FlO#-WQaO'#FmO'/vQaO'#FmO#-WQaO'#FnO'/vQaO'#FnO#-WQaO'#FoO'/vQaO'#FoO#-WQaO'#FoO'/vQaO'#FoO#-WQaO'#FrO'/vQaO'#FrO'9|QaO,5:nO':TQ`O,5<kO':]Q`O1G0YO'/vQaO1G1OO';oQ`O1G2VO';wQ`O7+'qO'<PQpO7+'qO'<[QpO<<K]O'<gQpOAN@wO'<rQaO'#GQO'/vQaO'#G`O'/vQaO'#GcO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO,5;xO'/vQaO'#EbO'/vQaO'#IjO'>tQaO,5:xO'/vQaO,5;uO'/vQaO,5;wO'@sQdO,5<WO'BxQdO,5<XO'D}QdO,5<YO'GSQdO,5<ZO'IXQdO,5<ZO'IxQdO,5<^O'K}QdO,5<}O'/vQaO1G0YO'NSQdO1G1dO(!XQdO1G1dO($^QdO1G1dO(&cQdO1G1dO((hQdO1G1dO(*mQdO1G1dO(,rQdO1G1dO(.wQdO1G1dO(0|QdO1G1dO(3RQdO1G1dO(5WQdO1G1dO(7]QdO1G1dO(9bQdO1G1dO(;gQdO1G1dO(=lQdO1G1dO(?qQdO,5:|O(AvQdO,5?UO(C{QdO1G0dO'/vQaO1G0dO(FQQdO1G1aO(HVQdO1G1cO'/vQaO1G2VO'/vQaO7+%tO(J[QdO7+%tO(LaQdO7+&OO'/vQaO7+'qO(NfQdO7+'qO)!kQdO<<I`O)$pQdO<<K]O'/vQaO<<K]O'/vQaOAN@wO)&uQdOAN@wO)(zQdOG26cO'/vQaOG26cO)+PQdOLD+}O)-UQaO,5;OO#-WQaO1G0jO)-]Q`O'#GPO)-eQpO,5;dO)-pQ`O,5<kO!#[Q`O,5<kO!#[Q`O1G2VO2wQ`O1G2VO2wQ`O7+'qO2wQ`O<<K]O)-xQdO,5<lO)/}QdO'#IjO)1vQdO'#IeO)2dQaO,5:nO)2kQ`O,5<kO)2sQ`O1G0YO)4VQ`O1G2VO)4_Q`O7+'qO)4gQpO7+'qO)4rQpO<<K]O)4}QpOAN@wO2wQ`O'#ExO<XQaO'#FlO<XQaO'#FmO<XQaO'#FnO<XQaO'#FoO<XQaO'#FoO<XQaO'#FrO)5YQaO'#GQO<XQaO'#G`O<XQaO'#GcO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO<XQaO,5;xO)5dQ`O'#FsO-RQaO'#EbO-RQaO'#IjO)5lQaO,5:xO<XQaO,5;uO<XQaO,5;wO)5sQdO,5<WO)7rQdO,5<XO)9qQdO,5<YO);pQdO,5<ZO)=oQdO,5<ZO)>YQdO,5<^O)@XQdO,5<lO)BWQdO,5<}O)DVQ`O'#JUO)ElQ`O'#IgO<XQaO1G0YO)GRQdO1G1dO)IQQdO1G1dO)KPQdO1G1dO)MOQdO1G1dO)N}QdO1G1dO*!|QdO1G1dO*${QdO1G1dO*&zQdO1G1dO*(yQdO1G1dO**xQdO1G1dO*,wQdO1G1dO*.vQdO1G1dO*0uQdO1G1dO*2tQdO1G1dO*4sQdO1G1dO*6rQaO,5;OO*6yQdO,5:|O*7ZQdO,5?UO*7kQaO'#HmO*7{Q`O,5?TO*8TQdO1G0dO<XQaO1G0dO*:SQdO1G1aO*<RQdO1G1cO<XQaO1G2VO!+iQaO'#ITO*>QQ`O,5=eO*>YQaO'#HkO*>dQ`O,5?RO<XQaO7+%tO*>lQdO7+%tO*@kQ`O1G0jO!+iQaO1G0jO*BQQdO7+&OO<XQaO7+'qO*DPQdO7+'qO*FOQ`O,5>oO*GeQ`O,5>VO*HzQdO<<I`O*JyQ`O7+&UO*L`QdO<<K]O<XQaO<<K]O<XQaOAN@wO*N_QdOAN@wO+!^QdOG26cO<XQaOG26cO+$]QdOLD+}O+&[QaO,5;OO<XQaO1G0jO+&cQdO'#IjO+'PQ`O'#GPO+'XQ`O,5<kO!#[Q`O,5<kO!#[Q`O1G2VO2wQ`O1G2VO2wQ`O7+'qO2wQ`O<<K]O+'aQdO'#IeO+'}QeO'#F]O+(nQeO'#F]O+*jQaO'#F]O+,SQaO'#F]O!+iQaO'#FlO!+iQaO'#FmO!+iQaO'#FnO!+iQaO'#FoO!+iQaO'#FoO!+iQaO'#FrO+-rQaO'#GQO!+iQaO'#G`O!+iQaO'#GcO+-|QaO,5:nO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO!+iQaO,5;xO+.TQ`O'#IjO$8rQaO'#EbO+/mQaOG26cO$8rQaO'#IjO+1iQ`O'#IiO+1qQaO,5:xO!+iQaO,5;uO!+iQaO,5;wO+1xQ`O,5<WO+3_Q`O,5<XO+4tQ`O,5<YO+6ZQ`O,5<ZO+7pQ`O,5<ZO+9VQ`O,5<^O+:lQ`O,5<kO+:tQ`O,5<lO+<ZQ`O,5<}O+=pQ`O1G0YO!+iQaO1G0YO+?SQ`O1G1dO+@iQ`O1G1dO+BOQ`O1G1dO+CeQ`O1G1dO+DzQ`O1G1dO+FaQ`O1G1dO+GvQ`O1G1dO+I]Q`O1G1dO+JrQ`O1G1dO+LXQ`O1G1dO+MnQ`O1G1dO, TQ`O1G1dO,!jQ`O1G1dO,$PQ`O1G1dO,%fQ`O1G1dO,&{Q`O1G0dO!+iQaO1G0dO,(bQ`O1G1aO,)wQ`O1G1cO,+^Q`O1G2VO$8rQaO,5<tO!+iQaO1G2VO!+iQaO7+%tO,+fQ`O7+%tO,,{Q`O7+&OO!+iQaO7+'qO,.bQ`O7+'qO,.jQ`O7+'qO,0PQpO7+'qO,0[Q`O<<I`O,1qQ`O<<K]O,3WQpO<<K]O!+iQaO<<K]O!+iQaOAN@wO,3cQ`OAN@wO,4xQpOAN@wO,5TQ`OG26cO!+iQaOG26cO,6jQ`OLD+}O,8PQaO,5;OO!+iQaO1G0jO,8WQ`O'#IjO$8rQaO'#FlO$8rQaO'#FmO$8rQaO'#FnO$8rQaO'#FoO$8rQaO'#FoO+/mQaO'#FoO$8rQaO'#FrO,9pQaO'#GQO,9zQaO'#GQO$8rQaO'#G`O+/mQaO'#G`O$8rQaO'#GcO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO$8rQaO,5;xO+/mQaO,5;xO,;|Q`O'#FsO!+iQaO'#EbO!+iQaO'#IjO,<UQaO,5:xO,<]QaO,5:xO$8rQaO,5;uO+/mQaO,5;uO$8rQaO,5;wO,>[QdO,5<WO,?}QdO,5<XO,ApQdO,5<YO,CcQdO,5<ZO,EUQdO,5<ZO,FwQ`O,5<ZO,HWQdO,5<^O,IyQdO,5<lO%=XQ`O,5<lO,KlQdO,5<}O$8rQaO1G0YO+/mQaO1G0YO,M_QdO1G1dO- QQ`O1G1dO-!aQdO1G1dO-$SQ`O1G1dO-%cQdO1G1dO-'UQ`O1G1dO-(eQdO1G1dO-*WQ`O1G1dO-+gQdO1G1dO--YQ`O1G1dO-.iQdO1G1dO-0[Q`O1G1dO-1kQdO1G1dO-3^Q`O1G1dO-4mQdO1G1dO-6`Q`O1G1dO-7oQdO1G1dO-9bQ`O1G1dO-:qQdO1G1dO-<dQ`O1G1dO-=sQdO1G1dO-?fQ`O1G1dO-@uQdO1G1dO-BhQ`O1G1dO-CwQdO1G1dO-EjQ`O1G1dO-FyQdO1G1dO-HlQ`O1G1dO-I{QdO1G1dO-KnQ`O1G1dO-L}Q`O,5:|O-NdQ`O,5?UO. yQdO1G0dO.#lQ`O1G0dO$8rQaO1G0dO+/mQaO1G0dO.${QdO1G1aO.&nQ`O1G1aO.'}QdO1G1cO$8rQaO1G2VO$8rQaO7+%tO+/mQaO7+%tO.)pQdO7+%tO.+cQ`O7+%tO.,rQdO7+&OO..eQ`O7+&OO$8rQaO7+'qO./tQdO7+'qO.1gQdO<<I`O.3YQ`O<<I`O.4iQdO<<K]O$8rQaO<<K]O$8rQaOAN@wO.6[QdOAN@wO.7}QdOG26cO$8rQaOG26cO.9pQdOLD+}O.;cQaO,5;OO.;jQaO,5;OO$8rQaO1G0jO+/mQaO1G0jO.=iQ`O'#IjO.>{QdO'#IjO.BbQ`O'#IeO.BoQ`O'#GPO.BwQaO,5:nO.COQ`O,5<kO.CWQdO'#GYO.CiQ`O,5<kO!#[Q`O,5<kO.CqQ`O1G0YO.ETQdO,5:|O.FvQdO,5?UO.HiQ`O1G2VO!#[Q`O1G2VO.HqQdO'#H}O.ISQdO,5?hO2wQ`O1G2VO2wQ`O7+'qO.IbQ`O7+'qO.IjQdO1G2`O.KVQpO7+'qO.KbQpO<<K]O2wQ`O<<K]O.KmQpOAN@wO.KxQdO'#IeO.LcQ`O'#IeO.NVQaO,5:nO.N^QaO,5:nO.NeQ`O,5<kO.NmQ`O7+'qO.NuQ`O1G0YO/!XQ`O1G0YO/#kQ`O1G2VO/#sQ`O7+'qO/#{QpO7+'qO/$WQpOAN@wO/$cQpO<<K]O/$nQpOAN@wO/$yQ`O'#GPO/%RQ`O'#FsO/%ZQ`O,5<kO/%cQdO'#I|O!#[Q`O,5<kO!#[Q`O1G2VO2wQ`O1G2VO2wQ`O7+'qO2wQ`O<<K]O/%qQ`O'#GPO/%yQ`O,5<kO/&RQ`O,5<kO!#[Q`O,5<kO!#[Q`O1G2VO!#[Q`O1G2VO2wQ`O1G2VO2wQ`O<<K]O2wQ`O7+'qO2wQ`O<<K]O/&ZQ`O'#FsO/&cQ`O'#FsO/&kQ`O'#Fs",
  stateData: "/'Q~O!eOS!fOS'SOS!hQQ~O!jTO'TRO~OPgOQ|OS!lOU_OW}OX!XO[mO]!_O^!WO`![Oa!SOb!]Ok!dOm!lOowOp!TOq!UOsuOt!gOu!VOv!POxkOykO|!bO}aO!O^O!P!eO!QxO!R}O!TpO!VlO!WlO!X!YO!Y!QO!ZzO![!cO!]!ZO!^!^O!_!fO!a!`O!b!RO!djO!nWO!pXO!z]O#X`O#dhO#fbO#gcO#sdO$[oO$dnO$eoO$hqO$krO$u!kO%TyO%U!OO%W}O%X}O%`|O'WYO'u{O~O!h!mO~O'TRO!j!iX&|!iX'Q!iX~O!j!pO~O!e!qO!f!qO!h!mO'Q!tO'S!qO~PhO!o!vO~PhO!n!tX#T!tX#s#vX'P!tX!y!tX#P!tX!p!tX~OT!tXz!tX!S!tX!c!tX!r!tX!w!tX!z!tX#X!tX#a!tX#b!tX#y!tX$R!tX$S!tX$T!tX$U!tX$V!tX$X!tX$Y!tX$Z!tX$[!tX$]!tX$^!tX$_!tX%T!tX#O!tX#Y!tX!o!tXV!tX#|!tX$O!tXw!tX{!tX~P&sOT'eXz'eX!S'eX!c'eX!w'eX!z'eX#T'eX#X'eX#a'eX#b'eX#y'eX$R'eX$S'eX$T'eX$U'eX$V'eX$X'eX$Y'eX$Z'eX$['eX$]'eX$^'eX$_'eX%T'eX~O!r!xO!n'eX'P'eX~P)dOT#SOz#QO!S#TO!c#UO!n#bO!w!yO!z!|O#T#PO#X!zO#a!{O#b!{O#y#OO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cO'P#bO~OPgOQ|OU_OW}O[mOowOs#fOxkOykO}aO!O^O!QxO!R}O!TpO!VlO!WlO!ZzO!djO!z]O#X`O#dhO#fbO#gcO#sdO$[oO$dnO$eoO$hqO%TyO%U!OO%W}O%X}O%`|O'WYO'u{O~O!z]O~O!z#iO~OP7wOQ|OU_OW}O[7zOo>uOs#fOx7xOy7xO}aO!O^O!Q8OO!R}O!T7}O!V7yO!W7yO!Z8QO!d:QO!z]O#T#mO#V#lO#X`O#dhO#fbO#gcO#sdO$[7|O$d7{O$e7|O$hqO%T8PO%U!OO%W}O%X}O%`|O'WYO'u{O#Y']P~O#O#qO~P/lO!z#rO~O#d#tO#fbO#gcO~O'a#vO~O#s#zO~OU$OO!R$OO!w#}O#s3hO'W#{O~OT'XXz'XX!S'XX!c'XX!n'XX!w'XX!z'XX#T'XX#X'XX#a'XX#b'XX#y'XX$R'XX$S'XX$T'XX$U'XX$V'XX$X'XX$Y'XX$Z'XX$['XX$]'XX$^'XX$_'XX%T'XX'P'XX!y'XX!o'XX~O#|$QO$O$RO~P3YOP7wOQ|OU_OW}O[7zOo>uOs#fOx7xOy7xO}aO!O^O!Q8OO!R}O!T7}O!V7yO!W7yO!Z8QO!d:QO!z]O#X`O#dhO#fbO#gcO#sdO$[7|O$d7{O$e7|O$hqO%T8PO%U!OO%W}O%X}O%`|O'WYO'u{OT$PXz$PX!S$PX!c$PX!n$PX!w$PX#a$PX#b$PX#y$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX'P$PX!y$PX!o$PX~Or$TO#T8eO#V8dO~P5^O#sdO'WYO~OS$fO]$aOk$dOm$fOs$`O!a$bO$krO$u$eO~O!z$hO#T$jO'W$gO~Oo$mOs$lO#d$nO~O!z$hO#T$rO~O!U$uO$u$tO~P-ROR${O!p$zO#d$yO#g$zO&}${O~O't$}O~P;PO!z%SO~O!z%UO~O!n#bO'P#bO~P-RO!pXO~O!z%`O~OP7wOQ|OU_OW}O[7zOo>uOs#fOx7xOy7xO}aO!O^O!Q8OO!R}O!T7}O!V7yO!W7yO!Z8QO!d:QO!z]O#X`O#dhO#fbO#gcO#sdO$[7|O$d7{O$e7|O$hqO%T8PO%U!OO%W}O%X}O%`|O'WYO'u{O~O!z%dO~O]$aO~O!pXO#sdO'WYO~O]%rOs%rO#s%nO'WYO~O!j%wO'Q%wO'TRO~O'Q%zO~PhO!o%{O~PhO!r%}O~P<XO#Y&PO~P<XO!p&SO#d&RO'a&QO~OPgOQ|OU_OW}O[:WOo?jOs#fOx:UOy:UO}aO!O^O!Q:[O!R}O!T:ZO!V:VO!W:VO!Z:^O!d:TO!z]O#V&WO#X`O#dhO#fbO#gcO#sdO$[:YO$d:XO$e:YO$hqO%T:]O%U!OO%W}O%X}O%`|O'WYO'u{O~O!y'bP~P@aO!p&[O#d&]O'W$gO~OT#SOz#QO!S#TO!c#UO!w!yO!z!|O#T#PO#X!zO#a!{O#b!{O#y#OO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cO~O!y&oO~PCVO!z$hO#T&pO~Oo$mOs$lO~O!p&qO~O#O&tO#T=PO#V=OO!y']P~P<XOT8TOz8RO!S8UO!c8VO!w:_O!z!|O#T#PO#X!zO#a!{O#b!{O#y#OO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O'^X#Y'^X~O#P&uO~PEqO#O&xO#Y']X~O#Y&zO~O#O'PO!y'_P~P<XO!o'QO~PCVO!n#uX#T#uX#s#tX'P#uX!y#uX#P#uX!p#uX~OT#uXz#uX!S#uX!c#uX!w#uX!z#uX#X#uX#a#uX#b#uX#y#uX$R#uX$S#uX$T#uX$U#uX$V#uX$X#uX$Y#uX$Z#uX$[#uX$]#uX$^#uX$_#uX%T#uX#O#uX#Y#uX!o#uXV#uX!r#uX#|#uX$O#uXw#uX~PH[O#s'RO~O'a'UO~O#n!tX#V!tX#d!tX~P&sO!y']O#T'ZO#n'XO~O#T'aO~P-RO!n$`a'P$`a!y$`a!o$`a~PCVO!n$aa'P$aa!y$aa!o$aa~PCVO!n$ba'P$ba!y$ba!o$ba~PCVO!n$ca'P$ca!y$ca!o$ca~PCVO!z!|O#X!zO#a!{O#b!{O#y#OO%T#cOT$ca!S$ca!c$ca!n$ca!w$ca#T$ca$R$ca$S$ca$T$ca$U$ca$V$ca$X$ca$Y$ca$Z$ca$[$ca$]$ca$^$ca$_$ca'P$ca!y$ca!o$ca~Oz#QO~PMVO!n$fa'P$fa!y$fa!o$fa~PCVO!z!|O#O$mX#Y$mX~O#O'eO#Y'iX~O#Y'gO~O#T'hO'W$gO~O]'jO~O$u'nO~O!a'tO#T'rO#V'sO#d'qO$krO!y'gP~P2wO!_'zO!pXO!r'yO~O!z$hO'W$gO~O!z$hO~O!z$hO#T(OO~O!z$hO#T(QO~O#|(RO!n$|X#O$|X'P$|X~O#O(SO!n'pX'P'pX~O!n#bO'P#bO~O!r(WO#P(VO~O!n$ta'P$ta!y$ta!o$ta~PCVOl(YOw(ZO!p([O!z!|O~O$u(aO~O!z!|O#X!zO#a!{O#b!{O#y#OO~OT%Saz%Sa!S%Sa!c%Sa!n%Sa!w%Sa#T%Sa$R%Sa$S%Sa$T%Sa$U%Sa$V%Sa$X%Sa$Y%Sa$Z%Sa$[%Sa$]%Sa$^%Sa$_%Sa%T%Sa'P%Sa!y%Sa#O%Sa#P%Sa#Y%Sa!o%Sa!r%SaV%Sa#|%Sa$O%Sa!p%Sa~P!%aO!n%Va'P%Va!y%Va!o%Va~PCVO#X(dO#a(bO#b(bO'O(cOR&sX!p&sX#d&sX#g&sX&}&sX't&sX~O't(gO~P;PO!r(hO~PhO!p(kO!r(lO~O!r(hO'P(oO~PhO!b(sO~O!n(tO~P<XOZ)POn)QO~OT8TOz8RO!S8UO!c8VO!w:_O#O)TO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n'xX'P'xX~P!%aOPgOQ|OU_OW}O[:WOo?jOs#fOx:UOy:UO}aO!O^O!Q:[O!R}O!T:ZO!V:VO!W:VO!Z:^O!d:TO!z]O#X`O#dhO#fbO#gcO#sdO$[:YO$d:XO$e:YO$hqO%T:]O%U!OO%W}O%X}O%`|O'WYO'u{O~O#|)XO~O#O)YO!n'oX'P'oX~Ol(YO!p([O~Ow(ZO!p)`O!r)cO~O!n#bO!pXO'P#bO~O#s)fO~OV)iO#O)gO!n'yX'P'yX~O#s)kO'WYO~OT8TOz8RO!S8UO!c8VO!w:_O#O)nO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n'ZX'P'ZX#P'ZX~P!%aOl(YOw(ZO!p([O~O!j)tO'Q)tO~OT8TOz8RO!S8UO!c8VO!r)uO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO#Y)wO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y'cX#O'cX~P!%aO!r)yO!y'eX#O'eX~P)dO!y#kX#O#kX~P!+iO#O){O!y'bX~O!y)}O~O%T#cOT$Qiz$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi$_$Qi'P$Qi!y$Qi#O$Qi#P$Qi#Y$Qi!o$Qi!r$QiV$Qi#|$Qi$O$Qi!p$Qi~P!%aOz#QO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi'P$Qi!y$Qi!o$Qi~P!%aOT#SOz#QO!c#UO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cO!S$Qi!n$Qi'P$Qi!y$Qi!o$Qi~P!%aOT#SOz#QO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cO!S$Qi!c$Qi!n$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO#T#PO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi$R$Qi$S$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO#T#PO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi$R$Qi$S$Qi$T$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO#T#PO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO#T#PO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$[#_O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$Z#^O$[#_O$^#aO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi'P$Qi!y$Qi!o$Qi~P!%aOz#QO$_#aO%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi'P$Qi!y$Qi!o$Qi~P!%aO_*PO~P<XO!y*SO~O#T*VO~P<XOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O#Ua#Y#Ua#P#Ua!n#Ua'P#Ua!r#Ua!y#Ua!o#UaV#Ua!p#Ua~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O'^a#Y'^a#P'^a!n'^a'P'^a!r'^a!y'^a!o'^aV'^a!p'^a~P!%aO#T#mO#V#lO#O&aX#Y&aX~P<XO#O&xO#Y']a~O#Y*YO~OT8TOz8RO!S8UO!c8VO!w:_O#O*[O#P*ZO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!y'_X~P!%aO#O*[O!y'_X~O!y*^O~O!n#wX#T#wX#s#tX'P#wX!y#wX#P#wX!p#wX~OT#wXz#wX!S#wX!c#wX!w#wX!z#wX#X#wX#a#wX#b#wX#y#wX$R#wX$S#wX$T#wX$U#wX$V#wX$X#wX$Y#wX$Z#wX$[#wX$]#wX$^#wX$_#wX%T#wX#O#wX#Y#wX!o#wXV#wX!r#wX#|#wX$O#wXw#wX~P#)XO#s*aO~O#n'XO!y#ma#T#ma#V#ma#d#ma!p#ma#P#ma!n#ma'P#ma~O#T'ZO!y#oa#n#oa#V#oa#d#oa!p#oa#P#oa!n#oa'P#oa~OPgOQ|OU_OW}O[5jOo7dOs#fOx5fOy5fO}aO!O^O!Q3xO!R}O!T5pO!V5hO!W5hO!Z3zO!d5dO!z]O#X`O#dhO#fbO#gcO#sdO$[5nO$d5lO$e5nO$hqO%T3yO%U!OO%W}O%X}O%`|O'WYO'u{O~O#n#uX#V#uX#d#uX~PH[Oz#QO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT#Qi!S#Qi!c#Qi!n#Qi'P#Qi!y#Qi!o#Qi~P!%aOz#QO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT#}i!S#}i!c#}i!n#}i'P#}i!y#}i!o#}i~P!%aO!n$Pi'P$Pi!y$Pi!o$Pi~PCVO#sdO'WYO#O&iX#Y&iX~O#O'eO#Y'ia~Ow(ZO!p)`O!r*rO~O#T*wO#V*yO#d*xO#n'XO~O#T*{O#V*yO#d*xO$krO~P2wO#|*|O!y$jX#O$jX~O#V*yO#d*xO~O#d*}O~O#d+PO~P2wO#O+QO!y'gX~O!y+SO~O!z+UO~O!_+YO!pXO!r+XO~O!r+[O!p'qi!n'qi'P'qi~O!r+_O#P+^O~O#d$nO!n&qX#O&qX'P&qX~O#O(SO!n'pa'P'pa~OT$tiz$ti!S$ti!c$ti!n$ti!w$ti!z$ti#T$ti#X$ti#a$ti#b$ti#y$ti#|#ha$O#ha$R$ti$S$ti$T$ti$U$ti$V$ti$X$ti$Y$ti$Z$ti$[$ti$]$ti$^$ti$_$ti%T$ti'P$ti!y$ti#O$ti#P$ti#Y$ti!o$ti!r$tiV$ti!p$ti~OS+kO]+nOm+kOs$`O!U+kO!_+qO!`+kO!a+kO!o+uO#d>xO$hqO$krO~P2wO#X+|O#a+{O#b+{O~O#d,OO%W,OO%^+}O'W$gO~O!o,PO~PCVOc%bXd%bXh%bXj%bXf%bXg%bXe%bX~PhOc,TOd,ROP%aiQ%aiS%aiU%aiW%aiX%ai[%ai]%ai^%ai`%aia%aib%aik%aim%aio%aip%aiq%ais%ait%aiu%aiv%aix%aiy%ai|%ai}%ai!O%ai!P%ai!Q%ai!R%ai!T%ai!V%ai!W%ai!X%ai!Y%ai!Z%ai![%ai!]%ai!^%ai!_%ai!a%ai!b%ai!d%ai!n%ai!p%ai!z%ai#X%ai#d%ai#f%ai#g%ai#s%ai$[%ai$d%ai$e%ai$h%ai$k%ai$u%ai%T%ai%U%ai%W%ai%X%ai%`%ai&|%ai'W%ai'u%ai'Q%ai!o%aih%aij%aif%aig%aiY%ai_%aii%aie%ai~Oc,XOd,UOh,WO~OY,YO_,ZO!o,^O~OY,YO_,ZOi%gX~Oi,`O~Oj,aO~O!n,cO~P<XO!n,eO~Of,fO~OT8TOV,gOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOg,hO~O!z,iO~OZ)POn)QOP%uiQ%uiS%uiU%uiW%uiX%ui[%ui]%ui^%ui`%uia%uib%uik%uim%uio%uip%uiq%uis%uit%uiu%uiv%uix%uiy%ui|%ui}%ui!O%ui!P%ui!Q%ui!R%ui!T%ui!V%ui!W%ui!X%ui!Y%ui!Z%ui![%ui!]%ui!^%ui!_%ui!a%ui!b%ui!d%ui!n%ui!p%ui!z%ui#X%ui#d%ui#f%ui#g%ui#s%ui$[%ui$d%ui$e%ui$h%ui$k%ui$u%ui%T%ui%U%ui%W%ui%X%ui%`%ui&|%ui'W%ui'u%ui'Q%ui!o%uic%uid%uih%uij%uif%uig%uiY%ui_%uii%uie%ui~O#|,mO~O#O)TO!n%ma'P%ma~O!y,pO~O'W$gO!n&pX#O&pX'P&pX~O#O)YO!n'oa'P'oa~OS+kOY,vO]+nOm+kOs$`O!U+kO!_+qO!`+kO!a+kO!o,yO#d>xO$hqO$krO~P2wO!p)`O~OU$OO!R$OO!w3nO#s3iO'W,zO~O#s,|O~O!p-OO'a'UO~O#sdO'WYO!n&zX#O&zX'P&zX~O#O)gO!n'ya'P'ya~O#s-UO~O!n&_X#O&_X'P&_X#P&_X~P<XO#O)nO!n'Za'P'Za#P'Za~Oz#QO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT!vq!S!vq!c!vq!n!vq!w!vq'P!vq!y!vq!o!vq~P!%aO!o-ZO~PCVOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#ka#O#ka~P!%aO!y&cX#O&cX~P@aO#O){O!y'ba~O!o-_O~PCVO#P-`O~O#O-aO!o'YX~O!o-cO~O!y-dO~OT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O#Wi#Y#Wi~P!%aO!y&bX#O&bX~P<XO#O*[O!y'_a~O!y-jO~O#n'XO!y&ea#T&ea#V&ea#d&ea!p&ea#P&ea!n&ea'P&ea~OT#lqz#lq!S#lq!c#lq!n#lq!w#lq#T#lq#|#lq$O#lq$R#lq$S#lq$T#lq$U#lq$V#lq$X#lq$Y#lq$Z#lq$[#lq$]#lq$^#lq$_#lq%T#lq'P#lq!y#lq#O#lq#P#lq#Y#lq!o#lq!r#lqV#lq!p#lq~P!%aO#n#wX#V#wX#d#wX~P#)XOz#QO!w!yO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT#Qq!S#Qq!c#Qq!n#Qq'P#Qq!y#Qq!o#Qq~P!%aO#V-sO#d-rO~P2wO#|-tO!y$ja#O$ja~O#d-uO~O#T-vO#V-sO#d-rO#n'XO~O#V-sO#d-rO~O#T'ZO#d-xO#n'XO~O!p-yO#|-zO!y$oa#O$oa~O!a'tO#T'rO#V'sO#d'qO$krO!y&kX#O&kX~P2wO#O+QO!y'ga~O!pXO#T'ZO#n'XO~O#T.QO#d.PO!y'kP~O!pXO!r.SO~O!r.VO!p'qq!n'qq'P'qq~O!_.XO!pXO!r.SO~O!r.]O#P.[O~OT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n$|i#O$|i'P$|i~P!%aO!n$sq'P$sq!y$sq!o$sq~PCVO#P.[O#T'ZO#n'XO~O#O.^Ow'lX!p'lX!n'lX'P'lX~O#T'ZO#d>xO#n'XO~OS+kO].cOm+kOs$`O!U+kO!`+kO!a+kO#d>xO$hqO$krO~P2wOS+kO].cOm+kOs$`O!U+kO!`+kO!a+kO#d>xO$hqO~P2wO!n#bO!p-yO'P#bO~OS+kO]+nOm+kOs$`O!U+kO!_+qO!`+kO!a+kO!o.mO#d>xO$hqO$krO~P2wO#d.rO%W.rO%^+}O'W$gO~O%W.sO~O#Y.tO~Oc%bad%bah%baj%baf%bag%bae%ba~PhOc.wOd,ROP%aqQ%aqS%aqU%aqW%aqX%aq[%aq]%aq^%aq`%aqa%aqb%aqk%aqm%aqo%aqp%aqq%aqs%aqt%aqu%aqv%aqx%aqy%aq|%aq}%aq!O%aq!P%aq!Q%aq!R%aq!T%aq!V%aq!W%aq!X%aq!Y%aq!Z%aq![%aq!]%aq!^%aq!_%aq!a%aq!b%aq!d%aq!n%aq!p%aq!z%aq#X%aq#d%aq#f%aq#g%aq#s%aq$[%aq$d%aq$e%aq$h%aq$k%aq$u%aq%T%aq%U%aq%W%aq%X%aq%`%aq&|%aq'W%aq'u%aq'Q%aq!o%aqh%aqj%aqf%aqg%aqY%aq_%aqi%aqe%aq~Oc.|Od,UOh.{O~O!r(hO~OP7wOQ|OU_OW}O[<ROo?sOs#fOx<POy<PO}aO!O^O!Q<WO!R}O!T<VO!V<QO!W<QO!Z<[O!d:RO!z]O#X`O#dhO#fbO#gcO#sdO$[<TO$d<SO$e<TO$hqO%T<YO%U!OO%W}O%X}O%`|O'WYO'u{O~O!n/PO!r/PO~OY,YO_,ZO!o/RO~OY,YO_,ZOi%ga~O!y/VO~P!+iO!n/XO~O!n/XO~P<XOQ|OW}O!R}O%W}O%X}O%`|O'u{O~OT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n&wa#O&wa'P&wa~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n$zi#O$zi'P$zi~P!%aOS+kOY/cO].cOm+kOs$`O!U+kO!`+kO!a+kO#d>xO$hqO$krO~P2wOS+kOY,vO]+nOm+kOs$`O!U+kO!_+qO!`+kO!a+kO!o/fO#d>xO$hqO$krO~P2wOw!tX!p!tX#T!tX#n!tX#s#vX#|!tX'W!tX~Ow(ZO!p)`O#T3tO#n3sO~O!p-OO'a&fa~O]/nOs/nO#sdO'WYO~OV/rO!n&za#O&za'P&za~O#O)gO!n'yi'P'yi~O#s/tO~OT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n&_a#O&_a'P&_a#P&_a~P!%aOz#QO#T#PO$R#RO$S#VO$T#WO$U#XO$V#YO$X#[O$Y#]O$Z#^O$[#_O$]#`O$^#aO$_#aO%T#cOT!vy!S!vy!c!vy!n!vy!w!vy'P!vy!y!vy!o!vy~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#ji#O#ji~P!%aO_*PO!o&`X#O&`X~P<XO#O-aO!o'Ya~OT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O#Wq#Y#Wq~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#]i#O#]i~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#P/yO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!y&ba#O&ba~P!%aO#|0OO!y$ji#O$ji~O#d0PO~O#V0SO#d0RO~P2wOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$ji#O$ji~P!%aO!p-yO#|0TO!y$oi#O$oi~O!o0YO'W$gO~O#O0[O!y'kX~O#d0^O~O!y0_O~O!pXO!r0bO~O#T'ZO#n'XO!p'qy!n'qy'P'qy~O!n$sy'P$sy!y$sy!o$sy~PCVO#P0eO#T'ZO#n'XO~O#sdO'WYOw&mX!p&mX#O&mX!n&mX'P&mX~O#O.^Ow'la!p'la!n'la'P'la~OS+kO]0mOm+kOs$`O!U+kO!`+kO!a+kO#d>xO$hqO~P2wO#T3tO#n3sO'W$gO~O#|)XO#T'eX#n'eX'W'eX~O!n#bO!p0sO'P#bO~O#Y0wO~Oh0|O~OT<aOz<]O!S<cO!c<eO!n0}O!r0}O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO~P!%aOY%fa_%fa!o%fai%fa~PhO!y1PO~O!y1PO~P!+iO!n1RO~OT8TOz8RO!S8UO!c8VO!w:_O!y1TO#P1SO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aO!y1TO~O!y1UO#T'ZO#d1VO#n'XO~O!y1WO~O!n#bO#|1ZO'P#bO~O#n3sOw#ma!p#ma#T#ma'W#ma~O#T3tOw#oa!p#oa#n#oa'W#oa~Ow#uX!p#uX#T#uX#n#uX#s#tX'W#uX~O!p-OO'a*`O~OV1`O!o&VX#O&VX~O#O1bO!o'zX~O!o1dO~O#O)gO!n'yq'P'yq~OT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!o!}i#O!}i~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$jq#O$jq~P!%aO#|1kO!y$jq#O$jq~O#d1lO~O!n#bO!pXO!z$hO#P1oO'P#bO~O!o1rO'W$gO~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$oq#O$oq~P!%aO#T1tO#d1sO!y&lX#O&lX~O#O0[O!y'ka~O#T'ZO#n'XO!p'q!R!n'q!R'P'q!R~O!pXO!r1yO~O!n$s!R'P$s!R!y$s!R!o$s!R~PCVO#P1{O#T'ZO#n'XO~OP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!V:rO!W:rO!Z:rO!d:SO!o2XO!z]O#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO%T<ZO%U!OO'WYO~P$<UOh2ZO~OY%ei_%ei!o%eii%ei~PhOY%fi_%fi!o%fii%fi~PhO!y2^O~O!y2^O~P!+iO!y2aO~O!n#bO#|2eO'P#bO~O%W2fO%`2fO~O#n3sOw&ea!p&ea#T&ea'W&ea~Ow#wX!p#wX#T#wX#n#wX#s#tX'W#wX~OV2iO!o&Va#O&Va~O]2kOs2kO#sdO'WYO!o&{X#O&{X~O#O1bO!o'za~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#^i#O#^i~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$jy#O$jy~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$oy#O$oy~P!%aO!pXO#P2rO~O#d2sO~O#O0[O!y'ki~O!n$s!Z'P$s!Z!y$s!Z!o$s!Z~PCVOT<bOz<^O!S<dO!c<fO!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cO~P!%aOV2{O{2zO~P)dOV2{O{2zOT'[Xz'[X!S'[X!c'[X!w'[X!z'[X#T'[X#X'[X#a'[X#b'[X#y'[X#|'[X$O'[X$R'[X$S'[X$T'[X$U'[X$V'[X$X'[X$Y'[X$Z'[X$['[X$]'[X$^'[X$_'[X%T'[X~OP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!V:rO!W:rO!Z:rO!d:SO!o3OO!z]O#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO%T<ZO%U!OO'WYO~P$<UOY%eq_%eq!o%eqi%eq~PhO!y3QO~O!y%pi~PCVOe3RO~O%W3SO%`3SO~OV3VO!o&WX#O&WX~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$j!R#O$j!R~P!%aO!n$s!c'P$s!c!y$s!c!o$s!c~PCVO!a3`O'W$gO~OV3dO!o&Wa#O&Wa~O'W$gO!n%Ri'P%Ri~O'a'_O~O'a/jO~O'a*iO~O'a1]O~OT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$ta#|$ta$O$ta'P$ta!y$ta!o$ta#O$ta~P!%aO#T3uO~P-RO#s3lO~O#s3mO~O!U$uO$u$tO~P#-WOT8TOz8RO!S8UO!c8VO!w:_O#P3pO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n'^X'P'^X!y'^X!o'^X~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#P5aO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O'^X#Y'^X#|'^X$O'^X!n'^X'P'^X!r'^X!y'^X!o'^XV'^X!p'^X~P!%aO#T5OO~P#-WOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$`a#|$`a$O$`a'P$`a!y$`a!o$`a#O$`a~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$aa#|$aa$O$aa'P$aa!y$aa!o$aa#O$aa~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$ba#|$ba$O$ba'P$ba!y$ba!o$ba#O$ba~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$ca#|$ca$O$ca'P$ca!y$ca!o$ca#O$ca~P!%aOz3{O#|$ca$O$ca#O$ca~PMVOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$fa#|$fa$O$fa'P$fa!y$fa!o$fa#O$fa~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n%Va#|%Va$O%Va'P%Va!y%Va!o%Va#O%Va~P!%aOz3{O#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#|$Qi$O$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi#|$Qi$O$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOT3}Oz3{O!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!S$Qi!n$Qi#|$Qi$O$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOT3}Oz3{O!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!S$Qi!c$Qi!n$Qi#|$Qi$O$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O#T#PO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#|$Qi$O$Qi$R$Qi$S$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O#T#PO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O#T#PO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O#T#PO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$[4YO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$Z4XO$[4YO$^4[O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOz3{O$_4[O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!w$Qi#T$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi'P$Qi!y$Qi!o$Qi#O$Qi~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n#Ua#|#Ua$O#Ua'P#Ua!y#Ua!o#Ua#O#Ua~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n'^a#|'^a$O'^a'P'^a!y'^a!o'^a#O'^a~P!%aOz3{O!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT#Qi!S#Qi!c#Qi!n#Qi#|#Qi$O#Qi'P#Qi!y#Qi!o#Qi#O#Qi~P!%aOz3{O!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT#}i!S#}i!c#}i!n#}i#|#}i$O#}i'P#}i!y#}i!o#}i#O#}i~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$Pi#|$Pi$O$Pi'P$Pi!y$Pi!o$Pi#O$Pi~P!%aOz3{O#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT!vq!S!vq!c!vq!n!vq!w!vq#|!vq$O!vq'P!vq!y!vq!o!vq#O!vq~P!%aOz3{O!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT#Qq!S#Qq!c#Qq!n#Qq#|#Qq$O#Qq'P#Qq!y#Qq!o#Qq#O#Qq~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$sq#|$sq$O$sq'P$sq!y$sq!o$sq#O$sq~P!%aOz3{O#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cOT!vy!S!vy!c!vy!n!vy!w!vy#|!vy$O!vy'P!vy!y!vy!o!vy#O!vy~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$sy#|$sy$O$sy'P$sy!y$sy!o$sy#O$sy~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$s!R#|$s!R$O$s!R'P$s!R!y$s!R!o$s!R#O$s!R~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$s!Z#|$s!Z$O$s!Z'P$s!Z!y$s!Z!o$s!Z#O$s!Z~P!%aOT3}Oz3{O!S4OO!c4PO!w5rO#T#PO$R3|O$S4QO$T4RO$U4SO$V4TO$X4VO$Y4WO$Z4XO$[4YO$]4ZO$^4[O$_4[O%T#cO!n$s!c#|$s!c$O$s!c'P$s!c!y$s!c!o$s!c#O$s!c~P!%aOP7wOU_O[5kOo9xOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!V5iO!W5iO!Z5}O!d5eO!z]O#T5bO#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO%T5|O%U!OO'WYO~P$<UOP7wOU_O[5kOo9xOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!V5iO!W5iO!Z5}O!d5eO!z]O#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO%T5|O%U!OO'WYO~P$<UO#|4aO$O4bO#O'XX~P3YOP7wOU_O[5kOo9xOr4cOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!V5iO!W5iO!Z5}O!d5eO!z]O#T4`O#V4_O#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO%T5|O%U!OO'WYOT$PXz$PX!S$PX!c$PX!n$PX!w$PX#a$PX#b$PX#y$PX#|$PX$O$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX'P$PX!y$PX!o$PX#O$PX~P$<UOP7wOU_O[5kOo9xOr6dOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!V5iO!W5iO!Z5}O!d5eO!z]O#T6aO#V6`O#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO%T5|O%U!OO'WYOT$PXz$PX!S$PX!c$PX!w$PX#O$PX#P$PX#Y$PX#a$PX#b$PX#y$PX#|$PX$O$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX!n$PX'P$PX!r$PX!y$PX!o$PXV$PX!p$PX~P$<UO!r4kO~P<XO!r7iO#P5RO~OT8TOz8RO!S8UO!c8VO!r5SO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aO!r7jO#P5VO~O!r7kO#P5ZO~O#P5ZO#T'ZO#n'XO~O#P5[O#T'ZO#n'XO~O#P5_O#T'ZO#n'XO~OP7wOU_O[5kOo9xOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!U$uO!V5iO!W5iO!Z5}O!d5eO!z]O#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO$u$tO%T5|O%U!OO'WYO~P$<UOP7wOU_O[5kOo9xOs#fOx5gOy5gO}aO!O^O!Q5{O!T5qO!V5iO!W5iO!Z5}O!d5eO!z]O#T7PO#X`O#dhO#fbO#gcO#sdO$[5oO$d5mO$e5oO$hqO%T5|O%U!OO'WYO~P$<UOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$`a#P$`a#Y$`a#|$`a$O$`a!n$`a'P$`a!r$`a!y$`a!o$`aV$`a!p$`a~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$aa#P$aa#Y$aa#|$aa$O$aa!n$aa'P$aa!r$aa!y$aa!o$aaV$aa!p$aa~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$ba#P$ba#Y$ba#|$ba$O$ba!n$ba'P$ba!r$ba!y$ba!o$baV$ba!p$ba~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$ca#P$ca#Y$ca#|$ca$O$ca!n$ca'P$ca!r$ca!y$ca!o$caV$ca!p$ca~P!%aOz6OO#O$ca#P$ca#Y$ca#|$ca$O$ca!r$caV$ca!p$ca~PMVOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$fa#P$fa#Y$fa#|$fa$O$fa!n$fa'P$fa!r$fa!y$fa!o$faV$fa!p$fa~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O%Va#P%Va#Y%Va#|%Va$O%Va!n%Va'P%Va!r%Va!y%Va!o%VaV%Va!p%Va~P!%aOz6OO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOT6QOz6OO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO!S$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOT6QOz6OO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO!S$Qi!c$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO#T#PO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO#T#PO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO#T#PO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO#T#PO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$[6]O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$Z6[O$[6]O$^6_O$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz6OO$_6_O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi#|$Qi$O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O#Ua#P#Ua#Y#Ua#|#Ua$O#Ua!n#Ua'P#Ua!r#Ua!y#Ua!o#UaV#Ua!p#Ua~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O'^a#P'^a#Y'^a#|'^a$O'^a!n'^a'P'^a!r'^a!y'^a!o'^aV'^a!p'^a~P!%aOz6OO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT#Qi!S#Qi!c#Qi#O#Qi#P#Qi#Y#Qi#|#Qi$O#Qi!n#Qi'P#Qi!r#Qi!y#Qi!o#QiV#Qi!p#Qi~P!%aOz6OO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT#}i!S#}i!c#}i#O#}i#P#}i#Y#}i#|#}i$O#}i!n#}i'P#}i!r#}i!y#}i!o#}iV#}i!p#}i~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$Pi#P$Pi#Y$Pi#|$Pi$O$Pi!n$Pi'P$Pi!r$Pi!y$Pi!o$PiV$Pi!p$Pi~P!%aOz6OO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT!vq!S!vq!c!vq!w!vq#O!vq#P!vq#Y!vq#|!vq$O!vq!n!vq'P!vq!r!vq!y!vq!o!vqV!vq!p!vq~P!%aOz6OO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT#Qq!S#Qq!c#Qq#O#Qq#P#Qq#Y#Qq#|#Qq$O#Qq!n#Qq'P#Qq!r#Qq!y#Qq!o#QqV#Qq!p#Qq~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$sq#P$sq#Y$sq#|$sq$O$sq!n$sq'P$sq!r$sq!y$sq!o$sqV$sq!p$sq~P!%aOz6OO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cOT!vy!S!vy!c!vy!w!vy#O!vy#P!vy#Y!vy#|!vy$O!vy!n!vy'P!vy!r!vy!y!vy!o!vyV!vy!p!vy~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$sy#P$sy#Y$sy#|$sy$O$sy!n$sy'P$sy!r$sy!y$sy!o$syV$sy!p$sy~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$s!R#P$s!R#Y$s!R#|$s!R$O$s!R!n$s!R'P$s!R!r$s!R!y$s!R!o$s!RV$s!R!p$s!R~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$s!Z#P$s!Z#Y$s!Z#|$s!Z$O$s!Z!n$s!Z'P$s!Z!r$s!Z!y$s!Z!o$s!ZV$s!Z!p$s!Z~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$s!c#P$s!c#Y$s!c#|$s!c$O$s!c!n$s!c'P$s!c!r$s!c!y$s!c!o$s!cV$s!c!p$s!c~P!%aO#T7cO~P#-WO!z$hO#T7gO~O!y5uO#T'ZO#n'XO~O!z$hO#T7hO~OT6QOz6OO!S6RO!c6SO!w7oO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO#O$ta#P$ta#Y$ta#|$ta$O$ta!n$ta'P$ta!r$ta!y$ta!o$taV$ta!p$ta~P!%aOT6QOz6OO!S6RO!c6SO!w7oO#P7bO#T#PO$R6PO$S6TO$T6UO$U6VO$V6WO$X6YO$Y6ZO$Z6[O$[6]O$]6^O$^6_O$_6_O%T#cO!n'^X#|'^X$O'^X'P'^X!y'^X!o'^X#O'^X~P!%aO#|6bO$O6cO#O'XX#P'XX#Y'XX!r'XXV'XX!p'XX~P3YO!r6lO~P<XO!r9|O#P7SO~OT8TOz8RO!S8UO!c8VO!r7TO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aO!r9}O#P7WO~O!r:OO#P7[O~O#P7[O#T'ZO#n'XO~O#P7]O#T'ZO#n'XO~O#P7`O#T'ZO#n'XO~O!U$uO$u$tO~P<XOo7fOs$lO~O#T9ZO~P<XOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$`a#P$`a#Y$`a!n$`a'P$`a!r$`a!y$`a!o$`aV$`a!p$`a~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$aa#P$aa#Y$aa!n$aa'P$aa!r$aa!y$aa!o$aaV$aa!p$aa~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$ba#P$ba#Y$ba!n$ba'P$ba!r$ba!y$ba!o$baV$ba!p$ba~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$ca#P$ca#Y$ca!n$ca'P$ca!r$ca!y$ca!o$caV$ca!p$ca~P!%aOz8RO#O$ca#P$ca#Y$ca!r$caV$ca!p$ca~PMVOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$fa#P$fa#Y$fa!n$fa'P$fa!r$fa!y$fa!o$faV$fa!p$fa~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$ta#P$ta#Y$ta!n$ta'P$ta!r$ta!y$ta!o$taV$ta!p$ta~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O%Va#P%Va#Y%Va!n%Va'P%Va!r%Va!y%Va!o%VaV%Va!p%Va~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#O9_O#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y'xX~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#O9aO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y'ZX~P!%aOz8RO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi#O$Qi#P$Qi#Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOT8TOz8RO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!S$Qi#O$Qi#P$Qi#Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOT8TOz8RO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!S$Qi!c$Qi#O$Qi#P$Qi#Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO#T#PO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi$R$Qi$S$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO#T#PO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi$R$Qi$S$Qi$T$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO#T#PO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO#T#PO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$[8`O$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$Z8_O$[8`O$^8bO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aOz8RO$_8bO%T#cOT$Qi!S$Qi!c$Qi!w$Qi#O$Qi#P$Qi#T$Qi#Y$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi!n$Qi'P$Qi!r$Qi!y$Qi!o$QiV$Qi!p$Qi~P!%aO#T9fO~P!+iO!n#Ua'P#Ua!y#Ua!o#Ua~PCVO!n'^a'P'^a!y'^a!o'^a~PCVO#T=PO#V=OO!y&aX#O&aX~P<XO#O9WO!y']a~Oz8RO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT#Qi!S#Qi!c#Qi#O#Qi#P#Qi#Y#Qi!n#Qi'P#Qi!r#Qi!y#Qi!o#QiV#Qi!p#Qi~P!%aOz8RO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT#}i!S#}i!c#}i#O#}i#P#}i#Y#}i!n#}i'P#}i!r#}i!y#}i!o#}iV#}i!p#}i~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$Pi#P$Pi#Y$Pi!n$Pi'P$Pi!r$Pi!y$Pi!o$PiV$Pi!p$Pi~P!%aO#O9_O!y%ma~O!y&_X#O&_X~P!+iO#O9aO!y'Za~Oz8RO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT!vq!S!vq!c!vq!w!vq#O!vq#P!vq#Y!vq!n!vq'P!vq!r!vq!y!vq!o!vqV!vq!p!vq~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#Wi#O#Wi~P!%aOz8RO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT#Qq!S#Qq!c#Qq#O#Qq#P#Qq#Y#Qq!n#Qq'P#Qq!r#Qq!y#Qq!o#QqV#Qq!p#Qq~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$sq#P$sq#Y$sq!n$sq'P$sq!r$sq!y$sq!o$sqV$sq!p$sq~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y&wa#O&wa~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y&_a#O&_a~P!%aOz8RO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cOT!vy!S!vy!c!vy!w!vy#O!vy#P!vy#Y!vy!n!vy'P!vy!r!vy!y!vy!o!vyV!vy!p!vy~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#Wq#O#Wq~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$sy#P$sy#Y$sy!n$sy'P$sy!r$sy!y$sy!o$syV$sy!p$sy~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$s!R#P$s!R#Y$s!R!n$s!R'P$s!R!r$s!R!y$s!R!o$s!RV$s!R!p$s!R~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$s!Z#P$s!Z#Y$s!Z!n$s!Z'P$s!Z!r$s!Z!y$s!Z!o$s!ZV$s!Z!p$s!Z~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO#O$s!c#P$s!c#Y$s!c!n$s!c'P$s!c!r$s!c!y$s!c!o$s!cV$s!c!p$s!c~P!%aO#T9vO~P<XO#P9uO!n'^X'P'^X!r'^X!y'^X!o'^XV'^X!p'^X~PEqO!z$hO#T9zO~O!z$hO#T9{O~O#|8fO$O8gO#O'XX#P'XX#Y'XX!r'XXV'XX!p'XX~P3YOr8hO#T#mO#V#lO#O$PX#P$PX#Y$PX!r$PXV$PX!p$PX~P5^Or=UO#T:sO#V:qOT$PXz$PX!S$PX!c$PX!n$PX!r$PX!w$PX#a$PX#b$PX#y$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX!o$PX#O$PX!p$PX'P$PX~P<XOr:rO#T:rO#V:rOT$PXz$PX!S$PX!c$PX!w$PX#a$PX#b$PX#y$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX~P<XOr:wO#T=PO#V=OOT$PXz$PX!S$PX!c$PX!w$PX!y$PX#O$PX#a$PX#b$PX#y$PX$R$PX$S$PX$T$PX$U$PX$V$PX$X$PX$Y$PX$Z$PX$]$PX$^$PX$_$PX~P<XO!U$uO$u$tO~P!+iO!r8sO~P<XOT8TOz8RO!S8UO!c8VO!w:_O#P9TO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!y'^X#O'^X~P!%aOP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!V:rO!W:rO!Z:rO!d:SO!z]O#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO%T<ZO%U!OO'WYO~P$<UO#O9WO!y']X~O#T;eO~P!+iOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$`a#O$`a~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$aa#O$aa~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$ba#O$ba~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$ca#O$ca~P!%aOz:`O%T#cOT$ca!S$ca!c$ca!w$ca!y$ca#O$ca#T$ca$R$ca$S$ca$T$ca$U$ca$V$ca$X$ca$Y$ca$Z$ca$[$ca$]$ca$^$ca$_$ca~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$fa#O$fa~P!%aO!r?SO#P9^O~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$ta#O$ta~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y%Va#O%Va~P!%aOT8TOz8RO!S8UO!c8VO!r9cO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOz:`O#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi~P!%aOz:`O!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!y$Qi#O$Qi~P!%aOT:bOz:`O!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!S$Qi!y$Qi#O$Qi~P!%aOT:bOz:`O!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!S$Qi!c$Qi!y$Qi#O$Qi~P!%aOz:`O#T#PO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi$R$Qi$S$Qi~P!%aOz:`O#T#PO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi$R$Qi$S$Qi$T$Qi~P!%aOz:`O#T#PO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi$R$Qi$S$Qi$T$Qi$U$Qi~P!%aOz:`O#T#PO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi~P!%aOz:`O$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi~P!%aOz:`O$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi~P!%aOz:`O$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi~P!%aOz:`O$[:mO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi~P!%aOz:`O$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi~P!%aOz:`O$Z:lO$[:mO$^:oO$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi~P!%aOz:`O$_:oO%T#cOT$Qi!S$Qi!c$Qi!w$Qi!y$Qi#O$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi~P!%aOz:`O!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT#Qi!S#Qi!c#Qi!y#Qi#O#Qi~P!%aOz:`O!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT#}i!S#}i!c#}i!y#}i#O#}i~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$Pi#O$Pi~P!%aO!r?TO#P9hO~Oz:`O#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT!vq!S!vq!c!vq!w!vq!y!vq#O!vq~P!%aOz:`O!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT#Qq!S#Qq!c#Qq!y#Qq#O#Qq~P!%aO!r?YO#P9oO~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$sq#O$sq~P!%aO#P9oO#T'ZO#n'XO~Oz:`O#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cOT!vy!S!vy!c!vy!w!vy!y!vy#O!vy~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$sy#O$sy~P!%aO#P9pO#T'ZO#n'XO~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$s!R#O$s!R~P!%aO#P9sO#T'ZO#n'XO~OT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$s!Z#O$s!Z~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y$s!c#O$s!c~P!%aO#T;}O~P!+iOT8TOz8RO!S8UO!c8VO!w:_O#P;|O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!y'^X#O'^X~P!%aO!U$uO$u$tO~P$8rOP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!U$uO!V:rO!W:rO!Z:rO!d:SO!z]O#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO$u$tO%T<ZO%U!OO'WYO~P$<UOo9yOs$lO~O#T>VO~P$8rOP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!V:rO!W:rO!Z:rO!d:SO!z]O#T>WO#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO%T<ZO%U!OO'WYO~P$<UOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$`a!r$`a!o$`a#O$`a!p$`a'P$`a~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$aa!r$aa!o$aa#O$aa!p$aa'P$aa~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$ba!r$ba!o$ba#O$ba!p$ba'P$ba~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$ca!r$ca!o$ca#O$ca!p$ca'P$ca~P!%aOz<]O%T#cOT$ca!S$ca!c$ca!n$ca!r$ca!w$ca#T$ca$R$ca$S$ca$T$ca$U$ca$V$ca$X$ca$Y$ca$Z$ca$[$ca$]$ca$^$ca$_$ca!o$ca#O$ca!p$ca'P$ca~P!%aOz<^O%T#cOT$ca!S$ca!c$ca!w$ca#T$ca$R$ca$S$ca$T$ca$U$ca$V$ca$X$ca$Y$ca$Z$ca$[$ca$]$ca$^$ca$_$ca~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$fa!r$fa!o$fa#O$fa!p$fa'P$fa~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$ta!r$ta!o$ta#O$ta!p$ta'P$ta~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n%Va!r%Va!o%Va#O%Va!p%Va'P%Va~P!%aOz<]O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi~P!%aOz<]O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi~P!%aOT<aOz<]O!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!S$Qi!n$Qi!r$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOT<bOz<^O!c<fO!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cO!S$Qi~P!%aOT<aOz<]O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!S$Qi!c$Qi!n$Qi!r$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOT<bOz<^O!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cO!S$Qi!c$Qi~P!%aOz<]O#T#PO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi$R$Qi$S$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O#T#PO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi$R$Qi$S$Qi~P!%aOz<]O#T#PO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi$R$Qi$S$Qi$T$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O#T#PO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi$R$Qi$S$Qi$T$Qi~P!%aOz<]O#T#PO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O#T#PO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi~P!%aOz<]O#T#PO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O#T#PO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi~P!%aOz<]O$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi~P!%aOz<]O$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi~P!%aOz<]O$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi~P!%aOz<]O$[<wO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$[<xO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$]$Qi~P!%aOz<]O$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi~P!%aOz<]O$Z<uO$[<wO$^<{O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$Z<vO$[<xO$^<|O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$]$Qi~P!%aOz<]O$_<{O%T#cOT$Qi!S$Qi!c$Qi!n$Qi!r$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi!o$Qi#O$Qi!p$Qi'P$Qi~P!%aOz<^O$_<|O%T#cOT$Qi!S$Qi!c$Qi!w$Qi#T$Qi$R$Qi$S$Qi$T$Qi$U$Qi$V$Qi$X$Qi$Y$Qi$Z$Qi$[$Qi$]$Qi$^$Qi~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y#Ua#O#Ua~P!%aOT:bOz:`O!S:cO!c:dO!w>vO#T#PO$R:aO$S:eO$T:fO$U:gO$V:hO$X:jO$Y:kO$Z:lO$[:mO$]:nO$^:oO$_:oO%T#cO!y'^a#O'^a~P!%aOz<]O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT#Qi!S#Qi!c#Qi!n#Qi!r#Qi!o#Qi#O#Qi!p#Qi'P#Qi~P!%aOz<^O!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT#Qi!S#Qi!c#Qi~P!%aOz<]O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT#}i!S#}i!c#}i!n#}i!r#}i!o#}i#O#}i!p#}i'P#}i~P!%aOz<^O!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT#}i!S#}i!c#}i~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$Pi!r$Pi!o$Pi#O$Pi!p$Pi'P$Pi~P!%aOz<]O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT!vq!S!vq!c!vq!n!vq!r!vq!w!vq!o!vq#O!vq!p!vq'P!vq~P!%aOz<^O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT!vq!S!vq!c!vq!w!vq~P!%aOz<]O!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT#Qq!S#Qq!c#Qq!n#Qq!r#Qq!o#Qq#O#Qq!p#Qq'P#Qq~P!%aOz<^O!w?_O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT#Qq!S#Qq!c#Qq~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$sq!r$sq!o$sq#O$sq!p$sq'P$sq~P!%aOz<]O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cOT!vy!S!vy!c!vy!n!vy!r!vy!w!vy!o!vy#O!vy!p!vy'P!vy~P!%aOz<^O#T#PO$R<`O$S<hO$T<jO$U<lO$V<nO$X<rO$Y<tO$Z<vO$[<xO$]<zO$^<|O$_<|O%T#cOT!vy!S!vy!c!vy!w!vy~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$sy!r$sy!o$sy#O$sy!p$sy'P$sy~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$s!R!r$s!R!o$s!R#O$s!R!p$s!R'P$s!R~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$s!Z!r$s!Z!o$s!Z#O$s!Z!p$s!Z'P$s!Z~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$s!c!r$s!c!o$s!c#O$s!c!p$s!c'P$s!c~P!%aO#T>pO~P$8rOP7wOU_O[:rOo?tOs#fOx:rOy:rO}aO!O^O!Q<XO!T:rO!V:rO!W:rO!Z:rO!d:SO!z]O#T>qO#X`O#dhO#fbO#gcO#sdO$[<UO$d:rO$e<UO$hqO%T<ZO%U!OO'WYO~P$<UOT8TOz8RO!S8UO!c8VO!w:_O#P>oO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOT8TOz8RO!S8UO!c8VO!w:_O#P>nO#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO!n'^X!r'^X!o'^X#O'^X!p'^X'P'^X~P!%aOT'XXz'XX!S'XX!c'XX!w'XX!z'XX#O'XX#T'XX#X'XX#a'XX#b'XX#y'XX$R'XX$S'XX$T'XX$U'XX$V'XX$X'XX$Y'XX$Z'XX$['XX$]'XX$^'XX$_'XX%T'XX~O#|:uO$O:vO!y'XX~P.@qO!z$hO#T>zO~O!r;SO~P<XO!z$hO#T?PO~O#|;iO!n$|X!p$|X#O$|X'P$|X~O!r?pO#P;jO~OT8TOz8RO!S8UO!c8VO!r;kO!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n#Ua!r#Ua!o#Ua#O#Ua!p#Ua'P#Ua~P!%aOT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n'^a!r'^a!o'^a#O'^a!p'^a'P'^a~P!%aO!r?qO#P;nO~O#d>xO!n&qX!p&qX#O&qX'P&qX~O#O?QO!n'pa!p'pa'P'pa~O!r?rO#P;uO~OT<aOz<]O!S<cO!c<eO!w?^O#T#PO$R<_O$S<gO$T<iO$U<kO$V<mO$X<qO$Y<sO$Z<uO$[<wO$]<yO$^<{O$_<{O%T#cO!n$|i!p$|i#O$|i'P$|i~P!%aO#P;uO#T'ZO#n'XO~O#P;vO#T'ZO#n'XO~O#P;zO#T'ZO#n'XO~O#|=QO$O=SO!n'XX!r'XX!o'XX!p'XX'P'XX~P.@qO#|=RO$O=TOT'XXz'XX!S'XX!c'XX!w'XX!z'XX#T'XX#X'XX#a'XX#b'XX#y'XX$R'XX$S'XX$T'XX$U'XX$V'XX$X'XX$Y'XX$Z'XX$['XX$]'XX$^'XX$_'XX%T'XX~O!r=aO~P<XO!r=bO~P<XO!r?yO#P>[O~O!r?zO#P:rO~OT8TOz8RO!S8UO!c8VO!r>]O!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aOT8TOz8RO!S8UO!c8VO!r>^O!w:_O#T#PO$R8SO$S8WO$T8XO$U8YO$V8ZO$X8]O$Y8^O$Z8_O$[8`O$]8aO$^8bO$_8bO%T#cO~P!%aO!r?{O#P>cO~O!r?|O#P>hO~O#P>hO#T'ZO#n'XO~O#P:rO#T'ZO#n'XO~O#P>iO#T'ZO#n'XO~O#P>lO#T'ZO#n'XO~O!z$hO#T?nO~Oo>wOs$lO~O!z$hO#T?oO~O#O?QO!n'pX!p'pX'P'pX~O!z$hO#T?vO~O!z$hO#T?wO~O!z$hO#T?xO~Oo?lOs$lO~Oo?uOs$lO~Oo?tOs$lO~O%X$]%W$k!e$^#d%`#g'u'W#f~",
  goto: "%1O'{PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP'|P(TPP(Z(^PPP(vP(^*o(^6cP6cPP>cFxF{PP6cGR! RP! UP! UPPGR! e! h! lGRGRPP! oP! rPPGR!)u!0q!0qGR!0uP!0u!0u!0u!2PP!;g!<T!<a!FP!F_P!Na!NdP6cP6c6cPPPPP!NgPPPPPPP6c6c6c6cPP6c6cP#&T#'|P#(Q#(t#'|#'|#(z#)^#)b6c6cP#)k#*R#*|#,Q#,W#,Q#,f#,Q#,Q#,z#,}#,}6cPP6cPP#-R#5S#5S#5WP#5^P(^#5b(^#5z#5}#5}#6T(^#6W(^(^#6^#6a(^#6j#6m(^(^(^(^(^#6p(^(^(^(^(^(^(^(^(^#6s#7V(^(^#7Z#7k#7n(^(^P#7q#7x#8O#8k#8u#8{#9V#9^#9d#:h#;j#;z#<d#=`#=f#=l#=r#=|#>S#>Y#>h#>n#>x#?O#?U#?[#?b#?l#?v#?|#@S#@^PPPPPPPP#@d#@hP#A^$(h$(k$(u$1R$1_$1t$1zP$1}$2Q$2W$5[$?Y$Gr$Gu$G{$HO$Kb$Ke$Kn$Kv$LQ$Li$MP$Mz%'}PP%0O%0S%0`%0u%0{Q!nQT!qV!rQUOR%x!mRVO}!hPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]|!hPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]Q%_!ZQ%h!aQ%m!eQ'k$cQ'x$iQ)d%lQ+W'{Q,k)QU.O+T+V+]Q.j+pQ/`,jS0a.T.UQ0q.dQ1n0VS1w0`0dQ2Q0nQ2q1pQ2t1xR3[2u|ZPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]2lf]`cgjklmnoprxyz!W!X!Y!]!e!f!g!y!z#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r#}$Q$R$T$h$z%S%U%d%r%}&S&W&[&q&t&u&x'P'X'Z']'a'e'p't'y(R(V(W(Y(Z([(t)T)X)`)c)g)n)u)y*V*Z*[*r*w*|+Q+X+[+^+_+j+m+q+t,Y,c,e,g,i,u,x-O-`-a-t-v-z.S.V.[.].^.b/X/n/y0O0T0b0e1R1S1b1k1o1y1{2k2r3n3p3s3t3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7i7j7k7o7w7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v9|9}:O:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?S?T?Y?^?_?p?q?r?y?z?{?|S$ku$`Q%W!V^%e!_$a'j)Y.f0o2OQ%i!bQ%j!cQ%k!dQ%v!kS&V!|){Q&]#OQ'l$dQ'm$eS'|$j'hQ)S%`Q*v'nQ+z(bQ,O(dQ-S)iU.g+n.c0mQ.q+{Q.r+|Q/d,vS0V-y0XQ1X/cQ1e/rS2T0s2WQ2h1`Q3U2iQ3^2zQ3_2{Q3c3VQ3f3`R3g3d0{!OPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_0z!OPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_Q#h^Q%O!PQ%P!QQ%Q!RQ,b(sQ.u,RR.y,UR&r#hQ*Q&qR/w-a0{hPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_R#j_k#n`j#i#q&t&x5d5e9W:Q:R:S:TR#saT&}#r'PR-h*[R&R!{0zhPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_R#tb-x!}[#e#k#u$U$V$W$X$Y$Z$v$w%X%Z%]%a%s%|&O&U&_&`&a&b&c&d&e&f&g&h&i&j&k&l&m&n&v&w&|'`'b'c(e(x)v)x)z*O*U*h*j+a+d,n,q-W-Y-[-e-f-g-w.Y/O/[/v0Q0Z0f1g1j1m1z2S2`2o2p2v3Z4]4^4d4e4f4g4h4i4j4l4m4n4o4p4q4r4s4t4u4v4w4x4y4z4{4|4}5P5Q5T5U5W5X5Y5]5^5`5t6e6f6g6h6i6j6k6m6n6o6p6q6r6s6t6u6v6w6x6y6z6{6|6}7O7Q7R7U7V7X7Y7Z7^7_7a7m7q8i8j8k8l8m8n8p8q8r8t8u8v8w8x8y8z8{8|8}9O9P9Q9R9S9U9V9Y9[9]9d9e9g9i9j9k9l9m9n9q9r9t9w:p:x:y:z:{:|:};Q;R;T;U;V;W;X;Y;Z;[;];^;_;`;a;b;c;d;f;g;l;m;p;r;s;w;y;{<O=V=W=X=Y=Z=[=]=`=c=d=e=f=g=h=i=j=k=l=m=n=o=p=q=r=s=t=u=v=w=x=y=z={=|=}>O>P>Q>R>S>T>U>X>Y>Z>_>`>a>b>d>e>f>g>j>k>m>r>s>{>|>}?V?b?cQ'd$[Y(X$s8o;P=^=_S(]3o7lQ(`$tR+y(aT&X!|){#a$Pg#}$h'X'Z'p't'y(W([)`)c*r*w+Q+X+[+_+j+m+n+t,i,u,x-v.S.V.].b.c0b0m1y3n3s3t7i7j7k7w9|9}:O?S?T?Y?p?q?r?y?z?{?|3yfPVX]`cgjklmnoprxyz!S!W!X!Y!]!e!f!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r#}$Q$R$T$h$z%O%Q%S%T%U%V%d%r%}&S&W&[&q&t&u&x'P'X'Z']'a'e'p't'y(R(V(W(Y(Z([(h(t)T)X)`)c)g)n)u)y){*V*Z*[*r*w*|+Q+X+[+^+_+j+m+n+q+t,Q,T,Y,c,e,g,i,u,x-O-`-a-t-v-z.S.V.[.].^.b.c.u.w/P/X/n/y0O0T0b0e0m0s0}1O1R1S1W1b1k1o1y1{2W2]2k2r3n3p3s3t3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7i7j7k7o7w7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v9|9}:O:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?S?T?Y?^?_?p?q?r?y?z?{?|[#wd#x3h3i3j3kh'V#z'W)f,}-U/k/u1f3l3m3q3rQ)e%nR-T)kY#yd%n)k3h3iV'T#x3j3k1dePVX]`cjklmnoprxyz!S!W!X!Y!]!e!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a'e(R(V(Y(Z(h(t)T)X)g)n)u)y){*V*Z*[*|+^+q,Q,T,Y,c,e,g-O-`-a-t-z.[.^.u.w/P/X/n/y0O0T0e0s0}1O1R1S1W1b1k1o1{2W2]2k2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_Q%o!fQ)l%r#O3vg#}$h'X'Z'p't'y(W([)`*w+Q+X+[+_+j+m+t,i,u,x-v.S.V.].b0b1y7i7j7k7w9|9}:O?S?T?Y?p?q?r?y?z?{?|a3w)c*r+n.c0m3n3s3tY'T#z)f-U3l3mZ*c'W,}/u3q3r0vhPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0}1O1R1S1W1k1o1{2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_T2U0s2WR&^#OR&]#O!r#Z[#e#u$U$V$W$X$Z$s$w%X%Z%]&`&a&b&c&d&e&f&g'`'b'c(e)v)x*O*j+d-Y.Y0f1z2`2p2v3Z9U9V!Y4U3o4d4e4f4g4i4j4l4m4n4o4p4q4r4s4{4|4}5P5Q5T5U5W5X5Y5]5^5`!^6X4^6e6f6g6h6j6k6m6n6o6p6q6r6s6t6|6}7O7Q7R7U7V7X7Y7Z7^7_7a7l7m#b8[#k%a%s%|&O&v&w&|(x*U+a,n,q-W-e-g/[4]5t7q8i8j8k8l8n8o8p8t8u8v8w8x8y8z8{9Y9[9]9d9g9i9l9n9q9r9t9w:p;R<O>r>s>{?b?c!|:i&U)z-[-f-w0Q0Z1g1j1m2o8q8r9e9j9k9m:x:y:z:{:};P;Q;T;U;V;W;X;Y;Z;[;d;f;g;l;m;p;r;s;w;y;{>R>S!`<o/O/v=V=W=X=Y=]=^=`=c=e=g=i=k=m=o=q>T>X>Z>_>a>d>e>g>j>k>m>|>}?Vo<p2S=_=d=f=h=j=l=n=p=r>U>Y>`>b>fS$iu#fQ$qwU'{$j$l&pQ'}$kS(P$m$rQ+Z'|Q+](OQ+`(QQ1p0VQ5s7dS5v7f7gQ5w7hQ7p9xS7r9y9zQ7s9{Q;O>uS;h>w>zQ;o?PQ>y?jS?O?l?nQ?U?oQ?`?sS?a?t?wS?d?u?vR?e?xT'u$h+Q!csPVXt!S!j!r!s!w$h%O%Q%T%V'p([(h)`+Q+j+t,Q,T,u,x.u.w/P0}1O1W2]Q$]rR*l'eQ-{+PQ.i+oQ0U-xQ0j.`Q1|0kR2w1}T0W-y0XQ+V'zQ.U+YR0d.XQ(_$tQ)^%iQ)s%vQ*u'mS+x(`(aQ-q*vR.p+yQ(^$tQ)b%kQ)r%vQ*q'lS*t'm)sU+w(_(`(aS-p*u*vS.o+x+yQ/i,{Q/{-nQ/}-qR0v.pQ(]$tQ)]%iQ)_%jQ)q%vU*s'm)r)sW+v(^(_(`(aQ,t)^U-o*t*u*vU.n+w+x+yS/|-p-qS0u.o.pQ1i/}R2Y0vX+r([)`+t,xb%f!_$a'j+n.c.f0m0o2OR,r)YQ$ovS+b(S?Qg?m([)`+i+j+m+t,u,x.a.b0lR0t.kT2V0s2W0}|PVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g,m-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_T$y{$|Q,O(dR.r+|T${{$|Q(j%OQ(r%QQ(w%TQ(z%VQ.},XQ0z.yQ0{.|R2c1WR(m%PX,[(k(l,],_R(n%PX(p%Q%T%V1WR%T!T_%b!]%S(t,c,e/X1RR%V!UR/],gR,j)PQ)a%kS*p'l)bS-m*q,{S/z-n/iR1h/{T,w)`,xQ-P)fU/l,|,}-UU1^/k/t/uR2n1fR/o-OR2l1bSSO!mR!oSQ!rVR%y!rQ!jPS!sV!rQ!wX[%u!j!s!w,Q1O2]Q,Q(hQ1O/PR2]0}Q)o%sS-X)o9bR9b8rQ-b*QR/x-bQ&y#oS*X&y9XR9X:tS*]&|&}R-i*]Q)|&YR-^)|!j'Y#|'o*f*z+O+T+e+i.T.W.Z.a/_0`0c0g0l1x2u5x5y5z7e7t7u7v;q;t;x?W?X?Z?f?g?h?iS*e'Y/g]/g,{-n.f0o1[2O!h'[#|'o*z+O+T+e+i.T.W.Z.a/_0`0c0g0l1x2u5x5y5z7e7t7u7v;q;t;x?W?X?Z?f?g?h?iS*g'[/hZ/h,{-n.f0o2OU#xd%n)kU'S#x3j3kQ3j3hR3k3iQ'W#z^*b'W,}/k/u1f3q3rQ,})fQ/u-UQ3q3lR3r3m|tPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]W$_t'p+j,uS'p$h+QS+j([+tT,u)`,xQ'f$]R*m'fQ0X-yR1q0XQ+R'vR-}+RQ0].PS1u0]1vR1v0^Q._+fR0i._Q+t([R.l+tW+m([)`+t,xS.b+j,uT.e+m.bQ)Z%fR,s)ZQ(T$oS+c(T?RR?R?mQ2W0sR2}2WQ$|{R(f$|Q,S(iR.v,SQ,V(jR.z,VQ,](kQ,_(lT/Q,],_Q)U%aS,o)U9`R9`8qQ)R%_R,l)RQ,x)`R/e,xQ)h%pS-R)h/sR/s-SQ1c/oR2m1cT!uV!rj!iPVX!j!r!s!w(h,Q/P0}1O2]Q%R!SQ(i%OW(p%Q%T%V1WQ.x,TQ0x.uR0y.w|[PVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]Q#e]U#k`#q&xQ#ucQ$UkQ$VlQ$WmQ$XnQ$YoQ$ZpQ$sx^$vy3y5|8P:]<Y<ZQ$wzQ%X!WQ%Z!XQ%]!YW%a!]%S(t,eU%s!g&q-aQ%|!yQ&O!zS&U!|){^&_#Q3{6O8R:`<]<^Q&`#RQ&a#SQ&b#TQ&c#UQ&d#VQ&e#WQ&f#XQ&g#YQ&h#ZQ&i#[Q&j#]Q&k#^Q&l#_Q&m#`Q&n#aQ&v#lQ&w#mS&|#r'PQ'`$QQ'b$RQ'c$TQ(e$zQ(x%UQ)v%}Q)x&SQ)z&WQ*O&[Q*U&uS*h']5uQ*j'a^*k3p5a7b9u;|>n>oQ+a(RQ+d(VQ,n)TQ,q)XQ-W)nQ-Y)uQ-[)yQ-e*VQ-f*ZQ-g*[^-k3u5b7c9v;}>p>qQ-w*|Q.Y+^Q/O,YQ/[,gQ/v-`Q0Q-tQ0Z-zQ0f.[Q1g/yQ1j0OQ1m0TQ1z0eU2S0s2W:rQ2`1SQ2o1kQ2p1oQ2v1{Q3Z2rQ3o3xQ4]jQ4^5eQ4d5fQ4e5hQ4f5jQ4g5lQ4h5nQ4i5pQ4j3zQ4l3|Q4m3}Q4n4OQ4o4PQ4p4QQ4q4RQ4r4SQ4s4TQ4t4UQ4u4VQ4v4WQ4w4XQ4x4YQ4y4ZQ4z4[Q4{4_Q4|4`Q4}4aQ5P4bQ5Q4cQ5T4kQ5U5OQ5W5RQ5X5SQ5Y5VQ5]5ZQ5^5[Q5`5_Q5t5rQ6e5gQ6f5iQ6g5kQ6h5mQ6i5oQ6j5qQ6k5}Q6m6PQ6n6QQ6o6RQ6p6SQ6q6TQ6r6UQ6s6VQ6t6WQ6u6XQ6v6YQ6w6ZQ6x6[Q6y6]Q6z6^Q6{6_Q6|6`Q6}6aQ7O6bQ7Q6cQ7R6dQ7U6lQ7V7PQ7X7SQ7Y7TQ7Z7WQ7^7[Q7_7]Q7a7`Q7l5{Q7m5dQ7q7oQ8i7xQ8j7yQ8k7zQ8l7{Q8m7|Q8n7}Q8o8OQ8p8QU8q,c/X1RQ8r%dQ8t8SQ8u8TQ8v8UQ8w8VQ8x8WQ8y8XQ8z8YQ8{8ZQ8|8[Q8}8]Q9O8^Q9P8_Q9Q8`Q9R8aQ9S8bQ9U8dQ9V8eQ9Y8fQ9[8gQ9]8hQ9d8sQ9e9TQ9g9ZQ9i9^Q9j9_Q9k9aQ9l9cQ9m9fQ9n9hQ9q9oQ9r9pQ9t9sQ9w:QU:p#i&t9WQ:x:UQ:y:VQ:z:WQ:{:XQ:|:YQ:}:ZQ;P:[Q;Q:^Q;R:_Q;T:aQ;U:bQ;V:cQ;W:dQ;X:eQ;Y:fQ;Z:gQ;[:hQ;]:iQ;^:jQ;_:kQ;`:lQ;a:mQ;b:nQ;c:oQ;d:uQ;f:vQ;g:wQ;l;SQ;m;eQ;p;jQ;r;kQ;s;nQ;w;uQ;y;vQ;{;zQ<O:TQ=V<PQ=W<QQ=X<RQ=Y<SQ=Z<TQ=[<UQ=]<VQ=^<WQ=_<XQ=`<[Q=c<_Q=d<`Q=e<aQ=f<bQ=g<cQ=h<dQ=i<eQ=j<fQ=k<gQ=l<hQ=m<iQ=n<jQ=o<kQ=p<lQ=q<mQ=r<nQ=s<oQ=t<pQ=u<qQ=v<rQ=w<sQ=x<tQ=y<uQ=z<vQ={<wQ=|<xQ=}<yQ>O<zQ>P<{Q>Q<|Q>R=OQ>S=PQ>T=QQ>U=RQ>X=SQ>Y=TQ>Z=UQ>_=aQ>`=bQ>a>VQ>b>WQ>d>[Q>e>]Q>f>^Q>g>cQ>j>hQ>k>iQ>m>lQ>r:SQ>s:RQ>{>vQ>|:qQ>}:sQ?V;iQ?b?^R?c?_R*R&qQ%t!gQ)W%dT*P&q-a$WiPVX]cklmnopxyz!S!W!X!Y!j!r!s!w#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a$Q$R$T$z%O%Q%T%V%}&S&['a(V(h)u+^,Q,T.[.u.w/P0e0}1O1S1W1o1{2]2r3p3u8d8e!t5c']3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5f5h5j5l5n5p7b7c!x7n5a5b5d5e5g5i5k5m5o5q5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`$`:P`j!]!g!y!z#i#l#m#q#r%S%U&q&t&u&x'P(R(t)T)X)n*V*[,e,g-a5r7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8f8g8h8s9W9Z9^9c9h9o9p9s9u9v:Q:R:S:T:_>v?^?_#l>t!|%d&W)y){*Z*|,c-t-z/X/y0O0T1R1k9T9_9a9f:U:V:W:X:Y:Z:[:]:^:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:u:v:w;S;e;j;k;n;u;v;z;|;}=O=P!x?[,Y-`:q:s;i<P<Q<R<S<T<V<W<Y<[<]<_<a<c<e<g<i<k<m<o<q<s<u<w<y<{=Q=S=U=a>V>[>]>c>h>i>l>n>p!]?]0s2W:r<U<X<Z<^<`<b<d<f<h<j<l<n<p<r<t<v<x<z<|=R=T=b>W>^>o>qQ#p`Q&s#iQ&{#qR*T&tS#o`#q^$Sj5d5e:Q:R:S:TS*W&x9WT:t#i&tQ'O#rR*_'PR&T!{R&Z!|Q&Y!|R-]){Q#|gS'^#}3nS'o$h+QS*d'X3sU*f'Z*w-vQ*z'pQ+O'tQ+T'yQ+e(WW+i([)`+t,xQ,{)cQ-n*rQ.T+XQ.W+[Q.Z+_U.a+j+m,uQ.f+nQ/_,iQ0`.SQ0c.VQ0g.]Q0l.bQ0o.cQ1[3tQ1x0bQ2O0mQ2u1yQ5x7iQ5y7jQ5z7kQ7e7wQ7t9|Q7u9}Q7v:OQ;q?SQ;t?TQ;x?YQ?W?pQ?X?qQ?Z?rQ?f?yQ?g?zQ?h?{R?i?|0z!OPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_#`$Og#}$h'X'Z'p't'y(W([)`)c*r*w+Q+X+[+_+j+m+n+t,i,u,x-v.S.V.].b.c0b0m1y3n3s3t7i7j7k7w9|9}:O?S?T?Y?p?q?r?y?z?{?|S$[r'eQ%l!eS%p!f%rU+f(Y(Z+qQ-Q)gQ/m-OQ0h.^Q1a/nQ2j1bR3W2k|vPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]#Y#g]cklmnopxyz!W!X!Y#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a$Q$R$T$z%}&S&['a(V)u+^.[0e1S1o1{2r3p3u8d8e`+k([)`+j+m+t,u,x.b!t8c']3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5f5h5j5l5n5p7b7c!x<}5a5b5d5e5g5i5k5m5o5q5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`$`?k`j!]!g!y!z#i#l#m#q#r%S%U&q&t&u&x'P(R(t)T)X)n*V*[,e,g-a5r7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8f8g8h8s9W9Z9^9c9h9o9p9s9u9v:Q:R:S:T:_>v?^?_#l?}!|%d&W)y){*Z*|,c-t-z/X/y0O0T1R1k9T9_9a9f:U:V:W:X:Y:Z:[:]:^:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:u:v:w;S;e;j;k;n;u;v;z;|;}=O=P!x@O,Y-`:q:s;i<P<Q<R<S<T<V<W<Y<[<]<_<a<c<e<g<i<k<m<o<q<s<u<w<y<{=Q=S=U=a>V>[>]>c>h>i>l>n>p!]@P0s2W:r<U<X<Z<^<`<b<d<f<h<j<l<n<p<r<t<v<x<z<|=R=T=b>W>^>o>qR'w$hQ'v$hR-|+QR$^rQ#d[Q%Y!WQ%[!XQ%^!YQ(U$pQ({%WQ(|%XQ(}%ZQ)O%]Q)V%cQ)[%gQ)d%lQ)j%qQ)p%tQ*n'iQ-V)mQ-l*oQ.i+oQ.j+pQ.x,WQ/S,`Q/T,aQ/U,bQ/Z,fQ/^,hQ/b,pQ/q-PQ0j.`Q0q.dQ0r.hQ0t.kQ0y.{Q1Y/dQ1_/lQ1n0VQ1|0kQ2Q0nQ2R0pQ2[0|Q2d1XQ2g1^Q2w1}Q2y2PQ2|2VQ3P2ZQ3T2fQ3X2nQ3Y2pQ3]2xQ3a3RQ3b3SR3e3ZR.R+UQ+g(YQ+h(ZR.k+qS+s([+tT,w)`,xa+l([)`+j+m+t,u,x.bQ%g!_Q'i$aQ*o'jQ.h+nS0p.c.fS2P0m0oR2x2OQ$pvW+o([)`+t,xW.`+i+j+m,uS0k.a.bR1}0l|!aPVX!S!j!r!s!w%O%Q%T%V(h,Q,T.u.w/P0}1O1W2]Q$ctW+p([)`+t,xU.d+j+m,uR0n.b0z!OPVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_R/a,m0}}PVX]`cjklmnopxyz!S!W!X!Y!]!g!j!r!s!w!y!z!|#Q#R#S#T#U#V#W#X#Y#Z#[#]#^#_#`#a#i#l#m#q#r$Q$R$T$z%O%Q%S%T%U%V%d%}&S&W&[&q&t&u&x'P']'a(R(V(h(t)T)X)n)u)y){*V*Z*[*|+^,Q,T,Y,c,e,g,m-`-a-t-z.[.u.w/P/X/y0O0T0e0s0}1O1R1S1W1k1o1{2W2]2r3p3u3x3y3z3{3|3}4O4P4Q4R4S4T4U4V4W4X4Y4Z4[4_4`4a4b4c4k5O5R5S5V5Z5[5_5a5b5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5u5{5|5}6O6P6Q6R6S6T6U6V6W6X6Y6Z6[6]6^6_6`6a6b6c6d6l7P7S7T7W7[7]7`7b7c7o7x7y7z7{7|7}8O8P8Q8R8S8T8U8V8W8X8Y8Z8[8]8^8_8`8a8b8d8e8f8g8h8s9T9W9Z9^9_9a9c9f9h9o9p9s9u9v:Q:R:S:T:U:V:W:X:Y:Z:[:]:^:_:`:a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:q:r:s:u:v:w;S;e;i;j;k;n;u;v;z;|;}<P<Q<R<S<T<U<V<W<X<Y<Z<[<]<^<_<`<a<b<c<d<e<f<g<h<i<j<k<l<m<n<o<p<q<r<s<t<u<v<w<x<y<z<{<|=O=P=Q=R=S=T=U=a=b>V>W>[>]>^>c>h>i>l>n>o>p>q>v?^?_T$x{$|Q(q%QQ(v%TQ(y%VR2b1WQ%c!]Q(u%SQ,d(tQ/W,cQ/Y,eQ1Q/XR2_1RQ%q!fR)m%rR/p-O",
  nodeNames: "⚠ ( HeredocString EscapeSequence abstract LogicOp array as Boolean break case catch clone const continue default declare do echo else elseif enddeclare endfor endforeach endif endswitch endwhile enum extends final finally fn for foreach from function global goto if implements include include_once LogicOp insteadof interface list match namespace new null LogicOp print readonly require require_once return switch throw trait try unset use var Visibility while LogicOp yield LineComment BlockComment TextInterpolation PhpClose Text PhpOpen Template TextInterpolation EmptyStatement ; } { Block : LabelStatement Name ExpressionStatement ConditionalExpression LogicOp MatchExpression ) ( ParenthesizedExpression MatchBlock MatchArm , => AssignmentExpression ArrayExpression ValueList & VariadicUnpacking ... Pair [ ] ListExpression ValueList Pair Pair SubscriptExpression MemberExpression -> ?-> Name VariableName DynamicVariable $ ${ CallExpression ArgList NamedArgument SpreadArgument CastExpression UnionType LogicOp IntersectionType OptionalType NamedType QualifiedName \\ NamespaceName Name NamespaceName Name ScopedExpression :: ClassMemberName DynamicMemberName AssignOp UpdateExpression UpdateOp YieldExpression BinaryExpression LogicOp LogicOp LogicOp BitOp BitOp BitOp CompareOp CompareOp BitOp ArithOp ConcatOp ArithOp ArithOp IncludeExpression RequireExpression CloneExpression UnaryExpression ControlOp LogicOp PrintIntrinsic FunctionExpression static ParamList Parameter #[ Attributes Attribute VariadicParameter PropertyParameter PropertyHooks PropertyHook UseList ArrowFunction NewExpression class BaseClause ClassInterfaceClause DeclarationList ConstDeclaration VariableDeclarator PropertyDeclaration VariableDeclarator MethodDeclaration UseDeclaration UseList UseInsteadOfClause UseAsClause UpdateExpression ArithOp ShellExpression ThrowExpression Integer Float String MemberExpression SubscriptExpression UnaryExpression ArithOp Interpolation String IfStatement ColonBlock SwitchStatement Block CaseStatement DefaultStatement ColonBlock WhileStatement EmptyStatement DoStatement ForStatement ForSpec SequenceExpression ForeachStatement ForSpec Pair GotoStatement ContinueStatement BreakStatement ReturnStatement TryStatement CatchDeclarator DeclareStatement EchoStatement UnsetStatement ConstDeclaration FunctionDefinition ClassDeclaration InterfaceDeclaration TraitDeclaration EnumDeclaration EnumBody EnumCase NamespaceDefinition NamespaceUseDeclaration UseGroup UseClause UseClause GlobalDeclaration FunctionStaticDeclaration Program",
  maxTerm: 318,
  nodeProps: [
    ["group", -36, 2, 8, 49, 82, 84, 86, 89, 94, 95, 103, 107, 108, 112, 113, 116, 120, 126, 132, 137, 139, 140, 154, 155, 156, 157, 160, 161, 173, 174, 188, 190, 191, 192, 193, 194, 200, "Expression", -28, 75, 79, 81, 83, 201, 203, 208, 210, 211, 214, 217, 218, 219, 220, 221, 223, 224, 225, 226, 227, 228, 229, 230, 231, 234, 235, 239, 240, "Statement", -4, 121, 123, 124, 125, "Type"],
    ["isolate", -4, 67, 68, 71, 200, ""],
    ["openedBy", 70, "phpOpen", 77, "{", 87, "(", 102, "#["],
    ["closedBy", 72, "phpClose", 78, "}", 88, ")", 165, "]"]
  ],
  propSources: [f0],
  skippedNodes: [0],
  repeatNodeCount: 32,
  tokenData: "!GQ_R!]OX$zXY&^YZ'sZ]$z]^&^^p$zpq&^qr)Rrs+Pst+otu2buv5evw6rwx8Vxy>]yz>yz{?g{|@}|}Bb}!OCO!O!PDh!P!QKT!Q!R!!o!R![!$q![!]!,P!]!^!-a!^!_!-}!_!`!1S!`!a!2d!a!b!3t!b!c!7^!c!d!7z!d!e!9Y!e!}!7z!}#O!;b#O#P!<O#P#Q!<l#Q#R!=Y#R#S!7z#S#T!=y#T#U!7z#U#V!9Y#V#o!7z#o#p!Cs#p#q!Da#q#r!Ev#r#s!Fd#s$f$z$f$g&^$g&j!7z&j$I_$z$I_$I`&^$I`$KW$z$KW$KX&^$KX;'S$z;'S;=`&W<%l?HT$z?HT?HU&^?HUO$zP%PV'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zP%kO'TPP%nWOY$zYZ%fZ!a$z!b;'S$z;'S;=`&W<%l~$z~O$z~~%fP&ZP;=`<%l$z_&ed'TP'S^OX$zXY&^YZ'sZ]$z]^&^^p$zpq&^q!^$z!^!_%k!_$f$z$f$g&^$g$I_$z$I_$I`&^$I`$KW$z$KW$KX&^$KX;'S$z;'S;=`&W<%l?HT$z?HT?HU&^?HUO$z_'zW'TP'S^XY(dYZ(d]^(dpq(d$f$g(d$I_$I`(d$KW$KX(d?HT?HU(d^(iW'S^XY(dYZ(d]^(dpq(d$f$g(d$I_$I`(d$KW$KX(d?HT?HU(dR)YW$eQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`)r!`;'S$z;'S;=`&W<%lO$zR)yW$XQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`*c!`;'S$z;'S;=`&W<%lO$zR*jV$XQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zV+YV'tS'TP'uQOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_+v]'TP!e^OY,oYZ%fZ],o]^$z^!^,o!^!_-i!_!a,o!a!b/y!b!},o!}#O1f#O;'S,o;'S;=`/s<%lO,o_,vZ'TP!e^OY,oYZ%fZ],o]^$z^!^,o!^!_-i!_!a,o!a!b/y!b;'S,o;'S;=`/s<%lO,o_-nZ!e^OY,oYZ%fZ],o]^$z^!a,o!a!b.a!b;'S,o;'S;=`/s<%l~,o~O,o~~%f^.dWOY.|YZ/nZ].|]^/n^!`.|!a;'S.|;'S;=`/h<%lO.|^/RV!e^OY.|Z].|^!a.|!a!b.a!b;'S.|;'S;=`/h<%lO.|^/kP;=`<%l.|^/sO!e^_/vP;=`<%l,o_0OZ'TPOY,oYZ0qZ],o]^0x^!^,o!^!_-i!_!`,o!`!a$z!a;'S,o;'S;=`/s<%lO,o_0xO'TP!e^_1PV'TP!e^OY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_1oZ'TP$kQ!e^OY,oYZ%fZ],o]^$z^!^,o!^!_-i!_!a,o!a!b/y!b;'S,o;'S;=`/s<%lO,o_2i`'TP#fQOY$zYZ%fZ!^$z!^!_%k!_!c$z!c!}3k!}#R$z#R#S3k#S#T$z#T#o3k#o#p4w#p$g$z$g&j3k&j;'S$z;'S;=`&W<%lO$z_3ra'TP#d^OY$zYZ%fZ!Q$z!Q![3k![!^$z!^!_%k!_!c$z!c!}3k!}#R$z#R#S3k#S#T$z#T#o3k#o$g$z$g&j3k&j;'S$z;'S;=`&W<%lO$zV5OV'TP#gUOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR5lW'TP$^QOY$zYZ%fZ!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR6]V$OQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_6yY#T^'TPOY$zYZ%fZv$zvw7iw!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR7pV$TQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR8^Z'TP%`QOY8VYZ9PZw8Vwx;_x!^8V!^!_;{!_#O8V#O#P<y#P;'S8V;'S;=`>V<%lO8VR9WV'TP%`QOw9mwx:Xx#O9m#O#P:^#P;'S9m;'S;=`;X<%lO9mQ9rV%`QOw9mwx:Xx#O9m#O#P:^#P;'S9m;'S;=`;X<%lO9mQ:^O%`QQ:aRO;'S9m;'S;=`:j;=`O9mQ:oW%`QOw9mwx:Xx#O9m#O#P:^#P;'S9m;'S;=`;X;=`<%l9m<%lO9mQ;[P;=`<%l9mR;fV'TP%`QOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR<Q]%`QOY8VYZ9PZw8Vwx;_x!a8V!a!b9m!b#O8V#O#P<y#P;'S8V;'S;=`>V<%l~8V~O8V~~%fR=OW'TPOY8VYZ9PZ!^8V!^!_;{!_;'S8V;'S;=`=h;=`<%l9m<%lO8VR=mW%`QOw9mwx:Xx#O9m#O#P:^#P;'S9m;'S;=`;X;=`<%l8V<%lO9mR>YP;=`<%l8VR>dV!zQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zV?QV!yU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR?nY'TP$^QOY$zYZ%fZz$zz{@^{!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR@eW$_Q'TPOY$zYZ%fZ!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zRAUY$[Q'TPOY$zYZ%fZ{$z{|At|!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zRA{V%TQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zRBiV#OQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_CXZ$[Q%^W'TPOY$zYZ%fZ}$z}!OAt!O!^$z!^!_%k!_!`6U!`!aCz!a;'S$z;'S;=`&W<%lO$zVDRV#aU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zVDo['TP$]QOY$zYZ%fZ!O$z!O!PEe!P!Q$z!Q![Fs![!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zVEjX'TPOY$zYZ%fZ!O$z!O!PFV!P!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zVF^V#VU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zRFz_'TP%XQOY$zYZ%fZ!Q$z!Q![Fs![!^$z!^!_%k!_!g$z!g!hGy!h#R$z#R#SJc#S#X$z#X#YGy#Y;'S$z;'S;=`&W<%lO$zRHO]'TPOY$zYZ%fZ{$z{|Hw|}$z}!OHw!O!Q$z!Q![Ii![!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zRH|X'TPOY$zYZ%fZ!Q$z!Q![Ii![!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zRIpZ'TP%XQOY$zYZ%fZ!Q$z!Q![Ii![!^$z!^!_%k!_#R$z#R#SHw#S;'S$z;'S;=`&W<%lO$zRJhX'TPOY$zYZ%fZ!Q$z!Q![Fs![!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_K[['TP$^QOY$zYZ%fZz$zz{LQ{!P$z!P!Q,o!Q!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$z_LVX'TPOYLQYZLrZzLQz{N_{!^LQ!^!_! s!_;'SLQ;'S;=`!!i<%lOLQ_LwT'TPOzMWz{Mj{;'SMW;'S;=`NX<%lOMW^MZTOzMWz{Mj{;'SMW;'S;=`NX<%lOMW^MmVOzMWz{Mj{!PMW!P!QNS!Q;'SMW;'S;=`NX<%lOMW^NXO!f^^N[P;=`<%lMW_NdZ'TPOYLQYZLrZzLQz{N_{!PLQ!P!Q! V!Q!^LQ!^!_! s!_;'SLQ;'S;=`!!i<%lOLQ_! ^V!f^'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_! vZOYLQYZLrZzLQz{N_{!aLQ!a!bMW!b;'SLQ;'S;=`!!i<%l~LQ~OLQ~~%f_!!lP;=`<%lLQZ!!vm'TP%WYOY$zYZ%fZ!O$z!O!PFs!P!Q$z!Q![!$q![!^$z!^!_%k!_!d$z!d!e!&o!e!g$z!g!hGy!h!q$z!q!r!(a!r!z$z!z!{!){!{#R$z#R#S!%}#S#U$z#U#V!&o#V#X$z#X#YGy#Y#c$z#c#d!(a#d#l$z#l#m!){#m;'S$z;'S;=`&W<%lO$zZ!$xa'TP%WYOY$zYZ%fZ!O$z!O!PFs!P!Q$z!Q![!$q![!^$z!^!_%k!_!g$z!g!hGy!h#R$z#R#S!%}#S#X$z#X#YGy#Y;'S$z;'S;=`&W<%lO$zZ!&SX'TPOY$zYZ%fZ!Q$z!Q![!$q![!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zZ!&tY'TPOY$zYZ%fZ!Q$z!Q!R!'d!R!S!'d!S!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zZ!'k['TP%WYOY$zYZ%fZ!Q$z!Q!R!'d!R!S!'d!S!^$z!^!_%k!_#R$z#R#S!&o#S;'S$z;'S;=`&W<%lO$zZ!(fX'TPOY$zYZ%fZ!Q$z!Q!Y!)R!Y!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zZ!)YZ'TP%WYOY$zYZ%fZ!Q$z!Q!Y!)R!Y!^$z!^!_%k!_#R$z#R#S!(a#S;'S$z;'S;=`&W<%lO$zZ!*Q]'TPOY$zYZ%fZ!Q$z!Q![!*y![!^$z!^!_%k!_!c$z!c!i!*y!i#T$z#T#Z!*y#Z;'S$z;'S;=`&W<%lO$zZ!+Q_'TP%WYOY$zYZ%fZ!Q$z!Q![!*y![!^$z!^!_%k!_!c$z!c!i!*y!i#R$z#R#S!){#S#T$z#T#Z!*y#Z;'S$z;'S;=`&W<%lO$zR!,WX!rQ'TPOY$zYZ%fZ![$z![!]!,s!]!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!,zV#yQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zV!-hV!nU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!.S[$YQOY$zYZ%fZ!^$z!^!_!.x!_!`!/i!`!a*c!a!b!0]!b;'S$z;'S;=`&W<%l~$z~O$z~~%fR!/PW$ZQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR!/pX$YQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`$z!`!a*c!a;'S$z;'S;=`&W<%lO$zP!0bR!jP!_!`!0k!r!s!0p#d#e!0pP!0pO!jPP!0sQ!j!k!0y#[#]!0yP!0|Q!r!s!0k#d#e!0k_!1ZX#|Y'TPOY$zYZ%fZ!^$z!^!_%k!_!`)r!`!a!1v!a;'S$z;'S;=`&W<%lO$zV!1}V#PU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!2kX$YQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`!3W!`!a!.x!a;'S$z;'S;=`&W<%lO$zR!3_V$YQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_!3{[!wQ'TPOY$zYZ%fZ}$z}!O!4q!O!^$z!^!_%k!_!`$z!`!a!6P!a!b!6m!b;'S$z;'S;=`&W<%lO$zV!4vX'TPOY$zYZ%fZ!^$z!^!_%k!_!`$z!`!a!5c!a;'S$z;'S;=`&W<%lO$zV!5jV#bU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_!6WV!h^'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!6tW$RQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR!7eV$dQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_!8Ta'aS'TP'WYOY$zYZ%fZ!Q$z!Q![!7z![!^$z!^!_%k!_!c$z!c!}!7z!}#R$z#R#S!7z#S#T$z#T#o!7z#o$g$z$g&j!7z&j;'S$z;'S;=`&W<%lO$z_!9ce'aS'TP'WYOY$zYZ%fZr$zrs!:tsw$zwx8Vx!Q$z!Q![!7z![!^$z!^!_%k!_!c$z!c!}!7z!}#R$z#R#S!7z#S#T$z#T#o!7z#o$g$z$g&j!7z&j;'S$z;'S;=`&W<%lO$zR!:{V'TP'uQOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zV!;iV#XU'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_!<VV#s^'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!<sV#YQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!=aW$VQ'TPOY$zYZ%fZ!^$z!^!_%k!_!`6U!`;'S$z;'S;=`&W<%lO$zR!>OZ'TPOY!=yYZ!>qZ!^!=y!^!_!@y!_#O!=y#O#P!Au#P#S!=y#S#T!CP#T;'S!=y;'S;=`!Cm<%lO!=yR!>vV'TPO#O!?]#O#P!?u#P#S!?]#S#T!@n#T;'S!?];'S;=`!@s<%lO!?]Q!?`VO#O!?]#O#P!?u#P#S!?]#S#T!@n#T;'S!?];'S;=`!@s<%lO!?]Q!?xRO;'S!?];'S;=`!@R;=`O!?]Q!@UWO#O!?]#O#P!?u#P#S!?]#S#T!@n#T;'S!?];'S;=`!@s;=`<%l!?]<%lO!?]Q!@sO%UQQ!@vP;=`<%l!?]R!@|]OY!=yYZ!>qZ!a!=y!a!b!?]!b#O!=y#O#P!Au#P#S!=y#S#T!CP#T;'S!=y;'S;=`!Cm<%l~!=y~O!=y~~%fR!AzW'TPOY!=yYZ!>qZ!^!=y!^!_!@y!_;'S!=y;'S;=`!Bd;=`<%l!?]<%lO!=yR!BgWO#O!?]#O#P!?u#P#S!?]#S#T!@n#T;'S!?];'S;=`!@s;=`<%l!=y<%lO!?]R!CWV%UQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!CpP;=`<%l!=y_!CzV!p^'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z_!DjY$UQ#n['TPOY$zYZ%fZ!^$z!^!_%k!_!`6U!`#p$z#p#q!EY#q;'S$z;'S;=`&W<%lO$zR!EaV$SQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!E}V!oQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$zR!FkV$eQ'TPOY$zYZ%fZ!^$z!^!_%k!_;'S$z;'S;=`&W<%lO$z",
  tokenizers: [a0, h0, l0, 0, 1, 2, 3, o0],
  topRules: { Template: [0, 73], Program: [1, 241] },
  dynamicPrecedences: { 298: 1 },
  specialized: [{ term: 284, get: (n, e) => Lo(n) << 1, external: Lo }, { term: 284, get: (n) => u0[n] || -1 }],
  tokenPrec: 29889
}), d0 = /* @__PURE__ */ at.define({
  name: "php",
  parser: /* @__PURE__ */ $0.configure({
    props: [
      /* @__PURE__ */ Ut.add({
        IfStatement: /* @__PURE__ */ Fe({ except: /^\s*({|else\b|elseif\b|endif\b)/ }),
        TryStatement: /* @__PURE__ */ Fe({ except: /^\s*({|catch\b|finally\b)/ }),
        SwitchBody: (n) => {
          let e = n.textAfter, t = /^\s*\}/.test(e), i = /^\s*(case|default)\b/.test(e);
          return n.baseIndent + (t ? 0 : i ? 1 : 2) * n.unit;
        },
        ColonBlock: (n) => n.baseIndent + n.unit,
        "Block EnumBody DeclarationList": /* @__PURE__ */ Rc({ closing: "}" }),
        ArrowFunction: (n) => n.baseIndent + n.unit,
        "String BlockComment": () => null,
        Statement: /* @__PURE__ */ Fe({ except: /^({|end(for|foreach|switch|while)\b)/ })
      }),
      /* @__PURE__ */ At.add({
        "Block EnumBody DeclarationList SwitchBody ArrayExpression ValueList": hr,
        ColonBlock(n) {
          return { from: n.from + 1, to: n.to };
        },
        BlockComment(n) {
          return { from: n.from + 2, to: n.to - 2 };
        }
      })
    ]
  }),
  languageData: {
    commentTokens: { block: { open: "/*", close: "*/" }, line: "//" },
    indentOnInput: /^\s*(?:case |default:|end(?:if|for(?:each)?|switch|while)|else(?:if)?|\{|\})$/,
    wordChars: "$",
    closeBrackets: { stringPrefixes: ["b", "B"] }
  }
});
function p0(n = {}) {
  let e = [], t;
  if (n.baseLanguage !== null) if (n.baseLanguage)
    t = n.baseLanguage;
  else {
    let i = DO({ matchClosingTags: !1 });
    e.push(i.support), t = i.language;
  }
  return new hi(d0.configure({
    wrap: t && wc((i) => i.type.isTop ? {
      parser: t.parser,
      overlay: (r) => r.name == "Text"
    } : null),
    top: n.plain ? "Program" : "Template"
  }), e);
}
const Q0 = 36, Bo = 1, m0 = 2, jt = 3, Kr = 4, g0 = 5, S0 = 6, P0 = 7, T0 = 8, y0 = 9, b0 = 10, w0 = 11, x0 = 12, k0 = 13, X0 = 14, v0 = 15, Z0 = 16, R0 = 17, Io = 18, z0 = 19, Qf = 20, mf = 21, No = 22, _0 = 23, Y0 = 24;
function BO(n) {
  return n >= 65 && n <= 90 || n >= 97 && n <= 122 || n >= 48 && n <= 57;
}
function V0(n) {
  return n >= 48 && n <= 57 || n >= 97 && n <= 102 || n >= 65 && n <= 70;
}
function vt(n, e, t) {
  for (let i = !1; ; ) {
    if (n.next < 0)
      return;
    if (n.next == e && !i) {
      n.advance();
      return;
    }
    i = t && !i && n.next == 92, n.advance();
  }
}
function W0(n, e) {
  e: for (; ; ) {
    if (n.next < 0)
      return;
    if (n.next == 36) {
      n.advance();
      for (let t = 0; t < e.length; t++) {
        if (n.next != e.charCodeAt(t))
          continue e;
        n.advance();
      }
      if (n.next == 36) {
        n.advance();
        return;
      }
    } else
      n.advance();
  }
}
function q0(n, e) {
  let t = "[{<(".indexOf(String.fromCharCode(e)), i = t < 0 ? e : "]}>)".charCodeAt(t);
  for (; ; ) {
    if (n.next < 0)
      return;
    if (n.next == i && n.peek(1) == 39) {
      n.advance(2);
      return;
    }
    n.advance();
  }
}
function IO(n, e) {
  for (; !(n.next != 95 && !BO(n.next)); )
    e != null && (e += String.fromCharCode(n.next)), n.advance();
  return e;
}
function C0(n) {
  if (n.next == 39 || n.next == 34 || n.next == 96) {
    let e = n.next;
    n.advance(), vt(n, e, !1);
  } else
    IO(n);
}
function Fo(n, e) {
  for (; n.next == 48 || n.next == 49; )
    n.advance();
  e && n.next == e && n.advance();
}
function Ho(n, e) {
  for (; ; ) {
    if (n.next == 46) {
      if (e)
        break;
      e = !0;
    } else if (n.next < 48 || n.next > 57)
      break;
    n.advance();
  }
  if (n.next == 69 || n.next == 101)
    for (n.advance(), (n.next == 43 || n.next == 45) && n.advance(); n.next >= 48 && n.next <= 57; )
      n.advance();
}
function Ko(n) {
  for (; !(n.next < 0 || n.next == 10); )
    n.advance();
}
function xt(n, e) {
  for (let t = 0; t < e.length; t++)
    if (e.charCodeAt(t) == n)
      return !0;
  return !1;
}
const Jr = ` 	\r
`;
function gf(n, e, t) {
  let i = /* @__PURE__ */ Object.create(null);
  i.true = i.false = g0, i.null = i.unknown = S0;
  for (let r of n.split(" "))
    r && (i[r] = Qf);
  for (let r of e.split(" "))
    r && (i[r] = mf);
  for (let r of (t || "").split(" "))
    r && (i[r] = Y0);
  return i;
}
const U0 = "array binary bit boolean char character clob date decimal double float int integer interval large national nchar nclob numeric object precision real smallint time timestamp varchar varying ", A0 = "absolute action add after all allocate alter and any are as asc assertion at authorization before begin between both breadth by call cascade cascaded case cast catalog check close collate collation column commit condition connect connection constraint constraints constructor continue corresponding count create cross cube current current_date current_default_transform_group current_transform_group_for_type current_path current_role current_time current_timestamp current_user cursor cycle data day deallocate declare default deferrable deferred delete depth deref desc describe descriptor deterministic diagnostics disconnect distinct do domain drop dynamic each else elseif end end-exec equals escape except exception exec execute exists exit external fetch first for foreign found from free full function general get global go goto grant group grouping handle having hold hour identity if immediate in indicator initially inner inout input insert intersect into is isolation join key language last lateral leading leave left level like limit local localtime localtimestamp locator loop map match method minute modifies module month names natural nesting new next no none not of old on only open option or order ordinality out outer output overlaps pad parameter partial path prepare preserve primary prior privileges procedure public read reads recursive redo ref references referencing relative release repeat resignal restrict result return returns revoke right role rollback rollup routine row rows savepoint schema scroll search second section select session session_user set sets signal similar size some space specific specifictype sql sqlexception sqlstate sqlwarning start state static system_user table temporary then timezone_hour timezone_minute to trailing transaction translation treat trigger under undo union unique unnest until update usage user using value values view when whenever where while with without work write year zone ", NO = {
  backslashEscapes: !1,
  hashComments: !1,
  spaceAfterDashes: !1,
  slashComments: !1,
  doubleQuotedStrings: !1,
  doubleDollarQuotedStrings: !1,
  unquotedBitLiterals: !1,
  treatBitsAsBytes: !1,
  charSetCasts: !1,
  plsqlQuotingMechanism: !1,
  operatorChars: "*+-%<>!=&|~^/",
  specialVar: "?",
  identifierQuotes: '"',
  caseInsensitiveIdentifiers: !1,
  words: /* @__PURE__ */ gf(A0, U0)
};
function G0(n, e, t, i) {
  let r = {};
  for (let O in NO)
    r[O] = (n.hasOwnProperty(O) ? n : NO)[O];
  return e && (r.words = gf(e, t || "", i)), r;
}
function Sf(n) {
  return new te((e) => {
    var t;
    let { next: i } = e;
    if (e.advance(), xt(i, Jr)) {
      for (; xt(e.next, Jr); )
        e.advance();
      e.acceptToken(Q0);
    } else if (i == 36 && n.doubleDollarQuotedStrings) {
      let r = IO(e, "");
      e.next == 36 && (e.advance(), W0(e, r), e.acceptToken(jt));
    } else if (i == 39 || i == 34 && n.doubleQuotedStrings)
      vt(e, i, n.backslashEscapes), e.acceptToken(jt);
    else if (i == 35 && n.hashComments || i == 47 && e.next == 47 && n.slashComments)
      Ko(e), e.acceptToken(Bo);
    else if (i == 45 && e.next == 45 && (!n.spaceAfterDashes || e.peek(1) == 32))
      Ko(e), e.acceptToken(Bo);
    else if (i == 47 && e.next == 42) {
      e.advance();
      for (let r = 1; ; ) {
        let O = e.next;
        if (e.next < 0)
          break;
        if (e.advance(), O == 42 && e.next == 47) {
          if (r--, e.advance(), !r)
            break;
        } else O == 47 && e.next == 42 && (r++, e.advance());
      }
      e.acceptToken(m0);
    } else if ((i == 101 || i == 69) && e.next == 39)
      e.advance(), vt(e, 39, !0), e.acceptToken(jt);
    else if ((i == 110 || i == 78) && e.next == 39 && n.charSetCasts)
      e.advance(), vt(e, 39, n.backslashEscapes), e.acceptToken(jt);
    else if (i == 95 && n.charSetCasts)
      for (let r = 0; ; r++) {
        if (e.next == 39 && r > 1) {
          e.advance(), vt(e, 39, n.backslashEscapes), e.acceptToken(jt);
          break;
        }
        if (!BO(e.next))
          break;
        e.advance();
      }
    else if (n.plsqlQuotingMechanism && (i == 113 || i == 81) && e.next == 39 && e.peek(1) > 0 && !xt(e.peek(1), Jr)) {
      let r = e.peek(1);
      e.advance(2), q0(e, r), e.acceptToken(jt);
    } else if (xt(i, n.identifierQuotes)) {
      const r = i == 91 ? 93 : i;
      vt(e, r, !1), e.acceptToken(z0);
    } else if (i == 40)
      e.acceptToken(P0);
    else if (i == 41)
      e.acceptToken(T0);
    else if (i == 123)
      e.acceptToken(y0);
    else if (i == 125)
      e.acceptToken(b0);
    else if (i == 91)
      e.acceptToken(w0);
    else if (i == 93)
      e.acceptToken(x0);
    else if (i == 59)
      e.acceptToken(k0);
    else if (n.unquotedBitLiterals && i == 48 && e.next == 98)
      e.advance(), Fo(e), e.acceptToken(No);
    else if ((i == 98 || i == 66) && (e.next == 39 || e.next == 34)) {
      const r = e.next;
      e.advance(), n.treatBitsAsBytes ? (vt(e, r, n.backslashEscapes), e.acceptToken(_0)) : (Fo(e, r), e.acceptToken(No));
    } else if (i == 48 && (e.next == 120 || e.next == 88) || (i == 120 || i == 88) && e.next == 39) {
      let r = e.next == 39;
      for (e.advance(); V0(e.next); )
        e.advance();
      r && e.next == 39 && e.advance(), e.acceptToken(Kr);
    } else if (i == 46 && e.next >= 48 && e.next <= 57)
      Ho(e, !0), e.acceptToken(Kr);
    else if (i == 46)
      e.acceptToken(X0);
    else if (i >= 48 && i <= 57)
      Ho(e, !1), e.acceptToken(Kr);
    else if (xt(i, n.operatorChars)) {
      for (; xt(e.next, n.operatorChars); )
        e.advance();
      e.acceptToken(v0);
    } else if (xt(i, n.specialVar))
      e.next == i && e.advance(), C0(e), e.acceptToken(R0);
    else if (i == 58 || i == 44)
      e.acceptToken(Z0);
    else if (BO(i)) {
      let r = IO(e, String.fromCharCode(i));
      e.acceptToken(e.next == 46 || e.peek(-r.length - 1) == 46 ? Io : (t = n.words[r.toLowerCase()]) !== null && t !== void 0 ? t : Io);
    }
  });
}
const Pf = /* @__PURE__ */ Sf(NO), j0 = /* @__PURE__ */ ot.deserialize({
  version: 14,
  states: "%vQ]QQOOO#wQRO'#DSO$OQQO'#CwO%eQQO'#CxO%lQQO'#CyO%sQQO'#CzOOQQ'#DS'#DSOOQQ'#C}'#C}O'UQRO'#C{OOQQ'#Cv'#CvOOQQ'#C|'#C|Q]QQOOQOQQOOO'`QQO'#DOO(xQRO,59cO)PQQO,59cO)UQQO'#DSOOQQ,59d,59dO)cQQO,59dOOQQ,59e,59eO)jQQO,59eOOQQ,59f,59fO)qQQO,59fOOQQ-E6{-E6{OOQQ,59b,59bOOQQ-E6z-E6zOOQQ,59j,59jOOQQ-E6|-E6|O+VQRO1G.}O+^QQO,59cOOQQ1G/O1G/OOOQQ1G/P1G/POOQQ1G/Q1G/QP+kQQO'#C}O+rQQO1G.}O)PQQO,59cO,PQQO'#Cw",
  stateData: ",[~OtOSPOSQOS~ORUOSUOTUOUUOVROXSOZTO]XO^QO_UO`UOaPObPOcPOdUOeUOfUOgUOhUO~O^]ORvXSvXTvXUvXVvXXvXZvX]vX_vX`vXavXbvXcvXdvXevXfvXgvXhvX~OsvX~P!jOa_Ob_Oc_O~ORUOSUOTUOUUOVROXSOZTO^tO_UO`UOa`Ob`Oc`OdUOeUOfUOgUOhUO~OWaO~P$ZOYcO~P$ZO[eO~P$ZORUOSUOTUOUUOVROXSOZTO^QO_UO`UOaPObPOcPOdUOeUOfUOgUOhUO~O]hOsoX~P%zOajObjOcjO~O^]ORkaSkaTkaUkaVkaXkaZka]ka_ka`kaakabkackadkaekafkagkahka~Oska~P'kO^]O~OWvXYvX[vX~P!jOWnO~P$ZOYoO~P$ZO[pO~P$ZO^]ORkiSkiTkiUkiVkiXkiZki]ki_ki`kiakibkickidkiekifkigkihki~Oski~P)xOWkaYka[ka~P'kO]hO~P$ZOWkiYki[ki~P)xOasObsOcsO~O",
  goto: "#hwPPPPPPPPPPPPPPPPPPPPPPPPPPx||||!Y!^!d!xPPP#[TYOZeUORSTWZbdfqT[OZQZORiZSWOZQbRQdSQfTZgWbdfqQ^PWk^lmrQl_Qm`RrseVORSTWZbdfq",
  nodeNames: "⚠ LineComment BlockComment String Number Bool Null ( ) { } [ ] ; . Operator Punctuation SpecialVar Identifier QuotedIdentifier Keyword Type Bits Bytes Builtin Script Statement CompositeIdentifier Parens Braces Brackets Statement",
  maxTerm: 38,
  nodeProps: [
    ["isolate", -4, 1, 2, 3, 19, ""]
  ],
  skippedNodes: [0, 1, 2],
  repeatNodeCount: 3,
  tokenData: "RORO",
  tokenizers: [0, Pf],
  topRules: { Script: [0, 25] },
  tokenPrec: 0
});
function FO(n) {
  let e = n.cursor().moveTo(n.from, -1);
  for (; /Comment/.test(e.name); )
    e.moveTo(e.from, -1);
  return e.node;
}
function Di(n, e) {
  let t = n.sliceString(e.from, e.to), i = /^([`'"\[])(.*)([`'"\]])$/.exec(t);
  return i ? i[2] : t;
}
function er(n) {
  return n && (n.name == "Identifier" || n.name == "QuotedIdentifier");
}
function M0(n, e) {
  if (e.name == "CompositeIdentifier") {
    let t = [];
    for (let i = e.firstChild; i; i = i.nextSibling)
      er(i) && t.push(Di(n, i));
    return t;
  }
  return [Di(n, e)];
}
function Jo(n, e) {
  for (let t = []; ; ) {
    if (!e || e.name != ".")
      return t;
    let i = FO(e);
    if (!er(i))
      return t;
    t.unshift(Di(n, i)), e = FO(i);
  }
}
function E0(n, e) {
  let t = I(n).resolveInner(e, -1), i = D0(n.doc, t);
  return t.name == "Identifier" || t.name == "QuotedIdentifier" || t.name == "Keyword" ? {
    from: t.from,
    quoted: t.name == "QuotedIdentifier" ? n.doc.sliceString(t.from, t.from + 1) : null,
    parents: Jo(n.doc, FO(t)),
    aliases: i
  } : t.name == "." ? { from: e, quoted: null, parents: Jo(n.doc, t), aliases: i } : { from: e, quoted: null, parents: [], empty: !0, aliases: i };
}
const L0 = /* @__PURE__ */ new Set(/* @__PURE__ */ "where group having order union intersect except all distinct limit offset fetch for".split(" "));
function D0(n, e) {
  let t;
  for (let r = e; !t; r = r.parent) {
    if (!r)
      return null;
    r.name == "Statement" && (t = r);
  }
  let i = null;
  for (let r = t.firstChild, O = !1, s = null; r; r = r.nextSibling) {
    let a = r.name == "Keyword" ? n.sliceString(r.from, r.to).toLowerCase() : null, o = null;
    if (!O)
      O = a == "from";
    else if (a == "as" && s && er(r.nextSibling))
      o = Di(n, r.nextSibling);
    else {
      if (a && L0.has(a))
        break;
      s && er(r) && (o = Di(n, r));
    }
    o && (i || (i = /* @__PURE__ */ Object.create(null)), i[o] = M0(n, s)), s = /Identifier$/.test(r.name) ? r : null;
  }
  return i;
}
function B0(n, e, t) {
  return t.map((i) => ({ ...i, label: i.label[0] == n ? i.label : n + i.label + e, apply: void 0 }));
}
const I0 = /^\w*$/, N0 = /^[`'"\[]?\w*[`'"\]]?$/;
function el(n) {
  return n.self && typeof n.self.label == "string";
}
class qs {
  constructor(e, t) {
    this.idQuote = e, this.idCaseInsensitive = t, this.list = [], this.children = void 0;
  }
  child(e) {
    let t = this.children || (this.children = /* @__PURE__ */ Object.create(null)), i = t[e];
    return i || (e && !this.list.some((r) => r.label == e) && this.list.push(tl(e, "type", this.idQuote, this.idCaseInsensitive)), t[e] = new qs(this.idQuote, this.idCaseInsensitive));
  }
  maybeChild(e) {
    return this.children ? this.children[e] : null;
  }
  addCompletion(e) {
    let t = this.list.findIndex((i) => i.label == e.label);
    t > -1 ? this.list[t] = e : this.list.push(e);
  }
  addCompletions(e) {
    for (let t of e)
      this.addCompletion(typeof t == "string" ? tl(t, "property", this.idQuote, this.idCaseInsensitive) : t);
  }
  addNamespace(e) {
    Array.isArray(e) ? this.addCompletions(e) : el(e) ? this.addNamespace(e.children) : this.addNamespaceObject(e);
  }
  addNamespaceObject(e) {
    for (let t of Object.keys(e)) {
      let i = e[t], r = null, O = t.replace(/\\?\./g, (a) => a == "." ? "\0" : a).split("\0"), s = this;
      el(i) && (r = i.self, i = i.children);
      for (let a = 0; a < O.length; a++)
        r && a == O.length - 1 && s.addCompletion(r), s = s.child(O[a].replace(/\\\./g, "."));
      s.addNamespace(i);
    }
  }
}
function tl(n, e, t, i) {
  return new RegExp("^[a-z_][a-z_\\d]*$", i ? "i" : "").test(n) ? { label: n, type: e } : { label: n, type: e, apply: t + n + Tf(t) };
}
function Tf(n) {
  return n === "[" ? "]" : n;
}
function F0(n, e, t, i, r, O) {
  var s;
  let a = ((s = O == null ? void 0 : O.spec.identifierQuotes) === null || s === void 0 ? void 0 : s[0]) || '"', o = new qs(a, !!(O != null && O.spec.caseInsensitiveIdentifiers)), l = r ? o.child(r) : null;
  return o.addNamespace(n), e && (l || o).addCompletions(e), t && o.addCompletions(t), l && o.addCompletions(l.list), i && o.addCompletions((l || o).child(i).list), (c) => {
    let { parents: h, from: f, quoted: u, empty: d, aliases: p } = E0(c.state, c.pos);
    if (d && !c.explicit)
      return null;
    p && h.length == 1 && (h = p[h[0]] || h);
    let Q = o;
    for (let g of h) {
      for (; !Q.children || !Q.children[g]; )
        if (Q == o && l)
          Q = l;
        else if (Q == l && i)
          Q = Q.child(i);
        else
          return null;
      let T = Q.maybeChild(g);
      if (!T)
        return null;
      Q = T;
    }
    let m = Q.list;
    if (Q == o && p && (m = m.concat(Object.keys(p).map((g) => ({ label: g, type: "constant" })))), u) {
      let g = u[0], T = Tf(g), v = c.state.sliceDoc(c.pos, c.pos + 1) == T;
      return {
        from: f,
        to: v ? c.pos + 1 : void 0,
        options: B0(g, T, m),
        validFor: N0
      };
    } else
      return {
        from: f,
        options: m,
        validFor: I0
      };
  };
}
function H0(n) {
  return n == mf ? "type" : n == Qf ? "keyword" : "variable";
}
function K0(n, e, t) {
  let i = Object.keys(n).map((r) => t(e ? r.toUpperCase() : r, H0(n[r])));
  return Th(["QuotedIdentifier", "String", "LineComment", "BlockComment", "."], bs(i));
}
let J0 = /* @__PURE__ */ j0.configure({
  props: [
    /* @__PURE__ */ Ut.add({
      Statement: /* @__PURE__ */ Fe()
    }),
    /* @__PURE__ */ At.add({
      Statement(n, e) {
        return { from: Math.min(n.from + 100, e.doc.lineAt(n.from).to), to: n.to };
      },
      BlockComment(n) {
        return { from: n.from + 2, to: n.to - 2 };
      }
    }),
    /* @__PURE__ */ Ct({
      Keyword: $.keyword,
      Type: $.typeName,
      Builtin: /* @__PURE__ */ $.standard($.name),
      Bits: $.number,
      Bytes: $.string,
      Bool: $.bool,
      Null: $.null,
      Number: $.number,
      String: $.string,
      Identifier: $.name,
      QuotedIdentifier: /* @__PURE__ */ $.special($.string),
      SpecialVar: /* @__PURE__ */ $.special($.name),
      LineComment: $.lineComment,
      BlockComment: $.blockComment,
      Operator: $.operator,
      "Semi Punctuation": $.punctuation,
      "( )": $.paren,
      "{ }": $.brace,
      "[ ]": $.squareBracket
    })
  ]
});
class tr {
  constructor(e, t, i) {
    this.dialect = e, this.language = t, this.spec = i;
  }
  /**
  Returns the language for this dialect as an extension.
  */
  get extension() {
    return this.language.extension;
  }
  /**
  Reconfigure the parser used by this dialect. Returns a new
  dialect object.
  */
  configureLanguage(e, t) {
    return new tr(this.dialect, this.language.configure(e, t), this.spec);
  }
  /**
  Define a new dialect.
  */
  static define(e) {
    let t = G0(e, e.keywords, e.types, e.builtin), i = at.define({
      name: "sql",
      parser: J0.configure({
        tokenizers: [{ from: Pf, to: Sf(t) }]
      }),
      languageData: {
        commentTokens: { line: "--", block: { open: "/*", close: "*/" } },
        closeBrackets: { brackets: ["(", "[", "{", "'", '"', "`"] }
      }
    });
    return new tr(t, i, e);
  }
}
function e1(n, e) {
  return { label: n, type: e, boost: -1 };
}
function t1(n, e = !1, t) {
  return K0(n.dialect.words, e, t || e1);
}
function i1(n) {
  return n.schema ? F0(n.schema, n.tables, n.schemas, n.defaultTable, n.defaultSchema, n.dialect || Cs) : () => null;
}
function n1(n) {
  return n.schema ? (n.dialect || Cs).language.data.of({
    autocomplete: i1(n)
  }) : [];
}
function r1(n = {}) {
  let e = n.dialect || Cs;
  return new hi(e.language, [
    n1(n),
    e.language.data.of({
      autocomplete: t1(e, n.upperCaseKeywords, n.keywordCompletion)
    })
  ]);
}
const Cs = /* @__PURE__ */ tr.define({}), O1 = Hi.define([
  { tag: $.keyword, color: "#0000ff" },
  { tag: $.controlKeyword, color: "#af00db" },
  { tag: $.operatorKeyword, color: "#0000ff" },
  { tag: $.operator, color: "#000000" },
  { tag: $.number, color: "#098658" },
  { tag: $.string, color: "#a31515" },
  { tag: $.special($.string), color: "#a31515" },
  { tag: $.comment, color: "#008000", fontStyle: "italic" },
  { tag: $.lineComment, color: "#008000", fontStyle: "italic" },
  { tag: $.blockComment, color: "#008000", fontStyle: "italic" },
  { tag: $.docComment, color: "#008000", fontStyle: "italic" },
  { tag: $.variableName, color: "#001080" },
  { tag: $.local($.variableName), color: "#001080" },
  { tag: $.definition($.variableName), color: "#795e26" },
  { tag: $.function($.variableName), color: "#795e26" },
  { tag: $.propertyName, color: "#001080" },
  { tag: $.definition($.propertyName), color: "#001080" },
  { tag: $.typeName, color: "#267f99" },
  { tag: $.namespace, color: "#267f99" },
  { tag: $.className, color: "#267f99" },
  { tag: $.macroName, color: "#795e26" },
  { tag: $.labelName, color: "#001080" },
  { tag: $.bool, color: "#0000ff" },
  { tag: $.null, color: "#0000ff" },
  { tag: $.self, color: "#0000ff" },
  { tag: $.atom, color: "#0000ff" },
  { tag: $.punctuation, color: "#000000" },
  { tag: $.separator, color: "#000000" },
  { tag: $.meta, color: "#800000" },
  { tag: $.tagName, color: "#800000" },
  { tag: $.attributeName, color: "#ff0000" },
  { tag: $.attributeValue, color: "#0000ff" },
  { tag: $.angleBracket, color: "#800000" },
  { tag: $.regexp, color: "#811f3f" },
  { tag: $.escape, color: "#ee0000" }
]), s1 = Hi.define([
  { tag: $.keyword, color: "#569cd6" },
  { tag: $.controlKeyword, color: "#c586c0" },
  { tag: $.operatorKeyword, color: "#569cd6" },
  { tag: $.operator, color: "#d4d4d4" },
  { tag: $.number, color: "#b5cea8" },
  { tag: $.string, color: "#ce9178" },
  { tag: $.special($.string), color: "#ce9178" },
  { tag: $.comment, color: "#6a9955", fontStyle: "italic" },
  { tag: $.lineComment, color: "#6a9955", fontStyle: "italic" },
  { tag: $.blockComment, color: "#6a9955", fontStyle: "italic" },
  { tag: $.docComment, color: "#6a9955", fontStyle: "italic" },
  { tag: $.variableName, color: "#9cdcfe" },
  { tag: $.local($.variableName), color: "#9cdcfe" },
  { tag: $.definition($.variableName), color: "#dcdcaa" },
  { tag: $.function($.variableName), color: "#dcdcaa" },
  { tag: $.propertyName, color: "#9cdcfe" },
  { tag: $.definition($.propertyName), color: "#9cdcfe" },
  { tag: $.typeName, color: "#4ec9b0" },
  { tag: $.namespace, color: "#4ec9b0" },
  { tag: $.className, color: "#4ec9b0" },
  { tag: $.macroName, color: "#dcdcaa" },
  { tag: $.labelName, color: "#9cdcfe" },
  { tag: $.bool, color: "#569cd6" },
  { tag: $.null, color: "#569cd6" },
  { tag: $.self, color: "#569cd6" },
  { tag: $.atom, color: "#569cd6" },
  { tag: $.punctuation, color: "#d4d4d4" },
  { tag: $.separator, color: "#d4d4d4" },
  { tag: $.meta, color: "#808080" },
  { tag: $.tagName, color: "#569cd6" },
  { tag: $.attributeName, color: "#9cdcfe" },
  { tag: $.attributeValue, color: "#ce9178" },
  { tag: $.angleBracket, color: "#808080" },
  { tag: $.regexp, color: "#d16969" },
  { tag: $.escape, color: "#d7ba7d" }
]);
function yf() {
  return document.documentElement.classList.contains("dark");
}
const bf = new ci(), wf = new ci(), vn = [];
function xf() {
  return yf() ? s1 : O1;
}
function kf() {
  const n = yf();
  return k.theme({
    "&": {
      backgroundColor: "transparent",
      fontSize: "12px"
    },
    ".cm-scroller": {
      fontFamily: "ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace",
      lineHeight: "1.625"
    },
    ".cm-gutters": {
      backgroundColor: "transparent",
      border: "none"
    },
    ".cm-activeLineGutter": {
      backgroundColor: "transparent"
    },
    ".cm-activeLine": {
      backgroundColor: n ? "oklch(1 0 0 / 0.035)" : "oklch(0.5 0 0 / 0.06)"
    }
  });
}
const il = {
  javascript: () => Xt(),
  js: () => Xt(),
  typescript: () => Xt({ typescript: !0 }),
  ts: () => Xt({ typescript: !0 }),
  jsx: () => Xt({ jsx: !0 }),
  tsx: () => Xt({ jsx: !0, typescript: !0 }),
  html: () => DO(),
  blade: () => DO(),
  css: () => of(),
  json: () => LS(),
  php: () => p0(),
  sql: () => r1()
};
function a1(n) {
  const e = n == null ? void 0 : n.toLowerCase().trim();
  return e && il[e] ? il[e]() : null;
}
function HO(n) {
  var d, p;
  if ((p = (d = n.codeEditor) == null ? void 0 : d.dom) != null && p.parentNode) return;
  const e = n.querySelector("[data-code-editor-content]");
  if (!e) return;
  e.innerHTML = "";
  const t = n.querySelector('input[type="hidden"], textarea'), i = n.querySelector("[data-code-editor-header] span"), r = n.querySelector("[data-code-editor-status]"), O = n.querySelector('[data-action="copy"]'), s = n.dataset.language || "javascript", a = n.dataset.placeholder || "", o = n.hasAttribute("data-readonly"), l = (t == null ? void 0 : t.value) || n.dataset.content || "";
  i && !i.textContent.trim() && (i.textContent = s);
  const c = [
    wf.of(kf()),
    sd(),
    ld(),
    j$(),
    yp(),
    op(),
    lm(),
    jd(),
    bf.of(qc(xf())),
    or.of([
      ...wQ,
      ...zp,
      ...um,
      ...zh,
      xQ
    ]),
    k.lineWrapping
  ], h = a1(s);
  h && c.push(h), o || c.push(Sm()), c.push(Hd({
    closedText: "▶",
    openText: "▼"
  })), a && c.push(D$(a)), o && (c.push(q.readOnly.of(!0)), c.push(k.editable.of(!1))), t && !o && c.push(k.updateListener.of((Q) => {
    Q.docChanged && (t.value = Q.state.doc.toString(), nl(Q.state, r));
  }));
  const f = q.create({
    doc: l,
    extensions: c
  }), u = new k({
    state: f,
    parent: e
  });
  n.codeEditor = u, vn.push(u), nl(f, r), O && O.addEventListener("click", () => {
    const Q = u.state.doc.toString();
    navigator.clipboard.writeText(Q).then(() => {
      const m = O.querySelector("svg"), g = m == null ? void 0 : m.getAttribute("class");
      m && (m.outerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' + g + '"><path d="M20 6 9 17l-5-5"/></svg>'), setTimeout(() => {
        const T = O.querySelector("svg");
        T && (T.outerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' + g + '"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>');
      }, 2e3);
    });
  });
}
function nl(n, e) {
  if (!e) return;
  const t = n.doc.lines, i = n.doc.length;
  e.textContent = `${t} line${t !== 1 ? "s" : ""}, ${i} character${i !== 1 ? "s" : ""}`;
}
function Xf(n = document) {
  n.querySelectorAll("[data-code-editor]").forEach(HO);
}
Xf();
document.addEventListener("livewire:navigated", () => {
  Xf();
});
typeof Livewire < "u" && Livewire.hook("morph.added", ({ el: n }) => {
  var e, t;
  (e = n.matches) != null && e.call(n, "[data-code-editor]") && HO(n), (t = n.querySelectorAll) == null || t.call(n, "[data-code-editor]").forEach(HO);
});
const o1 = new MutationObserver(() => {
  var t;
  const n = qc(xf()), e = kf();
  for (let i = vn.length - 1; i >= 0; i--) {
    const r = vn[i];
    if (!((t = r.dom) != null && t.parentNode)) {
      vn.splice(i, 1);
      continue;
    }
    r.dispatch({
      effects: [
        bf.reconfigure(n),
        wf.reconfigure(e)
      ]
    });
  }
});
o1.observe(document.documentElement, {
  attributes: !0,
  attributeFilter: ["class"]
});
export {
  a1 as getLanguageExtension,
  Xf as initAllCodeEditors,
  HO as initCodeEditor
};
