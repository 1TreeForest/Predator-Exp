(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-category-main"],{"02a1":function(t,e,a){"use strict";var n;a.d(e,"b",(function(){return i})),a.d(e,"c",(function(){return r})),a.d(e,"a",(function(){return n}));var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",[a("div",{staticClass:"category"},[a("div",{staticClass:"search",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.tosearch.apply(void 0,arguments)}}},[a("div",{staticClass:"ser"},[a("span",{staticClass:"icon"}),a("span",[t._v("商品搜索")])])]),a("div",{staticClass:"content"},[a("v-uni-scroll-view",{staticClass:"left",attrs:{"scroll-y":"true"}},t._l(t.listData,(function(e,n){return a("div",{key:n,staticClass:"iconText",class:[n==t.nowIndex?"active":""],on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.selectitem(e.cat_id,n,e.cat_name)}}},[t._v(t._s(e.cat_name))])})),0),a("v-uni-scroll-view",{staticClass:"right",attrs:{"scroll-y":"true"}},[a("div",{staticClass:"banner"},[a("img",{attrs:{src:t.banner_url,alt:""}})]),a("div",{staticClass:"title"},[a("span",[t._v("—")]),a("span",[t._v(t._s(t.name)+"分类")]),a("span",[t._v("—")])]),0!=t.datalength?a("div",{staticClass:"bottom"},t._l(t.detailData,(function(e,n){return a("div",{key:n,staticClass:"item",on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.categoryList(e.cat_id)}}},[a("img",{attrs:{src:e.pic,alt:""}}),a("span",[t._v(t._s(e.cat_name))])])})),0):a("div",{staticStyle:{"font-size":"18upx","text-align":"center"}},[t._v("该分类下暂无其他子分类,我们会尽快添加~~")])])],1)])])},r=[]},"15b0":function(t,e,a){var n=a("24fb");e=n(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.category[data-v-9080916e]{width:100%;height:100vh;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column}.category .search[data-v-9080916e]{height:%?88?%;padding:0 %?30?%;background:#fff;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;border-bottom:%?1?% solid #ededed}.category .search .ser[data-v-9080916e]{width:%?690?%;height:%?56?%;background:#ededed;border-radius:%?8?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.category .search .ser span[data-v-9080916e]{display:inline-block}.category .search .ser .icon[data-v-9080916e]{background:url(https://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/search.png) 50% no-repeat;background-size:100%;width:%?28?%;height:%?28?%;margin-right:%?10?%}.category .content[data-v-9080916e]{-webkit-box-flex:1;-webkit-flex:1;flex:1;background:#fff;display:-webkit-box;display:-webkit-flex;display:flex;height:100vh}.category .content .left[data-v-9080916e]{width:%?162?%;height:100%}.category .content .left .iconText[data-v-9080916e]{line-height:%?90?%;width:%?145?%;height:%?90?%;padding-left:%?20?%;color:#333;font-size:%?28?%;border-left:%?6?% solid #fff;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}.category .content .left .active[data-v-9080916e]{color:#ab2b2b;border-left:%?6?% solid #ab2b2b}.category .content .right[data-v-9080916e]{-webkit-box-flex:1;-webkit-flex:1;flex:1;border-left:%?1?% solid #fafafa;flex:1;height:100%;padding:0 %?30?% 0 %?30?%}.category .content .right .banner[data-v-9080916e]{width:100%;height:%?222?%;margin-top:%?20?%}.category .content .right .banner img[data-v-9080916e]{width:100%;height:100%}.category .content .right .title[data-v-9080916e]{text-align:center;padding:%?50?% 0}.category .content .right .title span[data-v-9080916e]:nth-child(2){font-size:%?24?%;color:#333;padding:0 %?10?%}.category .content .right .title span[data-v-9080916e]:nth-child(2n+1){color:#999}.category .content .right .bottom[data-v-9080916e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap}.category .content .right .bottom .item[data-v-9080916e]{width:33.33%;text-align:center;margin-bottom:%?20?%}.category .content .right .bottom .item img[data-v-9080916e]{height:%?109?%;width:%?109?%;display:block;margin:0 auto}',""]),t.exports=e},"259c":function(t,e,a){"use strict";a.r(e);var n=a("46e5"),i=a.n(n);for(var r in n)"default"!==r&&function(t){a.d(e,t,(function(){return n[t]}))}(r);e["default"]=i.a},"46e5":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={created:function(){},onLoad:function(){},data:function(){return{PageCur:""}},methods:{NavChange:function(t){uni.navigateTo({url:"/pages/"+t+"/main"})}}};e.default=n},6151:function(t,e,a){"use strict";a.r(e);var n=a("bf35"),i=a("259c");for(var r in i)"default"!==r&&function(t){a.d(e,t,(function(){return i[t]}))}(r);var c,s=a("f0c5"),o=Object(s["a"])(i["default"],n["b"],n["c"],!1,null,"0daa49a6",null,!1,n["a"],c);e["default"]=o.exports},7408:function(t,e,a){"use strict";var n=a("8865"),i=a.n(n);i.a},8865:function(t,e,a){var n=a("15b0");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var i=a("4f06").default;i("4f08be58",n,!0,{sourceMap:!1,shadowMode:!1})},"9a35":function(t,e,a){"use strict";(function(t){var n=a("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,a("96cf");var i=n(a("1da1")),r=a("6fd2"),c=(n(a("6151")),{created:function(){},mounted:function(){this.getListData(),this.selectitem(this.id,this.nowIndex)},data:function(){return{id:"-1",nowIndex:0,name:"",listData:[],detailData:{},banner_url:"",datalength:0}},components:{},methods:{tosearch:function(){uni.navigateTo({url:"/apiShop/search/main"})},selectitem:function(e,a,n){var c=this;return(0,i.default)(regeneratorRuntime.mark((function i(){var s;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:if(c.nowIndex=a,c.id=e,c.name=n,t.log(a),"-1"!=c.id){i.next=6;break}return i.abrupt("return",!1);case 6:return i.next=8,(0,r.categorySecondaryApi)({cat_id:e});case 8:s=i.sent,c.detailData=s.data.data,c.nowIndex,c.banner_url=s.data.banner_url.banner_url,c.datalength=c.detailData.length,t.log(c.detailData);case 13:case"end":return i.stop()}}),i)})))()},getListData:function(){var t=this;return(0,i.default)(regeneratorRuntime.mark((function e(){var a;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,(0,r.categoryListApi)({});case 2:a=e.sent,t.listData=a.data.cat_list,"-1"==t.id&&(t.nowIndex=a.data.this_cat.cat_id,t.detailData=a.data.cat_item,t.id=a.data.this_cat.cat_id,t.name=a.data.this_cat.cat_name,t.banner_url=a.data.this_cat.banner_url,""!=t.detailData&&(t.datalength=1));case 5:case"end":return e.stop()}}),e)})))()},categoryList:function(e){t.log("tiaozhuan"),uni.navigateTo({url:"/apiShop/categorylist/main?id="+e})}},computed:{}});e.default=c}).call(this,a("5a52")["default"])},b506:function(t,e,a){"use strict";a.r(e);var n=a("02a1"),i=a("cb36");for(var r in i)"default"!==r&&function(t){a.d(e,t,(function(){return i[t]}))}(r);a("7408");var c,s=a("f0c5"),o=Object(s["a"])(i["default"],n["b"],n["c"],!1,null,"9080916e",null,!1,n["a"],c);e["default"]=o.exports},bf35:function(t,e,a){"use strict";var n;a.d(e,"b",(function(){return i})),a.d(e,"c",(function(){return r})),a.d(e,"a",(function(){return n}));var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",{staticClass:"cu-bar tabbar bg-white shadow foot"},[a("v-uni-view",{staticClass:"action",attrs:{"data-cur":"index"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.NavChange("index")}}},[a("v-uni-view",{staticClass:"cuIcon-cu-image"},[a("v-uni-image",{attrs:{src:"/static/images/ic_menu_choice"+["index"==t.PageCur?"_pressed":"_nor"]+".png"}})],1),a("v-uni-view",{class:"index"==t.PageCur?"text-jred":"text-jgray"},[t._v("首页")])],1),a("v-uni-view",{staticClass:"action",attrs:{"data-cur":"topic"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.NavChange("topic")}}},[a("v-uni-view",{staticClass:"cuIcon-cu-image"},[a("v-uni-image",{attrs:{src:"/static/images/ic_menu_topic"+["topic"==t.PageCur?"_pressed":"_nor"]+".png"}})],1),a("v-uni-view",{class:"topic"==t.PageCur?"text-jred":"text-jgray"},[t._v("精选")])],1),a("v-uni-view",{staticClass:"action",attrs:{"data-cur":"category"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.NavChange("category")}}},[a("v-uni-view",{staticClass:"cuIcon-cu-image"},[a("v-uni-image",{attrs:{src:"/static/images/ic_menu_sort"+["category"==t.PageCur?"_pressed":"_nor"]+".png"}})],1),a("v-uni-view",{class:"category"==t.PageCur?"text-jred":"text-jgray"},[t._v("分类")])],1),a("v-uni-view",{staticClass:"action",attrs:{"data-cur":"cart"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.NavChange("cart")}}},[a("v-uni-view",{staticClass:"cuIcon-cu-image"},[a("v-uni-image",{attrs:{src:"/static/images/ic_menu_shoping"+["cart"==t.PageCur?"_pressed":"_nor"]+".png"}})],1),a("v-uni-view",{class:"cart"==t.PageCur?"text-jred":"text-jgray"},[t._v("购物车")])],1),a("v-uni-view",{staticClass:"action",attrs:{"data-cur":"my"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.NavChange("my")}}},[a("v-uni-view",{staticClass:"cuIcon-cu-image"},[a("v-uni-image",{attrs:{src:"/static/images/ic_menu_me"+["my"==t.PageCur?"_pressed":"_nor"]+".png"}})],1),a("v-uni-view",{class:"my"==t.PageCur?"text-jred":"text-jgray"},[t._v("我的")])],1)],1)},r=[]},cb36:function(t,e,a){"use strict";a.r(e);var n=a("9a35"),i=a.n(n);for(var r in n)"default"!==r&&function(t){a.d(e,t,(function(){return n[t]}))}(r);e["default"]=i.a}}]);