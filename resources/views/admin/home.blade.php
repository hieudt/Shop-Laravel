@extends('admin.master')
@section('title','Trang chủ admin')
@section('content')
<style type="text/css">
    #myOverviewDiv {
      position: absolute;
      width: 200px;
      height: 100px;
      top: 10px;
      left: 10px;
      background-color: aliceblue;
      z-index: 300; /* make sure its in front */
      border: solid 1px blue;
    }
  </style>
  
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<!-- this is only for the GoJS Samples framework -->
  <script id="code">
    function init() {
      if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
      var $ = go.GraphObject.make;  // for conciseness in defining templates

      myDiagram =
        $(go.Diagram, "myDiagramDiv",  // the DIV HTML element
          {
            // Put the diagram contents at the top center of the viewport
            initialDocumentSpot: go.Spot.TopCenter,
            initialViewportSpot: go.Spot.TopCenter,
            // OR: Scroll to show a particular node, once the layout has determined where that node is
            //"InitialLayoutCompleted": function(e) {
            //  var node = e.diagram.findNodeForKey(28);
            //  if (node !== null) e.diagram.commandHandler.scrollToPart(node);
            //},
            layout:
              $(go.TreeLayout,  // use a TreeLayout to position all of the nodes
                {
                  treeStyle: go.TreeLayout.StyleLastParents,
                  // properties for most of the tree:
                  angle: 90,
                  layerSpacing: 80,
                  // properties for the "last parents":
                  alternateAngle: 0,
                  alternateAlignment: go.TreeLayout.AlignmentStart,
                  alternateNodeIndent: 20,
                  alternateNodeIndentPastParent: 1,
                  alternateNodeSpacing: 20,
                  alternateLayerSpacing: 40,
                  alternateLayerSpacingParentOverlap: 1,
                  alternatePortSpot: new go.Spot(0.001, 1, 20, 0),
                  alternateChildPortSpot: go.Spot.Left
                })
          });

      // define Converters to be used for Bindings
      function theNationFlagConverter(check) {
        if(check == 1)
        return "{{url('/images/very.png')}}";
      }

      function theInfoTextConverter(info) {
        var str = "";
        if (info.title) str += "Title: " + info.title;
        if (info.headOf) str += "\n\nHead of: " + info.headOf;
        if (typeof info.boss === "number") {
          var bossinfo = myDiagram.model.findNodeDataForKey(info.boss);
          if (bossinfo !== null) {
            str += "\n\nNằm trong: " + bossinfo.name;
          }
        }
        return str;
      }

      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          // the outer shape for the node, surrounding the Table
          $(go.Shape, "Rectangle",
            { stroke: null, strokeWidth: 0 },
            /* reddish if highlighted, blue otherwise */
            new go.Binding("fill", "isHighlighted", function(h) { return h ? "#F44336" : "#A7E7FC"; }).ofObject()),
          // a table to contain the different parts of the node
          $(go.Panel, "Table",
            { margin: 6, maxSize: new go.Size(200, NaN) },
            // the two TextBlocks in column 0 both stretch in width
            // but align on the left side
            $(go.RowColumnDefinition,
              {
                column: 0,
                stretch: go.GraphObject.Horizontal,
                alignment: go.Spot.Left
              }),
            // the name
            $(go.TextBlock,
              {
                row: 0, column: 0,
                maxSize: new go.Size(160, NaN), margin: 2,
                font: "500 16px Roboto, sans-serif",
                alignment: go.Spot.Top,

              },
              new go.Binding("text", "name")),
            // the country flag
            $(go.Picture,
              {
                row: 0, column: 1, margin: 2,
                imageStretch: go.GraphObject.Uniform,
                alignment: go.Spot.TopRight
              },
              // only set a desired size if a flag is also present:
              new go.Binding("desiredSize", "check", function() { return new go.Size(34, 26) }),
              new go.Binding("source", "check", theNationFlagConverter)),
            // the additional textual information
            $(go.TextBlock,
              {
                row: 1, column: 0, columnSpan: 2,
                font: "12px Roboto, sans-serif",
                
              },
              new go.Binding("text", "", theInfoTextConverter))
          )  // end Table Panel
        );  // end Node

      // define the Link template, a simple orthogonal line
      myDiagram.linkTemplate =
        $(go.Link, go.Link.Orthogonal,
          { corner: 5, selectable: false },
          $(go.Shape, { strokeWidth: 3, stroke: "#424242" }));  // dark gray, rounded corner links


      // set up the nodeDataArray, describing each person/position
      var nodeDataArray = [
        { key: 0, name: "Website TMĐT"},
        { key: 1, boss:0, name: "Dịch vụ Khách Hàng",title:"Đã Xong"},
        { key: 2, boss:0, name: "Dịch vụ Quản trị",title:"Đã Xong"},
        { key: 3, boss:1, name: "Duyệt Sản Phẩm",title:"Đã Xong",},
        { key: 4, boss:1, name: "Quản Lý Giỏ Hàng",title:"Đã Xong",},
        {key: 5 , boss:1, name: "Quản lý TT Người Dùng",title:"Đã Xong",},
        {key: 55 , boss:3, name: "Xem sản phẩm khuyến mãi",title:"Đã Xong",},
        {key: 19 , boss:3, name: "Xem sản phẩm nổi bật",title:"Đã Xong",},
        {key: 6 , boss:3, name: "Xem sản phẩm mới nhất",title:"Đã Xong",},
        {key: 61 , boss:3, name: "Xem sản phẩm theo thương hiệu",title:"Đã Xong",},
        {key: 62 , boss:3, name: "Xem mã giảm giá",title:"Đã Xong",},
        {key: 70 , boss:3, name: "Xem tin tức",title:"Đã Xong",},
        {key: 9 , boss:4, name: "Tạo giỏ hàng",title:"Đã Xong",},
        {key: 71 , boss:4, name: "Tạo danh sách mong muốn",title:"Đã Xong",},
        {key: 10 , boss:4, name: "Cập Nhật Giỏ Hàng",title:"Đã Xong",},
        {key: 11 , boss:5, name: "Xem & Cập nhật Thông tin",title:"Đã Xong",},
        {key: 12 , boss:5, name: "Xem Lịch sử hóa đơn",title:"Đã Xong",},
        {key: 56 , boss:1, name: "Tìm kiếm Sản Phẩm",title:"Đã Xong"},
        {key: 57 , boss:56, name: "Tìm theo giá tiền",title:"Đã Xong",},
        {key: 58 , boss:56, name: "Tìm theo màu sắc",title:"Đã Xong",},
        {key: 59 , boss:56, name: "Tìm theo danh mục",title:"Đã Xong",},
        {key: 60 , boss:56, name: "Tìm theo tên",title:"Đã Xong",},
        {key: 63 , boss:56, name: "Tìm theo thương hiệu",title:"Đã Xong",},
        {key: 14 , boss:4, name: "Thanh Toán Hóa Đơn",title:"Đã Xong",},

        {key:21,boss:5,name:"Đăng ký nhận tin KM",title:"Đã Xong",},
        {key:22,boss:2,name:"Quản lý Bán Hàng",title:"Đã Xong"},
        {key:23,boss:22,name:"Cập nhật danh mục",title:"Đã Xong",title:"Đã Xong",},
        {key:24,boss:23,name:"C.N Khách hàng",title:"Đã Xong",},
        {key:25,boss:23,name:"C.N Sản phẩm",title:"Đã Xong"},
        {key:26,boss:23,name:"C.N Loại SP",title:"Đã Xong"},
        {key:27,boss:23,name:"C.N Thuộc Tính",title:"Đã Xong"},
        {key:55,boss:23,name:"C.N Coupons",title:"Đã Xong"},
        {key:64,boss:23,name:"C.N Thương Hiệu",title:"Đã Xong"},
        {key:73,boss:23,name:"C.N Tin tức",title:"Đã Xong"},
        {key:80,boss:23,name:"C.N Slide",title:"Đã Xong"},
        {key:28,boss:22,name:"Quản lý hóa đơn",title:"Đã Xong"},
        {key:29,boss:28,name:"C.N Tình trạng hóa đơn",title:"Đã Xong"},
        {key:30,boss:28,name:"Tra cứu hóa đơn",title:"Đã Xong"},
        {key:33,boss:22,name:"Thống kê báo cáo",title:"Đã Xong"},
        {key:34,boss:33,name:"TK SL Đơn hàng",title:"Đã Xong"},
        {key:35,boss:33,name:"TK Lợi nhuận",title:"Đã Xong"},
        {key:36,boss:33,name:"TK SP Bán chạy",title:"Đã Xong"},
        {key:37,boss:33,name:"TK Khách hàng tiềm năng",title:"Đã Xong"},
        {key:38,boss:33,name:"TK Độ hài lòng của KH",title:"Đã Xong"},
        {key:39,boss:2,name:"Quản lý hệ thống"},
        {key:40,boss:39,name:"Cấu hình chung",title:"Đã Xong"},
        {key:81,boss:39,name:"SafeMode",title:"Đã Xong"},
        {key:56,boss:39,name:"Đăng Nhập / Đăng Xuất",title:"Đã Xong"},
        {key:65,boss:39,name:"Quản lý menu",title:"Đã Xong"},
        {key:41,boss:39,name:"Sao lưu / Phục hồi CSDL",title:"Đã Xong"},
        {key:42,boss:39,name:"Trích xuất DL",title:"Đã Xong"},
        {key:43,boss:39,name:"Cấu hình kênh bán hàng",title:"Đã Xong"},

      ];

      // create the Model with data for the tree, and assign to the Diagram
      myDiagram.model =
        $(go.TreeModel,
          {
            nodeParentKeyProperty: "boss",  // this property refers to the parent node data
            nodeDataArray: nodeDataArray
          });

      // Overview
      myOverview =
        $(go.Overview, "myOverviewDiv",  // the HTML DIV element for the Overview
          { observed: myDiagram, contentAlignment: go.Spot.Center });   // tell it which Diagram to show and pan
    }

    // the Search functionality highlights all of the nodes that have at least one data property match a RegExp
    function searchDiagram() {  // called by button
      var input = document.getElementById("mySearch");
      if (!input) return;
      input.focus();

      myDiagram.startTransaction("highlight search");

      if (input.value) {
        // search four different data properties for the string, any of which may match for success
        // create a case insensitive RegExp from what the user typed
        var regex = new RegExp(input.value, "i");
        var results = myDiagram.findNodesByExample({ name: regex },
          { nation: regex },
          { title: regex },
          { headOf: regex });
        myDiagram.highlightCollection(results);
        // try to center the diagram at the first node that was found
        if (results.count > 0) myDiagram.centerRect(results.first().actualBounds);
      } else {  // empty string only clears highlighteds collection
        myDiagram.clearHighlighteds();
      }

      myDiagram.commitTransaction("highlight search");
    }
  </script>
</head>
<body onload="init()">
<div id="sample" style="position: relative;">
  <div id="myDiagramDiv" style="background-color: white; border: solid 1px black; width: 100%; height: 700px"></div>
  <div id="myOverviewDiv"></div> <!-- Styled in a <style> tag at the top of the html page -->
  
</div>

<script src="{{asset('@styleadmin/js/go.js')}}"></script>

@endsection

