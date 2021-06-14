import { combineReducers } from "redux";
import config from "./config";
import environment from "./environment";
import tools from "./tools";

export default combineReducers({ config, environment, tools });
