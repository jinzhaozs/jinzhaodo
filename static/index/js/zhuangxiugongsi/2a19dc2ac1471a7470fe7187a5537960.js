"object" != typeof JSON && (JSON = {}),
	function() {
		"use strict";

		function f(t) {
			return 10 > t ? "0" + t : t
		}

		function quote(t) {
			return escapable.lastIndex = 0, escapable.test(t) ? '"' + t.replace(escapable, function(t) {
				var e = meta[t];
				return "string" == typeof e ? e : "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
			}) + '"' : '"' + t + '"'
		}

		function str(t, e) {
			var i, n, o, r, a, s = gap,
				f = e[t];
			switch(f && "object" == typeof f && "function" == typeof f.toJSON && (f = f.toJSON(t)), "function" == typeof rep && (f = rep.call(e, t, f)), typeof f) {
				case "string":
					return quote(f);
				case "number":
					return isFinite(f) ? String(f) : "null";
				case "boolean":
				case "null":
					return String(f);
				case "object":
					if(!f) return "null";
					if(gap += indent, a = [], "[object Array]" === Object.prototype.toString.apply(f)) {
						for(r = f.length, i = 0; r > i; i += 1) a[i] = str(i, f) || "null";
						return o = 0 === a.length ? "[]" : gap ? "[\n" + gap + a.join(",\n" + gap) + "\n" + s + "]" : "[" + a.join(",") + "]", gap = s, o
					}
					if(rep && "object" == typeof rep)
						for(r = rep.length, i = 0; r > i; i += 1) "string" == typeof rep[i] && (n = rep[i], o = str(n, f), o && a.push(quote(n) + (gap ? ": " : ":") + o));
					else
						for(n in f) Object.prototype.hasOwnProperty.call(f, n) && (o = str(n, f), o && a.push(quote(n) + (gap ? ": " : ":") + o));
					return o = 0 === a.length ? "{}" : gap ? "{\n" + gap + a.join(",\n" + gap) + "\n" + s + "}" : "{" + a.join(",") + "}", gap = s, o
			}
		}
		"function" != typeof Date.prototype.toJSON && (Date.prototype.toJSON = function() {
			return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
		}, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
			return this.valueOf()
		});
		var cx, escapable, gap, indent, meta, rep;
		"function" != typeof JSON.stringify && (escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, meta = {
			"\b": "\\b",
			"  ": "\\t",
			"\n": "\\n",
			"\f": "\\f",
			"\r": "\\r",
			'"': '\\"',
			"\\": "\\\\"
		}, JSON.stringify = function(t, e, i) {
			var n;
			if(gap = "", indent = "", "number" == typeof i)
				for(n = 0; i > n; n += 1) indent += " ";
			else "string" == typeof i && (indent = i);
			if(rep = e, e && "function" != typeof e && ("object" != typeof e || "number" != typeof e.length)) throw new Error("JSON.stringify");
			return str("", {
				"": t
			})
		}), "function" != typeof JSON.parse && (cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, JSON.parse = function(text, reviver) {
			function walk(t, e) {
				var i, n, o = t[e];
				if(o && "object" == typeof o)
					for(i in o) Object.prototype.hasOwnProperty.call(o, i) && (n = walk(o, i), void 0 !== n ? o[i] = n : delete o[i]);
				return reviver.call(t, e, o)
			}
			var j;
			if(text = String(text), cx.lastIndex = 0, cx.test(text) && (text = text.replace(cx, function(t) {
					return "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4)
				})), /^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return j = eval("(" + text + ")"), "function" == typeof reviver ? walk({
				"": j
			}, "") : j;
			throw new SyntaxError("JSON.parse")
		})
	}(), define = window.define ? window.define : function(t, e) {
		(e = e || t)(function() {}, window, window)
	}, define(function(t, e, i) {
		function n() {
			return "undefined" != typeof navigator.cookieEnabled && navigator.cookieEnabled
		}

		function o(t) {
			var e, i = 0;
			for(e in t) t.hasOwnProperty(e) && i++;
			return i
		}

		function r(t, e, i, n) {
			i = new Date, i.setTime(i.getTime() + 2592e6);
			var o = "";
			n && (o = "domain=" + n + ";"), document.cookie = t + "=" + e + ";expires=" + i.toGMTString() + ";path=/;" + o
		}

		function a(t, e) {
			e && (t = "to8to_" + t);
			var i = document.cookie.match(new RegExp("(\\b)" + t + "=([^;]*)(;|$)"));
			return i ? decodeURIComponent(i[2]) : ""
		}
		var s = window.jQuery || t("jquery"),
			f = {
				timeout_id: "clickStreamTimeout",
				vt: "",
				cd: "",
				gu: "",
				lastUrl: "",
				tag_id: "",
				item: 0,
				sendSpeed: 4e3,
				firefoxEnable: !0,
				sendCvTime: 4e3,
				cvTimtOut: 0,
				allowSend: !0,
				data: {
					pv: {},
					cv: {}
				},
				clearTimeOut: function() {
					clearTimeout(this.timeout_id)
				},
				createGuid: function() {
					for(var t = "", e = 1; 32 >= e; e++) {
						var i = Math.floor(16 * Math.random()).toString(16),
							t = t + i;
						8 != e && 12 != e && 16 != e && 20 != e || (t += "")
					}
					return this.guid = t += Math.ceil(1e6 * Math.random())
				},
				sendPvTimeout: function() {
					if(!0 !== this.allowSend) return !1;
					var t = this;
					clearTimeout(t.timeout_id), this.timeout_id = setTimeout(function() {
						t.sendPv("refreshSpeed"), t.data.pv.vt = t.getDate()
					}, t.sendSpeed), this.allowSend = !1
				},
				refreshSpeed: function() {
					32e3 > this.sendSpeed && (this.sendSpeed *= 2)
				},
				newPv: function() {
					var t = Math.floor(1e5 * Math.random());
					this.cd = (new Date).getTime().toString() + t.toString(), this.vt = this.getDate(), this.gu = window.location.href, this.lastUrl = document.referrer, r("to8to_cook", "OkOcClPzRWV8ZFJlCIF4Ag==", 7776e3, ".to8to.com")
				},
				getPvParams: function() {
					this.data.pv = {}, this.data.pv.lu = this.lastUrl, this.data.pv.ly = 1, this.data.pv.vt = this.vt, this.data.pv.cd = this.cd, this.data.pv.gu = this.gu, this.data.pv.ov = this.detectOS(), this.data.pv.ds = screen.width + "*" + screen.height
				},
				getCvParams: function(t, e, i) {
					window.location.href.indexOf("---ptag_test---") != -1 && alert(t), this.data.cv[this.item] = {};
					var n = (new Date).getTime(),
						o = Math.floor(1e5 * Math.random());
					e && e instanceof Object && (this.data.cv[this.item].ex = e), this.data.cv[this.item].lu = document.referrer, this.data.cv[this.item].ly = i ? 3 : 2, this.data.cv[this.item].cg = t, this.data.cv[this.item].cd = n.toString() + o.toString(), this.data.cv[this.item].vt = this.getDate(), this.data.cv[this.item].gu = window.location.href, this.data.cv[this.item].ov = this.detectOS(), this.data.cv[this.item].ds = screen.width + "*" + screen.height, this.item++, this.sendCv()
				},
				getTo8toCid: function() {
					return a("to8tocookieid")
				},
				sendPv: function(t) {
					this.data.cid = this.getTo8toCid(), this.data.pv.lt = this.getDate();
					var e = JSON.stringify(this.data);
					s("#clickValId").val(e), s("#frm_dealer").submit(), this.data.cv = {}, this.item = 0, this.data.pv.vt = this.getDate(), this.allowSend = !0, "function" == typeof f[t] && f[t]()
				},
				sendCv: function() {
					var t = this;
					return !!o(this.data.cv) && (clearTimeout(this.cvTimtOut), clearTimeout(this.timeout_id), void(this.cvTimtOut = setTimeout(function() {
						t.sendPv("flushTimeout")
					}, t.sendCvTime)))
				},
				flushTimeout: function() {
					32e3 > this.sendCvTime && (this.sendCvTime *= 2)
				},
				createIframe: function() {
					var t;
					t = "<iframe frameborder='0' height='0' name='frm_dealer' id='clsIframe'></iframe><form action='http://www.to8to.com/count/a682ab23d4b4c95f84c744b2826419cd.php' method='POST' id = 'frm_dealer' target='frm_dealer'>", t += "<input type='hidden' id='clickValId' name='key' value=''>", t += "</form>", s("body").append(t)
				},
				getDate: function() {
					var t = new Date,
						e = t.getFullYear(),
						i = t.getMonth() + 1,
						i = 10 > i ? "0" + i : i,
						n = t.getDate(),
						n = 10 > n ? "0" + n : n,
						o = t.getHours(),
						o = 10 > o ? "0" + o : o,
						r = t.getMinutes(),
						r = 10 > r ? "0" + r : r,
						a = t.getSeconds(),
						a = 10 > a ? "0" + a : a,
						t = t.getMilliseconds();
					return e.toString() + i.toString() + n.toString() + o.toString() + r.toString() + a.toString() + "." + t
				},
				initCookie: function() {
					if(!a("to8tocookieid")) {
						var t = f.createGuid();
						r("to8tocookieid", t, 7776e3, "to8to.com")
					}
				},
				detectOS: function() {
					var t = navigator.userAgent,
						e = "Win32" == navigator.platform || "Windows" == navigator.platform,
						i = "Mac68K" == navigator.platform || "MacPPC" == navigator.platform || "Macintosh" == navigator.platform || "MacIntel" == navigator.platform;
					if(i) return "09";
					if("X11" == navigator.platform && !e && !i) return "08";
					var i = -1 < String(navigator.platform).indexOf("Linux"),
						n = "android" == t.toLowerCase().match(/android/i);
					if(i) return n ? "07" : "06";
					if(e) {
						if(-1 < t.indexOf("Windows NT 5.0") || -1 < t.indexOf("Windows 2000")) return "05";
						if(-1 < t.indexOf("Windows NT 5.1") || -1 < t.indexOf("Windows XP")) return "04";
						if(-1 < t.indexOf("Windows NT 5.2") || -1 < t.indexOf("Windows 2003")) return "03";
						if(-1 < t.indexOf("Windows NT 6.0") || -1 < t.indexOf("Windows Vista")) return "02";
						if(-1 < t.indexOf("Windows NT 6.1") || -1 < t.indexOf("Windows 7")) return "01"
					}
					return "404"
				},
				isVisiable: function(t) {
					var e = s(window).height(),
						i = s(window).scrollTop(),
						n = t.offsetTop;
					return n >= i && n < e + i
				},
				getExposeParams: function(t, e) {
					if(s(t).attr("data-expose")) return !1;
					var e = e || s(t).attr("data-ptag") || s(t).val() || "";
					f.getCvParams(e, "", !0), s(t).attr("data-expose", !0)
				},
				init: function() {
					return !!n() && (f.initCookie(), f.newPv(), f.getPvParams(), f.createIframe(), f.sendPv(), void f.bindEvents())
				},
				bindEvents: function() {
					s(".expose-stream").each(function(t) {
						f.isVisiable(this) && f.getExposeParams(this)
					}), s(document).bind("click", function() {
						f.sendPvTimeout()
					}), s(window).bind("scroll", function() {
						f.sendPvTimeout(), s(".expose-stream").each(function(t) {
							f.isVisiable(this) && f.getExposeParams(this)
						})
					}), s(document).bind("mousemove", function() {
						f.sendPvTimeout()
					})
				}
			};
		window.clickStream = f, s(document).ready(function() {
			f.init()
		}), window.onbeforeunload = function() {
			f.sendPv()
		}
	});