<?php
include_once dirname(__DIR__, 1) . '/Database/database.php';

try {
    $stmt = $pdo->query('SELECT * FROM product');
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>    
    
    <!-- Property List Start -->
     <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                        </div>
                    </div>
                 
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                        <?php foreach ($products as $product): ?>
                            <?php
                    $owner_whatsapp_number = '+2348116405518'; // Replace with the owner's WhatsApp number

                    foreach ($products as $product) {
                        $image_url = "https://yourdomain.com/AdminPage/Dashboard/Houses/" . $product['image'];
                        $message = "*Hello, I am interested in the property titled* '" . htmlspecialchars($product['title']) . "'.\n\n"
                                 . "*Here are the details:*\n"
                                 . "*Title:* " . htmlspecialchars($product['title']) . "\n"
                                 . "*Price:* " . htmlspecialchars($product['price']) . "\n"
                                 . "*Location:* " . htmlspecialchars($product['location']) . "\n"
                                 . "*Description:* " . htmlspecialchars($product['description']) . "\n"
                                 . "*Image:* " . $image_url . "\n";

                        // Encode the message
                        $encoded_message = urlencode($message);
                        
                        // Generate the WhatsApp link
                        $whatsapp_link = "https://wa.me/$owner_whatsapp_number?text=$encoded_message";
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href=""><img class="img-fluid" src="AdminPage/Dashboard/Houses/<?php echo ($product['image']) ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" style="width:100%;height:200px"></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo htmlspecialchars($product['building_status']); ?></div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo htmlspecialchars($product['category']); ?></div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><i class="fa-solid fa-naira-sign"></i><?php echo htmlspecialchars($product['price']); ?></h5>
                                <a class="d-block h5 mb-2" href=""><?php echo htmlspecialchars($product['title']); ?></a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo htmlspecialchars($product['location']); ?></p>
                                <p style="overflow-y:hidden; height:100px"><?php echo htmlspecialchars($product['description']); ?></p>
                                <a href="<?php echo $whatsapp_link; ?>" target="_blank">
                                    <button class="btn btn-success mb-2"><i class="fa-brands fa-whatsapp me-2 fs-3"></i>More details</button>
                                </a>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa-solid fa-building-user text-primary me-2"></i>Homes</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>Bath</small>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

            <?php endforeach; ?>

                          
                         
                            <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div> -->
                        </div>
                    </div>
                 
               
                </div>
            </div>
        </div>
        <!-- Property List End -->