@extends('admin.master') 
@section('title','Kanban Todooooo') 
@section('css')
<style>
  Body {
    font-family: Sans-serif;
    font size: 14;
    width: 100%;
    background-color: #E0E0E0;
  }

  h1 {
    position: absolute;
    left: 16px;
    top: 16px;
  }

  menu {
    position: absolute;
    right: 16px;
    top: 16px;
  }

  menu.kanban .viewlist,
  menu.list .viewkanban {
    display: inline;
  }

  menu.kanban .viewkanban,
  menu.list .viewlist {
    display: none;
  }

  .dd {
    max-width: 100%;
    top: 88px;
    margin: 0 auto;
    display: block;
    vertical-align: top;
  }

  ol {
    transition: border-color 2s ease, all 0.1s ease;
  }

  ol.list {
    padding-top: 2em;
    padding-left: 15px;
    max-width: 650px;
    margin: 0 auto;
  }

  ol.list .text {
    float: right;
    width: 60%;
  }

  ol.list h3,
  ol.list .actions,
  ol.list label {
    float: left;
    width: 30%;
  }

  ol.list>li,
  ol.list>h3 {
    max-width: 600px;
    margin: 0 auto;
  }

  ol.list>h2 {
    padding-bottom: 6px;
  }

  ol.list.To-do {
    border-left: 2px solid #FFB300;
  }

  ol.list.Gone {
    border-left: 2px solid #FF3D00;
  }

  ol.list.progress {
    border-left: 2px solid #29B6F6;
  }

  ol.list.Done {
    border-left: 2px solid #8BC34A;
  }

  H2,
  h1,
  button {
    margin-left: 5px;
    font-family: 'Arbutus Slab', serif;
  }

  h2 {
    color: #607D8B;
  }

  h2 .material-icons {
    color: #B0BEC5;
    line-height: 1.5;
  }

  .dd-handle .material-icons {
    color: #B0BEC5;
    font-size: 14px;
    font-weight: 800;
    line-height: 2rem;
    position: relative;
    right: 0;
    color: #607D8B;
    padding: 5px 16px;
  }

  button>.material-icons {
    line-height: 0.2;
    position: relative;
    top: 7px;
  }

  .dd-item:hover,
  button:hover {
    color: #00838F;
    will-change: box-shadow;
    transition: box-shadow .2s cubic-bezier(.4, 0, 1, 1), background-color .2s cubic-bezier(.4, 0, .2, 1), color .2s cubic-bezier(.4, 0, .2, 1);
    box-shadow: 0 5px 6px 0 rgba(0, 0, 0, .14), 0 3px 1px -6px rgba(0, 0, 0, .2), 2px 5px 3px 0 rgba(0, 0, 0, .12);
  }

  button.addbutt {
    background-color: #EEEEEE;
    color: #607D8B;
    width: 100%;
  }

  .list>button.addbutt {
    max-width: 330px;
  }

  button:active,
  button:down,
  button:focus {
    box-shadow: 0 0 0 0, 0 0 0 0 rgba(0, 0, 0, .2), 0 0 0 0 rgba(0, 0, 0, .12);
    color: #00838F;
  }

  button {
    align-items: center;
    background-color: #EEEEEE;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    border: 1px solid #ccc;
    border-radius: 2px;
    color: #607D8B;
    position: relative;
    margin: 0;
    min-width: 44px;
    padding: 10px 16px;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1;
    overflow: hidden;
    outline: none;
    cursor: pointer;
    text-decoration: none;
  }

  ol.kanban.To-do {
    border-top: 5px solid #FFB300;
  }

  ol.kanban.Gone {
    border-top: 5px solid #FF3D00;
  }

  ol.kanban.progress {
    border-top: 5px solid #29B6F6;
  }

  ol.kanban.Done {
    border-top: 5px solid #8BC34A;
  }

  ol.kanban {
    border-top: 5px solid #78909C;
    width: 20%;
    height: auto;
    margin: 1%;
    max-width: 250px;
    min-width: 120px;
    display: inline-block;
    vertical-align: top;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
    flex-direction: column;
    min-height: 200px;
    z-index: 1;
    position: relative;
    background: #fff;
    padding: 1em;
    border-radius: 2px;
  }

  .dd-item {
    display: block;
    position: relative;
    list-style: none;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    min-height: 48px;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    font-size: 16px;
    min-height: 120px;
    overflow: hidden;
    z-index: 1;
    position: relative;
    background: #fff;
    border-radius: 2px;
    box-sizing: border-box;
  }

  .title {
    align-self: flex-end;
    color: inherit;
    display: block;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    font-size: 24px;
    line-height: normal;
    overflow: hidden;
    -webkit-transform-origin: 149px 48px;
    transform-origin: 149px 48px;
    margin: 0;
  }

  .text {
    color: grey;
    border-top: 1px solid font-size: 1rem;
    font-weight: 400;
    line-height: 18px;
    overflow: hidden;
    padding: 16px;
    width: 90%;
  }

  .actions {
    border-top: 1px solid rgba(0, 0, 0, .1);
    font-size: 8px;
    line-height: normal;
    width: 100%;
    color: #B0BEC5;
    padding: 8px;
    box-sizing: border-box;
  }


  /**
 * Nestable
 */

  .dd {
    position: relative;
    display: block;
    list-style: none;
  }

  .dd-list {
    display: block;
    position: relative;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .dd-list .dd-list {
    padding-left: 30px;
  }

  .dd-collapsed .dd-list {
    display: none;
  }

  .dd-item {
    display: block;
    margin: 5px 0;
    padding: 5px 10px;
    color: #333;
    text-decoration: none;
    font-weight: bold;
    border: 1px solid #ccc;
    background: #fafafa;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .dd-item:hover {
    background: #fff;
  }

  .dd-item>button {
    display: block;
    position: relative;
    cursor: move;
    float: left;
    width: 25px;
    height: 20px;
    margin: 5px 0;
    padding: 0;
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
    border: 0;
    background: transparent;
    font-size: 12px;
    line-height: 1;
    text-align: center;
    font-weight: bold;
  }

  .dd-item>button:before {
    content: '+';
    display: block;
    position: absolute;
    width: 100%;
    text-align: center;
    text-indent: 0;
  }

  .dd-item>button[data-action="collapse"]:before {
    content: '<i class="material-icons">filter_none</i>';
  }

  .dd-placeholder,
  .dd-empty {
    margin: 5px 0;
    padding: 0;
    min-height: 30px;
    background: #E0E0E0;
    border: 1px dashed #b6bcbf;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .dd-empty {
    border: 1px dashed #bbb;
    min-height: 100px;
    background-color: #E0E0E0;
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
  }

  .dd-dragel {
    position: absolute;
    pointer-events: none;
    z-index: 9999;
  }

  .dd-dragel>.dd-item .dd-handle {
    margin-top: 0;
    cursor: move;
  }

  .dd-dragel .dd-item {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .5);
    box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .5);
    cursor: move;
  }
</style>
@endsection
 
@section('content')
<!-- Simple MDL Progress Bar -->
<div id="p1" class="mdl-progress mdl-js-progress"></div>
<script>
  document.querySelector('#p1').addEventListener('mdl-componentupgraded', function() {
    this.MaterialProgress.setProgress(44);
  });

</script>

<div class="dd">
  
  <ol class="kanban To-do">
    <div class="kanban__title">
      Công Việc
    </div>


  </ol>
  <ol class="kanban progress">
    Đang Tiến hành
    <li class="dd-item" data-id="5">
        <h3 class="title dd-handle">Tạo Hóa Đơn</h3>
        <div class="text" contenteditable="true">
          Phía backend :
          Quản lý hóa đơn
          Tạo Hóa Đơn

    </li>
  </ol>
  <ol class="kanban  Done">
    Hoàn Thành
    <li class="dd-item" data-id="5">
      <h3 class="title dd-handle"> Cập Nhật danh mục</h3>
      <div class="text" contenteditable="true">Paul 
          Xây dựng module 
          cập nhật khách hàng
          Cập Nhật mã giảm giá
          phía backend
    </li>
      <li class="dd-item" data-id="5">
          <h3 class="title dd-handle">Sản Phẩm</h3>
          <div class="text" contenteditable="true">
            Phía client :
            Tìm kiếm
            Lọc theo giá
            Lọc theo Màu
            Lọc theo danh mục
      </li>
      <li class="dd-item" data-id="5">
          <h3 class="title dd-handle">Tạo Hóa Đơn</h3>
          <div class="text" contenteditable="true">
            Phía client :
            Tạo giỏ hàng
            Tạo Hóa Đơn

      </li>
      <li class="dd-item" data-id="5">
          <h3 class="title dd-handle">NGười dùng</h3>
          <div class="text" contenteditable="true">
            Phía client :
            Đăng nhập / Đăng Xuất
            Xem thông tin
            Mã giảm giá theo loại người dùng

      </li>
  </ol>
  <ol class="kanban Gone">
    C Việc Hủy bỏ

  </ol>

</div>



<script src="{{asset('@styleadmin/js/go.js')}}"></script>
@endsection
 
@section('javascript')
<script>
  /*!
 * Nestable jQuery Plugin - Copyright (c) 2012 David Bushell - http://dbushell.com/
 * Dual-licensed under the BSD or MIT licenses
 */
;(function($, window, document, undefined)
{
    var hasTouch = 'ontouchstart' in document;

    /**
     * Detect CSS pointer-events property
     * events are normally disabled on the dragging element to avoid conflicts
     * https://github.com/ausi/Feature-detection-technique-for-pointer-events/blob/master/modernizr-pointerevents.js
     */
    var hasPointerEvents = (function()
    {
        var el    = document.createElement('div'),
            docEl = document.documentElement;
        if (!('pointerEvents' in el.style)) {
            return false;
        }
        el.style.pointerEvents = 'auto';
        el.style.pointerEvents = 'x';
        docEl.appendChild(el);
        var supports = window.getComputedStyle && window.getComputedStyle(el, '').pointerEvents === 'auto';
        docEl.removeChild(el);
        return !!supports;
    })();

    var defaults = {
            listNodeName    : 'ol',
            itemNodeName    : 'li',
            rootClass       : 'dd',
            listClass       : 'dd-list',
            itemClass       : 'dd-item',
            dragClass       : 'dd-dragel',
            handleClass     : 'dd-handle',
            collapsedClass  : 'dd-collapsed',
            placeClass      : 'dd-placeholder',
            noDragClass     : 'dd-nodrag',
            emptyClass      : 'dd-empty',
            expandBtnHTML   : '<button data-action="expand" type="button">Expand</button>',
            collapseBtnHTML : '<button data-action="collapse" type="button">Collapse</button>',
            group           : 0,
            maxDepth        : 5,
            threshold       : 20
        };

    function Plugin(element, options)
    {
        this.w  = $(document);
        this.el = $(element);
        this.options = $.extend({}, defaults, options);
        this.init();
    }

    Plugin.prototype = {

        init: function()
        {
            var list = this;

            list.reset();

            list.el.data('nestable-group', this.options.group);

            list.placeEl = $('<div class="' + list.options.placeClass + '"/>');

            $.each(this.el.find(list.options.itemNodeName), function(k, el) {
                list.setParent($(el));
            });

            list.el.on('click', 'button', function(e) {
                if (list.dragEl) {
                    return;
                }
                var target = $(e.currentTarget),
                    action = target.data('action'),
                    item   = target.parent(list.options.itemNodeName);
                if (action === 'collapse') {
                    list.collapseItem(item);
                }
                if (action === 'expand') {
                    list.expandItem(item);
                }
            });

            var onStartEvent = function(e)
            {
                var handle = $(e.target);
                if (!handle.hasClass(list.options.handleClass)) {
                    if (handle.closest('.' + list.options.noDragClass).length) {
                        return;
                    }
                    handle = handle.closest('.' + list.options.handleClass);
                }

                if (!handle.length || list.dragEl) {
                    return;
                }

                list.isTouch = /^touch/.test(e.type);
                if (list.isTouch && e.touches.length !== 1) {
                    return;
                }

                e.preventDefault();
                list.dragStart(e.touches ? e.touches[0] : e);
            };

            var onMoveEvent = function(e)
            {
                if (list.dragEl) {
                    e.preventDefault();
                    list.dragMove(e.touches ? e.touches[0] : e);
                }
            };

            var onEndEvent = function(e)
            {
                if (list.dragEl) {
                    e.preventDefault();
                    list.dragStop(e.touches ? e.touches[0] : e);
                }
            };

            if (hasTouch) {
                list.el[0].addEventListener('touchstart', onStartEvent, false);
                window.addEventListener('touchmove', onMoveEvent, false);
                window.addEventListener('touchend', onEndEvent, false);
                window.addEventListener('touchcancel', onEndEvent, false);
            }

            list.el.on('mousedown', onStartEvent);
            list.w.on('mousemove', onMoveEvent);
            list.w.on('mouseup', onEndEvent);

        },

        serialize: function()
        {
            var data,
                depth = 0,
                list  = this;
                step  = function(level, depth)
                {
                    var array = [ ],
                        items = level.children(list.options.itemNodeName);
                    items.each(function()
                    {
                        var li   = $(this),
                            item = $.extend({}, li.data()),
                            sub  = li.children(list.options.listNodeName);
                        if (sub.length) {
                            item.children = step(sub, depth + 1);
                        }
                        array.push(item);
                    });
                    return array;
                };
            data = step(list.el.find(list.options.listNodeName).first(), depth);
            return data;
        },

        serialise: function()
        {
            return this.serialize();
        },

        reset: function()
        {
            this.mouse = {
                offsetX   : 0,
                offsetY   : 0,
                startX    : 0,
                startY    : 0,
                lastX     : 0,
                lastY     : 0,
                nowX      : 0,
                nowY      : 0,
                distX     : 0,
                distY     : 0,
                dirAx     : 0,
                dirX      : 0,
                dirY      : 0,
                lastDirX  : 0,
                lastDirY  : 0,
                distAxX   : 0,
                distAxY   : 0
            };
            this.isTouch    = false;
            this.moving     = false;
            this.dragEl     = null;
            this.dragRootEl = null;
            this.dragDepth  = 0;
            this.hasNewRoot = false;
            this.pointEl    = null;
        },

        expandItem: function(li)
        {
            li.removeClass(this.options.collapsedClass);
            li.children('[data-action="expand"]').hide();
            li.children('[data-action="collapse"]').show();
            li.children(this.options.listNodeName).show();
        },

        collapseItem: function(li)
        {
            var lists = li.children(this.options.listNodeName);
            if (lists.length) {
                li.addClass(this.options.collapsedClass);
                li.children('[data-action="collapse"]').hide();
                li.children('[data-action="expand"]').show();
                li.children(this.options.listNodeName).hide();
            }
        },

        expandAll: function()
        {
            var list = this;
            list.el.find(list.options.itemNodeName).each(function() {
                list.expandItem($(this));
            });
        },

        collapseAll: function()
        {
            var list = this;
            list.el.find(list.options.itemNodeName).each(function() {
                list.collapseItem($(this));
            });
        },

        setParent: function(li)
        {
            if (li.children(this.options.listNodeName).length) {
                li.prepend($(this.options.expandBtnHTML));
                li.prepend($(this.options.collapseBtnHTML));
            }
            li.children('[data-action="expand"]').hide();
        },

        unsetParent: function(li)
        {
            li.removeClass(this.options.collapsedClass);
            li.children('[data-action]').remove();
            li.children(this.options.listNodeName).remove();
        },

        dragStart: function(e)
        {
            var mouse    = this.mouse,
                target   = $(e.target),
                dragItem = target.closest(this.options.itemNodeName);

            this.placeEl.css('height', dragItem.height());

            mouse.offsetX = e.offsetX !== undefined ? e.offsetX : e.pageX - target.offset().left;
            mouse.offsetY = e.offsetY !== undefined ? e.offsetY : e.pageY - target.offset().top;
            mouse.startX = mouse.lastX = e.pageX;
            mouse.startY = mouse.lastY = e.pageY;

            this.dragRootEl = this.el;

            this.dragEl = $(document.createElement(this.options.listNodeName)).addClass(this.options.listClass + ' ' + this.options.dragClass);
            this.dragEl.css('width', dragItem.width());

            dragItem.after(this.placeEl);
            dragItem[0].parentNode.removeChild(dragItem[0]);
            dragItem.appendTo(this.dragEl);

            $(document.body).append(this.dragEl);
            this.dragEl.css({
                'left' : e.pageX - mouse.offsetX,
                'top'  : e.pageY - mouse.offsetY
            });
            // total depth of dragging item
            var i, depth,
                items = this.dragEl.find(this.options.itemNodeName);
            for (i = 0; i < items.length; i++) {
                depth = $(items[i]).parents(this.options.listNodeName).length;
                if (depth > this.dragDepth) {
                    this.dragDepth = depth;
                }
            }
        },

        dragStop: function(e)
        {
            var el = this.dragEl.children(this.options.itemNodeName).first();
            el[0].parentNode.removeChild(el[0]);
            this.placeEl.replaceWith(el);

            this.dragEl.remove();
            this.el.trigger('change');
            if (this.hasNewRoot) {
                this.dragRootEl.trigger('change');
            }
            this.reset();
        },

        dragMove: function(e)
        {
            var list, parent, prev, next, depth,
                opt   = this.options,
                mouse = this.mouse;

            this.dragEl.css({
                'left' : e.pageX - mouse.offsetX,
                'top'  : e.pageY - mouse.offsetY
            });

            // mouse position last events
            mouse.lastX = mouse.nowX;
            mouse.lastY = mouse.nowY;
            // mouse position this events
            mouse.nowX  = e.pageX;
            mouse.nowY  = e.pageY;
            // distance mouse moved between events
            mouse.distX = mouse.nowX - mouse.lastX;
            mouse.distY = mouse.nowY - mouse.lastY;
            // direction mouse was moving
            mouse.lastDirX = mouse.dirX;
            mouse.lastDirY = mouse.dirY;
            // direction mouse is now moving (on both axis)
            mouse.dirX = mouse.distX === 0 ? 0 : mouse.distX > 0 ? 1 : -1;
            mouse.dirY = mouse.distY === 0 ? 0 : mouse.distY > 0 ? 1 : -1;
            // axis mouse is now moving on
            var newAx   = Math.abs(mouse.distX) > Math.abs(mouse.distY) ? 1 : 0;

            // do nothing on first move
            if (!mouse.moving) {
                mouse.dirAx  = newAx;
                mouse.moving = true;
                return;
            }

            // calc distance moved on this axis (and direction)
            if (mouse.dirAx !== newAx) {
                mouse.distAxX = 0;
                mouse.distAxY = 0;
            } else {
                mouse.distAxX += Math.abs(mouse.distX);
                if (mouse.dirX !== 0 && mouse.dirX !== mouse.lastDirX) {
                    mouse.distAxX = 0;
                }
                mouse.distAxY += Math.abs(mouse.distY);
                if (mouse.dirY !== 0 && mouse.dirY !== mouse.lastDirY) {
                    mouse.distAxY = 0;
                }
            }
            mouse.dirAx = newAx;

            /**
             * move horizontal
             */
            if (mouse.dirAx && mouse.distAxX >= opt.threshold) {
                // reset move distance on x-axis for new phase
                mouse.distAxX = 0;
                prev = this.placeEl.prev(opt.itemNodeName);
                // increase horizontal level if previous sibling exists and is not collapsed
                if (mouse.distX > 0 && prev.length && !prev.hasClass(opt.collapsedClass)) {
                    // cannot increase level when item above is collapsed
                    list = prev.find(opt.listNodeName).last();
                    // check if depth limit has reached
                    depth = this.placeEl.parents(opt.listNodeName).length;
                    if (depth + this.dragDepth <= opt.maxDepth) {
                        // create new sub-level if one doesn't exist
                        if (!list.length) {
                            list = $('<' + opt.listNodeName + '/>').addClass(opt.listClass);
                            list.append(this.placeEl);
                            prev.append(list);
                            this.setParent(prev);
                        } else {
                            // else append to next level up
                            list = prev.children(opt.listNodeName).last();
                            list.append(this.placeEl);
                        }
                    }
                }
                // decrease horizontal level
                if (mouse.distX < 0) {
                    // we can't decrease a level if an item preceeds the current one
                    next = this.placeEl.next(opt.itemNodeName);
                    if (!next.length) {
                        parent = this.placeEl.parent();
                        this.placeEl.closest(opt.itemNodeName).after(this.placeEl);
                        if (!parent.children().length) {
                            this.unsetParent(parent.parent());
                        }
                    }
                }
            }

            var isEmpty = false;

            // find list item under cursor
            if (!hasPointerEvents) {
                this.dragEl[0].style.visibility = 'hidden';
            }
            this.pointEl = $(document.elementFromPoint(e.pageX - document.body.scrollLeft, e.pageY - (window.pageYOffset || document.documentElement.scrollTop)));
            if (!hasPointerEvents) {
                this.dragEl[0].style.visibility = 'visible';
            }
            if (this.pointEl.hasClass(opt.handleClass)) {
                this.pointEl = this.pointEl.parent(opt.itemNodeName);
            }
            if (this.pointEl.hasClass(opt.emptyClass)) {
                isEmpty = true;
            }
            else if (!this.pointEl.length || !this.pointEl.hasClass(opt.itemClass)) {
                return;
            }

            // find parent list of item under cursor
            var pointElRoot = this.pointEl.closest('.' + opt.rootClass),
                isNewRoot   = this.dragRootEl.data('nestable-id') !== pointElRoot.data('nestable-id');

            /**
             * move vertical
             */
            if (!mouse.dirAx || isNewRoot || isEmpty) {
                // check if groups match if dragging over new root
                if (isNewRoot && opt.group !== pointElRoot.data('nestable-group')) {
                    return;
                }
                // check depth limit
                depth = this.dragDepth - 1 + this.pointEl.parents(opt.listNodeName).length;
                if (depth > opt.maxDepth) {
                    return;
                }
                var before = e.pageY < (this.pointEl.offset().top + this.pointEl.height() / 2);
                    parent = this.placeEl.parent();
                // if empty create new list to replace empty placeholder
                if (isEmpty) {
                    list = $(document.createElement(opt.listNodeName)).addClass(opt.listClass);
                    list.append(this.placeEl);
                    this.pointEl.replaceWith(list);
                }
                else if (before) {
                    this.pointEl.before(this.placeEl);
                }
                else {
                    this.pointEl.after(this.placeEl);
                }
                if (!parent.children().length) {
                    this.unsetParent(parent.parent());
                }
                if (!this.dragRootEl.find(opt.itemNodeName).length) {
                    this.dragRootEl.append('<div class="' + opt.emptyClass + '"/>');
                }
                // parent root list has changed
                if (isNewRoot) {
                    this.dragRootEl = pointElRoot;
                    this.hasNewRoot = this.el[0] !== this.dragRootEl[0];
                }
            }
        }

    };

    $.fn.nestable = function(params)
    {
        var lists  = this,
            retval = this;

        lists.each(function()
        {
            var plugin = $(this).data("nestable");

            if (!plugin) {
                $(this).data("nestable", new Plugin(this, params));
                $(this).data("nestable-id", new Date().getTime());
            } else {
                if (typeof params === 'string' && typeof plugin[params] === 'function') {
                    retval = plugin[params]();
                }
            }
        });

        return retval || lists;
    };

})(window.jQuery || window.Zepto, window, document);
/*my scripts*/
$('.dd').nestable('serialize');
$('.viewlist').on('click', function() {
    $('ol.kanban').addClass('list')
    $('ol.list').removeClass('kanban')
    $('menu').addClass('list')
    $('menu').removeClass('kanban')
   });
$('.viewkanban').on('click', function() {
    $('ol.list').addClass('kanban')
     $('ol.kanban').removeClass('list')
       $('menu').addClass('kanban')
     $('menu').removeClass('list')
   });
/*colors*/
$('#color').spectrum({
    color: "#f00",
    change: function(color) {
        $("#label").text("change called: " + color.toHexString());
    }
});
</script>
@endsection