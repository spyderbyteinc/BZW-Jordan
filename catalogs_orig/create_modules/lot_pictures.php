<script src="../js/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

<style>
    .file_dropper{
        margin-top: 25px;
        padding: 20px;
        background-color: #EEE;
        border: 5px dashed #999;
        height: 300px;
        overflow: auto;
    }
</style>

<div id="picture_modal_bg" class="modal_bg">
    <div id="picture_modal" class="modal">

        <h4>Add Lot Pictures</h4>
        <form action="file_upload.php" class="file_dropper dropzone"></form>

        <p class="picture_upload_disclaimer">Pictures are automatically saved on upload</p>
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group buttons">
                    <a href="#" id="cancel_pictures" class="btn cancel_button">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="create_catalog_heading">Add and Manage Lot Pictures</h2>

    <section class="catalog_create">
        <div class="lot_operations">
            <button class="add_lot">Add Lot</button>
        </div>

        <div class="lot_list">
            <div class="lot_item">
                <span class="lot_name">Lot 1</span>
                <span class="lot_options">
                    <span class="camera"><i class="fas fa-camera-retro"></i></span>
                    <span class="edit"><i class="fas fa-edit"></i></span>                    
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 2</span>
                <span class="lot_options">
                    <span class="camera"><i class="fas fa-camera-retro"></i></span>
                    <span class="edit"><i class="fas fa-edit"></i></span>                    
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 3</span>
                <span class="lot_options">
                    <span class="camera"><i class="fas fa-camera-retro"></i></span>
                    <span class="edit"><i class="fas fa-edit"></i></span>                    
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 4</span>
                <span class="lot_options">
                    <span class="camera"><i class="fas fa-camera-retro"></i></span>
                    <span class="edit"><i class="fas fa-edit"></i></span>                    
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 5</span>
                <span class="lot_options">
                    <span class="camera"><i class="fas fa-camera-retro"></i></span>
                    <span class="edit"><i class="fas fa-edit"></i></span>                    
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
        </div>
    </section>