! function(t) {
	function e(o) {
		if(n[o]) return n[o].exports;
		var i = n[o] = {
			"i": o,
			"l": !1,
			"exports": {}
		};
		return t[o].call(i.exports, i, i.exports, e), i.l = !0, i.exports
	}
	var n = {};
	e.m = t, e.c = n, e.i = function(t) {
		return t
	}, e.d = function(t, n, o) {
		e.o(t, n) || Object.defineProperty(t, n, {
			"configurable": !1,
			"enumerable": !0,
			"get": o
		})
	}, e.n = function(t) {
		var n = t && t.__esModule ? function() {
			return t["default"]
		} : function() {
			return t
		};
		return e.d(n, "a", n), n
	}, e.o = function(t, e) {
		return Object.prototype.hasOwnProperty.call(t, e)
	}, e.p = "http://assets.to8to.com/to8to_pc/", e(e.s = "1bjH")
}({
	"0": function(t, e) {
		t.exports = jQuery
	},
	"1bjH": function(t, e, n) {
		"use strict";
		var o, i, o, r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
			return typeof t
		} : function(t) {
			return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
		};
		! function(u, a) {
			"object" === r(e) ? t.exports = a(n(0)) : n("LGuY").cmd ? void 0 !== (o = function(t, e, o) {
				return a(n(0))
			}.call(e, n, e, t)) && (t.exports = o) : (i = [! function() {
				var t = new Error('Cannot find module "jQuery"');
				throw t.code = "MODULE_NOT_FOUND", t
			}()], void 0 !== (o = function(t) {
				return a(t)
			}.apply(e, i)) && (t.exports = o))
		}(0, function(t) {
			return window.T8tCommon = {}, t("body").on("mouseover", ".breadcrumb-pre-list", function() {
				t(".breadcrumb-list").hide(), t(this).find(".breadcrumb-list").show()
			}).on("mouseout", ".breadcrumb-pre-list", function() {
				t(".breadcrumb-list").hide()
			}), T8tCommon.isGroundCity = function(e, n) {
				function o(t) {
					for(var n = i.length, o = 0; o < n; o++)
						if(e == i[o]) return void t(!0);
					t(!1)
				}
				var i = [],
					r = sessionStorage.getItem("groundCity");
				r && r.length > 0 ? (i = r.split(","), o(n)) : t.ajax({
					"type": "GET",
					"dataType": "jsonp",
					"url": "http://www.to8to.com/api/getindexdata.php?type=ldcity",
					"success": function(t) {
						sessionStorage.setItem("groundCity", t), i = t, o(n)
					}
				})
			}, T8tCommon.autoImgPosition = function() {
				t(".img-position img.img").each(function(e, n) {
					var o = t(this),
						i = o.closest(".img-position"),
						r = i.height(),
						u = i.width() / r,
						a = o.closest(".img-position-box"),
						s = new Image;
					s.onload = function() {
						var t = this.width / this.height;
						if(t > u) {
							a.addClass("fix-height");
							var e = t * r;
							a.width(e)
						} else a.addClass("fix-width")
					}, s.src = o.attr("src")
				})
			}, T8tCommon.dataSave = function() {
				var t = window.localStorage;
				if(t) var e = {
					"set": function(e, n) {
						null !== this.get(e) && this.remove(e), t.setItem(e, n)
					},
					"get": function(e) {
						var n = t.getItem(e);
						return void 0 === n ? null : n
					},
					"remove": function(e) {
						t.removeItem(e)
					},
					"clear": function() {
						t.clear()
					},
					"each": function(e) {
						for(var n, o = t.length, i = 0, e = e || function() {}; i < o && (n = t.key(i), !1 !== e.call(this, n, this.get(n))); i++) t.length < o && (o--, i--)
					}
				};
				else var e = {
					"file": window.location.hostname || "localStorage",
					"keyCache": "localStorageKeyCache",
					"keySplit": ",",
					"o": null,
					"init": function() {
						if(!this.o) try {
							var e = document.body || document.getElementsByTagName("head")[0] || document.documentElement,
								n = document.createElement("input");
							n.type = "hidden", n.addBehavior("#default#userData"), e.appendChild(n);
							var o = new Date;
							o.setDate(o.getDate() + 365), n.expires = o.toUTCString(), this.o = n, t.length = this.cacheKey(0, 4)
						} catch(i) {
							return !1
						}
						return !0
					},
					"cacheKey": function(t, e) {
						if(this.init()) {
							var n = this.o;
							n.load(this.keyCache);
							var o = n.getAttribute("keys") || "",
								i = o ? o.split(this.keySplit) : [],
								r = i.length,
								u = 0,
								a = !1;
							if(3 === e) return i;
							if(4 === e) return r;
							for(t = t.toLowerCase(); u < r; u++) i[u] === t && (a = !0, 2 === e && (i.splice(u, 1), r--, u--));
							1 !== e || a || i.push(t), n.setAttribute("keys", i.join(this.keySplit)), n.save(this.keyCache)
						}
					},
					"set": function(t, e) {
						if(this.init()) {
							var n = this.o;
							return this.cacheKey(t, null === e ? 2 : 1), n.load(this.file), null === e ? n.removeAttribute(t) : n.setAttribute(t, e + ""), n.save(this.file), e
						}
						return null
					},
					"get": function(t) {
						if(this.init()) {
							var e = this.o;
							return e.load(this.file), e.getAttribute(t) || null
						}
						return null
					},
					"clear": function() {
						if(this.init())
							for(var t = this.cacheKey(0, 3), e = t.length, n = 0; n < e; n++) this.item(t[n], null)
					}
				};
				return window.city_data = window.city_data || e
			}, T8tCommon
		})
	},
	"LGuY": function(t, e) {
		t.exports = function() {
			throw new Error("define cannot be used indirect")
		}
	}
});