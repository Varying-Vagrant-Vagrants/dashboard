import './sass/style.scss';
import Frame from "./js/components/Frame";
import store from "./js/redux/store";

import { Provider } from 'react-redux';
import {
	HashRouter as Router
} from "react-router-dom";

const wrapper = document.getElementById("container");
wrapper ? ReactDOM.render(
	<Provider store={store}>
		<Router>
			<Frame />
		</Router>
	</Provider>,
	wrapper
) : false;
