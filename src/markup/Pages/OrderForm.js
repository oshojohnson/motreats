import React, {Component} from 'react';
import axios from 'axios';
import {FormErrors} from './FormErrors';
import Swal from 'sweetalert2';

class OrderForm extends Component{

	constructor(props) {
        super();
        const {id}= props;
        this.state = {
        id:id,
      	fullname: '',
      phone: '',
      itemnum: '',
      submitresponse: '',
      email: '',
      formErrors: {email: '', phone: '',itemnum:'',fullname:''},
      nameError:false,
      phoneError:false,
      itemnumError:false,
      emailError:false,
      formValid:false
        };
         
      }
   onChange = (e) => {
        const name = e.target.name;
  		const value = e.target.value;
  		this.setState({[name]: value}, 
                () => { this.validateField(name, value) });
        const {id,fullname,phone,itemnum,email}=this.state;

      }

   
  validateField(fieldName, value) {
  let fieldValidationErrors = this.state.formErrors;
  let emailValid = this.state.emailValid;
  let phoneValid = this.state.phoneValid;

  switch(fieldName) {
    case 'email':
      emailValid = value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i);
      fieldValidationErrors.email = emailValid ? '' : ' is invalid';
      break;
    case 'phone':
    	if(value.length==11 && !isNaN(value)){
    		phoneValid=true;
    	}else{
    		phoneValid=false;
    	}
      fieldValidationErrors.phone = phoneValid ? '': ' is invalid';
      break;
    default:
      break;
  }
  this.setState({formErrors: fieldValidationErrors,
                  emailValid: emailValid,
                  phoneValid: phoneValid
                }, this.validateForm);
}

validateForm() {
  this.setState({formValid: this.state.emailValid && this.state.phoneValid});
}
  handleSubmit = e => {
    e.preventDefault();
    const submitOrder=1;
    const {submitresponse,id,fullname,phone,itemnum,email}=this.state;
    const data = {id,fullname,phone,itemnum,email,submitOrder}
    const url = "https://www.motreats.ng/api/process.php";
    axios.post(url, { data})
          .then((result) => {
          	if(result.data.response==1){
          		Swal.fire("Success","Order submitted successfully","success");
          	}else{
          		Swal.fire("Opps!","Fail to send","error");
          	}


          });

    // Submit form details to login endpoint etc.
    // ...
  };
  render(){
  	const {id,fullname,phone,itemnum,email}=this.state;
  		return (
  	<>
  	<div className="formerr">
  			<FormErrors formErrors={this.state.formErrors} />
  	</div>
  	<p>Please fill the order form below</p>
  	<form onSubmit={this.handleSubmit}>
     <div className="form-group">
       		<input type="text" disabled="disabled" placeholder="Product ID" value={id}  className="form-control"/>
      </div>
      <div className="form-group">
       		<input type="text" placeholder="Full Name" className="form-control" name="fullname" onChange={this.onChange}/>
       </div>
       <div className="form-group">
       		<input type="email" placeholder="User Email" className="form-control" name="email" onChange={this.onChange}/>
       </div>
       <div className="form-group">
       		<input type="text" placeholder="User Phone"  className="form-control" name="phone" onChange={this.onChange}/>
       </div>
       <div className="form-group">
       		<input type="number" placeholder="Number of Item"  className="form-control" name="itemnum" onChange={this.onChange}/>
       	</div>
       
       <button type="submit" className="myButton btn btnhover"  disabled={!this.state.formValid}>Submit Order</button>
     </form>
     <FormErrors formErrors={this.state.formErrors} />
</>
  	);
  }
}
export default OrderForm;