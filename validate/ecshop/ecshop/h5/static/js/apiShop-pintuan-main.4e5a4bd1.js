(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["apiShop-pintuan-main"],{"04f0":function(t,e,i){"use strict";(function(t){var o=i("4ea4");i("99af"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("96cf");var a=o(i("1da1")),n=o(i("ade3")),r=i("6fd2"),s=o(i("bba0")),d={onLoad:function(t){this.id=t.id,this.status=t.status},onShow:function(){this.tabbarIndex=this.status,this.goodsList()},onReachBottom:function(){if(this.page=this.page+1,t.log(this.pagetotal),t.log(this.page),this.page>this.pagetotal)return!1;this.goodsList()},data:function(){var t;return t={orderType:["进行中","即将开始","已结束"],headerPosition:"fixed",allnumber:0,page:1,pagetotal:"",tabbarIndex:0,headerTop:"6%",id:"",list:[],goods_data:""},(0,n.default)(t,"pagetotal",1),(0,n.default)(t,"avator","https://imgt1.oss-cn-shanghai.aliyuncs.com/ecAllRes/images/missing-face.png"),t},components:{uniCountdown:s.default},computed:{},methods:{goodsDetail:function(t){uni.navigateTo({url:"/apiShop/goods/main?id="+this.id})},pindan:function(t){uni.navigateTo({url:"/apiShop/goods/main?id="+this.id+"&order_id="+t})},goodsList:function(){var e=this;return(0,a.default)(regeneratorRuntime.mark((function i(){var o;return regeneratorRuntime.wrap((function(i){while(1)switch(i.prev=i.next){case 0:return i.next=2,(0,r.pintuanListApi)({goods_id:e.id,page:e.page});case 2:o=i.sent,e.goods_data=o.data.goods_data,e.pagetotal=o.data.pagetotal,t.log(e.pagetotal),e.page>1?e.list=e.list.concat(o.data.pt_list):e.list=o.data.pt_list;case 7:case"end":return i.stop()}}),i)})))()},showType:function(t){this.page=1,this.tabbarIndex=t,this.goodsList()},showTypePage:function(t){this.tabbarIndex=t,this.goodsList()}}};e.default=d}).call(this,i("5a52")["default"])},"0947":function(t,e,i){"use strict";var o=i("e58b"),a=i.n(o);a.a},"304e":function(t,e,i){var o=i("24fb");e=o(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.uni-countdown[data-v-fcb2643e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;-webkit-box-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start;padding:%?2?% 0}.uni-countdown__splitor[data-v-fcb2643e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;line-height:%?48?%;padding:%?5?%;font-size:%?24?%}.uni-countdown__number[data-v-fcb2643e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;width:%?52?%;height:%?48?%;line-height:%?48?%;margin:%?5?%;text-align:center;font-size:%?24?%}',""]),t.exports=e},"4b8b":function(t,e,i){var o=i("24fb");e=o(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 这里是uni-app内置的常用样式变量\r\n *\r\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\r\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n *\r\n */\r\n/**\r\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n *\r\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\r\n */\r\n/* 页面左右间距 */\r\n/* 文字尺寸 */\r\n/*文字颜色*/\r\n/* 边框颜色 */\r\n/* 图片加载中颜色 */\r\n/* 行为相关颜色 */.topTabBar[data-v-2fde08b8]{width:100%;position:fixed;z-index:10;background-color:#f8f8f8;height:%?80?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-justify-content:space-around;justify-content:space-around}.topTabBar .grid[data-v-2fde08b8]{width:20%;height:%?80?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;color:#444;font-size:14px}.topTabBar .grid .text[data-v-2fde08b8]{height:%?76?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.topTabBar .grid .text.on[data-v-2fde08b8]{color:#b4282d;border-bottom:solid %?4?% #b4282d}uni-page-body[data-v-2fde08b8]{height:100vh;width:100%}.container[data-v-2fde08b8]{padding:0;margin-top:15px;height:auto;width:100%;background:#fff}.btn-group[data-v-2fde08b8]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap;padding:%?15?% %?30?%}.btn-group .btn[data-v-2fde08b8]{padding:%?10?% %?15?%;border:%?1?% solid #ccc;border-radius:%?12?%;margin-right:%?10?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:start;-webkit-justify-content:flex-start;justify-content:flex-start}.btn-group .btn.active[data-v-2fde08b8]{border:%?1?% solid #b4282d}.btn-group .btn .all[data-v-2fde08b8],\r\n.btn-group .btn .total[data-v-2fde08b8]{color:#666;font-size:14px}.btn-group .btn .active.all[data-v-2fde08b8],\r\n.btn-group .btn .active.total[data-v-2fde08b8]{color:#b4282d}.sortlist[data-v-2fde08b8]{width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap}.sortlist .item[data-v-2fde08b8]{width:210px;margin-bottom:2px;text-align:center;background:#fff;padding:8px 0}.sortlist .item img[data-v-2fde08b8]{display:block;width:200px;height:200px;margin:0 auto}.sortlist .item .name[data-v-2fde08b8]{margin:%?15?% 0 %?22?% 0;text-align:center;padding:0 %?20?%;font-size:%?24?%}.sortlist .item .price[data-v-2fde08b8]{text-align:center;font-size:%?30?%;color:#b4282d}.sortlist .item .cantuan[data-v-2fde08b8]{text-align:center;font-size:%?30?%;color:#909399}.sortlist .item .cantuan .price[data-v-2fde08b8]{color:#b4282d}.sortlist .item .delete[data-v-2fde08b8]{color:#909399;font-size:12px;text-decoration:line-through}.pintuanitem[data-v-2fde08b8]{padding:%?20?% %?30?%;background:#fff;margin-bottom:%?20?%}.pintuanitem .portrait[data-v-2fde08b8]{width:20px;height:20px;margin-left:10px}.pintuanitem .head[data-v-2fde08b8]{font-size:%?28?%;padding:%?20?% 0}.pintuanitem .item[data-v-2fde08b8]{display:-webkit-box;display:-webkit-flex;display:flex;background:#f7f7f7;padding:%?20?% 0;margin:%?20?%}.pintuanitem .item div[data-v-2fde08b8]:nth-child(1){width:%?50?%;font-size:%?28?%;color:#999;padding-left:%?30?%;margin-right:5px}.pintuanitem .item div[data-v-2fde08b8]:nth-child(2){-webkit-box-flex:1;-webkit-flex:1;flex:1;margin-left:5px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.pintuanitem .item div[data-v-2fde08b8]:nth-child(3){float:left;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin-right:10px}.pd[data-v-2fde08b8]{width:%?150?%;background:#b4282d;line-height:%?60?%;text-align:center;color:#fff}.order-goods[data-v-2fde08b8]{margin-top:10px;background:#fff;width:100%}.order-goods .h[data-v-2fde08b8]{height:40px;line-height:40px;margin-left:15.625px;border-bottom:.5px solid #f4f4f4;padding-right:15.625px}.order-goods .h .label[data-v-2fde08b8]{float:left;font-size:%?24?%;color:#333}.order-goods .h .status[data-v-2fde08b8]{float:right;font-size:%?24?%;color:#b4282d}.order-goods .item[data-v-2fde08b8]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;height:96px;margin-left:15.625px;margin-right:15.625px;border-bottom:.5px solid #f4f4f4}.order-goods .item[data-v-2fde08b8]:last-child{border-bottom:none}.order-goods .item .img[data-v-2fde08b8]{height:72.915px;width:72.915px;background:#f4f4f4}.order-goods .item .img uni-image[data-v-2fde08b8]{height:72.915px;width:72.915px}.order-goods .item .info[data-v-2fde08b8]{-webkit-box-flex:1;-webkit-flex:1;flex:1;height:72.915px;margin-left:20px}.order-goods .item .t[data-v-2fde08b8]{margin-top:4px;height:16.5px;line-height:16.5px;margin-bottom:5.25px}.order-goods .item .t .name[data-v-2fde08b8]{width:%?420?%;padding-right:%?15?%;display:block;float:left;height:16.5px;line-height:16.5px;color:#333;font-size:13px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.order-goods .item .t .number[data-v-2fde08b8]{display:block;float:right;height:16.5px;text-align:right;line-height:16.5px;color:#333;font-size:13px}.order-goods .item .attr[data-v-2fde08b8]{height:14.5px;width:%?420?%;line-height:14.5px;color:#666;margin-bottom:12.5px;font-size:12px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.order-goods .item .price[data-v-2fde08b8]{height:15px;line-height:15px;color:#333;font-size:13px}.order-goods .btn-group[data-v-2fde08b8]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;padding:%?15?% %?30?%}.order-goods .btn-group .service[data-v-2fde08b8]{padding:%?10?% %?15?%;border:%?1?% solid #ccc;border-radius:%?12?%;color:#666;font-size:%?24?%}.order-goods .btn-group .review[data-v-2fde08b8]{padding:%?10?% %?15?%;border:%?1?% solid #ccc;border-radius:%?12?%;color:#666;font-size:%?24?%}',""]),t.exports=e},"520b":function(t,e,i){"use strict";var o;i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return n})),i.d(e,"a",(function(){return o}));var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"uni-countdown"},[t.showDay?i("v-uni-text",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,backgroundColor:t.backgroundColor}},[t._v(t._s(t.d))]):t._e(),t.showDay?i("v-uni-text",{staticClass:"uni-countdown__splitor",style:{color:t.splitorColor}},[t._v("天")]):t._e(),i("v-uni-text",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,backgroundColor:t.backgroundColor}},[t._v(t._s(t.h))]),i("v-uni-text",{staticClass:"uni-countdown__splitor",style:{color:t.splitorColor}},[t._v(t._s(t.showColon?":":"时"))]),i("v-uni-text",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,backgroundColor:t.backgroundColor}},[t._v(t._s(t.i))]),i("v-uni-text",{staticClass:"uni-countdown__splitor",style:{color:t.splitorColor}},[t._v(t._s(t.showColon?":":"分"))]),i("v-uni-text",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,backgroundColor:t.backgroundColor}},[t._v(t._s(t.s))]),t.showColon?t._e():i("v-uni-text",{staticClass:"uni-countdown__splitor",style:{color:t.splitorColor}},[t._v("秒")])],1)},n=[]},"5b69":function(t,e,i){var o=i("304e");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var a=i("4f06").default;a("4293c416",o,!0,{sourceMap:!1,shadowMode:!1})},"6a81":function(t,e,i){"use strict";i("a9e3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var o={name:"UniCountdown",props:{showDay:{type:Boolean,default:!0},showColon:{type:Boolean,default:!0},backgroundColor:{type:String,default:"#FFFFFF"},borderColor:{type:String,default:"#000000"},color:{type:String,default:"#000000"},splitorColor:{type:String,default:"#000000"},day:{type:Number,default:0},hour:{type:Number,default:0},minute:{type:Number,default:0},second:{type:Number,default:0}},data:function(){return{timer:null,syncFlag:!1,d:"00",h:"00",i:"00",s:"00",leftTime:0,seconds:0}},watch:{day:function(t){this.changeFlag()},hour:function(t){this.changeFlag()},minute:function(t){this.changeFlag()},second:function(t){this.changeFlag()}},created:function(t){this.startData()},beforeDestroy:function(){clearInterval(this.timer)},methods:{toSeconds:function(t,e,i,o){return 60*t*60*24+60*e*60+60*i+o},timeUp:function(){clearInterval(this.timer),this.$emit("timeup")},countDown:function(){var t=this.seconds,e=0,i=0,o=0,a=0;t>0?(e=Math.floor(t/86400),i=Math.floor(t/3600)-24*e,o=Math.floor(t/60)-24*e*60-60*i,a=Math.floor(t)-24*e*60*60-60*i*60-60*o):this.timeUp(),e<10&&(e="0"+e),i<10&&(i="0"+i),o<10&&(o="0"+o),a<10&&(a="0"+a),this.d=e,this.h=i,this.i=o,this.s=a},startData:function(){var t=this;this.seconds=this.toSeconds(this.day,this.hour,this.minute,this.second),this.seconds<=0||(this.countDown(),this.timer=setInterval((function(){t.seconds--,t.seconds<0?t.timeUp():t.countDown()}),1e3))},changeFlag:function(){this.syncFlag||(this.seconds=this.toSeconds(this.day,this.hour,this.minute,this.second),this.startData(),this.syncFlag=!0)}}};e.default=o},"727c":function(t,e,i){"use strict";var o=i("5b69"),a=i.n(o);a.a},8128:function(t,e,i){"use strict";i.r(e);var o=i("04f0"),a=i.n(o);for(var n in o)"default"!==n&&function(t){i.d(e,t,(function(){return o[t]}))}(n);e["default"]=a.a},af6c:function(t,e,i){"use strict";i.r(e);var o=i("e8fc"),a=i("8128");for(var n in a)"default"!==n&&function(t){i.d(e,t,(function(){return a[t]}))}(n);i("0947");var r,s=i("f0c5"),d=Object(s["a"])(a["default"],o["b"],o["c"],!1,null,"2fde08b8",null,!1,o["a"],r);e["default"]=d.exports},b01f:function(t,e,i){"use strict";i.r(e);var o=i("6a81"),a=i.n(o);for(var n in o)"default"!==n&&function(t){i.d(e,t,(function(){return o[t]}))}(n);e["default"]=a.a},bba0:function(t,e,i){"use strict";i.r(e);var o=i("520b"),a=i("b01f");for(var n in a)"default"!==n&&function(t){i.d(e,t,(function(){return a[t]}))}(n);i("727c");var r,s=i("f0c5"),d=Object(s["a"])(a["default"],o["b"],o["c"],!1,null,"fcb2643e",null,!1,o["a"],r);e["default"]=d.exports},e58b:function(t,e,i){var o=i("4b8b");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var a=i("4f06").default;a("0618405c",o,!0,{sourceMap:!1,shadowMode:!1})},e8fc:function(t,e,i){"use strict";var o;i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return n})),i.d(e,"a",(function(){return o}));var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",[i("cu-custom",{attrs:{bgColor:"bg-white",isBack:!0}},[i("template",{attrs:{slot:"backText"},slot:"backText"},[t._v("返回")]),i("template",{attrs:{slot:"content"},slot:"content"},[t._v("拼团列表")])],2),i("div",{staticClass:"container"},[i("div",{staticClass:"order-goods"},[i("div",{staticClass:"h"},[i("div",{staticClass:"label"},[t._v("拼单商品"),i("span",{staticClass:"status"})]),i("div",{staticClass:"status"})]),i("div",{staticClass:"goods"},[i("div",{staticClass:"item"},[i("div",{staticClass:"img"},[i("v-uni-image",{attrs:{src:t.goods_data.goods_thumb},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.goodsDetail(t.goods_data.goods_id)}}})],1),i("div",{staticClass:"info"},[i("div",{staticClass:"t"},[i("v-uni-text",{staticClass:"name",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.goodsDetail(t.goods_data.goods_id)}}},[t._v(t._s(t.goods_data.goods_name))])],1),i("div",{staticClass:"attr"}),i("div",{staticClass:"price"},[t._v("拼团价：￥"+t._s(t.goods_data.pt_price))]),i("div",{staticClass:"price"},[t._v("销售价：￥"+t._s(t.goods_data.shop_price))])])]),i("div",{staticClass:"btn-group"})])]),i("div",{staticClass:"pintuanitem"},t._l(t.list,(function(e,o){return i("div",{key:o,staticClass:"item"},[e.avator?i("v-uni-image",{staticClass:"portrait",attrs:{src:e.avator}}):t._e(),e.avator?t._e():i("v-uni-image",{staticClass:"portrait",attrs:{src:t.avator}}),i("div",{staticClass:"name"},[t._v(t._s(e.consignee))]),i("div",{staticClass:"time"},[i("uni-countdown",{attrs:{color:"#FFFFFF","background-color":"#00B26A","border-color":"#00B26A","show-day":!0,hour:e.hour,minute:e.min,second:e.sec}})],1),i("div",{staticClass:"pd",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.pindan(e.order_id)}}},[t._v("去拼单")])],1)})),0)])],1)},n=[]}}]);