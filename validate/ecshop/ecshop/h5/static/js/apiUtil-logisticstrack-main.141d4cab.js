(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["apiUtil-logisticstrack-main"],{"0cfd":function(t,e,a){var n=a("24fb");e=n(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.total-wrap[data-v-5560ca6c]{margin-top:%?22?%;width:100%}.total-wrap .node-container[data-v-5560ca6c]{width:100%;height:auto;display:-webkit-box;display:-webkit-flex;display:flex}.total-wrap .node-container-left[data-v-5560ca6c]{width:%?44?%;height:auto}.total-wrap .node-container-left .tag-container[data-v-5560ca6c]{width:%?44?%;height:%?44?%}.total-wrap .node-container-left .tag-container img[data-v-5560ca6c]{width:%?44?%;height:%?44?%}.total-wrap .node-container-left .tag-container .node-tag-container[data-v-5560ca6c]{width:%?44?%;height:%?44?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.total-wrap .node-container-left .tag-container .node-tag-container .node-tag[data-v-5560ca6c]{width:%?14?%;height:%?14?%;background-color:#dcdcdc;border-radius:50%}.total-wrap .node-container-left .line-container[data-v-5560ca6c]{box-sizing:border-box;width:%?44?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.total-wrap .node-container-left .line-container .line[data-v-5560ca6c]{width:%?2?%;background-color:#dcdcdc}.total-wrap .node-container-right[data-v-5560ca6c]{-webkit-box-flex:1;-webkit-flex:1;flex:1;box-sizing:border-box;padding:0 %?10?% 0 %?24?%}.total-wrap .node-container-right .node-title[data-v-5560ca6c]{width:100%;height:%?40?%;line-height:%?44?%;color:#222;font-size:%?28?%;font-family:PingFangSC-Medium}.total-wrap .node-container-right .node-desc[data-v-5560ca6c]{margin-top:%?16?%;width:100%;min-height:%?30?%;line-height:%?30?%;color:#222;font-size:%?24?%;font-family:PingFangSC-Regular;word-wrap:break-word;word-break:normal}.total-wrap .node-container-right .node-phone[data-v-5560ca6c]{margin-top:%?8?%;width:100%;height:%?26?%;line-height:%?26?%;color:#fe4e2c;font-size:%?26?%;font-family:Avenir-Medium}.total-wrap .node-container-right .node-time[data-v-5560ca6c]{margin-top:%?12?%;width:100%;height:%?34?%;line-height:%?34?%;color:#999;font-size:%?24?%;font-family:Avenir-Book}',""]),t.exports=e},"2bf9":function(t,e,a){"use strict";a("ac1f"),a("5319"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={props:{isNewest:{type:Boolean,default:!1},isFirst:{type:Boolean,default:!1},isMainNode:{type:Boolean,default:!1},nodeData:{type:Object,default:function(){return{status:"",statusName:"",createTime:"2019-01-01 00:00:00",AcceptStation:"xxxxxx"}}}},computed:{nodeIconUrl:function(){return"WATTING_PAY"===this.nodeData.status?this.isNewest?"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-order-commit.png":"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-order-commit-G.png":"PAYED"===this.nodeData.status?this.isNewest?"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-paied.png":"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-paied-G.png":"WATTING_DELIVER"===this.nodeData.status?this.isNewest?"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-pacakaging.png":"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-pacakaging-G.png":"DELIVERING"===this.nodeData.status?this.isNewest?"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-sending.png":"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-sending-G.png":"COMPLETE"===this.nodeData.status?this.isNewest?"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-delivering.png":"http://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/ic-delivering-G.png":void 0},AcceptStationFixed:function(){return this.nodeData.AcceptStation?this.nodeData.AcceptStation.replace(/(\d{3})\d{4}(\d{4})/,""):""}}};e.default=n},"4b9d":function(t,e,a){var n=a("0cfd");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var i=a("4f06").default;i("2c76fffc",n,!0,{sourceMap:!1,shadowMode:!1})},"602a":function(t,e,a){var n=a("7040");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var i=a("4f06").default;i("6a58d35a",n,!0,{sourceMap:!1,shadowMode:!1})},6599:function(t,e,a){"use strict";a.r(e);var n=a("2bf9"),i=a.n(n);for(var o in n)"default"!==o&&function(t){a.d(e,t,(function(){return n[t]}))}(o);e["default"]=i.a},7040:function(t,e,a){var n=a("24fb");e=n(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.total-wrap[data-v-279a946c]{width:100vw;height:auto;box-sizing:border-box;padding:%?0?% %?40?% %?0?%}.total-wrap .logistics-title[data-v-279a946c]{height:%?72?%;box-sizing:border-box;padding:%?36?% 0 %?8?%;line-height:%?28?%;color:#4b4b4b;font-size:%?26?%;font-family:PingFangSC-Medium;text-align:left}',""]),t.exports=e},"79dd":function(t,e,a){"use strict";a.r(e);var n=a("a12c"),i=a("6599");for(var o in i)"default"!==o&&function(t){a.d(e,t,(function(){return i[t]}))}(o);a("e08b");var s,c=a("f0c5"),r=Object(c["a"])(i["default"],n["b"],n["c"],!1,null,"5560ca6c",null,!1,n["a"],s);e["default"]=r.exports},"8b09":function(t,e,a){"use strict";a.r(e);var n=a("ca82"),i=a("dee7");for(var o in i)"default"!==o&&function(t){a.d(e,t,(function(){return i[t]}))}(o);a("bb97");var s,c=a("f0c5"),r=Object(c["a"])(i["default"],n["b"],n["c"],!1,null,"279a946c",null,!1,n["a"],s);e["default"]=r.exports},a12c:function(t,e,a){"use strict";var n;a.d(e,"b",(function(){return i})),a.d(e,"c",(function(){return o})),a.d(e,"a",(function(){return n}));var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"total-wrap",style:{marginTop:t.isMainNode?"22rpx":"6rpx"}},[a("div",{staticClass:"node-container"},[a("div",{staticClass:"node-container-left"},[a("div",{staticClass:"tag-container"},[t.isMainNode?a("img",{attrs:{src:t.nodeIconUrl}}):a("div",{staticClass:"node-tag-container"},[a("div",{staticClass:"node-tag"})])]),a("div",{staticClass:"line-container",style:{height:t.isMainNode?"142rpx":"88rpx",paddingTop:t.isMainNode?"22rpx":"8rpx"}},[t.isFirst?t._e():a("div",{staticClass:"line",style:{height:t.isMainNode?"120rpx":"80rpx"}})])]),a("div",{staticClass:"node-container-right",style:{paddingTop:t.isMainNode?"0":"8rpx"}},[t.isMainNode?a("div",{staticClass:"node-title",style:{color:t.isNewest?"#222":"#999"}},[t._v(t._s(t.nodeData.statusName))]):t._e(),a("div",{staticClass:"node-desc",style:{color:t.isNewest?"#4b4b4b":"#999",marginTop:t.isMainNode?"10rpx":"0"}},[t._v(t._s(t.AcceptStationFixed))]),t.nodeData.phone?a("div",{staticClass:"node-phone"},[t._v(t._s(t.nodeData.phone))]):t._e(),a("div",{staticClass:"node-time"},[t._v(t._s(t.nodeData.AcceptTime))])])])])},o=[]},bb97:function(t,e,a){"use strict";var n=a("602a"),i=a.n(n);i.a},c0bd:function(t,e,a){"use strict";var n=a("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,a("96cf");var i=n(a("1da1")),o=n(a("79dd")),s=a("81cb"),c=a("6fd2"),r={components:{trackNode:o.default},data:function(){return{tracesData:[],order_id:""}},onLoad:function(t){this.id=t.id},onShow:function(){(0,s.toLogin)(),this.order_id=this.id,this.logisticsInfo()},methods:{logisticsInfo:function(){var t=this;return(0,i.default)(regeneratorRuntime.mark((function e(){var a;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,(0,c.LogisticsInfoApi)({order_id:t.order_id});case 2:a=e.sent,0==a.data.status?uni.showToast({title:a.data.msg,duration:2e3,icon:"none",mask:!0}):t.tracesData=a.data.response;case 4:case"end":return e.stop()}}),e)})))()}}};e.default=r},ca82:function(t,e,a){"use strict";var n;a.d(e,"b",(function(){return i})),a.d(e,"c",(function(){return o})),a.d(e,"a",(function(){return n}));var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",[a("cu-custom",{attrs:{bgColor:"bg-white",isBack:!0}},[a("template",{attrs:{slot:"backText"},slot:"backText"},[t._v("返回")]),a("template",{attrs:{slot:"content"},slot:"content"},[t._v("物流跟踪")])],2),a("div",{staticClass:"total-wrap"},[a("div",{staticClass:"logistics-title"},[t._v("物流跟踪")]),t._l(t.tracesData,(function(e,n){return[a("trackNode",{key:n+"_0",attrs:{"is-first":n===t.tracesData.length-1,"is-newest":0===n,"is-main-node":e.isMainNode,"node-data":e}})]}))],2)],1)},o=[]},dee7:function(t,e,a){"use strict";a.r(e);var n=a("c0bd"),i=a.n(n);for(var o in n)"default"!==o&&function(t){a.d(e,t,(function(){return n[t]}))}(o);e["default"]=i.a},e08b:function(t,e,a){"use strict";var n=a("4b9d"),i=a.n(n);i.a}}]);