import { useSelector } from 'react-redux';

const useVersion = () => {
	return useSelector( state => state.environment.version );
};

export default useVersion;
