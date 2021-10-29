import React, {Component} from 'react';
import {Link} from 'react-router-dom';
import Header from './../Layout/Header';
import Footer from './../Layout/Footer';
import Menuitem from './../Element/Menuitem';

var img1 = require('./../../images/banner/bnr1.jpg');
var img2 = require('./../../images/background/bg5.jpg');



class Ourmenustyle1  extends Component{
	render(){
		return(
			<>
			<Header />
			
			 <div className="page-content bg-white">
			
				<div className="dlab-bnr-inr overlay-black-middle" style={{backgroundImage:"url(" + img1 + ")"}}>
					<div className="container">
						<div className="dlab-bnr-inr-entry">
							<h1 className="text-white">Our Menu</h1>
							
							<div className="breadcrumb-row">
								<ul className="list-inline">
									<li><Link to={'./'}><i className="fa fa-home"></i></Link></li>
									<li>Our Menu</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				
				<div className="content-block">
					
					<div className="section-full bg-white content-inner" style={{backgroundImage:"url(" + img2 + ")", backgroundSize:"100%" }}>
						<div className="container">
							<div className="row">
								<div className="col-lg-12">
									<div className="section-head text-center">
										<div className="icon-bx icon-bx-xl">
											<img src={require('./../../images/cake1.jpg')} alt="" />
										</div>
										<h3>Our Cakes Menu</h3>
									</div>
								</div>
							</div>
								<Menuitem />
						</div>
					</div>
				
				
				
				</div>
			</div>
		
			<Footer  />
			</>
		)
	}
	
}

export default Ourmenustyle1;