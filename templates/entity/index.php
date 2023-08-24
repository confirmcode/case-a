<div class="form-wrap">
    <label for="toggle-view-list">
       list <input id="toggle-view-list" class="toggle-view" checked type="radio" name="view" value="list" />
    </label>
    &nbsp; | &nbsp;
    <label for="toggle-view-grid">
       <input id="toggle-view-grid" class="toggle-view" type="radio" name="view" value="list" />
       grid
    </label>
    <form method="post" class="form">
        <!-- <input type="hidden" name="csrf"> todo добавить csrf -->
        <!-- <input type="text" name="id"> -->
        <input type="text" name="sku" minlength="3" maxlength="50" required placeholder="SKU">
        <input type="text" name="title" minlength="3" maxlength="200" required placeholder="Title">
        <button>Send</button>
    </form>
</div>

<div class="entity-list view-list">
<?php 
if ( $data['entity'] ) {
    foreach( $data['entity'] as $row ) {
        echo "
        <div class='entity-item'>
            <div class='entity-card' id='entity-{$row['id']}'>
                <div class='prop-id'>{$row['id']}</div>
                <div class='prop-sku'>{$row['sku']}</div>
                <div class='prop-title'>{$row['title']}</div>
                <div class='remove'>✕</div>
            </div>
        </div>
        ";
    }
}
?>
</div>