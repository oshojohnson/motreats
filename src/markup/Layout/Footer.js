import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

var bgfoter = require('./../../images/background/bg2.jpg');	


class Footer extends Component{
		constructor(props) {
    super(props)
      	this.state = {
        	data: []
           }
      }
	componentDidMount() {
    		const url = 'https://www.motreats.ng/api/process.php?get_contact='+1
    				axios.get(url).then(res => 
        				{
        					this.setState({data: res.data.contacts});
        					console.log(this.state.data);
           				})
  	}
	render(){
		return(
			<footer className="site-footer " style={{backgroundImage: "url(" + bgfoter + ")", backgroundSize: 'cover'}} >
				
				<div className="footer-top bg-line-top">
					<div className="container">
						<div className="row">
							<div className="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div className="widget widget_getintuch">
									<h5 className="footer-title text-white">Contact Us</h5>
									<ul>
										<li>
											<i className="fa fa-map-marker"></i> 
											<p>{this.state.data.address}</p>
										</li>
										<li>
											<i className="fa fa-phone"></i> 
											<p>{this.state.data.phone1}</p>
										</li>
										<li>
											<i className="fa fa-mobile"></i> 
											<p>{this.state.data.phone2}</p>
										</li>
										<li>
											<i className="fa fa-envelope"></i> 
											<p>{this.state.data.email}</p>
										</li>
									</ul>
								</div>
							</div>
							<div className="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div className="widget recent-posts-entry">
									<h4 className="footer-title">Recent Post</h4>
									<div className="widget-post-bx">
										<div className="widget-post clearfix">
											<h6>No Post at this moment</h6>
										</div>
									</div>
								</div>
							</div>
							<div className="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div className="widget widget_services border-0">
								   <h4 className="footer-title">Quick Links</h4>
									<ul className="list-2">
										<li><Link to={'/'}>Home</Link></li>
										<li><Link to={'/about'}>About</Link></li>
										<li><Link to={'/our-menu'}>Our Menu</Link></li>
										<li><Link to={'/faq'}>FAQ</Link></li>
										<li><Link to={'/blog'}>Blog</Link></li>
										<li><Link to={'/contact'}>Contact</Link></li>
									</ul>
								</div>
							</div>
							<div className="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div className="widget border-0">
								   <h4 className="footer-title">Opening Hours</h4>
								   <p className="m-b20">Our support available to help you 24 hours a day, seven days a week.</p>
									<ul className="work-hour-list">
										<li>
											<span className="day"><span>Monday to Friday</span></span> 
											<span className="timing">7AM - 5PM</span>
										</li>
										<li>
											<span className="day"><span>Saturday</span></span>
											<span className="timing">10AM - 5PM</span>
										</li>
										<li>
											<span className="day"><span>Sunday</span></span>
											<span className="timing">Closed</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div className="footer-bottom">
					<div className="container">
						<div className="row">
							<div className="col-lg-6 col-md-6 text-left"> <span>Developed by JoDaTek</span> </div>
							<div className="col-lg-6 col-md-6 text-right"> 
								<div className="widget-link"> 
									<ul>
										<li><Link to={'/about'}>About Us</Link></li>
										<li><Link to={'/faq'}>Faq</Link></li> 
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			
		)
		
	}
}

export default Footer;