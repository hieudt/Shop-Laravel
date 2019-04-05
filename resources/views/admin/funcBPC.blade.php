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
  <script src="../release/go.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <script src="../assets/js/goSamples.js"></script>  <!-- this is only for the GoJS Samples framework -->
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
      function theNationFlagConverter(nation) {
        return "https://www.nwoods.com/go/Flags/" + nation.toLowerCase().replace(/\s/g, "-") + "-flag.Png";
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
                alignment: go.Spot.Top
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
              new go.Binding("desiredSize", "nation", function() { return new go.Size(34, 26) }),
              new go.Binding("source", "nation", theNationFlagConverter)),
            // the additional textual information
            $(go.TextBlock,
              {
                row: 1, column: 0, columnSpan: 2,
                font: "12px Roboto, sans-serif"
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
        { key: 0, name: "Website TMĐT" },
        { key: 1, boss:0, name: "Dịch vụ Khách Hàng"},
        { key: 2, boss:0, name: "Dịch vụ Quản trị"},
        { key: 3, boss:1, name: "Phía trình duyệt"},
        { key: 4, boss:1, name: "Giỏ Hàng"},
        {key: 5 , boss:1, name: "Người Dùng"},
        {key: 6 , boss:3, name: "Tìm sản phẩm"},
        {key: 7 , boss:3, name: "Xem sản phẩm"},
        {key: 8 , boss:3, name: "Đăng nhập"},
        {key: 9 , boss:4, name: "Tạo giỏ hàng"},
        {key: 10 , boss:4, name: "Thêm / Xóa SP"},
        {key: 11 , boss:5, name: "Thông tin người dùng"},
        {key: 12 , boss:5, name: "Lịch sử hóa đơn"},
        {key: 13 , boss:5, name: "Mua sản phẩm"},
        {key: 14 , boss:13, name: "Tạo hóa đơn"},
        {key: 15 , boss:13, name: "Chọn phương thức thanh toán"},
        {key: 16 , boss:13, name: "Kiểm tra hóa đơn"},
        {key: 17 , boss:16, name: "Cập nhật giỏ hàng"},
        {key: 18 , boss:16, name:" Cập nhật số lượng SP"},
        {key:19,boss:5,name:"Đăng Xuất"},
        {key:20,boss:5,name:"Gửi Phản Hồi"},
        {key:21,boss:5,name:"Đăng ký nhận tin KM"},
        {key:22,boss:2,name:"Quản lý Bán Hàng"},
        {key:23,boss:22,name:"Cập nhật danh mục"},
        {key:24,boss:23,name:"C.N Khách hàng"},
        {key:25,boss:23,name:"C.N Sản phẩm"},
        {key:26,boss:23,name:"C.N Loại SP"},
        {key:27,boss:23,name:"C.N Thuộc Tính"},
        {key:28,boss:22,name:"Quản lý hóa đơn"},
        {key:29,boss:28,name:"C.N Tình trạng hóa đơn"},
        {key:30,boss:28,name:"Tra cứu hóa đơn"},
        {key:31,boss:28,name:"Lập Hóa Đơn"},
        {key:32,boss:28,name:"Lập CT Khuyến mãi"},
        {key:33,boss:22,name:"Thống kê báo cáo"},
        {key:34,boss:33,name:"TK SL Đơn hàng"},
        {key:35,boss:33,name:"TK Lợi nhuận"},
        {key:36,boss:33,name:"TK SP Bán chạy"},
        {key:37,boss:33,name:"TK Khách hàng tiềm năng"},
        {key:38,boss:33,name:"TK Độ hài lòng của KH"},
        {key:39,boss:2,name:"Quản lý hệ thống"},
        {key:40,boss:39,name:"Cấu hình chung"},
        {key:41,boss:39,name:"Sao lưu / Phục hồi CSDL"},
        {key:42,boss:39,name:"Trích xuất DL"},
        {key:43,boss:39,name:"Cấu hình kênh bán hàng"},
        {key:44,boss:2,name:"Dịch vụ FB"},
        {key:45,boss:44,name:"Tương tác User / Fanpage"},
        {key:46,boss:45,name:"Tra cứu lịch sử mua"},
        {key:47,boss:45,name:"Xem info SP"},
        {key:48,boss:45,name:"Mua SP"},
        {key:49,boss:45,name:"Cập nhật TT khách hàng"},
        {key:50,boss:44,name:"Kết nối kênh bán hàng"},
        {key:51,boss:44,name:"TK Đơn hàng"},
        {key:52,boss:44,name:"Kiểm tra lượng tương tác"},
        {key:53,boss:44,name:"Minigame Tool"},
        {key:54,boss:44,name:"Auto Rep Post"},
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
