import React, {Component} from "react";
import CreateShortenUrl from './components/CreateShortenUrl';

class AppContainer extends Component {
	render() {
		return (
			<div className='page'>
				<CreateShortenUrl />
			</div>
		);
	}
}

export default AppContainer;
