import React, { Component } from 'react';
import ApiService from '../services/ApiService';

class CreateShortenUrl extends Component {
	
	state = {
		originUrl: '',
		shortenUrl: '',
		apiError: false
	};
	
	_originUrlHandler = (event) => {
		this.setState({
			originUrl: event.target.value
		})
	};
	
	_submitHandler = (event) => {
		ApiService.getShortenUrl(this.state.originUrl, (res) => {
			this.setState({
				apiError: false,
				shortenUrl: res.data.shorten_url
			})
		}, (error) => {
			this.setState({
				apiError: error,
				shortenUrl: ''
			})
		});
		event.preventDefault();
	};
	
	render() {
		return (
			<div className="form-container">
				<div>
					<h1>Create Shorten URL</h1>
					
					{(this.state.shortenUrl !== '') && (
							<div className="alert alert-success" role="alert">
								<p>Shorten address:</p>
								<h3>{this.state.shortenUrl}</h3>
							</div>
					)}
					
					{(this.state.apiError) && (
							<div className="alert alert-danger" role="alert">
								<p>Error:</p>
								<h3>{this.state.apiError.message}</h3>
							</div>
					)}
					
					<form onSubmit={this._submitHandler}>
						<div className="form-group">
							<label htmlFor="urlAddress">Your origin URL</label>
							<input type="text" className="form-control" id="urlAddress" aria-describedby="urlHelp"
							       placeholder="Enter URL to get shorten URL" value={this.state.originUrl}
							       onChange={this._originUrlHandler}/>
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
