import {
	NavLink
} from "react-router-dom";

const MenuItem = ( { children, to } ) => {
	return <li><NavLink exact activeClassName="is-active" to={to}>{ children }</NavLink></li>;
};

export default MenuItem;
