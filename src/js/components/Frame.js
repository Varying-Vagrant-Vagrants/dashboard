import {
  Switch,
  Route
} from "react-router-dom";
import RootWarning from "./root-warning";

import Demo from "./Demo";
import Sidebar from "./sidebar";
import Databases from "./databases";
import Php from "./php";
import Sites from "./sites";
import StatusBar from "./statusbar";

function Frame () {
	return <>
		<StatusBar/>
		<div className="columns">
			<div className="column is-one-fifth fixed-column ml-5 mr-5">
				<Sidebar />
			</div>
			<div className="column is-offset-one-fifth is-four-fifths">
				<section className="main-area">
					<RootWarning />
					<Switch>
						<Route path="/placeholder">
							<section className="section">
								<h1 className="title">Hello!</h1>
							</section>
						</Route>
						<Route path="/demo">
							<Demo />
						</Route>
						<Route path="/databases">
							<Databases />
						</Route>
						<Route path="/php">
							<Php />
						</Route>
						<Route path="/">
							<Sites />
						</Route>
					</Switch>
				</section>
			</div>
		</div>
	</>;
};

export default Frame;
