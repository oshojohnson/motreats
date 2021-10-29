import React, {Component} from 'react';
import RightMenu from './RightMenu';
import LeftMenu from './LeftMenu';

class Menuitem extends Component{
	render(){
		return(
			<div className="row">
				<div className="col-lg-6">
					<ul className="menu-list m-b0">
						<LeftMenu/>
						
						
					</ul>
				</div>
				<div className="col-lg-6">
					<ul className="menu-list">

						<RightMenu/>
					</ul>
				</div>
			</div>
		
		)
	
	}
}

export default Menuitem;