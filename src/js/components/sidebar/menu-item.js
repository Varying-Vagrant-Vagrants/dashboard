import {
	NavLink
} from "react-router-dom";

const MenuItem = ( { children, to, exact=true } ) => {
	return <li><NavLink exact={ exact } activeClassName="is-active" to={to}>{ children }</NavLink></li>;
};

export default MenuItem;
