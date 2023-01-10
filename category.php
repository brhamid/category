<?php
include "db.php";
?>
<div class="card mt-5">
                        <div class="card-header">
                           Postun daxil olduğu kategoriyanı seçin
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="CATEGORY-DROPDOWN">kategoriya</label>
                                    <select class="form-control" id="category-dropdown">
                                        <option value="">əsas kategoriya</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM kategoriyalar where parent_id = 0");
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row["category"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="SUBCATEGORY">subkategoriya</label>
                                    <select class="form-control" id="sub-category-dropdown">
                                        <option value="">subkategoriyanı seçin</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#category-dropdown').on('change', function() {
                    var category_id = this.value;
                    $.ajax({
                        url: "subcat.php",
                        type: "POST",
                        data: {
                            category_id: category_id
                        },
                        cache: false,
                        success: function(result) {
                            $("#sub-category-dropdown").html(result);
                        }
                    });
                });
            });
        </script>