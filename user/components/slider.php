<section class="collection-box">
                                    <div class="collection-heading">
                                        <h1>top hottest products</h1>
                                        <p class="card-btn">
                                            <span> &#139; </span>
                                            <span> &#155;  </span>
                                        </p>
                                    </div>
                                    <div class="da">
                                    <?php
                                    
                                    $r_res=mysqli_query($conn,$r_sql) or die("Can't find products!!");
                                    while($r_data=mysqli_fetch_assoc($r_res)){
                                    
                                    ?>
                                    
                                    <div class="product">
                                                <picture>
                                                    <img src="<?php echo "../upload/".$r_data['img']; ?>" alt="">
                                                </picture>
                                                <div class="details">
                                                    <p>
                                                        <a href="<?php echo "./product.php?prd={$r_data['id']}"; ?>"><?php echo substr($r_data['b_name'],0,40)."..."; ?></a><br>
                                                        <small><?php echo $r_data['author_name']; ?></small>
                                                    </p>
                                                    <div class="prizebox">
                                                        <div class="orignal"> &#x20B9; <?php echo $r_data['prize']; ?></div>
                                                        <div class="mrp">&#x20B9;<?php echo $r_data['mrp']; ?></div>
                                                    </div>
                                                </div>
                                    </div>
                                        
                                    
                                <?php } ?>
                                        
                                        <div class="product" style="border: none !important;display:flex;justify-content:start;margin-left:20px;align-items:center;">
                                            <a class="btn-a" href="./category.php">View More</a></div>
                                    </div>
                            </section>