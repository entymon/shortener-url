import React, {Component} from "react";
import ApiService from '../services/ApiService';

class CreateShortenUrl extends Component {
	
	state = {
		originUrl: ''
	};
	
	_originUrlHandler = (event) => {
		this.setState({
			originUrl: event.target.value
		})
	};
	
	_submitHandler = (event) => {
		ApiService.getShortenUrl();
		event.preventDefault();
	};
	
	render() {
		return (
			<div className="form-container">
				<div>
					<h1>Create Shorten URL</h1>
					<form onSubmit={this._submitHandler}>
						<div className="form-group">
							<label htmlFor="urlAddress">Your origin URL</label>
							<input type="text" className="form-control" id="urlAddress" aria-describedby="urlHelp"
							       placeholder="Enter URL to get shorten URL" value={this.state.originUrl} onChange={this._originUrlHandler}/>
								<small id="urlHelp" className="form-text text-muted">For example: "http://www.payasugym.com".</small>
						</div>
						<button type="submit" className="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		);
	}
}

export default CreateShortenUrl;
