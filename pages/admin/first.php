<div class="container mt-5 ">
    <div class="row">
        <div class="col-sm-6">
            <h2 class="ml-5">จัดการสินค้า</h2>
        </div>
        <div class="col-sm-6">
            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".openModalCreate">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="scroll ml-5">
        <table class="table table-hover mb-5 ">
            <thead>
                <th>#</th>
                <th>รูป</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียด</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>เครื่องมือ</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $sql = "SELECT * FROM products";
                $query = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td width="10%"><img src="<?= $row['image'] ?>" alt="" style="width: 40px;"></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['detail'] ?></td>
                        <td><?= $row['stock'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td>
                            <a href="updateProduct.php?productId=<?= $row['productId'] ?>" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                            <a href="../../system/admin/deleteProduct.php?productId=<?= $row['productId'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('ต้องการลบใช่หรือไม่ ?');">ลบ</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>