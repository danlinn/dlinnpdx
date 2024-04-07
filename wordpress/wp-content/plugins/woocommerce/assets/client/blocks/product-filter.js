(()=>{var e,t={3610:(e,t,o)=>{"use strict";o.r(t);var r=o(9196);const c=window.wp.blocks;var i=o(2911),l=o(9703),n=o(1231),s=o(1918),a=o(3743),m=o(9425);const d=window.wc.wcSettings;var p,u,w,f,b,g,k,h,y,v;const _=(0,d.getSetting)("wcBlocksConfig",{buildPhase:1,pluginUrl:"",productCount:0,defaultAvatar:"",restApiRoutes:{},wordCountType:"words"}),E=(_.pluginUrl,_.pluginUrl,_.buildPhase),S=(null===(p=d.STORE_PAGES.shop)||void 0===p||p.permalink,null===(u=d.STORE_PAGES.checkout)||void 0===u||u.id,null===(w=d.STORE_PAGES.checkout)||void 0===w||w.permalink,null===(f=d.STORE_PAGES.privacy)||void 0===f||f.permalink,null===(b=d.STORE_PAGES.privacy)||void 0===b||b.title,null===(g=d.STORE_PAGES.terms)||void 0===g||g.permalink,null===(k=d.STORE_PAGES.terms)||void 0===k||k.title,null===(h=d.STORE_PAGES.cart)||void 0===h||h.id,null===(y=d.STORE_PAGES.cart)||void 0===y||y.permalink,null!==(v=d.STORE_PAGES.myaccount)&&void 0!==v&&v.permalink?d.STORE_PAGES.myaccount.permalink:(0,d.getSetting)("wpLoginUrl","/wp-login.php"),(0,d.getSetting)("localPickupEnabled",!1),(0,d.getSetting)("countries",{})),O=(0,d.getSetting)("countryData",{}),P=(Object.fromEntries(Object.keys(O).filter((e=>!0===O[e].allowBilling)).map((e=>[e,S[e]||""]))),Object.fromEntries(Object.keys(O).filter((e=>!0===O[e].allowBilling)).map((e=>[e,O[e].states||[]]))),Object.fromEntries(Object.keys(O).filter((e=>!0===O[e].allowShipping)).map((e=>[e,S[e]||""]))),Object.fromEntries(Object.keys(O).filter((e=>!0===O[e].allowShipping)).map((e=>[e,O[e].states||[]]))),Object.fromEntries(Object.keys(O).map((e=>[e,O[e].locale||[]]))),{address:["first_name","last_name","company","address_1","address_2","city","postcode","country","state","phone"],contact:["email"],additional:[]});(0,d.getSetting)("addressFieldsLocations",P).address,(0,d.getSetting)("addressFieldsLocations",P).contact,(0,d.getSetting)("addressFieldsLocations",P).additional,(0,d.getSetting)("additionalFields",{}),(0,d.getSetting)("additionalContactFields",{}),(0,d.getSetting)("additionalAddressFields",{});var T=o(5736),B=o(444);const F=(0,r.createElement)(B.SVG,{xmlns:"http://www.w3.org/2000/SVG",viewBox:"0 0 24 24"},(0,r.createElement)("path",{fill:"none",d:"M0 0h24v24H0z"}),(0,r.createElement)("path",{d:"M17 6H7c-3.31 0-6 2.69-6 6s2.69 6 6 6h10c3.31 0 6-2.69 6-6s-2.69-6-6-6zm0 10H7c-2.21 0-4-1.79-4-4s1.79-4 4-4h10c2.21 0 4 1.79 4 4s-1.79 4-4 4zm0-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"})),j=JSON.parse('{"name":"woocommerce/product-filter","version":"1.0.0","title":"Product Filter","description":"A block that adds product filters to the product collection.","category":"woocommerce","keywords":["WooCommerce","Filters"],"textdomain":"woocommerce","supports":{"html":false,"reusable":false},"usesContext":["query","queryId"],"attributes":{"filterType":{"type":"string"},"heading":{"type":"string"}},"apiVersion":2,"$schema":"https://schemas.wp.org/trunk/block.json"}'),A=window.wp.blockEditor,R=window.wp.data,x=window.wp.components,G=()=>(0,d.getSetting)("isWidgetEditor")?(0,r.createElement)(x.Notice,{status:"info",isDismissible:!1},(0,T.__)("The widget area containing Collection Filters block needs to be placed on a product archive page for filters to function properly.","woocommerce")):(0,d.getSetting)("isSiteEditor")?null:(0,r.createElement)(x.Notice,{status:"warning",isDismissible:!1},(0,T.__)("When added to a post or page, Collection Filters block needs to be nested inside a Product Collection block to function properly.","woocommerce"));o(3400);const C={"active-filters":"woocommerce/product-filter-active","price-filter":"woocommerce/product-filter-price","stock-filter":"woocommerce/product-filter-stock-status","rating-filter":"woocommerce/product-filter-rating","attribute-filter":"woocommerce/product-filter-attribute"};E>2&&(0,c.registerBlockType)(j,{icon:{src:(0,r.createElement)(i.Z,{icon:l.Z,className:"wc-block-editor-components-block-icon"})},edit:({attributes:e,clientId:t})=>{const o=(0,A.useBlockProps)(),i=(0,R.useSelect)((e=>{const{getBlockParentsByBlockName:o}=e("core/block-editor");return!!o(t,"woocommerce/product-collection").length}));return(0,r.createElement)("nav",{...o},!i&&(0,r.createElement)(G,null),(0,r.createElement)(A.InnerBlocks,{allowedBlocks:(l=[...Object.values(C),"woocommerce/product-filter","woocommerce/filter-wrapper","woocommerce/product-collection","core/query"],(0,c.getBlockTypes)().map((e=>e.name)).filter((e=>!l.includes(e)))),template:[["core/heading",{level:3,content:e.heading||""}],[C[e.filterType],{lock:{remove:!0}}]]}));var l},save:function(){return(0,r.createElement)(A.InnerBlocks.Content,null)},variations:[{name:"product-filter-active",title:(0,T.__)("Product Filter: Active Filters (Beta)","woocommerce"),description:(0,T.__)("Display the currently active filters.","woocommerce"),attributes:{heading:(0,T.__)("Active filters","woocommerce"),filterType:"active-filters"},icon:{src:(0,r.createElement)(i.Z,{icon:F,className:"wc-block-editor-components-block-icon"})},isDefault:!0},{name:"product-filter-price",title:(0,T.__)("Product Filter: Price (Beta)","woocommerce"),description:(0,T.__)("Enable customers to filter the product collection by choosing a price range.","woocommerce"),attributes:{filterType:"price-filter",heading:(0,T.__)("Filter by Price","woocommerce")},icon:{src:(0,r.createElement)(i.Z,{icon:n.Z,className:"wc-block-editor-components-block-icon"})}},{name:"product-filter-stock-status",title:(0,T.__)("Product Filter: Stock Status (Beta)","woocommerce"),description:(0,T.__)("Enable customers to filter the product collection by stock status.","woocommerce"),attributes:{filterType:"stock-filter",heading:(0,T.__)("Filter by Stock Status","woocommerce")},icon:{src:(0,r.createElement)(i.Z,{icon:s.Z,className:"wc-block-editor-components-block-icon"})}},{name:"product-filter-attribute",title:(0,T.__)("Product Filter: Attribute (Beta)","woocommerce"),description:(0,T.__)("Enable customers to filter the product collection by selecting one or more attributes, such as color.","woocommerce"),attributes:{filterType:"attribute-filter",heading:(0,T.__)("Filter by Attribute","woocommerce")},icon:{src:(0,r.createElement)(i.Z,{icon:a.Z,className:"wc-block-editor-components-block-icon"})}},{name:"product-filter-rating",title:(0,T.__)("Product Filter: Rating (Beta)","woocommerce"),description:(0,T.__)("Enable customers to filter the product collection by rating.","woocommerce"),attributes:{filterType:"rating-filter",heading:(0,T.__)("Filter by Rating","woocommerce")},icon:{src:(0,r.createElement)(i.Z,{icon:m.Z,className:"wc-block-editor-components-block-icon"})}}],transforms:{from:[{type:"block",blocks:["woocommerce/filter-wrapper"],transform:(e,t)=>{const o=[];return t.forEach((t=>{t.name===`woocommerce/${e.filterType}`&&o.push((0,c.createBlock)(C[e.filterType],t.attributes)),"core/heading"===t.name&&o.push(t)})),(0,c.createBlock)("woocommerce/product-filter",e,o)}}]}})},3400:()=>{},9196:e=>{"use strict";e.exports=window.React},9307:e=>{"use strict";e.exports=window.wp.element},5736:e=>{"use strict";e.exports=window.wp.i18n},444:e=>{"use strict";e.exports=window.wp.primitives}},o={};function r(e){var c=o[e];if(void 0!==c)return c.exports;var i=o[e]={exports:{}};return t[e].call(i.exports,i,i.exports,r),i.exports}r.m=t,e=[],r.O=(t,o,c,i)=>{if(!o){var l=1/0;for(m=0;m<e.length;m++){for(var[o,c,i]=e[m],n=!0,s=0;s<o.length;s++)(!1&i||l>=i)&&Object.keys(r.O).every((e=>r.O[e](o[s])))?o.splice(s--,1):(n=!1,i<l&&(l=i));if(n){e.splice(m--,1);var a=c();void 0!==a&&(t=a)}}return t}i=i||0;for(var m=e.length;m>0&&e[m-1][2]>i;m--)e[m]=e[m-1];e[m]=[o,c,i]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.j=8099,(()=>{var e={8099:0};r.O.j=t=>0===e[t];var t=(t,o)=>{var c,i,[l,n,s]=o,a=0;if(l.some((t=>0!==e[t]))){for(c in n)r.o(n,c)&&(r.m[c]=n[c]);if(s)var m=s(r)}for(t&&t(o);a<l.length;a++)i=l[a],r.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return r.O(m)},o=self.webpackChunkwebpackWcBlocksJsonp=self.webpackChunkwebpackWcBlocksJsonp||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var c=r.O(void 0,[2869],(()=>r(3610)));c=r.O(c),((this.wc=this.wc||{}).blocks=this.wc.blocks||{})["product-filter"]=c})();