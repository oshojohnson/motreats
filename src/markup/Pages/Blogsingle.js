import React, {Component} from 'react';
import {Link} from 'react-router-dom';
import Header from './../Layout/Header';
import Footer from './../Layout/Footer';
var img = require('./../../images/banner/bnr1.jpg');

class Blogsingle extends Component{
	render(){
		return(
			<>
			
			<Header  />
			
			<div className="page-content bg-white">
				
				<div className="dlab-bnr-inr overlay-black-middle bg-pt" style={{backgroundImage:"url(" + img + ")"}}>
					<div className="container">
						<div className="dlab-bnr-inr-entry">
							<h1 className="text-white">Blog</h1>
							
							<div className="breadcrumb-row">
								<ul className="list-inline">
									<li><Link to={'./'}>Home</Link></li>
									<li>Blog</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				
				<div className="section-full bg-white content-inner-2">
					<div className="container">
						
						<div className="blog-post blog-single sidebar">
							<div className="dlab-post-media dlab-img-effect zoom-slow radius-sm"> 
								<Link to={'/blog-single-sidebar'}><img src={require('./../../images/blog/default/thum1.jpg')} alt="" /></Link> 
							</div>
							<div className="dlab-post-info">
								<div className="dlab-post-title">
									<h2 className="post-title">MoTreat Has The Answer</h2>
								</div>
							
								<div className="dlab-post-tags clear">
									<div className="post-tags"> 
										<Link to={''}>Child </Link> <Link to={''}>Eduction </Link> <Link to={''}>Money </Link> <Link to={''}>Resturent </Link> 
									</div>
								</div>
							</div>
						</div>
						<div className="clear" id="comment-list">
							<div className="comments-area" id="comments">
								<p className="" style={{color:'red'}}>No post is available at the moment, please check back later</p>
								<div className="clearfix">
									
								
									
									<div className="comment-respond" id="respond">
										<h4 className="comment-reply-title" id="reply-title">Leave a Reply 
											<small><Link style={{display:"none"}} to={''} id="cancel-comment-reply-link" rel="nofollow">Cancel reply</Link> </small> 
										</h4>
										<p>Your email address will not be published. Required fields are marked *</p>
										<form className="comment-form" id="commentform" method="post" action="http://sedatelab.com/developer/donate/wp-comments-post.php">
											<p className="comment-form-comment">
												<label for="comment">Comment</label>
												<textarea rows="8" placeholder="Comment" id="comment"></textarea>
											</p>
											<p className="comment-form-author">
												<label for="author">Name <span className="required">*</span></label>
												<input type="text" value="" placeholder="Author" id="author" />
											</p>
											<p className="comment-form-email">
												<label for="email">Email <span className="required">*</span></label>
												<input type="text" value="" placeholder="Email" id="email" />
											</p>
											<p className="comment-form-url">
												<label for="url">Website</label>
												<input type="text"  value=""  placeholder="Website"  id="url" />
											</p>
											<p className="form-submit">
												<input type="submit" value="Post Comment" className="btn btnhover" id="submit" />
											</p>
										</form>
									</div>
									
								</div>
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

export default Blogsingle;