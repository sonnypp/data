/** kitadmin-v2.1.0 MIT License By http://kit.zhengjinfan.cn Author Van Zheng */
;"use strict";layui.define(["layer","utils"],function(t){var i=layui.jquery,a=i(window);utils=layui.utils,localStorage=utils.localStorage;var s=function(){this.config={type:"TABS"},this.version="1.0.0"};s.prototype.set=function(t){return i.extend(!0,this.config,t),this},s.prototype.init=function(){e.tabsInit(this),e.toolsInit()};var e={toolsInit:function(){var t=i('[kit-toggle="side"]');t.on("click",function(){var a=i("div[kit-side]"),s=i("div[kit-body]"),e=i("div[kit-tabs-t]"),l=i("div[kit-footer]");switch(t.attr("data-toggle")){case"on":a.animate({width:"0px"}),s.animate({left:"0"}),e.animate({"margin-left":"0"}),l.animate({left:"0"}),i(this).attr("data-toggle","off"),t.find("i.layui-icon").html("&#xe65b;");break;case"off":a.animate({width:"200px"}),s.animate({left:"200px"}),l.animate({left:"200px"}),e.animate({"margin-left":"200px"}),i(this).attr("data-toggle","on"),t.find("i.layui-icon").html("&#xe65a;")}}),a.on("resize",function(){var a=i('[kit-toggle="side"]').attr("data-toggle"),s=this.innerWidth;s<1024&&"on"===a&&t.click(),s>1024&&"off"===a&&t.click()}),a.resize()},tabsInit:function(t){if("TABS"===t.config.type.toUpperCase()){var a=i(".layui-layout-admin");a.append(['<div class="kit-tabs" kit-target="tabs" kit-tabs-t="true">','  <div class="kit-tabs-prev">','    <i class="layui-icon">&#xe65a;</i>',"  </div>",'  <div class="kit-tab">','    <ul class="kit-tab-title" style="left: 0;">','      <li lay-id="1" class="layui-this" data-path="#/">','        <span title="主页"><i class="layui-icon">&#xe68e;</i> 主页</span>',"      </li>","    </ul>","  </div>",'  <div class="kit-tabs-next">','    <i class="layui-icon">&#xe65b;</i>',"  </div>",'  <div class="kit-tabs-tools">','    <i class="layui-icon">&#xe61a;</i>',"  </div>",'  <div class="kit-tabs-toolsbox layui-anim layui-anim-upbit">',"    <ul>",'      <li class="kit-item" data-action="refresh">','        <a href="javascript:;" title="刷新当前标签页">',"          <span>刷新当前标签页</span>","        </a>","      </li>",'      <li class="kit-item-line"></li>','      <li class="kit-item" data-action="closeOther">','        <a href="javascript:;" title="关闭其他标签页">',"          <span>关闭其他标签页</span>","        </a>","      </li>",'      <li class="kit-item" data-action="closeAll">','        <a href="javascript:;" title="关闭所有标签页">',"          <span>关闭所有标签页</span>","        </a>","      </li>",'      <li class="kit-item-line"></li>','      <li class="kit-item layui-this" lay-id="1">','        <a href="#/" title="首页">',"          <span>首页</span>","        </a>","      </li>","    </ul>","  </div>","</div>"].join("")),a.find(".layui-body").html(['<div class="kit-tabs-content" kit-tabs="tabs">','  <div class="kit-tabs-item layui-show" data-rendered="false" data-path="#/" lay-tab-id="1">',"    <router-view></router-view>","  </div>","</div>"].join("")).css("top","90px")}},themeInit:function(){var t=localStorage.getItem("KITADMIN_SETTING_THEME");if(null!==t){layui.utils.isString(t)&&(t=JSON.parse(t));var a=t.theme,s=i("#theme").attr("href"),e=s.substr(0,s.lastIndexOf("/")+1);i("#theme").attr("href",e+a+".css");var l=i("body");l.hasClass("kit-theme-"+a)||l.addClass("kit-theme-"+a)}}};t("kit",new s)});
//# sourceMappingURL=kit.js.map
