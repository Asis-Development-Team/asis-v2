                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="/dashboard">Home</a>
                        </li>
                        <li>
                            <span class="active"><?php print $page_title ?></span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->


                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->

                        <div class="col-md-8"  style="margin-left: 0; padding-left: 0">
	                        <div class="page-title">
	                            <h4><?php print $page_title ?> <?php if($this->session->sess_user_level_id < '3'){ print (@$_GET['cabang']) ? $outlet['result']['cabang_nama'] : ''; } ?> (<span id="total-data-text"><?php print $total ?></span>)</h4>
	                            

                                <div style="padding: 10px 0" class="bold">
                                    <h4>
                                    Data berdasarkan ketersediaan produk pada setiap outlet.<br />
                                    <span class="font-red">Klik pada kolom harga untuk memperbarui data.</span>
                                    </h4>
                                </div>

                            </div>
                        </div>
                        <!-- END PAGE TITLE -->

                        <div class="col-md-4 text-right hide">

                            <a href="/<?php print $this->uri->segment('1') ?>/<?php print $page_url ?>-form" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Tambah Data"><i class="fa fa-plus"></i></a>
                            <a href="javascript:;" data-href="/admin/<?php print $page_url; ?>/export" id="export-product-to-excel" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Export To Excel"><i class="glyphicon glyphicon-export "></i></a>
                            

                        </div>

               

                    </div>
                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">

                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box purplex">

                                <div class="portlet-body">

		                                    <div class="btn-group">
		                                        <a class="btn blue btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> 
		                                        	<?php 
		                                        	print	(@$_GET['show']) ? @$_GET['show'] : 'Tampilkan';
		                                        	?>
		                                            <i class="fa fa-angle-down"></i>
		                                        </a>
		                                        <ul class="dropdown-menu">
		                                            <li>
		                                                <a href="/<?php print $this->uri->segment('1') ?>/<?php print $this->uri->segment('2') ?>/?q=<?php print @$_GET['q'] ?>&cabang=<?php print @$_GET['cabang'] ?>&show=20"> 20 </a>
		                                            </li>
		                                            <li>
		                                                <a href="/<?php print $this->uri->segment('1') ?>/<?php print $this->uri->segment('2') ?>/?q=<?php print @$_GET['q'] ?>&cabang=<?php print @$_GET['cabang'] ?>&show=50"> 50 </a>
		                                            </li>
		                                            <li>
		                                                <a href="/<?php print $this->uri->segment('1') ?>/<?php print $this->uri->segment('2') ?>/?q=<?php print @$_GET['q'] ?>&cabang=<?php print @$_GET['cabang'] ?>&show=100"> 100 </a>
		                                            </li>
		                                        </ul>
		                                    </div>

			                        <div class="pull-right">
			 

			                            <form name="search-<?php print $page_url ?>" id="form-search-<?php print $page_url ?>" method="get">

                                            <div class="form-inline">
                                              <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search" name="q" value="<?php print @$_GET['q'] ?>" />
                                              </div>

                                              <div class="form-group <?php if($this->session->sess_user_level_id > 2){ print 'hidden'; } ?>">
                                                <select class="form-control" name="cabang">

                                                    <option value="">- Semua Outlet -</option>

                                                    <?php 
                                                    foreach($outlets as $cabang): 
                                                        
                                                        $selected   =   (@$_GET['cabang'] == $cabang['cabang_id']) ? 'selected' : '';

                                                        print '<option value="'.$cabang['cabang_id'].'" '.$selected.'>'.$cabang['cabang_nama'].'</option>';

                                                        unset($selected);

                                                    endforeach;
                                                    ?>
                                                    
                                                </select>
                                              </div>


                                              <div class="form-group">

                                                <button type="submit" class="btn green tooltips" data-container="body" data-placement="top" data-original-title="Search"><i class="fa fa-search"></i></button>               
                                                <button type="button" class="btn green tooltips btn-refresh" data-container="body" data-placement="top" data-original-title="Reset"><i class="fa fa-refresh"></i></button>                                                
                                                <a href="/<?php print $this->uri->segment('1') ?>/<?php print $page_url ?>-form" class="btn green tooltips hidden" data-container="body" data-placement="top" data-original-title="Tambah Data"><i class="fa fa-plus"></i></a>
                                                <a href="javascript:;" data-href="/admin/<?php print $page_url; ?>/export" id="export-product-to-excel" class="btn green tooltips hidden" data-container="body" data-placement="top" data-original-title="Export To Excel"><i class="glyphicon glyphicon-export "></i></a>

                                              </div>
                                            </div>                                             
			                                
			   

			                            </form>
			                        </div>                           
			                        




                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    
                                                    <th width="2%" class="hide-if-mobile hide-from-user hidden"> </th>
                                                	

                                                	<th scope="col" class="hidden"> <?php /* style="width:60px !important" width="15%" */ ?>></th>

                                                    <th scope="col"  width="10%" class="text-center"> <strong>Kode</strong> </th>
                                                    <th scope="col" class="text-center"> <strong>Nama Produk</strong> </th>
                                                    <th scope="col" class="text-center"> <strong>HPP</strong> </th>
                                                    <th scope="col" class="text-center"> <strong>Harga Dealer</strong> </th>
                                                    <th scope="col" class="text-center"> <strong>Harga User</strong> </th>

                                                    <th scope="col" class="text-center"> <strong>Outlet</strong> </th>
                                                                                                        
                                                </tr>
                                            </thead>

                                            <tbody>

                                            	<?php 
                                            	foreach($result as $result):
                                            	?>
                                                <tr class="parent-<?php print $result['stok_id'] ?> counter">
                                                    
                                                    <td class="center hide-if-mobile hide-from-user hidden">
                                                        <input type="checkbox" class="checkboxes checkbox-delete" value="<?php print $result['stok_id'] ?>" id="checkbox-delete-<?php print $result['stok_id'] ?>" name="multichecked[]" />
                                                    </td>

                                                    <td class="hidden">
                                                    	
	                                                    <div class="text-center">
	                                                    <a href="/<?php print $this->uri->segment('1') ?>/<?php print $page_url ?>-form/?id=<?php print $result['stok_id'] ?>" data-container="body" data-placement="top" data-original-title="Edit" class="tooltips"><i class="fa fa-edit"></i></a>
	                                                    
                                                        <a href="javascript:;" class="delete-single-baru hidden" data-id="<?php print $result['stok_id'] ?>" data-controller="<?php print $this->uri->segment('1') ?>" data-page="<?php print $page_identifier ?>" data-field="stok_id" data-container="body" data-placement="top" data-original-title="Delete" class="tooltips">
                                                            <i class="fa  fa-trash-o"></i>
                                                        </a>


                                                        </div>       

                                                    </td>


                                                    <td class="text-center"><span class="text-center"><?php print $result['stok_produk_kode'] ?></span></td>       
                                                    <td class="text-left"><?php print $result['nama_produk'] ?></td>

                                                    <td class="text-right td-hpp" id="<?php print $result['stok_id'] ?>" data-kode="<?php print $result['stok_produk_kode'] ?>">
                                                        
                                                        <span id="td-hpp-text-<?php print $result['stok_id'] ?>">
                                                            <?php print $this->tools->format_angka($result['product_hpp'],0) ?>
                                                        </span>    

                                                        <span id="td-hpp-input-<?php print $result['stok_id'] ?>" style="display: none;">
                                                            <input type="text" class="form-control text-right product-hpp-input number-onlyx nomer-auto" name="product_hpp" id="product-hpp-input-<?php print $result['stok_id'] ?>" data-id="<?php print @$result['stok_id'] ?>" data-kode="<?php print @$result['stok_produk_kode'] ?>" value="<?php print substr(@$result['product_hpp'],0,-3) ?>" data-old="<?php print substr(@$result['product_hpp'],0,-3) ?>">
                                                        </span>           

                                                    </td> 

                                                    <td class="text-right td-hpp-dealer" id="<?php print $result['stok_id'] ?>" data-kode="<?php print $result['stok_produk_kode'] ?>">

                                                        <span id="td-hpp-dealer-text-<?php print $result['stok_id'] ?>">
                                                            <?php print $this->tools->format_angka($result['hpp_dealer_2'],0) ?>
                                                        </span>    

                                                        <span id="td-hpp-dealer-input-<?php print $result['stok_id'] ?>" style="display: none;">
                                                            <input type="text" class="form-control text-right product-hpp-dealer-input number-onlyx nomer-auto" name="product_hpp_dealer" id="product-hpp-dealer-input-<?php print $result['stok_id'] ?>" data-id="<?php print @$result['stok_id'] ?>" data-kode="<?php print @$result['stok_produk_kode'] ?>" value="<?php print str_replace('.','',$this->tools->format_angka($result['hpp_dealer_2'],0)); ?>" data-old="<?php print str_replace('.','',$this->tools->format_angka($result['hpp_dealer_2'],0)) ?>">
                                                        </span>                                                            
                                                        
                                                    </td>

                                                    <td class="text-right td-hpp-user" id="<?php print $result['stok_id'] ?>" data-kode="<?php print $result['stok_produk_kode'] ?>">
                                                        
                                                        <span id="td-hpp-user-text-<?php print $result['stok_id'] ?>">
                                                            <?php print $this->tools->format_angka($result['hpp_user_2'],0) ?>
                                                        </span>    

                                                        <span id="td-hpp-user-input-<?php print $result['stok_id'] ?>" style="display: none;">
                                                            <input type="text" class="form-control text-right product-hpp-user-input number-onlyx nomer-auto" name="product_hpp_user" id="product-hpp-user-input-<?php print $result['stok_id'] ?>" data-id="<?php print @$result['stok_id'] ?>" data-kode="<?php print @$result['stok_produk_kode'] ?>" value="<?php print str_replace('.','',$this->tools->format_angka($result['hpp_user_2'],0)); ?>" data-old="<?php print str_replace('.','',$this->tools->format_angka($result['hpp_user_2'],0)) ?>">
                                                        </span>      

                                                        <?php //print $this->tools->format_angka($result['hpp_user_2'],0) ?>

                                                    </td> 
                                                    
                                                    <td class="text-center"><?php print $result['nama_cabang'] ?></td> 
     

                                                </tr>

	                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>


                                        <div class="row">
                                        	
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-danger btn-delete-checkbox-baru hide-if-mobile hide-from-user hidden" data-controller="<?php print $this->uri->segment('1') ?>" data-page="<?php print $page_identifier ?>" data-field="stok_id"><i class="icon-trash"></i> Delete Selected</button>
                                             </div>
                                            

                                        	<div class="col-md-6 text-right">

	                                            <ul class="pagination pagination-sm">

	                                            	<?php
	                                            	print $paging
	                                            	?>

	                                            </ul>        
	                                        </div>

                                        </div><!--eof row-->

                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->


                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
