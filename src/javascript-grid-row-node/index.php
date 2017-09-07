<?php
$key = "Row Node";
$pageTitle = "ag-Grid Row Node";
$pageDescription = "Each piece of row data provided to the grid is wrapped in a Row Node. This section describes the Row Node and how you can use it in your applications.";
$pageKeyboards = "ag-Grid data row model";
$pageGroup = "row_models";
include '../documentation-main/documentation_header.php';
?>

<div>

    <h2 id="rowNode">Row Node</h2>

    <p>
        A rowNode is an ag-Grid representation of one row of data. The rowNode will contain a reference to the
        data item your application provided as well as other ag-Grid runtime information about the row. The
        rowNode contains attributes. Additional attributes are used if the node is a group.
    </p>

    <h3 id="all-node-attributes">All Node Attributes</h3>

    <p>
        <ul>
            <li><b>id:</b> Unique ID for the node. Either provided by the application, or generated by the grid if not.</li>
            <li><b>data:</b> The data as provided by the application.</li>
            <li><b>parent:</b> The parent node to this node, or empty if top level.</li>
            <li><b>level:</b> How many levels this node is from the top when grouping.</li>
            <li><b>uiLevel:</b> How many levels this node is from the top when grouping in the UI (only different to 'parent' when property <code>groupRemoveSingleChildren=true</code>.</li>
            <li><b>group:</b> True if this node is a group node (ie has children).</li>
            <li><b>firstChild:</b> True if this is the first child in this group</li>
            <li><b>lastChild:</b> True if this is the last child in this group</li>
            <li><b>childIndex:</b> The index of this node in the group.</li>
            <li><b>rowPinned:</b> 'top' or 'bottom' if pinned row, otherwise null or undefined.</li>
            <li><b>canFlower:</b> True if this node can flower (ie can be expanded, but has no direct children).</li>
            <li><b>childFlower:</b> The child flower of this node.</li>
            <li><b>childIndex:</b> Index of this row with respect to it's parent when grouping. Changes when data is sorted.</li>
            <li><b>firstChild:</b> True if this is the first child in this group. Changes when data is sorted.</li>
            <li><b>lastChild:</b> True if this is the last child in this group. Changes when data is sorted.</li>
            <li><b>stub:</b> Used by enterprise row model, true if this row node is a stub. A stub is a placeholder row with loading icon while waiting from row to be loaded.</li>
            <li><b>rowHeight:</b> The row height in pixels.</li>
            <li><b>rowTop:</b> The row top position in pixels.</li>
            <li><b>quickFilterAggregateText:</b> If using quick filter, stores a string representation of the row for searching against.</li>
        </ul>
    </p>

    <h3 id="group-node-attributes">Group Node Attributes</h3>

    <p>
    <ul>
        <li><b>groupData:</b> If using grid grouping, contains the group values for this group.</li>
        <li><b>aggData:</b> If using grid grouping and aggregation, contains the aggregation data.</li>
        <li><b>key:</b> The key for the grouping eg Ireland, UK, USA.</li>
        <li><b>field:</b> The field (string) we are grouping on eg 'country'.</li>
        <li><b>rowGroupColumn:</b> The row group column used for this group, eg the Country column instance.</li>
        <li><b>rowGroupIndex:</b> If doing in memory grouping, this is the index of the group column this cell is for.
            This will always be the same as the level, unless we are collapsing groups ie <code>groupRemoveSingleChildren=true</code></li>
        <li><b>expanded:</b> True if group is expanded, otherwise false.</li>
        <li><b>footer:</b> True if row is a footer. Footers  have group = true and footer = true.</li>
        <li><b>allLeafChildren:</b> All lowest level nodes beneath this node, no groups.</li>
        <li><b>childrenAfterGroup:</b> Children of this group. If multi levels of grouping, shows only immediate children.</li>
        <li><b>childrenAfterFilter:</b> Filtered children of this group.</li>
        <li><b>childrenAfterSort:</b> Sorted children of this group.</li>
        <li><b>allChildrenCount:</b> Number of children and grand children.</li>
        <li><b>leafGroup:</b> True if this node is a group and the group is the bottom level in the tree.</li>
        <li><b>sibling:</b> If doing footers, reference to the footer node for this group.</li>
    </ul>
    </p>

    <h3 id="node-methods">Row Node Methods</h3>

    <p>
    <ul>
        <li><b>setSelected(newValue: boolean, clearSelection: boolean):</b> Select (or deselect) the node. newValue=true for selection,
            newValue=false for deselection. If selecting, then passing true for clearSelection will select the
            node exclusively (ie NOT do multi select). If doing deselection, clearSelection has no impact.</li>
        <li><b>isSelected():</b> Returns true if node is selected, otherwise false.</li>
        <li><b>addEventListener(eventType: string, listener: Function):</b> Add an event listener. Currently only
            rowSelected event supported.</li>
        <li><b>removeEventListener(eventType: string, listener: Function)</b> Remove event listener.</li>
        <li><b>resetQuickFilterAggregateText()</b>: First time quickFilter runs, the grid creates a one off
            string representation of the row. This one string is then used for the quick filter instead of
            hitting each column separately. When you edit, using grid editing, this string gets cleared down.
            However if you edit without using grid editing, you will need to clear this string down for the
            row to be updated with the new values. Otherwise new values will not work with the quickFilter.</li>
        <li><b>depthFirstSearch(callback):</b> Do a tree search dept first search of this node and it's children.</li>
        <li><b>setRowHeight(height):</b> Sets the row height. Call if you want to change the height initially
            assigned to the row. After calling, you must call api.onRowHeightChanged() so the grid knows it
            needs to work out the placement of the rows.</li>
        <li><b>setData(newData):</b> Sets the data for this item. Results in the entire row getting refreshed.</li>
    </ul>

    <h2>Events on Row Nodes</h2>

    <p>
        The following events can be listened to on rowNodes.
    </p>

    <ul>
        <li><b>rowSelected</b>: Row was selected or unselected.</li>
        <li><b>mouseEnter</b>: Mouse has entered the row.</li>
        <li><b>mouseLeave</b>: Mouse has left the row.</li>
        <li><b>cellChanged</b>: One cell value has changed. This can be result of any changes to <code>data</code>, <code>data</code> or <code>data</code>.</li>
        <li><b>allChildrenCountChanged</b>: <code>allChildrenCount</code> has changed.</li>
        <li><b>dataChanged</b>: <code>rowData</code> has changed.</li>
        <li><b>heightChanged</b>: <code>rowHeight</code> has changed.</li>
        <li><b>topChanged</b>: <code>rowTop</code> has changed.</li>
        <li><b>firstChildChanged</b>: <code>firstChild</code> has changed.</li>
        <li><b>lastChildChanged</b>: <code>lastChild</code> has changed.</li>
        <li><b>childIndexChanged</b>: <code>childIndex</code> has changed.</li>
        <li><b>rowIndexChanged</b>: <code>rowIndex</code> has changed.</li>
        <li><b>expandedChanged</b>: <code>expanded</code> has changed.</li>
        <li><b>uiLevelChanged</b>: <code>uiLevel</code> has changed.</li>
    </ul>

    <p>
        All events fired by the rowNode are synchronous (events are normally asynchronous). The grid is also
        listening on these events internally. What that means is when you receive an event, the grid may still
        have some work to do (eg if rowTop changed, the grid UI may still have to update to reflect this change).
        It is also best you do not call any grid API functions while receiving events from the rowNode (as the
        grid is still processing), instead put your logic into a timeout and call the grid in another VM turn.
    </p>

    <p>
        When adding event listeners to a row, they will stay with the row until the row is destroyed. So if the row
        is taken out of memory (pagination or virtual paging) then the listener will be removed. Likewise if you set
        new data into the grid, all listeners on the old data will be removed.
    </p>

    <p>
        Be careful adding listeners to rowNodes in cell renderer's that you remove the listener when the rendered
        row in destroyed due to row virtualisation. You can cater for this as follows:
        <pre>var renderer = function(params) {
    // add listener
    var selectionChangedCallback = function () {
        // some logic on selection changed here
        console.log('node selected = ' + params.node.isSelected());
    };
    params.node.addEventListener(RowNode.EVENT_ROW_SELECTED, selectionChangedCallback);

    // remove listener on destroy
    params.addRenderedRowEventListener('renderedRowRemoved', function() {
        params.node.removeEventListener(RowNode.EVENT_ROW_SELECTED, selectionChangedCallback);
    }

    return params.value;
}</pre>
    </p>

</div>

<?php include '../documentation-main/documentation_footer.php';?>