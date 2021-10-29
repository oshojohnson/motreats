import React, {Component} from 'react';
import Header from './../Layout/Header';
import Footer from './../Layout/Footer';
import {Link} from 'react-router-dom';
import CountUp from 'react-countup';
import OurPartners from './../Element/OurPartners';
import Slider from './../Element/Slider';
import Accord from './../Element/Accord';
import Topmenu from './TopMenu';
	
//Images	
var img1 = require('./../../images/background/bg5.jpg');
var img2 = require('./../../images/background/bg1.jpg');
var img3 = require('./../../images/background/bg5.jpg');
var img4 = require('./../../images/background/bg4.jpg');




class Index1 extends Component{
	
	render(){
		return(
			<>
				<Header />
			
				<div className="page-content bg-white">
					<div className="content-block">
						<Slider />
						<div className="section-full content-inner-3" style={{backgroundImage:"url(" + img1 + ")",  backgroundSize:"100%" }}>
							<div className="container">
								<div className="row service-area1">
									<Topmenu/>
									
								</div>
								<div className="row">
									<div className="col-lg-12">
										<div className="section-head mb-0 text-center">
											<div className="icon-bx icon-bx-xl">
												<img src={require('./../../images/cake1.jpg')} alt="" />
											</div>
											<h3 className="text-primary">It’s your party and you’re worried about your event smallchops</h3>
											<p className="main-text">MoTreats has got you covered <strong>.</strong>You can place your order for variety of chrunchy and yummy smallchops</p>
											<p>We offer exclusive deals on Cakes, delivered straight to your door <Link to={''}>Order Now</Link></p>
										</div>
									</div>
								</div>
							</div>
						</div>					
						<div className="section-full content-inner service-area2 bg-img-fix bg-line-top bg-line-bottom" style={{backgroundImage: "url(" + img4 + ")",  backgroundSize: "cover" }}>
							<div className="container">
								<div className="row">
									<div className="col-lg-12">
										<div className="section-head text-center">
											<h2 className="text-white">What Do We Offer For You?</h2>
											<p className="text-bold">We're the best in offering variety of cakes.</p>
											<div className="dlab-separator style1 bg-primary"></div>
										</div>
									</div>
								</div>
								<div className="row">
									<div className="col-lg-4 m-b30">
										<img src={require('./../../images/about/pic1.jpg')} className="img-cover radius-sm" alt="" />
									</div>
									<div className="col-lg-8">
										<div className="row p-l30">
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx">
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon2.png')} alt="" /></Link>
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Asun Treats</h5>
														<p>Quality and tasty</p>
													</div>
												</div>
											</div>
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx">
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon3.png')} alt="" /></Link> 
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Small Chops</h5>
														<p>Crunchy and yummy</p>
													</div>
												</div>
											</div>
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx">
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon4.png')} alt="" /></Link> 
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Beef Samosa</h5>
														<p>Made of quality beef meat</p>
													</div>
												</div>
											</div>
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx">
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon9.png')} alt="" /></Link> 
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Sauce Dippings</h5>
														<p></p>
													</div>
												</div>
											</div>
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx">
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon8.png')} alt="" /></Link> 
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Box of Meatpies</h5>
														<p>Tasty and Delicious</p>
													</div>
												</div>
											</div>
											<div className="col-lg-6 col-sm-6 m-b30">
												<div className="icon-bx-wraper text-white service-box2">
													<div className="icon-bx"> 
														<Link to={''} className="icon-cell"><img src={require('./../../images/icons/service-icon/icon1.png')} alt="" /></Link>  
													</div>
													<div className="icon-content">
														<h5 className="dlab-tilte">Cake Services</h5>
														<p>Attractive and moist cake</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div className="section-full content-inner bg-gray" style={{backgroundImage:"url(" + img2 + ")",  backgroundSize:"100%"}}>
							<div className="container">
								<div className="row faq-area1">
									<div className="col-lg-6 m-b30">
										<div className="m-r20">
											<div className="section-head text-left">
												<h2>Sale And Delivery Points</h2>
												<p className="text-bold">Where to buy our high quality Cake</p>
												<div className="dlab-separator style1 bg-primary"></div>
											</div>
											<div className="clearfix">
												<p></p>
												<p className="text"></p>
												<p></p>
												<Link to={'/faq'} className="btn btn-md btnhover shadow m-t30"><i className="fa fa-angle-right m-r10"></i>Get Started</Link>
											</div>
										</div>
									</div>
									<div className="col-lg-6 m-b30">
										<Accord />
									</div>
								</div>
							</div>
						</div>
					
						<div className="section-full bg-white" style={{backgroundImage:"url(" + img3 + ")", backgroundSize:"100%" }}>
							<div className="container content-inner">
								<div className="row">
									<div className="col-lg-12">
										<div className="section-head text-center">
											<div className="icon-bx icon-bx-xl">
												<img src={require('./../../images/cake1.jpg')} alt="" />
											</div>
											<h3>We Are Professional at Our Skills</h3>
											<p>More than 2000+ customers trusted us</p>
										</div>
									</div>
								</div>
								<div className="row">
									<div className="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
										<div className="counter-style-1 text-center">
											<div className="counter-num text-primary">
												<span className="counter"><CountUp end={5} /></span>
												<small>+</small>
											</div>
											<span className="counter-text">Years of Experience</span>
										</div>
									</div>
									
									<div className="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
										<div className="counter-style-1 text-center">
											<div className="counter-num text-primary">
												<span className="counter"><CountUp end={1} /></span>
												<small>k</small>
											</div>
											<span className="counter-text">Happy Clients</span>
										</div>
									</div>
									<div className="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
										<div className="counter-style-1 text-center">
											<div className="counter-num text-primary">
												<span className="counter"><CountUp end={100} />+</span>
											</div>
											<span className="counter-text">Perfect Products</span>
										</div>
									</div>
								</div>
							</div>
							<div className="container">
								<div className="row m-lr0 about-area1">
									<div className="col-lg-6 p-lr0">
										<img className="img-cover" src={require('./../../images/about/pic3.jpg')} alt="" />
									</div>
									<div className="col-lg-6 p-lr0 d-flex align-items-center text-center">
										<div className="about-bx">
											<div className="section-head text-center text-white">
												<h4 className="text-white">Limited Time Offer</h4>
												<p>Wedding Cake Sale !</p>
												<div className="icon-bx">
													<img src={require('./../../images/icons/service-icon/icon2.png')} alt="" />
												</div>
											</div>
											<p>Check out to see amazing cake types for best prices</p>
											<Link to={'shop'} className="btn-secondry white btnhover btn-md"><i className="fa fa-cart"></i>GET NOW</Link>
										</div>
									</div>
								</div>
							</div>
							<div className="container">
								<div className="row client-area1 p-t80">
									<OurPartners  />
								</div>
							</div>
							
						</div>
					</div>		
				</div>
				<Footer />
			</>	
		)
	}
} 

export default Index1;