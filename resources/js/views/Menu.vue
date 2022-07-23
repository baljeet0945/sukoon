<template>
	<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-wrapper">
            <!-- row -->
			<div class="listcontent-area">
				<aside class="cart-area  dz-scroll" id="cart_area">
					<div class="" >
						<div class="h-100" id="home-counter">
							<div class="card">
								<div class="card-body">
									<img src="assets/images/counter.jpg" class="img-fluid mb-5" alt="">
									<h3 class="title mb-4">Your Order in Progress Check Order</h3>
									<p class="mb-sm-5 mb-3">Click on any item or Add Order Button to create order</p>
									<a href="javascript:void(0);" id="add-order" class="btn btn-warning btn-rounded me-3">Add Order</a>
									<a href="front-orders_status.html" class="btn btn-warning light btn-rounded">Order Status</a>
								</div>
							</div>
						</div>
						<div class="h-100" id="add-order-content">
							<div class="card rounded-0">
								<div class="card-body p-0">
									<div class="table-responsive">
										<table class="table text-black">
											<thead>
												<tr>
													<th>ITEM</th>
													<th>PRICE</th>
													<th>QNT.</th>
													<th>TOTAL($)</th>
												</tr>
											</thead>
											<tbody>										
												<tr v-for="cart in this.carts" :key="cart.id">
													<td>{{ cart.product_name }}</td>
													<td>&#8377;{{ cart.price }}</td>
													<td>
														<div class="quantity btn-quantity style-1">
															<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
															<span class="input-group-btn-vertical text-center">
															<button
															@click="updateItemQty(cart, 'add')"
															class="btn btn-primary"
															>+</button>
															<span class="cart__quantity">{{ cart.qty }}</span>
															<button
															@click="updateItemQty(cart, 'subtract')"
															class="btn btn-primary"
															>-</button>
															</span>
															</div>
														</div>
													</td>
													<td>{{ cart.price * cart.qty }}</td>
												</tr>	
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card-order-footer">
								<div class="amount-details">
									<h5 class="d-flex text-right mb-3">
										<span class="text">Sub total </span>
										<span class="me-0 ms-auto">{{subtotal}}.00</span>
									</h5>
									<h5 class="d-flex text-right mb-3">
										<span class="text">Tax</span>
										<span class="me-0 ms-auto"> 3.00</span>
									</h5>
									<h5 class="d-flex text-right mb-3">
										<span class="text">Other Charge</span>
										<span class="me-0 ms-auto">0.00</span>
									</h5>
								</div>
								<div class="amount-payble">
									<h5 class="d-flex text-right mb-0">
										<span class="text">Amount to Pay</span>
										<span class="me-0 ms-auto">{{subtotal}}.00</span>
									</h5>
								</div>

								<div class="btn_box">
									<div class="row no-gutter mx-0">
										<a href="javascript:void(0);" id="home-counter-tab" class="btn btn-danger btn-block col-6 m-0 rounded-0">Cancel</a>
										<a href="javascript:void(0);" id="place-order-tab" class="btn btn-primary btn-block col-6 m-0 rounded-0">Place Order</a>
									</div>
								</div>
							</div>
						</div>
						<div class="h-100" id="place-order" >							
							<form @submit.prevent="placeOrder">
							<div class="card rounded-0">
								<div class="card-body">
										<h4 class="mb-4">Amount to Pay <strong> &#8377;{{subtotal}} </strong></h4>
										<div class="form-group mb-4 pb-2">
											<label class="font-w600">Select Payment Method</label>
											<div class="row no-gutters align-items-center">
												<div class="col-6 col-sm-6 col-md-6 col-lg-4">
													<div class="custom-control custom-radio">
														<input checked="" type="radio" value="cash" v-model="placeOrderForm.paymentMethod" class="custom-control-input">
														<label class="custom-control-label" for="cash"><span class="ms-2">Cash</span></label>
													</div>
												</div>
												<div class="col-6 col-sm-6 col-md-6 col-lg-4">
													<div class="custom-control custom-radio">
														<input type="radio" value="card" v-model="placeOrderForm.paymentMethod" class="custom-control-input">
														<label class="custom-control-label" for="card"><span class="ms-2">Card</span></label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="font-w600">Customer Info (Optional)</label>
											<input type="text" class="form-control solid" v-model="placeOrderForm.name" placeholder="Enter Full Name"  >
											
										</div> 
										<div class="form-group">
											<input type="text" class="form-control solid" v-model="placeOrderForm.phone" placeholder="Enter Phone Number">
											
										</div>
								</div>
							</div>
							<div class="card-order-footer">
								<div class="btn_box">
									<div class="row no-gutter mx-0">
										<a href="javascript:void(0);" id="place-order-cancel" class="btn btn-danger btn-block col-6 m-0 rounded-0">Cancel</a>
										<button class="btn btn-primary btn-block col-6 m-0 rounded-0">Submit</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</aside>
                <div class="row">
					<div class="col-xl-12">
						<div class="owl-carousel owl-theme">
							<div class="items" v-for="category in this.categories" :key="category.id">
								<div class="item-box" 
								:class="{active: categoryA == category.id}" @click="menuItem(category)">
									<img :src="'uploads/category/'+category.image" alt="">
									<h5 class="title mb-0">{{ category.title }}</h5>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-12">
						<div class="input-group search-area style-1 mb-4">
							<input type="text" class="form-control" placeholder="Search here...">
							<div class="input-group-append">
								<button class=" btn btn-primary btn-rounded">Search<i class="flaticon-381-search-2 scale3 ms-3"></i></button>
							</div>
						</div>
						<div class="row">
							<menu-item v-for="product in this.products" :product="product" 
							 :key="product.id" 
							 @update-cart="updateCart">
							</menu-item>
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
</template>
<script>
		
	import 'owl.carousel2/dist/owl.carousel';
	import MenuItem from '../components/MenuItems.vue';	
    export default {		
		components:{
			MenuItem
		},
		computed:{
			subtotal(){
				let price = 0;
				this.carts.map(item => {
					price += item['qty']*item['price']
				})
				this.placeOrderForm.totalValue = price		
				return price
			}
		},
		data() {
			return {
				categories: [],
				products: [],
				categoryA:35, // for first load and in curent path
				carts: [],
				selectedCat:'',
				placeOrderForm:{
					paymentMethod:'cash                                                                                                                                                                       ',
					name:'',
					phone:'',
					totalValue:0
				}
			};
		},		
		methods: {
			menuItem: function (category) {
				this.categoryA = category.id;
				axios.get('api/products/'+category.id)
					.then((response)=>{
					this.products = response.data
				})
			},
			updateCart(item) {
				var findProduct = this.carts.find(o => o.id === item.id)
				if(findProduct){
					findProduct.qty +=1;
					return;
				}
				item['qty'] = 1; 
				this.carts.push(item);								 
			},
			updateItemQty(item, updateType) {      
				for (let i = 0; i < this.carts.length; i++) {
					if (this.carts[i].id === item.id) {
						if (updateType === 'subtract') {
							if (this.carts[i].qty !== 1) {
								this.carts[i].qty--;
							}else {
								this.carts.splice(i, 1);
							}
						} else {
							this.carts[i].qty++;
						}
						this.subtotal
						break;
					}
				}		
			},
			placeOrder(){	
				axios.post('api/order',{'orderItem':this.carts, 'orderInfo':this.placeOrderForm})
                .then(response => {this.message = response.data})
				this.$toast.success(`Success!!! Your Order Successfully`,{
				// override the global option
				position: "top-left",
				});				
			}

		},
		async created() {
			try {
			const res = await axios.get('api/category');
				this.categories = res.data;
				this.categoryA = res.data[0].id
				this.menuItem(res.data[0])

			} catch (error) {
				console.log(error);
			}			
		},			
        mounted(){
			handleTabs();
		},
		beforeUnmount() {
			$('.owl-carousel').owlCarousel('destroy');
		},	
		updated(){
			ItemsCarousel()
		}
    }

	function handleTabs(){
		$('#home-counter,#place-order').css("display","none");		
		$('#add-order').on('click',function(){
			$('#add-order-content').css("display","block");	
			$('#home-counter').css("display","none");	
		})
		$('#place-order-tab').on('click',function(){
			$('#place-order').css("display","block");	
			$('#add-order-content').css("display","none");	
		})
		$('#place-order-cancel').on('click',function(){
			$('#place-order').css("display","none");	
			$('#add-order-content').css("display","block");	
		})
		$('#home-counter-tab').on('click',function(){
			$('#home-counter').css("display","block");	
			$('#add-order-content').css("display","none");	
		})
	}

function ItemsCarousel()
{
    /*  testimonial one function by = owl.carousel.js */
    var $owl = jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        center:true,
        autoWidth:true,
        autoplay:true,
        dots: false,
		responsiveClass:true,
        items:4,
        navText: ['', ''],
        breackpoint:[]
    })
	
}	
</script>