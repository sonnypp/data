/** kitadmin-v2.1.0 MIT License By http://kit.zhengjinfan.cn Author Van Zheng */
;"use strict";
var mods = ["element", "sidebar", "mockjs", "select", "tabs", "menu", "route", "utils", "component", "kit"];
layui.define(mods, function (e) {
    layui.element;
    var t = layui.utils, a = layui.jquery, n = (layui.lodash, layui.route), i = layui.tabs, l = layui.layer,
        o = layui.menu, m = layui.component, s = layui.kit, p = function () {
            this.config = {elem: "#app", loadType: "SPA"}, this.version = "1.0.0"
        };
    p.prototype.ready = function (e) {
        var i = this.config, o = (0, t.localStorage.getItem)("KITADMIN_SETTING_LOADTYPE");
        null !== o && void 0 !== o.loadType && (i.loadType = o.loadType), s.set({type: i.loadType}).init(), u.routeInit(i), u.menuInit(i), "TABS" === i.loadType && u.tabsInit(), "" === location.hash && t.setUrlState("主页", "#/"), layui.sidebar.render({
            elem: "#ccleft",
            title: "这是左侧打开的栗子",
            shade: !0,
            direction: "left",
            dynamicRender: !0,
            url: "views/order/orderdetail.html",
            width: "50%"
        }), a("#cc").on("click", function () {
            layui.sidebar.render({
                elem: this,
                title: "这是表单盒子",
                shade: !0,
                dynamicRender: !0,
                url: "/order/detail",
                width: "50%"
            })
        }), m.on("nav(header_right)", function (e) {
            var t = e.elem.attr("kit-target");
            "setting" === t && layui.sidebar.render({
                elem: e.elem,
                title: "设置",
                shade: !0,
                dynamicRender: !0,
                url: "views/setting.html"
            }), "help" === t && l.alert("QQ联系：384282882，2773140170")
        })
    };
    var u = {
        routeInit: function (e) {
            var t = this, a = {
                routes: [{
                    path: "/",
                    component: "views/index/index.html",
                    name: "首页"
                },{
                    path: "/picture/indexbanner1",
                    component: "views/picture/indexbanner1.html",
                    name: "首页banner1"
                },{
                    path: "/data/show",
                    component: "views/data/show.html",
                    name: "数据展示"
                },{
                    path: "/data/sales",
                    component: "views/data/sales.html",
                    name: "销售额数据展示"
                },{
                    path: "/data/salevolume",
                    component: "views/data/salevolume.html",
                    name: "销售量数据展示"
                },{
                    path: "/picture/indexbanner2",
                    component: "views/picture/indexbanner2.html",
                    name: "首页banner2"
                },{
                    path: "/picture/indexbanner3",
                    component: "views/picture/indexbanner3.html",
                    name: "首页banner3"
                },{
                    path: "/picture/recommendbanner",
                    component: "views/picture/recommendbanner.html",
                    name: "推荐页banner"
                },{
                    path: "/picture/logolist",
                    component: "views/picture/logolist.html",
                    name: "logo图标"
                },{
                    path: "/picture/cartbanner",
                    component: "views/picture/cartbanner.html",
                    name: "购物车banner"
                },{
                    path: "/user/list",
                    component: "views/user/list.html",
                    name: "用户列表"
                },{
                    path:"/user/add",
                    component:"views/user/add.html",
                    name:"用户添加"
                },{
                    path:"/order/list",
                    component:"views/order/list.html",
                    name:"订单列表"
                },{
                    path: "/order/detail",
                    component: "views/order/orderdetail.html",
                    name: "订单详情页"
                },{
                    path:"/food/list",
                    component:"views/food/list.html",
                    name:"食品列表"
                },{
                    path:"/food/addfood",
                    component:"views/food/addfood.html",
                    name:"食品添加"
                },{
                    path:"/information/list",
                    component:"views/information/list.html",
                    name:"资讯列表"
                },{
                    path:"/information/addinformation",
                    component:"views/information/addinformation.html",
                    name:"资讯添加"
                },{
                    path:"/food/catelist",
                    component:"views/food/catelist.html",
                    name:"类别列表"
                },{
                    path:"/food/addfoodcate",
                    component:"views/food/addfoodcate.html",
                    name:"类别添加"
                },{
                    path:"/liuyan/list",
                    component:"views/liuyan/list.html",
                    name:"留言列表"
                },{
                    path:"/gonggao/list",
                    component:"views/gonggao/list.html",
                    name:"公告列表"
                }]
            };
            return "TABS" === e.loadType && (a.onChanged = function () {
                i.existsByPath(location.hash) ? i.switchByPath(location.hash) : t.addTab(location.hash, (new Date).getTime())
            }), n.setRoutes(a), this
        }, addTab: function (e, t) {
            var a = n.getRoute(e);
            a && i.add({id: t, title: a.name, path: e, component: a.component, rendered: !1, icon: "&#xe62e;"})
        }, menuInit: function (e) {
            var t = this;
            return o.set({
                dynamicRender: !1, isJump: "SPA" === e.loadType, onClicked: function (a) {
                    if ("TABS" === e.loadType && !a.hasChild) {
                        var n = a.data, i = n.href, l = n.layid;
                        t.addTab(i, l)
                    }
                }, elem: "#menu-box", remote: {url: "/api/getmenus", method: "post"}, cached: !1
            }).render(), t
        }, tabsInit: function () {
            i.set({
                onChanged: function (e) {
                }
            }).render(function (e) {
                e.isIndex && n.render("#/")
            })
        }
    };
    (new p).ready(function () {
        console.log("Init successed.")
    }), e("admin", {})
});
//# sourceMappingURL=admin.js.map