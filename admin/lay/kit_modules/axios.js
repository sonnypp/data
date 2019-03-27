/** kitadmin-v2.1.0 MIT License By http://kit.zhengjinfan.cn Author Van Zheng */
;"use strict";
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
    return typeof e
} : function (e) {
    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
};
layui.define(function (e) {
    var t, n;
    t = this, n = function () {
        return function (e) {
            function t(r) {
                if (n[r]) return n[r].exports;
                var o = n[r] = {exports: {}, id: r, loaded: !1};
                return e[r].call(o.exports, o, o.exports, t), o.loaded = !0, o.exports
            }

            var n = {};
            return t.m = e, t.c = n, t.p = "", t(0)
        }([function (e, t, n) {
            e.exports = n(1)
        }, function (e, t, n) {
            function r(e) {
                var t = new a(e), n = i(a.prototype.request, t);
                return o.extend(n, a.prototype, t), o.extend(n, t), n
            }

            var o = n(2), i = n(3), a = n(5), s = n(6), u = r(s);
            u.Axios = a, u.create = function (e) {
                return r(o.merge(s, e))
            }, u.Cancel = n(23), u.CancelToken = n(24), u.isCancel = n(20), u.all = function (e) {
                return Promise.all(e)
            }, u.spread = n(25), e.exports = u, e.exports.default = u
        }, function (e, t, n) {
            function r(e) {
                return "[object Array]" === f.call(e)
            }

            function o(e) {
                return null !== e && "object" == (void 0 === e ? "undefined" : _typeof(e))
            }

            function i(e) {
                return "[object Function]" === f.call(e)
            }

            function a(e, t) {
                if (null !== e && void 0 !== e) if ("object" != (void 0 === e ? "undefined" : _typeof(e)) && (e = [e]), r(e)) for (var n = 0, o = e.length; n < o; n++) t.call(null, e[n], n, e); else for (var i in e) Object.prototype.hasOwnProperty.call(e, i) && t.call(null, e[i], i, e)
            }

            var s = n(3), u = n(4), f = Object.prototype.toString;
            e.exports = {
                isArray: r, isArrayBuffer: function (e) {
                    return "[object ArrayBuffer]" === f.call(e)
                }, isBuffer: u, isFormData: function (e) {
                    return "undefined" != typeof FormData && e instanceof FormData
                }, isArrayBufferView: function (e) {
                    return "undefined" != typeof ArrayBuffer && ArrayBuffer.isView ? ArrayBuffer.isView(e) : e && e.buffer && e.buffer instanceof ArrayBuffer
                }, isString: function (e) {
                    return "string" == typeof e
                }, isNumber: function (e) {
                    return "number" == typeof e
                }, isObject: o, isUndefined: function (e) {
                    return void 0 === e
                }, isDate: function (e) {
                    return "[object Date]" === f.call(e)
                }, isFile: function (e) {
                    return "[object File]" === f.call(e)
                }, isBlob: function (e) {
                    return "[object Blob]" === f.call(e)
                }, isFunction: i, isStream: function (e) {
                    return o(e) && i(e.pipe)
                }, isURLSearchParams: function (e) {
                    return "undefined" != typeof URLSearchParams && e instanceof URLSearchParams
                }, isStandardBrowserEnv: function () {
                    return ("undefined" == typeof navigator || "ReactNative" !== navigator.product) && "undefined" != typeof window && "undefined" != typeof document
                }, forEach: a, merge: function e() {
                    function t(t, r) {
                        "object" == _typeof(n[r]) && "object" == (void 0 === t ? "undefined" : _typeof(t)) ? n[r] = e(n[r], t) : n[r] = t
                    }

                    for (var n = {}, r = 0, o = arguments.length; r < o; r++) a(arguments[r], t);
                    return n
                }, extend: function (e, t, n) {
                    return a(t, function (t, r) {
                        e[r] = n && "function" == typeof t ? s(t, n) : t
                    }), e
                }, trim: function (e) {
                    return e.replace(/^\s*/, "").replace(/\s*$/, "")
                }
            }
        }, function (e, t) {
            e.exports = function (e, t) {
                return function () {
                    for (var n = new Array(arguments.length), r = 0; r < n.length; r++) n[r] = arguments[r];
                    return e.apply(t, n)
                }
            }
        }, function (e, t) {
            function n(e) {
                return !!e.constructor && "function" == typeof e.constructor.isBuffer && e.constructor.isBuffer(e)
            }

            e.exports = function (e) {
                return null != e && (n(e) || "function" == typeof(t = e).readFloatLE && "function" == typeof t.slice && n(t.slice(0, 0)) || !!e._isBuffer);
                var t
            }
        }, function (e, t, n) {
            function r(e) {
                this.defaults = e, this.interceptors = {request: new a, response: new a}
            }

            var o = n(6), i = n(2), a = n(17), s = n(18);
            r.prototype.request = function (e) {
                "string" == typeof e && (e = i.merge({url: arguments[0]}, arguments[1])), (e = i.merge(o, this.defaults, {method: "get"}, e)).method = e.method.toLowerCase();
                var t = [s, void 0], n = Promise.resolve(e);
                for (this.interceptors.request.forEach(function (e) {
                    t.unshift(e.fulfilled, e.rejected)
                }), this.interceptors.response.forEach(function (e) {
                    t.push(e.fulfilled, e.rejected)
                }); t.length;) n = n.then(t.shift(), t.shift());
                return n
            }, i.forEach(["delete", "get", "head", "options"], function (e) {
                r.prototype[e] = function (t, n) {
                    return this.request(i.merge(n || {}, {method: e, url: t}))
                }
            }), i.forEach(["post", "put", "patch"], function (e) {
                r.prototype[e] = function (t, n, r) {
                    return this.request(i.merge(r || {}, {method: e, url: t, data: n}))
                }
            }), e.exports = r
        }, function (e, t, n) {
            function r(e, t) {
                !i.isUndefined(e) && i.isUndefined(e["Content-Type"]) && (e["Content-Type"] = t)
            }

            var o, i = n(2), a = n(7), s = {"Content-Type": "application/x-www-form-urlencoded"}, u = {
                adapter: ("undefined" != typeof XMLHttpRequest ? o = n(8) : "undefined" != typeof process && (o = n(8)), o),
                transformRequest: [function (e, t) {
                    return a(t, "Content-Type"), i.isFormData(e) || i.isArrayBuffer(e) || i.isBuffer(e) || i.isStream(e) || i.isFile(e) || i.isBlob(e) ? e : i.isArrayBufferView(e) ? e.buffer : i.isURLSearchParams(e) ? (r(t, "application/x-www-form-urlencoded;charset=utf-8"), e.toString()) : i.isObject(e) ? (r(t, "application/json;charset=utf-8"), JSON.stringify(e)) : e
                }],
                transformResponse: [function (e) {
                    if ("string" == typeof e) try {
                        e = JSON.parse(e)
                    } catch (e) {
                    }
                    return e
                }],
                timeout: 0,
                xsrfCookieName: "XSRF-TOKEN",
                xsrfHeaderName: "X-XSRF-TOKEN",
                maxContentLength: -1,
                validateStatus: function (e) {
                    return e >= 200 && e < 300
                }
            };
            u.headers = {common: {Accept: "application/json, text/plain, */*"}}, i.forEach(["delete", "get", "head"], function (e) {
                u.headers[e] = {}
            }), i.forEach(["post", "put", "patch"], function (e) {
                u.headers[e] = i.merge(s)
            }), e.exports = u
        }, function (e, t, n) {
            var r = n(2);
            e.exports = function (e, t) {
                r.forEach(e, function (n, r) {
                    r !== t && r.toUpperCase() === t.toUpperCase() && (e[t] = n, delete e[r])
                })
            }
        }, function (e, t, n) {
            var r = n(2), o = n(9), i = n(12), a = n(13), s = n(14), u = n(10),
                f = "undefined" != typeof window && window.btoa && window.btoa.bind(window) || n(15);
            e.exports = function (e) {
                return new Promise(function (t, c) {
                    var p = e.data, d = e.headers;
                    r.isFormData(p) && delete d["Content-Type"];
                    var l = new XMLHttpRequest, h = "onreadystatechange", m = !1;
                    if ("undefined" == typeof window || !window.XDomainRequest || "withCredentials" in l || s(e.url) || (l = new window.XDomainRequest, h = "onload", m = !0, l.onprogress = function () {
                    }, l.ontimeout = function () {
                    }), e.auth) {
                        var y = e.auth.username || "", v = e.auth.password || "";
                        d.Authorization = "Basic " + f(y + ":" + v)
                    }
                    if (l.open(e.method.toUpperCase(), i(e.url, e.params, e.paramsSerializer), !0), l.timeout = e.timeout, l[h] = function () {
                        if (l && (4 === l.readyState || m) && (0 !== l.status || l.responseURL && 0 === l.responseURL.indexOf("file:"))) {
                            var n = "getAllResponseHeaders" in l ? a(l.getAllResponseHeaders()) : null, r = {
                                data: e.responseType && "text" !== e.responseType ? l.response : l.responseText,
                                status: 1223 === l.status ? 204 : l.status,
                                statusText: 1223 === l.status ? "No Content" : l.statusText,
                                headers: n,
                                config: e,
                                request: l
                            };
                            o(t, c, r), l = null
                        }
                    }, l.onerror = function () {
                        c(u("Network Error", e, null, l)), l = null
                    }, l.ontimeout = function () {
                        c(u("timeout of " + e.timeout + "ms exceeded", e, "ECONNABORTED", l)), l = null
                    }, r.isStandardBrowserEnv()) {
                        var w = n(16),
                            g = (e.withCredentials || s(e.url)) && e.xsrfCookieName ? w.read(e.xsrfCookieName) : void 0;
                        g && (d[e.xsrfHeaderName] = g)
                    }
                    if ("setRequestHeader" in l && r.forEach(d, function (e, t) {
                        void 0 === p && "content-type" === t.toLowerCase() ? delete d[t] : l.setRequestHeader(t, e)
                    }), e.withCredentials && (l.withCredentials = !0), e.responseType) try {
                        l.responseType = e.responseType
                    } catch (t) {
                        if ("json" !== e.responseType) throw t
                    }
                    "function" == typeof e.onDownloadProgress && l.addEventListener("progress", e.onDownloadProgress), "function" == typeof e.onUploadProgress && l.upload && l.upload.addEventListener("progress", e.onUploadProgress), e.cancelToken && e.cancelToken.promise.then(function (e) {
                        l && (l.abort(), c(e), l = null)
                    }), void 0 === p && (p = null), l.send(p)
                })
            }
        }, function (e, t, n) {
            var r = n(10);
            e.exports = function (e, t, n) {
                var o = n.config.validateStatus;
                n.status && o && !o(n.status) ? t(r("Request failed with status code " + n.status, n.config, null, n.request, n)) : e(n)
            }
        }, function (e, t, n) {
            var r = n(11);
            e.exports = function (e, t, n, o, i) {
                var a = new Error(e);
                return r(a, t, n, o, i)
            }
        }, function (e, t) {
            e.exports = function (e, t, n, r, o) {
                return e.config = t, n && (e.code = n), e.request = r, e.response = o, e
            }
        }, function (e, t, n) {
            function r(e) {
                return encodeURIComponent(e).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(/%20/g, "+").replace(/%5B/gi, "[").replace(/%5D/gi, "]")
            }

            var o = n(2);
            e.exports = function (e, t, n) {
                if (!t) return e;
                var i;
                if (n) i = n(t); else if (o.isURLSearchParams(t)) i = t.toString(); else {
                    var a = [];
                    o.forEach(t, function (e, t) {
                        null !== e && void 0 !== e && (o.isArray(e) && (t += "[]"), o.isArray(e) || (e = [e]), o.forEach(e, function (e) {
                            o.isDate(e) ? e = e.toISOString() : o.isObject(e) && (e = JSON.stringify(e)), a.push(r(t) + "=" + r(e))
                        }))
                    }), i = a.join("&")
                }
                return i && (e += (-1 === e.indexOf("?") ? "?" : "&") + i), e
            }
        }, function (e, t, n) {
            var r = n(2),
                o = ["age", "authorization", "content-length", "content-type", "etag", "expires", "from", "host", "if-modified-since", "if-unmodified-since", "last-modified", "location", "max-forwards", "proxy-authorization", "referer", "retry-after", "user-agent"];
            e.exports = function (e) {
                var t, n, i, a = {};
                return e ? (r.forEach(e.split("\n"), function (e) {
                    if (i = e.indexOf(":"), t = r.trim(e.substr(0, i)).toLowerCase(), n = r.trim(e.substr(i + 1)), t) {
                        if (a[t] && o.indexOf(t) >= 0) return;
                        a[t] = "set-cookie" === t ? (a[t] ? a[t] : []).concat([n]) : a[t] ? a[t] + ", " + n : n
                    }
                }), a) : a
            }
        }, function (e, t, n) {
            var r = n(2);
            e.exports = r.isStandardBrowserEnv() ? function () {
                function e(e) {
                    var t = e;
                    return n && (o.setAttribute("href", t), t = o.href), o.setAttribute("href", t), {
                        href: o.href,
                        protocol: o.protocol ? o.protocol.replace(/:$/, "") : "",
                        host: o.host,
                        search: o.search ? o.search.replace(/^\?/, "") : "",
                        hash: o.hash ? o.hash.replace(/^#/, "") : "",
                        hostname: o.hostname,
                        port: o.port,
                        pathname: "/" === o.pathname.charAt(0) ? o.pathname : "/" + o.pathname
                    }
                }

                var t, n = /(msie|trident)/i.test(navigator.userAgent), o = document.createElement("a");
                return t = e(window.location.href), function (n) {
                    var o = r.isString(n) ? e(n) : n;
                    return o.protocol === t.protocol && o.host === t.host
                }
            }() : function () {
                return !0
            }
        }, function (e, t) {
            function n() {
                this.message = "String contains an invalid character"
            }

            var r = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
            n.prototype = new Error, n.prototype.code = 5, n.prototype.name = "InvalidCharacterError", e.exports = function (e) {
                for (var t, o, i = String(e), a = "", s = 0, u = r; i.charAt(0 | s) || (u = "=", s % 1); a += u.charAt(63 & t >> 8 - s % 1 * 8)) {
                    if ((o = i.charCodeAt(s += .75)) > 255) throw new n;
                    t = t << 8 | o
                }
                return a
            }
        }, function (e, t, n) {
            var r = n(2);
            e.exports = r.isStandardBrowserEnv() ? {
                write: function (e, t, n, o, i, a) {
                    var s = [];
                    s.push(e + "=" + encodeURIComponent(t)), r.isNumber(n) && s.push("expires=" + new Date(n).toGMTString()), r.isString(o) && s.push("path=" + o), r.isString(i) && s.push("domain=" + i), !0 === a && s.push("secure"), document.cookie = s.join("; ")
                }, read: function (e) {
                    var t = document.cookie.match(new RegExp("(^|;\\s*)(" + e + ")=([^;]*)"));
                    return t ? decodeURIComponent(t[3]) : null
                }, remove: function (e) {
                    this.write(e, "", Date.now() - 864e5)
                }
            } : {
                write: function () {
                }, read: function () {
                    return null
                }, remove: function () {
                }
            }
        }, function (e, t, n) {
            function r() {
                this.handlers = []
            }

            var o = n(2);
            r.prototype.use = function (e, t) {
                return this.handlers.push({fulfilled: e, rejected: t}), this.handlers.length - 1
            }, r.prototype.eject = function (e) {
                this.handlers[e] && (this.handlers[e] = null)
            }, r.prototype.forEach = function (e) {
                o.forEach(this.handlers, function (t) {
                    null !== t && e(t)
                })
            }, e.exports = r
        }, function (e, t, n) {
            function r(e) {
                e.cancelToken && e.cancelToken.throwIfRequested()
            }

            var o = n(2), i = n(19), a = n(20), s = n(6), u = n(21), f = n(22);
            e.exports = function (e) {
                return r(e), e.baseURL && !u(e.url) && (e.url = f(e.baseURL, e.url)), e.headers = e.headers || {}, e.data = i(e.data, e.headers, e.transformRequest), e.headers = o.merge(e.headers.common || {}, e.headers[e.method] || {}, e.headers || {}), o.forEach(["delete", "get", "head", "post", "put", "patch", "common"], function (t) {
                    delete e.headers[t]
                }), (e.adapter || s.adapter)(e).then(function (t) {
                    return r(e), t.data = i(t.data, t.headers, e.transformResponse), t
                }, function (t) {
                    return a(t) || (r(e), t && t.response && (t.response.data = i(t.response.data, t.response.headers, e.transformResponse))), Promise.reject(t)
                })
            }
        }, function (e, t, n) {
            var r = n(2);
            e.exports = function (e, t, n) {
                return r.forEach(n, function (n) {
                    e = n(e, t)
                }), e
            }
        }, function (e, t) {
            e.exports = function (e) {
                return !(!e || !e.__CANCEL__)
            }
        }, function (e, t) {
            e.exports = function (e) {
                return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)
            }
        }, function (e, t) {
            e.exports = function (e, t) {
                return t ? e.replace(/\/+$/, "") + "/" + t.replace(/^\/+/, "") : e
            }
        }, function (e, t) {
            function n(e) {
                this.message = e
            }

            n.prototype.toString = function () {
                return "Cancel" + (this.message ? ": " + this.message : "")
            }, n.prototype.__CANCEL__ = !0, e.exports = n
        }, function (e, t, n) {
            function r(e) {
                if ("function" != typeof e) throw new TypeError("executor must be a function.");
                var t;
                this.promise = new Promise(function (e) {
                    t = e
                });
                var n = this;
                e(function (e) {
                    n.reason || (n.reason = new o(e), t(n.reason))
                })
            }

            var o = n(23);
            r.prototype.throwIfRequested = function () {
                if (this.reason) throw this.reason
            }, r.source = function () {
                var e;
                return {
                    token: new r(function (t) {
                        e = t
                    }), cancel: e
                }
            }, e.exports = r
        }, function (e, t) {
            e.exports = function (e) {
                return function (t) {
                    return e.apply(null, t)
                }
            }
        }])
    }, "object" == (void 0 === e ? "undefined" : _typeof(e)) && "object" == ("undefined" == typeof module ? "undefined" : _typeof(module)) ? module.exports = n() : "function" == typeof define && define.amd ? define([], n) : "object" == (void 0 === e ? "undefined" : _typeof(e)) ? e.axios = n() : t.axios = n(), e("axios", axios)
});
//# sourceMappingURL=axios.js.map
