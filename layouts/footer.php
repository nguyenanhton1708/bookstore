</div>
 <div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="public/fontend/images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="public/fontend/images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="public/fontend/images/deal.png"></a>
                    </div>
                </div>
                <div class="container-pluid">
                    <section id="footer">
                        <div class="container">
                            <div class="col-md-3" id="shareicon">
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8" id="title-block">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="footer-button">
                        <div class="container-pluid">
                            <div class="container">
                                <div class="col-md-3" id="ft-about">
                                    <p>
                                        Mua s??ch online t???i BOOK STORE ????? ???????c c???p nh???t nhanh nh???t c??c t???a s??ch ????? th??? lo???i v???i m???c gi???m 15 ??? 35% c??ng nhi???u ??u ????i, qu?? t???ng k??m. Qua nhi???u n??m, kh??ng ch??? l?? ?????a ch??? tin c???y ????? b???n mua s??ch tr???c tuy???n, BOOK STORE c??n c?? qu?? t???ng, v??n ph??ng ph???m v???i ch???t l?????ng ?????m b???o t??? h??ng tr??m th????ng hi???u uy t??n trong v?? ngo??i n?????c.
                                    </p>
                                </div>
                                <div class="col-md-3 box-footer" >
                                    <h3 class="tittle-footer">T??i kho???n c???a b???n</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> C???p nh???t t??i kho???n </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>Gi??? h??ng</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> L???ch s??? giao d???ch </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> S???n ph???m y??u th??ch</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>Ki???m tra ????n h??ng</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 box-footer">
                                    <h3 class="tittle-footer">Tr??? Gi??p</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> TR??? GI??P</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> ????ng k?? nh???n b???n tin </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>  H?????ng d???n mua h??ng</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Ph????ng th???c thanh to??n</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Ch??nh s??ch ?????i - tr???</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3" id="footer-support">
                                    <h3 class="tittle-footer"> Li??n h??? </h3>
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Tr?????ng ?????i h???c C??ng ngh??? TP. H??? Ch?? Minh  </p>
                                            <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0364129272</p>
                                            <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> thanhthaiqngai3011@gmail.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="ft-bottom">
                        <p class="text-center">Copyright ?? 2020 . Design by  ... !!! </p>
                    </section>
                </div>
            </div>
        </div>
        </div>      
        </div>
        <script  src="public/fontend/js/slick.min.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })




    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault(); //kh??ng load l???i trang
            $qty = $(this).parents("tr").find(".qty").val();//l???y s??? l?????ng ng?????i d??ng nh???p v??o

            $key = $(this).attr("data-key");//key c???a ????n h??ng c???n s???a
            $.ajax({
                url: 'cap-nhap-gio-hang.php', 
                type: 'GET',
                data: {'qty':$qty,'key':$key},//d??? li???u g???i sang file cap-nhap-gio-hang
                success:function(data)
                {
                    if(data == 1)
                    {
                        alert("c???p nh???p gi??? h??ng th??nh c??ng !");
                        location.href='gio-hang.php';
                    }
                }
            });
        })
    })
</script>
