/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

/*!
 * EventEmitter v4.2.6 - git.io/ee
 * Oliver Caldwell
 * MIT license
 * @preserve
 */

(function() {
    function e() {}

    function t(e, t) {
        for (var n = e.length; n--;)
            if (e[n].listener === t) return n;
        return -1
    }

    function n(e) {
        return function() {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        o = r.EventEmitter;
    i.getListeners = function(e) {
        var t, n, i = this._getEvents();
        if ("object" == typeof e) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function(e) {
        var t, n = [];
        for (t = 0; t < e.length; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function(e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && ((t = {})[e] = n), t || n
    }, i.addListener = function(e, n) {
        var i, r = this.getListenersAsObject(e),
            o = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function(e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function(e) {
        return this.getListeners(e), this
    }, i.defineEvents = function(e) {
        for (var t = 0; t < e.length; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function(e, n) {
        var i, r, o = this.getListenersAsObject(e);
        for (r in o) o.hasOwnProperty(r) && -1 !== (i = t(o[r], n)) && o[r].splice(i, 1);
        return this
    }, i.off = n("removeListener"), i.addListeners = function(e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function(e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function(e, t, n) {
        var i, r, o = e ? this.removeListener : this.addListener,
            s = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp)
            for (i = n.length; i--;) o.call(this, t, n[i]);
        else
            for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r));
        return this
    }, i.removeEvent = function(e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if ("object" === n)
            for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function(e, t) {
        var n, i, r, o = this.getListenersAsObject(e);
        for (r in o)
            if (o.hasOwnProperty(r))
                for (i = o[r].length; i--;) !0 === (n = o[r][i]).once && this.removeListener(e, n.listener), n.listener.apply(this, t || []) === this._getOnceReturnValue() && this.removeListener(e, n.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function(e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function() {
        return !this.hasOwnProperty("_onceReturnValue") || this._onceReturnValue
    }, i._getEvents = function() {
        return this._events || (this._events = {})
    }, e.noConflict = function() {
        return r.EventEmitter = o, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}).call(this),
    function(e) {
        function t(t) {
            var n = e.event;
            return n.target = n.target || n.srcElement || t, n
        }
        var n = document.documentElement,
            i = function() {};
        n.addEventListener ? i = function(e, t, n) {
            e.addEventListener(t, n, !1)
        } : n.attachEvent && (i = function(e, n, i) {
            e[n + i] = i.handleEvent ? function() {
                var n = t(e);
                i.handleEvent.call(i, n)
            } : function() {
                var n = t(e);
                i.call(e, n)
            }, e.attachEvent("on" + n, e[n + i])
        });
        var r = function() {};
        n.removeEventListener ? r = function(e, t, n) {
            e.removeEventListener(t, n, !1)
        } : n.detachEvent && (r = function(e, t, n) {
            e.detachEvent("on" + t, e[t + n]);
            try {
                delete e[t + n]
            } catch (i) {
                e[t + n] = void 0
            }
        });
        var o = {
            bind: i,
            unbind: r
        };
        "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
    }(this),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function(n, i) {
            return t(e, n, i)
        }) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
    }(window, function(e, t, n) {
        function i(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function r(e) {
            return "[object Array]" === d.call(e)
        }

        function o(e) {
            var t = [];
            if (r(e)) t = e;
            else if ("number" == typeof e.length)
                for (var n = 0, i = e.length; n < i; n++) t.push(e[n]);
            else t.push(e);
            return t
        }

        function s(e, t, n) {
            if (!(this instanceof s)) return new s(e, t);
            "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred);
            var r = this;
            setTimeout(function() {
                r.check()
            })
        }

        function f(e) {
            this.img = e
        }

        function c(e) {
            this.src = e, v[e] = this
        }
        var a = e.jQuery,
            h = e.console,
            u = void 0 !== h,
            d = Object.prototype.toString;
        s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function() {
            this.images = [];
            for (var e = 0, t = this.elements.length; e < t; e++) {
                var n = this.elements[e];
                "IMG" === n.nodeName && this.addImage(n);
                var i = n.nodeType;
                if (i && (1 === i || 9 === i || 11 === i))
                    for (var r = n.querySelectorAll("img"), o = 0, s = r.length; o < s; o++) {
                        var f = r[o];
                        this.addImage(f)
                    }
            }
        }, s.prototype.addImage = function(e) {
            var t = new f(e);
            this.images.push(t)
        }, s.prototype.check = function() {
            function e(e, r) {
                return t.options.debug && u && h.log("confirm", e, r), t.progress(e), ++n === i && t.complete(), !0
            }
            var t = this,
                n = 0,
                i = this.images.length;
            if (this.hasAnyBroken = !1, i)
                for (var r = 0; r < i; r++) {
                    var o = this.images[r];
                    o.on("confirm", e), o.check()
                } else this.complete()
        }, s.prototype.progress = function(e) {
            this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
            var t = this;
            setTimeout(function() {
                t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
            })
        }, s.prototype.complete = function() {
            var e = this.hasAnyBroken ? "fail" : "done";
            this.isComplete = !0;
            var t = this;
            setTimeout(function() {
                if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
                    var n = t.hasAnyBroken ? "reject" : "resolve";
                    t.jqDeferred[n](t)
                }
            })
        }, a && (a.fn.imagesLoaded = function(e, t) {
            return new s(this, e, t).jqDeferred.promise(a(this))
        }), f.prototype = new t, f.prototype.check = function() {
            var e = v[this.img.src] || new c(this.img.src);
            if (e.isConfirmed) this.confirm(e.isLoaded, "cached was confirmed");
            else if (this.img.complete && void 0 !== this.img.naturalWidth) this.confirm(0 !== this.img.naturalWidth, "naturalWidth");
            else {
                var t = this;
                e.on("confirm", function(e, n) {
                    return t.confirm(e.isLoaded, n), !0
                }), e.check()
            }
        }, f.prototype.confirm = function(e, t) {
            this.isLoaded = e, this.emit("confirm", this, t)
        };
        var v = {};
        return c.prototype = new t, c.prototype.check = function() {
            if (!this.isChecked) {
                var e = new Image;
                n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
            }
        }, c.prototype.handleEvent = function(e) {
            var t = "on" + e.type;
            this[t] && this[t](e)
        }, c.prototype.onload = function(e) {
            this.confirm(!0, "onload"), this.unbindProxyEvents(e)
        }, c.prototype.onerror = function(e) {
            this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
        }, c.prototype.confirm = function(e, t) {
            this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
        }, c.prototype.unbindProxyEvents = function(e) {
            n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
        }, s
    });

// ===== jQuery Isotope
/*!
 * Isotope PACKAGED v3.0.1
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2016 Metafizzy
 */

! function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery-bridget", ["jquery"], function(i) {
        e(t, i)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("jquery")) : t.jQueryBridget = e(t, t.jQuery)
}(window, function(t, e) {
    "use strict";

    function i(i, r, a) {
        function h(t, e, n) {
            var o, r = "$()." + i + '("' + e + '")';
            return t.each(function(t, h) {
                var l = a.data(h, i);
                if (l) {
                    var u = l[e];
                    if (u && "_" != e.charAt(0)) {
                        var d = u.apply(l, n);
                        o = void 0 === o ? d : o
                    } else s(r + " is not a valid method")
                } else s(i + " not initialized. Cannot call methods, i.e. " + r)
            }), void 0 !== o ? o : t
        }

        function l(t, e) {
            t.each(function(t, n) {
                var o = a.data(n, i);
                o ? (o.option(e), o._init()) : (o = new r(n, e), a.data(n, i, o))
            })
        }(a = a || e || t.jQuery) && (r.prototype.option || (r.prototype.option = function(t) {
            a.isPlainObject(t) && (this.options = a.extend(!0, this.options, t))
        }), a.fn[i] = function(t) {
            return "string" == typeof t ? h(this, t, o.call(arguments, 1)) : (l(this, t), this)
        }, n(a))
    }

    function n(t) {
        !t || t && t.bridget || (t.bridget = i)
    }
    var o = Array.prototype.slice,
        r = t.console,
        s = void 0 === r ? function() {} : function(t) {
            r.error(t)
        };
    return n(e || t.jQuery), i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", e) : "object" == typeof module && module.exports ? module.exports = e() : t.EvEmitter = e()
}("undefined" != typeof window ? window : this, function() {
    function t() {}
    var e = t.prototype;
    return e.on = function(t, e) {
        if (t && e) {
            var i = this._events = this._events || {},
                n = i[t] = i[t] || [];
            return -1 == n.indexOf(e) && n.push(e), this
        }
    }, e.once = function(t, e) {
        if (t && e) {
            this.on(t, e);
            var i = this._onceEvents = this._onceEvents || {};
            return (i[t] = i[t] || {})[e] = !0, this
        }
    }, e.off = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            var n = i.indexOf(e);
            return -1 != n && i.splice(n, 1), this
        }
    }, e.emitEvent = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            var n = 0,
                o = i[n];
            e = e || [];
            for (var r = this._onceEvents && this._onceEvents[t]; o;) {
                var s = r && r[o];
                s && (this.off(t, o), delete r[o]), o.apply(this, e), o = i[n += s ? 0 : 1]
            }
            return this
        }
    }, t
}),
function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("get-size/get-size", [], function() {
        return e()
    }) : "object" == typeof module && module.exports ? module.exports = e() : t.getSize = e()
}(window, function() {
    "use strict";

    function t(t) {
        var e = parseFloat(t);
        return -1 == t.indexOf("%") && !isNaN(e) && e
    }

    function e() {}

    function i() {
        for (var t = {
                width: 0,
                height: 0,
                innerWidth: 0,
                innerHeight: 0,
                outerWidth: 0,
                outerHeight: 0
            }, e = 0; l > e; e++) t[h[e]] = 0;
        return t
    }

    function n(t) {
        var e = getComputedStyle(t);
        return e || a("Style returned " + e + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), e
    }

    function o() {
        if (!u) {
            u = !0;
            var e = document.createElement("div");
            e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style.boxSizing = "border-box";
            var i = document.body || document.documentElement;
            i.appendChild(e);
            var o = n(e);
            r.isBoxSizeOuter = s = 200 == t(o.width), i.removeChild(e)
        }
    }

    function r(e) {
        if (o(), "string" == typeof e && (e = document.querySelector(e)), e && "object" == typeof e && e.nodeType) {
            var r = n(e);
            if ("none" == r.display) return i();
            var a = {};
            a.width = e.offsetWidth, a.height = e.offsetHeight;
            for (var u = a.isBorderBox = "border-box" == r.boxSizing, d = 0; l > d; d++) {
                var c = h[d],
                    f = r[c],
                    p = parseFloat(f);
                a[c] = isNaN(p) ? 0 : p
            }
            var m = a.paddingLeft + a.paddingRight,
                g = a.paddingTop + a.paddingBottom,
                y = a.marginLeft + a.marginRight,
                v = a.marginTop + a.marginBottom,
                x = a.borderLeftWidth + a.borderRightWidth,
                b = a.borderTopWidth + a.borderBottomWidth,
                w = u && s,
                _ = t(r.width);
            !1 !== _ && (a.width = _ + (w ? 0 : m + x));
            var I = t(r.height);
            return !1 !== I && (a.height = I + (w ? 0 : g + b)), a.innerWidth = a.width - (m + x), a.innerHeight = a.height - (g + b), a.outerWidth = a.width + y, a.outerHeight = a.height + v, a
        }
    }
    var s, a = "undefined" == typeof console ? e : function(t) {
            console.error(t)
        },
        h = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
        l = h.length,
        u = !1;
    return r
}),
function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("desandro-matches-selector/matches-selector", e) : "object" == typeof module && module.exports ? module.exports = e() : t.matchesSelector = e()
}(window, function() {
    "use strict";
    var t = function() {
        var t = Element.prototype;
        if (t.matches) return "matches";
        if (t.matchesSelector) return "matchesSelector";
        for (var e = ["webkit", "moz", "ms", "o"], i = 0; i < e.length; i++) {
            var n = e[i] + "MatchesSelector";
            if (t[n]) return n
        }
    }();
    return function(e, i) {
        return e[t](i)
    }
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function(i) {
        return e(t, i)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.matchesSelector)
}(window, function(t, e) {
    var i = {};
    i.extend = function(t, e) {
        for (var i in e) t[i] = e[i];
        return t
    }, i.modulo = function(t, e) {
        return (t % e + e) % e
    }, i.makeArray = function(t) {
        var e = [];
        if (Array.isArray(t)) e = t;
        else if (t && "number" == typeof t.length)
            for (var i = 0; i < t.length; i++) e.push(t[i]);
        else e.push(t);
        return e
    }, i.removeFrom = function(t, e) {
        var i = t.indexOf(e); - 1 != i && t.splice(i, 1)
    }, i.getParent = function(t, i) {
        for (; t != document.body;)
            if (t = t.parentNode, e(t, i)) return t
    }, i.getQueryElement = function(t) {
        return "string" == typeof t ? document.querySelector(t) : t
    }, i.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t)
    }, i.filterFindElements = function(t, n) {
        var o = [];
        return (t = i.makeArray(t)).forEach(function(t) {
            if (t instanceof HTMLElement) {
                if (!n) return void o.push(t);
                e(t, n) && o.push(t);
                for (var i = t.querySelectorAll(n), r = 0; r < i.length; r++) o.push(i[r])
            }
        }), o
    }, i.debounceMethod = function(t, e, i) {
        var n = t.prototype[e],
            o = e + "Timeout";
        t.prototype[e] = function() {
            var t = this[o];
            t && clearTimeout(t);
            var e = arguments,
                r = this;
            this[o] = setTimeout(function() {
                n.apply(r, e), delete r[o]
            }, i || 100)
        }
    }, i.docReady = function(t) {
        var e = document.readyState;
        "complete" == e || "interactive" == e ? t() : document.addEventListener("DOMContentLoaded", t)
    }, i.toDashed = function(t) {
        return t.replace(/(.)([A-Z])/g, function(t, e, i) {
            return e + "-" + i
        }).toLowerCase()
    };
    var n = t.console;
    return i.htmlInit = function(e, o) {
        i.docReady(function() {
            var r = i.toDashed(o),
                s = "data-" + r,
                a = document.querySelectorAll("[" + s + "]"),
                h = document.querySelectorAll(".js-" + r),
                l = i.makeArray(a).concat(i.makeArray(h)),
                u = s + "-options",
                d = t.jQuery;
            l.forEach(function(t) {
                var i, r = t.getAttribute(s) || t.getAttribute(u);
                try {
                    i = r && JSON.parse(r)
                } catch (e) {
                    return void(n && n.error("Error parsing " + s + " on " + t.className + ": " + e))
                }
                var a = new e(t, i);
                d && d.data(t, o, a)
            })
        })
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("outlayer/item", ["ev-emitter/ev-emitter", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("ev-emitter"), require("get-size")) : (t.Outlayer = {}, t.Outlayer.Item = e(t.EvEmitter, t.getSize))
}(window, function(t, e) {
    "use strict";

    function i(t) {
        for (var e in t) return !1;
        return null, !0
    }

    function n(t, e) {
        t && (this.element = t, this.layout = e, this.position = {
            x: 0,
            y: 0
        }, this._create())
    }
    var o = document.documentElement.style,
        r = "string" == typeof o.transition ? "transition" : "WebkitTransition",
        s = "string" == typeof o.transform ? "transform" : "WebkitTransform",
        a = {
            WebkitTransition: "webkitTransitionEnd",
            transition: "transitionend"
        }[r],
        h = {
            transform: s,
            transition: r,
            transitionDuration: r + "Duration",
            transitionProperty: r + "Property",
            transitionDelay: r + "Delay"
        },
        l = n.prototype = Object.create(t.prototype);
    l.constructor = n, l._create = function() {
        this._transn = {
            ingProperties: {},
            clean: {},
            onEnd: {}
        }, this.css({
            position: "absolute"
        })
    }, l.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t)
    }, l.getSize = function() {
        this.size = e(this.element)
    }, l.css = function(t) {
        var e = this.element.style;
        for (var i in t) e[h[i] || i] = t[i]
    }, l.getPosition = function() {
        var t = getComputedStyle(this.element),
            e = this.layout._getOption("originLeft"),
            i = this.layout._getOption("originTop"),
            n = t[e ? "left" : "right"],
            o = t[i ? "top" : "bottom"],
            r = this.layout.size,
            s = -1 != n.indexOf("%") ? parseFloat(n) / 100 * r.width : parseInt(n, 10),
            a = -1 != o.indexOf("%") ? parseFloat(o) / 100 * r.height : parseInt(o, 10);
        s = isNaN(s) ? 0 : s, a = isNaN(a) ? 0 : a, s -= e ? r.paddingLeft : r.paddingRight, a -= i ? r.paddingTop : r.paddingBottom, this.position.x = s, this.position.y = a
    }, l.layoutPosition = function() {
        var t = this.layout.size,
            e = {},
            i = this.layout._getOption("originLeft"),
            n = this.layout._getOption("originTop"),
            o = i ? "paddingLeft" : "paddingRight",
            r = i ? "left" : "right",
            s = i ? "right" : "left",
            a = this.position.x + t[o];
        e[r] = this.getXValue(a), e[s] = "";
        var h = n ? "paddingTop" : "paddingBottom",
            l = n ? "top" : "bottom",
            u = n ? "bottom" : "top",
            d = this.position.y + t[h];
        e[l] = this.getYValue(d), e[u] = "", this.css(e), this.emitEvent("layout", [this])
    }, l.getXValue = function(t) {
        var e = this.layout._getOption("horizontal");
        return this.layout.options.percentPosition && !e ? t / this.layout.size.width * 100 + "%" : t + "px"
    }, l.getYValue = function(t) {
        var e = this.layout._getOption("horizontal");
        return this.layout.options.percentPosition && e ? t / this.layout.size.height * 100 + "%" : t + "px"
    }, l._transitionTo = function(t, e) {
        this.getPosition();
        var i = this.position.x,
            n = this.position.y,
            o = parseInt(t, 10),
            r = parseInt(e, 10),
            s = o === this.position.x && r === this.position.y;
        if (this.setPosition(t, e), !s || this.isTransitioning) {
            var a = t - i,
                h = e - n,
                l = {};
            l.transform = this.getTranslate(a, h), this.transition({
                to: l,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        } else this.layoutPosition()
    }, l.getTranslate = function(t, e) {
        var i = this.layout._getOption("originLeft"),
            n = this.layout._getOption("originTop");
        return t = i ? t : -t, e = n ? e : -e, "translate3d(" + t + "px, " + e + "px, 0)"
    }, l.goTo = function(t, e) {
        this.setPosition(t, e), this.layoutPosition()
    }, l.moveTo = l._transitionTo, l.setPosition = function(t, e) {
        this.position.x = parseInt(t, 10), this.position.y = parseInt(e, 10)
    }, l._nonTransition = function(t) {
        this.css(t.to), t.isCleaning && this._removeStyles(t.to);
        for (var e in t.onTransitionEnd) t.onTransitionEnd[e].call(this)
    }, l.transition = function(t) {
        if (parseFloat(this.layout.options.transitionDuration)) {
            var e = this._transn;
            for (var i in t.onTransitionEnd) e.onEnd[i] = t.onTransitionEnd[i];
            for (i in t.to) e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
            if (t.from) {
                this.css(t.from);
                this.element.offsetHeight;
                null
            }
            this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
        } else this._nonTransition(t)
    };
    var u = "opacity," + function(t) {
        return t.replace(/([A-Z])/g, function(t) {
            return "-" + t.toLowerCase()
        })
    }(s);
    l.enableTransition = function() {
        if (!this.isTransitioning) {
            var t = this.layout.options.transitionDuration;
            t = "number" == typeof t ? t + "ms" : t, this.css({
                transitionProperty: u,
                transitionDuration: t,
                transitionDelay: this.staggerDelay || 0
            }), this.element.addEventListener(a, this, !1)
        }
    }, l.onwebkitTransitionEnd = function(t) {
        this.ontransitionend(t)
    }, l.onotransitionend = function(t) {
        this.ontransitionend(t)
    };
    var d = {
        "-webkit-transform": "transform"
    };
    l.ontransitionend = function(t) {
        if (t.target === this.element) {
            var e = this._transn,
                n = d[t.propertyName] || t.propertyName;
            delete e.ingProperties[n], i(e.ingProperties) && this.disableTransition(), n in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[n]), n in e.onEnd && (e.onEnd[n].call(this), delete e.onEnd[n]), this.emitEvent("transitionEnd", [this])
        }
    }, l.disableTransition = function() {
        this.removeTransitionStyles(), this.element.removeEventListener(a, this, !1), this.isTransitioning = !1
    }, l._removeStyles = function(t) {
        var e = {};
        for (var i in t) e[i] = "";
        this.css(e)
    };
    var c = {
        transitionProperty: "",
        transitionDuration: "",
        transitionDelay: ""
    };
    return l.removeTransitionStyles = function() {
        this.css(c)
    }, l.stagger = function(t) {
        t = isNaN(t) ? 0 : t, this.staggerDelay = t + "ms"
    }, l.removeElem = function() {
        this.element.parentNode.removeChild(this.element), this.css({
            display: ""
        }), this.emitEvent("remove", [this])
    }, l.remove = function() {
        return r && parseFloat(this.layout.options.transitionDuration) ? (this.once("transitionEnd", function() {
            this.removeElem()
        }), void this.hide()) : void this.removeElem()
    }, l.reveal = function() {
        delete this.isHidden, this.css({
            display: ""
        });
        var t = this.layout.options,
            e = {};
        e[this.getHideRevealTransitionEndProperty("visibleStyle")] = this.onRevealTransitionEnd, this.transition({
            from: t.hiddenStyle,
            to: t.visibleStyle,
            isCleaning: !0,
            onTransitionEnd: e
        })
    }, l.onRevealTransitionEnd = function() {
        this.isHidden || this.emitEvent("reveal")
    }, l.getHideRevealTransitionEndProperty = function(t) {
        var e = this.layout.options[t];
        if (e.opacity) return "opacity";
        for (var i in e) return i
    }, l.hide = function() {
        this.isHidden = !0, this.css({
            display: ""
        });
        var t = this.layout.options,
            e = {};
        e[this.getHideRevealTransitionEndProperty("hiddenStyle")] = this.onHideTransitionEnd, this.transition({
            from: t.visibleStyle,
            to: t.hiddenStyle,
            isCleaning: !0,
            onTransitionEnd: e
        })
    }, l.onHideTransitionEnd = function() {
        this.isHidden && (this.css({
            display: "none"
        }), this.emitEvent("hide"))
    }, l.destroy = function() {
        this.css({
            position: "",
            left: "",
            right: "",
            top: "",
            bottom: "",
            transition: "",
            transform: ""
        })
    }, n
}),
function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("outlayer/outlayer", ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(i, n, o, r) {
        return e(t, i, n, o, r)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("ev-emitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.EvEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
}(window, function(t, e, i, n, o) {
    "use strict";

    function r(t, e) {
        var i = n.getQueryElement(t);
        if (i) {
            this.element = i, l && (this.$element = l(this.element)), this.options = n.extend({}, this.constructor.defaults), this.option(e);
            var o = ++d;
            this.element.outlayerGUID = o, c[o] = this, this._create(), this._getOption("initLayout") && this.layout()
        } else h && h.error("Bad element for " + this.constructor.namespace + ": " + (i || t))
    }

    function s(t) {
        function e() {
            t.apply(this, arguments)
        }
        return e.prototype = Object.create(t.prototype), e.prototype.constructor = e, e
    }

    function a(t) {
        if ("number" == typeof t) return t;
        var e = t.match(/(^\d*\.?\d*)(\w*)/),
            i = e && e[1],
            n = e && e[2];
        return i.length ? (i = parseFloat(i)) * (p[n] || 1) : 0
    }
    var h = t.console,
        l = t.jQuery,
        u = function() {},
        d = 0,
        c = {};
    r.namespace = "outlayer", r.Item = o, r.defaults = {
        containerStyle: {
            position: "relative"
        },
        initLayout: !0,
        originLeft: !0,
        originTop: !0,
        resize: !0,
        resizeContainer: !0,
        transitionDuration: "0.4s",
        hiddenStyle: {
            opacity: 0,
            transform: "scale(0.001)"
        },
        visibleStyle: {
            opacity: 1,
            transform: "scale(1)"
        }
    };
    var f = r.prototype;
    n.extend(f, e.prototype), f.option = function(t) {
        n.extend(this.options, t)
    }, f._getOption = function(t) {
        var e = this.constructor.compatOptions[t];
        return e && void 0 !== this.options[e] ? this.options[e] : this.options[t]
    }, r.compatOptions = {
        initLayout: "isInitLayout",
        horizontal: "isHorizontal",
        layoutInstant: "isLayoutInstant",
        originLeft: "isOriginLeft",
        originTop: "isOriginTop",
        resize: "isResizeBound",
        resizeContainer: "isResizingContainer"
    }, f._create = function() {
        this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), n.extend(this.element.style, this.options.containerStyle), this._getOption("resize") && this.bindResize()
    }, f.reloadItems = function() {
        this.items = this._itemize(this.element.children)
    }, f._itemize = function(t) {
        for (var e = this._filterFindItemElements(t), i = this.constructor.Item, n = [], o = 0; o < e.length; o++) {
            var r = new i(e[o], this);
            n.push(r)
        }
        return n
    }, f._filterFindItemElements = function(t) {
        return n.filterFindElements(t, this.options.itemSelector)
    }, f.getItemElements = function() {
        return this.items.map(function(t) {
            return t.element
        })
    }, f.layout = function() {
        this._resetLayout(), this._manageStamps();
        var t = this._getOption("layoutInstant"),
            e = void 0 !== t ? t : !this._isLayoutInited;
        this.layoutItems(this.items, e), this._isLayoutInited = !0
    }, f._init = f.layout, f._resetLayout = function() {
        this.getSize()
    }, f.getSize = function() {
        this.size = i(this.element)
    }, f._getMeasurement = function(t, e) {
        var n, o = this.options[t];
        o ? ("string" == typeof o ? n = this.element.querySelector(o) : o instanceof HTMLElement && (n = o), this[t] = n ? i(n)[e] : o) : this[t] = 0
    }, f.layoutItems = function(t, e) {
        t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
    }, f._getItemsForLayout = function(t) {
        return t.filter(function(t) {
            return !t.isIgnored
        })
    }, f._layoutItems = function(t, e) {
        if (this._emitCompleteOnItems("layout", t), t && t.length) {
            var i = [];
            t.forEach(function(t) {
                var n = this._getItemLayoutPosition(t);
                n.item = t, n.isInstant = e || t.isLayoutInstant, i.push(n)
            }, this), this._processLayoutQueue(i)
        }
    }, f._getItemLayoutPosition = function() {
        return {
            x: 0,
            y: 0
        }
    }, f._processLayoutQueue = function(t) {
        this.updateStagger(), t.forEach(function(t, e) {
            this._positionItem(t.item, t.x, t.y, t.isInstant, e)
        }, this)
    }, f.updateStagger = function() {
        var t = this.options.stagger;
        return null === t || void 0 === t ? void(this.stagger = 0) : (this.stagger = a(t), this.stagger)
    }, f._positionItem = function(t, e, i, n, o) {
        n ? t.goTo(e, i) : (t.stagger(o * this.stagger), t.moveTo(e, i))
    }, f._postLayout = function() {
        this.resizeContainer()
    }, f.resizeContainer = function() {
        if (this._getOption("resizeContainer")) {
            var t = this._getContainerSize();
            t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
        }
    }, f._getContainerSize = u, f._setContainerMeasure = function(t, e) {
        if (void 0 !== t) {
            var i = this.size;
            i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
        }
    }, f._emitCompleteOnItems = function(t, e) {
        function i() {
            o.dispatchEvent(t + "Complete", null, [e])
        }

        function n() {
            ++s == r && i()
        }
        var o = this,
            r = e.length;
        if (e && r) {
            var s = 0;
            e.forEach(function(e) {
                e.once(t, n)
            })
        } else i()
    }, f.dispatchEvent = function(t, e, i) {
        var n = e ? [e].concat(i) : i;
        if (this.emitEvent(t, n), l)
            if (this.$element = this.$element || l(this.element), e) {
                var o = l.Event(e);
                o.type = t, this.$element.trigger(o, i)
            } else this.$element.trigger(t, i)
    }, f.ignore = function(t) {
        var e = this.getItem(t);
        e && (e.isIgnored = !0)
    }, f.unignore = function(t) {
        var e = this.getItem(t);
        e && delete e.isIgnored
    }, f.stamp = function(t) {
        (t = this._find(t)) && (this.stamps = this.stamps.concat(t), t.forEach(this.ignore, this))
    }, f.unstamp = function(t) {
        (t = this._find(t)) && t.forEach(function(t) {
            n.removeFrom(this.stamps, t), this.unignore(t)
        }, this)
    }, f._find = function(t) {
        return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = n.makeArray(t)) : void 0
    }, f._manageStamps = function() {
        this.stamps && this.stamps.length && (this._getBoundingRect(), this.stamps.forEach(this._manageStamp, this))
    }, f._getBoundingRect = function() {
        var t = this.element.getBoundingClientRect(),
            e = this.size;
        this._boundingRect = {
            left: t.left + e.paddingLeft + e.borderLeftWidth,
            top: t.top + e.paddingTop + e.borderTopWidth,
            right: t.right - (e.paddingRight + e.borderRightWidth),
            bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
        }
    }, f._manageStamp = u, f._getElementOffset = function(t) {
        var e = t.getBoundingClientRect(),
            n = this._boundingRect,
            o = i(t);
        return {
            left: e.left - n.left - o.marginLeft,
            top: e.top - n.top - o.marginTop,
            right: n.right - e.right - o.marginRight,
            bottom: n.bottom - e.bottom - o.marginBottom
        }
    }, f.handleEvent = n.handleEvent, f.bindResize = function() {
        t.addEventListener("resize", this), this.isResizeBound = !0
    }, f.unbindResize = function() {
        t.removeEventListener("resize", this), this.isResizeBound = !1
    }, f.onresize = function() {
        this.resize()
    }, n.debounceMethod(r, "onresize", 100), f.resize = function() {
        this.isResizeBound && this.needsResizeLayout() && this.layout()
    }, f.needsResizeLayout = function() {
        var t = i(this.element);
        return this.size && t && t.innerWidth !== this.size.innerWidth
    }, f.addItems = function(t) {
        var e = this._itemize(t);
        return e.length && (this.items = this.items.concat(e)), e
    }, f.appended = function(t) {
        var e = this.addItems(t);
        e.length && (this.layoutItems(e, !0), this.reveal(e))
    }, f.prepended = function(t) {
        var e = this._itemize(t);
        if (e.length) {
            var i = this.items.slice(0);
            this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
        }
    }, f.reveal = function(t) {
        if (this._emitCompleteOnItems("reveal", t), t && t.length) {
            var e = this.updateStagger();
            t.forEach(function(t, i) {
                t.stagger(i * e), t.reveal()
            })
        }
    }, f.hide = function(t) {
        if (this._emitCompleteOnItems("hide", t), t && t.length) {
            var e = this.updateStagger();
            t.forEach(function(t, i) {
                t.stagger(i * e), t.hide()
            })
        }
    }, f.revealItemElements = function(t) {
        var e = this.getItems(t);
        this.reveal(e)
    }, f.hideItemElements = function(t) {
        var e = this.getItems(t);
        this.hide(e)
    }, f.getItem = function(t) {
        for (var e = 0; e < this.items.length; e++) {
            var i = this.items[e];
            if (i.element == t) return i
        }
    }, f.getItems = function(t) {
        var e = [];
        return (t = n.makeArray(t)).forEach(function(t) {
            var i = this.getItem(t);
            i && e.push(i)
        }, this), e
    }, f.remove = function(t) {
        var e = this.getItems(t);
        this._emitCompleteOnItems("remove", e), e && e.length && e.forEach(function(t) {
            t.remove(), n.removeFrom(this.items, t)
        }, this)
    }, f.destroy = function() {
        var t = this.element.style;
        t.height = "", t.position = "", t.width = "", this.items.forEach(function(t) {
            t.destroy()
        }), this.unbindResize();
        var e = this.element.outlayerGUID;
        delete c[e], delete this.element.outlayerGUID, l && l.removeData(this.element, this.constructor.namespace)
    }, r.data = function(t) {
        var e = (t = n.getQueryElement(t)) && t.outlayerGUID;
        return e && c[e]
    }, r.create = function(t, e) {
        var i = s(r);
        return i.defaults = n.extend({}, r.defaults), n.extend(i.defaults, e), i.compatOptions = n.extend({}, r.compatOptions), i.namespace = t, i.data = r.data, i.Item = s(o), n.htmlInit(i, t), l && l.bridget && l.bridget(t, i), i
    };
    var p = {
        ms: 1,
        s: 1e3
    };
    return r.Item = o, r
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.Item = e(t.Outlayer))
}(window, function(t) {
    "use strict";

    function e() {
        t.Item.apply(this, arguments)
    }
    var i = e.prototype = Object.create(t.Item.prototype),
        n = i._create;
    i._create = function() {
        this.id = this.layout.itemGUID++, n.call(this), this.sortData = {}
    }, i.updateSortData = function() {
        if (!this.isIgnored) {
            this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
            var t = this.layout.options.getSortData,
                e = this.layout._sorters;
            for (var i in t) {
                var n = e[i];
                this.sortData[i] = n(this.element, this)
            }
        }
    };
    var o = i.destroy;
    return i.destroy = function() {
        o.apply(this, arguments), this.css({
            display: ""
        })
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("get-size"), require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.LayoutMode = e(t.getSize, t.Outlayer))
}(window, function(t, e) {
    "use strict";

    function i(t) {
        this.isotope = t, t && (this.options = t.options[this.namespace], this.element = t.element, this.items = t.filteredItems, this.size = t.size)
    }
    var n = i.prototype;
    return ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout", "_getOption"].forEach(function(t) {
        n[t] = function() {
            return e.prototype[t].apply(this.isotope, arguments)
        }
    }), n.needsVerticalResizeLayout = function() {
        var e = t(this.isotope.element);
        return this.isotope.size && e && e.innerHeight != this.isotope.size.innerHeight
    }, n._getMeasurement = function() {
        this.isotope._getMeasurement.apply(this, arguments)
    }, n.getColumnWidth = function() {
        this.getSegmentSize("column", "Width")
    }, n.getRowHeight = function() {
        this.getSegmentSize("row", "Height")
    }, n.getSegmentSize = function(t, e) {
        var i = t + e,
            n = "outer" + e;
        if (this._getMeasurement(i, n), !this[i]) {
            var o = this.getFirstItemSize();
            this[i] = o && o[n] || this.isotope.size["inner" + e]
        }
    }, n.getFirstItemSize = function() {
        var e = this.isotope.filteredItems[0];
        return e && e.element && t(e.element)
    }, n.layout = function() {
        this.isotope.layout.apply(this.isotope, arguments)
    }, n.getSize = function() {
        this.isotope.getSize(), this.size = this.isotope.size
    }, i.modes = {}, i.create = function(t, e) {
        function o() {
            i.apply(this, arguments)
        }
        return o.prototype = Object.create(n), o.prototype.constructor = o, e && (o.options = e), o.prototype.namespace = t, i.modes[t] = o, o
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer"), require("get-size")) : t.Masonry = e(t.Outlayer, t.getSize)
}(window, function(t, e) {
    var i = t.create("masonry");
    return i.compatOptions.fitWidth = "isFitWidth", i.prototype._resetLayout = function() {
        this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns(), this.colYs = [];
        for (var t = 0; t < this.cols; t++) this.colYs.push(0);
        this.maxY = 0
    }, i.prototype.measureColumns = function() {
        if (this.getContainerWidth(), !this.columnWidth) {
            var t = this.items[0],
                i = t && t.element;
            this.columnWidth = i && e(i).outerWidth || this.containerWidth
        }
        var n = this.columnWidth += this.gutter,
            o = this.containerWidth + this.gutter,
            r = o / n,
            s = n - o % n,
            a = s && 1 > s ? "round" : "floor";
        r = Math[a](r), this.cols = Math.max(r, 1)
    }, i.prototype.getContainerWidth = function() {
        var t = this._getOption("fitWidth") ? this.element.parentNode : this.element,
            i = e(t);
        this.containerWidth = i && i.innerWidth
    }, i.prototype._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = t.size.outerWidth % this.columnWidth,
            i = e && 1 > e ? "round" : "ceil",
            n = Math[i](t.size.outerWidth / this.columnWidth);
        n = Math.min(n, this.cols);
        for (var o = this._getColGroup(n), r = Math.min.apply(Math, o), s = o.indexOf(r), a = {
                x: this.columnWidth * s,
                y: r
            }, h = r + t.size.outerHeight, l = this.cols + 1 - o.length, u = 0; l > u; u++) this.colYs[s + u] = h;
        return a
    }, i.prototype._getColGroup = function(t) {
        if (2 > t) return this.colYs;
        for (var e = [], i = this.cols + 1 - t, n = 0; i > n; n++) {
            var o = this.colYs.slice(n, n + t);
            e[n] = Math.max.apply(Math, o)
        }
        return e
    }, i.prototype._manageStamp = function(t) {
        var i = e(t),
            n = this._getElementOffset(t),
            o = this._getOption("originLeft") ? n.left : n.right,
            r = o + i.outerWidth,
            s = Math.floor(o / this.columnWidth);
        s = Math.max(0, s);
        var a = Math.floor(r / this.columnWidth);
        a -= r % this.columnWidth ? 0 : 1, a = Math.min(this.cols - 1, a);
        for (var h = (this._getOption("originTop") ? n.top : n.bottom) + i.outerHeight, l = s; a >= l; l++) this.colYs[l] = Math.max(h, this.colYs[l])
    }, i.prototype._getContainerSize = function() {
        this.maxY = Math.max.apply(Math, this.colYs);
        var t = {
            height: this.maxY
        };
        return this._getOption("fitWidth") && (t.width = this._getContainerFitWidth()), t
    }, i.prototype._getContainerFitWidth = function() {
        for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];) t++;
        return (this.cols - t) * this.columnWidth - this.gutter
    }, i.prototype.needsResizeLayout = function() {
        var t = this.containerWidth;
        return this.getContainerWidth(), t != this.containerWidth
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode"), require("masonry-layout")) : e(t.Isotope.LayoutMode, t.Masonry)
}(window, function(t, e) {
    "use strict";
    var i = t.create("masonry"),
        n = i.prototype,
        o = {
            _getElementOffset: !0,
            layout: !0,
            _getMeasurement: !0
        };
    for (var r in e.prototype) o[r] || (n[r] = e.prototype[r]);
    var s = n.measureColumns;
    n.measureColumns = function() {
        this.items = this.isotope.filteredItems, s.call(this)
    };
    var a = n._getOption;
    return n._getOption = function(t) {
        return "fitWidth" == t ? void 0 !== this.options.isFitWidth ? this.options.isFitWidth : this.options.fitWidth : a.apply(this.isotope, arguments)
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function(t) {
    "use strict";
    var e = t.create("fitRows"),
        i = e.prototype;
    return i._resetLayout = function() {
        this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
    }, i._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = t.size.outerWidth + this.gutter,
            i = this.isotope.size.innerWidth + this.gutter;
        0 !== this.x && e + this.x > i && (this.x = 0, this.y = this.maxY);
        var n = {
            x: this.x,
            y: this.y
        };
        return this.maxY = Math.max(this.maxY, this.y + t.size.outerHeight), this.x += e, n
    }, i._getContainerSize = function() {
        return {
            height: this.maxY
        }
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function(t) {
    "use strict";
    var e = t.create("vertical", {
            horizontalAlignment: 0
        }),
        i = e.prototype;
    return i._resetLayout = function() {
        this.y = 0
    }, i._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = (this.isotope.size.innerWidth - t.size.outerWidth) * this.options.horizontalAlignment,
            i = this.y;
        return this.y += t.size.outerHeight, {
            x: e,
            y: i
        }
    }, i._getContainerSize = function() {
        return {
            height: this.y
        }
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "desandro-matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], function(i, n, o, r, s, a) {
        return e(t, i, n, o, r, s, a)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("isotope/js/item"), require("isotope/js/layout-mode"), require("isotope/js/layout-modes/masonry"), require("isotope/js/layout-modes/fit-rows"), require("isotope/js/layout-modes/vertical")) : t.Isotope = e(t, t.Outlayer, t.getSize, t.matchesSelector, t.fizzyUIUtils, t.Isotope.Item, t.Isotope.LayoutMode)
}(window, function(t, e, i, n, o, r, s) {
    function a(t, e) {
        return function(i, n) {
            for (var o = 0; o < t.length; o++) {
                var r = t[o],
                    s = i.sortData[r],
                    a = n.sortData[r];
                if (s > a || a > s) {
                    var h = (void 0 !== e[r] ? e[r] : e) ? 1 : -1;
                    return (s > a ? 1 : -1) * h
                }
            }
            return 0
        }
    }
    var h = t.jQuery,
        l = String.prototype.trim ? function(t) {
            return t.trim()
        } : function(t) {
            return t.replace(/^\s+|\s+$/g, "")
        },
        u = e.create("isotope", {
            layoutMode: "masonry",
            isJQueryFiltering: !0,
            sortAscending: !0
        });
    u.Item = r, u.LayoutMode = s;
    var d = u.prototype;
    d._create = function() {
        this.itemGUID = 0, this._sorters = {}, this._getSorters(), e.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
        for (var t in s.modes) this._initLayoutMode(t)
    }, d.reloadItems = function() {
        this.itemGUID = 0, e.prototype.reloadItems.call(this)
    }, d._itemize = function() {
        for (var t = e.prototype._itemize.apply(this, arguments), i = 0; i < t.length; i++) t[i].id = this.itemGUID++;
        return this._updateItemsSortData(t), t
    }, d._initLayoutMode = function(t) {
        var e = s.modes[t],
            i = this.options[t] || {};
        this.options[t] = e.options ? o.extend(e.options, i) : i, this.modes[t] = new e(this)
    }, d.layout = function() {
        return !this._isLayoutInited && this._getOption("initLayout") ? void this.arrange() : void this._layout()
    }, d._layout = function() {
        var t = this._getIsInstant();
        this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, t), this._isLayoutInited = !0
    }, d.arrange = function(t) {
        this.option(t), this._getIsInstant();
        var e = this._filter(this.items);
        this.filteredItems = e.matches, this._bindArrangeComplete(), this._isInstant ? this._noTransition(this._hideReveal, [e]) : this._hideReveal(e), this._sort(), this._layout()
    }, d._init = d.arrange, d._hideReveal = function(t) {
        this.reveal(t.needReveal), this.hide(t.needHide)
    }, d._getIsInstant = function() {
        var t = this._getOption("layoutInstant"),
            e = void 0 !== t ? t : !this._isLayoutInited;
        return this._isInstant = e, e
    }, d._bindArrangeComplete = function() {
        function t() {
            e && i && n && o.dispatchEvent("arrangeComplete", null, [o.filteredItems])
        }
        var e, i, n, o = this;
        this.once("layoutComplete", function() {
            e = !0, t()
        }), this.once("hideComplete", function() {
            i = !0, t()
        }), this.once("revealComplete", function() {
            n = !0, t()
        })
    }, d._filter = function(t) {
        var e = this.options.filter;
        e = e || "*";
        for (var i = [], n = [], o = [], r = this._getFilterTest(e), s = 0; s < t.length; s++) {
            var a = t[s];
            if (!a.isIgnored) {
                var h = r(a);
                h && i.push(a), h && a.isHidden ? n.push(a) : h || a.isHidden || o.push(a)
            }
        }
        return {
            matches: i,
            needReveal: n,
            needHide: o
        }
    }, d._getFilterTest = function(t) {
        return h && this.options.isJQueryFiltering ? function(e) {
            return h(e.element).is(t)
        } : "function" == typeof t ? function(e) {
            return t(e.element)
        } : function(e) {
            return n(e.element, t)
        }
    }, d.updateSortData = function(t) {
        var e;
        t ? (t = o.makeArray(t), e = this.getItems(t)) : e = this.items, this._getSorters(), this._updateItemsSortData(e)
    }, d._getSorters = function() {
        var t = this.options.getSortData;
        for (var e in t) {
            var i = t[e];
            this._sorters[e] = c(i)
        }
    }, d._updateItemsSortData = function(t) {
        for (var e = t && t.length, i = 0; e && e > i; i++) t[i].updateSortData()
    };
    var c = function() {
        function t(t) {
            if ("string" != typeof t) return t;
            var i = l(t).split(" "),
                n = i[0],
                o = n.match(/^\[(.+)\]$/),
                r = e(o && o[1], n),
                s = u.sortDataParsers[i[1]];
            return t = s ? function(t) {
                return t && s(r(t))
            } : function(t) {
                return t && r(t)
            }
        }

        function e(t, e) {
            return t ? function(e) {
                return e.getAttribute(t)
            } : function(t) {
                var i = t.querySelector(e);
                return i && i.textContent
            }
        }
        return t
    }();
    u.sortDataParsers = {
        parseInt: function(t) {
            return parseInt(t, 10)
        },
        parseFloat: function(t) {
            return parseFloat(t)
        }
    }, d._sort = function() {
        var t = this.options.sortBy;
        if (t) {
            var e = a([].concat.apply(t, this.sortHistory), this.options.sortAscending);
            this.filteredItems.sort(e), t != this.sortHistory[0] && this.sortHistory.unshift(t)
        }
    }, d._mode = function() {
        var t = this.options.layoutMode,
            e = this.modes[t];
        if (!e) throw new Error("No layout mode: " + t);
        return e.options = this.options[t], e
    }, d._resetLayout = function() {
        e.prototype._resetLayout.call(this), this._mode()._resetLayout()
    }, d._getItemLayoutPosition = function(t) {
        return this._mode()._getItemLayoutPosition(t)
    }, d._manageStamp = function(t) {
        this._mode()._manageStamp(t)
    }, d._getContainerSize = function() {
        return this._mode()._getContainerSize()
    }, d.needsResizeLayout = function() {
        return this._mode().needsResizeLayout()
    }, d.appended = function(t) {
        var e = this.addItems(t);
        if (e.length) {
            var i = this._filterRevealAdded(e);
            this.filteredItems = this.filteredItems.concat(i)
        }
    }, d.prepended = function(t) {
        var e = this._itemize(t);
        if (e.length) {
            this._resetLayout(), this._manageStamps();
            var i = this._filterRevealAdded(e);
            this.layoutItems(this.filteredItems), this.filteredItems = i.concat(this.filteredItems), this.items = e.concat(this.items)
        }
    }, d._filterRevealAdded = function(t) {
        var e = this._filter(t);
        return this.hide(e.needHide), this.reveal(e.matches), this.layoutItems(e.matches, !0), e.matches
    }, d.insert = function(t) {
        var e = this.addItems(t);
        if (e.length) {
            var i, n, o = e.length;
            for (i = 0; o > i; i++) n = e[i], this.element.appendChild(n.element);
            var r = this._filter(e).matches;
            for (i = 0; o > i; i++) e[i].isLayoutInstant = !0;
            for (this.arrange(), i = 0; o > i; i++) delete e[i].isLayoutInstant;
            this.reveal(r)
        }
    };
    var f = d.remove;
    return d.remove = function(t) {
        t = o.makeArray(t);
        var e = this.getItems(t);
        f.call(this, t);
        for (var i = e && e.length, n = 0; i && i > n; n++) {
            var r = e[n];
            o.removeFrom(this.filteredItems, r)
        }
    }, d.shuffle = function() {
        for (var t = 0; t < this.items.length; t++) this.items[t].sortData.random = Math.random();
        this.options.sortBy = "random", this._sort(), this._layout()
    }, d._noTransition = function(t, e) {
        var i = this.options.transitionDuration;
        this.options.transitionDuration = 0;
        var n = t.apply(this, e);
        return this.options.transitionDuration = i, n
    }, d.getFilteredItemElements = function() {
        return this.filteredItems.map(function(t) {
            return t.element
        })
    }, u
}),
function(t, e, i, n) {
    var o = i("html"),
        r = i(t),
        s = i(e),
        a = i.fancybox = function() {
            a.open.apply(this, arguments)
        },
        h = navigator.userAgent.match(/msie/i),
        l = null,
        u = e.createTouch !== n,
        d = function(t) {
            return t && t.hasOwnProperty && t instanceof i
        },
        c = function(t) {
            return t && "string" === i.type(t)
        },
        f = function(t) {
            return c(t) && 0 < t.indexOf("%")
        },
        p = function(t, e) {
            var i = parseInt(t, 10) || 0;
            return e && f(t) && (i *= a.getViewport()[e] / 100), Math.ceil(i)
        },
        m = function(t, e) {
            return p(t, e) + "px"
        };
    i.extend(a, {
        version: "2.1.5",
        defaults: {
            padding: 15,
            margin: 20,
            width: 800,
            height: 600,
            minWidth: 100,
            minHeight: 100,
            maxWidth: 9999,
            maxHeight: 9999,
            pixelRatio: 1,
            autoSize: !0,
            autoHeight: !1,
            autoWidth: !1,
            autoResize: !0,
            autoCenter: !u,
            fitToView: !0,
            aspectRatio: !1,
            topRatio: .5,
            leftRatio: .5,
            scrolling: "auto",
            wrapCSS: "",
            arrows: !0,
            closeBtn: !0,
            closeClick: !1,
            nextClick: !1,
            mouseWheel: !0,
            autoPlay: !1,
            playSpeed: 3e3,
            preload: 3,
            modal: !1,
            loop: !0,
            ajax: {
                dataType: "html",
                headers: {
                    "X-fancyBox": !0
                }
            },
            iframe: {
                scrolling: "auto",
                preload: !0
            },
            swf: {
                wmode: "transparent",
                allowfullscreen: "true",
                allowscriptaccess: "always"
            },
            keys: {
                next: {
                    13: "left",
                    34: "up",
                    39: "left",
                    40: "up"
                },
                prev: {
                    8: "right",
                    33: "down",
                    37: "right",
                    38: "down"
                },
                close: [27],
                play: [32],
                toggle: [70]
            },
            direction: {
                next: "left",
                prev: "right"
            },
            scrollOutside: !0,
            index: 0,
            type: null,
            href: null,
            content: null,
            title: null,
            tpl: {
                wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image: '<img class="fancybox-image" src="{href}" alt="" />',
                iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (h ? ' allowtransparency="true"' : "") + "></iframe>",
                error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
            },
            openEffect: "fade",
            openSpeed: 250,
            openEasing: "swing",
            openOpacity: !0,
            openMethod: "zoomIn",
            closeEffect: "fade",
            closeSpeed: 250,
            closeEasing: "swing",
            closeOpacity: !0,
            closeMethod: "zoomOut",
            nextEffect: "elastic",
            nextSpeed: 250,
            nextEasing: "swing",
            nextMethod: "changeIn",
            prevEffect: "elastic",
            prevSpeed: 250,
            prevEasing: "swing",
            prevMethod: "changeOut",
            helpers: {
                overlay: !0,
                title: !0
            },
            onCancel: i.noop,
            beforeLoad: i.noop,
            afterLoad: i.noop,
            beforeShow: i.noop,
            afterShow: i.noop,
            beforeChange: i.noop,
            beforeClose: i.noop,
            afterClose: i.noop
        },
        group: {},
        opts: {},
        previous: null,
        coming: null,
        current: null,
        isActive: !1,
        isOpen: !1,
        isOpened: !1,
        wrap: null,
        skin: null,
        outer: null,
        inner: null,
        player: {
            timer: null,
            isActive: !1
        },
        ajaxLoad: null,
        imgPreload: null,
        transitions: {},
        helpers: {},
        open: function(t, e) {
            if (t && (i.isPlainObject(e) || (e = {}), !1 !== a.close(!0))) return i.isArray(t) || (t = d(t) ? i(t).get() : [t]), i.each(t, function(o, r) {
                var s, h, l, u, f, p = {};
                "object" === i.type(r) && (r.nodeType && (r = i(r)), d(r) ? (p = {
                    href: r.data("fancybox-href") || r.attr("href"),
                    title: r.data("fancybox-title") || r.attr("title"),
                    isDom: !0,
                    element: r
                }, i.metadata && i.extend(!0, p, r.metadata())) : p = r), s = e.href || p.href || (c(r) ? r : null), h = e.title !== n ? e.title : p.title || "", !(u = (l = e.content || p.content) ? "html" : e.type || p.type) && p.isDom && ((u = r.data("fancybox-type")) || (u = (u = r.prop("class").match(/fancybox\.(\w+)/)) ? u[1] : null)), c(s) && (u || (a.isImage(s) ? u = "image" : a.isSWF(s) ? u = "swf" : "#" === s.charAt(0) ? u = "inline" : c(r) && (u = "html", l = r)), "ajax" === u && (f = s.split(/\s+/, 2), s = f.shift(), f = f.shift())), l || ("inline" === u ? s ? l = i(c(s) ? s.replace(/.*(?=#[^\s]+$)/, "") : s) : p.isDom && (l = r) : "html" === u ? l = s : !u && !s && p.isDom && (u = "inline", l = r)), i.extend(p, {
                    href: s,
                    type: u,
                    content: l,
                    title: h,
                    selector: f
                }), t[o] = p
            }), a.opts = i.extend(!0, {}, a.defaults, e), e.keys !== n && (a.opts.keys = !!e.keys && i.extend({}, a.defaults.keys, e.keys)), a.group = t, a._start(a.opts.index)
        },
        cancel: function() {
            var t = a.coming;
            t && !1 !== a.trigger("onCancel") && (a.hideLoading(), a.ajaxLoad && a.ajaxLoad.abort(), a.ajaxLoad = null, a.imgPreload && (a.imgPreload.onload = a.imgPreload.onerror = null), t.wrap && t.wrap.stop(!0, !0).trigger("onReset").remove(), a.coming = null, a.current || a._afterZoomOut(t))
        },
        close: function(t) {
            a.cancel(), !1 !== a.trigger("beforeClose") && (a.unbindEvents(), a.isActive && (a.isOpen && !0 !== t ? (a.isOpen = a.isOpened = !1, a.isClosing = !0, i(".fancybox-item, .fancybox-nav").remove(), a.wrap.stop(!0, !0).removeClass("fancybox-opened"), a.transitions[a.current.closeMethod]()) : (i(".fancybox-wrap").stop(!0).trigger("onReset").remove(), a._afterZoomOut())))
        },
        play: function(t) {
            var e = function() {
                    clearTimeout(a.player.timer)
                },
                i = function() {
                    e(), a.current && a.player.isActive && (a.player.timer = setTimeout(a.next, a.current.playSpeed))
                },
                n = function() {
                    e(), s.unbind(".player"), a.player.isActive = !1, a.trigger("onPlayEnd")
                };
            !0 === t || !a.player.isActive && !1 !== t ? a.current && (a.current.loop || a.current.index < a.group.length - 1) && (a.player.isActive = !0, s.bind({
                "onCancel.player beforeClose.player": n,
                "onUpdate.player": i,
                "beforeLoad.player": e
            }), i(), a.trigger("onPlayStart")) : n()
        },
        next: function(t) {
            var e = a.current;
            e && (c(t) || (t = e.direction.next), a.jumpto(e.index + 1, t, "next"))
        },
        prev: function(t) {
            var e = a.current;
            e && (c(t) || (t = e.direction.prev), a.jumpto(e.index - 1, t, "prev"))
        },
        jumpto: function(t, e, i) {
            var o = a.current;
            o && (t = p(t), a.direction = e || o.direction[t >= o.index ? "next" : "prev"], a.router = i || "jumpto", o.loop && (0 > t && (t = o.group.length + t % o.group.length), t %= o.group.length), o.group[t] !== n && (a.cancel(), a._start(t)))
        },
        reposition: function(t, e) {
            var n, o = a.current,
                r = o ? o.wrap : null;
            r && (n = a._getPosition(e), t && "scroll" === t.type ? (delete n.position, r.stop(!0, !0).animate(n, 200)) : (r.css(n), o.pos = i.extend({}, o.dim, n)))
        },
        update: function(t) {
            var e = t && t.type,
                i = !e || "orientationchange" === e;
            i && (clearTimeout(l), l = null), a.isOpen && !l && (l = setTimeout(function() {
                var n = a.current;
                n && !a.isClosing && (a.wrap.removeClass("fancybox-tmp"), (i || "load" === e || "resize" === e && n.autoResize) && a._setDimension(), "scroll" === e && n.canShrink || a.reposition(t), a.trigger("onUpdate"), l = null)
            }, i && !u ? 0 : 300))
        },
        toggle: function(t) {
            a.isOpen && (a.current.fitToView = "boolean" === i.type(t) ? t : !a.current.fitToView, u && (a.wrap.removeAttr("style").addClass("fancybox-tmp"), a.trigger("onUpdate")), a.update())
        },
        hideLoading: function() {
            s.unbind(".loading"), i("#fancybox-loading").remove()
        },
        showLoading: function() {
            var t, e;
            a.hideLoading(), t = i('<div id="fancybox-loading"><div></div></div>').click(a.cancel).appendTo("body"), s.bind("keydown.loading", function(t) {
                27 === (t.which || t.keyCode) && (t.preventDefault(), a.cancel())
            }), a.defaults.fixed || (e = a.getViewport(), t.css({
                position: "absolute",
                top: .5 * e.h + e.y,
                left: .5 * e.w + e.x
            }))
        },
        getViewport: function() {
            var e = a.current && a.current.locked || !1,
                i = {
                    x: r.scrollLeft(),
                    y: r.scrollTop()
                };
            return e ? (i.w = e[0].clientWidth, i.h = e[0].clientHeight) : (i.w = u && t.innerWidth ? t.innerWidth : r.width(), i.h = u && t.innerHeight ? t.innerHeight : r.height()), i
        },
        unbindEvents: function() {
            a.wrap && d(a.wrap) && a.wrap.unbind(".fb"), s.unbind(".fb"), r.unbind(".fb")
        },
        bindEvents: function() {
            var t, e = a.current;
            e && (r.bind("orientationchange.fb" + (u ? "" : " resize.fb") + (e.autoCenter && !e.locked ? " scroll.fb" : ""), a.update), (t = e.keys) && s.bind("keydown.fb", function(o) {
                var r = o.which || o.keyCode,
                    s = o.target || o.srcElement;
                if (27 === r && a.coming) return !1;
                !o.ctrlKey && !o.altKey && !o.shiftKey && !o.metaKey && (!s || !s.type && !i(s).is("[contenteditable]")) && i.each(t, function(t, s) {
                    return 1 < e.group.length && s[r] !== n ? (a[t](s[r]), o.preventDefault(), !1) : -1 < i.inArray(r, s) ? (a[t](), o.preventDefault(), !1) : void 0
                })
            }), i.fn.mousewheel && e.mouseWheel && a.wrap.bind("mousewheel.fb", function(t, n, o, r) {
                for (var s = i(t.target || null), h = !1; s.length && !h && !s.is(".fancybox-skin") && !s.is(".fancybox-wrap");) h = s[0] && !(s[0].style.overflow && "hidden" === s[0].style.overflow) && (s[0].clientWidth && s[0].scrollWidth > s[0].clientWidth || s[0].clientHeight && s[0].scrollHeight > s[0].clientHeight), s = i(s).parent();
                0 !== n && !h && 1 < a.group.length && !e.canShrink && (0 < r || 0 < o ? a.prev(0 < r ? "down" : "left") : (0 > r || 0 > o) && a.next(0 > r ? "up" : "right"), t.preventDefault())
            }))
        },
        trigger: function(t, e) {
            var n, o = e || a.coming || a.current;
            if (o) {
                if (i.isFunction(o[t]) && (n = o[t].apply(o, Array.prototype.slice.call(arguments, 1))), !1 === n) return !1;
                o.helpers && i.each(o.helpers, function(e, n) {
                    n && a.helpers[e] && i.isFunction(a.helpers[e][t]) && a.helpers[e][t](i.extend(!0, {}, a.helpers[e].defaults, n), o)
                }), s.trigger(t)
            }
        },
        isImage: function(t) {
            return c(t) && t.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
        },
        isSWF: function(t) {
            return c(t) && t.match(/\.(swf)((\?|#).*)?$/i)
        },
        _start: function(t) {
            var e, n, o = {};
            if (t = p(t), !(e = a.group[t] || null)) return !1;
            if (o = i.extend(!0, {}, a.opts, e), e = o.margin, n = o.padding, "number" === i.type(e) && (o.margin = [e, e, e, e]), "number" === i.type(n) && (o.padding = [n, n, n, n]), o.modal && i.extend(!0, o, {
                    closeBtn: !1,
                    closeClick: !1,
                    nextClick: !1,
                    arrows: !1,
                    mouseWheel: !1,
                    keys: null,
                    helpers: {
                        overlay: {
                            closeClick: !1
                        }
                    }
                }), o.autoSize && (o.autoWidth = o.autoHeight = !0), "auto" === o.width && (o.autoWidth = !0), "auto" === o.height && (o.autoHeight = !0), o.group = a.group, o.index = t, a.coming = o, !1 === a.trigger("beforeLoad")) a.coming = null;
            else {
                if (n = o.type, e = o.href, !n) return a.coming = null, !(!a.current || !a.router || "jumpto" === a.router) && (a.current.index = t, a[a.router](a.direction));
                if (a.isActive = !0, "image" !== n && "swf" !== n || (o.autoHeight = o.autoWidth = !1, o.scrolling = "visible"), "image" === n && (o.aspectRatio = !0), "iframe" === n && u && (o.scrolling = "scroll"), o.wrap = i(o.tpl.wrap).addClass("fancybox-" + (u ? "mobile" : "desktop") + " fancybox-type-" + n + " fancybox-tmp " + o.wrapCSS).appendTo(o.parent || "body"), i.extend(o, {
                        skin: i(".fancybox-skin", o.wrap),
                        outer: i(".fancybox-outer", o.wrap),
                        inner: i(".fancybox-inner", o.wrap)
                    }), i.each(["Top", "Right", "Bottom", "Left"], function(t, e) {
                        o.skin.css("padding" + e, m(o.padding[t]))
                    }), a.trigger("onReady"), "inline" === n || "html" === n) {
                    if (!o.content || !o.content.length) return a._error("content")
                } else if (!e) return a._error("href");
                "image" === n ? a._loadImage() : "ajax" === n ? a._loadAjax() : "iframe" === n ? a._loadIframe() : a._afterLoad()
            }
        },
        _error: function(t) {
            i.extend(a.coming, {
                type: "html",
                autoWidth: !0,
                autoHeight: !0,
                minWidth: 0,
                minHeight: 0,
                scrolling: "no",
                hasError: t,
                content: a.coming.tpl.error
            }), a._afterLoad()
        },
        _loadImage: function() {
            var t = a.imgPreload = new Image;
            t.onload = function() {
                this.onload = this.onerror = null, a.coming.width = this.width / a.opts.pixelRatio, a.coming.height = this.height / a.opts.pixelRatio, a._afterLoad()
            }, t.onerror = function() {
                this.onload = this.onerror = null, a._error("image")
            }, t.src = a.coming.href, !0 !== t.complete && a.showLoading()
        },
        _loadAjax: function() {
            var t = a.coming;
            a.showLoading(), a.ajaxLoad = i.ajax(i.extend({}, t.ajax, {
                url: t.href,
                error: function(t, e) {
                    a.coming && "abort" !== e ? a._error("ajax", t) : a.hideLoading()
                },
                success: function(e, i) {
                    "success" === i && (t.content = e, a._afterLoad())
                }
            }))
        },
        _loadIframe: function() {
            var t = a.coming,
                e = i(t.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", u ? "auto" : t.iframe.scrolling).attr("src", t.href);
            i(t.wrap).bind("onReset", function() {
                try {
                    i(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                } catch (t) {}
            }), t.iframe.preload && (a.showLoading(), e.one("load", function() {
                i(this).data("ready", 1), u || i(this).bind("load.fb", a.update), i(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), a._afterLoad()
            })), t.content = e.appendTo(t.inner), t.iframe.preload || a._afterLoad()
        },
        _preloadImages: function() {
            var t, e, i = a.group,
                n = a.current,
                o = i.length,
                r = n.preload ? Math.min(n.preload, o - 1) : 0;
            for (e = 1; e <= r; e += 1) "image" === (t = i[(n.index + e) % o]).type && t.href && ((new Image).src = t.href)
        },
        _afterLoad: function() {
            var t, e, n, o, r, s = a.coming,
                h = a.current;
            if (a.hideLoading(), s && !1 !== a.isActive)
                if (!1 === a.trigger("afterLoad", s, h)) s.wrap.stop(!0).trigger("onReset").remove(), a.coming = null;
                else {
                    switch (h && (a.trigger("beforeChange", h), h.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), a.unbindEvents(), t = s.content, e = s.type, n = s.scrolling, i.extend(a, {
                        wrap: s.wrap,
                        skin: s.skin,
                        outer: s.outer,
                        inner: s.inner,
                        current: s,
                        previous: h
                    }), o = s.href, e) {
                        case "inline":
                        case "ajax":
                        case "html":
                            s.selector ? t = i("<div>").html(t).find(s.selector) : d(t) && (t.data("fancybox-placeholder") || t.data("fancybox-placeholder", i('<div class="fancybox-placeholder"></div>').insertAfter(t).hide()), t = t.show().detach(), s.wrap.bind("onReset", function() {
                                i(this).find(t).length && t.hide().replaceAll(t.data("fancybox-placeholder")).data("fancybox-placeholder", !1)
                            }));
                            break;
                        case "image":
                            t = s.tpl.image.replace("{href}", o);
                            break;
                        case "swf":
                            t = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + o + '"></param>', r = "", i.each(s.swf, function(e, i) {
                                t += '<param name="' + e + '" value="' + i + '"></param>', r += " " + e + '="' + i + '"'
                            }), t += '<embed src="' + o + '" type="application/x-shockwave-flash" width="100%" height="100%"' + r + "></embed></object>"
                    }(!d(t) || !t.parent().is(s.inner)) && s.inner.append(t), a.trigger("beforeShow"), s.inner.css("overflow", "yes" === n ? "scroll" : "no" === n ? "hidden" : n), a._setDimension(), a.reposition(), a.isOpen = !1, a.coming = null, a.bindEvents(), a.isOpened ? h.prevMethod && a.transitions[h.prevMethod]() : i(".fancybox-wrap").not(s.wrap).stop(!0).trigger("onReset").remove(), a.transitions[a.isOpened ? s.nextMethod : s.openMethod](), a._preloadImages()
                }
        },
        _setDimension: function() {
            var t, e, n, o, r, s, h, l, u, d = a.getViewport(),
                c = 0,
                g = !1,
                y = !1,
                g = a.wrap,
                v = a.skin,
                x = a.inner,
                b = a.current,
                y = b.width,
                w = b.height,
                _ = b.minWidth,
                I = b.minHeight,
                z = b.maxWidth,
                S = b.maxHeight,
                E = b.scrolling,
                L = b.scrollOutside ? b.scrollbarWidth : 0,
                C = b.margin,
                T = p(C[1] + C[3]),
                W = p(C[0] + C[2]);
            if (g.add(v).add(x).width("auto").height("auto").removeClass("fancybox-tmp"), C = p(v.outerWidth(!0) - v.width()), t = p(v.outerHeight(!0) - v.height()), e = T + C, n = W + t, o = f(y) ? (d.w - e) * p(y) / 100 : y, r = f(w) ? (d.h - n) * p(w) / 100 : w, "iframe" === b.type) {
                if (u = b.content, b.autoHeight && 1 === u.data("ready")) try {
                    u[0].contentWindow.document.location && (x.width(o).height(9999), s = u.contents().find("body"), L && s.css("overflow-x", "hidden"), r = s.outerHeight(!0))
                } catch (t) {}
            } else(b.autoWidth || b.autoHeight) && (x.addClass("fancybox-tmp"), b.autoWidth || x.width(o), b.autoHeight || x.height(r), b.autoWidth && (o = x.width()), b.autoHeight && (r = x.height()), x.removeClass("fancybox-tmp"));
            if (y = p(o), w = p(r), l = o / r, _ = p(f(_) ? p(_, "w") - e : _), z = p(f(z) ? p(z, "w") - e : z), I = p(f(I) ? p(I, "h") - n : I), S = p(f(S) ? p(S, "h") - n : S), s = z, h = S, b.fitToView && (z = Math.min(d.w - e, z), S = Math.min(d.h - n, S)), e = d.w - T, W = d.h - W, b.aspectRatio ? (y > z && (y = z, w = p(y / l)), w > S && (w = S, y = p(w * l)), y < _ && (y = _, w = p(y / l)), w < I && (w = I, y = p(w * l))) : (y = Math.max(_, Math.min(y, z)), b.autoHeight && "iframe" !== b.type && (x.width(y), w = x.height()), w = Math.max(I, Math.min(w, S))), b.fitToView)
                if (x.width(y).height(w), g.width(y + C), d = g.width(), T = g.height(), b.aspectRatio)
                    for (;
                        (d > e || T > W) && y > _ && w > I && !(19 < c++);) w = Math.max(I, Math.min(S, w - 10)), (y = p(w * l)) < _ && (y = _, w = p(y / l)), y > z && (y = z, w = p(y / l)), x.width(y).height(w), g.width(y + C), d = g.width(), T = g.height();
                else y = Math.max(_, Math.min(y, y - (d - e))), w = Math.max(I, Math.min(w, w - (T - W)));
            L && "auto" === E && w < r && y + C + L < e && (y += L), x.width(y).height(w), g.width(y + C), d = g.width(), T = g.height(), g = (d > e || T > W) && y > _ && w > I, y = b.aspectRatio ? y < s && w < h && y < o && w < r : (y < s || w < h) && (y < o || w < r), i.extend(b, {
                dim: {
                    width: m(d),
                    height: m(T)
                },
                origWidth: o,
                origHeight: r,
                canShrink: g,
                canExpand: y,
                wPadding: C,
                hPadding: t,
                wrapSpace: T - v.outerHeight(!0),
                skinSpace: v.height() - w
            }), !u && b.autoHeight && w > I && w < S && !y && x.height("auto")
        },
        _getPosition: function(t) {
            var e = a.current,
                i = a.getViewport(),
                n = e.margin,
                o = a.wrap.width() + n[1] + n[3],
                r = a.wrap.height() + n[0] + n[2],
                n = {
                    position: "absolute",
                    top: n[0],
                    left: n[3]
                };
            return e.autoCenter && e.fixed && !t && r <= i.h && o <= i.w ? n.position = "fixed" : e.locked || (n.top += i.y, n.left += i.x), n.top = m(Math.max(n.top, n.top + (i.h - r) * e.topRatio)), n.left = m(Math.max(n.left, n.left + (i.w - o) * e.leftRatio)), n
        },
        _afterZoomIn: function() {
            var t = a.current;
            t && (a.isOpen = a.isOpened = !0, a.wrap.css("overflow", "visible").addClass("fancybox-opened"), a.update(), (t.closeClick || t.nextClick && 1 < a.group.length) && a.inner.css("cursor", "pointer").bind("click.fb", function(e) {
                !i(e.target).is("a") && !i(e.target).parent().is("a") && (e.preventDefault(), a[t.closeClick ? "close" : "next"]())
            }), t.closeBtn && i(t.tpl.closeBtn).appendTo(a.skin).bind("click.fb", function(t) {
                t.preventDefault(), a.close()
            }), t.arrows && 1 < a.group.length && ((t.loop || 0 < t.index) && i(t.tpl.prev).appendTo(a.outer).bind("click.fb", a.prev), (t.loop || t.index < a.group.length - 1) && i(t.tpl.next).appendTo(a.outer).bind("click.fb", a.next)), a.trigger("afterShow"), t.loop || t.index !== t.group.length - 1 ? a.opts.autoPlay && !a.player.isActive && (a.opts.autoPlay = !1, a.play()) : a.play(!1))
        },
        _afterZoomOut: function(t) {
            t = t || a.current, i(".fancybox-wrap").trigger("onReset").remove(), i.extend(a, {
                group: {},
                opts: {},
                router: !1,
                current: null,
                isActive: !1,
                isOpened: !1,
                isOpen: !1,
                isClosing: !1,
                wrap: null,
                skin: null,
                outer: null,
                inner: null
            }), a.trigger("afterClose", t)
        }
    }), a.transitions = {
        getOrigPosition: function() {
            var t = a.current,
                e = t.element,
                i = t.orig,
                n = {},
                o = 50,
                r = 50,
                s = t.hPadding,
                h = t.wPadding,
                l = a.getViewport();
            return !i && t.isDom && e.is(":visible") && ((i = e.find("img:first")).length || (i = e)), d(i) ? (n = i.offset(), i.is("img") && (o = i.outerWidth(), r = i.outerHeight())) : (n.top = l.y + (l.h - r) * t.topRatio, n.left = l.x + (l.w - o) * t.leftRatio), ("fixed" === a.wrap.css("position") || t.locked) && (n.top -= l.y, n.left -= l.x), n = {
                top: m(n.top - s * t.topRatio),
                left: m(n.left - h * t.leftRatio),
                width: m(o + h),
                height: m(r + s)
            }
        },
        step: function(t, e) {
            var i, n, o = e.prop,
                r = (n = a.current).wrapSpace,
                s = n.skinSpace;
            "width" !== o && "height" !== o || (i = e.end === e.start ? 1 : (t - e.start) / (e.end - e.start), a.isClosing && (i = 1 - i), n = "width" === o ? n.wPadding : n.hPadding, n = t - n, a.skin[o](p("width" === o ? n : n - r * i)), a.inner[o](p("width" === o ? n : n - r * i - s * i)))
        },
        zoomIn: function() {
            var t = a.current,
                e = t.pos,
                n = t.openEffect,
                o = "elastic" === n,
                r = i.extend({
                    opacity: 1
                }, e);
            delete r.position, o ? (e = this.getOrigPosition(), t.openOpacity && (e.opacity = .1)) : "fade" === n && (e.opacity = .1), a.wrap.css(e).animate(r, {
                duration: "none" === n ? 0 : t.openSpeed,
                easing: t.openEasing,
                step: o ? this.step : null,
                complete: a._afterZoomIn
            })
        },
        zoomOut: function() {
            var t = a.current,
                e = t.closeEffect,
                i = "elastic" === e,
                n = {
                    opacity: .1
                };
            i && (n = this.getOrigPosition(), t.closeOpacity && (n.opacity = .1)), a.wrap.animate(n, {
                duration: "none" === e ? 0 : t.closeSpeed,
                easing: t.closeEasing,
                step: i ? this.step : null,
                complete: a._afterZoomOut
            })
        },
        changeIn: function() {
            var t, e = a.current,
                i = e.nextEffect,
                n = e.pos,
                o = {
                    opacity: 1
                },
                r = a.direction;
            n.opacity = .1, "elastic" === i && (t = "down" === r || "up" === r ? "top" : "left", "down" === r || "right" === r ? (n[t] = m(p(n[t]) - 200), o[t] = "+=200px") : (n[t] = m(p(n[t]) + 200), o[t] = "-=200px")), "none" === i ? a._afterZoomIn() : a.wrap.css(n).animate(o, {
                duration: e.nextSpeed,
                easing: e.nextEasing,
                complete: a._afterZoomIn
            })
        },
        changeOut: function() {
            var t = a.previous,
                e = t.prevEffect,
                n = {
                    opacity: .1
                },
                o = a.direction;
            "elastic" === e && (n["down" === o || "up" === o ? "top" : "left"] = ("up" === o || "left" === o ? "-" : "+") + "=200px"), t.wrap.animate(n, {
                duration: "none" === e ? 0 : t.prevSpeed,
                easing: t.prevEasing,
                complete: function() {
                    i(this).trigger("onReset").remove()
                }
            })
        }
    }, a.helpers.overlay = {
        defaults: {
            closeClick: !0,
            speedOut: 200,
            showEarly: !0,
            css: {},
            locked: !u,
            fixed: !0
        },
        overlay: null,
        fixed: !1,
        el: i("html"),
        create: function(t) {
            t = i.extend({}, this.defaults, t), this.overlay && this.close(), this.overlay = i('<div class="fancybox-overlay"></div>').appendTo(a.coming ? a.coming.parent : t.parent), this.fixed = !1, t.fixed && a.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
        },
        open: function(t) {
            var e = this;
            t = i.extend({}, this.defaults, t), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(t), this.fixed || (r.bind("resize.overlay", i.proxy(this.update, this)), this.update()), t.closeClick && this.overlay.bind("click.overlay", function(t) {
                if (i(t.target).hasClass("fancybox-overlay")) return a.isActive ? a.close() : e.close(), !1
            }), this.overlay.css(t.css).show()
        },
        close: function() {
            var t, e;
            r.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && (i(".fancybox-margin").removeClass("fancybox-margin"), t = r.scrollTop(), e = r.scrollLeft(), this.el.removeClass("fancybox-lock"), r.scrollTop(t).scrollLeft(e)), i(".fancybox-overlay").remove().hide(), i.extend(this, {
                overlay: null,
                fixed: !1
            })
        },
        update: function() {
            var t, i = "100%";
            this.overlay.width(i).height("100%"), h ? (t = Math.max(e.documentElement.offsetWidth, e.body.offsetWidth), s.width() > t && (i = s.width())) : s.width() > r.width() && (i = s.width()), this.overlay.width(i).height(s.height())
        },
        onReady: function(t, e) {
            var n = this.overlay;
            i(".fancybox-overlay").stop(!0, !0), n || this.create(t), t.locked && this.fixed && e.fixed && (n || (this.margin = s.height() > r.height() && i("html").css("margin-right").replace("px", "")), e.locked = this.overlay.append(e.wrap), e.fixed = !1), !0 === t.showEarly && this.beforeShow.apply(this, arguments)
        },
        beforeShow: function(t, e) {
            var n, o;
            e.locked && (!1 !== this.margin && (i("*").filter(function() {
                return "fixed" === i(this).css("position") && !i(this).hasClass("fancybox-overlay") && !i(this).hasClass("fancybox-wrap")
            }).addClass("fancybox-margin"), this.el.addClass("fancybox-margin")), n = r.scrollTop(), o = r.scrollLeft(), this.el.addClass("fancybox-lock"), r.scrollTop(n).scrollLeft(o)), this.open(t)
        },
        onUpdate: function() {
            this.fixed || this.update()
        },
        afterClose: function(t) {
            this.overlay && !a.coming && this.overlay.fadeOut(t.speedOut, i.proxy(this.close, this))
        }
    }, a.helpers.title = {
        defaults: {
            type: "float",
            position: "bottom"
        },
        beforeShow: function(t) {
            var e = a.current,
                n = e.title,
                o = t.type;
            if (i.isFunction(n) && (n = n.call(e.element, e)), c(n) && "" !== i.trim(n)) {
                switch (e = i('<div class="fancybox-title fancybox-title-' + o + '-wrap">' + n + "</div>"), o) {
                    case "inside":
                        o = a.skin;
                        break;
                    case "outside":
                        o = a.wrap;
                        break;
                    case "over":
                        o = a.inner;
                        break;
                    default:
                        o = a.skin, e.appendTo("body"), h && e.width(e.width()), e.wrapInner('<span class="child"></span>'), a.current.margin[2] += Math.abs(p(e.css("margin-bottom")))
                }
                e["top" === t.position ? "prependTo" : "appendTo"](o)
            }
        }
    }, i.fn.fancybox = function(t) {
        var e, n = i(this),
            o = this.selector || "",
            r = function(r) {
                var s, h, l = i(this).blur(),
                    u = e;
                !r.ctrlKey && !r.altKey && !r.shiftKey && !r.metaKey && !l.is(".fancybox-wrap") && (s = t.groupAttr || "data-fancybox-group", (h = l.attr(s)) || (s = "rel", h = l.get(0)[s]), h && "" !== h && "nofollow" !== h && (l = o.length ? i(o) : n, l = l.filter("[" + s + '="' + h + '"]'), u = l.index(this)), t.index = u, !1 !== a.open(l, t) && r.preventDefault())
            };
        return t = t || {}, e = t.index || 0, o && !1 !== t.live ? s.undelegate(o, "click.fb-start").delegate(o + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", r) : n.unbind("click.fb-start").bind("click.fb-start", r), this.filter("[data-fancybox-start=1]").trigger("click"), this
    }, s.ready(function() {
        var e, r;
        if (i.scrollbarWidth === n && (i.scrollbarWidth = function() {
                var t = i('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),
                    e = (e = t.children()).innerWidth() - e.height(99).innerWidth();
                return t.remove(), e
            }), i.support.fixedPosition === n) {
            e = i.support;
            var s = 20 === (r = i('<div style="position:fixed;top:20px;"></div>').appendTo("body"))[0].offsetTop || 15 === r[0].offsetTop;
            r.remove(), e.fixedPosition = s
        }
        i.extend(a.defaults, {
            scrollbarWidth: i.scrollbarWidth(),
            fixed: i.support.fixedPosition,
            parent: i("body")
        }), e = i(t).width(), o.addClass("fancybox-lock-test"), r = i(t).width(), o.removeClass("fancybox-lock-test"), i("<style type='text/css'>.fancybox-margin{margin-right:" + (r - e) + "px;}</style>").appendTo("head")
    })
}(window, document, jQuery),
function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t : t(jQuery)
}(function(t) {
    function e(e) {
        var s = e || window.event,
            a = h.call(arguments, 1),
            l = 0,
            d = 0,
            c = 0,
            f = 0,
            p = 0,
            m = 0;
        if (e = t.event.fix(s), e.type = "mousewheel", "detail" in s && (c = -1 * s.detail), "wheelDelta" in s && (c = s.wheelDelta), "wheelDeltaY" in s && (c = s.wheelDeltaY), "wheelDeltaX" in s && (d = -1 * s.wheelDeltaX), "axis" in s && s.axis === s.HORIZONTAL_AXIS && (d = -1 * c, c = 0), l = 0 === c ? d : c, "deltaY" in s && (c = -1 * s.deltaY, l = c), "deltaX" in s && (d = s.deltaX, 0 === c && (l = -1 * d)), 0 !== c || 0 !== d) {
            if (1 === s.deltaMode) {
                var g = t.data(this, "mousewheel-line-height");
                l *= g, c *= g, d *= g
            } else if (2 === s.deltaMode) {
                var y = t.data(this, "mousewheel-page-height");
                l *= y, c *= y, d *= y
            }
            if (f = Math.max(Math.abs(c), Math.abs(d)), (!r || r > f) && (r = f, n(s, f) && (r /= 40)), n(s, f) && (l /= 40, d /= 40, c /= 40), l = Math[l >= 1 ? "floor" : "ceil"](l / r), d = Math[d >= 1 ? "floor" : "ceil"](d / r), c = Math[c >= 1 ? "floor" : "ceil"](c / r), u.settings.normalizeOffset && this.getBoundingClientRect) {
                var v = this.getBoundingClientRect();
                p = e.clientX - v.left, m = e.clientY - v.top
            }
            return e.deltaX = d, e.deltaY = c, e.deltaFactor = r, e.offsetX = p, e.offsetY = m, e.deltaMode = 0, a.unshift(e, l, d, c), o && clearTimeout(o), o = setTimeout(i, 200), (t.event.dispatch || t.event.handle).apply(this, a)
        }
    }

    function i() {
        r = null
    }

    function n(t, e) {
        return u.settings.adjustOldDeltas && "mousewheel" === t.type && e % 120 == 0
    }
    var o, r, s = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        a = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        h = Array.prototype.slice;
    if (t.event.fixHooks)
        for (var l = s.length; l;) t.event.fixHooks[s[--l]] = t.event.mouseHooks;
    var u = t.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener)
                for (var i = a.length; i;) this.addEventListener(a[--i], e, !1);
            else this.onmousewheel = e;
            t.data(this, "mousewheel-line-height", u.getLineHeight(this)), t.data(this, "mousewheel-page-height", u.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var i = a.length; i;) this.removeEventListener(a[--i], e, !1);
            else this.onmousewheel = null;
            t.removeData(this, "mousewheel-line-height"), t.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(e) {
            var i = t(e),
                n = i["offsetParent" in t.fn ? "offsetParent" : "parent"]();
            return n.length || (n = t("body")), parseInt(n.css("fontSize"), 10) || parseInt(i.css("fontSize"), 10) || 16
        },
        getPageHeight: function(e) {
            return t(e).height()
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    t.fn.extend({
        mousewheel: function(t) {
            return t ? this.bind("mousewheel", t) : this.trigger("mousewheel")
        },
        unmousewheel: function(t) {
            return this.unbind("mousewheel", t)
        }
    })
});

/*! Magnific Popup - v1.0.0 - 2015-01-03
 * http://dimsemenov.com/plugins/magnific-popup/
 * Copyright (c) 2015 Dmitry Semenov; */
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : window.jQuery || window.Zepto)
}(function(a) {
    var b, c, d, e, f, g, h = "Close",
        i = "BeforeClose",
        j = "AfterClose",
        k = "BeforeAppend",
        l = "MarkupParse",
        m = "Open",
        n = "Change",
        o = "mfp",
        p = "." + o,
        q = "mfp-ready",
        r = "mfp-removing",
        s = "mfp-prevent-close",
        t = function() {},
        u = !!window.jQuery,
        v = a(window),
        w = function(a, c) {
            b.ev.on(o + a + p, c)
        },
        x = function(b, c, d, e) {
            var f = document.createElement("div");
            return f.className = "mfp-" + b, d && (f.innerHTML = d), e ? c && c.appendChild(f) : (f = a(f), c && f.appendTo(c)), f
        },
        y = function(c, d) {
            b.ev.triggerHandler(o + c, d), b.st.callbacks && (c = c.charAt(0).toLowerCase() + c.slice(1), b.st.callbacks[c] && b.st.callbacks[c].apply(b, a.isArray(d) ? d : [d]))
        },
        z = function(c) {
            return c === g && b.currTemplate.closeBtn || (b.currTemplate.closeBtn = a(b.st.closeMarkup.replace("%title%", b.st.tClose)), g = c), b.currTemplate.closeBtn
        },
        A = function() {
            a.magnificPopup.instance || (b = new t, b.init(), a.magnificPopup.instance = b)
        },
        B = function() {
            var a = document.createElement("p").style,
                b = ["ms", "O", "Moz", "Webkit"];
            if (void 0 !== a.transition) return !0;
            for (; b.length;)
                if (b.pop() + "Transition" in a) return !0;
            return !1
        };
    t.prototype = {
        constructor: t,
        init: function() {
            var c = navigator.appVersion;
            b.isIE7 = -1 !== c.indexOf("MSIE 7."), b.isIE8 = -1 !== c.indexOf("MSIE 8."), b.isLowIE = b.isIE7 || b.isIE8, b.isAndroid = /android/gi.test(c), b.isIOS = /iphone|ipad|ipod/gi.test(c), b.supportsTransition = B(), b.probablyMobile = b.isAndroid || b.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent), d = a(document), b.popupsCache = {}
        },
        open: function(c) {
            var e;
            if (c.isObj === !1) {
                b.items = c.items.toArray(), b.index = 0;
                var g, h = c.items;
                for (e = 0; e < h.length; e++)
                    if (g = h[e], g.parsed && (g = g.el[0]), g === c.el[0]) {
                        b.index = e;
                        break
                    }
            } else b.items = a.isArray(c.items) ? c.items : [c.items], b.index = c.index || 0;
            if (b.isOpen) return void b.updateItemHTML();
            b.types = [], f = "", b.ev = c.mainEl && c.mainEl.length ? c.mainEl.eq(0) : d, c.key ? (b.popupsCache[c.key] || (b.popupsCache[c.key] = {}), b.currTemplate = b.popupsCache[c.key]) : b.currTemplate = {}, b.st = a.extend(!0, {}, a.magnificPopup.defaults, c), b.fixedContentPos = "auto" === b.st.fixedContentPos ? !b.probablyMobile : b.st.fixedContentPos, b.st.modal && (b.st.closeOnContentClick = !1, b.st.closeOnBgClick = !1, b.st.showCloseBtn = !1, b.st.enableEscapeKey = !1), b.bgOverlay || (b.bgOverlay = x("bg").on("click" + p, function() {
                b.close()
            }), b.wrap = x("wrap").attr("tabindex", -1).on("click" + p, function(a) {
                b._checkIfClose(a.target) && b.close()
            }), b.container = x("container", b.wrap)), b.contentContainer = x("content"), b.st.preloader && (b.preloader = x("preloader", b.container, b.st.tLoading));
            var i = a.magnificPopup.modules;
            for (e = 0; e < i.length; e++) {
                var j = i[e];
                j = j.charAt(0).toUpperCase() + j.slice(1), b["init" + j].call(b)
            }
            y("BeforeOpen"), b.st.showCloseBtn && (b.st.closeBtnInside ? (w(l, function(a, b, c, d) {
                c.close_replaceWith = z(d.type)
            }), f += " mfp-close-btn-in") : b.wrap.append(z())), b.st.alignTop && (f += " mfp-align-top"), b.wrap.css(b.fixedContentPos ? {
                overflow: b.st.overflowY,
                overflowX: "hidden",
                overflowY: b.st.overflowY
            } : {
                top: v.scrollTop(),
                position: "absolute"
            }), (b.st.fixedBgPos === !1 || "auto" === b.st.fixedBgPos && !b.fixedContentPos) && b.bgOverlay.css({
                height: d.height(),
                position: "absolute"
            }), b.st.enableEscapeKey && d.on("keyup" + p, function(a) {
                27 === a.keyCode && b.close()
            }), v.on("resize" + p, function() {
                b.updateSize()
            }), b.st.closeOnContentClick || (f += " mfp-auto-cursor"), f && b.wrap.addClass(f);
            var k = b.wH = v.height(),
                n = {};
            if (b.fixedContentPos && b._hasScrollBar(k)) {
                var o = b._getScrollbarSize();
                o && (n.marginRight = o)
            }
            b.fixedContentPos && (b.isIE7 ? a("body, html").css("overflow", "hidden") : n.overflow = "hidden");
            var r = b.st.mainClass;
            return b.isIE7 && (r += " mfp-ie7"), r && b._addClassToMFP(r), b.updateItemHTML(), y("BuildControls"), a("html").css(n), b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo || a(document.body)), b._lastFocusedEl = document.activeElement, setTimeout(function() {
                b.content ? (b._addClassToMFP(q), b._setFocus()) : b.bgOverlay.addClass(q), d.on("focusin" + p, b._onFocusIn)
            }, 16), b.isOpen = !0, b.updateSize(k), y(m), c
        },
        close: function() {
            b.isOpen && (y(i), b.isOpen = !1, b.st.removalDelay && !b.isLowIE && b.supportsTransition ? (b._addClassToMFP(r), setTimeout(function() {
                b._close()
            }, b.st.removalDelay)) : b._close())
        },
        _close: function() {
            y(h);
            var c = r + " " + q + " ";
            if (b.bgOverlay.detach(), b.wrap.detach(), b.container.empty(), b.st.mainClass && (c += b.st.mainClass + " "), b._removeClassFromMFP(c), b.fixedContentPos) {
                var e = {
                    marginRight: ""
                };
                b.isIE7 ? a("body, html").css("overflow", "") : e.overflow = "", a("html").css(e)
            }
            d.off("keyup" + p + " focusin" + p), b.ev.off(p), b.wrap.attr("class", "mfp-wrap").removeAttr("style"), b.bgOverlay.attr("class", "mfp-bg"), b.container.attr("class", "mfp-container"), !b.st.showCloseBtn || b.st.closeBtnInside && b.currTemplate[b.currItem.type] !== !0 || b.currTemplate.closeBtn && b.currTemplate.closeBtn.detach(), b._lastFocusedEl && a(b._lastFocusedEl).focus(), b.currItem = null, b.content = null, b.currTemplate = null, b.prevHeight = 0, y(j)
        },
        updateSize: function(a) {
            if (b.isIOS) {
                var c = document.documentElement.clientWidth / window.innerWidth,
                    d = window.innerHeight * c;
                b.wrap.css("height", d), b.wH = d
            } else b.wH = a || v.height();
            b.fixedContentPos || b.wrap.css("height", b.wH), y("Resize")
        },
        updateItemHTML: function() {
            var c = b.items[b.index];
            b.contentContainer.detach(), b.content && b.content.detach(), c.parsed || (c = b.parseEl(b.index));
            var d = c.type;
            if (y("BeforeChange", [b.currItem ? b.currItem.type : "", d]), b.currItem = c, !b.currTemplate[d]) {
                var f = b.st[d] ? b.st[d].markup : !1;
                y("FirstMarkupParse", f), b.currTemplate[d] = f ? a(f) : !0
            }
            e && e !== c.type && b.container.removeClass("mfp-" + e + "-holder");
            var g = b["get" + d.charAt(0).toUpperCase() + d.slice(1)](c, b.currTemplate[d]);
            b.appendContent(g, d), c.preloaded = !0, y(n, c), e = c.type, b.container.prepend(b.contentContainer), y("AfterChange")
        },
        appendContent: function(a, c) {
            b.content = a, a ? b.st.showCloseBtn && b.st.closeBtnInside && b.currTemplate[c] === !0 ? b.content.find(".mfp-close").length || b.content.append(z()) : b.content = a : b.content = "", y(k), b.container.addClass("mfp-" + c + "-holder"), b.contentContainer.append(b.content)
        },
        parseEl: function(c) {
            var d, e = b.items[c];
            if (e.tagName ? e = {
                    el: a(e)
                } : (d = e.type, e = {
                    data: e,
                    src: e.src
                }), e.el) {
                for (var f = b.types, g = 0; g < f.length; g++)
                    if (e.el.hasClass("mfp-" + f[g])) {
                        d = f[g];
                        break
                    }
                e.src = e.el.attr("data-mfp-src"), e.src || (e.src = e.el.attr("href"))
            }
            return e.type = d || b.st.type || "inline", e.index = c, e.parsed = !0, b.items[c] = e, y("ElementParse", e), b.items[c]
        },
        addGroup: function(a, c) {
            var d = function(d) {
                d.mfpEl = this, b._openClick(d, a, c)
            };
            c || (c = {});
            var e = "click.magnificPopup";
            c.mainEl = a, c.items ? (c.isObj = !0, a.off(e).on(e, d)) : (c.isObj = !1, c.delegate ? a.off(e).on(e, c.delegate, d) : (c.items = a, a.off(e).on(e, d)))
        },
        _openClick: function(c, d, e) {
            var f = void 0 !== e.midClick ? e.midClick : a.magnificPopup.defaults.midClick;
            if (f || 2 !== c.which && !c.ctrlKey && !c.metaKey) {
                var g = void 0 !== e.disableOn ? e.disableOn : a.magnificPopup.defaults.disableOn;
                if (g)
                    if (a.isFunction(g)) {
                        if (!g.call(b)) return !0
                    } else if (v.width() < g) return !0;
                c.type && (c.preventDefault(), b.isOpen && c.stopPropagation()), e.el = a(c.mfpEl), e.delegate && (e.items = d.find(e.delegate)), b.open(e)
            }
        },
        updateStatus: function(a, d) {
            if (b.preloader) {
                c !== a && b.container.removeClass("mfp-s-" + c), d || "loading" !== a || (d = b.st.tLoading);
                var e = {
                    status: a,
                    text: d
                };
                y("UpdateStatus", e), a = e.status, d = e.text, b.preloader.html(d), b.preloader.find("a").on("click", function(a) {
                    a.stopImmediatePropagation()
                }), b.container.addClass("mfp-s-" + a), c = a
            }
        },
        _checkIfClose: function(c) {
            if (!a(c).hasClass(s)) {
                var d = b.st.closeOnContentClick,
                    e = b.st.closeOnBgClick;
                if (d && e) return !0;
                if (!b.content || a(c).hasClass("mfp-close") || b.preloader && c === b.preloader[0]) return !0;
                if (c === b.content[0] || a.contains(b.content[0], c)) {
                    if (d) return !0
                } else if (e && a.contains(document, c)) return !0;
                return !1
            }
        },
        _addClassToMFP: function(a) {
            b.bgOverlay.addClass(a), b.wrap.addClass(a)
        },
        _removeClassFromMFP: function(a) {
            this.bgOverlay.removeClass(a), b.wrap.removeClass(a)
        },
        _hasScrollBar: function(a) {
            return (b.isIE7 ? d.height() : document.body.scrollHeight) > (a || v.height())
        },
        _setFocus: function() {
            (b.st.focus ? b.content.find(b.st.focus).eq(0) : b.wrap).focus()
        },
        _onFocusIn: function(c) {
            return c.target === b.wrap[0] || a.contains(b.wrap[0], c.target) ? void 0 : (b._setFocus(), !1)
        },
        _parseMarkup: function(b, c, d) {
            var e;
            d.data && (c = a.extend(d.data, c)), y(l, [b, c, d]), a.each(c, function(a, c) {
                if (void 0 === c || c === !1) return !0;
                if (e = a.split("_"), e.length > 1) {
                    var d = b.find(p + "-" + e[0]);
                    if (d.length > 0) {
                        var f = e[1];
                        "replaceWith" === f ? d[0] !== c[0] && d.replaceWith(c) : "img" === f ? d.is("img") ? d.attr("src", c) : d.replaceWith('<img src="' + c + '" class="' + d.attr("class") + '" />') : d.attr(e[1], c)
                    }
                } else b.find(p + "-" + a).html(c)
            })
        },
        _getScrollbarSize: function() {
            if (void 0 === b.scrollbarSize) {
                var a = document.createElement("div");
                a.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;", document.body.appendChild(a), b.scrollbarSize = a.offsetWidth - a.clientWidth, document.body.removeChild(a)
            }
            return b.scrollbarSize
        }
    }, a.magnificPopup = {
        instance: null,
        proto: t.prototype,
        modules: [],
        open: function(b, c) {
            return A(), b = b ? a.extend(!0, {}, b) : {}, b.isObj = !0, b.index = c || 0, this.instance.open(b)
        },
        close: function() {
            return a.magnificPopup.instance && a.magnificPopup.instance.close()
        },
        registerModule: function(b, c) {
            c.options && (a.magnificPopup.defaults[b] = c.options), a.extend(this.proto, c.proto), this.modules.push(b)
        },
        defaults: {
            disableOn: 0,
            key: null,
            midClick: !1,
            mainClass: "",
            preloader: !0,
            focus: "",
            closeOnContentClick: !1,
            closeOnBgClick: !0,
            closeBtnInside: !0,
            showCloseBtn: !0,
            enableEscapeKey: !0,
            modal: !1,
            alignTop: !1,
            removalDelay: 0,
            prependTo: null,
            fixedContentPos: "auto",
            fixedBgPos: "auto",
            overflowY: "auto",
            closeMarkup: '<button title="%title%" type="button" class="mfp-close">&times;</button>',
            tClose: "Close (Esc)",
            tLoading: "Loading..."
        }
    }, a.fn.magnificPopup = function(c) {
        A();
        var d = a(this);
        if ("string" == typeof c)
            if ("open" === c) {
                var e, f = u ? d.data("magnificPopup") : d[0].magnificPopup,
                    g = parseInt(arguments[1], 10) || 0;
                f.items ? e = f.items[g] : (e = d, f.delegate && (e = e.find(f.delegate)), e = e.eq(g)), b._openClick({
                    mfpEl: e
                }, d, f)
            } else b.isOpen && b[c].apply(b, Array.prototype.slice.call(arguments, 1));
        else c = a.extend(!0, {}, c), u ? d.data("magnificPopup", c) : d[0].magnificPopup = c, b.addGroup(d, c);
        return d
    };
    var C, D, E, F = "inline",
        G = function() {
            E && (D.after(E.addClass(C)).detach(), E = null)
        };
    a.magnificPopup.registerModule(F, {
        options: {
            hiddenClass: "hide",
            markup: "",
            tNotFound: "Content not found"
        },
        proto: {
            initInline: function() {
                b.types.push(F), w(h + "." + F, function() {
                    G()
                })
            },
            getInline: function(c, d) {
                if (G(), c.src) {
                    var e = b.st.inline,
                        f = a(c.src);
                    if (f.length) {
                        var g = f[0].parentNode;
                        g && g.tagName && (D || (C = e.hiddenClass, D = x(C), C = "mfp-" + C), E = f.after(D).detach().removeClass(C)), b.updateStatus("ready")
                    } else b.updateStatus("error", e.tNotFound), f = a("<div>");
                    return c.inlineElement = f, f
                }
                return b.updateStatus("ready"), b._parseMarkup(d, {}, c), d
            }
        }
    });
    var H, I = "ajax",
        J = function() {
            H && a(document.body).removeClass(H)
        },
        K = function() {
            J(), b.req && b.req.abort()
        };
    a.magnificPopup.registerModule(I, {
        options: {
            settings: null,
            cursor: "mfp-ajax-cur",
            tError: '<a href="%url%">The content</a> could not be loaded.'
        },
        proto: {
            initAjax: function() {
                b.types.push(I), H = b.st.ajax.cursor, w(h + "." + I, K), w("BeforeChange." + I, K)
            },
            getAjax: function(c) {
                H && a(document.body).addClass(H), b.updateStatus("loading");
                var d = a.extend({
                    url: c.src,
                    success: function(d, e, f) {
                        var g = {
                            data: d,
                            xhr: f
                        };
                        y("ParseAjax", g), b.appendContent(a(g.data), I), c.finished = !0, J(), b._setFocus(), setTimeout(function() {
                            b.wrap.addClass(q)
                        }, 16), b.updateStatus("ready"), y("AjaxContentAdded")
                    },
                    error: function() {
                        J(), c.finished = c.loadError = !0, b.updateStatus("error", b.st.ajax.tError.replace("%url%", c.src))
                    }
                }, b.st.ajax.settings);
                return b.req = a.ajax(d), ""
            }
        }
    });
    var L, M = function(c) {
        if (c.data && void 0 !== c.data.title) return c.data.title;
        var d = b.st.image.titleSrc;
        if (d) {
            if (a.isFunction(d)) return d.call(b, c);
            if (c.el) return c.el.attr(d) || ""
        }
        return ""
    };
    a.magnificPopup.registerModule("image", {
        options: {
            markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.'
        },
        proto: {
            initImage: function() {
                var c = b.st.image,
                    d = ".image";
                b.types.push("image"), w(m + d, function() {
                    "image" === b.currItem.type && c.cursor && a(document.body).addClass(c.cursor)
                }), w(h + d, function() {
                    c.cursor && a(document.body).removeClass(c.cursor), v.off("resize" + p)
                }), w("Resize" + d, b.resizeImage), b.isLowIE && w("AfterChange", b.resizeImage)
            },
            resizeImage: function() {
                var a = b.currItem;
                if (a && a.img && b.st.image.verticalFit) {
                    var c = 0;
                    b.isLowIE && (c = parseInt(a.img.css("padding-top"), 10) + parseInt(a.img.css("padding-bottom"), 10)), a.img.css("max-height", b.wH - c)
                }
            },
            _onImageHasSize: function(a) {
                a.img && (a.hasSize = !0, L && clearInterval(L), a.isCheckingImgSize = !1, y("ImageHasSize", a), a.imgHidden && (b.content && b.content.removeClass("mfp-loading"), a.imgHidden = !1))
            },
            findImageSize: function(a) {
                var c = 0,
                    d = a.img[0],
                    e = function(f) {
                        L && clearInterval(L), L = setInterval(function() {
                            return d.naturalWidth > 0 ? void b._onImageHasSize(a) : (c > 200 && clearInterval(L), c++, void(3 === c ? e(10) : 40 === c ? e(50) : 100 === c && e(500)))
                        }, f)
                    };
                e(1)
            },
            getImage: function(c, d) {
                var e = 0,
                    f = function() {
                        c && (c.img[0].complete ? (c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("ready")), c.hasSize = !0, c.loaded = !0, y("ImageLoadComplete")) : (e++, 200 > e ? setTimeout(f, 100) : g()))
                    },
                    g = function() {
                        c && (c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("error", h.tError.replace("%url%", c.src))), c.hasSize = !0, c.loaded = !0, c.loadError = !0)
                    },
                    h = b.st.image,
                    i = d.find(".mfp-img");
                if (i.length) {
                    var j = document.createElement("img");
                    j.className = "mfp-img", c.el && c.el.find("img").length && (j.alt = c.el.find("img").attr("alt")), c.img = a(j).on("load.mfploader", f).on("error.mfploader", g), j.src = c.src, i.is("img") && (c.img = c.img.clone()), j = c.img[0], j.naturalWidth > 0 ? c.hasSize = !0 : j.width || (c.hasSize = !1)
                }
                return b._parseMarkup(d, {
                    title: M(c),
                    img_replaceWith: c.img
                }, c), b.resizeImage(), c.hasSize ? (L && clearInterval(L), c.loadError ? (d.addClass("mfp-loading"), b.updateStatus("error", h.tError.replace("%url%", c.src))) : (d.removeClass("mfp-loading"), b.updateStatus("ready")), d) : (b.updateStatus("loading"), c.loading = !0, c.hasSize || (c.imgHidden = !0, d.addClass("mfp-loading"), b.findImageSize(c)), d)
            }
        }
    });
    var N, O = function() {
        return void 0 === N && (N = void 0 !== document.createElement("p").style.MozTransform), N
    };
    a.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1,
            easing: "ease-in-out",
            duration: 300,
            opener: function(a) {
                return a.is("img") ? a : a.find("img")
            }
        },
        proto: {
            initZoom: function() {
                var a, c = b.st.zoom,
                    d = ".zoom";
                if (c.enabled && b.supportsTransition) {
                    var e, f, g = c.duration,
                        j = function(a) {
                            var b = a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),
                                d = "all " + c.duration / 1e3 + "s " + c.easing,
                                e = {
                                    position: "fixed",
                                    zIndex: 9999,
                                    left: 0,
                                    top: 0,
                                    "-webkit-backface-visibility": "hidden"
                                },
                                f = "transition";
                            return e["-webkit-" + f] = e["-moz-" + f] = e["-o-" + f] = e[f] = d, b.css(e), b
                        },
                        k = function() {
                            b.content.css("visibility", "visible")
                        };
                    w("BuildControls" + d, function() {
                        if (b._allowZoom()) {
                            if (clearTimeout(e), b.content.css("visibility", "hidden"), a = b._getItemToZoom(), !a) return void k();
                            f = j(a), f.css(b._getOffset()), b.wrap.append(f), e = setTimeout(function() {
                                f.css(b._getOffset(!0)), e = setTimeout(function() {
                                    k(), setTimeout(function() {
                                        f.remove(), a = f = null, y("ZoomAnimationEnded")
                                    }, 16)
                                }, g)
                            }, 16)
                        }
                    }), w(i + d, function() {
                        if (b._allowZoom()) {
                            if (clearTimeout(e), b.st.removalDelay = g, !a) {
                                if (a = b._getItemToZoom(), !a) return;
                                f = j(a)
                            }
                            f.css(b._getOffset(!0)), b.wrap.append(f), b.content.css("visibility", "hidden"), setTimeout(function() {
                                f.css(b._getOffset())
                            }, 16)
                        }
                    }), w(h + d, function() {
                        b._allowZoom() && (k(), f && f.remove(), a = null)
                    })
                }
            },
            _allowZoom: function() {
                return "image" === b.currItem.type
            },
            _getItemToZoom: function() {
                return b.currItem.hasSize ? b.currItem.img : !1
            },
            _getOffset: function(c) {
                var d;
                d = c ? b.currItem.img : b.st.zoom.opener(b.currItem.el || b.currItem);
                var e = d.offset(),
                    f = parseInt(d.css("padding-top"), 10),
                    g = parseInt(d.css("padding-bottom"), 10);
                e.top -= a(window).scrollTop() - f;
                var h = {
                    width: d.width(),
                    height: (u ? d.innerHeight() : d[0].offsetHeight) - g - f
                };
                return O() ? h["-moz-transform"] = h.transform = "translate(" + e.left + "px," + e.top + "px)" : (h.left = e.left, h.top = e.top), h
            }
        }
    });
    var P = "iframe",
        Q = "//about:blank",
        R = function(a) {
            if (b.currTemplate[P]) {
                var c = b.currTemplate[P].find("iframe");
                c.length && (a || (c[0].src = Q), b.isIE8 && c.css("display", a ? "block" : "none"))
            }
        };
    a.magnificPopup.registerModule(P, {
        options: {
            markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
            srcAction: "iframe_src",
            patterns: {
                youtube: {
                    index: "youtube.com",
                    id: "v=",
                    src: "//www.youtube.com/embed/%id%?autoplay=1"
                },
                vimeo: {
                    index: "vimeo.com/",
                    id: "/",
                    src: "//player.vimeo.com/video/%id%?autoplay=1"
                },
                gmaps: {
                    index: "//maps.google.",
                    src: "%id%&output=embed"
                }
            }
        },
        proto: {
            initIframe: function() {
                b.types.push(P), w("BeforeChange", function(a, b, c) {
                    b !== c && (b === P ? R() : c === P && R(!0))
                }), w(h + "." + P, function() {
                    R()
                })
            },
            getIframe: function(c, d) {
                var e = c.src,
                    f = b.st.iframe;
                a.each(f.patterns, function() {
                    return e.indexOf(this.index) > -1 ? (this.id && (e = "string" == typeof this.id ? e.substr(e.lastIndexOf(this.id) + this.id.length, e.length) : this.id.call(this, e)), e = this.src.replace("%id%", e), !1) : void 0
                });
                var g = {};
                return f.srcAction && (g[f.srcAction] = e), b._parseMarkup(d, g, c), b.updateStatus("ready"), d
            }
        }
    });
    var S = function(a) {
            var c = b.items.length;
            return a > c - 1 ? a - c : 0 > a ? c + a : a
        },
        T = function(a, b, c) {
            return a.replace(/%curr%/gi, b + 1).replace(/%total%/gi, c)
        };
    a.magnificPopup.registerModule("gallery", {
        options: {
            enabled: !1,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            preload: [0, 2],
            navigateByImgClick: !0,
            arrows: !0,
            tPrev: "Previous (Left arrow key)",
            tNext: "Next (Right arrow key)",
            tCounter: "%curr% of %total%"
        },
        proto: {
            initGallery: function() {
                var c = b.st.gallery,
                    e = ".mfp-gallery",
                    g = Boolean(a.fn.mfpFastClick);
                return b.direction = !0, c && c.enabled ? (f += " mfp-gallery", w(m + e, function() {
                    c.navigateByImgClick && b.wrap.on("click" + e, ".mfp-img", function() {
                        return b.items.length > 1 ? (b.next(), !1) : void 0
                    }), d.on("keydown" + e, function(a) {
                        37 === a.keyCode ? b.prev() : 39 === a.keyCode && b.next()
                    })
                }), w("UpdateStatus" + e, function(a, c) {
                    c.text && (c.text = T(c.text, b.currItem.index, b.items.length))
                }), w(l + e, function(a, d, e, f) {
                    var g = b.items.length;
                    e.counter = g > 1 ? T(c.tCounter, f.index, g) : ""
                }), w("BuildControls" + e, function() {
                    if (b.items.length > 1 && c.arrows && !b.arrowLeft) {
                        var d = c.arrowMarkup,
                            e = b.arrowLeft = a(d.replace(/%title%/gi, c.tPrev).replace(/%dir%/gi, "left")).addClass(s),
                            f = b.arrowRight = a(d.replace(/%title%/gi, c.tNext).replace(/%dir%/gi, "right")).addClass(s),
                            h = g ? "mfpFastClick" : "click";
                        e[h](function() {
                            b.prev()
                        }), f[h](function() {
                            b.next()
                        }), b.isIE7 && (x("b", e[0], !1, !0), x("a", e[0], !1, !0), x("b", f[0], !1, !0), x("a", f[0], !1, !0)), b.container.append(e.add(f))
                    }
                }), w(n + e, function() {
                    b._preloadTimeout && clearTimeout(b._preloadTimeout), b._preloadTimeout = setTimeout(function() {
                        b.preloadNearbyImages(), b._preloadTimeout = null
                    }, 16)
                }), void w(h + e, function() {
                    d.off(e), b.wrap.off("click" + e), b.arrowLeft && g && b.arrowLeft.add(b.arrowRight).destroyMfpFastClick(), b.arrowRight = b.arrowLeft = null
                })) : !1
            },
            next: function() {
                b.direction = !0, b.index = S(b.index + 1), b.updateItemHTML()
            },
            prev: function() {
                b.direction = !1, b.index = S(b.index - 1), b.updateItemHTML()
            },
            goTo: function(a) {
                b.direction = a >= b.index, b.index = a, b.updateItemHTML()
            },
            preloadNearbyImages: function() {
                var a, c = b.st.gallery.preload,
                    d = Math.min(c[0], b.items.length),
                    e = Math.min(c[1], b.items.length);
                for (a = 1; a <= (b.direction ? e : d); a++) b._preloadItem(b.index + a);
                for (a = 1; a <= (b.direction ? d : e); a++) b._preloadItem(b.index - a)
            },
            _preloadItem: function(c) {
                if (c = S(c), !b.items[c].preloaded) {
                    var d = b.items[c];
                    d.parsed || (d = b.parseEl(c)), y("LazyLoad", d), "image" === d.type && (d.img = a('<img class="mfp-img" />').on("load.mfploader", function() {
                        d.hasSize = !0
                    }).on("error.mfploader", function() {
                        d.hasSize = !0, d.loadError = !0, y("LazyLoadError", d)
                    }).attr("src", d.src)), d.preloaded = !0
                }
            }
        }
    });
    var U = "retina";
    a.magnificPopup.registerModule(U, {
            options: {
                replaceSrc: function(a) {
                    return a.src.replace(/\.\w+$/, function(a) {
                        return "@2x" + a
                    })
                },
                ratio: 1
            },
            proto: {
                initRetina: function() {
                    if (window.devicePixelRatio > 1) {
                        var a = b.st.retina,
                            c = a.ratio;
                        c = isNaN(c) ? c() : c, c > 1 && (w("ImageHasSize." + U, function(a, b) {
                            b.img.css({
                                "max-width": b.img[0].naturalWidth / c,
                                width: "100%"
                            })
                        }), w("ElementParse." + U, function(b, d) {
                            d.src = a.replaceSrc(d, c)
                        }))
                    }
                }
            }
        }),
        function() {
            var b = 1e3,
                c = "ontouchstart" in window,
                d = function() {
                    v.off("touchmove" + f + " touchend" + f)
                },
                e = "mfpFastClick",
                f = "." + e;
            a.fn.mfpFastClick = function(e) {
                return a(this).each(function() {
                    var g, h = a(this);
                    if (c) {
                        var i, j, k, l, m, n;
                        h.on("touchstart" + f, function(a) {
                            l = !1, n = 1, m = a.originalEvent ? a.originalEvent.touches[0] : a.touches[0], j = m.clientX, k = m.clientY, v.on("touchmove" + f, function(a) {
                                m = a.originalEvent ? a.originalEvent.touches : a.touches, n = m.length, m = m[0], (Math.abs(m.clientX - j) > 10 || Math.abs(m.clientY - k) > 10) && (l = !0, d())
                            }).on("touchend" + f, function(a) {
                                d(), l || n > 1 || (g = !0, a.preventDefault(), clearTimeout(i), i = setTimeout(function() {
                                    g = !1
                                }, b), e())
                            })
                        })
                    }
                    h.on("click" + f, function() {
                        g || e()
                    })
                })
            }, a.fn.destroyMfpFastClick = function() {
                a(this).off("touchstart" + f + " click" + f), c && v.off("touchmove" + f + " touchend" + f)
            }
        }(), A()
});




/*
 * CSS3 Animate it
 * Copyright (c) 2014 Jack McCourt
 * https://github.com/kriegar/css3-animate-it
 * Version: 0.1.0
 * 
 * I utilise the jQuery.appear plugin within this javascript file so here is a link to that too
 * https://github.com/morr/jquery.appear
 *
 * I also utilise the jQuery.doTimeout plugin for the data-sequence functionality so here is a link back to them.
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 */
(function($) {
    var selectors = [];

    var check_binded = false;
    var check_lock = false;
    var defaults = {
        interval: 250,
        force_process: false
    }
    var $window = $(window);

    var $prior_appeared;

    function process() {
        check_lock = false;
        for (var index = 0; index < selectors.length; index++) {
            var $appeared = $(selectors[index]).filter(function() {
                return $(this).is(':appeared');
            });

            $appeared.trigger('appear', [$appeared]);

            if ($prior_appeared) {

                var $disappeared = $prior_appeared.not($appeared);
                $disappeared.trigger('disappear', [$disappeared]);
            }
            $prior_appeared = $appeared;
        }
    }

    // "appeared" custom filter
    $.expr[':']['appeared'] = function(element) {
        var $element = $(element);
        if (!$element.is(':visible')) {
            return false;
        }

        var window_left = $window.scrollLeft();
        var window_top = $window.scrollTop();
        var offset = $element.offset();
        var left = offset.left;
        var top = offset.top;

        if (top + $element.height() >= window_top &&
            top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
            left + $element.width() >= window_left &&
            left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
            return true;
        } else {
            return false;
        }
    }

    $.fn.extend({
        // watching for element's appearance in browser viewport
        appear: function(options) {
            var opts = $.extend({}, defaults, options || {});
            var selector = this.selector || this;
            if (!check_binded) {
                var on_check = function() {
                    if (check_lock) {
                        return;
                    }
                    check_lock = true;

                    setTimeout(process, opts.interval);
                };

                $(window).scroll(on_check).resize(on_check);
                check_binded = true;
            }

            if (opts.force_process) {
                setTimeout(process, opts.interval);
            }
            selectors.push(selector);
            return $(selector);
        }
    });

    $.extend({
        // force elements's appearance check
        force_appear: function() {
            if (check_binded) {
                process();
                return true;
            };
            return false;
        }
    });
})(jQuery);



/*!
 * jQuery doTimeout: Like setTimeout, but better! - v1.0 - 3/3/2010
 * http://benalman.com/projects/jquery-dotimeout-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

// Script: jQuery doTimeout: Like setTimeout, but better!
//
// *Version: 1.0, Last updated: 3/3/2010*
// 
// Project Home - http://benalman.com/projects/jquery-dotimeout-plugin/
// GitHub       - http://github.com/cowboy/jquery-dotimeout/
// Source       - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.js
// (Minified)   - http://github.com/cowboy/jquery-dotimeout/raw/master/jquery.ba-dotimeout.min.js (1.0kb)
// 
// About: License
// 
// Copyright (c) 2010 "Cowboy" Ben Alman,
// Dual licensed under the MIT and GPL licenses.
// http://benalman.com/about/license/
// 
// About: Examples
// 
// These working examples, complete with fully commented code, illustrate a few
// ways in which this plugin can be used.
// 
// Debouncing      - http://benalman.com/code/projects/jquery-dotimeout/examples/debouncing/
// Delays, Polling - http://benalman.com/code/projects/jquery-dotimeout/examples/delay-poll/
// Hover Intent    - http://benalman.com/code/projects/jquery-dotimeout/examples/hoverintent/
// 
// About: Support and Testing
// 
// Information about what version or versions of jQuery this plugin has been
// tested with, what browsers it has been tested in, and where the unit tests
// reside (so you can test it yourself).
// 
// jQuery Versions - 1.3.2, 1.4.2
// Browsers Tested - Internet Explorer 6-8, Firefox 2-3.6, Safari 3-4, Chrome 4-5, Opera 9.6-10.1.
// Unit Tests      - http://benalman.com/code/projects/jquery-dotimeout/unit/
// 
// About: Release History
// 
// 1.0 - (3/3/2010) Callback can now be a string, in which case it will call
//       the appropriate $.method or $.fn.method, depending on where .doTimeout
//       was called. Callback must now return `true` (not just a truthy value)
//       to poll.
// 0.4 - (7/15/2009) Made the "id" argument optional, some other minor tweaks
// 0.3 - (6/25/2009) Initial release

(function($) {
    '$:nomunge'; // Used by YUI compressor.

    var cache = {},

        // Reused internal string.
        doTimeout = 'doTimeout',

        // A convenient shortcut.
        aps = Array.prototype.slice;

    // Method: jQuery.doTimeout
    // 
    // Initialize, cancel, or force execution of a callback after a delay.
    // 
    // If delay and callback are specified, a doTimeout is initialized. The
    // callback will execute, asynchronously, after the delay. If an id is
    // specified, this doTimeout will override and cancel any existing doTimeout
    // with the same id. Any additional arguments will be passed into callback
    // when it is executed.
    // 
    // If the callback returns true, the doTimeout loop will execute again, after
    // the delay, creating a polling loop until the callback returns a non-true
    // value.
    // 
    // Note that if an id is not passed as the first argument, this doTimeout will
    // NOT be able to be manually canceled or forced. (for debouncing, be sure to
    // specify an id).
    // 
    // If id is specified, but delay and callback are not, the doTimeout will be
    // canceled without executing the callback. If force_mode is specified, the
    // callback will be executed, synchronously, but will only be allowed to
    // continue a polling loop if force_mode is true (provided the callback
    // returns true, of course). If force_mode is false, no polling loop will
    // continue, even if the callback returns true.
    // 
    // Usage:
    // 
    // > jQuery.doTimeout( [ id, ] delay, callback [, arg ... ] );
    // > jQuery.doTimeout( id [, force_mode ] );
    // 
    // Arguments:
    // 
    //  id - (String) An optional unique identifier for this doTimeout. If id is
    //    not specified, the doTimeout will NOT be able to be manually canceled or
    //    forced.
    //  delay - (Number) A zero-or-greater delay in milliseconds after which
    //    callback will be executed. 
    //  callback - (Function) A function to be executed after delay milliseconds.
    //  callback - (String) A jQuery method to be executed after delay
    //    milliseconds. This method will only poll if it explicitly returns
    //    true.
    //  force_mode - (Boolean) If true, execute that id's doTimeout callback
    //    immediately and synchronously, continuing any callback return-true
    //    polling loop. If false, execute the callback immediately and
    //    synchronously but do NOT continue a callback return-true polling loop.
    //    If omitted, cancel that id's doTimeout.
    // 
    // Returns:
    // 
    //  If force_mode is true, false or undefined and there is a
    //  yet-to-be-executed callback to cancel, true is returned, but if no
    //  callback remains to be executed, undefined is returned.

    $[doTimeout] = function() {
        return p_doTimeout.apply(window, [0].concat(aps.call(arguments)));
    };

    // Method: jQuery.fn.doTimeout
    // 
    // Initialize, cancel, or force execution of a callback after a delay.
    // Operates like <jQuery.doTimeout>, but the passed callback executes in the
    // context of the jQuery collection of elements, and the id is stored as data
    // on the first element in that collection.
    // 
    // If delay and callback are specified, a doTimeout is initialized. The
    // callback will execute, asynchronously, after the delay. If an id is
    // specified, this doTimeout will override and cancel any existing doTimeout
    // with the same id. Any additional arguments will be passed into callback
    // when it is executed.
    // 
    // If the callback returns true, the doTimeout loop will execute again, after
    // the delay, creating a polling loop until the callback returns a non-true
    // value.
    // 
    // Note that if an id is not passed as the first argument, this doTimeout will
    // NOT be able to be manually canceled or forced (for debouncing, be sure to
    // specify an id).
    // 
    // If id is specified, but delay and callback are not, the doTimeout will be
    // canceled without executing the callback. If force_mode is specified, the
    // callback will be executed, synchronously, but will only be allowed to
    // continue a polling loop if force_mode is true (provided the callback
    // returns true, of course). If force_mode is false, no polling loop will
    // continue, even if the callback returns true.
    // 
    // Usage:
    // 
    // > jQuery('selector').doTimeout( [ id, ] delay, callback [, arg ... ] );
    // > jQuery('selector').doTimeout( id [, force_mode ] );
    // 
    // Arguments:
    // 
    //  id - (String) An optional unique identifier for this doTimeout, stored as
    //    jQuery data on the element. If id is not specified, the doTimeout will
    //    NOT be able to be manually canceled or forced.
    //  delay - (Number) A zero-or-greater delay in milliseconds after which
    //    callback will be executed. 
    //  callback - (Function) A function to be executed after delay milliseconds.
    //  callback - (String) A jQuery.fn method to be executed after delay
    //    milliseconds. This method will only poll if it explicitly returns
    //    true (most jQuery.fn methods return a jQuery object, and not `true`,
    //    which allows them to be chained and prevents polling).
    //  force_mode - (Boolean) If true, execute that id's doTimeout callback
    //    immediately and synchronously, continuing any callback return-true
    //    polling loop. If false, execute the callback immediately and
    //    synchronously but do NOT continue a callback return-true polling loop.
    //    If omitted, cancel that id's doTimeout.
    // 
    // Returns:
    // 
    //  When creating a <jQuery.fn.doTimeout>, the initial jQuery collection of
    //  elements is returned. Otherwise, if force_mode is true, false or undefined
    //  and there is a yet-to-be-executed callback to cancel, true is returned,
    //  but if no callback remains to be executed, undefined is returned.

    $.fn[doTimeout] = function() {
        var args = aps.call(arguments),
            result = p_doTimeout.apply(this, [doTimeout + args[0]].concat(args));

        return typeof args[0] === 'number' || typeof args[1] === 'number' ?
            this :
            result;
    };

    function p_doTimeout(jquery_data_key) {
        var that = this,
            elem,
            data = {},

            // Allows the plugin to call a string callback method.
            method_base = jquery_data_key ? $.fn : $,

            // Any additional arguments will be passed to the callback.
            args = arguments,
            slice_args = 4,

            id = args[1],
            delay = args[2],
            callback = args[3];

        if (typeof id !== 'string') {
            slice_args--;

            id = jquery_data_key = 0;
            delay = args[1];
            callback = args[2];
        }

        // If id is passed, store a data reference either as .data on the first
        // element in a jQuery collection, or in the internal cache.
        if (jquery_data_key) { // Note: key is 'doTimeout' + id

            // Get id-object from the first element's data, otherwise initialize it to {}.
            elem = that.eq(0);
            elem.data(jquery_data_key, data = elem.data(jquery_data_key) || {});

        } else if (id) {
            // Get id-object from the cache, otherwise initialize it to {}.
            data = cache[id] || (cache[id] = {});
        }

        // Clear any existing timeout for this id.
        data.id && clearTimeout(data.id);
        delete data.id;

        // Clean up when necessary.
        function cleanup() {
            if (jquery_data_key) {
                elem.removeData(jquery_data_key);
            } else if (id) {
                delete cache[id];
            }
        };

        // Yes, there actually is a setTimeout call in here!
        function actually_setTimeout() {
            data.id = setTimeout(function() {
                data.fn();
            }, delay);
        };

        if (callback) {
            // A callback (and delay) were specified. Store the callback reference for
            // possible later use, and then setTimeout.
            data.fn = function(no_polling_loop) {

                // If the callback value is a string, it is assumed to be the name of a
                // method on $ or $.fn depending on where doTimeout was executed.
                if (typeof callback === 'string') {
                    callback = method_base[callback];
                }

                callback.apply(that, aps.call(args, slice_args)) === true && !no_polling_loop

                    // Since the callback returned true, and we're not specifically
                    // canceling a polling loop, do it again!
                    ?
                    actually_setTimeout()

                    // Otherwise, clean up and quit.
                    :
                    cleanup();
            };

            // Set that timeout!
            actually_setTimeout();

        } else if (data.fn) {
            // No callback passed. If force_mode (delay) is true, execute the data.fn
            // callback immediately, continuing any callback return-true polling loop.
            // If force_mode is false, execute the data.fn callback immediately but do
            // NOT continue a callback return-true polling loop. If force_mode is
            // undefined, simply clean up. Since data.fn was still defined, whatever
            // was supposed to happen hadn't yet, so return true.
            delay === undefined ? cleanup() : data.fn(delay === false);
            return true;

        } else {
            // Since no callback was passed, and data.fn isn't defined, it looks like
            // whatever was supposed to happen already did. Clean up and quit!
            cleanup();
        }

    };

})(jQuery);




//CSS3 Animate-it
$('.animatedParent').appear();
$('.animatedClick').click(function() {
    var target = $(this).attr('data-target');


    if ($(this).attr('data-sequence') != undefined) {
        var firstId = $("." + target + ":first").attr('data-id');
        var lastId = $("." + target + ":last").attr('data-id');
        var number = firstId;

        //Add or remove the class
        if ($("." + target + "[data-id=" + number + "]").hasClass('go')) {
            $("." + target + "[data-id=" + number + "]").addClass('goAway');
            $("." + target + "[data-id=" + number + "]").removeClass('go');
        } else {
            $("." + target + "[data-id=" + number + "]").addClass('go');
            $("." + target + "[data-id=" + number + "]").removeClass('goAway');
        }
        number++;
        delay = Number($(this).attr('data-sequence'));
        $.doTimeout(delay, function() {
            console.log(lastId);

            //Add or remove the class
            if ($("." + target + "[data-id=" + number + "]").hasClass('go')) {
                $("." + target + "[data-id=" + number + "]").addClass('goAway');
                $("." + target + "[data-id=" + number + "]").removeClass('go');
            } else {
                $("." + target + "[data-id=" + number + "]").addClass('go');
                $("." + target + "[data-id=" + number + "]").removeClass('goAway');
            }

            //increment
            ++number;

            //continute looping till reached last ID
            if (number <= lastId) {
                return true;
            }
        });
    } else {
        if ($('.' + target).hasClass('go')) {
            $('.' + target).addClass('goAway');
            $('.' + target).removeClass('go');
        } else {
            $('.' + target).addClass('go');
            $('.' + target).removeClass('goAway');
        }
    }
});

$(document.body).on('appear', '.animatedParent', function(e, $affected) {
    var ele = $(this).find('.animated');
    var parent = $(this);


    if (parent.attr('data-sequence') != undefined) {

        var firstId = $(this).find('.animated:first').attr('data-id');
        var number = firstId;
        var lastId = $(this).find('.animated:last').attr('data-id');

        $(parent).find(".animated[data-id=" + number + "]").addClass('go');
        number++;
        delay = Number(parent.attr('data-sequence'));

        $.doTimeout(delay, function() {
            $(parent).find(".animated[data-id=" + number + "]").addClass('go');
            ++number;
            if (number <= lastId) {
                return true;
            }
        });
    } else {
        ele.addClass('go');
    }

});

$(document.body).on('disappear', '.animatedParent', function(e, $affected) {
    if (!$(this).hasClass('animateOnce')) {
        $(this).find('.animated').removeClass('go');
    }
});

$(window).load(function() {
    $.force_appear();
});