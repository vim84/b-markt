{"version":3,"file":"core_ui_pager.min.js","sources":["core_ui_pager.js"],"names":["BX","ui","scrollablePager","opts","nf","this","parentConstruct","merge","areaHeight","eventTimeout","pageRenderer","setTopReachedOnPage","setBottomReachedOnPage","vars","pages","boundsReached","top","bottom","prevScrollTop","scrollEventLock","pageRange","renderer","sys","code","handleInitStack","extend","widget","prototype","init","ctrls","pane","getControl","scrollEventDispatcher","throttle","checkScrollState","renderers","native","scope","parent","pushFuncStack","buildUpDOM","sc","nodes","createNodesByTemplate","type","isDomNode","create","style","height","parseInt","areas","node","clone","pool","append","update","bindEvents","addCustomEvent","proxy","dispatchScrollEvents","bindScrollEvents","scrollTo","ignoreEvents","sign","sv","setScrollTop","scrollToNode","lockScrollEvents","unLockScrollEvents","prependPage","data","addPage","appendPage","getFreePageNumber","bound","getPageCount","setTopReached","way","manageBounds","setBottomReached","cleanUp","innerHTML","remove","unbindAll","pageNum","so","wrapper","getPageWrapper","st","scrollTop","Error","actAppend","isString","length","k","scrollBefore","getScrollTop","offsetHeight","scopeScroll","checkScrolledToTop","fireEvent","checkScrolledToBottom","props","className","topOn","topOff","isTop","scroll","flip","hidden","areaTopH","show","hide","checkFreeBottomSpace","getClientHeight","getScrollHeight","wheelLock","unbind","window","toString","scrollHeight","clientHeight","ctx","bind","e","wData","getWheelData","jam","PreventDefault","eventCancelBubble","onCustomEvent"],"mappings":"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"}