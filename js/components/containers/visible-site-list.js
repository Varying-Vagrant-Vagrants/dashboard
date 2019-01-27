import { connect } from 'react-redux';
import SiteList from '../site-list';
import { showSites } from '../../reducers/actions';


const mapStateToProps = state => ({
  sites: state.visible_sites,
});

const mapDispatchToProps = dispatch => ({
  showAllSites: () => dispatch(showSites('all')),
  showProvisionedSites: () => dispatch(showSites('provisioned')),
  showSkippedSites: () => dispatch(showSites('skipped')),
});

const VisibleSiteList = connect(mapStateToProps, mapDispatchToProps)(SiteList);

export default VisibleSiteList;
