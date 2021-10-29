import React, {Component} from 'react';
import {Link} from 'react-router-dom';
import {MyComponent} from './../Pages/Shopproduct';
import {componentDidMount} from './../Pages/Shopproduct';
import submitButton from './submitButton';
class ShopproductID extends Component {
	constructor(props) {
    super(props)
      this.state = {
        data: []
              }
      }
	componentDidMount() {
    		const product_id= this.props.match.params.productID;
    		const url = 'https://www.motreats.ng/api/products.php?id='+product_id
    				axios.get(url).then(res => 
        				{
        					this.setState({data: res.data.products});
        					console.log(this.state.data);
           				})
  }
		render(){
		return(
					<div className="content-block">
						<div className="section-full content-inner-1 bg-gray-light">
							<div className="container woo-entry">
								<div className="row">
									<div className="col-lg-6 m-b30">
										<div className="product-gallery on-show-slider lightgallery" id="lightgallery"> 
											<div className="dlab-box">
												<div className="dlab-thum-bx">
													<img src={require('./../../images/product/item2.jpg')} alt="" />
													<span data-exthumbimage="images/product/item2.jpg" data-src={require("./../../images/product/item2.jpg")} className="check-km" title="Image 1 Title will come here" >		
														<i className="fa fa-search"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div className="col-lg-6 m-b30">
										<form method="post" className="cart sticky-top">
										<div className="dlab-post-title">
											<h4 className="post-title">Pumpkin cakes {this.state.data.product_name} </h4>
											<p>Enjoy at cheapest 
												
											</p>
											<div>
												 
											</div>
											<div className="dlab-divider bg-gray tb15">
												<i className="icon-dot c-square"></i>
											</div>
										</div>
										<div className="relative">
											<h3 className="m-tb10"><span className="naira">N</span>2,140.00 </h3>
											<div className="shop-item-rating">
												<span className="rating-bx"> 
													<i className="fa fa-star"></i> 
													<i className="fa fa-star"></i> 
													<i className="fa fa-star"></i> 
													<i className="fa fa-star-o"></i> 
													<i className="fa fa-star-o"></i> 
												</span>
												<span>4.5 Rating</span>
											</div>
										</div>
										<div className="shop-item-tage">
											<span>Tags :- </span>
											<Link to={''}>Cake</Link>
											<Link to={''}>Coffee</Link>
											<Link to={''}>Pastry</Link>
										</div>
										<div className="dlab-divider bg-gray tb15">
											<i className="icon-dot c-square"></i>
										</div>
										<button className="btn btnhover" data-toggle="modal" data-target="#orderModal">
											<i className="ti-shopping-cart"></i>Order
										</button>
									</form>
									</div>
								</div>
								<div className="row">
									<div className="col-lg-12">
										<div className="dlab-tabs product-description tabs-site-button m-t30">
											<ul className="nav nav-tabs">
												<li><Link data-toggle="tab" to={''} className="active"> Description</Link></li>
												<li><Link data-toggle="tab" to={''}> Review(0)</Link></li>
											</ul>
											<div className="tab-content">
												<div id="web-design-1" className="tab-pane active">
													No information available for this product
												</div>
												<div id="developement-1" className="tab-pane">
													<div id="comments">
														<ol className="commentlist">
														
														</ol>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
		
				
			)

	}
}
 
export default ShopproductID; 