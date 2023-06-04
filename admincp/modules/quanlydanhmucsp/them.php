<div class="row">
    <h2 class="text-success fw-bold">Add category</h2>
    <form action="modules/quanlydanhmucsp/xuly.php" method="post" enctype="multipart/form-data">
        <div class="border border-primary p-4">
            <div class="d-flex align-items-center">
                <span class="col-1 fw-bold">
                    Tên loại sản phẩm:
                </span>
                <input class="col-11 px-3 py-2 w-25" placeholder="Tên danh mục..." type="text" name="tendanhmuc">
            </div>
            <div class="d-flex align-items-center mt-3">
                <span class="col-1 fw-bold">
                    Thứ tự:
                </span>
                <input class="col-11 px-3 py-2 w-25" placeholder="Thứ tự..." type="text" name="thutu">
            </div>

            <div class="col-12 mt-3">
                <input class="btn btn-primary" name="themdanhmuc" type="submit" value="Thêm danh mục sản phẩm"></input>
            </div>
        </div>

    </form>
</div>