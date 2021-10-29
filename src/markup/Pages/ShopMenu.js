import React from 'react';
import {Link} from 'react-router-dom';
export default function ShopMenu(props){
	const displayMenu = (props)=>{
		const {menus} =props;
		if(menus.length>0){
			return(
				menus.map((menu,index)=>{
					console.log(menu);
					return(

					<>
							<div className="col-lg-3 col-md-6 col-sm-6">
									<div className="item-box shop-item">
										<div className="item-img">
											<img src={menu.product_directory} alt="" />
											<span className="sale">Sale!</span>
											<div className="price">
												<del><span className="naira">N</span>{menu.discount_price}</del> <span className="naira">N</span>{menu.product_price} 
											</div>
										</div>
										<div className="item-info text-center">
											<h4 className="item-title"><Link to={'/shop-product-details/2'}>{menu.product_name}</Link></h4>
											<Link to={'/shop-product-details/'+menu.id} className="btn btnhover"><i className="ti-shopping-cart m-r5"></i> Order Now</Link>
										</div>
									</div>
								</div>
					
					</>
					)
				})
			)
		}else{
			return(
				<p>Nothing to show</p>
				)
		}
	}
	return(
			<>
					{displayMenu(props)}
			</>
	)
}