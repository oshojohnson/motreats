import React, {Component} from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';

import Index1 from './Pages/Index1';



import About from './Pages/About';
import Ourservices from './Pages/Ourservices';
import Faq from './Pages/Faq';
import Booking from './Pages/Booking';
import Error from './Pages/Error';
import Calendar from './Pages/Calendar';
import Team from './Pages/Team';

import Ourmenustyle1 from './Pages/Ourmenustyle1';


import Blogsingle from './Pages/Blogsingle';



import Shop from './Pages/Shop';
import Shopproduct from './Pages/Shopproduct';



import Contact from './Pages/Contact';



class Markup extends Component{
	
	render(){
		return(

			<BrowserRouter basename='/'>
				<Switch>

					<Route path='/' exact component={Index1} />
					<Route path='/about' exact component ={About} />
					<Route path='/our-services' exact component ={Ourservices} />
					<Route path='/faq' exact component ={Faq} />
					<Route path='/booking' exact component ={Booking} />
					<Route path='/error-404' exact component ={Error} />
					<Route path='/calendar' exact component ={Calendar} />
					<Route path='/team' exact component ={Team} />
					
					<Route path='/our-menu' exact component ={Ourmenustyle1} />
					<Route path='/shop' exact component ={Shop} />
					<Route path='/shop-product-details' exact component ={Shopproduct} />
					<Route path='/shop-product-details/:productID' exact component ={Shopproduct} />
					<Route path='/contact' exact component ={Contact} />
					<Route path='/blog' exact component ={Blogsingle} />
					
					
				</Switch>
			</ BrowserRouter>
		)
		
	}
}

export default Markup;