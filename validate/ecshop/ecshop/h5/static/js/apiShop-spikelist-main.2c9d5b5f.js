(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["apiShop-spikelist-main"],{"4db8":function(t,e,a){"use strict";a.r(e);var i=a("7061"),s=a("d429");for(var n in s)"default"!==n&&function(t){a.d(e,t,(function(){return s[t]}))}(n);a("5605");var o,r=a("f0c5"),d=Object(r["a"])(s["default"],i["b"],i["c"],!1,null,"d7f94dee",null,!1,i["a"],o);e["default"]=d.exports},5605:function(t,e,a){"use strict";var i=a("cb53"),s=a.n(i);s.a},7061:function(t,e,a){"use strict";var i;a.d(e,"b",(function(){return s})),a.d(e,"c",(function(){return n})),a.d(e,"a",(function(){return i}));var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",[a("cu-custom",{attrs:{bgColor:"bg-white",isBack:!0}},[a("template",{attrs:{slot:"backText"},slot:"backText"},[t._v("返回")]),a("template",{attrs:{slot:"content"},slot:"content"},[t._v("限时购")])],2),a("div",{staticClass:"newgoods"},[a("div",{staticClass:"sortlist"},t._l(t.listData,(function(e,i){return a("div",{key:i,staticClass:"item",on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.goodsDetail(e.goods_id)}}},[a("img",{attrs:{src:e.list_pic_url,alt:""}}),a("p",{staticClass:"name"},[t._v(t._s(e.goods_name))]),a("p",{staticClass:"price"},[t._v("¥"+t._s(e.shop_price))])])})),0)])],1)},n=[]},"9ec3":function(t,e,a){var i=a("24fb");e=i(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.newgoods .sortnav[data-v-d7f94dee]{display:-webkit-box;display:-webkit-flex;display:flex;background:#fff;width:100%;height:%?78?%;line-height:%?78?%}.newgoods .sortnav div[data-v-d7f94dee]{width:%?250?%;height:100%;text-align:center}.newgoods .sortnav .active[data-v-d7f94dee]{color:#b4282d}.newgoods .sortnav .price[data-v-d7f94dee]{background:url(https://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/no.png) %?165?% 50% no-repeat;background-size:%?15?% %?21?%}.newgoods .sortnav .active.desc[data-v-d7f94dee]{background:url(https://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/down.png) %?165?% 50% no-repeat;background-size:%?15?% %?21?%}.newgoods .sortnav .active.asc[data-v-d7f94dee]{background:url(https://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/up.png) %?165?% 50% no-repeat;background-size:%?15?% %?21?%}.newgoods .sortlist[data-v-d7f94dee]{margin-top:%?20?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-flex-wrap:wrap;flex-wrap:wrap}.newgoods .sortlist .item[data-v-d7f94dee]{width:%?372.5?%;margin-bottom:%?5?%;text-align:center;background:#fff;padding:%?15?% 0}.newgoods .sortlist .item img[data-v-d7f94dee]{display:block;width:%?302?%;height:%?302?%;margin:0 auto}.newgoods .sortlist .item .name[data-v-d7f94dee]{margin:%?15?% 0 %?22?% 0;text-align:center;padding:0 %?20?%;font-size:%?24?%}.newgoods .sortlist .item .price[data-v-d7f94dee]{text-align:center;font-size:%?30?%;color:#b4282d}',""]),t.exports=e},c298:function(t,e,a){"use strict";var i=a("4ea4");a("99af"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,a("96cf");var s=i(a("1da1")),n=a("6fd2"),o={onReachBottom:function(){if(this.page=this.page+1,this.page>this.pagetotal)return!1;this.getlistData()},created:function(){},onLoad:function(t){this.isHot=t.isHot,this.isNew=t.isNew,this.id=t.id},mounted:function(){this.isHot&&(this.isHot=this.isHot),this.isNew&&(this.isNew=this.isNew),this.id=this.id,void 0===this.id&&(this.id=""),this.getlistData(!0)},data:function(){return{id:"",page:1,order:"",isHot:"",isNew:"",nowIndex:0,listData:[],activeClass:""}},components:{},methods:{getlistData:function(){var t=this;return(0,s.default)(regeneratorRuntime.mark((function e(){var a;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,(0,n.miaoshaGoodsListApi)({page:t.page});case 2:a=e.sent,1==t.page&&(t.listData=a.data.list),t.pagetotal=a.data.pagetotal,t.page>1&&(t.listData=t.listData.concat(a.data.list));case 6:case"end":return e.stop()}}),e)})))()},goodsDetail:function(t){uni.navigateTo({url:"/apiShop/goods/main?id="+t})}},computed:{}};e.default=o},cb53:function(t,e,a){var i=a("9ec3");"string"===typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);var s=a("4f06").default;s("bb74a404",i,!0,{sourceMap:!1,shadowMode:!1})},d429:function(t,e,a){"use strict";a.r(e);var i=a("c298"),s=a.n(i);for(var n in i)"default"!==n&&function(t){a.d(e,t,(function(){return i[t]}))}(n);e["default"]=s.a}}]);