import { useSelector } from 'react-redux';

const useSites = () => useSelector( state => state.config.sites );

export default useSites;
