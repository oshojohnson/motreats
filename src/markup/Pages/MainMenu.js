import React from 'react';
import {Link} from 'react-router-dom';
export default function MainMenu(props){
	const displayMenu = (props)=>{
		const {menus} =props;
		if(menus.length>0){
			return(
				menus.map((menu,index)=>{
					console.log(menu);
					return(

					<>
					<div className="col-xl-3 col-lg-3 col-md-6 col-sm-6">
						<div className="icon-bx-wraper text-center service-box1" style={{backgroundImage: "url(" + menu.product_directory + ")"}}>
							<div className="icon-content">
								<h2 className="dlab-tilte text-white">{menu.product_name}</h2>
								   <p>{menu.product_desc}</p>
									 <div className="dlab-separator style1 bg-primary"></div>
									     <Link to={("/shop-product-details/"+menu.id)} className="btn btnhover">More details <i className="fa fa-angle-double-right m-l5"></i></Link>
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