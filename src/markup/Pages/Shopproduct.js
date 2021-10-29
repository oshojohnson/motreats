import React, {Component} from 'react';
import {Link} from 'react-router-dom';
import Header from './../Layout/Header';
import Footer from './../Layout/Footer';
import axios from 'axios';
import OrderForm from './OrderForm';


var img1= require('./../../images/banner/bnr1.jpg');
class Shopproduct extends Component{

	constructor(props) {
    super(props)
      this.state = {
        data: [],
        showForm: false,
        showButton: true
              }
          this.onClick = this.onClick.bind(this);
      };
	onClick(){
   		this.setState({ showForm: !this.state.showForm });
   		this.setState({ showButton: !this.state.showButton });
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
		const pid= this.props.match.params.productID;	 
		const {showButton,showForm}=this.state;
		if(pid!==""){
			return(
				<>
				<Header />
					<PageHeader/>
					<div className="content-block">
						<div className="section-full content-inner-1 bg-gray-light">
							<div className="container woo-entry">
								<div className="row">
									<div className="col-lg-6 m-b30">
										<div className="product-gallery on-show-slider lightgallery" id="lightgallery"> 
											<div className="dlab-box">
												<div className="dlab-thum-bx">
													<img src={this.state.data.product_directory} alt="" />
												</div>
											</div>
										</div>
									</div>
									<div className="col-lg-6 m-b30">
										<form method="post" className="cart sticky-top">
										<div className="dlab-post-title">
											<h4 className="post-title"> {this.state.data.product_name} </h4>
											<p>{this.state.data.product_desc}
												
											</p>
											<div>
												 
											</div>
											<div className="dlab-divider bg-gray tb15">
												<i className="icon-dot c-square"></i>
											</div>
										</div>
										<div className="relative">
											<h3 className="m-tb10"><span className="naira">N</span> {this.state.data.product_price}</h3>
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
											<Link to={''}>{this.state.data.product_category}</Link>
										</div>
										<div className="dlab-divider bg-gray tb15">
											<i className="icon-dot c-square"></i>
										</div>
										<button type="button" className="btn btnhover" onClick={this.onClick} style={{display:showButton?"block":"none"}}>
											<i className="ti-shopping-cart"></i>Order
										</button>
									</form>
									</div>
								</div>

								<div className="row">
									<div className="col-lg-12">
										<div className="col-lg-6">
										
										</div>
										<div className="col-lg-6 formDiv">
											{this.state.showForm?<OrderForm id={pid}/>:null}
										</div>
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
					<Footer/>
				</>
				)
		}else{
			return(
					<>
						<PageHeader/>
							<div className="content-block">
								<div className="section-full content-inner-1 bg-gray-light">
									<div className="container woo-entry">
										<div className="row">No Product is selected
											
										</div>
									</div>
								</div>
							</div>
						<Footer/>
					</>

				)
		}


	}
}
 
export default Shopproduct; 
function PageHeader(){
	return(
			<>
				
				<div className="page-content bg-white">
					
					<div className="dlab-bnr-inr overlay-black-middle" style={{backgroundImage:"url(" + img1 + ")"}}>
						<div className="container">
							<div className="dlab-bnr-inr-entry">
								<h1 className="text-white">Product Details</h1>
								
								<div className="breadcrumb-row">
									<ul className="list-inline">
										<li><Link to={'./'}><i className="fa fa-home"></i></Link></li>
										<li>Product Details</li>
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				</>


		)
}
