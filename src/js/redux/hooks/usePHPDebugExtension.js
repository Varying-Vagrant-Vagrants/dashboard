import { useSelector } from 'react-redux';

const usePHPDebugExtension = ( name ) => {
	return useSelector( state => state.environment.php.debug_extensions[name] );
};

export default usePHPDebugExtension;
