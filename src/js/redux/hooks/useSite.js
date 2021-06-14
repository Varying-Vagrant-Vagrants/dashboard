import { useSelector } from 'react-redux';

const useSite = ( siteName ) => {
	if ( ! siteName ) {
		return null;
	}
	return useSelector( state => state.config.sites[siteName] );
};

export default useSite;
