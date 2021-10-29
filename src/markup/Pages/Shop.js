import React,{Component} from 'react';
import {Link} from 'react-router-dom';
import Header from './../Layout/Header';
import Footer from './../Layout/Footer';
import ShopItem from './ShopItem';

var bnr= require('./../../images/banner/bnr1.jpg');

class Shop extends Component{

	render(){
		return(
			<>
			<Header />
			
			<div className="page-content bg-white">
				
				<div className="dlab-bnr-inr overlay-black-middle" style={{backgroundImage:"url(" + bnr + ")"}}>
					<div className="container">
						<div className="dlab-bnr-inr-entry">
							<h1 className="text-white">Shop</h1>
							
							<div className="breadcrumb-row">
								<ul className="list-inline">
									<li><Link to={'./'}><i className="fa fa-home"></i></Link></li>
									<li>Shop</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				
				<div className="content-block">
					
					<div className="section-full content-inner bg-gray-light">
						<div className="container">
							<div className="row">
								<ShopItem/>
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

export default Shop;