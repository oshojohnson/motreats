import React from 'react';

export default function GetMenu(props){
	const displayMenu = (props)=>{
		const {menus} =props;
		if(menus.length>0){
			return(
				menus.map((menu,index)=>{
					console.log(menu);
					return(

					<>
						<li>
							<div className="menu-item">
								<h4 className="title">
									<span><i className="la la-check-circle-o"></i> {menu.product_name}
									</span>
								</h4>
								<p className="price"><span className="naira">N</span>{menu.product_price}</p>
							</div>
							<p className="description">{menu.product_desc}</p>
						</li>
					
					</>
					)
				})
			)
		}else{
			return(
				<li>
							<div className="menu-item">
								<h4 className="title">No Menu is Available</h4>
							</div>
				</li>
				)
		}
	}
	return(
			<>
					{displayMenu(props)}
			</>
	)
}